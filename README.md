# 🍽️ Makan Timuran

**Makan Timuran** adalah sebuah website berbasis **PHP, MySQL, dan JavaScript** yang dibuat untuk memperkenalkan sekaligus melestarikan kekayaan kuliner tradisional dari **Provinsi Jawa Timur**.  
Website ini dikembangkan ulang dengan dilengkapi sistem **login member, role admin, dashboard admin, serta monitoring user online secara realtime**.

![IMG](https://github.com/AdeeM03/Makan-Timuran-v2/blob/5e565789e2f4da22f883b37ff612e80d4ab60d61/IMG/Screenshot%202025-12-20%20203554.png)
![IMG](https://github.com/AdeeM03/Makan-Timuran-v2/blob/5e565789e2f4da22f883b37ff612e80d4ab60d61/IMG/Screenshot%202025-12-20%20203616.png)
![IMG](https://github.com/AdeeM03/Makan-Timuran-v2/blob/5e565789e2f4da22f883b37ff612e80d4ab60d61/IMG/Screenshot%202025-12-20%20203623.png)
![IMG](https://github.com/AdeeM03/Makan-Timuran-v2/blob/ecf8be5a10df1c9a6c7e1322158f42dd5bdaf05d/IMG/Screenshot%202025-12-20%20205423.png)

## 🔐 User Login
###  Akun Admin
- **Username** : `admin1`
- **Password** : `1admin`
---

## ✨ Fitur Utama
### 👤 Fitur Member
- Login & Logout menggunakan session PHP
- Password terenkripsi (`password_hash`)
- Melihat rekomendasi tempat makan
- Melihat user online
- Navigasi dan UI konsisten

### 🛠️ Fitur Admin
- Login khusus admin (role-based access)
- Dashboard admin
- Monitoring user online **realtime**
- Statistik total user & tempat rekomendasi
- Menambahkan tempat rekomendasi via website (tanpa input manual DB)

### 📍 Rekomendasi Tempat
- Data dari database MySQL
- Detail tempat (alamat, jam, kontak)
- Integrasi Google Maps
- CRUD dibatasi khusus admin

### ⚙️ Fitur JavaScript
- Highlight menu navigasi otomatis
- Scroll to Top button
- Hero text fade-in animation
- Navbar effect saat scroll
- Fade-in element saat scroll
- Realtime fetch data (monitoring user online)

---

## 💻 Teknologi yang Digunakan

| Teknologi | Fungsi |
|---------|-------|
| HTML5 | Struktur halaman |
| CSS3 | Styling & layout |
| JavaScript | Interaksi & realtime |
| PHP Native | Backend & authentication |
| MySQL | Database |
| Apache (XAMPP) | Web server |

---

## 🗄️ Struktur Database (Ringkas)
### users
- id
- username
- password (hashed)
- role (admin / member)

### user_sessions
- user_id (unique)
- last_activity
- is_active

### places
- name
- city
- address
- specialty
- hours
- phone
- lat
- lng
- image

---

## 🧭 Alur Sistem

1. User membuka website
2. Login sebagai member atau admin
3. Session disimpan di database
4. Admin dapat memantau user online secara realtime
5. Logout menghapus session dan menonaktifkan status user

---

## 🎯 Tujuan Pengembangan
- Media edukasi kuliner Jawa Timur
- Implementasi fullstack web
- Latihan authentication & authorization
- Proyek **UAS Websi**

---

