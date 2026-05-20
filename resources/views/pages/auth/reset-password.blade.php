@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Reset Password | Workspace Advokat', 'Reset Password | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto grid max-w-5xl gap-6 xl:grid-cols-[minmax(0,1fr)_24rem]">
        <article class="hero-card px-5 py-6 md:px-7">
            <p class="eyebrow">{{ $t('Verifikasi OTP', 'OTP Verification') }}</p>
            <h1 class="mt-3 text-[2.3rem] text-[var(--color-primary)] md:text-[3.4rem]">
                {{ $t('Masukkan kode OTP lalu buat password baru.', 'Enter the OTP code and create a new password.') }}
            </h1>
            <p class="mt-4 max-w-3xl text-[1.1rem] text-[var(--color-muted-text)]">
                {{ $t('Halaman ini hanya frontend. OTP tidak benar-benar dikirim, tetapi alurnya sudah disiapkan untuk integrasi backend nanti.', 'This page is frontend-only. OTP is not actually sent yet, but the flow is ready for backend integration later.') }}
            </p>

            <form action="#" method="GET" class="mt-7 grid gap-4" data-prototype-form data-prototype-title="{{ $t('Password demo diperbarui', 'Demo password updated') }}" data-prototype-message="{{ $t('Versi backend akan memvalidasi OTP, mengganti password, dan mengakhiri sesi reset dengan aman.', 'The backend version will validate the OTP, change the password, and close the reset session safely.') }}">
                <div>
                    <label for="reset_identity" class="eyebrow">{{ $t('Nomor Telepon atau Email', 'Phone Number or Email') }}</label>
                    <input
                        id="reset_identity"
                        name="identity"
                        type="text"
                        class="form-field mt-2"
                        value="{{ request('identity') }}"
                        placeholder="08xxxxxxxxxx atau nama@email.com"
                        required
                    >
                </div>

                <div>
                    <label for="otp" class="eyebrow">{{ $t('Kode OTP', 'OTP Code') }}</label>
                    <input id="otp" name="otp" type="text" inputmode="numeric" maxlength="6" class="form-field mt-2 otp-field" placeholder="{{ $t('6 digit kode', '6-digit code') }}" required>
                </div>

                <div>
                    <label for="new_password" class="eyebrow">{{ $t('Password Baru', 'New Password') }}</label>
                    <input id="new_password" name="password" type="password" class="form-field mt-2" placeholder="{{ $t('Masukkan password baru', 'Enter new password') }}" required>
                </div>

                <div>
                    <label for="new_password_confirmation" class="eyebrow">{{ $t('Konfirmasi Password Baru', 'Confirm New Password') }}</label>
                    <input id="new_password_confirmation" name="password_confirmation" type="password" class="form-field mt-2" placeholder="{{ $t('Ulangi password baru', 'Repeat new password') }}" required>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
                    <a href="{{ $routeLang('password.request') }}" class="soft-button">{{ $t('Kirim Ulang OTP', 'Resend OTP') }}</a>
                    <button type="submit" class="primary-button">{{ $t('Simpan Password Baru', 'Save New Password') }}</button>
                </div>
            </form>
        </article>

        <aside class="grid gap-4">
            <article class="surface-card success">
                <p class="eyebrow">{{ $t('Contoh OTP', 'OTP Example') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Saat dihubungkan ke backend nanti, area ini bisa menampilkan countdown OTP, status pengiriman SMS/email, dan batas percobaan.', 'When connected to the backend later, this area can show the OTP countdown, SMS/email delivery status, and attempt limits.') }}
                </p>
            </article>
        </aside>
    </section>
@endsection
