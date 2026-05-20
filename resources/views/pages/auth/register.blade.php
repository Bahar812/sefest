@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Daftar | Workspace Advokat', 'Register | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto grid max-w-5xl gap-6 xl:grid-cols-[minmax(0,1fr)_24rem]">
        <article class="hero-card px-5 py-6 md:px-7">
            <p class="eyebrow">{{ $t('Daftar', 'Register') }}</p>
            <h1 class="mt-3 text-[2.3rem] text-[var(--color-primary)] md:text-[3.4rem]">
                {{ $t('Buat akun agar brief, dokumen, dan pipeline konsultasi tersimpan rapi.', 'Create an account so briefs, documents, and consultation pipeline stay organized.') }}
            </h1>
            <p class="mt-4 max-w-3xl text-[1.1rem] text-[var(--color-muted-text)]">
                {{ $t('Frontend prototype. Form ini hanya menampilkan struktur UI registrasi.', 'Frontend prototype. This form only shows the registration UI structure.') }}
            </p>

            <form action="#" method="GET" class="mt-7 grid gap-4" data-prototype-form data-prototype-title="{{ $t('Akun demo siap dibuat', 'Demo account ready') }}" data-prototype-message="{{ $t('Versi backend akan menyimpan akun, membuat profil pengguna, dan menyiapkan ruang dokumen pribadi.', 'The backend version will save the account, create a user profile, and prepare a private document space.') }}">
                <div>
                    <label for="register_name" class="eyebrow">{{ $t('Nama Lengkap', 'Full Name') }}</label>
                    <input id="register_name" name="name" type="text" class="form-field mt-2" placeholder="{{ $t('Nama lengkap', 'Full name') }}" required>
                </div>

                <div>
                    <label for="register_phone" class="eyebrow">{{ $t('Nomor Telepon', 'Phone Number') }}</label>
                    <input id="register_phone" name="phone" type="tel" class="form-field mt-2" placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label for="register_email" class="eyebrow">{{ $t('Email (Opsional)', 'Email (Optional)') }}</label>
                    <input id="register_email" name="email" type="email" class="form-field mt-2" placeholder="nama@email.com">
                </div>

                <div>
                    <label for="register_password" class="eyebrow">{{ $t('Password', 'Password') }}</label>
                    <input id="register_password" name="password" type="password" class="form-field mt-2" placeholder="{{ $t('Minimal 8 karakter', 'Minimum 8 characters') }}" required>
                </div>

                <div>
                    <label for="register_password_confirmation" class="eyebrow">{{ $t('Konfirmasi Password', 'Confirm Password') }}</label>
                    <input id="register_password_confirmation" name="password_confirmation" type="password" class="form-field mt-2" placeholder="{{ $t('Ulangi password', 'Repeat password') }}" required>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
                    <a href="{{ $routeLang('login') }}" class="soft-button">{{ $t('Sudah Punya Akun', 'Already Have an Account') }}</a>
                    <button type="submit" class="primary-button">{{ $t('Buat Akun', 'Create Account') }}</button>
                </div>
            </form>
        </article>

        <aside class="grid gap-4">
            <article class="surface-card">
                <p class="eyebrow">{{ $t('Manfaat Akun', 'Account Benefits') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Simpan hasil scan kontrak, ringkasan AI, dan checklist kasus tanpa mulai dari awal setiap kali kembali.', 'Save contract scan results, AI summaries, and case checklists without restarting every time you return.') }}
                </p>
            </article>

            <article class="surface-card success">
                <p class="eyebrow">{{ $t('Keamanan Akses', 'Access Security') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Nomor telepon dipakai sebagai identitas utama, dan email bisa ditambahkan sebagai kontak cadangan.', 'Phone number is used as the primary identity, and email can be added as a backup contact.') }}
                </p>
            </article>
        </aside>
    </section>
@endsection
