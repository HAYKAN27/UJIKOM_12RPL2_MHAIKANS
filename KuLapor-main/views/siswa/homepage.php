
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULAPOR - Homepage User</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }

        .header {
            background: white;
            padding: 20px 40px;
            border-bottom: 2px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: #1e40af;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .btn-logout {
            padding: 12px 30px;
            font-size: 16px;
            font-weight: 600;
            border: 3px solid #000;
            border-radius: 10px;
            background: white;
            color: #000;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #f5f5f5;
            transform: scale(1.05);
        }

        .header-right {
            font-size: 24px;
            font-weight: 600;
            color: #000;
        }

        .main-content {
            background: white;
            min-height: calc(100vh - 90px);
            padding: 60px 40px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 80px;
        }

        .menu-section {
            flex: 1;
            max-width: 400px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .menu-number {
            font-size: 48px;
            font-weight: 700;
            color: #000;
            min-width: 60px;
        }

        .menu-button {
            padding: 15px 35px;
            font-size: 18px;
            font-weight: 600;
            border: 3px solid #000;
            border-radius: 10px;
            background: white;
            color: #000;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            flex: 1;
        }

        .menu-button:hover {
            background: #000;
            color: white;
            transform: translateX(10px);
        }

        .illustration-section {
            flex: 1;
            max-width: 450px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration-section img {
            width: 100%;
            max-width: 350px;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.1));
        }

        /* Ilustrasi placeholder jika tidak ada gambar */
        .illustration-placeholder {
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: 600;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        @media (max-width: 968px) {
            .main-content {
                flex-direction: column;
                gap: 50px;
                padding: 40px 30px;
            }

            .menu-section {
                width: 100%;
                max-width: 500px;
            }

            .illustration-section {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
                flex-wrap: wrap;
                gap: 15px;
            }

            .header-right {
                font-size: 20px;
                width: 100%;
                text-align: center;
                order: 3;
            }

            .menu-number {
                font-size: 36px;
                min-width: 50px;
            }

            .menu-button {
                font-size: 16px;
                padding: 12px 25px;
            }

            .illustration-placeholder {
                width: 280px;
                height: 280px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <div class=""><img src="https://www.smkmutucikampek.sch.id/wp-content/uploads/2021/06/logo_mutu_png_transparant-removebg-preview-1.png" alt="" style="height: 50px;"></div>
            <button class="btn-logout"><a href="homepage.php"></a>Logout</button>
        </div>
        <div class="header-right">
            <!-- <?php 
                $nis = $_SESSION['nis'];            
            ?>
            <?php 
                echo"HI Haikan";
            ?> -->
        </div>
    </div>

    <div class="main-content">
        <div class="menu-section">
            <div class="menu-item">
                <a href="form_pengaduan.php" class="menu-button">Buat Pengaduan</a>
            </div>

            <div class="menu-item">
                <a href="data_pengaduan.php" class="menu-button">Lihat pengaduan</a>
            </div>

            <div class="menu-item">
                <a href="#" class="menu-button">Ubah Password</a>
            </div>
        </div>

        <div class="illustration-section">
            <!-- Ganti dengan ilustrasi Anda -->
            <!-- <div class="illustration-placeholder">

            </div> -->
        </div>
    </div>
</body>
</html>