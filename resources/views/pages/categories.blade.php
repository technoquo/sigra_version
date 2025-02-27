<x-app-layout>
    <div class="flex md:flex-row flex-col items-center gap-4">       
        @forelse ($categoryAges as $category)       
            <div class="px-5 py-8">
                <a href="{{ route('subcategories.index', ['age' => $slug, 'category' => $category->category->slug]) }}">
                    <img src="{{ asset('storage/' . $category->category->image) }}">
                </a>
            </div>
            @empty
            <p>No categories found.</p>
        @endforelse    
    </div>
</x-app-layout>