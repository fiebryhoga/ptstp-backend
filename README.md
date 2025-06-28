

````md
# PTSTP Backend (Laravel)

Proyek backend ini merupakan bagian dari sistem profil perusahaan **PT. Siwalan Tehnik Perkasa**, yang dibangun menggunakan Laravel sebagai REST API dan admin panel. Frontend dikembangkan secara terpisah menggunakan **Next.js (React)**.

---

## 🚀 Teknologi yang Digunakan

- **Laravel 10+**
- **Laravel Breeze** (Autentikasi dasar)
- **Laravel Mix** untuk asset bundling
- **MySQL** sebagai database
- **Tailwind CSS** untuk styling

---

## ⚙️ Persyaratan Sistem

| Tools      | Versi Minimum     |
|------------|--------------------|
| PHP        | 8.1                |
| Composer   | 2.x                |
| MySQL      | 5.7 / MariaDB 10.3 |
| Node.js    | 16.x               |
| NPM        | 8.x                |

---

## 📦 Langkah Instalasi

````


### 1. Clone Repository

```bash
git clone https://github.com/fiebryhoga/ptstp-backend.git
cd ptstp-backend
````


### 2. Install Dependensi

```bash
composer install
npm install
```

### 3. Setup File `.env`

```bash
cp .env.example .env
```

Lalu edit `.env` untuk sesuaikan dengan database lokalmu:

```env
APP_NAME=PTSTP
APP_URL=http://localhost:8001

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ptstp
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Migrasi & Seeder

```bash
php artisan migrate --seed
```

Seeder akan mengisi data awal untuk:

* Mengenal Kami
* Mengapa Kami
* Layanan Kami
* Profil Perusahaan
* Kontak Kami
* Pesan Masuk (form)
* Admin User

### 6. Buat Link Storage

```bash
php artisan storage:link
```

### 7. Compile Asset (Laravel Mix)

```bash
npm run dev
```

> Untuk produksi:

```bash
npm run prod
```

### 8. Jalankan Server

```bash
php artisan serve --port=8001
```

Akses backend admin di:

```
http://localhost:8001
```

---

## 🔐 Login Admin

| Email                     | Password        |
| ------------------------- | --------------- |
| `admin@siwalantehnik.com` | `password123` |

---

## 🧩 Fitur

* Autentikasi Admin
* CRUD Dinamis:

  * Mengenal Kami (4 data tetap, hanya bisa diedit)
  * Mengapa Kami (6 data tetap, hanya bisa diedit)
  * Layanan Kami (CRUD + Upload Gambar)
  * Profil Perusahaan (editable satu data)
  * Kontak Kami (editable satu data)
  * Pesan Masuk (dari form frontend)

---

## 📁 Struktur Direktori Penting

```
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
database/
├── migrations/
├── seeders/
resources/
├── views/
│   └── admin/
├── css/
└── js/
```

---

## 🧑‍💻 Developer

* Hafa Tech Hub (Creative Group)


---



---

