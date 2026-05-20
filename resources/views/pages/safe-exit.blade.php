@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp

@section('title')
    {{ $t('Catatan Harian', 'Notebook') }}
@endsection

@section('content')
    <section class="safe-exit-screen">
        <div class="max-w-xl text-center">
            <p class="eyebrow">{{ $t('Safe Exit Active', 'Safe Exit Active') }}</p>
            <h1 class="mt-4 text-[2.4rem] text-slate-700 md:text-[3.1rem]">{{ $t('Layar sudah dibersihkan.', 'The screen has been cleared.') }}</h1>
            <p class="mt-4 text-[1.1rem] text-slate-500">
                {{ $t('Halaman ini dibuat netral agar tidak menampilkan konteks hukum saat kamu perlu keluar cepat.', 'This page is intentionally neutral so legal context is hidden when you need to exit quickly.') }}
            </p>
            <div class="mt-6 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="https://www.google.com" class="soft-button">{{ $t('Buka Halaman Umum', 'Open a Neutral Page') }}</a>
                <a href="{{ $routeLang('home') }}" class="primary-button">{{ $t('Kembali ke Beranda', 'Back to Home') }}</a>
            </div>
        </div>
    </section>
@endsection
