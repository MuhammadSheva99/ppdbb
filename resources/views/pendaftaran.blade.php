<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDB - Sekolah Programmer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select {
            width: 90%; /* Mengatur lebar input field menjadi 90% */
            padding: 10px;
            margin-bottom: 20px;
        }
        button {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #1a252f;
        }
        .additional-section {
            display: none;
        }
    </style>

    <script>
        // Fungsi untuk menampilkan bagian jalur pendaftaran yang sesuai
        function checkJalur() {
            var jalur = document.getElementById("jalur").value;
            var zonasiSection = document.getElementById("zonasi-section");
            var afirmasiSection = document.getElementById("afirmasi-section");
            var perpindahanSection = document.getElementById("perpindahan-section");
            var prestasiSection = document.getElementById("prestasi-section");

            zonasiSection.style.display = jalur === "zonasi" ? "block" : "none";
            afirmasiSection.style.display = jalur === "afirmasi" ? "block" : "none";
            perpindahanSection.style.display = jalur === "perpindahan_orangtua" ? "block" : "none";
            prestasiSection.style.display = jalur === "prestasi" ? "block" : "none";
        }

        function tambahKejuaraan() {
            var container = document.getElementById('kejuaraan-container');
            var newKejuaraan = document.createElement('div');
            newKejuaraan.classList.add('kejuaraan-container');
            newKejuaraan.innerHTML = `
                <label>Kejuaraan:</label>
                <input type="text" name="kejuaraan[]" placeholder="Nama Kejuaraan"><br>

                <label>Tingkat Kejuaraan:</label>
                <select name="tingkat_kejuaraan[]">
                    <option value="kota">Kota</option>
                    <option value="provinsi">Provinsi</option>
                    <option value="nasional">Nasional</option>
                    <option value="internasional">Internasional</option>
                </select><br>
                <label>Unggah Sertifikat (PDF/JPG/PNG):</label>
                <input type="file" name="sertifikat[]"><br><br>
            `;
            container.appendChild(newKejuaraan);
        }
    </script>
