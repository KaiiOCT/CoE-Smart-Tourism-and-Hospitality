<x-app-layout>
    <div class="">
        <livewire:admin.components.search-input
            :search="$search"
            placeholder="Cari Berita" />
        @if (count($news) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($news as $article)
            <livewire:admin.activity.news.news-card
                :news="$article"
                wire:key="{{ $article->id }}" />
            @endforeach
        </div>
        @else
        <livewire:admin.components.empty-data />
        @endif
    </div>

</x-app-layout>