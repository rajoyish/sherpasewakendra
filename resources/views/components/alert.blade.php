 <div class="bg-green-600 max-w-md mx-auto mt-8" x-data="{ alertOpen: true }" x-show="alertOpen" x-init="setTimeout(() => alertOpen = false, 3000)">
     <div class="py-3 px-3 sm:px-6 lg:px-8">
         <div class="flex flex-wrap items-center justify-between">
             <div class="flex w-0 flex-1 items-center">
                 <span class="flex rounded-lg bg-green-800 p-2">
                     <x-icons.check-badge-icon />
                 </span>
                 <p class="ml-3 truncate font-medium text-white">
                     <span class="md:hidden">{{ Session::get('success') }}</span>
                     <span class="hidden md:inline">{{ Session::get('success') }}</span>
                 </p>
             </div>
             <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                 <button type="button" @click="alertOpen = false"
                     class="-mr-1 flex rounded-md p-2 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                     <span class="sr-only">Dismiss</span>
                     <x-icons.xmark-icon />
                 </button>
             </div>
         </div>
     </div>
 </div>