</head>
<body>
    @include('nav')

    <div class="form-container">
        <h1>Formulir Pendaftaran Sekolah Programmer</h1>

        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            <!-- Pilihan Jalur Pendaftaran -->
            <label>Pilih Jalur Pendaftaran:</label>
            <select name="jalur" id="jalur" onchange="checkJalur()" required style="width: 200px;">
                <option value="zonasi">Zonasi</option>
                <option value="prestasi">Prestasi</option>
                <option value="afirmasi">Afirmasi</option>
                <option value="perpindahan_orangtua">Perpindahan Orang Tua</option>
            </select><br>

            <div id="zonasi-section" class="additional-section">
                <h3>Data Tambahan Jalur Zonasi</h3>
            
                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 400px;"><br>
            
                        <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px;"><br>
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Tempat Lahir:</label>
                                <select id="tempat_lahir" name="tempat_lahir" required style="width: 350px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                        <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const tempatLahirSelect = document.getElementById('tempat_lahir');
                        
                            // Fetch data kota dari server
                            fetch('get_cities.php')
                                .then(response => response.json())
                                .then(data => {
                                    data.forEach(city => {
                                        const option = document.createElement('option');
                                        option.value = city;
                                        option.textContent = city;
                                        tempatLahirSelect.appendChild(option);
                                    });
                                })
                                .catch(error => console.error('Error:', error));
                        });
                        </script>
                        </div>
                    </div>
                        
                        <label>Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" required><br>
            
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
            
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px;"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px;">
                            </div>
                        </div><br>
                        
                        <label>Kelurahan:</label>
                        <input type="text" name="kelurahan" maxlength="50" style="width: 200px;"><br>
            
                        <label>Kecamatan:</label>
                        <input type="text" name="kecamatan" maxlength="50" style="width: 200px;"><br>
            
                        <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 200px;"><br>
            
                        <label>Provinsi:</label>
                        <input type="text" name="provinsi" maxlength="50" style="width: 200px;"><br>
            
                        <label>Telepon:</label>
                        <input type="text" name="telepon" maxlength="14" required style="width: 150px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                        <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px;"><br>
            
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px;">
                            </div>
                            <div>
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px;">
                            </div>
                        </div><br>
            
                        <div style="margin-bottom: 10px;">
                            <label>Kelurahan:</label>
                            <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                        </div>
            
                        <div style="margin-bottom: 10px;">
                            <label>Kecamatan:</label>
                            <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                        </div>
            
                        <div style="margin-bottom: 10px;">
                            <label>Kota:</label>
                            <input type="text" name="kota" maxlength="50" style="width: 200px;">
                        </div>
            
                        <div style="margin-bottom: 10px;">
                            <label>Provinsi:</label>
                            <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                        </div>  
                    
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px;"><br>
                    </div>
            
                    <!-- Kolom Kanan -->
                    <div style="flex: 1;">
                        <!-- Bagian Unggahan dan Jarak -->
                        <!-- Bagian Unggahan -->
                    <div style="margin-top: 20px;">
                        
                        <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>
                        
                        <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                        <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
                        <br>
                        <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
                        <br><br>
            
                        <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                        <input type="file" name="kk" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
                        <br>
                        <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
                        <br><br>
            
                        <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                        <input type="file" name="skl" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
                        <br>
                        <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
                    </div>
            
                    <script>
                    // Fungsi untuk mempreview gambar yang diunggah
                    function previewImage(event, previewId, deleteButtonId) {
                        var input = event.target;
                        var reader = new FileReader();
                        
                        reader.onload = function() {
                            var preview = document.getElementById(previewId);
                            preview.src = reader.result;
                            preview.style.display = 'block'; // Tampilkan gambar preview
                            
                            var deleteButton = document.getElementById(deleteButtonId);
                            deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                        };
                        
                        reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
                    }
            
                    // Fungsi untuk menghapus gambar dan reset input
                    function deleteImage(inputId, previewId, deleteButtonId) {
                        var input = document.getElementById(inputId);
                        var preview = document.getElementById(previewId);
                        var deleteButton = document.getElementById(deleteButtonId);
            
                        input.value = ''; // Reset input file
                        preview.src = ''; // Hapus gambar preview
                        preview.style.display = 'none'; // Sembunyikan gambar preview
                        deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
                    }
                    </script>
            
                        <!-- Field untuk Input Lokasi -->
                        <label>Latitude Rumah:</label>
                        <input type="text" id="lat_rumah" name="lat_rumah" required><br>
                        
                        <label>Longitude Rumah:</label>
                        <input type="text" id="lon_rumah" name="lon_rumah" required><br>
                        
                       <!-- Hidden field untuk latitude dan longitude sekolah -->
            <input type="hidden" id="lat_sekolah" name="lat_sekolah" value="-6.200000">
            <input type="hidden" id="lon_sekolah" name="lon_sekolah" value="106.816666">

                        <label>Jarak Rumah ke Sekolah:</label>
                        <input type="text" id="jarak_rumah_sekolah" name="jarak_rumah_sekolah" readonly><br>
            
                        <!-- Tambahkan div untuk peta -->
                        <div id="map-canvas" style="height: 400px; width: 100%; margin-top: 20px;"></div>
                    </div>
                </div>
                <!-- Checkbox Setuju -->
<div style="display: flex; align-items: center;">
    <div style="margin-right: 10px;">
        <div class="checkbox-container"></div>
        <input type="checkbox" id="terms" name="terms" required onchange="toggleSubmitButton()">
        <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
    </div>
</div>

<!-- Tombol Daftar -->
<div style="margin-top: 10px;">
    <button id="submit-btn" type="submit" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
</div>

<!-- Script untuk menonaktifkan tombol sebelum checkbox dicentang -->
<script>
    function toggleSubmitButton() {
        const checkbox = document.getElementById('terms');
        const submitButton = document.getElementById('submit-btn');
        submitButton.disabled = !checkbox.checked;
    }
