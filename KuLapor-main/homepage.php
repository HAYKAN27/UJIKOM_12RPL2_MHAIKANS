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

            background: #f5f5f5;
            min-height: 100vh;
        }

        .header {
            background: white;
            padding: 20px 40px;
            border-bottom: 2px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            border: black 2px solid;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
            flex-shrink: 0;
        }

        .school-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            line-height: 1.4;
        }

        .main-content {
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 40px;
            text-align: center;
        }

        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 80px;
            font-weight: 900;
            color: #000;
            margin-bottom: 20px;
            letter-spacing: -2px;
        }

        .subtitle {
            font-size: 18px;
            color: #333;
            margin-bottom: 60px;
            font-weight: 600;
        }

        .button-group {
            display: flex;
            gap: 25px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .btn {
            padding: 16px 45px;
            font-size: 16px;
            font-weight: 400;
            border: 3px solid #000;
            border-radius: 10px;

            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #000;
            color: white;
        }

        .btn-primary:hover {
            background: #333;
            transform: scale(1.05);
        }

        .btn-secondary {
            background: white;
            color: #000;
        }

        .btn-secondary:hover {
            background: #f5f5f5;
            transform: scale(1.05);
        }

        .help-text {
            font-size: 14px;
            color: #666;
            margin-top: 15px;
        }

        .help-text a {
            color: #1e40af;
            text-decoration: none;
            font-weight: 600;
        }

        .help-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo"><img src="+" alt=""></div>
        <div class="school-name">
            SMK MUHAMMADIYAH<br>
            CIKAMPEK
        </div>
    </div>

    <div class="main-content">
        <h1>KULAPOR</h1>
        <p class="subtitle">"Solusi Digital Pelaporan Sarana dan Prasarana Sekolah"</p>

        <div class="button-group">
            <a href="login.php" class="btn btn-primary">Masuk akun</a>
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Panduan Pengaduan
            </button>

            <!-- Modal bawaan dari bootstrap -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>