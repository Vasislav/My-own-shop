@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.3/dist/sweetalert2.min.css" rel="stylesheet">
<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.3/dist/sweetalert2.min.js"></script>
@section('content')
    <!-- Hero Section with Image and Gradient -->
    <div class="relative h-screen">
        <!-- Obrázek na pozadí -->
        <img src="https://imgs.search.brave.com/ko2Q7ZOGLlqvLvF_YRANMCfq0u33Z5RmFO9DCe4WCQw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/cHJvZC53ZWJzaXRl/LWZpbGVzLmNvbS81/YTllZTY0MTZlOTBk/MjAwMDFiMjAwMzgv/NjI4OWYwYmZhOTIw/YTk1OGYyYjQxNmY3/X2JsYWNrLWdyYWRp/ZW50LnBuZw" 
            alt="Vítejte" 
            class="absolute inset-0 object-cover w-full h-3/4 z-0">

        <!-- Přechodový gradient -->
        <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-50 z-10"></div>

        <!-- Text vycentrovaný přes obrázek -->
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <h1 class="text-white text-5xl font-bold text-center">Vítejte na naší stránce!</h1>
        </div>
    </div>

  <!-- Why Choose Us Section -->
  <div class="py-10 text-center bg-gray-100">
        <h2 class="text-3xl font-semibold">Proč nakupovat u nás?</h2>
        <p class="mt-4 text-lg text-gray-700">Nabízíme nejlepší produkty za nejlepší ceny!</p>
        <div class="mt-6 flex flex-wrap justify-center gap-6">
            <div class="bg-white shadow-md rounded-lg p-6 max-w-xs">
                <div class="flex justify-center">
                    <x-heroicon-o-truck class="h-16 w-16" ></x-heroicon-o-truck>
                </div>
                <h3 class="text-lg font-bold">Rychlá Doprava</h3>
                <p class="mt-2">Zaručujeme rychlé dodání vašich objednávek.</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 max-w-xs">
                <div class="flex justify-center">
                    <x-iconsax-bro-sidebar-right class="h-16 w-16" ></x-iconsax-bro-sidebar-right>
                </div>
                <h3 class="text-lg font-bold">Kvalitní Produkty</h3>
                <p class="mt-2">Naše produkty procházejí důkladným výběrem kvality.</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 max-w-xs">
                <div class="flex justify-center">
                    <x-gmdi-support-agent-o class="h-16 w-16" ></x-gmdi-support-agent-o>
                </div>
                <h3 class="text-lg font-bold">Zákaznická Podpora</h3>
                <p class="mt-2">Jsme tu pro vás, abychom zodpověděli všechny vaše dotazy.</p>
            </div>
            <style>
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out;
    }
</style>
        </div>
    </div> 

   <!-- Products Horizontal Scroll Section -->
   <div class="py-10">
        <h2 class="text-3xl font-semibold text-center text-white">Naše Produkty</h2>
        <div class="mt-6">
            <!-- Kontejner s horizontálním scrollem pouze pro produkty -->
            <div class="overflow-x-auto">
                <div class="flex space-x-4">
                    @foreach($products as $product)
                        <div class="flex-shrink-0 w-64">
                            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col justify-between h-auto">
                                <!-- Obrázek produktu -->
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-48">
                                
                                <!-- Obsah karty -->
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-black">{{ $product->name }}</h3>
                                        <!-- Popis s omezenou výškou, min-height a max-height -->
                                        <p class="mt-2 text-gray-600 overflow-hidden line-clamp-3" style="min-height: 60px; max-height: 120px;">{{ $product->description }}</p>
                                    
                                        <p class="mt-2 font-bold">{{ number_format($product->price, 2) }} Kč</p>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary inline-block px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 transition">Zobrazit detaily</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Contact Form Section -->
    <div class="py-10">
        <h2 class="text-3xl font-semibold text-center text-white">Kontaktní formulář</h2>
        <form class="max-w-md mx-auto mt-4 p-6 bg-white shadow-md rounded-lg" action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Jméno</label>
                <input type="text" id="name" name="name" class="border border-gray-300 rounded-md w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" id="email" name="email" class="border border-gray-300 rounded-md w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Zpráva</label>
                <textarea id="message" name="message" class="border border-gray-300 rounded-md w-full p-2" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition duration-200">Odeslat</button>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
            },
            loop: true, // Přidá loop efekt
        });
    </script>
@endpush