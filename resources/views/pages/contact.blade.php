@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Form Intake Klien | Workspace Advokat', 'Client Intake Form | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto grid max-w-6xl gap-6 xl:grid-cols-[minmax(0,1.05fr)_minmax(19rem,0.95fr)]">
        <article class="hero-card px-5 py-6 md:px-7">
            <p class="eyebrow">{{ $t('Intake Klien', 'Client Intake') }}</p>
            <h1 class="mt-3 text-[2.4rem] text-[var(--color-primary)] md:text-[3.6rem]">
                {{ $t('Satu formulir singkat untuk membuat brief awal advokat.', 'One short form to create an initial advocate brief.') }}
            </h1>
            <p class="mt-4 max-w-3xl text-[1.1rem] text-[var(--color-muted-text)]">
                {{ $t(
                    'Isi nama, nomor telepon, jenis perkara, dan ringkasan singkat agar advokat menerima konteks awal sebelum konsultasi.',
                    'Fill in your name, phone number, case type, and a short summary so advocates receive initial context before consultation.'
                ) }}
            </p>

            <div class="surface-card soft mt-6" role="note">
                <p class="text-[1.05rem] text-[var(--color-ink)]">
                    {{ $t('Frontend prototype: form ini belum terhubung ke backend pengiriman bantuan.', 'Frontend prototype: this form is not connected to a real support backend yet.') }}
                </p>
            </div>

            <form method="GET" action="#" class="mt-7 grid gap-4" data-prototype-form data-prototype-title="{{ $t('Intake masuk pipeline demo', 'Intake enters demo pipeline') }}" data-prototype-message="{{ $t('AI akan membuat ringkasan kasus, menandai urgensi, lalu mencocokkan kebutuhan klien dengan advokat yang relevan.', 'AI will summarize the case, mark urgency, and match the client need with a relevant advocate.') }}">
                <div>
                    <label for="name" class="eyebrow">{{ $t('Nama', 'Name') }}</label>
                    <input id="name" name="name" type="text" class="form-field mt-2" placeholder="{{ $t('Nama lengkap', 'Full name') }}" required>
                </div>

                <div>
                    <label for="phone" class="eyebrow">{{ $t('Nomor Telepon', 'Phone Number') }}</label>
                    <input id="phone" name="phone" type="tel" class="form-field mt-2" placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label for="email" class="eyebrow">{{ $t('Email (Opsional)', 'Email (Optional)') }}</label>
                    <input id="email" name="email" type="email" class="form-field mt-2" placeholder="nama@email.com">
                </div>

                <div>
                    <label for="case_type" class="eyebrow">{{ $t('Jenis Perkara', 'Case Type') }}</label>
                    <input id="case_type" name="case_type" type="text" class="form-field mt-2" placeholder="{{ $t('Contoh: kontrak kerja, PHK, invoice, perizinan', 'Example: work contract, layoff, invoice, permit') }}" required>
                </div>

                <div>
                    <label for="message" class="eyebrow">{{ $t('Ringkasan Masalah', 'Problem Summary') }}</label>
                    <textarea id="message" name="message" rows="6" class="form-field mt-2" placeholder="{{ $t('Ceritakan kronologi, dokumen terkait, dan tujuan konsultasi', 'Describe the chronology, related documents, and consultation goal') }}" required></textarea>
                </div>

                <button type="submit" class="primary-button mt-2">{{ $t('Kirim Intake ke Advokat', 'Send Intake to Advocate') }}</button>
            </form>
        </article>

        <aside class="grid gap-4">
            <article class="surface-card success">
                <p class="eyebrow">{{ $t('Menghemat Waktu Advokat', 'Saves Advocate Time') }}</p>
                <p class="mt-3 text-[1.05rem] text-[var(--color-muted-text)]">
                    {{ $t('Form intake membuat data klien lebih rapi: kontak, kategori perkara, kronologi, dan dokumen yang perlu dibahas.', 'The intake form structures client data: contact, case category, chronology, and documents to discuss.') }}
                </p>
            </article>

            <article class="surface-card">
                <p class="eyebrow">{{ $t('Langkah Lanjutan', 'Next Steps') }}</p>
                <div class="mt-4 grid gap-3">
                    <a href="{{ $routeLang('emergency') }}" class="danger-button">{{ $t('Masuk Mode Darurat', 'Open Emergency Mode') }}</a>
                    <a href="{{ $routeLang('action-guide') }}" class="soft-button">{{ $t('Buka Edukasi Klien', 'Open Client Education') }}</a>
                    <a href="{{ $routeLang('auth.landing') }}" class="soft-button">{{ $t('Masuk / Daftar Akun', 'Sign In / Register Account') }}</a>
                </div>
            </article>
        </aside>
    </section>
@endsection
