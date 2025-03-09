<x-app-layout>
    <div class="md:flex md:flex-row justify-center flex-wrap gap-4 mt-4">
        @foreach($multimedias as $multimedia)
       
        <div
            class="max-w-sm bg-white border-2  border-green-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">
            <a href="{{ route('monsigra.show',  [$multimedia->video->slug]) }}">
                <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $multimedia->video->vimeo  }}.jpg">
            </a>
            <div class="p-5">
                <input type="hidden" wire:model="video_id" value="{{ $multimedia->video->id }}">
                <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white text-center p-2">
                    {{ $multimedia->video->name }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>