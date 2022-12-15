<x-user-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 mb-4">
            {{-- PAGE HEADING WITH BUTTON --}}
            <div class="mt-4 flex md:mt-0 items-center justify-between">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Upload Payment Receipt
                </h2>
            </div>
            {{-- PAGE HEADING WITH BUTTON --}}
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <main>
                <form method="POST" action="{{ route('dharmashala.bookings.update', $booking) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="space-y-6 sm:space-y-5 sm:pt-6">
                            <div class="space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="payment_receipt" class="block text-gray-700 sm:mt-px sm:pt-2">
                                        Payment Receipt
                                    </label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <x-input id="payment_receipt" class="mt-1 block w-full" type="file"
                                                 name="payment_receipt"/>
                                        @error('payment_receipt')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="street-address" class="block text-gray-700 sm:mt-px sm:pt-2">
                                        Payment Receipt
                                    </label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        @if(empty($booking->payment_receipt))
                                            Not found!
                                        @else
                                            <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                                                <img class="object-contain w-full h-full mx-auto rounded-md"
                                                     src="{{ url('storage/' . $booking->payment_receipt) }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-5">
                            <div class="flex justify-end">
                                <button type="submit"
                                        class="focus:ring-prime-blue ml-3 inline-flex justify-center rounded-md border border-transparent bg-prime-blue
                                        py-2 px-4 text-white shadow-sm hover:bg-ace-gold focus:outline-none focus:ring-2 focus:ring-offset-2">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-user-layout>