</script>
            
            </div>
            
            <!-- Script untuk Google Maps dan menghitung jarak serta menampilkan rute -->
            <script>
                var map, directionsService, directionsRenderer;
            
                function initMap() {
                    directionsService = new google.maps.DirectionsService();
                    directionsRenderer = new google.maps.DirectionsRenderer();
            
                    map = new google.maps.Map(document.getElementById('map-canvas'), {
                        center: { lat: -6.200000, lng: 106.816666 }, // Lokasi default
                        zoom: 10
                    });
            
                    directionsRenderer.setMap(map);
                }
            
                function drawRoute(latRumah, lonRumah, latSekolah, lonSekolah) {
                    const request = {
                        origin: { lat: latRumah, lng: lonRumah },
                        destination: { lat: latSekolah, lng: lonSekolah },
                        travelMode: 'DRIVING'
                    };
            
                    directionsService.route(request, function(result, status) {
                        if (status === 'OK') {
                            directionsRenderer.setDirections(result);
                        } else {
                            alert('Gagal menampilkan rute: ' + status);
                        }
                    });
                }
            
                function haversine(lat1, lon1, lat2, lon2) {
                    const R = 6371; // Radius bumi dalam kilometer
                    const dLat = (lat2 - lat1) * Math.PI / 180;
                    const dLon = (lon2 - lon1) * Math.PI / 180;
                    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                              Math.sin(dLon / 2) * Math.sin(dLon / 2);
                    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                    return R * c; // Jarak dalam kilometer
                }
            
                function hitungJarak() {
                    const latRumah = parseFloat(document.getElementById("lat_rumah").value);
                    const lonRumah = parseFloat(document.getElementById("lon_rumah").value);
                    const latSekolah = parseFloat(document.getElementById("lat_sekolah").value);
                    const lonSekolah = parseFloat(document.getElementById("lon_sekolah").value);
            
                    if (!isNaN(latRumah) && !isNaN(lonRumah)) {
                        const jarak = haversine(latRumah, lonRumah, latSekolah, lonSekolah);
                        document.getElementById("jarak_rumah_sekolah").value = jarak.toFixed(2) + " km";
            
                        drawRoute(latRumah, lonRumah, latSekolah, lonSekolah);
                    } else {
                        document.getElementById("jarak_rumah_sekolah").value = "Masukkan koordinat rumah!";
                    }
                }
            
                document.getElementById("lat_rumah").addEventListener("input", hitungJarak);
                document.getElementById("lon_rumah").addEventListener("input", hitungJarak);
            
                window.onload = initMap;
            </script>
            
            <!-- Pastikan untuk mengganti API Key dengan milik Anda -->
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
            
             <!-- Bagian khusus untuk jalur Prestasi -->
             <div id="prestasi-section" class="additional-section">
                <h3>Data Tambahan Jalur Prestasi</h3>
            
                  <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 400px;"><br>
                    
                        <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px;"><br>
                    
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Tempat Lahir:</label>
                                <select id="tempat_lahir" name="tempat_lahir" required style="width: 350px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                        </div>
                        
                        <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const tempatLahirSelect = document.getElementById('tempat_lahir');
                        
                            // Fetch data kota dari server
                            fetch('get_cities.php')
                                .then(response => response.json())
                                .then(data => {
                                    data.forEach(city => {
                                        const option = document.createElement('option');
                                        option.value = city;
                                        option.textContent = city;
                                        tempatLahirSelect.appendChild(option);
                                    });
                                })
                                .catch(error => console.error('Error:', error));
                        });
                        </script>
                    </div>
                  </div>

                        <label>Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" required><br>
                    
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                    
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px;"><br>

                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px;">
                            </div>
                        </div><br>

                        <div style="margin-bottom: 10px;">
                            <label>Kelurahan:</label>
                            <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label>Kecamatan:</label>
                            <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label>Kota:</label>
                            <input type="text" name="kota" maxlength="50" style="width: 200px;">
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label>Provinsi:</label>
                            <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                        </div>

                    
                        <label>Telepon:</label>
                        <input type="text" name="telepon" maxlength="14" required style="width: 150px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                        <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px;"><br>
    
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px;">
                            </div>
                            <div>
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px;">
                            </div>
                        </div><br>
    
                        <div style="margin-bottom: 10px;">
                            <label>Kelurahan:</label>
                            <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                        </div>
    
                        <div style="margin-bottom: 10px;">
                            <label>Kecamatan:</label>
                            <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                        </div>
    
                        <div style="margin-bottom: 10px;">
                            <label>Kota:</label>
                            <input type="text" name="kota" maxlength="50" style="width: 200px;">
                        </div>
    
                        <div style="margin-bottom: 10px;">
                            <label>Provinsi:</label>
                            <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                        </div>  
            
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px;"><br>
                    </div>
                    <div style="flex: 1;">
                        <!-- Bagian Unggahan dan Jarak -->
                        <div style="margin-top: 20px;">
                    <label>Pilih Jenis Prestasi:</label>
                    <select name="jenis_prestasi" required style="width: 130px;">
                        <option value="akademik">Akademik</option>
                        <option value="non_akademik">Non Akademik</option>
                    </select><br>
            
                    <div id="kejuaraan-container">
                        <label>Kejuaraan:</label>
                        <input type="text" name="kejuaraan[]" placeholder="Nama Kejuaraan"><br>
            
                        <label>Tingkat Kejuaraan:</label>
                        <select name="tingkat_kejuaraan[]" required style="width: 120px;">
                            <option value="kota">Kota</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select><br>
            
                        <button type="button" onclick="tambahKejuaraan()">+ Tambah Kejuaraan</button><br><br>
            
                    <!-- Bagian Unggahan dan Jarak -->
                    <div style="margin-top: 20px;">
                        <label>Unggah Sertifikat dan Foto Kejuaraan (PDF/JPG/PNG):</label>
                        <input type="file" name="sertifikat[]" accept="image/*" onchange="previewImage(event, 'sertifikatPreview', 'sertifikatDelete')" id="sertifikatInput">
                        <br>
                        <img id="sertifikatPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sertifikatDelete" style="display:none;" onclick="deleteImage('sertifikatInput', 'sertifikatPreview', 'sertifikatDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>
                        
                        <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                        <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
                        <br>
                        <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                        <input type="file" name="kk_prestasi" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
                        <br>
                        <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                        <input type="file" name="skl_prestasi" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
                        <br>
                        <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
                    </div>

                    <script>
                    // Fungsi untuk mempreview gambar yang diunggah
                    function previewImage(event, previewId, deleteButtonId) {
                        var input = event.target;
                        var reader = new FileReader();
                        
                        reader.onload = function() {
                            var preview = document.getElementById(previewId);
                            preview.src = reader.result;
                            preview.style.display = 'block'; // Tampilkan gambar preview
                            
                            var deleteButton = document.getElementById(deleteButtonId);
                            deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                        };
                        
                        reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
                    }

                    // Fungsi untuk menghapus gambar dan reset input
                    function deleteImage(inputId, previewId, deleteButtonId) {
                        var input = document.getElementById(inputId);
                        var preview = document.getElementById(previewId);
                        var deleteButton = document.getElementById(deleteButtonId);
                        
                        input.value = ''; // Reset input file
                        preview.src = ''; // Reset preview image
                        preview.style.display = 'none'; // Sembunyikan preview
                        deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
                    }
                    </script>
                    </div>
                    </div>
                </div>
            </div>
