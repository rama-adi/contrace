<div>
    <button wire:click="$toggle('showSharebox')"
            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        <x-heroicon-o-external-link class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
        <span>Bagikan link</span>
    </button>

    <x-jet-confirmation-modal iconColor="blue" wire:model="showSharebox">
        <x-slot name="icon">
            <x-heroicon-o-external-link class="h-6 w-6 text-blue-600"/>
        </x-slot>
        <x-slot name="title">
            Bagikan link!
        </x-slot>

        <x-slot name="content">
            <p>Bagikan link dibawah agar pelanggan anda dapat mengisi formulir contact tracing!</p>

            <div class="mt-4">
                <div>
                    <label for="share_link" class="block text-sm font-medium text-gray-700">Link</label>
                    <div
                        x-data="{ shareText: 'Salin!', shareURL: '{{route('locations.show_public', ['team' => $team->id, 'location' => $location->slug])}}' }"
                        class="mt-1 flex rounded-md shadow-sm">
                        <div class="relative flex items-stretch flex-grow focus-within:z-10">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/users -->
                                <x-heroicon-o-link class="h-5 w-5 text-gray-400"/>
                            </div>
                            <input onclick="this.select()" type="text" name="share_link" id="share_link"
                                   class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300"
                                   x-model="shareURL">
                        </div>
                        <button
                            @click="window.navigator.clipboard.writeText(shareURL); shareText = 'Disalin!'; setTimeout(function() {
                              shareText = 'Salin!';
                            }, 2000)"
                            class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                            <!-- Heroicon name: solid/sort-ascending -->
                            <x-heroicon-o-clipboard-copy class="h-5 w-5 text-gray-400"/>
                            <span x-text="shareText">Salin!</span>
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('showSharebox')" wire:loading.attr="disabled">
                Batalkan
            </x-jet-danger-button>

        </x-slot>
    </x-jet-confirmation-modal>
</div>
