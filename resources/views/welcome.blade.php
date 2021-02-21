<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
</head>
<body>

@if(\Illuminate\Support\Facades\Auth::check())
    <livewire:ui.ig-cta />
@endif

<section class="bg-white">
    <header>
        <div class="flex flex-col flex-wrap items-center px-8 py-6 mx-auto max-w-7xl md:flex-row">
            <a href="#_"
               class="flex items-center order-first mb-4 font-medium text-gray-900 lg:order-none lg:w-auto title-font lg:items-center lg:justify-center md:mb-0">
                <x-jet-application-logo class="h-8"/>
            </a>
            <nav class="flex flex-wrap items-center justify-center text-base font-bold tracking-tight md:ml-auto">
                @guest
                    <a href="{{route('login')}}" class="mr-5 hover:text-gray-900">Punya akun?</a>
                @else
                    <a href="{{route('dashboard')}}" class="mr-5 hover:text-gray-900">Dashboard anda</a>
                @endguest
            </nav>
            @guest
                <a href="{{route('register')}}"
                   class="inline-flex items-center px-3 py-2 mt-4 text-sm font-bold text-gray-700 bg-gray-200 border-0 rounded focus:outline-none hover:bg-gray-300 md:mt-0">
                    Daftar gratis!
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            @endguest
        </div>
    </header>

    <div class="max-w-3xl mx-8 mt-4 lg:mx-auto md:mt-16">
        <h1 class="mb-8 text-3xl font-bold leading-tight tracking-tight sm:text-4xl md:text-5xl" id="">Apakah bisnis
            anda sudah siap untuk wabah selanjutnya?</h1>
        <h2 class="inline-block px-2 mb-4 text-base font-semibold leading-normal tracking-wide text-gray-800 bg-yellow-200 sm:text-lg">
            Bisnis anda harus melakukan contact tracing!</h2>
        <p class="mb-8 text-base font-light leading-relaxed text-gray-700 sm:text-lg" id="">Contact tracing dapat
            membantu anda mengidentifikasi dan mengambil aksi terhadap COVID-19 dengan cepat.</p>
        @guest
            <a href="{{route('register')}}"
               class="inline-flex items-center px-4 py-2 mr-1 font-bold text-white bg-blue-500 rounded hover:bg-blue-600">
                Coba gratis → </a>
            <a href="{{route('login')}}"
               class="inline-flex items-center px-4 py-2 font-bold text-gray-700 lowercase bg-gray-200 rounded hover:bg-gray-300 hover:text-gray-900">
                Punya akun? </a>
        @else
            <a href="{{route('dashboard')}}"
               class="inline-flex items-center px-4 py-2 font-bold text-gray-700 lowercase bg-gray-200 rounded hover:bg-gray-300 hover:text-gray-900">
                Ke dashboard </a>
        @endguest
    </div>

    <div
        class="h-48 max-w-4xl mx-8 mt-16 overflow-hidden text-white lowercase bg-transparent border-2 border-b-0 border-gray-200 lg:mx-auto rounded-t-xl sm:h-64 md:h-96">
        <img src="{{asset('images/promotion/contrace-hero-1.png')}}">
    </div>
</section>


