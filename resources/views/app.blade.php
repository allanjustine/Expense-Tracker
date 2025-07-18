<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Inline script to detect system dark mode preference and apply it immediately --}}
    <script>
        (function() {
            const appearance = '{{ $appearance ?? 'system' }}';

            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    {{-- Inline style to set the HTML background color based on our theme in app.css --}}
    <style>
        html {
            background-color: oklch(1 0 0);
        }

        html.dark {
            background-color: oklch(0.145 0 0);
        }
    </style>

    <title inertia>{{ config('app.name', 'Budget Tracker') }}</title>

    <link rel="icon" href="/favicon.ico?v2" sizes="any">
    <link rel="icon" href="/favicon.svg?v2" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png?v2">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <meta property="og:title" content="Budget Tracker - Your Personal Budget Tracker" />
    <meta property="og:description"
        content="Track budget, expenses, manage loans, and monitor your financial health all in one place. Try Budget Tracker today!" />
    <meta property="og:image" content="{{ asset('assets/meta-image.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Budget Tracker - Your Personal Budget Tracker" />
    <meta name="twitter:description"
        content="Track expenses, manage loans, and monitor your financial health all in one place." />
    <meta name="twitter:image" content="{{ asset('assets/meta-image.png') }}" />

    <meta name="description"
        content="Track expenses, manage loans, and monitor your financial health all in one place." />
    <meta name="author" content="Allan Justine Mascarinñas" />


    @routes
    @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
