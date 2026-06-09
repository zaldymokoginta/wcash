# 💰 WCash

**WCash** adalah aplikasi manajemen keuangan mahasiswa berbasis web yang dibangun menggunakan **PHP Native**, **MySQL**, **MVC Architecture**, dan **Repository Pattern**.

Aplikasi ini membantu mahasiswa mencatat pemasukan dan pengeluaran, memantau kondisi keuangan, melihat analisis data melalui grafik, serta menghasilkan laporan keuangan dalam format PDF.

---

## 📌 Latar Belakang

Mahasiswa sering mengalami kesulitan dalam mengelola keuangan bulanan. Banyak mahasiswa tidak mengetahui ke mana uang mereka digunakan dan sering kehabisan uang sebelum akhir bulan.

WCash dikembangkan untuk membantu mahasiswa:

- Mencatat pemasukan dan pengeluaran
- Mengetahui kategori pengeluaran terbesar
- Memonitor kondisi keuangan
- Membuat laporan keuangan yang dapat diarsipkan

---

## ✨ Fitur Utama

### 🔐 Authentication

- Register
- Login
- Logout
- Password Hashing
- Session Authentication

### 💳 Transaction Management

- Tambah transaksi
- Kategori transaksi
- Income (Pemasukan)
- Expense (Pengeluaran)
- Riwayat transaksi

### 📊 Dashboard Analytics

- Total Balance
- Total Income
- Total Expense

### 📈 Visualisasi Data

- Expense by Category (Pie Chart)
- Income by Category (Pie Chart)
- Income vs Expense (Line Chart)

### 📄 Export PDF

- Download laporan keuangan
- Ringkasan income
- Ringkasan expense
- Ringkasan balance
- Daftar transaksi
- Siap untuk print dan arsip

---

## 🏗️ Arsitektur

Project ini menggunakan pola:

### MVC (Model View Controller)

```text
User
 ↓
Controller
 ↓
Repository
 ↓
Database

Controller
 ↓
View
 ↓
Browser
```

### Repository Pattern

Repository digunakan untuk memisahkan query database dari controller.

Contoh:

```php
$income = $transactionRepo->getTotalIncome($userId);
```

Controller hanya menangani business logic sedangkan query SQL berada di Repository.

---

## 🛠️ Teknologi

- PHP 8+
- MySQL
- Bootstrap 5
- JavaScript
- Chart.js
- Dompdf
- Composer

---

## 📂 Struktur Folder

```text
wcash/
│
├── app/
│   ├── Controllers/
│   ├── Repositories/
│   ├── Views/
│   ├── Core/
│   └── Models/
│
├── public/
│
├── vendor/
│
├── composer.json
│
└── README.md
```

---

## 🗄️ Database

Tabel utama:

### users

Menyimpan data pengguna.

### categories

Menyimpan kategori transaksi.

### transactions

Menyimpan data pemasukan dan pengeluaran.

Relasi:

```text
Users (1)
   │
   └── (N) Transactions

Categories (1)
   │
   └── (N) Transactions
```

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/wcash.git
```

### 2. Masuk Folder Project

```bash
cd wcash
```

### 3. Install Dependency

```bash
composer install
```

### 4. Buat Database

Contoh:

```sql
CREATE DATABASE wcash;
```

### 5. Import Database

Import file SQL yang tersedia.

### 6. Konfigurasi Database

Edit file konfigurasi database sesuai environment lokal.

```php
host = localhost
database = wcash
username = root
password =
```

### 7. Jalankan XAMPP

Aktifkan:

- Apache
- MySQL

### 8. Akses Website

```text
http://localhost/wcash/public
```

---

## 📸 Screenshot

### Login Page

Tambahkan screenshot login di sini.

### Dashboard

Tambahkan screenshot dashboard di sini.

### Analytics

Tambahkan screenshot chart di sini.

### Export PDF

Tambahkan screenshot laporan PDF di sini.

---

## 🎓 Tujuan Akademik

Project ini dibuat sebagai tugas akhir mata kuliah **Pemrograman Web** dengan menerapkan:

- PHP Native
- MVC Architecture
- Repository Pattern
- Session Authentication
- Data Visualization
- PDF Report Generation

---

## 👨‍💻 Author

Nama: **Zaldy Alamssyah Mokoginta**

Program Studi: **Teknik Informatika**

Universitas: **STMIK Widya Cipta Dharma**

Tahun: **2026**

---

## 📄 License

Project ini dibuat untuk tujuan pembelajaran dan pengembangan portofolio.
