<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KuLapor - LoginPage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            text-align: center;
        }
        
        .university-name {
            color: #000000;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }
        
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .input-group label {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .input-group input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s;
        }
        
        .input-group input:focus {
            border-color: #3f51b5;
            outline: none;
        }
        
        .input-group input::placeholder {
            color: #aaa;
            font-style: italic;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin: 25px 0 30px;
        }
        
        .remember-me input {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: #3f51b5;
        }
        
        .remember-me label {
            color: #555;
            font-size: 15px;
            cursor: pointer;
        }
        
        .login-button {
            background-color: #3f51b5;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 15px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 25px;
        }
        
        .login-button:hover {
            background-color: #303f9f;
        }
        
        .links {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }
        
        .link-item {
            color: #3f51b5;
            text-decoration: none;
            font-size: 14.5px;
            transition: color 0.2s;
        }
        
        .link-item:hover {
            color: #1a237e;
            text-decoration: underline;
        }
        
        .separator {
            height: 1px;
            background-color: #eee;
            margin: 10px 0;
        }
        
        .footer {
            margin-top: 30px;
            color: #777;
            font-size: 12px;
            font-style: italic;
        }   
        
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 25px;
            }
            
            .university-name {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="proses_login.php" method="post">
            
            <div class="university-name">KuLapor</div>
            
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="ketikkan username anda">
            </div>
        
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="ketikkan password anda">
        </div>
    
        <button class="login-button">LOGIN</button>
        
        <div class="separator"></div>
    </div>
</form>
</body>
</html>