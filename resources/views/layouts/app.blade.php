<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Employee Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-slate-200 shadow-sm">
            <div class="mx-auto max-w-5xl px-6 py-4 flex items-center justify-between">
                <a href="{{ route('employee.create') }}" class="flex items-center gap-2 font-semibold text-slate-800">
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-white">EM</span>
                    <span class="text-lg">Employee Management</span>
                </a>
                <nav class="flex items-center gap-2 text-sm font-medium">
                    <a href="{{ route('employee.create') }}"
                       class="rounded-md px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700">
                        Add Employee
                    </a>
                </nav>
            </div>
        </header>

        <main class="flex-1">
            <div class="mx-auto max-w-5xl px-6 py-10">
                @if (session('status'))
                    <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="border-t border-slate-200 bg-white py-6 text-center text-sm text-slate-400">
            &copy; {{ date('Y') }} Employee Management System
        </footer>
    </div>
</body>
</html>
