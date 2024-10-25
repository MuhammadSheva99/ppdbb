<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan dan FAQ - Sekolah Programmer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #2c3e50;
        }
        .faq {
            margin: 20px 0;
        }
        .faq-item {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }
        .faq-item h4 {
            margin: 0;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #2c3e50;
            color: #ecf0f1;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('nav')

    <header>
        <h1>Bantuan dan FAQ</h1>
        <p>Pertanyaan yang Sering Diajukan</p>
    </header>

    <div class="container">
        <section class="faq">
            <h2>Pertanyaan Umum</h2>
            <div class="faq-item">
                <h4>1. Apa saja kursus yang ditawarkan?</h4>
                <p>Kami menawarkan berbagai kursus mulai dari Web Development, Data Science, hingga Mobile App Development.</p>
            </div>
            <div class="faq-item">
                <h4>2. Bagaimana cara mendaftar?</h4>
                <p>Anda dapat mendaftar melalui halaman Pendaftaran di situs kami. Pastikan Anda mengisi semua informasi yang diperlukan.</p>
            </div>
            <div class="faq-item">
                <h4>3. Apakah ada biaya pendaftaran?</h4>
                <p>Ya, ada biaya pendaftaran yang perlu dibayarkan saat mendaftar. Detail biaya dapat dilihat di halaman Pendaftaran.</p>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Sekolah Programmer. All rights reserved.</p>
    </footer>
</body>
</html>