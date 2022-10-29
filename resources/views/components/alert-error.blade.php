<div
    x-data="{ alertOpen: true }"
    x-show="alertOpen"
    x-init="setTimeout(() => alertOpen = false, 3000)"
    aria-live="assertive"
    class="pointer-events-none fixed inset-0 z-50 flex items-end px-4 py-6 sm:items-start sm:p-6"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
        <div
            class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-red-600 shadow-lg ring-1 ring-black ring-opacity-5"
        >
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-icons.warning-icon class="h-6 w-6 text-red-300"/>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-white">{{ Session::get('error') }}</p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0">
                        <button
                            @click="alertOpen = false"
                            class="inline-flex rounded-md bg-red-600 text-white hover:text-red-300 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2"
                        >
                            <span class="sr-only">Close</span>
                            <x-icons.xmark-icon/>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
