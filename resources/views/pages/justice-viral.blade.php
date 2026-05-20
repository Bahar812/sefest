@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));

    $cases = [
        [
            'id' => 1,
            'category' => 'Penipuan',
            'title' => 'Dana arisan online hilang setelah admin menutup grup',
            'summary' => 'Puluhan anggota melaporkan transfer bulanan, tetapi admin tiba-tiba menghilang dan kanal komunikasi ditutup.',
            'location' => 'Jakarta',
            'time' => '2 jam lalu',
            'comments' => 128,
            'upvotes' => 12400,
            'tags' => ['Penipuan', 'Viral'],
            'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1200&q=80',
            'chronology' => [
                'Korban mentransfer iuran rutin selama 4 bulan ke rekening yang sama.',
                'Admin menunda pencairan dengan alasan verifikasi sistem.',
                'Grup ditutup mendadak dan kontak admin tidak bisa dihubungi.',
            ],
            'analysis' => 'Pola ini menunjukkan dugaan penipuan digital dengan janji keuntungan. Fokus awal: amankan bukti transfer, chat, dan identitas akun.',
            'rights' => [
                'Berhak membuat laporan dengan bukti digital.',
                'Berhak meminta riwayat transaksi dari bank/e-wallet.',
            ],
            'avoid' => [
                'Jangan menghapus chat, mutasi, atau bukti transfer.',
                'Jangan melakukan mediasi pribadi tanpa dokumentasi.',
            ],
        ],
        [
            'id' => 2,
            'category' => 'KDRT',
            'title' => 'Rekaman KDRT bocor, korban minta perlindungan darurat',
            'summary' => 'Video kekerasan rumah tangga menyebar luas dan memicu desakan publik untuk perlindungan korban.',
            'location' => 'Bandung',
            'time' => '3 jam lalu',
            'comments' => 92,
            'upvotes' => 8700,
            'tags' => ['KDRT', 'Urgent'],
            'image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1200&q=80',
            'chronology' => [
                'Korban mengirim rekaman ke keluarga untuk bukti awal.',
                'Konten menyebar ke publik tanpa persetujuan korban.',
                'Korban mengajukan perlindungan dan pendampingan hukum.',
            ],
            'analysis' => 'Pendekatan perlindungan korban harus didahulukan: keamanan fisik, pendampingan psikologis, dan jalur pelaporan resmi.',
            'rights' => [
                'Berhak atas perlindungan sementara dan pendampingan.',
                'Berhak menjaga privasi identitas selama proses berjalan.',
            ],
            'avoid' => [
                'Jangan menyebarkan ulang rekaman kekerasan.',
                'Jangan memaksa mediasi jika ada ancaman lanjutan.',
            ],
        ],
        [
            'id' => 3,
            'category' => 'Kriminal',
            'title' => 'Pedagang kecil dituduh mencuri tanpa bukti CCTV lengkap',
            'summary' => 'Tuduhan pencurian viral setelah potongan video beredar, namun rekaman utuh belum dipublikasikan.',
            'location' => 'Surabaya',
            'time' => '5 jam lalu',
            'comments' => 77,
            'upvotes' => 6400,
            'tags' => ['Kriminal', 'Verifikasi'],
            'image' => 'https://images.unsplash.com/photo-1529074963764-98f45c47344b?auto=format&fit=crop&w=1200&q=80',
            'chronology' => [
                'Video 20 detik diunggah tanpa konteks penuh.',
                'Pedagang mengalami tekanan publik sebelum pemeriksaan.',
                'Pihak terkait diminta membuka rekaman lengkap.',
            ],
            'analysis' => 'Kasus ini butuh verifikasi alat bukti secara utuh agar tidak terjadi trial by social media.',
            'rights' => [
                'Berhak atas asas praduga tidak bersalah.',
                'Berhak didampingi kuasa hukum saat pemeriksaan.',
            ],
            'avoid' => [
                'Jangan menyimpulkan bersalah dari cuplikan singkat.',
                'Jangan sebarkan data pribadi pihak terlapor.',
            ],
        ],
        [
            'id' => 4,
            'category' => 'Korupsi',
            'title' => 'Proyek fasilitas publik diduga mark-up anggaran',
            'summary' => 'Warganet menyoroti selisih harga pengadaan dengan harga pasar dan meminta audit terbuka.',
            'location' => 'Semarang',
            'time' => '8 jam lalu',
            'comments' => 61,
            'upvotes' => 5300,
            'tags' => ['Korupsi', 'Audit'],
            'image' => 'https://images.unsplash.com/photo-1436450412740-6b988f486c6b?auto=format&fit=crop&w=1200&q=80',
            'chronology' => [
                'Dokumen anggaran beredar melalui forum warga.',
                'Netizen membandingkan nilai item dengan harga pasar.',
                'Permintaan audit independen disampaikan ke instansi terkait.',
            ],
            'analysis' => 'Perlu penelusuran dokumen pengadaan dan proses tender. Transparansi data kontrak jadi kunci validasi dugaan.',
            'rights' => [
                'Publik berhak atas informasi penggunaan anggaran.',
                'Pelapor berhak menyampaikan dugaan melalui kanal resmi.',
            ],
            'avoid' => [
                'Jangan sebarkan dokumen mentah tanpa verifikasi sumber.',
                'Jangan menuduh individu tanpa data pendukung.',
            ],
        ],
        [
            'id' => 5,
            'category' => 'Penipuan',
            'title' => 'Korban tiket konser fiktif bertambah setelah flash sale',
            'summary' => 'Ratusan akun melaporkan pembelian tiket lewat akun tidak resmi yang meniru branding penyelenggara.',
            'location' => 'Yogyakarta',
            'time' => '11 jam lalu',
            'comments' => 53,
            'upvotes' => 4100,
            'tags' => ['Penipuan', 'Konsumen'],
            'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1200&q=80',
            'chronology' => [
                'Akun palsu membuka penjualan kilat dengan batas waktu singkat.',
                'Pembeli diarahkan ke transfer manual di luar platform resmi.',
                'Setelah transfer, akun penjual menghilang.',
            ],
            'analysis' => 'Ini pola penipuan berbasis impersonasi. Validasi kanal resmi dan metode pembayaran aman jadi pencegahan utama.',
            'rights' => [
                'Berhak menuntut pengembalian jika ada bukti transaksi.',
                'Berhak melaporkan akun penipu ke platform terkait.',
            ],
            'avoid' => [
                'Jangan transfer ke rekening pribadi tanpa verifikasi.',
                'Jangan percaya akun yang menekan dengan batas waktu ekstrem.',
            ],
        ],
    ];

    $featured = $cases[0];
