<x-app-layout>
    <section
        class="relative bg-top bg-no-repeat bg-[url('https://sigra.lsfb.be/storage/form-attachments/nosactions.jpeg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Bienvenue sur notre site</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Favoriser l'accès
                élargi des enfants et des jeunes à l'information, à la culture, à la littérature, à la santé, aux
                loisirs, et bien d'autres domaines, grâce à la Langue des Signes Francophone de Belgique (LSFB).
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('ages') }}"
                    class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Regarder la vidéotèque
                </a>
            </div>

    </section>


<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12 mb-8">
        
            <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-4">Qui sommes-nous</h1>
            <div>
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/form-attachments/team.jpeg') }}" class="w-2/3"  alt="image">
                </div>
                <div class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">
                    <p class="text-gray-500 dark:text-gray-400 ">SIGRA produit des ressources pédagogiques et culturelles en Langue des Signes Francophone Belge (LSFB) pour les enfants et jeunes sourds. Grâce aux compétences pédagogiques et linguistiques de nos bénévoles, nous proposons un large éventail de ressources, sous forme digitale ou en présentiel, telles que des contes, des histoires, des fables, des récits, des classiques de la littérature, des outils pédagogiques, des formations. Nous nous adressons aux enfants et jeunes sourds, mais nos réalisations peuvent être bénéfiques pour les enfants entendants de parents sourds (CODA) et toute personne désireuse d’apprendre la langue des signes. SIGRA est une section de l’association sans but lucratif Langue des Signes de Belgique Francophone (LSFB asbl).</p>
                </div>
            </div>
            <a href="/qui-sommes-nous" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Plus d'informations
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
         
                <h2 class="text-gray-900  text-3xl font-extrabold mb-2">Origine de Sigra</h2>
                
                <a href="/origine-de-sigra" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Plus d'informations
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
                </a>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
           
                <h2 class="text-gray-900 text-3xl font-extrabold mb-2"> Nos Action</h2>
              
                <a href="/nos-actions" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Plus d'informations
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="grid md:grid-cols-3 md:gap-4 grid-cols-1 mx-auto max-w-screen-xl py-8 px-4">
        @foreach ($instagrams as $instagram)
            <div>
                <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                    src="https://www.instagram.com/p/{{ trim($instagram->code) }}/embed/captioned/?cr=1&amp;v=14&amp;wp=326&amp;rd=http%3A%2F%2Flocalhost%3A8000&amp;rp=%2F#%7B%22ci%22%3A0%2C%22os%22%3A2771.800000000745%2C%22ls%22%3A2376.400000002235%2C%22le%22%3A2762.10000000149%7D"
                    allowtransparency="true" allowfullscreen="true" frameborder="0" height="596"
                    data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                    style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
            </div>
        @endforeach
    </div>
</section>

</x-app-layout>