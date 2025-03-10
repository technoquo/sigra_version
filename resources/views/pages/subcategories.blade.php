<x-app-layout>
    <div class="flex md:flex-row flex-col items-center gap-4 justify-center">         
        @forelse ($subcategories as $subcategory)   
           
            <div class="px-5 py-8">             
                <a href="{{ route('subcategories.show', ['age' => $age, 'category' => $subcategory->category->slug, 'subcategory' => $subcategory->slug]) }}">
                    <img src="{{ asset('storage/' . $subcategory->image) }}" alt="Subcategory Image">
                </a>
            </div>
        @empty
        <div class="container mx-auto p-4">
            <iframe class="w-full aspect-video border-0" width="560" height="315"
                src="https://player.vimeo.com/video/879944724?autoplay=1" allow="autoplay; fullscreen; picture-in-picture"
                title="Vidéos à venir" autoplay></iframe>
        </div>   
        @endforelse
    </div>
</x-app-layout>