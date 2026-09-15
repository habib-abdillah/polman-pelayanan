# Sistem Informasi Kasir & Pelayanan Polman Bandung

Aplikasi web kasir dan manajemen pelayanan bengkel/jasa, dibangun menggunakan **CodeIgniter 3**, **Illuminate Eloquent ORM**, dan dilengkapi sistem **Database Migration & Seeder CLI** custom ala Laravel (`php migrate`).

---

## Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Teknologi & Stack](#teknologi--stack)
- [Persyaratan Sistem (Prerequisites)](#persyaratan-sistem-prerequisites)
- [Panduan Setup & Instalasi](#panduan-setup--instalasi)
- [Perintah Operasional Harian](#perintah-operasional-harian)
- [Database Migration & Seeder CLI](#database-migration--seeder-cli)
- [Akun Pengguna Default](#akun-pengguna-default)
- [Struktur Folder](#struktur-folder)

---

## Fitur Utama

- **Dashboard Interaktif**: Statistik penjualan, grafik transaksi, dan ringkasan aktivitas terkini.
- **Sistem Transaksi Kasir (POS)**:
  - Keranjang belanja dinamis berbasis AJAX.
  - Cetak struk / invoice transaksi secara langsung.
  - Riwayat detail transaksi per pelanggan.
- **Manajemen Master Data**:
  - Master Pelayanan / Jasa Bengkel.
  - Master Pelanggan (Instansi, Mahasiswa, Industri, dll).
  - Master Metode Pembayaran (Tunai, Transfer Bank, QRIS).
  - Master Pengguna & Multi-Role.
- **Multi-Auth Role-Based**:
  - **Admin**: Akses penuh ke seluruh fitur master data, pengguna, log aktivitas, dan laporan.
  - **Operator**: Akses fokus pada transaksi kasir dan riwayat transaksi.
- **Log Aktivitas Pengguna (Audit Trail)**: Pencatatan otomatis aksi pengguna pada tabel `sys_track`.
- **Ekspor Laporan**: Dukungan ekspor data tabel ke format Excel, PDF, serta pengaturan kolom tabel (Column Visibility).

---

## Teknologi & Stack

| Komponen | Teknologi |
| :--- | :--- |
| **Framework Backend** | CodeIgniter 3.1.x |
| **ORM / Data Access** | Illuminate Database (Eloquent ORM) |
| **PHP Runtime** | PHP 7.4-Apache |
| **Database** | MariaDB 10.4 / MySQL |
| **Styling & UI** | Bootstrap 5, FontAwesome 6, Datatables Responsive, ApexCharts/Chart.js |
| **Containerization** | Docker & Docker Compose |

---

## Persyaratan Sistem (Prerequisites)

Sebelum memulai setup, pastikan perangkat Anda telah terinstall:
- **Git** (versi 2.x ke atas)
- **Docker Engine** (versi 20.10 ke atas) dan **Docker Compose** (v2)
- *Catatan untuk Windows/WSL2*: Pastikan Docker Desktop berjalan dan integrasi WSL2 aktif.

---

## Panduan Setup & Instalasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi dari awal (fresh clone):

### 1. Clone Repositori
```bash
git clone <repository-url>
cd polman-pelayanan
```

### 2. Konfigurasi Environment (.env)
Salin template konfigurasi `.env.example` menjadi file `.env`:
```bash
cp .env.example .env
```
Konfigurasi default pada `.env`:
- Port Web Aplikasi: `8079`
- Port Database Eksternal: `3307` (bisa dihubungkan via DBeaver, TablePlus, atau HeidiSQL)
- Nama Database: `polman_pelayanan`
- Kredensial Database: user `root`, password `root`

### 3. Build dan Jalankan Container Docker
Jalankan container menggunakan Docker Compose:
```bash
docker compose up -d --build
```

> **Catatan Dependency (Composer)**:
> Folder `vendor/` tidak disimpan di Git (`.gitignore`) demi menjaga kebersihan repositori. Saat container pertama kali dinyalakan, Docker entrypoint secara otomatis akan menjalankan `composer install --no-dev` berdasarkan `composer.lock`. Versi package dijamin 100% identik dan konsisten di setiap clone tanpa risiko perbedaan versi dependency.

### 4. Jalankan Database Migration & Seeder
Setelah container berhasil running, eksekusi migrasi database dan pengisian data awal (seeder):
```bash
docker exec polman-pelayanan-app php migrate fresh --seed
```

### 5. Akses Aplikasi
Buka peramban (browser) dan akses alamat berikut:
```text
http://localhost:8079
```

---

## Perintah Operasional Harian

Berikut beberapa perintah umum untuk mengelola container aplikasi:

- **Melihat status container**:
  ```bash
  docker compose ps
  ```

- **Melihat log container secara realtime**:
  ```bash
  docker compose logs -f app
  ```

- **Menghentikan container**:
  ```bash
  docker compose stop
  ```

- **Menjalankan kembali container**:
  ```bash
  docker compose start
  ```

- **Mematikan dan membersihkan container**:
  ```bash
  docker compose down
  ```

- **Reset total database dan container (hapus volume database)**:
  ```bash
  docker compose down -v
  docker compose up -d
  docker exec polman-pelayanan-app php migrate fresh --seed
  ```

---

## Database Migration & Seeder CLI

Aplikasi ini menggunakan CLI migrasi kustom `php migrate` (mengadopsi konsep `php artisan migrate` dari Laravel).

Jalankan perintah ini melalui container aplikasi:
```bash
docker exec polman-pelayanan-app php migrate <perintah>
```

### Daftar Perintah Migrasi

| Perintah | Fungsi |
| :--- | :--- |
| `php migrate` | Menjalankan file migrasi baru yang belum dieksekusi. |
| `php migrate rollback` | Mengembalikan (rollback) batch migrasi terakhir. |
| `php migrate reset` | Me-rollback semua migrasi yang pernah dijalankan. |
| `php migrate refresh` | Reset total lalu menjalankan kembali seluruh migrasi. |
| `php migrate fresh` | Drop seluruh tabel di database lalu jalankan migrasi dari awal. |
| `php migrate fresh --seed` | Drop tabel, migrasi ulang, dan otomatis isi data master/seeder. |
| `php migrate status` | Menampilkan tabel status migrasi (Ran / Pending) serta batch-nya. |
| `php migrate seed` | Menjalankan master seeder (`DatabaseSeeder`). |
| `php migrate seed --class=X` | Menjalankan seeder tertentu (contoh: `--class=PelayananSeeder`). |
| `php migrate make:migration <nama>` | Membuat file migrasi baru di `database/migrations/`. |
| `php migrate make:seeder <nama>` | Membuat file seeder baru di `database/seeders/`. |

---

## Akun Pengguna Default

Setelah menjalankan seeder (`php migrate seed` atau `php migrate fresh --seed`), gunakan akun berikut untuk masuk ke sistem:

| Role | Username | Password | Hak Akses |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin` | `admin123` | Akses penuh (Master data, user management, transaksi, laporan, audit log) |
| **Operator** | `operator` | `operator123` | Akses operasional transaksi kasir dan riwayat transaksi |

*Catatan: Password dienkripsi dengan standar hash bcrypt `password_hash()`.*

---

## Struktur Folder

```text
polman-pelayanan/
├── application/
│   ├── config/              # Konfigurasi CodeIgniter & Eloquent ORM
│   ├── controllers/         # Controller (Auth, Dashboard, Transaksi, Form, dll)
│   ├── models/              # Model Eloquent (M_users, M_pelayanan, dll)
│   └── views/               # Template dan tampilan view aplikasi
├── assets/                  # CSS, JS, Gambar, dan Vendor asset frontend (SBAdmin)
├── database/
│   ├── migrations/          # File definisi skema tabel database
│   └── seeders/             # File seeder pengisian data awal
├── MigrateCore/             # Engine custom Migration & Seeder CLI
├── docker-compose.yml       # Konfigurasi orkestrasi multi-container
├── Dockerfile               # Konfigurasi container PHP 7.4 Apache & Composer
├── docker-entrypoint.sh     # Script otomatis instalasi dependency saat startup
├── migrate                  # CLI runner executable
├── .env.example             # Template konfigurasi environment
└── readme.md                # Dokumentasi proyek
```

---

## Lisensi

Proyek ini dikembangkan untuk kebutuhan operasional kasir & pelayanan Politeknik Manufaktur Negeri Bandung (Polman Bandung).