<section class="w-full px-8 pt-20 pb-16 bg-white xl:px-0">
    <div class="flex flex-col items-start max-w-6xl mx-auto md:flex-row">
        <h3 class="w-full text-4xl font-extrabold tracking-normal text-gray-900 sm:text-5xl md:text-5xl md:pr-10 lg:pr-16 xl:pr-20 md:leading-none md:-mt-2 md:w-1/2"
            id="">Kami disini untuk membantu</h3>
        <div class="flex flex-col w-full mt-8 space-y-5 md:w-1/2 md:space-y-10 md:mt-0">
            <p class="col-span-6 text-base font-normal text-gray-700 lg:leading-8 xl:leading-8 md:text-xl" id="">Di masa
                COVID seperti ini, bisnis sudah harus siap siaga dalam menangani COVID, salah satunya dengan melakukan
                contact tracing.</p>

            <p class="col-span-6 text-base font-normal text-gray-700 lg:leading-8 xl:leading-9 md:text-xl">Namun,
                membuat contact tracing sangatlah rumit. Tapi dengan contrace, anda dapat membuat contact tracing dalam
                hitungan menit. Data tersimpan di cloud dengan aman, sehingga semuanya dapat dengan mudah diakses</p>

        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="flex flex-col px-8 mx-auto space-y-12 max-w-7xl xl:px-12">
        <div class="relative">
            <h2 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl" id="">Contact Tracing untuk
                mempermudah mengambil aksi</h2>
            <p class="w-full py-8 mx-auto -mt-2 text-lg text-center text-gray-700 intro sm:max-w-3xl">Contrace
                memberikan alat contact tracing untuk pemilik bisnis, sehingga bisnis dapat mengumpulkan data pengunjung
                dan mengelola resiko dengan mudah</p>
        </div>
        <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
            <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last"><img class="rounded-lg shadow-xl"
                                                                                      src="{{asset('images/promotion/contrace-form-hero.png')}}"
                                                                                      alt=""></div>
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-blue-600 uppercase">Data contact
                    tracing akurat</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl" id="">Contrace Form</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left" id="">Dengan contrace form, anda dapat
                    mengumpulkan data penting seperti nama dan lokasi saat ini dengan mudah</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
            <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12"><img class="rounded-lg shadow-xl"
                                                                        src="{{asset('images/promotion/contrace-teams-hero.png')}}"
                                                                        alt=""></div>
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pl-16" id="">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-blue-600 uppercase">Cocok untuk bisnis
                    semua ukuran</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl" id="">Untuk bisnis kecil maupun besar</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left" id="">Hanya memiliki satu outlet atau memiliki
                    puluhan outlet? Mengerjakannya sendiri atau bersama tim? Kami dapat membantu anda.</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
            <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last"><img class="rounded-lg shadow-xl"
                                                                                      src="{{asset('images/promotion/contrace-trace-hero.png')}}"
                                                                                      alt=""></div>
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-blue-600 uppercase">Aman saat
                    pandemi</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl" id="">Pelanggan lebih nyaman</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left">Mengimplementasikan contact tracing dapat
                    membuat lokasi bisnis anda lebih aman, sehingga pelanggan lebih nyaman berada di outlet anda.</p>
            </div>
        </div>

    </div>
</section>


<section class="py-8 leading-7 text-gray-900 bg-white sm:py-12 md:py-16 lg:py-24">
    <div class="max-w-6xl px-4 px-10 mx-auto border-solid lg:px-12">
        <div
            class="flex flex-col items-start leading-7 text-gray-900 border-0 border-gray-200 lg:items-center lg:flex-row">
            <div class="box-border flex-1 text-center border-solid sm:text-left">
                <h2 class="m-0 text-4xl font-semibold leading-tight tracking-tight text-left text-black border-0 border-gray-200 sm:text-5xl"
                    id="">Sedia payung sebelum hujan</h2>
                <p class="mt-2 text-xl text-left text-gray-900 border-0 border-gray-200 sm:text-2xl" id="">Lindungi
                    bisnis anda dengan contrace, gratis!</p>
            </div>
            <a href="{{route('register')}}"
               class="inline-flex items-center justify-center w-full px-5 py-4 mt-6 ml-0 font-sans text-base leading-none text-white no-underline bg-blue-600 border border-blue-600 border-solid rounded cursor-pointer md:w-auto lg:mt-0 hover:bg-blue-700 hover:border-blue-700 hover:text-white focus-within:bg-blue-700 focus-within:border-blue-700 focus-within:text-white sm:text-lg lg:ml-6 md:text-xl">
                Daftar gratis
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</section>


<footer class="bg-white">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
            <div class="px-5 py-2">
                <a href="https://instagram.com/its.ramaadi"
                   class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    © 2021 Rama Adi Nugraha
                </a>
            </div>
        </nav>
    </div>
</footer>

@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
</body>
</html>
