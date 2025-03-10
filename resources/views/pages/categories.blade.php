<x-app-layout>
    <div class="flex md:flex-row flex-col items-center gap-4 justify-center">       
        @forelse ($categoryAges as $category) 
                
            <div class="px-5 py-8">
                @if ($category->category->url)
                <a href="{{$category->category->url }}" target="_blank">                    
                @else
                <a href="{{ route('subcategories.index', ['age' => $slug, 'category' => $category->category->slug]) }}">
                @endif              
                    <img src="{{ asset('storage/' . $category->category->image) }}" alt="Category Image">
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