<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLIQUECHUA - Iniciar Sesión</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', 'Poppins', sans-serif;
            min-height: 100vh;
            background-image: url('https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Capa de blur detrás del recuadro */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
            z-index: 0;
        }

        /* Contenedor principal */
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        /* Recuadro blanco semitransparente */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 32px;
            padding: 40px 35px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(2px);
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        /* Logo */
        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-img {
            width: 100px;
            height: 100px;
            background: #8B5A2B;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 3.5em;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .logo h2 {
            margin-top: 15px;
            color: #5D3A1A;
            font-size: 1.8em;
            font-weight: bold;
        }

        .logo p {
            color: #8B5A2B;
            font-size: 0.9em;
        }

        /* Título */
        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h3 {
            color: #5D3A1A;
            font-size: 1.5em;
            font-weight: 600;
        }

        .title p {
            color: #8B5A2B;
            font-size: 0.9em;
        }

        /* Campos de input */
        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #5D3A1A;
            font-weight: 600;
            font-size: 0.9em;
        }

        .input-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #E8D5B7;
            border-radius: 16px;
            font-size: 1em;
            transition: all 0.3s;
            background: white;
        }

        .input-group input:focus {
            outline: none;
            border-color: #8B5A2B;
            box-shadow: 0 0 0 3px rgba(139, 90, 43, 0.1);
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #5D3A1A;
        }

        .forgot-link {
            color: #8B5A2B;
            text-decoration: none;
            font-size: 0.9em;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Botón */
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #8B5A2B, #5D3A1A);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 40px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            transform: scale(1.02);
            background: linear-gradient(135deg, #9B6A3B, #6D4A2A);
            box-shadow: 0 5px 15px rgba(139, 90, 43, 0.3);
        }

        /* Link de registro */
        .register-link {
            text-align: center;
            color: #5D3A1A;
        }

        .register-link a {
            color: #8B5A2B;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Frase en quechua */
        .quechua-phrase {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #E8D5B7;
            color: #8B5A2B;
            font-style: italic;
            font-size: 0.85em;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <div class="logo-img">
                    🦙🏔️
                </div>
                <h2>BOLIQUECHUA</h2>
                <p>Aprende jugando</p>
            </div>

            <div class="title">
                <h3>¡Sumaq kawsay!</h3>
                <p>Inicia sesión para continuar</p>
            </div>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="input-group">
                    <label>📧 Correo electrónico</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: #dc2626; font-size: 0.8em;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="input-group">
                    <label>🔒 Contraseña</label>
                    <input type="password" name="password" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: #dc2626; font-size: 0.8em;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="checkbox-group">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Recordarme
                    </label>
                    <?php if(Route::has('password.request')): ?>
                        <a class="forgot-link" href="<?php echo e(route('password.request')); ?>">
                            ¿Olvidaste tu contraseña?
                        </a>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-login">
                    🚀 INICIAR SESIÓN
                </button>

                <div class="register-link">
                    ¿No tienes cuenta?
                    <a href="<?php echo e(route('register')); ?>">
                        Regístrate aquí
                    </a>
                </div>

                <div class="quechua-phrase">
                    "Imaynallam kashanki" - ¿Cómo estás?
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\user\boliquechua2.0\resources\views/auth/login.blade.php ENDPATH**/ ?>