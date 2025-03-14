<x-app-layout>
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <iframe class="w-full aspect-video " src="https://player.vimeo.com/video/{{ $video->vimeo }}"
                allow="autoplay; fullscreen; picture-in-picture" title="{{ $video->name }}"></iframe>
            <h1
                class="mt-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                {{ $video->name }}</h1>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 mt-10">
                <a @click.prevent="window.history.back()"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-sigra hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Retourner
                </a>
            </div>
        </div>
    </section>
</x-app-layout>