<!-- Checkbox Setuju -->
<div style="display: flex; align-items: center;">
    <div style="margin-right: 10px;">
        <div class="checkbox-container"></div>
        <input type="checkbox" id="terms" name="terms" required onchange="toggleSubmitButton()">
        <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
    </div>
</div>

<!-- Tombol Daftar -->
<div style="margin-top: 10px;">
    <button id="submit-btn" type="submit" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
</div>

<!-- Script untuk menonaktifkan tombol sebelum checkbox dicentang -->
<script>
    function toggleSubmitButton() {
        const checkbox = document.getElementById('terms');
        const submitButton = document.getElementById('submit-btn');
        submitButton.disabled = !checkbox.checked;
    }
</script>

             </div>
            

            <!-- Bagian khusus untuk jalur Afirmasi -->
            <div id="afirmasi-section" class="additional-section">
                <h3>Data Tambahan Jalur Afirmasi</h3>
                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 400px;"><br>
                    
                        <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px;" inputmode="numeric" pattern="[0-9]*" title="Hanya angka diperbolehkan" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>
                        
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Pilih Negara Tempat Lahir:</label>
                                <select id="country-afirmasi" name="country" onchange="updateCitiesAfirmasi()" required style="width: 200px;">
                                    <option value="">--Pilih Negara--</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="United States">United States</option>
                                    <option value="Japan">Japan</option>
                                </select>
                            </div>
                            <div>
                                <label>Pilih Kota Tempat Lahir:</label>
                                <select id="city-afirmasi" name="city" required style="width: 200px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                        </div><br>

                        <label>Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" required><br>
                    
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                    
                        <label>Alamat Domisili:</label>
                    <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px;"><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label>RT:</label>
                            <input type="text" name="rt" maxlength="3" style="width: 50px;">
                        </div>
                        <div style="margin-right: 10px;">
                            <label>RW:</label>
                            <input type="text" name="rw" maxlength="3" style="width: 50px;">
                        </div>
                    </div><br>

                    <div style="margin-bottom: 10px;">
                        <label>Kelurahan:</label>
                        <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>Kecamatan:</label>
                        <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 200px;">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>Provinsi:</label>
                        <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                    </div>

                    
                        <label>Telepon:</label>
                        <input type="text" name="telepon" maxlength="14" required style="width: 150px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                        <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px;"><br>
    
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px;">
                            </div>
                            <div>
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px;">
                            </div>
                        </div><br>
    
                        <div style="margin-bottom: 10px;">
                            <label>Kelurahan:</label>
                            <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                        </div>
    
                        <div style="margin-bottom: 10px;">
                            <label>Kecamatan:</label>
                            <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                        </div>
    
                        <div style="margin-bottom: 10px;">
                            <label>Kota:</label>
                            <input type="text" name="kota" maxlength="50" style="width: 200px;">
                        </div>
    
                        <div style="margin-bottom: 10px;">
                            <label>Provinsi:</label>
                            <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                        </div>   
            
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px;"><br>
                    </div>

                    <script>
                        // Fungsi untuk memperbarui kota di jalur afirmasi
                        function updateCitiesAfirmasi() {
                            const countrySelect = document.getElementById("country-afirmasi");
                            const citySelect = document.getElementById("city-afirmasi");
                    
                            // Menghapus opsi kota yang ada
                            citySelect.innerHTML = "";
                    
                            // Mendapatkan negara yang dipilih
                            const selectedCountry = countrySelect.value;
                    
                            // Menambahkan opsi kota yang sesuai dengan negara yang dipilih
                            if (selectedCountry) {
                                const cities = countryCityData[selectedCountry];
                                cities.forEach(city => {
                                    const option = document.createElement("option");
                                    option.value = city;
                                    option.text = city;
                                    citySelect.add(option);
                                });
                            }
                        }
                    </script>                                        
            
                                <!-- Bagian Unggahan -->
                    <div style="margin-top: 20px;">
                        <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                        <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
                        <br>
                        <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                        <input type="file" name="kk_afirmasi" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
                        <br>
                        <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                        <input type="file" name="skl_afirmasi" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
                        <br>
                        <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Kartu Indonesia Pintar (KIP) (PDF/JPG/PNG):</label>
                        <input type="file" name="kip_afirmasi" accept="image/*" onchange="previewImage(event, 'kipPreview', 'kipDelete')" id="kipInput">
                        <br>
                        <img id="kipPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="kipDelete" style="display:none;" onclick="deleteImage('kipInput', 'kipPreview', 'kipDelete')">Hapus Gambar</button>
                        <br><br>

                        <label>Unggah Surat Keterangan Tidak Mampu (PDF/JPG/PNG):</label>
                        <input type="file" name="sktm_afirmasi" accept="image/*" onchange="previewImage(event, 'sktmPreview', 'sktmDelete')" id="sktmInput">
                        <br>
                        <img id="sktmPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="sktmDelete" style="display:none;" onclick="deleteImage('sktmInput', 'sktmPreview', 'sktmDelete')">Hapus Gambar</button>
                    </div>

                    <script>
                        // Fungsi untuk mempreview gambar yang diunggah
                        function previewImage(event, previewId, deleteButtonId) {
                            var input = event.target;
                            var reader = new FileReader();

                            reader.onload = function() {
                                var preview = document.getElementById(previewId);
                                preview.src = reader.result;
                                preview.style.display = 'block'; // Tampilkan gambar preview

                                var deleteButton = document.getElementById(deleteButtonId);
                                deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                            };

                            reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
                        }

                        // Fungsi untuk menghapus gambar dan reset input
                        function deleteImage(inputId, previewId, deleteButtonId) {
                            var input = document.getElementById(inputId);
                            var preview = document.getElementById(previewId);
                            var deleteButton = document.getElementById(deleteButtonId);

                            input.value = ''; // Reset input file
                            preview.src = ''; // Reset preview image
                            preview.style.display = 'none'; // Sembunyikan preview
                            deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
                        }
                    </script>


        </div>
          <!-- Checkbox Setuju -->
