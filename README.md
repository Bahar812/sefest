# TECHSOFT 2026 README Placeholder

## 1. Project Identity
- Project Name: Ruang Keadilan
- Competition: TECHSOFT 2026
- Theme: INNOVATE
- Subtheme: Social
- Development Stack: Laravel, Blade, Tailwind CSS, Vite

## 2. Team Identity
- Team Name: [Isi Nama Tim]
- Institution: [Isi Asal Sekolah / Kampus]
- Members:
  - [Nama 1] - Product / Research
  - [Nama 2] - UI / UX Design
  - [Nama 3] - Frontend / Backend Development

## 3. Problem Statement
Di Indonesia, akses keadilan sering terhambat oleh bahasa hukum yang elitis dan kompleks. Banyak masyarakat merasa terintimidasi saat membaca dokumen hukum, sehingga berisiko kehilangan waktu, uang, maupun hak mereka. Ruang Keadilan hadir di bawah subtema Social untuk menjembatani kesenjangan tersebut.

## 4. Solution Overview
Ruang Keadilan adalah platform legal-tech yang membantu pengguna memahami masalah hukum dengan Bahasa Manusia, menerima simulasi jawaban AI untuk kasus umum, meninjau risiko dokumen, mengikuti langkah konkret, dan masuk ke mode darurat saat situasi menekan.

## 5. Core Features
- Home: landing page dengan natural-language search dan suggestion kasus.
- Ask AI:
  - pengguna bisa mengetik masalah sendiri dengan bahasa sehari-hari;
  - tersedia beberapa preset kasus seperti penipuan online, kontrak kerja bermasalah, dipanggil polisi, dan teror debt collector;
  - sistem menampilkan simulasi jawaban AI berupa ringkasan awal, langkah berikutnya, dan dasar hukum yang bisa dibuka bila diperlukan.
- Action Guide: checklist langkah, draft aksi, dan progres kasus.
- Document Scan: ringkasan kontrak dengan logika traffic light.
- Emergency Mode: flash-card satu hak penting per layar.
- Contact: formulir bantuan singkat dengan telepon wajib dan email opsional.
- Account Flow: login, register, forgot password, dan OTP reset frontend-only.
- Language Support:
  - saat pertama kali masuk, pengguna diminta memilih Bahasa Indonesia atau English;
  - pilihan bahasa disimpan di browser dan dipakai di halaman-halaman utama aplikasi.

## 6. Design Direction
- Calm UI untuk situasi stres tinggi.
- Hierarki tipografi kuat dengan panel modern dan ringan.
- Navigasi inti dijaga tetap cepat dan mudah dipindai.
- Fokus aksesibilitas WCAG 2.1 AAA.
- Warna utama: Deep Navy `#1A365D` dan Muted Crimson untuk darurat.

## 7. Technical Notes
- Responsive untuk mobile, tablet, dan desktop.
- HTML5 semantik.
- Prototype legal-tech berbasis Laravel Blade.
- Alur autentikasi masih frontend-only.
- Bahasa Indonesia / English dipilih saat pertama kali masuk, disimpan di browser, dan dapat diganti lagi dari header.

## 8. Recent Improvements
- Rebranding dari `Lex Innovate` menjadi `Ruang Keadilan`.
- Homepage disederhanakan agar fokus ke masalah hukum nyata, bukan copy desain generik.
- Header dimodernisasi: lebih ringkas, tombol lebih slim, dan navigasi lebih rapi.
- Suggestion kasus ditambahkan di landing page dan halaman `Tanya AI`.
- `Tanya AI` sekarang memiliki beberapa preset kasus dengan simulasi jawaban AI yang berbeda untuk tiap konteks masalah.
- Contact form diperbarui: nomor telepon wajib, email opsional.
- Flow akun ditambahkan: login, register, forgot password, reset password OTP.
- Safe Exit, Emergency Mode, Action Guide, dan Document Scan dirapikan agar lebih konsisten.
- Dukungan bilingual ditambahkan: pilihan Bahasa Indonesia / English saat pertama kali masuk serta switch bahasa di header.

## 9. Setup Instructions
```bash
composer install
npm install
php artisan serve
npm run dev
```

## 10. Demo Assets
- Demo URL: [Isi Link Demo]
- Video URL: [Isi Link Video]
- Presentation Deck: [Isi Link Presentasi]

## 11. Repository Notes
- Ganti seluruh placeholder sebelum pengumpulan final.
- Tambahkan screenshot final pada folder dokumentasi jika format lomba memintanya.
- Sesuaikan identitas tim dan pranala demo sebelum publikasi.
