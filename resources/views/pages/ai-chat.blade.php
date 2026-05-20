@extends('layouts.legaltech')
@php
    $lang = request('lang') === 'en' ? 'en' : 'id';
    $t = fn (string $id, string $en) => $lang === 'en' ? $en : $id;

    $documents = [
        ['title' => $t('Brief Klien: Review Kontrak Kerja PKWT', 'Client Brief: Fixed-Term Work Contract Review'), 'date' => '01/01/2025'],
        ['title' => $t('Perjanjian Kemitraan UMKM dan Vendor', 'MSME and Vendor Partnership Agreement'), 'date' => '05/01/2025'],
        ['title' => $t('Somasi Pembayaran Invoice dan Tanggapan', 'Invoice Demand Letter and Response'), 'date' => '09/01/2025'],
        ['title' => $t('Ringkasan Intake PHK Sepihak', 'Unilateral Layoff Intake Summary'), 'date' => '12/01/2025'],
    ];
@endphp

@section('title')
    {{ $t('LegalAI | Workspace Advokat', 'LegalAI | Advocate Workspace') }}
@endsection

@section('content')
    <section class="mx-auto max-w-6xl rounded-2xl border border-[#d8e0ea] bg-[#f2f4f6] p-4 shadow-[0_8px_24px_rgba(16,37,63,0.08)] md:p-5">
        <h1 class="font-[var(--font-display)] text-[2rem] font-extrabold tracking-[-0.02em] text-[#1f2937]">
            {{ $t('Legal Document Workbench', 'Legal Document Workbench') }}
        </h1>

        <div class="mt-4 grid gap-4 md:grid-cols-2">
            <article class="rounded-xl border border-[#d8dfe6] bg-[#f8fafb] p-4 shadow-[inset_0_1px_0_rgba(255,255,255,0.8)]" data-demo-upload-card data-demo-kind="translate">
                <div class="flex items-center gap-2">
                    <span class="text-[0.95rem] text-[#4ea9ea]" aria-hidden="true">&#9638;</span>
                    <h2 class="font-[var(--font-display)] text-[1.2rem] font-bold tracking-normal text-[#1f2937]">
                        {{ $t('Client Brief Builder', 'Client Brief Builder') }}
                    </h2>
                </div>
                <p class="mt-2 text-[0.95rem] leading-[1.55] text-[#4b5563]">
                    {{ $t(
                        'Unggah dokumen klien untuk membuat ringkasan kasus, pihak terkait, tenggat, dan pertanyaan klarifikasi dalam satu halaman.',
                        'Upload a client document to create a one-page case brief with parties, deadlines, and clarification questions.'
                    ) }}
                </p>

                <div class="mt-3 grid min-h-[11rem] place-content-center gap-1 rounded-xl border border-[#dde3ea] bg-[#f3f5f7] p-4 text-center" data-demo-upload>
                    <div class="mx-auto mb-1 grid h-8 w-8 place-items-center rounded-md border border-[#d4dbe3] bg-[#f9fafb] text-xs text-[#6b7280]" aria-hidden="true">&#11156;</div>
                    <p class="text-[0.95rem] text-[#6b7280]">
                        <a href="#" onclick="return false;" class="font-semibold text-[#2b8de3]">{{ $t('Click to upload', 'Click to upload') }}</a>
                        {{ $t('atau drag and drop', 'or drag and drop') }}
                    </p>
                    <small class="text-xs text-[#9ca3af]">PDF (max. 50 MB)</small>
                </div>

                <div class="mt-3 grid grid-cols-2 gap-2">
                    <button type="button" class="min-h-9 rounded-lg border border-[#e0e5ea] bg-[#f3f4f6] text-[0.9rem] font-semibold text-[#6b7280]" data-demo-cancel>{{ $t('Cancel', 'Cancel') }}</button>
                    <button type="button" class="min-h-9 rounded-lg border border-[#b6ddf8] bg-[#b6ddf8] text-[0.9rem] font-semibold text-white" data-demo-run>{{ $t('Buat Brief', 'Build Brief') }}</button>
                </div>
            </article>

            <article class="rounded-xl border border-[#d8dfe6] bg-[#f8fafb] p-4 shadow-[inset_0_1px_0_rgba(255,255,255,0.8)]" data-demo-upload-card data-demo-kind="check">
                <div class="flex items-center gap-2">
                    <span class="text-[0.95rem] text-[#4ea9ea]" aria-hidden="true">&#9673;</span>
                    <h2 class="font-[var(--font-display)] text-[1.2rem] font-bold tracking-normal text-[#1f2937]">
                        {{ $t('Risk & Clause Check', 'Risk & Clause Check') }}
                    </h2>
                </div>
                <p class="mt-2 text-[0.95rem] leading-[1.55] text-[#4b5563]">
                    {{ $t(
                        'Unggah dokumen kerja untuk menandai klausul berisiko, ketidaksesuaian, dan bagian yang perlu diverifikasi advokat.',
                        'Upload a work document to flag risky clauses, mismatches, and sections that need advocate verification.'
                    ) }}
                </p>

                <div class="mt-3 grid min-h-[11rem] place-content-center gap-1 rounded-xl border border-[#dde3ea] bg-[#f3f5f7] p-4 text-center" data-demo-upload>
                    <div class="mx-auto mb-1 grid h-8 w-8 place-items-center rounded-md border border-[#d4dbe3] bg-[#f9fafb] text-xs text-[#6b7280]" aria-hidden="true">&#11156;</div>
                    <p class="text-[0.95rem] text-[#6b7280]">
                        <a href="#" onclick="return false;" class="font-semibold text-[#2b8de3]">{{ $t('Click to upload', 'Click to upload') }}</a>
                        {{ $t('atau drag and drop', 'or drag and drop') }}
                    </p>
                    <small class="text-xs text-[#9ca3af]">PDF (max. 50 MB)</small>
                </div>

                <div class="mt-3 grid grid-cols-2 gap-2">
                    <button type="button" class="min-h-9 rounded-lg border border-[#e0e5ea] bg-[#f3f4f6] text-[0.9rem] font-semibold text-[#6b7280]" data-demo-cancel>{{ $t('Cancel', 'Cancel') }}</button>
                    <button type="button" class="min-h-9 rounded-lg border border-[#b6ddf8] bg-[#b6ddf8] text-[0.9rem] font-semibold text-white" data-demo-run>{{ $t('Analisis Risiko', 'Analyze Risk') }}</button>
                </div>
            </article>
        </div>

        <div class="mt-4 overflow-hidden rounded-xl border border-[#d8dfe6] bg-[#f8fafb]">
            <label for="legalai-search" class="mx-3 my-3 grid min-h-11 grid-cols-[auto_1fr_auto] items-center gap-2 rounded-lg border border-[#d9e0e7] bg-[#fdfefe] px-3">
                <span class="text-[0.95rem] text-[#9ca3af]" aria-hidden="true">&#128269;</span>
                <input id="legalai-search" type="text" class="min-w-0 border-0 bg-transparent text-[0.95rem] text-[#4b5563]" placeholder="{{ $t('Cari brief, dokumen, atau klien...', 'Search briefs, documents, or clients...') }}">
                <kbd class="rounded-md border border-[#d6dde5] bg-[#f3f4f6] px-1.5 py-0.5 text-[0.7rem] font-semibold text-[#9ca3af]">CMD+K</kbd>
            </label>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap border-t border-[#e4e8ed] bg-[#f8fafb] px-4 py-3 text-left text-xs font-semibold text-[#6b7280]">{{ $t('Berkas Kerja', 'Work File') }} <span aria-hidden="true">&#8597;</span></th>
                            <th class="whitespace-nowrap border-t border-[#e4e8ed] bg-[#f8fafb] px-4 py-3 text-left text-xs font-semibold text-[#6b7280]">{{ $t('Tanggal Dibuat', 'Created Date') }} <span aria-hidden="true">&#8597;</span></th>
                            <th class="whitespace-nowrap border-t border-[#e4e8ed] bg-[#f8fafb] px-4 py-3 text-left text-xs font-semibold text-[#6b7280]">{{ $t('Aksi', 'Action') }} <span aria-hidden="true">&#8597;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td class="border-t border-[#e4e8ed] bg-[#fcfcfd] px-4 py-3 text-[1rem] text-[#374151]">{{ $document['title'] }}</td>
                                <td class="border-t border-[#e4e8ed] bg-[#fcfcfd] px-4 py-3 text-[1rem] text-[#374151]">{{ $document['date'] }}</td>
                                <td class="border-t border-[#e4e8ed] bg-[#fcfcfd] px-4 py-3 text-[1rem] text-[#374151]">
                                    <button type="button" class="min-h-8 rounded-lg border border-[#dce2e8] bg-white px-3 py-1 text-[0.9rem] font-semibold text-[#374151]" data-demo-doc data-demo-doc-title="{{ $document['title'] }}">{{ $t('Lihat', 'View') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
