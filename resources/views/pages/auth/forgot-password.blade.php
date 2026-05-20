@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Lupa Password | Workspace Advokat', 'Forgot Password | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto grid max-w-5xl gap-6 xl:grid-cols-[minmax(0,1fr)_24rem]">
        <article class="hero-card px-5 py-6 md:px-7">
            <p class="eyebrow">{{ $t('Lupa Password', 'Forgot Password') }}</p>
            <h1 class="mt-3 text-[2.3rem] text-[var(--color-primary)] md:text-[3.4rem]">
                {{ $t('Kirim kode OTP ke nomor telepon atau email untuk reset password.', 'Send an OTP code to your phone number or email to reset the password.') }}
            </h1>
            <p class="mt-4 max-w-3xl text-[1.1rem] text-[var(--color-muted-text)]">
                {{ $t('Frontend prototype. Tombol di bawah membawa user ke layar verifikasi OTP.', 'Frontend prototype. The button below takes users to the OTP verification screen.') }}
            </p>

            <form action="{{ route('password.reset') }}" method="GET" class="mt-7 grid gap-4">
                <input type="hidden" name="lang" value="{{ $lang }}">
                <div>
                    <label for="recovery_identity" class="eyebrow">{{ $t('Nomor Telepon atau Email', 'Phone Number or Email') }}</label>
                    <input id="recovery_identity" name="identity" type="text" class="form-field mt-2" placeholder="08xxxxxxxxxx atau nama@email.com" required>
                </div>

                <div class="surface-card soft">
                    <p class="text-[1rem] text-[var(--color-muted-text)]">
                        {{ $t('OTP biasanya dikirim ke nomor utama akun. Jika akun juga punya email, email dapat dipakai sebagai jalur cadangan.', 'OTP is usually sent to the primary phone number on the account. If the account also has an email, it can be used as a backup channel.') }}
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
                    <a href="{{ $routeLang('login') }}" class="soft-button">{{ $t('Kembali ke Masuk', 'Back to Sign In') }}</a>
                    <button type="submit" class="primary-button">{{ $t('Kirim Kode OTP', 'Send OTP Code') }}</button>
                </div>
            </form>
        </article>

        <aside class="grid gap-4">
            <article class="surface-card">
                <p class="eyebrow">{{ $t('Alur', 'Flow') }}</p>
                <div class="feature-list mt-4">
                    <div class="feature-list-item">
                        <span class="feature-dot"></span>
                        <div>
                            <p class="font-[var(--font-display)] text-[1.2rem] font-bold text-[var(--color-primary)]">{{ $t('1. Isi identitas akun', '1. Fill account identity') }}</p>
                            <p class="mt-1 text-[1rem] text-[var(--color-muted-text)]">{{ $t('Nomor telepon atau email yang dipakai saat mendaftar.', 'The phone number or email used during registration.') }}</p>
                        </div>
                    </div>
                    <div class="feature-list-item">
                        <span class="feature-dot"></span>
                        <div>
                            <p class="font-[var(--font-display)] text-[1.2rem] font-bold text-[var(--color-primary)]">{{ $t('2. Masukkan OTP', '2. Enter the OTP') }}</p>
                            <p class="mt-1 text-[1rem] text-[var(--color-muted-text)]">{{ $t('Verifikasi 6 digit sebelum membuat password baru.', 'Verify the 6-digit code before creating a new password.') }}</p>
                        </div>
                    </div>
                </div>
            </article>
        </aside>
    </section>
@endsection
