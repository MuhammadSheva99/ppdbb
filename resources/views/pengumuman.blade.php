<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Hasil Seleksi - Sekolah Programmer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .announcement-container {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    @include('nav') <!-- Pastikan file nav.blade.php ada dan dapat diakses -->

    <div class="announcement-container">
        <h1>Pengumuman Hasil Seleksi PPDB - Sekolah Programmer</h1>

        <ul>
            @foreach($pengumuman as $item) <!-- Ganti $siswa dengan $pengumuman -->
                <li>
                    <strong>{{ $item['judul'] }}</strong>: {{ $item['isi'] }} <!-- Menampilkan judul dan isi pengumuman -->
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>