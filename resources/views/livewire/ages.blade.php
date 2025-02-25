<section class="grid sm:grid-col-1 md:grid-cols-4  md:gap-4 grid-cols-1 place-items-center"> <!-- Added place-items-center -->
    @foreach ($this->ages as $age)
    
        <div class="px-5 py-8 text-center"> <!-- Added text-center -->
            <a href="">
                <img class="aspect-auto mx-auto" src="{{ $age->getThumbnailUrl() }}"> <!-- Added mx-auto -->
            </a>
        </div>
    @endforeach


    {{-- @foreach ($this->pocorns as $pocorn)
   
        <div class="px-5 py-8 text-center"> <!-- Added text-center -->
            <a href="{{ route('signs-popcorn') }}">
                <img class="md:w-[250px] aspect-auto mx-auto" src="{{ $pocorn->getThumbnailUrl() }}"> <!-- Added mx-auto -->
            </a>                
        </div>
  
@endforeach --}}

    {{-- @foreach ($this->categories as $category)
        @if($category->membership === 1)
            <div class="px-5 py-8 text-center"> <!-- Added text-center -->
                <a href="{{ route('monsigra.index') }}">
                    <img class="md:w-[250px] aspect-auto mx-auto" src="{{ $category->getThumbnailUrl() }}"> <!-- Added mx-auto -->
                </a>                
            </div>
        @endif
    @endforeach --}}
</section>