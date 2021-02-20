<div>
    @if($pageNo === 1)
        <div>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-gray-50 sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Mengenai bisnis ini / <i>About this business</i>
                    </h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                        {!! Purify::clean($location->body) !!}
                    </div>
                </div>
            </div>

            <form wire:submit.prevent="submit">
                <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <div>
                                <label for="phone_no" class="block text-sm font-medium text-gray-700 mb-2">Nomor
                                    telepon / <i>Phone number</i></label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                          (+62)
                                        </span>
                                    <input type="tel" required maxlength="11"
                                           wire:model.lazy="form.phone_no"
                                           id="phone_no"
                                           class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"
                                           placeholder="Nomor telepon / phone no">
                                </div>
                                <x-jet-input-error for="form.phone_no"/>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama di KTP / <i>Name
                                        on your ID</i></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <!-- Heroicon name: solid/mail -->
                                        <x-heroicon-o-user class="h-5 w-5 text-gray-400"/>
                                    </div>
                                    <input type="text" required wire:model.lazy="form.name" id="name"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md"
                                           placeholder="Nama anda / your name">
                                </div>
                                <x-jet-input-error for="form.name"/>

                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <div>
                                <label for="citizen_no" class="block text-sm font-medium text-gray-700">NIK / <i>ID
                                        Number</i></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <!-- Heroicon name: solid/mail -->
                                        <x-heroicon-o-identification class="h-5 w-5 text-gray-400"/>
                                    </div>
                                    <input type="text" wire:model.lazy="form.citizen_no" type='number' pattern='.{16}'
                                           maxlength="16" required
                                           id="citizen_no"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md"
                                           placeholder="NIK KTP / ID Number">
                                </div>
                                <x-jet-input-error for="form.citizen_no"/>

                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <div>
                                <label for="people_amount" class="block text-sm font-medium text-gray-700">Jumlah
                                    pendamping / <i>People amount</i></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <!-- Heroicon name: solid/mail -->
                                        <x-heroicon-o-identification class="h-5 w-5 text-gray-400"/>
                                    </div>
                                    <select id="people_amount" wire:model.lazy="form.people_amount"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md">
                                        @foreach(range(1, $location->max_company) as $company)
                                            @if($loop->first)
                                                <option value="1">Sendiri / By yourself</option>
                                            @else
                                                <option value="{{$company}}">{{$company}} orang / {{$company}}
                                                    person
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <x-jet-input-error for="form.people_amount"/>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <div>
                                <label for="people_amount" class="block text-sm font-medium text-gray-700">Izinkan akses
                                    lokasi
                                    / <i>Allow location data</i></label>
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="rounded-md bg-yellow-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: solid/exclamation -->
                                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-yellow-800">
                                                Perhatian / <i>Attention</i>!
                                            </h3>
                                            <div class="mt-2 text-sm text-yellow-700">
                                                <p>
                                                    Klik tombol <b>allow / izinkan</b> pada notifikasi yang muncul
                                                    setelah
                                                    mengklik tombol dibawah! (<i>Please click on <b>"allow"</b> on the
                                                        notification that appears after you click the button below</i>)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-jet-input-error for="form.pos_lat"/>
                                <div wire:ignore>
                                    <div id="locationAccessButton">
                                        <x-jet-button type="button" onclick="getMarkerGeo()" class="w-full mt-2">
                                            <x-heroicon-o-location-marker
                                                class="animate-pulse mr-4 h-5 w-5 text-white"/>
                                            Izinkan akses lokasi / <i>Allow location access</i></x-jet-button>
                                    </div>
                                    <div id="locationAccessButtonSuccess" style="display: none;">
                                        <x-jet-button type="button" disabled class="w-full mt-2">
                                            <x-heroicon-o-location-marker
                                                class="animate-pulse mr-4 h-5 w-5 text-white"/>
                                            Berhasil mendapatkan lokasi / <i>Location fetched successfully</i>
                                        </x-jet-button>
                                    </div>
                                    <div id="failedToGetLocationData" style="display: none"
                                         class="w-full mt-2 text-red-500">
                                        <p>Kami gagal mendapatkan lokasi anda, mohon ikuti langkah <a
                                                class="text-blue-500 underline"
                                                href="https://support.google.com/websearch/answer/179386?co=GENIE.Platform%3DAndroid&hl=id#zippy=%2Cuntuk-situs">ini</a>
                                            untuk menyalakan akses lokasi situs anda lagi</p>
                                        <p><i>Failed to get your location, please follow <a
                                                    class="text-blue-500 underline"
                                                    href="https://support.google.com/websearch/answer/179386?co=GENIE.Platform%3DAndroid&hl=en#zippy=%2Cuntuk-situs%2Cfor-a-website">This</a>
                                                guide to enable location access</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="bg-gray-50 border-l-4 border-gray-400 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3 text-gray-700">
                                        {!! Purify::clean($location->agreement) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dl>
                </div>
                <div class="w-full text-center mt-4 text-sm text-gray-600"><p>Powered by CONTRACE / <a
                            class="text-blue-400 hover:text-blue-700 underline hover:no-underline"
                            href="{{route('login')}}">Buat laman contact tracing anda sekarang, gratis!</a></p></div>
                <div class="mt-4">
                    <x-jet-button wire:loading.attr="disabled"
                                  class="justify-between w-full py-4 text-lg rounded-t-md rounded-b-none">
                        <span wire:loading.remove>Check in</span>
                        <x-heroicon-o-arrow-right wire:loading.remove class="animate-pulse ml-4 h-5 w-5 text-white"/>
                        <span wire:loading class="text-gray-700">Mengirim data...</span>
                        <svg wire:loading class="animate-spin h-5 w-5 text-white mr-2 text-gray-700"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </x-jet-button>
                </div>
            </form>
            <script>
                function getMarkerGeo() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                        @this.set('form.pos_lat', position.coords.latitude);
                        @this.set('form.pos_long', position.coords.longitude);
                            document.getElementById('locationAccessButton').setAttribute('style', 'display: none;');
                            document.getElementById('locationAccessButtonSuccess').setAttribute('style', 'display: block;');
                        }, function () {
                            document.getElementById('failedToGetLocationData').setAttribute('style', 'display: block;');

                        @this.set('form.pos_lat', 0);
                        @this.set('form.pos_long', 0);
                        })
                    } else {
                    @this.set('form.pos_lat', 0);
                    @this.set('form.pos_long', 0);
                    }
                }
            </script>
        </div>
    @endif

    @if($pageNo === 2)
        <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
            <div class="p-4 border-2 border-dashed border-gray-300 ">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="sm:flex">
                    <div class="mb-4 flex-shrink-0 sm:mb-0 sm:mr-4">
                        <img src="{{asset('confirm.svg')}}" class="h-32 w-full sm:w-32 bg-white text-gray-300" alt="">
                    </div>
                    <div>
                        <h4 class="text-lg font-bold">Formulir contact tracing telah diisi</h4>
                        <small class="font-medium text-gray-500 italic">Contact tracing form is filled</small>
                        <p class="mt-1">
                            Terimakasih sudah mengisi formulir contact tracing, anda bisa menutup laman ini dan memasuki
                            outlet sekarang. <br>
                            <i>Thank you for filling the contact tracing form, you may close this form and enter now</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full text-center mt-4 text-sm text-gray-600 mb-10"><p>Powered by CONTRACE / <a
                    class="text-blue-400 hover:text-blue-700 underline hover:no-underline"
                    href="{{route('login')}}">Buat laman contact tracing anda sekarang, gratis!</a></p></div>
    @endif
</div>
