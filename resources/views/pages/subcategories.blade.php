<x-app-layout>
    <div class="flex md:flex-row flex-col items-center gap-4">       
        @forelse ($subcategories as $subcategory)   
           
            <div class="px-5 py-8">             
                <a href="{{ route('subcategories.show', ['age' => $age, 'category' => $subcategory->category->slug, 'subcategory' => $subcategory->slug]) }}">
                    <img src="{{ asset('storage/' . $subcategory->image) }}" alt="Subcategory Image">
                </a>
            </div>
        @empty
            <p>No categories found.</p>
        @endforelse
    </div>
</x-app-layout>