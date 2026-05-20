@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Akun | Workspace Advokat', 'Account | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto grid max-w-6xl gap-6 xl:grid-cols-[minmax(0,1.05fr)_minmax(19rem,0.95fr)]">
        <article class="hero-card px-5 py-6 md:px-7">
            <p class="eyebrow">{{ $t('Akun Workspace', 'Workspace Account') }}</p>
            <h1 class="mt-3 text-[2.4rem] text-[var(--color-primary)] md:text-[3.6rem]">
                {{ $t('Masuk atau daftar untuk menyimpan brief, dokumen, dan pipeline konsultasi.', 'Sign in or register to save briefs, documents, and consultation pipeline.') }}
            </h1>
            <p class="mt-4 max-w-3xl text-[1.1rem] text-[var(--color-muted-text)]">
                {{ $t('Halaman ini masih berupa frontend prototype. Alur dibuat agar advokat dan klien bisa membayangkan proses login, registrasi, dan reset password tanpa backend.', 'This page is still a frontend prototype. The flow is designed so advocates and clients can imagine login, registration, and password reset without a backend.') }}
            </p>

            <div class="auth-grid mt-7">
                <a href="{{ $routeLang('login') }}" class="surface-card auth-card-link">
                    <p class="eyebrow">{{ $t('Masuk', 'Sign In') }}</p>
                    <h2 class="mt-3 text-[1.9rem] text-[var(--color-primary)]">{{ $t('Saya sudah punya akun', 'I already have an account') }}</h2>
                    <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                        {{ $t('Gunakan nomor telepon atau email untuk membuka dashboard intake dan dokumen.', 'Use a phone number or email to open your intake and document dashboard.') }}
                    </p>
                </a>

                <a href="{{ $routeLang('register') }}" class="surface-card auth-card-link">
                    <p class="eyebrow">{{ $t('Daftar', 'Register') }}</p>
                    <h2 class="mt-3 text-[1.9rem] text-[var(--color-primary)]">{{ $t('Saya pengguna baru', 'I am a new user') }}</h2>
                    <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                        {{ $t('Buat akun untuk menyimpan laporan, draft, dan progres kasus.', 'Create an account to save reports, drafts, and case progress.') }}
                    </p>
                </a>
            </div>
        </article>

        <aside class="grid gap-4">
            <article class="surface-card">
                    <p class="eyebrow">{{ $t('Yang Akan Tersimpan', 'What Will Be Saved') }}</p>
                <div class="feature-list mt-4">
                    <div class="feature-list-item">
                        <span class="feature-dot"></span>
                        <div>
                            <p class="font-[var(--font-display)] text-[1.2rem] font-bold text-[var(--color-primary)]">{{ $t('Riwayat Brief AI', 'AI Brief History') }}</p>
                            <p class="mt-1 text-[1rem] text-[var(--color-muted-text)]">{{ $t('Supaya advokat tidak perlu mengulang intake dari awal.', 'So advocates do not need to repeat intake from the start.') }}</p>
                        </div>
                    </div>
                    <div class="feature-list-item">
                        <span class="feature-dot"></span>
                        <div>
                            <p class="font-[var(--font-display)] text-[1.2rem] font-bold text-[var(--color-primary)]">{{ $t('Draft tindak lanjut', 'Follow-up drafts') }}</p>
                            <p class="mt-1 text-[1rem] text-[var(--color-muted-text)]">{{ $t('Untuk kontrak kerja, invoice, perizinan, dan sengketa bisnis sederhana.', 'For work contracts, invoices, permits, and simple business disputes.') }}</p>
                        </div>
                    </div>
                    <div class="feature-list-item">
                        <span class="feature-dot"></span>
                        <div>
                            <p class="font-[var(--font-display)] text-[1.2rem] font-bold text-[var(--color-primary)]">{{ $t('Dokumen yang pernah dicek', 'Reviewed documents') }}</p>
                            <p class="mt-1 text-[1rem] text-[var(--color-muted-text)]">{{ $t('Agar kontrak atau surat bisa ditinjau ulang kapan saja.', 'So contracts or letters can be reviewed again at any time.') }}</p>
                        </div>
                    </div>
                </div>
            </article>

            <article class="surface-card success">
                <p class="eyebrow">{{ $t('Reset Password', 'Reset Password') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Jika lupa password, kirim kode OTP ke nomor telepon atau email, lalu lanjut ke halaman verifikasi password baru.', 'If you forget your password, send an OTP code to your phone number or email, then continue to the new password verification page.') }}
                </p>
                <a href="{{ $routeLang('password.request') }}" class="primary-button mt-4">{{ $t('Buka Reset Password', 'Open Password Reset') }}</a>
            </article>
        </aside>
    </section>
@endsection
