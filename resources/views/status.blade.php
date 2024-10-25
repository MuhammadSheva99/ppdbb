<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pendaftaran</title>
</head>
<body>
    @include('nav')
    <h1>Status Pendaftaran</h1>

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @else
        <p>Nama: {{ $siswa->nama }}</p>
        <p>Email: {{ $siswa->email }}</p>
        <p>Jurusan: {{ $siswa->jurusan }}</p>
        <p>Status: {{ $siswa->status }}</p>
    @endif

    <form action="{{ route('cek-status') }}" method="GET">
        <label>Email untuk cek status:</label>
        <input type="email" name="email" required>
        <button type="submit">Cek Status</button>
    </form>
</body>
</html>