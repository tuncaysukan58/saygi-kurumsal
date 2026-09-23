<x-app-layout title="Blog">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / Blog</div>
        <h1>Blog</h1>
        <p>Sektörümüzden haberler, kurumsal gelişmeler ve faydalı bilgiler.</p>
    </div>
</section>
<section class="section">
    <div class="wrap">
        <div class="bloggrid">
            @forelse ($posts as $post)
                <article class="blogcard">
                    <div class="cover">
                        @if ($post->cover_image)
                            <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" style="width:100%;height:100%;object-fit:cover">
                        @else
                            SAY
                        @endif
                    </div>
                    <div class="pad">
                        <small>{{ $post->category->name ?? 'Kurumsal' }} • {{ optional($post->published_at)->format('d.m.Y') }}</small>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post) }}">Devamını Oku →</a>
                    </div>
                </article>
            @empty
                <p>Henüz yazı eklenmedi.</p>
            @endforelse
        </div>
        <div style="margin-top:30px">{{ $posts->links() }}</div>
    </div>
</section>
</x-app-layout>
