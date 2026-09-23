<x-app-layout :title="$project->seo_title ?: $project->title" :description="$project->seo_description ?: $project->summary" :keywords="$project->seo_keywords">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / Projeler / {{ $project->title }}</div>
        <h1>{{ $project->title }}</h1>
        @if ($project->sector)
            <p>{{ $project->sector->title }}</p>
        @endif
    </div>
</section>
<section class="section">
    <div class="wrap" style="max-width:820px">
        @if ($project->cover_image)
            <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}" style="width:100%;border-radius:16px;margin-bottom:24px">
        @endif
        <p class="lead">{{ $project->summary }}</p>
        @if ($project->result_metric)
            <p><strong>Sonuç: {{ $project->result_metric }}</strong></p>
        @endif
        <div>{!! nl2br(e($project->content)) !!}</div>
        <div class="bottomcta">
            <a href="{{ route('contact.index') }}#teklif">Benzer Bir Çözüm İçin Teklif Alın →</a>
            <a href="{{ route('projects.index') }}">Tüm Projeler →</a>
        </div>
    </div>
</section>
</x-app-layout>
