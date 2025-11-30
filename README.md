# Laboratory of Applied Informatics - Halaman Anggota

Proyek website statis yang berfokus pada halaman profil anggota dari Laboratory of Applied Informatics.

## 📁 Struktur Project

```
pbl/
├── index.html              # Halaman utama Mitra/Member
├── css/
│   └── styles.css         # Styling untuk seluruh website
├── js/
│   └── navigation.js      # Script navigasi
├── img/                   # Folder untuk gambar
└── README.md              # Dokumentasi ini
```

## 📄 File Utama

### **index.html**
Halaman utama yang menampilkan:
- Profil Kepala Laboratorium (Ir. Yan Watequlis Syaifudin, S.T., M.M.T., Ph.D)
- Daftar Peneliti (3 kartu dengan profil)
- Daftar Asisten Laboratorium (3 kartu dengan profil)

### **css/styles.css**
File CSS yang berisi styling untuk:
- Navbar responsif
- Hero section
- Member cards
- Footer
- Responsive design

### **js/navigation.js**
Script JavaScript untuk handler navigasi

## 🚀 Cara Memulai

1. Pastikan gambar sudah ada di folder `img/`:
   - `logo.png` - Logo laboratorium
   - `gedung-sipil.jpg` - Gambar hero section

2. Buka di browser:
   ```
   http://localhost/pbl/
   ```

## 🎨 Warna yang Digunakan

- Biru tua (`#0A2346`) - Navbar, heading
- Orange (`#FF8C42`) - Button, badge
- Teal (`#00A0C6`) - Avatar background

## ✏️ Cara Mengedit

### Menambah Peneliti Baru
1. Buka `index.html`
2. Cari section "PENELITI"
3. Duplikasi salah satu card dan update:
   - Nama di tag `<h4>`
   - Deskripsi di tag `<p>`

### Menambah Asisten Baru
1. Cari section "ASISTEN LABORATORIUM"
2. Duplikasi card asisten dan update data

### Mengubah Info Footer
Update konten di tag `<footer>`

## 📱 Responsive Design

Website sudah responsive untuk:
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (<768px)
