@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $langRoute = ['lang' => $lang];
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;
    $routeLang = fn (string $name, array $params = []) => route($name, array_merge($langRoute, $params));

    $cases = [
        [
            'icon' => '&#128184;',
            'title' => $t('Penipuan Online (Transfer / Marketplace)', 'Online Fraud (Transfer / Marketplace)'),
            'hook' => $t('Sudah transfer tapi barang tidak dikirim', 'Transferred money but item was never delivered'),
            'explanation' => $t(
                'Ini biasanya termasuk modus penipuan digital. Simpan bukti transfer, chat, username akun, dan link produk. Segera lapor ke bank atau e-wallet untuk kemungkinan blokir dana serta lanjutkan ke pelaporan resmi.',
                'This is commonly a digital fraud pattern. Save transfer proof, chats, account usernames, and product links. Contact your bank/e-wallet for possible fund blocking and continue with official reporting.'
            ),
        ],
        [
            'icon' => '&#128241;',
            'title' => $t('Pinjaman Online Ilegal (Pinjol)', 'Illegal Online Loan (Pinjol)'),
            'hook' => $t('Diteror debt collector meski tidak merasa berhutang', 'Harassed by debt collectors despite not recognizing the debt'),
            'explanation' => $t(
                'Kasus ini sering melibatkan penyalahgunaan data pribadi dan penagihan tidak sah. Dokumentasikan nomor penagih, isi ancaman, dan waktu kejadian. Jangan transfer sebelum status utang terverifikasi.',
                'This often involves personal data misuse and unlawful collection. Document collector numbers, threat messages, and timestamps. Do not pay before debt status is verified.'
            ),
        ],
        [
            'icon' => '&#128106;',
            'title' => $t('Kekerasan Dalam Rumah Tangga (KDRT)', 'Domestic Violence (KDRT)'),
            'hook' => $t('Korban mengalami kekerasan tapi takut melapor', 'Victim experiences abuse but is afraid to report'),
            'explanation' => $t(
                'Prioritas pertama adalah keselamatan korban. Cari tempat aman, hubungi pendamping tepercaya, dan simpan bukti seperti foto luka atau rekaman. Korban berhak atas perlindungan dan pendampingan hukum.',
                'The first priority is victim safety. Find a safe place, contact trusted support, and preserve evidence such as injury photos or recordings. Victims are entitled to protection and legal assistance.'
            ),
        ],
        [
            'icon' => '&#128757;',
            'title' => $t('Tilang & Razia Polisi', 'Traffic Ticket & Police Checkpoints'),
            'hook' => $t('Diberhentikan di jalan dan tidak tahu hak sebagai pengendara', 'Stopped on the road and unsure about your rights'),
            'explanation' => $t(
                'Pengendara berhak mendapatkan penjelasan alasan penindakan dan jenis pelanggaran. Minta informasi prosedur resmi tilang dan hindari penyelesaian informal yang tidak terdokumentasi.',
                'Drivers have the right to know the reason for enforcement and the alleged violation. Ask for official ticket procedures and avoid undocumented informal settlements.'
            ),
        ],
        [
            'icon' => '&#128196;',
            'title' => $t('Masalah Kontrak Kerja', 'Employment Contract Issue'),
            'hook' => $t('Tiba-tiba dipecat tanpa pesangon', 'Suddenly terminated without severance'),
            'explanation' => $t(
                'Periksa isi kontrak, status kerja, serta bukti komunikasi pemutusan hubungan kerja. Simpan slip gaji dan surat kerja. Jika hak belum dipenuhi, siapkan kronologi untuk mediasi atau pengaduan resmi.',
                'Review contract terms, employment status, and termination communications. Keep payroll slips and employment letters. If rights are unmet, prepare a timeline for mediation or formal complaint.'
            ),
        ],
        [
            'icon' => '&#127968;',
            'title' => $t('Sengketa Tanah / Properti', 'Land / Property Dispute'),
            'hook' => $t('Tanah tiba-tiba diklaim pihak lain', 'Land is suddenly claimed by another party'),
            'explanation' => $t(
                'Kumpulkan dokumen kepemilikan, riwayat pembayaran, dan peta batas tanah. Hindari tindakan sepihak di lokasi sengketa. Utamakan verifikasi dokumen dan pendampingan sebelum melangkah lebih jauh.',
                'Gather ownership documents, payment history, and boundary maps. Avoid unilateral action on disputed land. Prioritize document verification and assistance before further steps.'
            ),
        ],
        [
            'icon' => '&#129534;',
            'title' => $t('Penipuan Investasi Bodong', 'Fraudulent Investment Scam'),
            'hook' => $t('Janji keuntungan besar tapi uang hilang', 'Promised high returns but money disappeared'),
            'explanation' => $t(
                'Waspadai skema dengan imbal hasil tidak wajar dan tekanan setor cepat. Simpan bukti transfer, materi promosi, serta identitas pihak yang menawarkan investasi. Segera laporkan jika ada indikasi penipuan.',
                'Be cautious of unrealistic returns and pressure to deposit quickly. Save transfer proof, promotional material, and the promoter identity. Report immediately if fraud is suspected.'
            ),
        ],
        [
            'icon' => '&#128722;',
            'title' => $t('COD Bermasalah (Barang Tidak Sesuai)', 'Problematic COD (Item Not as Ordered)'),
            'hook' => $t('Barang datang tapi tidak sesuai pesanan', 'Item arrived but does not match the order'),
            'explanation' => $t(
                'Dokumentasikan unboxing, kondisi barang, dan bukti pesanan. Gunakan jalur komplain resmi platform agar ada jejak penyelesaian. Hindari kesepakatan personal tanpa bukti tertulis.',
                'Document unboxing, item condition, and order proof. Use official platform complaint channels to keep a resolution trail. Avoid personal deals without written proof.'
            ),
        ],
        [
            'icon' => '&#9878;',
            'title' => $t('Pencemaran Nama Baik (UU ITE)', 'Defamation (ITE Law)'),
            'hook' => $t('Posting di media sosial malah kena laporan', 'Social media post leads to legal complaint'),
            'explanation' => $t(
                'Pisahkan opini, kritik, dan tuduhan berbasis fakta. Simpan konteks unggahan lengkap serta kronologi komunikasi. Konsultasi awal penting sebelum menghapus atau mengubah konten.',
                'Separate opinion, criticism, and factual allegations. Preserve full post context and communication timeline. Early consultation matters before deleting or editing content.'
            ),
        ],
        [
            'icon' => '&#128188;',
            'title' => $t('Gaji Tidak Dibayar', 'Unpaid Salary'),
            'hook' => $t('Sudah kerja tapi tidak menerima gaji', 'Worked but did not receive salary'),
            'explanation' => $t(
                'Kumpulkan bukti kehadiran, kontrak, dan komunikasi terkait pembayaran upah. Ajukan permintaan tertulis ke perusahaan dan simpan responsnya. Ini penting sebagai dasar proses lanjutan.',
                'Gather attendance proof, contract, and wage-related communication. Send a written request to the company and keep the response. This is important for further process.'
            ),
        ],
        [
            'icon' => '&#128663;',
            'title' => $t('Kecelakaan Lalu Lintas', 'Traffic Accident'),
            'hook' => $t('Tidak tahu siapa yang salah dan harus bagaimana', 'Unsure who is at fault and what to do next'),
            'explanation' => $t(
                'Utamakan keselamatan dan bantuan medis. Dokumentasikan lokasi, kendaraan, saksi, serta kondisi jalan. Hindari pengakuan sepihak di tempat sebelum kronologi lengkap disusun.',
                'Prioritize safety and medical aid. Document location, vehicles, witnesses, and road conditions. Avoid unilateral admissions at the scene before a full timeline is prepared.'
            ),
        ],
        [
            'icon' => '&#128187;',
            'title' => $t('Penyalahgunaan Data Pribadi', 'Personal Data Misuse'),
            'hook' => $t('Data digunakan tanpa izin untuk pinjaman atau penipuan', 'Data used without consent for loans or fraud'),
            'explanation' => $t(
                'Segera ganti kredensial akun penting, aktifkan verifikasi dua langkah, dan kumpulkan bukti penyalahgunaan. Laporkan ke platform terkait dan siapkan laporan resmi jika kerugian muncul.',
                'Immediately change critical account credentials, enable 2FA, and collect misuse evidence. Report to relevant platforms and prepare an official report if losses occur.'
            ),
        ],
    ];
