@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp
<!DOCTYPE html>
<html lang="{{ $lang }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', $t('BELA | Workspace Advokat', 'BELA | Advocate Workspace'))</title>
        <meta
            name="description"
            content="{{ $t(
                'Workspace legal-tech untuk membantu advokat dan pengacara mengelola intake klien, review dokumen, edukasi hukum, dan konsultasi digital.',
                'A legal-tech workspace that helps advocates and lawyers manage client intake, document review, legal education, and digital consultation.'
            ) }}"
        >
        <style>
            html:not([data-lang-ready="true"]) body {
                opacity: 0;
            }
        </style>
        <script>
            (() => {
                const supported = ['id', 'en'];
                const key = 'rk_lang';
                const url = new URL(window.location.href);
                const queryLanguage = url.searchParams.get('lang');
                const storedLanguage = window.localStorage.getItem(key);

                if (supported.includes(queryLanguage || '')) {
                    window.localStorage.setItem(key, queryLanguage);
                    document.documentElement.setAttribute('data-lang-ready', 'true');
                    return;
                }

                if (supported.includes(storedLanguage || '')) {
                    url.searchParams.set('lang', storedLanguage);
                    window.location.replace(url.toString());
                    return;
                }

                document.documentElement.setAttribute('data-lang-ready', 'true');
            })();
        </script>
        @vite('resources/js/app.js')
    </head>
    <body class="bg-[var(--color-page)] text-[var(--color-ink)]" data-current-lang="{{ $lang }}">
        @php
            $isSafeExit = request()->routeIs('safe-exit');
        @endphp

        @if (! $isSafeExit)
            <div class="app-shell">
                <header class="header-shell">
                    <nav class="bela-live-container bela-live-nav" aria-label="Navigasi utama" data-mobile-nav>
                        <a href="{{ $routeLang('home') }}" class="bela-live-brand">BELA</a>
                        <button
                            type="button"
                            class="bela-live-burger"
                            aria-label="Buka menu navigasi"
                            aria-expanded="false"
                            aria-controls="bela-live-menu"
                            data-mobile-nav-toggle
                        >
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </button>
                        <div id="bela-live-menu" class="bela-live-menu" data-mobile-nav-menu>
                            <div class="bela-live-links">
                                <a href="{{ $routeLang('home') }}">Beranda</a>
                                <a href="{{ $routeLang('action-guide') }}">Tahukum</a>
                                <a href="{{ $routeLang('ai-chat') }}">LegalAI</a>
                                <a href="{{ $routeLang('justice-viral') }}">Justice Viral</a>
                                <a href="{{ $routeLang('halokum') }}">HaloHukum</a>
                            </div>
                            <a href="{{ $routeLang('auth.landing') }}" class="bela-live-btn bela-live-btn-outline bela-live-login-mobile">Masuk</a>
                        </div>
                        <a href="{{ $routeLang('auth.landing') }}" class="bela-live-btn bela-live-btn-outline bela-live-login-desktop">Masuk</a>
                    </nav>
                </header>

                <main class="page-main">
                    @yield('content')
                </main>
            </div>

        @else
            <main class="min-h-screen">
                @yield('content')
            </main>
        @endif

        <div class="language-modal" data-language-modal hidden>
            <div class="language-modal-card">
                <p class="eyebrow">Language</p>
                <h2 class="mt-3 text-[2rem] text-[var(--color-primary)]">{{ $t('Pilih bahasa', 'Choose a language') }}</h2>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t(
                        'Pilih bahasa yang ingin dipakai sebelum mulai menggunakan aplikasi.',
                        'Choose the language you want to use before entering the app.'
                    ) }}
                </p>
                <div class="language-modal-actions mt-6">
                    <button type="button" class="primary-button" data-language-option="id">Bahasa Indonesia</button>
                    <button type="button" class="soft-button" data-language-option="en">English</button>
                </div>
            </div>
        </div>
    </body>
</html>
