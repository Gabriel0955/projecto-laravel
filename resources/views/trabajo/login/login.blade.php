<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión - Sistema de Gestión de Cosméticos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #333;
        }

        .form-groupe button {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .footer {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form id="loginForm" action="/login" method="post">
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-groupe">
                <button type="submit">Iniciar sesión</button>
            </div>
            <div id="errorMessage" class="error-message">Usuario o contraseña incorrectos</div>
        </form>
    </div>

    <div class="footer">Sistema de Gestión de Cosméticos</div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username === 'gabriel' && password === '123') {
                window.location.href = '/index'; // Cambia '/inicio.html' por la ruta de tu pantalla de inicio
            } else {
                var errorMessage = document.getElementById('errorMessage');
                errorMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
