<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Navigation</title>
    <style>
        nav {
            background-color: #f8f9fa;
            padding: 10px;
            display: flex; /* Menggunakan flexbox untuk penyelarasan */
            justify-content: space-between; /* Memberi ruang antara logo dan navbar */
            align-items: center; /* Menyelaraskan item secara vertikal */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk kedalaman */
            transition: background-color 0.3s; /* Transisi untuk perubahan latar belakang */
        }
        .logo {
            flex: 1; /* Memberi ruang untuk logo */
        }
        .navbar {
            display: flex; /* Menggunakan flexbox untuk navbar */
            justify-content: center; /* Menempatkan navbar di tengah */
            flex: 2; /* Menyediakan ruang yang lebih untuk navbar */
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; /* Menggunakan flex untuk daftar item */
        }
        li {
            margin-right: 20px;
        }
        a {
            text-decoration: none;
            padding: 10px;
            color: #000;
            position: relative; /* Untuk efek animasi */
            transition: color 0.3s; /* Transisi untuk perubahan warna */
        }
        a:hover {
            color: #007bff; /* Ubah warna teks saat hover */
        }
        a::after {
            content: ''; /* Untuk membuat garis di bawah link */
            position: absolute;
            left: 0;
            right: 0;
            bottom: -5px; /* Jarak garis dari teks */
            height: 2px;
            background-color: #007bff; /* Warna garis */
            transform: scaleX(0); /* Mulai dari 0 */
            transition: transform 0.3s ease; /* Transisi untuk efek animasi */
        }
        a:hover::after {
            transform: scaleX(1); /* Skala ke 1 saat hover */
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="path/to/your/logo.png" alt="Logo" style="height: 50px;"> 
        </div>
        <div class="navbar">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('siswa.create') }}">Pendaftaran</a></li>
                <li><a href="{{ route('cek-status') }}">Cek Status Pendaftaran</a></li>
                <li><a href="{{ route('pengumuman') }}">Pengumuman Hasil Seleksi</a></li>
                <li><a href="{{ route('bantuan-faq') }}">Bantuan dan FAQ</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>