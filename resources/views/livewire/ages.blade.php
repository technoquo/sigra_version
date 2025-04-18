<section class="grid sm:grid-col-1 md:grid-cols-4  md:gap-4 grid-cols-1 place-items-center">
    <!-- Added place-items-center -->
    @foreach ($this->ages as $age)

    <div class="px-5 py-8 text-center">
        <!-- Added text-center -->
        <a href="{{ route('categories.index', ['slug' => $age->name]) }}">
            <img class="aspect-auto mx-auto" src="{{ asset('storage/' . $age->image) }}"> <!-- Added mx-auto -->
        </a> 
    </div>
    @endforeach



    @foreach ($this->pocorns as $pocorn)

    <div class="px-5 py-8 text-center">
        <!-- Added text-center -->
        <a href="{{ route('sigpop')}}">
            <img class="md:w-[250px] aspect-auto mx-auto" src="{{ asset('storage/' . $pocorn->image) }}"> <!-- Added mx-auto -->
        </a>
    </div>

    @endforeach
    @auth
        @foreach ($this->categories as $category)
        @if($category->type == 'affiliations') {{-- Added this line user memberships --}}
        <div class="px-5 py-8 text-center">
            <!-- Added text-center -->
            <a href="{{ route('monsigra')}}">
                <img class="md:w-[250px] aspect-auto mx-auto" src="{{ asset('storage/' . $category->image) }}"> <!-- Added mx-auto -->
                <!-- Added mx-auto -->
            </a>
        </div>
        @endif
        @endforeach
    @endauth
</section>
