<x-app-layout>
    <div class="md:flex md:flex-row justify-center flex-wrap gap-4 mt-4">
        @forelse ($multimedias as $multimedia)

        <div
            class="max-w-sm border-2  border-green-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">
            <a href="{{ route('monsigra.show',  [$multimedia->video->slug]) }}">
                <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $multimedia->video->vimeo  }}.jpg">
            </a>
            <div class="p-5">
                <input type="hidden" wire:model="video_id" value="{{ $multimedia->video->id }}">
                <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white text-center p-2">
                    {{ $multimedia->video->name }}</h5>
            </div>
        </div>
        @empty
           <div class="text-2xl font-extrabold tracking-tight leading-none h-screen items-center mt-10">
             <p class="mb-3">Tu n'es pas inscrit en tant que fan de Sigra. </p>
             <p class="mb-3"> Tu dois être membre de Monssigran.</p>
             <p class="mb-3">Contacte l'adresse e-mail lsbf@sigra.com.</p>
           </div>
        @endforelse
    </div>
</x-app-layout>