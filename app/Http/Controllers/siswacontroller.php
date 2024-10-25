<?php

namespace App\Http\Controllers;

use App\Models\Siswa; // Jika Anda ingin menggunakan model Siswa
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Tampilkan form pendaftaran
    public function create()
    {
        return view('pendaftaran');
    }

    // Simpan data pendaftaran
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:siswas',
            'telepon' => 'required',
            'jurusan' => 'required',
            'dokumen' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $dokumenPath = $request->file('dokumen')->store('dokumen', 'public');

        Siswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'jurusan' => $request->jurusan,
            'dokumen' => $dokumenPath,
        ]);

        return redirect()->route('cek-status')->with('success', 'Pendaftaran berhasil.');
    }

    // Cek status pendaftaran
    public function cekStatus(Request $request)
    {
        $siswa = null; // Inisialisasi variabel siswa dengan null

        if ($request->has('email')) {
            // Mencari siswa berdasarkan email
            $siswa = Siswa::where('email', $request->input('email'))->first();

            if (!$siswa) {
                return redirect()->back()->with('error', 'Email tidak ditemukan.');
            }
        }

        return view('cek-status', compact('siswa'));
    }

    // Menampilkan pengumuman
    public function pengumuman()
    {
        // Contoh pengumuman dalam array
        $pengumuman = [
            ['judul' => 'Pengumuman 1', 'isi' => 'Pendaftaran dibuka hingga 30 September.'],
            ['judul' => 'Pengumuman 2', 'isi' => 'Ujian berlangsung pada 15 Oktober.'],
            ['judul' => 'Pengumuman 3', 'isi' => 'Hasil ujian akan diumumkan pada 1 November.'],
        ];

        return view('pengumuman', compact('pengumuman')); // Kembalikan view dengan data pengumuman
    }
}