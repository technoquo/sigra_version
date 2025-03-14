<x-app-layout>

    <nav class="flex justify-center mt-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('categories.index', ['slug' => $age]) }}" class="inline-flex items-center text-sm font-medium text-black hover:text-blue-600 ">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                     {{$age}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                   {{$subcategories[0]['name']}}
                </div>
            </li>

        </ol>
    </nav>
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
    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 mt-10 mb-10">
        <a x-data @click.prevent="history.back()"
           class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-400
                 hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Retourner
        </a>
    </div>
</x-app-layout>
