<x-app-layout :title="$post->seo_title ?: $post->title" :description="$post->seo_description ?: $post->excerpt" :keywords="$post->seo_keywords">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / Blog / {{ $post->title }}</div>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->category->name ?? 'Kurumsal' }} • {{ optional($post->published_at)->format('d.m.Y') }}</p>
    </div>
</section>
<section class="section">
    <div class="wrap contentgrid">
        <article class="article">
            @if ($post->cover_image)
                <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" style="width:100%;border-radius:16px;margin-bottom:20px">
            @endif
            <div class="justify-text">{!! \App\Support\TextFormatter::paragraphs($post->content) !!}</div>
        </article>
        <aside class="sidebar">
            <div class="sidebox">
                <b>Diğer Yazılar</b>
                @foreach ($recentPosts as $recent)
                    <a href="{{ route('blog.show', $recent) }}">{{ $recent->title }}</a>
                @endforeach
            </div>
        </aside>
    </div>
</section>
</x-app-layout>
