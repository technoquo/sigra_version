<x-app-layout>
    <div class="text-center  py-4">
        <h1 class="text-center font-bold text-3xl mt-4">La Boutique</h1>
    </div>
    <div class="md:flex md:flex-row justify-center flex-wrap">
        @foreach ($boutiques as $boutique)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow px-5 py-8 m-6">

                <img class="rounded-t-lg" src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->title }}" />

                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $boutique->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 text-3xl">
                        <span class="font-semibold">€</span>
                        {{ $boutique->price }}
                    </p>
                    <a href="{{ $boutique->url }}" target="_blank"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Je vex acheter !

                    </a>
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>