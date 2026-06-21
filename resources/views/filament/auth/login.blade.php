<x-filament-panels::page.simple>
    {{-- <h1 class="text-slate-900 text-center text-3xl font-bold dark:text-slate-50">Sign in</h1> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div x-data="{ open: true }" x-show="open"
        class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50">
        <div class="w-full max-w-sm rounded-xl bg-white dark:bg-neutral-900 shadow-lg p-5 relative">

            <button @click="open = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 dark:hover:text-white">
                ✕
            </button>

            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Demo Login Credentials
            </h2>

            <div class="mt-4 text-sm text-gray-700 dark:text-gray-300 space-y-1">
                <p><span class="font-medium">Email:</span> admin@gmail.com</p>
                <p><span class="font-medium">Password:</span> password</p>
            </div>

            <button @click="open = false"
                class="mt-4 w-full rounded-md bg-emerald-600 hover:bg-emerald-500 text-white py-2 text-sm font-medium">
                Got it
            </button>

        </div>
    </div>
    <form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-4 w-full">
            Login
        </x-filament::button>
    </form>
</x-filament-panels::page.simple>
