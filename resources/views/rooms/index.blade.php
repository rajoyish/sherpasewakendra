<x-app-layout>
    <div class="text:lg bg-white">
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12">
                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                    <h2 class="text-monk-red text-center text-3xl font-extrabold tracking-tight sm:text-4xl">
                        Dharmashala’s Rooms
                    </h2>
                </div>
                <div role="list"
                     class="space-y-12 sm:grid sm:grid-cols-1 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-2 lg:gap-x-8">
                    <!-- Room Card -->
                    @foreach($rooms as $room)
                        <div>
                            <img alt="Room of {{ $room->name }}"
                                src="/images/rooms_img/{{ $room->photo }}"
                                class="w-full rounded-lg object-cover object-center shadow-md"
                            />

                            <div class="relative -mt-10 px-2 md:px-4">
                                <div class="rounded-lg bg-white p-4 shadow-lg md:p-8">
                                    <h4 class="truncate text-3xl font-semibold text-center">{{ $room->name }}</h4>

                                    <div class="my-8 grid grid-cols-2 gap-2">

                                        <!-- Bed -->
                                        <div class="inline-flex flex-1 items-center">
                                            <img
                                                src="{{ asset('images/rooms_img/bed.svg') }}"
                                                class="mr-2 h-8 w-auto object-cover object-center md:mr-3 md:h-10"
                                            />
                                            <p>{{ $room->amenities['bed'] }}</p>
                                        </div>
                                        <!-- End of Bed -->

                                        <!-- Bathroom -->
                                        <div class="inline-flex flex-1 items-center">
                                            <img
                                                src="{{ asset('images/rooms_img/bathroom.svg') }}"
                                                class="mr-2 h-8 w-auto object-cover object-center md:mr-3 md:h-10"
                                            />
                                            <p>{{ $room->amenities['bath'] }}</p>
                                        </div>
                                        <!-- End of Bathroom -->

                                        <!-- Table -->
                                        <div class="inline-flex flex-1 items-center">
                                            <img
                                                src="{{ asset('images/rooms_img/table.svg') }}"
                                                class="mr-2 h-8 w-auto object-cover object-center md:mr-3 md:h-10"
                                            />
                                            <p>{{ $room->amenities['table'] }}</p>
                                        </div>
                                        <!-- End of Table -->

                                        <!-- Chair -->
                                        <div class="inline-flex flex-1 items-center">
                                            <img
                                                src="{{ asset('images/rooms_img/chair.svg') }}"
                                                class="mr-2 h-8 w-auto object-cover object-center md:mr-3 md:h-10"
                                            />
                                            <p>{{ $room->amenities['chair'] }}</p>
                                        </div>
                                        <!-- End of Chair -->

                                        <!-- End of Beside Table -->
                                        <div class="inline-flex flex-1 items-center">
                                            <img
                                                src="{{ asset('images/rooms_img/bedside-table.svg') }}"
                                                class="mr-2 h-8 w-auto object-cover object-center md:mr-3 md:h-10"
                                            />
                                            <p>{{ $room->amenities['bedsideTable'] }}</p>
                                        </div>
                                        <!-- Beside Table -->

                                        <!-- Cupboard -->
                                        <div class="inline-flex flex-1 items-center">
                                            <img
                                                src="{{ asset('images/rooms_img/cupboard.svg') }}"
                                                class="mr-2 h-8 w-auto object-cover object-center md:mr-3 md:h-10"
                                            />
                                            <p>{{ $room->amenities['cupboard'] }}</p>
                                        </div>
                                        <!-- End of Cupboard -->
                                    </div>

                                    <!-- Price -->
                                    <div class="flex items-center gap-4 text-center">
                                        <div>
                                            <span class="uppercase text-gray-600">Price</span>
                                            <p class="font-bold text-monk-red md:text-2xl">{{ $room->price }}</p>
                                        </div>
                                        <div class="grow">
                                            <a
                                                href="tel:+977014480529"
                                                class="block rounded-full bg-ace-gold px-12 py-2 font-bold uppercase text-white transition-all duration-300 hover:bg-dark-gold md:py-4"
                                            >Book Now</a
                                            >
                                        </div>
                                    </div>
                                    <!-- End of Price -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End of Room Card -->

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
