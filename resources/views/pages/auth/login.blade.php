@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Masuk | Workspace Advokat', 'Sign In | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto grid max-w-5xl gap-6 xl:grid-cols-[minmax(0,1fr)_24rem]">
        <article class="hero-card px-5 py-6 md:px-7">
            <p class="eyebrow">{{ $t('Masuk', 'Sign In') }}</p>
            <h1 class="mt-3 text-[2.3rem] text-[var(--color-primary)] md:text-[3.4rem]">
                {{ $t('Buka akun untuk lanjut ke brief, intake, dan dokumen kerja.', 'Open your account to continue to briefs, intake, and work documents.') }}
            </h1>
            <p class="mt-4 max-w-3xl text-[1.1rem] text-[var(--color-muted-text)]">
                {{ $t('Frontend prototype. Belum terhubung ke backend autentikasi.', 'Frontend prototype. Not connected to a real authentication backend yet.') }}
            </p>

            <form action="#" method="GET" class="mt-7 grid gap-4" data-prototype-form data-prototype-title="{{ $t('Preview dashboard akun', 'Account dashboard preview') }}" data-prototype-message="{{ $t('Login demo berhasil. Versi backend akan membuka riwayat dokumen, pertanyaan AI, dan progres bantuan.', 'Demo login complete. The backend version will open document history, AI questions, and support progress.') }}">
                <div>
                    <label for="login_identity" class="eyebrow">{{ $t('Nomor Telepon atau Email', 'Phone Number or Email') }}</label>
                    <input id="login_identity" name="identity" type="text" class="form-field mt-2" placeholder="08xxxxxxxxxx atau nama@email.com" required>
                </div>

                <div>
                    <label for="login_password" class="eyebrow">{{ $t('Password', 'Password') }}</label>
                    <input id="login_password" name="password" type="password" class="form-field mt-2" placeholder="{{ $t('Masukkan password', 'Enter password') }}" required>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
                    <a href="{{ $routeLang('password.request') }}" class="soft-button">{{ $t('Lupa Password', 'Forgot Password') }}</a>
                    <button type="submit" class="primary-button">{{ $t('Masuk', 'Sign In') }}</button>
                </div>
            </form>
        </article>

        <aside class="grid gap-4">
            <article class="surface-card">
                <p class="eyebrow">{{ $t('Gunakan Saat', 'Use When') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Kamu ingin melihat progres panduan, dokumen yang pernah dicek, atau draft laporan yang sudah disimpan.', 'You want to review guide progress, previously checked documents, or saved report drafts.') }}
                </p>
            </article>

            <article class="surface-card success">
                <p class="eyebrow">{{ $t('Belum Punya Akun', 'No Account Yet') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Daftar dengan nama, nomor telepon, dan password.', 'Register with your name, phone number, and password.') }}
                </p>
                <a href="{{ $routeLang('register') }}" class="primary-button mt-4">{{ $t('Daftar Sekarang', 'Register Now') }}</a>
            </article>
        </aside>
    </section>
@endsection
