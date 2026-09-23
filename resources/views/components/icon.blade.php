@props(['name'])
@php
    $icons = [
        'phone' => '<path d="M4.5 3.5h3l1.5 4-2 1.5a11 11 0 0 0 5 5l1.5-2 4 1.5v3c0 1-1 1.5-2 1.5C10 18 3 11 2.5 5.5c0-1 .5-2 2-2Z"/>',
        'mobile' => '<rect x="6.5" y="2.5" width="8" height="16" rx="1.5"/><path d="M9 16.5h3" stroke-linecap="round"/>',
        'mail' => '<rect x="2.5" y="4.5" width="16" height="12" rx="1.5"/><path d="m3.5 6 6.5 5 6.5-5" stroke-linecap="round" stroke-linejoin="round"/>',
        'pin' => '<path d="M10 18.5s6-5.6 6-10a6 6 0 1 0-12 0c0 4.4 6 10 6 10Z"/><circle cx="10" cy="8.3" r="2.2"/>',
        'whatsapp' => '<path d="M5 17.5 6 14a7 7 0 1 1 2.8 2.7L5 17.5Z"/><path d="M7.3 7.6c0-.4.4-.8.8-.8h.6c.3 0 .5.2.6.5l.5 1.4c.1.3 0 .6-.2.8l-.5.5a5 5 0 0 0 2.4 2.4l.5-.5c.2-.2.5-.3.8-.2l1.4.5c.3.1.5.3.5.6v.6c0 .4-.4.8-.8.8-3 0-6.6-3.6-6.6-6.6Z" fill="currentColor" stroke="none"/>',
        'info' => '<circle cx="10" cy="10" r="7.5"/><path d="M10 9v5" stroke-linecap="round"/><circle cx="10" cy="6.3" r="0.9" fill="currentColor" stroke="none"/>',
        'flag' => '<path d="M5 17.5V3.5" stroke-linecap="round"/><path d="M5 4 h9 l-2.2 3 2.2 3 H5 Z" stroke-linejoin="round"/>',
        'star' => '<path d="m10 3 2.1 4.4 4.9.7-3.5 3.4.8 4.9-4.3-2.3-4.3 2.3.8-4.9L3 8.1l4.9-.7Z" stroke-linejoin="round"/>',
    ];
@endphp
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4" {{ $attributes->merge(['class' => 'icon-svg']) }}>{!! $icons[$name] ?? '' !!}</svg>
