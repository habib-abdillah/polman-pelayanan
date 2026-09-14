# 🛠️ Sistem Informasi Kasir & Pelayanan Polman Bandung

Aplikasi web kasir dan manajemen pelayanan bengkel/jasa, dibangun menggunakan **CodeIgniter 3**, **Illuminate Eloquent ORM**, dan dilengkapi sistem **Database Migration & Seeder CLI** custom ala Laravel (`php migrate`).

---

## 📌 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi & Stack](#-teknologi--stack)
- [Struktur Database & Sistem Migrasi](#-struktur-database--sistem-migrasi)
- [Petunjuk Instalasi (Docker)](#-petunjuk-instalasi-docker)
- [Database Migration & Seeder CLI](#-database-migration--seeder-cli)
- [Akun Pengguna Default](#-akun-pengguna-default)
- [Struktur Folder](#-struktur-folder)

---

## 🚀 Fitur Utama

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
- **Ekspor Laporan**: Dukungan ekspor data tabel ke format Excel, PDF, serta Column Visibility toggle.

---

## 💻 Teknologi & Stack

| Komponen | Teknologi |
| :--- | :--- |
| **Framework Backend** | CodeIgniter 3.1.x |
| **ORM / Data Access** | Illuminate Database (Eloquent ORM) |
| **PHP Version** | PHP 7.4-Apache |
| **Database** | MariaDB 10.4 / MySQL |
| **Styling & UI** | Bootstrap 5, FontAwesome 6, Datatables Responsive, ApexCharts/Chart.js |
| **Containerization** | Docker & Docker Compose |

---

## 🐳 Petunjuk Instalasi (Docker)

Aplikasi telah disiapkan menggunakan Docker Compose agar mudah dijalankan di environment mana pun tanpa perlu install web server manual.

### 1. Clone Repositori
```bash
git clone <repository-url>
cd polman-pelayanan
```

### 2. Konfigurasi Environment
Salin file konfigurasi `.env.example` ke `.env`:
```bash
cp .env.example .env
```
Default konfigurasi `.env`:
- **Port Aplikasi**: `http://localhost:8079`
- **Port Database Eksternal**: `3307` (bisa diakses via DBeaver / TablePlus / HeidiSQL)
- **Database**: `polman_pelayanan` (user: `root`, pass: `root`)

### 3. Jalankan Container
```bash
docker compose up -d --build
```

### 4. Setup Database & Jalankan Migrasi + Seeder
Jalankan migrasi dan seeder otomatis melalui container:
```bash
docker exec polman-pelayanan-app php migrate fresh --seed
```

Aplikasi sekarang siap digunakan di peramban: **[http://localhost:8079](http://localhost:8079)**.

---

## ⚡ Database Migration & Seeder CLI

Project ini dilengkapi dengan custom command-line interface `migrate` (setara dengan `php artisan migrate` di Laravel).

Untuk menjalankan perintah, gunakan via container aplikasi:
```bash
docker exec polman-pelayanan-app php migrate <command>
```
*(atau langsung `php migrate <command>` jika menjalankan PHP di host lokal)*

### Daftar Perintah Migrasi

| Perintah | Keterangan |
| :--- | :--- |
| `php migrate` | Menjalankan seluruh file migration yang belum dieksekusi. |
| `php migrate rollback` | Mengembalikan (rollback) batch migrasi terakhir. |
| `php migrate reset` | Me-rollback seluruh migrasi yang pernah dijalankan. |
| `php migrate refresh` | Melakukan reset total lalu menjalankan kembali semua migrasi. |
| `php migrate fresh` | Drop semua tabel yang ada lalu mengeksekusi ulang migrasi dari awal. |
| `php migrate fresh --seed` | Drop tabel, jalankan migrasi, dan langsung isi data awal (seeder). |
| `php migrate status` | Melihat daftar status migrasi (Ran / Pending) dan nomor batch-nya. |
| `php migrate seed` | Menjalankan master seeder (`DatabaseSeeder`). |
| `php migrate seed --class=X` | Menjalankan file seeder spesifik (contoh: `--class=PelayananSeeder`). |
| `php migrate make:migration <name>` | Membuat template file migrasi baru di `database/migrations/`. |
| `php migrate make:seeder <name>` | Membuat template file seeder baru di `database/seeders/`. |

### Contoh Struktur Migration (`database/migrations/`):
```php
use MigrateCore\Migration;

class CreateMsPelayananTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `ms_pelayanan` (
                `id`             varchar(100) NOT NULL PRIMARY KEY,
                `kode_pelayanan` varchar(100) NOT NULL,
                `nama_pelayanan` varchar(100) NOT NULL,
                `harga`          int(100) NOT NULL,
                `keterangan`     varchar(100) NOT NULL,
                `status_aktif`   int(11) NOT NULL DEFAULT 1,
                `user_id_buat`   varchar(100) NOT NULL,
                `user_id_ubah`   varchar(100) NOT NULL,
                `created_at`     date NOT NULL,
                `updated_at`     date NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `ms_pelayanan`;");
    }
}
```

---

## 🔑 Akun Pengguna Default

Setelah menjalankan seeder (`php migrate seed` atau `php migrate fresh --seed`), akun berikut dapat langsung digunakan untuk login:

| Role | Username | Password | Keterangan |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin` | `admin123` | Akses penuh (Master data, user, transaksi, reports, audit log) |
| **Operator** | `operator` | `operator123` | Akses operasional kasir & riwayat transaksi |

*(Catatan: Password di-hash menggunakan standar bcrypt `password_hash()`)*

---

## 📁 Struktur Folder Proyek

```text
polman-pelayanan/
├── application/
│   ├── config/              # Konfigurasi CI3 & Eloquent
│   ├── controllers/         # Controller aplikasi (Auth, Dashboard, Transaksi, dll)
│   ├── models/              # Eloquent Models (M_users, M_pelayanan, dll)
│   └── views/               # Blade-style / PHP Views & Komponen UI
├── assets/                  # File CSS, JS, Vendor, dan Icons
├── database/
│   ├── migrations/          # File definisi skema tabel database
│   └── seeders/             # File pengisian data awal (dummy/master)
├── MigrateCore/             # Engine custom Migration & Seeder CLI
├── docker-compose.yml       # Konfigurasi multi-container Docker
├── Dockerfile               # Konfigurasi image PHP 7.4 Apache
├── migrate                  # Script runner CLI executable
├── .env.example             # Template konfigurasi environment
└── README.md                # Dokumentasi proyek
```

---

## 📄 Lisensi

Proyek ini dikembangkan untuk kebutuhan operasional kasir & pelayanan Politeknik Manufaktur Negeri Bandung (Polman Bandung).