@endphp

@section('title')
    {{ $t('Tahukum | Edukasi Klien Advokat', 'Tahukum | Advocate Client Education') }}
@endsection

@section('content')
    <section class="mx-auto max-w-7xl">
        <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-[0_12px_34px_rgba(15,23,42,0.08)] md:p-6">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="eyebrow">Tahukum</p>
                    <h1 class="mt-2 text-[2rem] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 md:text-[2.5rem]">
                        {{ $t('Materi edukasi klien sebelum konsultasi advokat.', 'Client education before advocate consultation.') }}
                    </h1>
                    <p class="mt-3 max-w-3xl text-[1rem] text-slate-600">
                        {{ $t('Klien bisa memahami konteks dasar terlebih dahulu, sehingga sesi konsultasi advokat lebih fokus, hemat waktu, dan mudah ditindaklanjuti.', 'Clients can understand the basics first, so advocate consultations are more focused, time-efficient, and actionable.') }}
                    </p>
                </div>

                <label class="tahukum-search flex min-w-0 items-center gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-2 md:w-80">
                    <span class="tahukum-search-icon" aria-hidden="true">S</span>
                    <input
                        id="tahukum-search"
                        type="text"
                        class="tahukum-search-input w-full border-0 bg-transparent p-0 text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none"
                        placeholder="{{ $t('Cari isu klien atau perkara...', 'Search client issues or cases...') }}"
                    >
                </label>
            </div>

            <div id="tahukum-grid" class="tahukum-grid mt-6 grid gap-3 sm:grid-cols-2 md:grid-cols-4">
                @foreach ($cases as $index => $case)
                    <button
                        type="button"
                        class="tahukum-card group rounded-2xl border border-slate-200 bg-slate-50 p-3 text-left transition hover:-translate-y-0.5 hover:bg-white hover:shadow-[0_14px_30px_rgba(15,23,42,0.1)]"
                        data-case-index="{{ $index }}"
                        data-search="{{ strtolower($case['title'].' '.$case['hook'].' '.$case['explanation']) }}"
                    >
                        <span class="tahukum-card-icon inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white text-base shadow-sm" aria-hidden="true">{!! $case['icon'] !!}</span>
                        <h2 class="tahukum-card-title mt-2 text-[0.95rem] font-bold leading-5 text-slate-900 transition group-hover:text-[#2563EB]">{{ $case['title'] }}</h2>
                        <p class="tahukum-card-hook mt-1 text-sm leading-5 text-slate-600">{{ $case['hook'] }}</p>
                    </button>
                @endforeach
            </div>

            <div id="tahukum-empty" class="mt-6 hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center text-sm text-slate-500">
                {{ $t('Tidak ada card yang cocok dengan pencarianmu.', 'No cards matched your search.') }}
            </div>
        </div>
    </section>

    <div id="tahukum-modal" class="fixed inset-0 z-50 hidden">
        <button type="button" id="tahukum-backdrop" class="absolute inset-0 bg-slate-900/55" aria-label="Close"></button>
        <div class="absolute left-1/2 top-1/2 w-[calc(100%-2rem)] max-w-2xl -translate-x-1/2 -translate-y-1/2">
            <article class="rounded-3xl border border-slate-200 bg-white p-5 shadow-[0_18px_40px_rgba(15,23,42,0.2)] md:p-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span id="modal-icon" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-2xl" aria-hidden="true"></span>
                        <h3 id="modal-title" class="text-[1.2rem] font-extrabold leading-7 text-slate-900 md:text-[1.4rem]"></h3>
                    </div>
                    <button type="button" id="modal-close" class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">Close</button>
                </div>

                <p id="modal-hook" class="mt-4 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-semibold text-slate-700"></p>
                <p id="modal-explanation" class="mt-3 text-[1rem] leading-7 text-slate-600"></p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ $routeLang('ai-chat') }}" class="rounded-xl bg-[linear-gradient(120deg,#4d9df5_0%,#49b4e5_45%,#34c890_100%)] px-4 py-2 text-sm font-semibold text-white transition hover:scale-[1.01] hover:shadow-md">{{ $t('Buat Brief LegalAI', 'Create LegalAI Brief') }}</a>
                    <a href="{{ $routeLang('halokum') }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:scale-[1.01] hover:shadow-sm">{{ $t('Kirim ke Advokat', 'Send to Advocate') }}</a>
                </div>
            </article>
        </div>
    </div>

    <script>
        (() => {
            const cases = @json($cases);
            const searchInput = document.getElementById('tahukum-search');
            const cards = Array.from(document.querySelectorAll('.tahukum-card'));
            const emptyState = document.getElementById('tahukum-empty');

            const modal = document.getElementById('tahukum-modal');
            const backdrop = document.getElementById('tahukum-backdrop');
            const closeBtn = document.getElementById('modal-close');
            const modalIcon = document.getElementById('modal-icon');
            const modalTitle = document.getElementById('modal-title');
            const modalHook = document.getElementById('modal-hook');
            const modalExplanation = document.getElementById('modal-explanation');

            const openModal = (index) => {
                const item = cases[index];
                if (!item) {
                    return;
                }

                modalIcon.innerHTML = item.icon;
                modalTitle.textContent = item.title;
                modalHook.textContent = item.hook;
                modalExplanation.textContent = item.explanation;
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            };

            const closeModal = () => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            };

            cards.forEach((card) => {
                card.addEventListener('click', () => {
                    const index = Number(card.dataset.caseIndex);
                    openModal(index);
                });
            });

            searchInput?.addEventListener('input', () => {
                const query = (searchInput.value || '').trim().toLowerCase();
                let visibleCount = 0;

                cards.forEach((card) => {
                    const haystack = card.dataset.search || '';
                    const visible = haystack.includes(query);
                    card.classList.toggle('hidden', !visible);
                    if (visible) {
                        visibleCount += 1;
                    }
                });

                emptyState.classList.toggle('hidden', visibleCount !== 0);
            });

            closeBtn?.addEventListener('click', closeModal);
            backdrop?.addEventListener('click', closeModal);

            window.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        })();
    </script>
@endsection
