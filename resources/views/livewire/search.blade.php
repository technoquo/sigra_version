<div class="w-full max-w-lg px-1 pt-1">
    <div class="relative">
        <input wire:model.live="search" type="text" id="searchInput" autocomplete="off"
               class="block w-full flex-1 py-2 px-3 mt-2 border border-gray-950 rounded-md bg-slate-100"
               placeholder="Commencez à taper le nom de la vidéo......" />
        <div class="absolute mt-2 w-full overflow-hidden rounded-md bg-white shadow-lg z-10">
            @foreach ($results as $result)
                <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
                    <a href="{{ route('resultat.index', $result->slug) }}"
                       class="text-sm font-medium text-gray-600">{{ $result->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
