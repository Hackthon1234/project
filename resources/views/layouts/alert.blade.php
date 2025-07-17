@if (Session::has('success'))
<div class="fixed inset-0 flex justify-end items-start pointer-events-none z-50">
    <div 
        id="alert"
        class="bg-gradient-to-br from-green-500 to-green-600 text-white px-6 py-4 rounded-xl shadow-lg m-4 transition-all duration-500 transform translate-x-0 pointer-events-auto flex items-center"
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => { show = false }, 3000)"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    >
        <i class="ri-checkbox-circle-fill text-xl mr-3"></i>
        <p class="font-medium">{{ session('success') }}</p>
        <button @click="show = false" class="ml-4 text-white/70 hover:text-white">
            <i class="ri-close-line"></i>
        </button>
    </div>
</div>
@endif

@if (Session::has('delete'))
<div class="fixed inset-0 flex justify-end items-start pointer-events-none z-50">
    <div 
        id="alert"
        class="bg-gradient-to-br from-red-500 to-red-600 text-white px-6 py-4 rounded-xl shadow-lg m-4 transition-all duration-500 transform translate-x-0 pointer-events-auto flex items-center"
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => { show = false }, 3000)"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    >
        <i class="ri-checkbox-circle-fill text-xl mr-3"></i>
        <p class="font-medium">{{ session('delete') }}</p>
        <button @click="show = false" class="ml-4 text-white/70 hover:text-white">
            <i class="ri-close-line"></i>
        </button>
    </div>
</div>
@endif

@if (Session::has('update'))
<div class="fixed inset-0 flex justify-end items-start pointer-events-none z-50">
    <div 
        id="alert"
        class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white px-6 py-4 rounded-xl shadow-lg m-4 transition-all duration-500 transform translate-x-0 pointer-events-auto flex items-center"
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => { show = false }, 3000)"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    >
        <i class="ri-checkbox-circle-fill text-xl mr-3"></i>
        <p class="font-medium">{{ session('update') }}</p>
        <button @click="show = false" class="ml-4 text-white/70 hover:text-white">
            <i class="ri-close-line"></i>
        </button>
    </div>
</div>
@endif