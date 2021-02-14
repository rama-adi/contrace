<div x-show="sidebarOpen" class="lg:hidden"
     x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state.">
    <div class="fixed inset-0 flex z-40">
        <div @click="sidebarOpen = false" x-show="sidebarOpen"
             x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0"
             aria-hidden="true">
            <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>
        <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state."
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
             class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button x-show="sidebarOpen" @click="sidebarOpen = false"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" x-description="Heroicon name: x"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-shrink-0 flex items-center">
                <x-jet-application-logo class="px-4 h-8 w-auto"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div x-data="{ false }" @keydown.escape="open = false" @click.away="open = false"
                     class="px-3 mt-6 relative inline-block text-left">
                    <div x-description="Dropdown menu toggle, controlling the show/hide state of dropdown menu.">
                        <button @click="open = !open" type="button"
                                class="group w-full bg-white rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200"
                                id="options-menu" aria-haspopup="true" aria-expanded="true"
                                x-bind:aria-expanded="open">
                                <span class="flex w-full justify-between items-center">
                                 <span
                                     class="text-gray-900 text-sm font-medium truncate">{{ Auth::user()->currentTeam->name }}</span>
                                  <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                       x-description="Heroicon name: selector" xmlns="http://www.w3.org/2000/svg"
                                       viewBox="0 0 20 20"
                                       fill="currentColor" aria-hidden="true">
                                      <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                  </svg>
                                </span>
                        </button>
                    </div>
                    <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state."
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200"
                         role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5">
                            <!-- Team Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link
                                href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2">
                    <div class="space-y-1">
                        <x-app-layouts.sidebar-items/>
                    </div>
                </nav>
            </div>
        </div>
        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
        <div class="flex items-center flex-shrink-0 px-6">
            <x-jet-application-logo/>
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div x-data="{ false }" @keydown.escape="open = false" @click.away="open = false"
                     class="px-3 mt-6 relative inline-block text-left">
                    <div x-description="Dropdown menu toggle, controlling the show/hide state of dropdown menu.">
                        <button @click="open = !open" type="button"
                                class="group w-full bg-white rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200"
                                id="options-menu" aria-haspopup="true" aria-expanded="true"
                                x-bind:aria-expanded="open">
                                <span class="flex w-full justify-between items-center">
                                 <span
                                     class="text-gray-900 text-sm font-medium truncate">{{ Auth::user()->currentTeam->name }}</span>
                                  <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                       x-description="Heroicon name: selector" xmlns="http://www.w3.org/2000/svg"
                                       viewBox="0 0 20 20"
                                       fill="currentColor" aria-hidden="true">
                                      <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                  </svg>
                                </span>
                        </button>
                    </div>
                    <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state."
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200"
                         role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="w-60 rounded-md ring-1 ring-black ring-opacity-5">
                            <!-- Team Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link
                                href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <nav class="px-3 mt-6">
                <div class="space-y-1">
                    <x-app-layouts.sidebar-items/>
                </div>
            </nav>
        </div>
    </div>
</div>

