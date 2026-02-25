<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULAPOR - SMK Muhammadiyah Cikampek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

/* HEADER MODERN */
.header {
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    padding: 20px 40px;
    display: flex;
    align-items: center;
    gap: 15px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    z-index: 10;
}

.school-name {
    font-size: 14px;
    font-weight: 700;
    color: white;
}

/* BACKGROUND */
.main-content {
    background-image: url('public/img/SMKMUTU2 (1).jpg'); /* rename gambar tanpa spasi */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: center;
    padding: 60px 40px;
    text-align: center;
    position: relative;
}

/* OVERLAY */
.main-content::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.65));
}

/* CONTENT */
.main-content * {
    position: relative;
    z-index: 2;
    color: white;
}

/* TITLE */
h1 {
    font-size: 95px;
    font-weight: 900;
    letter-spacing: 6px;
    animation: fadeDown 1s ease;
}

.subtitle {
    font-size: 20px;
    margin-bottom: 50px;
    opacity: .9;
    animation: fadeUp 1.2s ease;
}

/* BUTTON */
.button-group {
    display: flex;
    gap: 25px;
    justify-content: center;
    flex-wrap: wrap;
    animation: fadeUp 1.4s ease;
}

.btn {
    padding: 16px 50px;
    border-radius: 12px;
    border: 2px solid rgba(255,255,255,.6);
    backdrop-filter: blur(6px);
    color: white;
    transition: .3s;
}

.btn-primary {
    background: rgba(0,0,0,.6);
}

.btn:hover {
    transform: translateY(-5px) scale(1.05);
    background: rgba(255,255,255,.2);
}

/* ANIMATION */
@keyframes fadeDown {
    from {opacity:0; transform: translateY(-40px);}
    to {opacity:1; transform: translateY(0);}
}

@keyframes fadeUp {
    from {opacity:0; transform: translateY(40px);}
    to {opacity:1; transform: translateY(0);}
}   
</style>
</head>

<body>
    <div class="header">
        <div class="logo"><img src="https://secure.gravatar.com/avatar/d194c6c98a5041637d4006baddfa05cb?s=128&d=mm&r=g" alt="" style="height: 50px;"></div>
        <div class="school-name">
            SMK MUHAMMADIYAH<br>
            CIKAMPEK
        </div>
    </div>

    <div class="main-content">
        <h1>KULAPOR</h1>
        <p class="subtitle">"Solusi Digital Pelaporan Sarana dan Prasarana Sekolah"</p>
        

        <div class="button-group">
            <a href="role_page.php" class="btn">Masuk sebagai</a>
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#panduanModal">
                Panduan Pengaduan
            </button>
        </div>
   
        </div>
    </div>

         <div class="modal fade" id="panduanModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-info-circle"></i> Panduan Membuat Laporan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <ol>
                    <li>Login menggunakan akun siswa.</li>
                    <li>Pilih menu <b>Buat Pengaduan</b>.</li>
                    <li>Isi judul dan isi laporan dengan jelas.</li>
                    <li>Klik tombol <b>Kirim</b>.</li>
                    <li>Tunggu admin memproses laporan kamu.</li>
                </ol>

                <div class="alert alert-warning mt-3">
                    Pastikan laporan yang dikirim valid dan tidak mengandung unsur spam.
                </div>

            </div>

</div>
    </div>
</body>

</html>