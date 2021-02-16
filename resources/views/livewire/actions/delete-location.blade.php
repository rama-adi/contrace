<div class="md:grid md:grid-cols-3 md:gap-6 mx-auto py-10 sm:px-6 lg:px-8">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900"> Hapus lokasi</h3>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
            <div class="px-4 py-5 sm:p-6">
                <div class="max-w-xl text-sm text-gray-600">
                    Setelah lokasi ini dihapus, anda tidak dapat mengakses data apapun yang ada di lokasi ini, pastikan
                    anda sudah mem backup semua data sebelum menghapus!
                </div>
                <x-jet-danger-button class="mt-4" wire:click="$toggle('showDeleteForm')">Hapus lokasi</x-jet-danger-button>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showDeleteForm">
        <x-slot name="title">
            Delete lokasi
        </x-slot>

        <x-slot name="content">
            Apakah anda yakin ingin menghapus lokasi ini? Anda tidak akan bisa mengembalikan aksi ini.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showDeleteForm')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteLocation" wire:loading.attr="disabled">
                Hapus lokasi
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
