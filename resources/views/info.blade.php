<x-app-layout>
    <section class="p-4 info">
        <div class="md:flex flex-row max-w-8xl px-4 py-8-screen-xl mx-auto">
            <div class="basis-3/5">
                {!! str($mission->description)->markdown() !!}
            </div>
            <div class="basis-1/2">


                @if ($mission->image)
                    <figure class="max-w-lg">
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $mission->image) }}"
                            alt="{{ $mission->title }}">
                        <figcaption class="mt-2 text-sm text-center">
                            {{ $mission->alt }}</figcaption>
                    </figure>
                @endif

            </div>
        </div>
    </section>
</x-app-layout>