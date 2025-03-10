

<nav class="bg-[#d9d494] border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img class="w-20 h-auto rounded-full" src="{{ asset('images/logo_sigra.jpg') }}"  alt="Flowbite Logo" />
        
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        @guest


        <div class="flex space-x-5">
            <a class="flex space-x-2 items-center hover:text-yellow-500  text-gray-500" href="/login">
                Se connecter
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>

            </a>
        </div>
    @endguest

    @auth
        <div class="ml-3 relative space-x-4">
            @can('view-admin', App\Models\User::class)
                <x-nav-link :navigate='false' href="{{ route('filament.admin.auth.login') }}" :active="request()->routeIs('filament.admin.auth.login')">
                    {{ __('Admin') }}
                </x-nav-link>
            @endcan
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Gérer le compte') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profil') }}
                    </x-dropdown-link>

                    <x-dropdown-link href="{{ route('monsigra') }}">
                        {{ __('Mon Sigra Fan 2020') }}
                    </x-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Se déconnecter') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @endauth
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
        <li>
          <a href="/" class="block md:p-0 py-2 px-3 bg-blue-700 rounded-sm md:bg-transparent {{ request()->routeIs('home') ? ' text-black ' : ' text-blue-700' }}">Accueil</a>
        </li>
        <li>
            <a href="{{ route('ages') }}" class="block md:p-0 py-2 px-3 bg-blue-700 rounded-sm md:bg-transparent {{ request()->routeIs('ages') ? ' text-black ' : ' text-blue-700' }}">Videoteques</a>
        </li>
        <li>
            <a href="{{ route('boutique.index')}}" class="block md:p-0 py-2 px-3 bg-blue-700 rounded-sm md:bg-transparent {{ request()->routeIs('boutique.index') ? ' text-black ' : ' text-blue-700' }}">La boutique</a>
        </li>       
        <li>
            <a href="{{ route('contact.index')}}" class="block md:p-0 py-2 px-3 bg-blue-700 rounded-sm md:bg-transparent {{ request()->routeIs('contact.index') ?  ' text-black ' : ' text-blue-700' }}">Contact</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  