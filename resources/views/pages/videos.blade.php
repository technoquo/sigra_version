<x-app-layout>
    <div class="md:flex md:flex-row justify-center flex-wrap gap-4 mt-4">
        @foreach($multimedias as $multimedia)
        <div class="max-w-sm  border-2  border-solid rounded-lg shadow bg-gray-800 border-gray-700 m-4">
            <a href="{{ route('vimeo', ['age' => $age, 'category' => $subcategory, 'subcategory' => $subcategory,  $multimedia->video->slug ]) }}">
                <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $multimedia->video->vimeo  }}.jpg">
            </a>
            <div class="p-5">
                <h5 class="mb-2 text-base font-bold tracking-tight text-white justify-center text-center p-2">
                    {{ mb_strlen($multimedia->video->name) > 30 ? mb_substr($multimedia->video->name, 0, 30) . '...' : $multimedia->video->name }}</h5>
            </div>
        </div>
        @endforeach
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
