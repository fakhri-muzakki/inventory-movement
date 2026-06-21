<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-slate-900 dark:bg-[#0a0a0a] dark:text-slate-100 transition-colors duration-300">

    <!-- Background Effects -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 h-96 w-96 rounded-full bg-emerald-500/10 dark:bg-emerald-500/20 blur-3xl">
        </div>
        <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-cyan-500/10 dark:bg-cyan-500/20 blur-3xl"></div>
    </div>

    <!-- Navbar -->
    <header class="border-b border-slate-200 dark:border-slate-800">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <div>
                <h1 class="text-lg font-bold">Inventory Management System</h1>
            </div>

            <div class="flex items-center gap-4">
                <!-- Tombol Toggle Tema -->

                <a href="/dashboard/login"
                    class="rounded-lg bg-emerald-500 px-5 py-2 font-medium text-slate-950 transition hover:bg-emerald-400">
                    Login
                </a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="mx-auto max-w-7xl px-6 py-24">
        <div class="max-w-3xl">
            <div
                class="mb-4 inline-flex rounded-full border border-emerald-500/30 bg-emerald-500/10 px-4 py-2 text-sm text-emerald-600 dark:text-emerald-400">
                Laravel 12 • Filament 4 • PostgreSQL • Cloudinary
            </div>

            <h1 class="text-5xl font-bold leading-tight md:text-6xl">
                Modern Inventory Management System
            </h1>

            <p class="mt-6 text-lg text-slate-500 dark:text-slate-400">
                Portfolio project demonstrating inventory management,
                stock tracking, role-based authorization, Cloudinary integration,
                dashboard analytics, and modern Laravel development practices.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="/dashboard/login"
                    class="rounded-xl bg-emerald-500 px-6 py-3 font-semibold text-slate-950 transition hover:bg-emerald-400">
                    Open Dashboard
                </a>

                <a href="#features"
                    class="rounded-xl border border-slate-300 px-6 py-3 font-semibold hover:border-slate-400 dark:border-slate-700 dark:hover:border-slate-600">
                    Explore Features
                </a>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="mx-auto max-w-7xl px-6">
        <div class="grid gap-6 md:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <p class="text-slate-500 dark:text-slate-400">Products</p>
                <p class="mt-2 text-3xl font-bold">CRUD</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <p class="text-slate-500 dark:text-slate-400">Authorization</p>
                <p class="mt-2 text-3xl font-bold">Policies</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <p class="text-slate-500 dark:text-slate-400">Storage</p>
                <p class="mt-2 text-3xl font-bold">Cloudinary</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <p class="text-slate-500 dark:text-slate-400">Database</p>
                <p class="mt-2 text-3xl font-bold">PostgreSQL</p>
            </div>
        </div>
    </section>

    <!-- Features (dengan tambahan Export to Excel) -->
    <section id="features" class="mx-auto max-w-7xl px-6 py-24">
        <div class="mb-12">
            <h2 class="text-4xl font-bold">Core Features</h2>
            <p class="mt-3 text-slate-500 dark:text-slate-400">
                Features implemented to simulate a real-world inventory system.
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Product Management -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Product Management</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Create, update, view, and manage products with automatic SKU generation and image support.
                </p>
            </div>

            <!-- Stock In / Stock Out -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Stock In / Stock Out</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Record inventory movements with complete history tracking.
                </p>
            </div>

            <!-- Role Authorization -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Role Authorization</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Admin and Staff permissions implemented using Laravel Policies.
                </p>
            </div>

            <!-- Category Management -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Category Management</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Organize products into categories for easier inventory management.
                </p>
            </div>

            <!-- Supplier Management -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Supplier Management</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Track supplier information and product relationships.
                </p>
            </div>

            <!-- Cloudinary Upload -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Cloudinary Upload</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Product images stored in Cloudinary for production-ready media handling.
                </p>
            </div>

            <!-- Export to Excel (BARU) -->
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-800 dark:bg-slate-900">
                <h3 class="text-xl font-semibold">Export to Excel</h3>
                <p class="mt-3 text-slate-500 dark:text-slate-400">
                    Export product data to Excel format for reporting and analysis.
                </p>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="mx-auto max-w-7xl px-6 pb-24">
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-10 dark:border-slate-800 dark:bg-slate-900">
            <h2 class="text-4xl font-bold">Technology Stack</h2>
            <div class="mt-8 flex flex-wrap gap-3">
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">Laravel 12</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">PHP 8.3</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">Filament 4</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">PostgreSQL</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">Cloudinary</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">Tailwind CSS</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">Laravel
                    Policies</span>
                <span class="rounded-full border border-slate-300 px-4 py-2 dark:border-slate-700">Database
                    Transactions</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-200 py-8 dark:border-slate-800">
        <div class="mx-auto max-w-7xl px-6 text-center text-slate-400 dark:text-slate-500">
            Developed by Fakhri Muzakki • Laravel Inventory Management Portfolio Project
        </div>
    </footer>

    <!-- Script Toggle Tema -->
    <script>
        function applyTheme(theme) {
            const html = document.documentElement;

            html.classList.remove('dark');

            if (theme === 'dark') {
                html.classList.add('dark');
                return;
            }

            if (theme === 'light') {
                return;
            }

            // system
            const prefersDark = window.matchMedia(
                '(prefers-color-scheme: dark)'
            ).matches;

            if (prefersDark) {
                html.classList.add('dark');
            }
        }

        let currentTheme =
            localStorage.getItem('theme') ?? 'system';

        applyTheme(currentTheme);

        // Jika mode system dan user mengganti OS theme
        window.matchMedia('(prefers-color-scheme: dark)')
            .addEventListener('change', () => {

                if (
                    localStorage.getItem('theme') === 'system'
                ) {
                    applyTheme('system');
                }
            });
    </script>

</body>

</html>
