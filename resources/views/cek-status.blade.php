<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pendaftaran - Sekolah Programmer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            color: #2c3e50;
        }
        .status-container {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto; /* Tambahkan margin untuk centering */
        }
    </style>
</head>
<body>
    @include('nav')

    <div class="status-container">
        <h1>Status Pendaftaran - Sekolah Programmer</h1>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @elseif (isset($siswa))
            <p>Nama: {{ $siswa->nama }}</p>
            <p>NISN: {{ $siswa->nisn }}</p>
            <p>Jurusan: {{ $siswa->jurusan }}</p>
            <p>Status: {{ $siswa->status }}</p>
        @else
            <p>Masukkan NISN Anda untuk mengecek status pendaftaran ke sekolah programmer kami.</p>
        @endif

        <form action="{{ route('cek-status') }}" method="GET">
            <label>NISN untuk cek status:</label>
            <input type="email" name="email" required>
            <button type="submit">Cek Status</button>
        </form>
    </div>
</body>
</html>