@endphp

@section('title', 'Justice Viral | Monitor Isu Hukum')

@section('content')
    <section class="mx-auto max-w-7xl pb-24 text-[15px] leading-6 text-slate-700">
        <div class="rounded-3xl border border-slate-200 bg-white/90 p-4 shadow-[0_10px_30px_rgba(15,23,42,0.08)] backdrop-blur-sm md:p-5">
            <div class="mt-5 grid gap-5 xl:grid-cols-[minmax(0,1fr)_20rem]">
                <div class="space-y-5">
                    <article class="relative overflow-hidden rounded-3xl border border-emerald-200 bg-gradient-to-br from-white via-white to-emerald-50 p-5 shadow-[0_18px_45px_rgba(16,185,129,0.16)] md:p-6">
                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.12em] text-emerald-700">
                            <span class="inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
                            Viral
                        </span>

                        <div class="mt-4 grid gap-4 lg:grid-cols-[minmax(0,1fr)_13rem] lg:items-start">
                            <div>
                                <h1 class="max-w-3xl text-[1.65rem] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 md:text-[2rem]">{{ $featured['title'] }}</h1>
                                <p class="mt-3 max-w-3xl text-[0.98rem] leading-7 text-slate-600">{{ $featured['summary'] }}</p>
                                <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-slate-500">
                                    <span>{{ $featured['location'] }}</span>
                                    <span>{{ $featured['time'] }}</span>
                                </div>
                                <div class="mt-4 flex flex-wrap items-center gap-3">
                                    <button type="button" class="upvote-btn inline-flex items-center gap-2 rounded-xl border border-blue-200 bg-white px-4 py-2 font-semibold text-[#2563EB] transition hover:-translate-y-0.5 hover:shadow-md active:scale-[0.98]" data-upvote data-case-id="{{ $featured['id'] }}" aria-label="Upvote kasus">
                                        <span aria-hidden="true" class="inline-flex h-4 w-4 items-center justify-center">
                                            <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 15V5m0 0-4 4m4-4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="text-base font-bold" data-case-count="{{ $featured['id'] }}">0</span>
                                    </button>
                                    <button type="button" class="rounded-xl bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)] px-4 py-2 font-semibold text-white transition hover:scale-[1.01] hover:shadow-md active:scale-[0.99]" data-open-detail data-case-id="{{ $featured['id'] }}">Baca Selengkapnya</button>
                                    <button type="button" class="rounded-xl border border-slate-200 bg-white px-4 py-2 font-semibold text-slate-700 transition hover:scale-[1.01] hover:shadow-md active:scale-[0.99]" data-justice-action data-justice-message="Kasus demo diikuti. Notifikasi perkembangan akan muncul di akun.">Ikuti Kasus</button>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-gradient-to-br from-emerald-50 via-white to-lime-50 p-3 shadow-inner">
                                <div class="relative h-36 overflow-hidden rounded-xl border border-white/70">
                                    <img src="{{ $featured['image'] }}" alt="Ilustrasi kasus {{ $featured['category'] }}" class="h-full w-full object-cover object-center">
                                    <span class="absolute left-2 top-2 rounded-md bg-slate-900/70 px-2 py-1 text-[10px] font-bold uppercase tracking-[0.08em] text-white">{{ $featured['category'] }}</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <section class="rounded-2xl border border-slate-200 bg-slate-50 p-3">
                        <label class="flex min-w-0 items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 md:max-w-md">
                            <span class="text-slate-400" aria-hidden="true">S</span>
                            <input id="justice-search" type="text" class="w-full border-0 bg-transparent p-0 text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none" placeholder="Cari kasus hukum...">
                        </label>
                    </section>

                    <section class="rounded-2xl border border-slate-200 bg-slate-50 p-3">
                        <div id="justice-filters" class="flex flex-wrap gap-2">
                            @foreach (['Semua', 'Kriminal', 'Penipuan', 'KDRT', 'Korupsi'] as $index => $filter)
                                <button type="button" data-filter="{{ $filter }}" class="filter-pill rounded-full border px-4 py-1.5 text-sm font-semibold transition hover:-translate-y-0.5 hover:shadow-md {{ $index === 0 ? 'border-transparent bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)] text-white' : 'border-slate-200 bg-white text-slate-700' }}">{{ $filter }}</button>
                            @endforeach
                        </div>
                    </section>

                    <section class="space-y-3" id="justice-feed">
                        @foreach ($cases as $case)
                            <article class="case-card group grid gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition hover:-translate-y-0.5 hover:shadow-[0_14px_30px_rgba(15,23,42,0.1)] md:grid-cols-[auto_minmax(0,1fr)_7rem] md:items-start" data-case-card data-case-id="{{ $case['id'] }}">
                                <div class="flex items-center gap-2 md:flex-col md:items-center md:gap-1">
                                    <button type="button" class="upvote-btn inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm font-bold text-slate-700 transition hover:-translate-y-0.5 hover:border-[#2563EB] hover:text-[#2563EB]" data-upvote data-case-id="{{ $case['id'] }}" aria-label="Upvote">
                                        <span aria-hidden="true" class="inline-flex h-4 w-4 items-center justify-center">
                                            <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 15V5m0 0-4 4m4-4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </button>
                                    <span class="text-sm font-bold text-slate-700" data-case-count="{{ $case['id'] }}">0</span>
                                </div>

                                <div class="min-w-0">
                                    <button type="button" class="text-left text-[1.08rem] font-bold leading-6 text-slate-900 transition group-hover:text-[#2563EB]" data-open-detail data-case-id="{{ $case['id'] }}">{{ $case['title'] }}</button>
                                    <p class="mt-1 text-sm leading-6 text-slate-600">{{ $case['summary'] }}</p>
                                    <div class="mt-2 flex flex-wrap gap-1.5">
                                        @foreach ($case['tags'] as $tag)
                                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">#{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                    <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500">
                                        <span>{{ $case['time'] }}</span>
                                        <span>{{ $case['comments'] }} komentar</span>
                                    </div>
                                </div>

                                <div class="hidden md:block">
                                    <div class="relative h-20 overflow-hidden rounded-xl border border-slate-200">
                                        <img src="{{ $case['image'] }}" alt="Ilustrasi kasus {{ $case['category'] }}" class="h-full w-full object-cover object-center">
                                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-900/65 to-transparent p-2 text-[10px] font-semibold uppercase tracking-[0.08em] text-white">{{ $case['category'] }}</div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div id="justice-empty" class="hidden rounded-2xl border border-slate-200 bg-white p-6 text-center text-sm text-slate-500">Belum ada kasus yang cocok dengan filter atau pencarian.</div>
                    </section>

                    <section id="case-detail" class="rounded-3xl border border-slate-200 bg-white p-5 shadow-[0_10px_30px_rgba(15,23,42,0.08)] md:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-600">Detail Kasus</p>
                                <h2 id="detail-title" class="mt-2 max-w-4xl text-[1.5rem] font-extrabold leading-tight text-slate-900 md:text-[1.9rem]"></h2>
                                <p id="detail-meta" class="mt-2 text-sm text-slate-500"></p>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">
                                <button type="button" class="upvote-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-[#2563EB] hover:text-[#2563EB]" data-upvote id="detail-upvote-btn" data-case-id="">
                                    <span aria-hidden="true" class="inline-flex h-4 w-4 items-center justify-center">
                                        <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.2 8.5 9.8 4c.3-.8 1.2-1.2 2-.9.6.2 1 1 .8 1.7L12 8.5h3.5c1.1 0 1.8 1.1 1.3 2.1l-2.2 4.7a2 2 0 0 1-1.8 1.2H8.2m0-8v8m0-8H5.9c-.6 0-1 .4-1 1v6c0 .6.4 1 1 1h2.3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span data-case-count="" id="detail-upvote-count">0</span>
                                </button>
                                <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-600 transition hover:scale-[1.01] hover:shadow-md" data-justice-action data-justice-message="Link share demo siap dibagikan.">
                                    <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.5 8.5 15 5m0 0v3m0-3h-3M15 11v4a1.5 1.5 0 0 1-1.5 1.5H5A1.5 1.5 0 0 1 3.5 15V6.5A1.5 1.5 0 0 1 5 5h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>Share</span>
                                </button>
                                <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-600 transition hover:scale-[1.01] hover:shadow-md" data-justice-action data-justice-message="Link kasus disalin secara simulasi.">
                                    <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 6.5V5A1.5 1.5 0 0 1 8.5 3.5h6A1.5 1.5 0 0 1 16 5v6a1.5 1.5 0 0 1-1.5 1.5H13m-5.5 4H5A1.5 1.5 0 0 1 3.5 15V9A1.5 1.5 0 0 1 5 7.5h6A1.5 1.5 0 0 1 12.5 9v6a1.5 1.5 0 0 1-1.5 1.5H9.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>Copy Link</span>
                                </button>
                            </div>
                        </div>

                        <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200">
                            <img id="detail-image" src="{{ $featured['image'] }}" alt="Ilustrasi detail kasus" class="h-48 w-full object-cover object-center md:h-56">
                        </div>

                        <div class="mt-5 grid gap-5 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,0.8fr)]">
                            <article>
                                <h3 class="text-base font-bold text-slate-900">Kronologi</h3>
                                <ol id="detail-chronology" class="mt-3 space-y-3 border-l-2 border-slate-200 pl-4 text-sm text-slate-600"></ol>

                                <h3 class="mt-6 text-base font-bold text-slate-900">Analisis Hukum</h3>
                                <p id="detail-analysis" class="mt-2 rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm leading-7 text-slate-600"></p>
                            </article>

                            <div class="space-y-4">
                                <article class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4">
                                    <h3 class="text-sm font-bold text-emerald-700">Hak Korban</h3>
                                    <ul id="detail-rights" class="mt-2 list-disc space-y-1 pl-5 text-sm text-emerald-700"></ul>
                                </article>
                                <article class="rounded-2xl border border-rose-200 bg-rose-50 p-4">
                                    <h3 class="text-sm font-bold text-rose-700">Hal yang Harus Dihindari</h3>
                                    <ul id="detail-avoid" class="mt-2 list-disc space-y-1 pl-5 text-sm text-rose-700"></ul>
                                </article>
                            </div>
                        </div>

                        <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-4 md:p-5">
                            <h3 class="text-base font-bold text-slate-900">Diskusi Komunitas</h3>
                            <form id="comment-form" class="mt-3 flex flex-col gap-2 sm:flex-row">
                                <input id="comment-input" type="text" class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-300 focus:outline-none" placeholder="Tulis komentar kamu...">
                                <button type="submit" class="rounded-xl bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)] px-4 py-2 text-sm font-semibold text-white transition hover:scale-[1.01] hover:shadow-md active:scale-[0.99]">Kirim</button>
                            </form>
                            <ul id="comment-list" class="mt-4 space-y-3 text-sm text-slate-600"></ul>
                        </div>
                    </section>
                </div>

                <aside class="hidden h-fit gap-4 xl:grid">
                    <section class="rounded-2xl border border-slate-200 bg-white p-4 shadow-[0_8px_22px_rgba(15,23,42,0.07)]">
                        <h3 class="text-sm font-bold uppercase tracking-[0.1em] text-blue-600">Trending Hari Ini</h3>
                        <ol class="mt-3 space-y-2 text-sm">
                            @foreach (array_slice($cases, 0, 5) as $index => $case)
                                <li class="flex gap-2 rounded-xl border border-slate-100 bg-slate-50 px-3 py-2">
                                    <span class="text-xs font-bold text-blue-500">{{ $index + 1 }}</span>
                                    <button type="button" class="text-left font-semibold text-slate-700 transition hover:text-[#2563EB]" data-open-detail data-case-id="{{ $case['id'] }}">{{ $case['title'] }}</button>
                                </li>
                            @endforeach
                        </ol>
                    </section>

                    <section class="rounded-2xl border border-slate-200 bg-white p-4 shadow-[0_8px_22px_rgba(15,23,42,0.07)]">
                        <h3 class="text-sm font-bold uppercase tracking-[0.1em] text-emerald-600">Statistik</h3>
                        <div class="mt-3 space-y-2 text-sm text-slate-600">
                            <p class="rounded-xl border border-slate-100 bg-slate-50 px-3 py-2">Kasus Dibahas Hari Ini: 120+</p>
                            <p class="rounded-xl border border-slate-100 bg-slate-50 px-3 py-2">Total Upvote: 45K+</p>
                        </div>
                    </section>

                    <section class="rounded-2xl border border-slate-200 bg-white p-4 shadow-[0_8px_22px_rgba(15,23,42,0.07)]">
                        <h3 class="text-sm font-bold uppercase tracking-[0.1em] text-blue-600">Aksi Komunitas</h3>
                        <button type="button" class="mt-3 w-full rounded-xl bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)] px-4 py-2 text-sm font-semibold text-white transition hover:scale-[1.01] hover:shadow-md active:scale-[0.99]" data-prototype-preview data-prototype-eyebrow="Lapor Kasus" data-prototype-title="Form lapor kasus baru" data-prototype-body="Preview alur: pengguna menulis kronologi, mengunggah bukti, lalu AI mengecek risiko privasi sebelum kasus tampil publik." data-prototype-items="Validasi data pribadi|Ringkasan kronologi otomatis|Opsi anonim sebelum publikasi">Laporkan Kasus Baru</button>
                    </section>
                </aside>
            </div>
        </div>
    </section>

    <div class="fixed inset-x-4 bottom-4 z-40 md:hidden">
        <button type="button" class="w-full rounded-2xl bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)] px-4 py-3 text-sm font-semibold text-white shadow-[0_16px_26px_rgba(37,99,235,0.35)] transition active:scale-[0.99]" data-prototype-preview data-prototype-eyebrow="Diskusi Mobile" data-prototype-title="Tanya atau diskusi kasus" data-prototype-body="Preview panel mobile untuk komentar cepat, pertanyaan lanjutan, atau permintaan bantuan advokat." data-prototype-items="Tulis komentar|Minta ringkasan AI|Lanjut ke HaloHukum">Tanya / Diskusi</button>
    </div>

    <script>
        (() => {
            const cases = @json($cases);
            const caseMap = Object.fromEntries(cases.map((item) => [String(item.id), item]));
            const counts = Object.fromEntries(cases.map((item) => [String(item.id), Number(item.upvotes) || 0]));
            const commentsByCase = Object.fromEntries(
                cases.map((item) => [
                    String(item.id),
                    [
                        { user: 'Nadia', text: 'Perlu checklist bukti supaya warga tidak salah langkah.', votes: 12 },
                        { user: 'Rafi', text: 'Semoga pihak terkait segera kasih klarifikasi resmi.', votes: 7 },
                    ],
                ])
            );

            const searchInput = document.getElementById('justice-search');
            const filterRoot = document.getElementById('justice-filters');
            const caseCards = Array.from(document.querySelectorAll('[data-case-card]'));
            const emptyState = document.getElementById('justice-empty');
            const detailTitle = document.getElementById('detail-title');
            const detailMeta = document.getElementById('detail-meta');
            const detailChronology = document.getElementById('detail-chronology');
            const detailAnalysis = document.getElementById('detail-analysis');
            const detailRights = document.getElementById('detail-rights');
            const detailAvoid = document.getElementById('detail-avoid');
            const detailImage = document.getElementById('detail-image');
            const detailUpvoteBtn = document.getElementById('detail-upvote-btn');
            const detailUpvoteCount = document.getElementById('detail-upvote-count');
            const commentForm = document.getElementById('comment-form');
            const commentInput = document.getElementById('comment-input');
            const commentList = document.getElementById('comment-list');

            let activeFilter = filterRoot?.querySelector('[data-filter]')?.dataset.filter || 'Semua';
            let activeCaseId = String(cases[0]?.id || '');

            const formatCount = (value) => {
                const number = Number(value) || 0;
                if (number >= 1000) {
                    const short = (number / 1000).toFixed(1).replace('.0', '');
                    return short + 'K';
                }
                return String(number);
            };

            const setButtonState = (button, isActive) => {
                if (!button) {
                    return;
                }
                button.dataset.pressed = isActive ? 'true' : 'false';
                if (isActive) {
                    button.classList.add('border-transparent', 'bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)]', 'text-white');
                    button.classList.remove('border-slate-200', 'bg-white', 'text-slate-700', 'text-[#2563EB]');
                } else {
                    button.classList.remove('border-transparent', 'bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)]', 'text-white');
                    button.classList.add('border-slate-200', 'bg-white', 'text-slate-700');
                }
            };

            const renderCounts = () => {
                document.querySelectorAll('[data-case-count]').forEach((element) => {
                    const caseId = element.dataset.caseCount;
                    if (!caseId) {
                        return;
                    }
                    element.textContent = formatCount(counts[caseId] || 0);
                });
            };

            const animateUpvote = (button, countElement) => {
                button.animate(
                    [
                        { transform: 'translateY(0) scale(1)' },
                        { transform: 'translateY(-3px) scale(1.08)' },
                        { transform: 'translateY(0) scale(1)' },
                    ],
                    { duration: 260, easing: 'cubic-bezier(0.22, 1, 0.36, 1)' }
                );
                if (countElement) {
                    countElement.animate(
                        [
                            { transform: 'scale(1)' },
                            { transform: 'scale(1.18)' },
                            { transform: 'scale(1)' },
                        ],
                        { duration: 220, easing: 'ease-out' }
                    );
                }
            };

            const renderComments = (caseId) => {
                const comments = commentsByCase[caseId] || [];
                commentList.innerHTML = comments
                    .map(
                        (item) => `
                            <li class="rounded-xl border border-slate-200 bg-white px-3 py-2">
                                <div class="flex items-center justify-between gap-2">
                                    <strong class="text-sm text-slate-800">${item.user}</strong>
                                    <div class="flex items-center gap-2 text-xs text-slate-500">
                                        <button type="button" class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2 py-0.5 font-semibold">
                                            <span class="inline-flex h-3.5 w-3.5 items-center justify-center" aria-hidden="true">
                                                <svg viewBox="0 0 20 20" fill="none" class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 15V5m0 0-4 4m4-4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span>${item.votes}</span>
                                        </button>
                                        <button type="button" class="font-semibold text-blue-600">Reply</button>
                                    </div>
                                </div>
                                <p class="mt-1 text-sm text-slate-600">${item.text}</p>
                            </li>
                        `
                    )
                    .join('');
            };
            const renderDetail = (caseId) => {
                const item = caseMap[caseId];
                if (!item) {
                    return;
                }

                activeCaseId = caseId;
                detailTitle.textContent = item.title;
                detailMeta.textContent = `${item.location} | ${item.time} | ${item.comments} komentar`;
                detailAnalysis.textContent = item.analysis;
                if (detailImage) {
                    detailImage.src = item.image || '';
                    detailImage.alt = `Ilustrasi kasus ${item.category}`;
                }

                detailChronology.innerHTML = item.chronology
                    .map((point) => `<li class="relative pl-2 before:absolute before:-left-[1.1rem] before:top-2 before:h-2 before:w-2 before:rounded-full before:bg-blue-500">${point}</li>`)
                    .join('');
                detailRights.innerHTML = item.rights.map((point) => `<li>${point}</li>`).join('');
                detailAvoid.innerHTML = item.avoid.map((point) => `<li>${point}</li>`).join('');

                detailUpvoteBtn.dataset.caseId = caseId;
                detailUpvoteCount.dataset.caseCount = caseId;

                renderComments(caseId);
                renderCounts();
            };

            const applyFilters = () => {
                const query = (searchInput?.value || '').trim().toLowerCase();
                let visibleCount = 0;

                caseCards.forEach((card) => {
                    const caseId = card.dataset.caseId;
                    const item = caseMap[caseId];
                    if (!item) {
                        return;
                    }

                    const matchesFilter = activeFilter === 'Semua' || item.category === activeFilter;
                    const haystack = `${item.title} ${item.summary} ${(item.tags || []).join(' ')}`.toLowerCase();
                    const matchesQuery = haystack.includes(query);
                    const visible = matchesFilter && matchesQuery;

                    card.style.display = visible ? '' : 'none';
                    if (visible) {
                        visibleCount += 1;
                    }
                });

                emptyState.classList.toggle('hidden', visibleCount !== 0);
            };

            document.querySelectorAll('[data-upvote]').forEach((button) => {
                button.addEventListener('click', () => {
                    const caseId = button.dataset.caseId;
                    if (!caseId || !Object.hasOwn(counts, caseId)) {
                        return;
                    }

                    const isPressed = button.dataset.pressed === 'true';
                    counts[caseId] += isPressed ? -1 : 1;
                    setButtonState(button, !isPressed);
                    renderCounts();

                    const countElement = button.querySelector('[data-case-count]') || document.querySelector(`[data-case-count="${caseId}"]`);
                    animateUpvote(button, countElement);
                });
            });

            filterRoot?.querySelectorAll('[data-filter]').forEach((button) => {
                button.addEventListener('click', () => {
                    activeFilter = button.dataset.filter || 'Semua';
                    filterRoot.querySelectorAll('[data-filter]').forEach((item) => {
                        const isActive = item === button;
                        if (isActive) {
                            item.classList.add('border-transparent', 'bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)]', 'text-white');
                            item.classList.remove('border-slate-200', 'bg-white', 'text-slate-700');
                        } else {
                            item.classList.remove('border-transparent', 'bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)]', 'text-white');
                            item.classList.add('border-slate-200', 'bg-white', 'text-slate-700');
                        }
                    });
                    applyFilters();
                });
            });

            searchInput?.addEventListener('input', applyFilters);

            document.querySelectorAll('[data-open-detail]').forEach((button) => {
                button.addEventListener('click', () => {
                    const caseId = button.dataset.caseId;
                    renderDetail(caseId);
                    document.getElementById('case-detail')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });

            commentForm?.addEventListener('submit', (event) => {
                event.preventDefault();
                const text = (commentInput?.value || '').trim();
                if (text === '' || !activeCaseId) {
                    return;
                }

                commentsByCase[activeCaseId] = commentsByCase[activeCaseId] || [];
                commentsByCase[activeCaseId].unshift({ user: 'Kamu', text, votes: 0 });
                commentInput.value = '';
                renderComments(activeCaseId);
            });

            renderDetail(activeCaseId);
            renderCounts();
            applyFilters();
        })();
    </script>
@endsection
