@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Mode Darurat | BELA', 'Emergency Mode | BELA') }}
@endsection

@section('content')
    <section class="mx-auto max-w-3xl">
        <div class="hero-card px-5 py-6 md:px-7">
            <div>
                <p class="eyebrow">{{ $t('Emergency Mode', 'Emergency Mode') }}</p>
                <h1 class="mt-3 text-[2.4rem] text-[var(--color-primary)] md:text-[3.4rem]">
                    {{ $t('Fokus ke satu hak penting per layar.', 'Focus on one critical right per screen.') }}
                </h1>
                <p class="mt-4 max-w-2xl text-[1.125rem] text-[var(--color-muted-text)]">
                    {{ $t('Mode ini dibuat untuk situasi aktif yang membuat pengguna sulit membaca banyak menu sekaligus.', 'This mode is built for active distress situations when users cannot process many menus at once.') }}
                </p>
            </div>
            <a href="{{ $routeLang('safe-exit') }}" class="danger-button">{{ $t('Keluar Aman', 'Safe Exit') }}</a>
        </div>

        <div class="flash-wrap mt-5">
            <article id="hak-1" class="flash-card">
                <p class="eyebrow">{{ $t('Flash Card 1 / 3', 'Flash Card 1 / 3') }}</p>
                <p class="mt-8 flash-right" data-prototype-preview data-prototype-eyebrow="{{ $t('Mode Darurat', 'Emergency Mode') }}" data-prototype-title="{{ $t('Hak untuk diam', 'Right to stay silent') }}" data-prototype-body="{{ $t('Preview kartu darurat: pengguna mendapat satu instruksi utama agar tidak terburu-buru memberi jawaban atau tanda tangan.', 'Emergency card preview: users get one primary instruction so they do not rush answers or signatures.') }}" data-prototype-items="{{ $t('Tarik napas dan pahami situasi|Jangan tanda tangan jika belum paham|Hubungi pendamping tepercaya', 'Pause and understand the situation|Do not sign if unsure|Contact trusted support') }}">{{ $t('Kamu berhak diam sebelum memahami situasinya dengan tenang.', 'You have the right to stay silent until you calmly understand the situation.') }}</p>
                <p class="mt-6 text-[1.15rem] text-[var(--color-muted-text)]">
                    {{ $t('Jangan menandatangani apa pun atau memberi jawaban terburu-buru jika kamu belum paham isi pertanyaan atau dokumen yang diberikan.', 'Do not sign anything or give rushed answers if you do not yet understand the questions or documents being presented.') }}
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $routeLang('contact') }}" class="primary-button">{{ $t('Hubungi Pendamping', 'Contact Support') }}</a>
                    <a href="#hak-2" class="soft-button">{{ $t('Lanjut Hak Berikutnya', 'Next Right') }}</a>
                </div>
            </article>

            <article id="hak-2" class="flash-card">
                <p class="eyebrow">{{ $t('Flash Card 2 / 3', 'Flash Card 2 / 3') }}</p>
                <p class="mt-8 flash-right" data-prototype-preview data-prototype-eyebrow="{{ $t('Mode Darurat', 'Emergency Mode') }}" data-prototype-title="{{ $t('Minta identitas dan alasan tindakan', 'Ask identity and reason') }}" data-prototype-body="{{ $t('Preview kartu darurat: pengguna diarahkan mencatat informasi minimum yang aman untuk pendampingan berikutnya.', 'Emergency card preview: users are guided to record minimum safe information for later assistance.') }}" data-prototype-items="{{ $t('Catat nama dan instansi|Catat waktu dan lokasi|Simpan saksi atau bukti pendukung', 'Record name and institution|Record time and location|Save witnesses or supporting evidence') }}">{{ $t('Kamu berhak meminta identitas petugas dan alasan tindakan yang sedang terjadi.', 'You have the right to ask for the officer identity and the reason for the action being taken.') }}</p>
                <p class="mt-6 text-[1.15rem] text-[var(--color-muted-text)]">
                    {{ $t('Catat nama, instansi, waktu, lokasi, dan siapa saja yang hadir. Informasi ini penting untuk pendampingan lanjutan.', 'Write down names, institutions, time, location, and everyone present. This information matters for later support.') }}
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $routeLang('action-guide') }}#kumpulkan-bukti" class="success-button">{{ $t('Catat Bukti Sekarang', 'Record Evidence Now') }}</a>
                    <a href="#hak-3" class="soft-button">{{ $t('Lanjut Hak Berikutnya', 'Next Right') }}</a>
                </div>
            </article>

            <article id="hak-3" class="flash-card">
                <p class="eyebrow">{{ $t('Flash Card 3 / 3', 'Flash Card 3 / 3') }}</p>
                <p class="mt-8 flash-right" data-prototype-preview data-prototype-eyebrow="{{ $t('Mode Darurat', 'Emergency Mode') }}" data-prototype-title="{{ $t('Hubungi orang tepercaya', 'Contact trusted support') }}" data-prototype-body="{{ $t('Preview kartu darurat: pengguna diberi pesan singkat yang bisa dikirim ke keluarga, pendamping, atau advokat.', 'Emergency card preview: users get a short message they can send to family, support, or an advocate.') }}" data-prototype-items="{{ $t('Kirim lokasi saat ini|Sebutkan apa yang terjadi|Minta pendamping datang atau menelepon', 'Send current location|State what is happening|Ask support to come or call') }}">{{ $t('Kamu berhak menghubungi keluarga, kuasa hukum, atau orang yang kamu percaya.', 'You have the right to contact family, legal counsel, or someone you trust.') }}</p>
                <p class="mt-6 text-[1.15rem] text-[var(--color-muted-text)]">
                    {{ $t('Jika ponsel masih bisa dipakai, kirim satu pesan singkat berisi lokasi, waktu, dan apa yang sedang terjadi.', 'If your phone can still be used, send one short message with your location, time, and what is happening.') }}
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $routeLang('contact') }}" class="primary-button">{{ $t('Minta Bantuan Manusia', 'Request Human Support') }}</a>
                    <a href="{{ $routeLang('safe-exit') }}" class="danger-button">{{ $t('Keluar Aman', 'Safe Exit') }}</a>
                </div>
            </article>
        </div>
    </section>
@endsection
