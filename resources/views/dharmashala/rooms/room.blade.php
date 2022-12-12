<x-guest-layout>
    <main class="relative lg:min-h-full">
        <div class="h-80 overflow-hidden lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-12">
            <img src="/images/rooms_img/{{ $room->photo }}" alt="TODO"
                 class="h-full w-full object-cover object-center"/>
        </div>

        <form method="POST" action="{{ route('dharmashala.bookings.store') }}">
            @csrf
            <div>
                <div
                    class="mx-auto max-w-2xl py-16 px-4 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-32 xl:gap-x-24">
                    <div class="lg:col-start-2">
                        <h1 class="font-medium text-blue-600">Booking for</h1>
                        <div class="mt-2 mb-4 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                            <div class="flex justify-between">
                                <dt>{{ $room->name }}</dt>
                                <dd class="text-gray-900">
                                    <span class="text-xl font-normal">Rs.</span>
                                    {{ $room->price }}
                                </dd>
                            </div>
                        </div>
                        <input type="hidden" name="room_id" value="{{ $room->id }}"/>
                        <div class="pace-y-6 sm:space-y-5">
                            <div
                                class="pt-5 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200">
                                <label for="name" class="block text-gray-700 sm:mt-px sm:pt-2"> Booked by </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                           value="{{ auth()->user()->name }}"
                                           class="focus:border-prime-blue block w-full max-w-lg rounded-md border-gray-300 text-xl shadow-sm focus:ring-blue-600 sm:max-w-xs"
                                           disabled/>
                                </div>
                            </div>
                            <div
                                class="pt-5 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200">
                                <label for="check_in" class="block text-gray-700 sm:mt-px sm:pt-2">Check-in</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="date" name="check_in" id="check_in" autocomplete="date"
                                           value="{{ @old('check_in') }}"
                                           class="focus:border-prime-blue block w-full max-w-lg rounded-md border-gray-300 text-xl shadow-sm focus:ring-blue-600 sm:max-w-xs"/>
                                    <span class="text-sm text-slate-500">12/20/{{ date('Y') }}</span>
                                    @error('check_in')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="pt-5 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200">
                                <label for="check_out" class="block text-gray-700 sm:mt-px sm:pt-2">Check-out</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="date" name="check_out" id="check_out" autocomplete="date"
                                           value="{{ @old('check_out') }}"
                                           class="focus:border-prime-blue block w-full max-w-lg rounded-md border-gray-300 text-xl shadow-sm focus:ring-blue-600 sm:max-w-xs"/>
                                    <span class="text-sm text-slate-500">12/30/{{ date('Y') }}</span>
                                    @error('check_out')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-8 pt-5">
                                <div class="flex justify-end">
                                    <button type="submit"
                                            class="focus:ring-prime-blue bg-prime-blue hover:bg-ace-gold ml-3 inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">
                                        Book
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
</x-guest-layout>
