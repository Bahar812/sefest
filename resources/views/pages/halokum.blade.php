@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
@endphp

@section('title')
    {{ $t('HaloHukum | Workspace Advokat', 'HaloHukum | Advocate Workspace') }}
@endsection

@section('content')
    <section class="halokum-shell mx-auto max-w-6xl">
        <div class="halokum-layout">
            <div class="halokum-main">
                <article class="halokum-card">
                    <div class="halokum-card-head">
                        <h1>Intake Konsultasi Advokat</h1>
                        <a href="#" class="halokum-link" data-prototype-preview data-prototype-eyebrow="Direktori Advokat" data-prototype-title="Pipeline advokat dan calon klien" data-prototype-body="Preview direktori: advokat bisa mengelola profil, melihat kebutuhan calon klien, dan menerima konsultasi berdasarkan spesialisasi, lokasi, biaya, serta status online." data-prototype-items="Filter kategori perkara|Lihat profil terverifikasi|Booking jadwal konsultasi">Lihat Semua</a>
                    </div>
                    <div class="halokum-chip-row">
                        <span class="halokum-chip active">Semua</span>
                        <span class="halokum-chip">Ketenagakerjaan</span>
                        <span class="halokum-chip">Bisnis</span>
                        <span class="halokum-chip">Perdata</span>
                        <span class="halokum-chip">Pidana</span>
                        <span class="halokum-chip">Properti</span>
                    </div>

                    <div class="halokum-expert-list">
                        <article class="halokum-expert-item">
                            <div class="halokum-avatar">AS</div>
                            <div class="halokum-expert-copy">
                                <h3>Dr. Ahmad Santoso, SH., M.H</h3>
                                <p>Advokat Pidana &amp; HAKI &bull; 8 intake terbuka</p>
                            </div>
                            <div class="halokum-expert-actions">
                                <span class="halokum-status online">Online</span>
                                <button type="button" class="halokum-mini-btn">Lihat Intake</button>
                            </div>
                        </article>

                        <article class="halokum-expert-item">
                            <div class="halokum-avatar">MW</div>
                            <div class="halokum-expert-copy">
                                <h3>Maria Wijaya, SH., LL.M</h3>
                                <p>Advokat Perdata, Bisnis &amp; Perizinan &bull; 12 intake terbuka</p>
                            </div>
                            <div class="halokum-expert-actions">
                                <span class="halokum-status online">Online</span>
                                <button type="button" class="halokum-mini-btn">Lihat Intake</button>
                            </div>
                        </article>

                        <article class="halokum-expert-item">
                            <div class="halokum-avatar">RP</div>
                            <div class="halokum-expert-copy">
                                <h3>Budi Prakoso, SH</h3>
                                <p>Advokat Perdata &amp; Ketenagakerjaan &bull; antrean penuh</p>
                            </div>
                            <div class="halokum-expert-actions">
                                <span class="halokum-status busy">Sibuk</span>
                                <button type="button" class="halokum-mini-btn ghost">Tidak Tersedia</button>
                            </div>
                        </article>
                    </div>
                </article>

                <article class="halokum-card">
                    <div class="halokum-card-head">
                        <h2>Pipeline Pertanyaan Klien</h2>
                        <button type="button" class="halokum-mini-btn" data-prototype-action data-prototype-message="Form intake cepat ada di panel kanan.">Buat Intake</button>
                    </div>

                    <input class="halokum-search" type="text" placeholder="Cari kebutuhan klien atau topik perkara..." aria-label="Cari kebutuhan klien">

                    <div class="halokum-tab-row">
                        <span class="halokum-tab active">Semua</span>
                        <span class="halokum-tab">Terjawab</span>
                        <span class="halokum-tab">Butuh Advokat</span>
                        <span class="halokum-tab">Prioritas</span>
                    </div>

                    <div class="halokum-topic-list">
                        <article class="halokum-topic-item">
                            <h3>Perlu review kontrak kerja sebelum tanda tangan PKWT</h3>
                            <p>Oleh Calon Klien &bull; 28 menit lalu &bull; kategori Ketenagakerjaan</p>
                        </article>
                        <article class="halokum-topic-item">
                            <h3>UMKM ingin cek perjanjian kemitraan dengan vendor</h3>
                            <p>Oleh Rina N. &bull; 1 jam lalu &bull; kategori Bisnis</p>
                        </article>
                        <article class="halokum-topic-item">
                            <h3>Somasi pembayaran invoice belum ditanggapi pihak lawan</h3>
                            <p>Oleh Bima P. &bull; 3 jam lalu &bull; kategori Perdata</p>
                        </article>
                        <article class="halokum-topic-item">
                            <h3>Karyawan butuh arahan awal setelah PHK mendadak</h3>
                            <p>Oleh Sari H. &bull; 6 jam lalu &bull; kategori Ketenagakerjaan</p>
                        </article>
                    </div>
                </article>
            </div>

            <aside class="halokum-side">
                <article class="halokum-card">
                    <h3 class="halokum-side-title">Intake Klien Cepat</h3>
                    <input class="halokum-search" type="text" placeholder="Tulis kebutuhan hukum klien..." aria-label="Intake klien cepat">
                    <button type="button" class="halokum-ask-btn">Kirim Intake</button>
                    <p class="halokum-note">Intake akan dikategorikan agar advokat yang relevan bisa menindaklanjuti lebih cepat.</p>
                </article>

                <article class="halokum-card">
                    <h3 class="halokum-side-title">Topik Populer</h3>
                    <div class="halokum-chip-row">
                        <span class="halokum-chip">PHK</span>
                        <span class="halokum-chip">Kontrak Kerja</span>
                        <span class="halokum-chip">UMKM</span>
                        <span class="halokum-chip">Invoice</span>
                        <span class="halokum-chip">Perizinan</span>
                        <span class="halokum-chip">HAKI</span>
                    </div>
                </article>

                <article class="halokum-card">
                    <h3 class="halokum-side-title">Statistik Produktivitas</h3>
                    <ul class="halokum-stats">
                        <li><span>Intake Masuk</span><strong>3,247</strong></li>
                        <li><span>Kasus Terklasifikasi</span><strong>2,891</strong></li>
                        <li><span>Advokat Aktif</span><strong>24</strong></li>
                        <li><span>Klien Terbantu</span><strong>12,456</strong></li>
                    </ul>
                </article>

                <article class="halokum-card">
                    <h3 class="halokum-side-title">Panduan Komunitas</h3>
                    <ul class="halokum-guide">
                        <li>Hormati privasi dan anonimitas pengguna lain.</li>
                        <li>Jangan membagikan nomor atau data sensitif di ruang publik.</li>
                        <li>Advokat tetap memverifikasi dokumen dan konteks sebelum memberi nasihat hukum.</li>
                    </ul>
                </article>
            </aside>
        </div>
    </section>
@endsection
