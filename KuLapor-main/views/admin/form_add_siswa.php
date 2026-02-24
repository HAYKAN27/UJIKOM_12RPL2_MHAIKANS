

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Siswa</title>
    <style>

                :root {
            --primary-blue: #0C4A6E;
            --secondary-blue: #0284C7;
            --accent-blue: #0EA5E9;
            --light-blue: #E0F2FE;
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --success: #059669;
            --warning: #D97706;
            --danger: #DC2626;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;

            padding: 20px;
        }
        .main{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 700px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }
        select {
    width: 100%;
    padding: 10px 14px;
    border-radius: 8px;
    border: 1px solid #D1D5DB;
    font-size: 14px;
    background: #fff;
    color: #111827;
    outline: none;
    cursor: pointer;
    transition: 0.2s ease;
}

        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit {
            background: #667eea;
            color: white;
        }

        .btn-submit:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-reset {
            background: #6c757d;
            color: white;
        }

        .btn-reset:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            background: #f0f9ff;
            border: 2px solid #bfdbfe;
            border-radius: 8px;
            display: none;
        }

        .result.show {
            display: block;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result h3 {
            color: #0369a1;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .result p {
            color: #334155;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .result strong {
            color: #0f172a;
        }

        
                /* Header */
        .header {
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            background: var(--primary-blue);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 18px;
        }

        .brand-text {
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-blue);
            letter-spacing: 0.5px;
        }
    </style>
</head>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="brand">
                <div class="brand-logo">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="brand-text">KULAPOR</span>
            </a>
            <a href="homepage.php" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </header>

<body>
    <div class="main">

        <div class="container">
            <h2>Menambahkan Akun Siswa</h2>
            <form action="../../ControllerAdmin/data_siswa.php" method="post">
                
                <div class="form-group">
                    <label for="nis">NIS (Nomor Induk Siswa)</label>
                    <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required>
                </div>
                
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="">--Pilih Kelas-- </option>
                        <option value="12 RPL 1">12 RPL 1</option>
                        <option value="12 RPL 2">12 RPL2</option>
                        <option value="12 TKJ 1">12 TKJ 1</option>
                        <option value="12 TKJ 3">12 TKJ 2</option>
                        <option value="12 TKJ 3">12 TKJ 3</option>
                        <option value="12 TKJ SAMSUNG">12 TKJ SAMSUNG</option>
                    </select>
                </div>
                
                <div class="button-group">
                    <button class="btn-submit">Simpan</button>
                    <button class="btn-reset">Reset</button>
                </div>
                
                
            </form>
            
        </div>
    </div>
</div>
</body>

</html>

