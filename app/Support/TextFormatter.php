<?php

namespace App\Support;

class TextFormatter
{
    /**
     * Render free-form admin text as safe HTML paragraphs.
     *
     * Text with any line breaks is kept exactly as written: blank lines separate
     * paragraphs, single line breaks become <br>. Only a single unbroken wall of
     * text is auto-split into paragraphs every few sentences.
     */
    public static function paragraphs(?string $text, int $sentencesPerParagraph = 3): string
    {
        $text = trim(str_replace(["\r\n", "\r"], "\n", (string) $text));

        if ($text === '') {
            return '';
        }

        if (str_contains($text, "\n")) {
            $html = '';
            foreach (preg_split('/\n[ \t]*\n\s*/', $text) as $block) {
                $block = trim($block);
                if ($block !== '') {
                    $html .= '<p>'.nl2br(e($block), false).'</p>';
                }
            }

            return $html;
        }

        $sentences = preg_split('/(?<=[.!?])\s+(?=[A-ZÇĞİÖŞÜ0-9])/u', $text) ?: [$text];

        $html = '';
        foreach (array_chunk($sentences, max(1, $sentencesPerParagraph)) as $chunk) {
            $html .= '<p>'.e(implode(' ', $chunk)).'</p>';
        }

        return $html;
    }
}
