<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpine-turbo-drive-adapter@1.0.x/dist/alpine-turbo-drive-adapter.min.js"
            defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    @stack('styles')

</head>
<body class="font-sans antialiased">
<div class="h-screen flex overflow-hidden bg-gray-50" x-data="{ sidebarOpen: false }"
     @keydown.window.escape="sidebarOpen = false">
@livewire('navigation-menu')
<!-- Main column -->

    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
            <button x-description="Sidebar toggle, controls the &apos;sidebarOpen&apos; sidebar state."
                    @click.stop="sidebarOpen = true"
                    class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" x-description="Heroicon name: menu-alt-1" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
            </button>
            <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                <div class="flex-1 flex items-center">
                {{$header}}
                <!-- Freely add more content here -->
                </div>
                <div class="flex items-center">
                    <x-app-layouts.profile-dropdown/>
                </div>
            </div>
        </div>
        <main class="flex-1 relative overflow-y-auto focus:outline-none" tabindex="0">
            <livewire:ui.ig-cta />
            <div class="hidden lg:block" style="z-index: 100;">
                <div
                    class="border-b bg-white border-gray-200 px-2 py-4 sm:flex sm:items-center sm:justify-between sm:px-2 lg:px-4">
                    <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                        <div class="flex-1 flex items-center">
                            {{$header}}
                        </div>
                        <div class="flex items-center">
                            <x-app-layouts.profile-dropdown/>
                        </div>
                    </div>
                </div>
            </div>
            <div id="maincontainer" class="py-4 sm:px-6 lg:px-8 mt-6" style="z-index: 0">
                @if (session('successState'))
                    <div class="mb-4">
                        <div class="alert alert-success">
                            <div class="bg-green-50 border-l-4 border-green-400 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: solid/exclamation -->
                                        <x-heroicon-o-check-circle class="h-5 w-5 text-green-400"/>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-green-700">
                                            {{ session('successState') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{ $slot ?? null }}
                @stack('modals')
            </div>
        </main>
    </div>

</div>


@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
@stack('scripts')
</body>
</html>
