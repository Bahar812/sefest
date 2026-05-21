@php
    $langRoute = ['lang' => 'id'];
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));
@endphp
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BELA | SDG 8 Legal-Tech untuk Advokat</title>
        <meta
            name="description"
            content="BELA membantu advokat dan pengacara bekerja lebih produktif melalui intake klien, review dokumen, edukasi hukum, dan konsultasi digital."
        >
        @vite('resources/css/app.css')
    </head>
    <body class="bela-live-body">
        <div class="bela-live-page">
            <div class="bela-live-bg" aria-hidden="true">
                <span class="bela-live-blob blob-a"></span>
                <span class="bela-live-blob blob-b"></span>
                <span class="bela-live-blob blob-c"></span>
            </div>

            <header class="bela-live-header">
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

            <main class="bela-live-main bela-live-container">
                <section class="bela-live-hero" id="hero">
                    <div class="bela-live-hero-copy">
                        <p class="bela-live-kicker">SDG 8 Legal-Tech Workspace</p>
                        <h1>Bantu Advokat Bekerja Lebih Produktif, Klien Mendapat Akses Lebih Cepat.</h1>
                        <p>BELA menyatukan intake kasus, review dokumen, edukasi klien, dan konsultasi digital agar advokat bisa fokus pada analisis hukum yang berdampak.</p>
                        <div class="bela-live-actions">
                            <a href="{{ $routeLang('document-scan') }}" class="bela-live-btn bela-live-btn-primary">Review Dokumen Klien</a>
                            <a href="{{ $routeLang('halokum') }}" class="bela-live-btn bela-live-btn-soft">Kelola Konsultasi</a>
                        </div>
                    </div>

                    <div class="bela-live-hero-visual bela-product-stack" aria-label="Mockup dashboard kerja advokat BELA">
                        <article class="bela-product-window bela-product-window-main">
                            <div class="bela-product-window-top">
                                <span></span><span></span><span></span>
                            </div>
                            <div class="bela-product-toolbar">
                                <strong>Advocate workspace</strong>
                                <em>SDG 8</em>
                            </div>
                            <div class="bela-product-metrics">
                                <div><span>Open intake</span><strong>42</strong></div>
                                <div><span>Docs review</span><strong>18</strong></div>
                                <div><span>Matched</span><strong>31</strong></div>
                            </div>
                            <div class="bela-product-table">
                                <div><span>PKWT clause review</span><b>High</b><i></i></div>
                                <div><span>Invoice demand letter</span><b>Ready</b><i></i></div>
                                <div><span>Vendor agreement</span><b>Draft</b><i></i></div>
                            </div>
                        </article>
                        <article class="bela-product-window bela-product-window-dark">
                            <div class="bela-product-window-top">
                                <span></span><span></span><span></span>
                            </div>
                            <code>match.intake("ketenagakerjaan")</code>
                            <code>risk.flag("pasal 4", "pasal 7")</code>
                            <code>route.to("HaloHukum")</code>
                        </article>
                        <div class="bela-live-trust bela-live-trust-floating">
                            <article class="trust-a"><strong>Intake</strong><span>kasus lebih rapi</span></article>
                            <article class="trust-b"><strong>Review</strong><span>dokumen lebih cepat</span></article>
                            <article class="trust-c"><strong>24/7</strong><span>portal edukasi klien</span></article>
                        </div>
                    </div>
                </section>

                <section class="bela-live-section bela-live-section-plain" id="masalah">
                    <div class="bela-live-section-head center bela-live-problem-head">
                        <p class="bela-live-kicker">Fokus SDG 8</p>
                        <h2><strong>Decent Work</strong> untuk profesi hukum yang lebih efisien dan inklusif</h2>
                        <p class="bela-live-problem-copy">Banyak advokat masih menghabiskan waktu pada administrasi awal, membaca dokumen berulang, dan menjawab pertanyaan dasar klien. BELA membantu pekerjaan hukum menjadi lebih produktif tanpa menghilangkan peran profesional advokat.</p>
                    </div>
                </section>

                <section class="bela-live-section bela-live-section-soft" id="cara-kerja">
                    <div class="bela-live-help-layout">
                        <div class="bela-live-help-visual">
                            <article class="bela-product-window bela-product-intake-card" aria-label="Mockup ringkasan intake klien">
                                <div class="bela-product-window-top">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="bela-product-toolbar">
                                    <strong>Client intake brief</strong>
                                    <em>ready</em>
                                </div>
                                <div class="bela-brief-block">
                                    <span>Kronologi</span>
                                    <p>Klien menerima surat somasi, tenggat 7 hari, dokumen pendukung lengkap.</p>
                                </div>
                                <div class="bela-brief-list">
                                    <i></i><i></i><i></i><i></i>
                                </div>
                            </article>
                        </div>
                        <div class="bela-live-help-copy">
                            <p class="bela-live-kicker">Cara Kerja</p>
                            <h2>Bagaimana BELA membantu workflow advokat?</h2>
                            <p class="bela-live-help-intro">BELA menyiapkan informasi awal sebelum konsultasi, merangkum dokumen, dan membuat klien datang dengan konteks yang lebih jelas.</p>
                            <ul class="bela-live-help-points">
                                <li><strong>Intake klien terstruktur</strong> agar kronologi, dokumen, dan urgensi kasus terkumpul sejak awal.</li>
                                <li><strong>Review dokumen berbantuan AI</strong> untuk menandai klausul penting sebelum advokat melakukan verifikasi akhir.</li>
                                <li><strong>Edukasi klien mandiri</strong> supaya pertanyaan dasar bisa dipahami sebelum sesi konsultasi.</li>
                                <li><strong>Direktori dan konsultasi</strong> untuk menghubungkan kebutuhan klien dengan advokat yang relevan.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="bela-live-section bela-live-section-plain" id="fitur">
                    <div class="bela-live-section-head">
                        <p class="bela-live-kicker">Fitur Utama</p>
                        <h2>Satu ruang kerja untuk layanan hukum digital.</h2>
                    </div>
                    <div class="bela-live-feature-grid">
                        <article class="bela-live-feature-card">
                            <div class="feature-icon">01</div>
                            <h3>Scan Legal Document</h3>
                            <p>Ringkas berkas klien sebelum review profesional.</p>
                            <div class="mini-ui bela-mini-product scan" aria-hidden="true">
                                <span></span><span></span><span></span>
                                <strong></strong>
                            </div>
                        </article>
                        <article class="bela-live-feature-card">
                            <div class="feature-icon">02</div>
                            <h3>Tau Hukum</h3>
                            <p>Edukasi klien agar konsultasi lebih fokus.</p>
                            <div class="mini-ui bela-mini-product law" aria-hidden="true">
                                <span></span><span></span><span></span>
                                <strong></strong>
                            </div>
                        </article>
                        <article class="bela-live-feature-card">
                            <div class="feature-icon">03</div>
                            <h3>Justice Viral</h3>
                            <p>Pantau isu publik yang butuh perhatian hukum.</p>
                            <div class="mini-ui bela-mini-product feed" aria-hidden="true">
                                <span></span><span></span><span></span>
                                <strong></strong>
                            </div>
                        </article>
                        <article class="bela-live-feature-card">
                            <div class="feature-icon">04</div>
                            <h3>HaloHukum</h3>
                            <p>Kelola konsultasi dan profil advokat.</p>
                            <div class="mini-ui bela-mini-product chat" aria-hidden="true">
                                <span></span><span></span><span></span>
                                <strong></strong>
                            </div>
                        </article>
                    </div>
                </section>

                <section class="bela-live-section bela-live-section-plain" id="showcase">
                    <div class="bela-live-section-head">
                        <p class="bela-live-kicker">Feature Showcase</p>
                        <h2>Prototype kerja advokat dari intake sampai tindak lanjut.</h2>
                    </div>
                    <div class="bela-live-showcase">
                        <article class="row">
                            <div class="mock large doc">
                                <article class="bela-product-window">
                                    <div class="bela-product-toolbar"><strong>Risk review</strong><em>3 flags</em></div>
                                    <div class="bela-product-table">
                                        <div><span>Klausul denda sepihak</span><b>High</b><i></i></div>
                                        <div><span>Batas revisi tidak rinci</span><b>Review</b><i></i></div>
                                        <div><span>Jadwal pembayaran</span><b>OK</b><i></i></div>
                                    </div>
                                </article>
                            </div>
                            <div class="copy"><h3>Hasil scan siap direview advokat</h3><p>Highlight risiko, pasal penting, dan pertanyaan klarifikasi muncul sebelum sesi konsultasi.</p></div>
                        </article>
                        <article class="row reverse">
                            <div class="mock large edu">
                                <article class="bela-product-window">
                                    <div class="bela-product-toolbar"><strong>Client education</strong><em>module</em></div>
                                    <div class="bela-brief-block">
                                        <span>Before consultation</span>
                                        <p>Klien memahami hak dasar, dokumen yang perlu dibawa, dan batas konsultasi.</p>
                                    </div>
                                    <div class="bela-brief-list"><i></i><i></i><i></i><i></i></div>
                                </article>
                            </div>
                            <div class="copy"><h3>Edukasi klien berbasis situasi</h3><p>Konten modular membantu klien memahami konteks dasar sebelum bertemu advokat.</p></div>
                        </article>
                        <article class="row">
                            <div class="mock large forum">
                                <article class="bela-product-window">
                                    <div class="bela-product-toolbar"><strong>Consultation queue</strong><em>live</em></div>
                                    <div class="bela-product-table">
                                        <div><span>Kontrak kerja</span><b>Open</b><i></i></div>
                                        <div><span>Invoice unpaid</span><b>Match</b><i></i></div>
                                        <div><span>Perizinan UMKM</span><b>New</b><i></i></div>
                                    </div>
                                </article>
                            </div>
                            <div class="copy"><h3>Forum diskusi yang bisa ditindaklanjuti</h3><p>Pertanyaan, balasan, dan insight komunitas dirangkum untuk menemukan kebutuhan bantuan hukum.</p></div>
                        </article>
                    </div>
                </section>

                <section class="bela-live-section bela-live-section-plain" id="viral">
                    <div class="bela-live-viral-layout">
                        <div class="bela-live-viral-marquee bela-issue-board" aria-label="Board isu hukum yang sedang ramai dibahas">
                            <div class="bela-product-window">
                                <div class="bela-product-toolbar"><strong>Issue monitor</strong><em>public signal</em></div>
                                <div class="bela-product-table">
                                    <div><span>PHK mendadak setelah kontrak habis</span><b>Work</b><i></i></div>
                                    <div><span>Invoice UMKM belum dibayar vendor</span><b>Biz</b><i></i></div>
                                    <div><span>Somasi atas konten media sosial</span><b>Risk</b><i></i></div>
                                    <div><span>Perjanjian kemitraan platform</span><b>New</b><i></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="bela-live-viral-copy">
                            <p class="bela-live-kicker">Justice Viral</p>
                            <h2>Bantu advokat membaca isu hukum yang sedang naik.</h2>
                            <p>Kasus yang relevan bisa dipantau sebagai sinyal kebutuhan bantuan hukum, edukasi publik, atau pendampingan lanjutan.</p>
                            <a href="{{ $routeLang('justice-viral') }}" class="bela-live-btn bela-live-btn-primary">Lihat Topik Viral</a>
                        </div>
                    </div>
                </section>

                <section class="bela-live-section bela-live-section-soft" id="halohukum">
                    <div class="bela-live-chat-layout">
                        <div class="bela-live-chat-copy">
                            <p class="bela-live-kicker">HaloHukum</p>
                            <h2>Ruang konsultasi untuk advokat dan calon klien.</h2>
                            <p>UI chat membantu advokat menerima konteks awal, melihat dokumen terkait, dan memberi arahan pertama dengan lebih rapi.</p>
                            <a href="{{ $routeLang('halokum') }}" class="bela-live-btn bela-live-btn-soft">Masuk HaloHukum</a>
                        </div>
                        <div class="bela-live-chat-ui" aria-label="Mockup chat">
                            <div class="msg from">Klien mengunggah surat somasi dan kronologi singkat.</div>
                            <div class="msg to">BELA menandai tenggat, pihak terkait, dan klausul yang perlu dicek.</div>
                            <div class="msg from">Advokat melihat ringkasan sebelum sesi konsultasi.</div>
                            <div class="msg to">Sesi bisa fokus pada strategi, bukti, dan langkah hukum berikutnya.</div>
                            <div class="typing"><span></span><span></span><span></span></div>
                        </div>
                    </div>
                </section>

                <section class="bela-live-cta" id="cta">
                    <div class="icon" aria-hidden="true"></div>
                    <h2>Bangun layanan hukum yang lebih produktif dan mudah diakses.</h2>
                    <p>BELA mendukung SDG 8 dengan membantu advokat mengurangi beban administratif, memperluas akses layanan, dan meningkatkan kualitas kerja profesional hukum.</p>
                    <a href="{{ $routeLang('auth.landing') }}" class="bela-live-btn bela-live-btn-primary glow">Mulai Workspace</a>
                </section>
            </main>

            <footer class="bela-live-footer">
                <div class="bela-live-container bela-live-footer-inner">
                    <p>© {{ now()->year }} BELA</p>
                    <div class="bela-live-footer-links">
                        <a href="#hero">Tentang</a>
                        <a href="{{ $routeLang('contact') }}">Kontak</a>
                        <a href="#">Privasi</a>
                    </div>
                    <p class="disc">BELA membantu workflow hukum digital dan tetap membutuhkan verifikasi advokat atau pengacara profesional.</p>
                </div>
            </footer>
        </div>
        <script>
            (() => {
                const nav = document.querySelector('[data-mobile-nav]');
                const toggleButton = document.querySelector('[data-mobile-nav-toggle]');
                const menu = document.querySelector('[data-mobile-nav-menu]');

                if (!nav || !toggleButton || !menu) {
                    return;
                }

                const closeMenu = () => {
                    nav.classList.remove('is-open');
                    toggleButton.setAttribute('aria-expanded', 'false');
                };

                const openMenu = () => {
                    nav.classList.add('is-open');
                    toggleButton.setAttribute('aria-expanded', 'true');
                };

                toggleButton.addEventListener('click', () => {
                    if (nav.classList.contains('is-open')) {
                        closeMenu();
                        return;
                    }

                    openMenu();
                });

                menu.querySelectorAll('a').forEach((link) => {
                    link.addEventListener('click', closeMenu);
                });

                document.addEventListener('click', (event) => {
                    if (window.innerWidth >= 768 || nav.contains(event.target)) {
                        return;
                    }

                    closeMenu();
                });

                window.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        closeMenu();
                    }
                });

                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 768) {
                        closeMenu();
                    }
                });
            })();
        </script>
    </body>
</html>
