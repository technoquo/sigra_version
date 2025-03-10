<x-app-layout>
    <div class="container mx-auto">
        <div class="mt-4 mb-6 md:mb-8 lg:mb-10">
            <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mt-4">Connectez-vous avec nous. Nous sommes prêts à vous aider avec plaisir</h2>
        </div>
        <div class="contact flex flex-col md:flex-row px-8 py-8">
            <div class="md:w-1/3 mb-4 md:mb-0">
                <img class="rounded-lg w-full" src="storage/form-attachments/team.jpeg" alt="team">
            </div>
            
            <div class="md:w-1/4">
                <div class=" bg-[#D9D491] flex justify-center p-1 md:p-10 lg:p-5  md:w-52  -ml-3 md:-ml-6 mt-7">
                    <img class="logo_sigra" src="{{ asset('images/logo_sigra.jpg') }}" alt="logotipo">
                </div>
            </div>
            <div class="md:w-1/2 text-base md:text-xl lg:text-2xl text-center">
                <p class="general-contact mb-2">
                    <strong>Nous contacter</strong>
                </p>
                <div class="mb-2 md:mb-3 lg:mb-6">
                    <a href="https://www.google.com/maps/place/Malabar+Design/@48.8665485,2.4173015,15z/data=!4m5!3m4!1s0x0:0xa780f23fcfd23194!8m2!3d48.8665485!4d2.4173015"
                        target="_blank" class="text-black block md:inline lg:block">
                        Rue du lombard, 8 5000 Namur
                    </a>
                </div>
                <div class="mb-2 md:mb-4 lg:mb-6">
                    <a href="mailto:sigra@lsfb.be" target="_blank" class="text-black block md:inline lg:block">
                        <span>sigra@lsfb.be</span>
                    </a>
                </div>
                <div>
                    <a href="https://www.google.com/maps/place/Malabar+Design/@48.8665485,2.4173015,15z/data=!4m5!3m4!1s0x0:0xa780f23fcfd23194!8m2!3d48.8665485!4d2.4173015"
                        target="_blank" class="text-black block md:inline lg:block">
                        <span>
                            <svg class="icon map-marker inline-block w-4 h-4" viewBox="0 0 2.343 3.539"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.171 0C.524 0 0 .604 0 1.251c0 .294 1.171 2.288 1.171 2.288s1.172-1.993 1.172-2.288C2.343.604 1.818 0 1.171 0zm0 1.773a.6.6 0 1 1 0-1.2.6.6 0 0 1 0 1.2z"
                                    class=""></path>
                            </svg>
                            Google Maps
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>