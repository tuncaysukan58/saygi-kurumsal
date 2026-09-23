<x-app-layout title="Projeler &amp; Başarı Hikâyeleri">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / Projeler</div>
        <h1>Projeler &amp; Başarı Hikâyeleri</h1>
        <p>Gerçek müşteri izinleri ve doğrulanmış proje verileriyle hazırlanmıştır.</p>
    </div>
</section>
<section class="section">
    <div class="wrap">
        <div class="casegrid">
            @forelse ($projects as $project)
                <div class="case">
                    <b>{{ $project->title }}</b>
                    <p>{{ $project->summary }}</p>
                    @if ($project->result_metric)
                        <p><strong>{{ $project->result_metric }}</strong></p>
                    @endif
                    <a href="{{ route('projects.show', $project) }}">Detay →</a>
                </div>
            @empty
                <p>Henüz proje eklenmedi.</p>
            @endforelse
        </div>
    </div>
</section>
</x-app-layout>
