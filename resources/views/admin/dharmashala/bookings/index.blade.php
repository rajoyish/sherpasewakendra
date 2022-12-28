<x-admin-layout>
    <div class="py-6">
        <div class="mx-auto mb-4 max-w-7xl px-4 sm:px-6 md:px-8">
            {{-- PAGE HEADING WITH BUTTON --}}
            <div class="mt-4 flex items-center justify-between md:mt-0 md:ml-4">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Bookings</h2>
            </div>
            {{-- PAGE HEADING WITH BUTTON --}}
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <main class="">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead class="bg-green-300">
                                    <tr>
                                        <th scope="col"
                                            class="px-3 py-4 text-left text-gray-900 selection:font-semibold">#
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-4 text-left text-gray-900 selection:font-semibold">Room
                                        </th>
                                        <th scope="col"
                                            class="py-4 pl-4 pr-3 text-left font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                            Booked by
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-4 text-left text-gray-900 selection:font-semibold">Check-in
                                        </th>
                                        <th scope="col" class="px-3 py-4 font-semibold text-gray-900">Check-out</th>
                                        <th scope="col" class="px-3 py-4 font-semibold text-gray-900">Amount</th>
                                        <th scope="col" class="px-3 py-4 font-semibold text-gray-900">Status</th>
                                        <th scope="col" class="px-3 py-4 font-semibold text-gray-900">Edit</th>
                                        <th scope="col" class="px-3 py-4 font-semibold text-gray-900">Invoice</th>
                                        <th scope="col" class="relative py-4 pl-3 pr-4 sm:pr-6 lg:pr-8">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300">
                                    @foreach ($bookings as $booking)
                                        <tr class="odd:bg-white even:bg-green-100">
                                            <td class="whitespace-nowrap px-3 py-4 text-gray-500">{{ $booking->id }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-gray-500">@foreach($booking->rooms as $room)
                                                    {{ $room->name }}
                                                @endforeach</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-gray-900">
                                                <a href="#"
                                                   class="hover:text-ace-gold font-bold text-green-700"> {{ $booking->user->name }} </a>
                                                <div class="flex items-center text-lg">
                                                    <x-icons.clock-icon class="mr-1 h-5 w-5 text-green-600"/>
                                                    <span>Booked at {{ $booking->created_at->format('F j, Y, g:i a') }}</span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-gray-500">{{ $booking->check_in->toFormattedDateString() }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-gray-500">{{ $booking->check_out->toFormattedDateString() }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-gray-500">
                                                Rs. {{ $booking->amount }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-gray-500">
                                                @if($booking->status === true)
                                                    <span
                                                        class="pointer:none rounded-full bg-green-700 py-0 px-4 uppercase text-green-200 no-underline focus:outline-none">
                                                            Booked
                                                        </span>
                                                @else
                                                    <span
                                                        class="text-yellow-800 border-ace-gold pointer:none rounded-full border py-0 px-4 uppercase no-underline focus:outline-none">
                                                            Unbooked
                                                        </span>
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-gray-500">
                                                <a href="{{ route('admin.bookings.edit', $booking) }}"
                                                   class="flex justify-center text-indigo-600 hover:text-indigo-900">
                                                    <x-icons.edit-icon/>
                                                    <span class="uppercase">Edit</span>
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-gray-500">
                                                <a href="{{ route('admin.bookings.show', $booking) }}"
                                                   class="flex justify-center text-indigo-600 hover:text-indigo-900">
                                                    <x-icons.edit-icon/>
                                                    <span class="uppercase">Generate</span>
                                                </a>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right sm:pr-6 lg:pr-8">
                                                <div class="flex justify-center text-red-600 hover:text-red-900">
                                                    <x-icons.delete-icon class="h-6 w-6"/>
                                                    <form action="{{ route('admin.bookings.destroy', $booking) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="uppercase" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">{{ $bookings->links() }}</div>
            </main>
        </div>

        {{-- Bank info --}}
        <x-bank-info/>
        {{-- / Bank info --}}

    </div>
</x-admin-layout>
