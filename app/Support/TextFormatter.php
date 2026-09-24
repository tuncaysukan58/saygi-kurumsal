<?php

namespace App\Support;

class TextFormatter
{
    /**
     * Render free-form admin text as safe, readable HTML paragraphs.
     *
     * - Blank-line-separated blocks are treated as paragraphs as-is (respects the admin's own formatting).
     * - A block with no blank lines but with single line breaks keeps those as <br>.
     * - A single unbroken wall of text is auto-split into paragraphs every few sentences,
     *   since most admin-entered content has no manual line breaks at all.
     */
    public static function paragraphs(?string $text, int $sentencesPerParagraph = 3): string
    {
        $text = trim((string) $text);

        if ($text === '') {
            return '';
        }

        $html = '';

        foreach (preg_split('/\n\s*\n/', $text) as $block) {
            $block = trim($block);

            if ($block === '') {
                continue;
            }

            if (str_contains($block, "\n")) {
                $html .= '<p>'.nl2br(e($block)).'</p>';

                continue;
            }

            $sentences = preg_split('/(?<=[.!?])\s+(?=[A-ZÇĞİÖŞÜ0-9])/u', $block) ?: [$block];

            foreach (array_chunk($sentences, max(1, $sentencesPerParagraph)) as $chunk) {
                $html .= '<p>'.e(implode(' ', $chunk)).'</p>';
            }
        }

        return $html;
    }
}