<div style="display: flex; align-items: center;">
    <div style="margin-right: 10px;">
        <div class="checkbox-container"></div>
        <input type="checkbox" id="terms" name="terms" required onchange="toggleButton()">
        <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
    </div>
</div>

<!-- Tombol Daftar -->
<div style="margin-top: 10px;">
    <button id="submitButton" type="submit" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
</div>

<script>
function toggleButton() {
    const checkbox = document.getElementById('terms');
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = !checkbox.checked; // Tombol akan aktif jika checkbox dicentang
}
</script>
            </div>

              <!-- Bagian khusus untuk jalur Perpindahan Orang Tua -->
              <div id="perpindahan-section" class="additional-section">
                <h3>Data Tambahan Jalur Perpindahan Orang Tua</h3>

                <div style="display: flex; justify-content: space-between;">
                    <!-- Kolom Kiri -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Siswa:</label>
                        <input type="text" name="nama" maxlength="70" style="width: 400px;"><br>
                    
                        <label>NISN:</label>
                        <input type="text" name="nisn" maxlength="10" style="width: 100px;"><br>

                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 20px;">
                                <label>Pilih Negara Tempat Lahir:</label>
                                <select id="country-perpindahan" name="country" onchange="updateCitiesPerpindahan()" required style="width: 200px;">
                                    <option value="">--Pilih Negara--</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="United States">United States</option>
                                    <option value="Japan">Japan</option>
                                </select>
                            </div>
                            <div>
                                <label>Pilih Kota Tempat Lahir:</label>
                                <select id="city-perpindahan" name="city" required style="width: 200px;">
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                        </div><br>

                        <label>Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" required><br>
                    
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" required style="width: 150px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                    
                        <label>Alamat Domisili:</label>
                        <input type="text" name="alamat_domisili" maxlength="150" style="width: 350px;"><br>
                        
                        <div style="display: flex; align-items: center;">
                            <div style="margin-right: 10px;">
                                <label>RT:</label>
                                <input type="text" name="rt" maxlength="3" style="width: 50px;">
                            </div>
                            <div style="margin-right: 10px;">
                                <label>RW:</label>
                                <input type="text" name="rw" maxlength="3" style="width: 50px;">
                            </div>
                        </div><br>
                        
                        <div style="margin-bottom: 10px;">
                            <label>Kelurahan:</label>
                            <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                        </div>
                        
                        <div style="margin-bottom: 10px;">
                            <label>Kecamatan:</label>
                            <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                        </div>
                        
                        <div style="margin-bottom: 10px;">
                            <label>Kota:</label>
                            <input type="text" name="kota" maxlength="50" style="width: 200px;">
                        </div>
                        
                        <div style="margin-bottom: 10px;">
                            <label>Provinsi:</label>
                            <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                        </div>
                        
                    
                        <label>Telepon:</label>
                        <input type="int" name="telepon" maxlength="14" required style="width: 150px;"><br>
                    </div>
                    
                    <!-- Kolom Tengah -->
                    <div style="flex: 1; margin-right: 20px;">
                        <label>Nama Orang Tua/Wali:</label>
                        <input type="text" name="nama_orang_tua" maxlength="70"  style="width: 350px;"><br>
                        
                        <label>Alamat Orang Tua/Wali:</label>
                    <input type="text" name="alamat_orang_tua" maxlength="150" required style="width: 350px;"><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label>RT:</label>
                            <input type="text" name="rt" maxlength="3" style="width: 50px;">
                        </div>
                        <div>
                            <label>RW:</label>
                            <input type="text" name="rw" maxlength="3" style="width: 50px;">
                        </div>
                    </div><br>

                    <div style="margin-bottom: 10px;">
                        <label>Kelurahan:</label>
                        <input type="text" name="kelurahan" maxlength="50" style="width: 200px;">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>Kecamatan:</label>
                        <input type="text" name="kecamatan" maxlength="50" style="width: 200px;">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>Kota:</label>
                        <input type="text" name="kota" maxlength="50" style="width: 200px;">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>Provinsi:</label>
                        <input type="text" name="provinsi" maxlength="50" style="width: 200px;">
                    </div>
 
            
                        <label>No.Telp Orang tua/Wali:</label>
                        <input type="text" name="telepon_orang_tua" maxlength="14" required  style="width: 100px;"><br>
                    </div>

                    <script>
                        // Fungsi untuk memperbarui kota di jalur perpindahan
                        function updateCitiesPerpindahan() {
                            const countrySelect = document.getElementById("country-perpindahan");
                            const citySelect = document.getElementById("city-perpindahan");
                    
                            // Menghapus opsi kota yang ada
                            citySelect.innerHTML = "";
                    
                            // Mendapatkan negara yang dipilih
                            const selectedCountry = countrySelect.value;
                    
                            // Menambahkan opsi kota yang sesuai dengan negara yang dipilih
                            if (selectedCountry) {
                                const cities = countryCityData[selectedCountry];
                                cities.forEach(city => {
                                    const option = document.createElement("option");
                                    option.value = city;
                                    option.text = city;
                                    citySelect.add(option);
                                });
                            }
                        }
                    </script>                    
                    
            
               <!-- Bagian Unggahan dan Jarak -->
        <div style="margin-top: 20px;">
            <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                        <input type="file" name="fs" accept="image/*" onchange="previewImage(event, 'fsPreview', 'fsDelete')" id="fsInput">
                        <br>
                        <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                        <br>
                        <button type="button" id="fsDelete" style="display:none;" onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete')">Hapus Gambar</button>
                        <br><br>

            <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
            <input type="file" name="kia" accept="image/*" onchange="previewImage(event, 'kiaPreview', 'kiaDelete')" id="kiaInput">
            <br>
            <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
            <br>
            <button type="button" id="kiaDelete" style="display:none;" onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete')">Hapus Gambar</button>
            <br><br>

            <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
            <input type="file" name="kk_perpindahan" accept="image/*" onchange="previewImage(event, 'kkPreview', 'kkDelete')" id="kkInput">
            <br>
            <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
            <br>
            <button type="button" id="kkDelete" style="display:none;" onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete')">Hapus Gambar</button>
            <br><br>

            <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
            <input type="file" name="skl_perpindahan" accept="image/*" onchange="previewImage(event, 'sklPreview', 'sklDelete')" id="sklInput">
            <br>
            <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
            <br>
            <button type="button" id="sklDelete" style="display:none;" onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete')">Hapus Gambar</button>
            <br><br>

            <label>Unggah Surat Penugasan Orang Tua/Wali dari Instansi/Perusahaan (PDF/JPG/PNG):</label>
            <input type="file" name="surat_penugasan_perpindahan" accept="image/*" onchange="previewImage(event, 'suratPenugasanPreview', 'suratPenugasanDelete')" id="suratPenugasanInput">
            <br>
            <img id="suratPenugasanPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
            <br>
            <button type="button" id="suratPenugasanDelete" style="display:none;" onclick="deleteImage('suratPenugasanInput', 'suratPenugasanPreview', 'suratPenugasanDelete')">Hapus Gambar</button>
        </div>

            <script>
            // Fungsi untuk mempreview gambar yang diunggah
            function previewImage(event, previewId, deleteButtonId) {
                var input = event.target;
                var reader = new FileReader();
                
                reader.onload = function() {
                    var preview = document.getElementById(previewId);
                    preview.src = reader.result;
                    preview.style.display = 'block'; // Tampilkan gambar preview
                    
                    var deleteButton = document.getElementById(deleteButtonId);
                    deleteButton.style.display = 'inline'; // Tampilkan tombol hapus
                };
                
                reader.readAsDataURL(input.files[0]); // Membaca data URL file yang diunggah
            }

            // Fungsi untuk menghapus gambar dan reset input
            function deleteImage(inputId, previewId, deleteButtonId) {
                var input = document.getElementById(inputId);
                var preview = document.getElementById(previewId);
                var deleteButton = document.getElementById(deleteButtonId);
                
                input.value = ''; // Reset input file
                preview.src = ''; // Reset preview image
                preview.style.display = 'none'; // Sembunyikan preview
                deleteButton.style.display = 'none'; // Sembunyikan tombol hapus
            }
            </script>
                        </div>

                            <!-- Checkbox Setuju -->
            <div style="display: flex; align-items: center;">
                <div style="margin-right: 10px;">
                    <div class="checkbox-container"></div>
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
                </div>
            </div>

            <!-- Tombol Daftar -->
            <div style="margin-top: 10px;">
                <button type="submit" id="daftarButton" style="width: 250px; padding: 10px; font-size: 16px;" disabled>Daftar</button>
            </div>

            <script>
                // Seleksi checkbox dan tombol daftar
                const checkbox = document.getElementById('terms');
                const button = document.getElementById('daftarButton');

                // Fungsi untuk mengaktifkan atau menonaktifkan tombol daftar
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        button.disabled = false;  // Aktifkan tombol jika dicentang
                    } else {
                        button.disabled = true;   // Nonaktifkan tombol jika tidak dicentang
                    }
                });
            </script>

            </div>
                </form>
    </div>
</body>
</html>