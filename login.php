<?php
session_start();

// Обработка данных формы
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка наличия полей
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = 'Все поля обязательны для заполнения.';
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Подключение к базе данных
        $db = new mysqli('localhost', 'root', '', 'Dop_school');
        
        // Проверка соединения
        if ($db->connect_error) {
            $error = 'Ошибка подключения к БД: ' . $db->connect_error;
        } else {
            // Экранируем введенные данные для безопасности
            $username = $db->real_escape_string($username);
            $password = $db->real_escape_string($password);
            
            // Запрос к базе данных
            $query = "SELECT role FROM registration WHERE User = '$username' AND password = '$password' LIMIT 1";
            $result = $db->query($query);
            
            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                // Перенаправляем в зависимости от роли
                $redirects = [
                    'teacher' => 'teacher/teacher_dashboard.php',
                    'parent' => 'parent/parent_dashboard.php',
                    'student' => 'student/student_dashboard.php'
                ];
                
                if (isset($redirects[$user['role']])) {
                    header('Location: ' . $redirects[$user['role']]);
                    exit;
                } else {
                    $error = 'Неизвестная роль пользователя';
                }
            } else {
                $error = 'Неверное имя пользователя или пароль';
            }
            
            // Закрываем соединение
            $db->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <!-- Подключаем Bootstrap 5.3 + иконки -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="C:\wamp64\www\diplom\font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">

    <style>
        :root {
            --primary: #3a0ca3;  /* Более насыщенный синий */
            --primary-light: #4361ee;
            --secondary: #7209b7;
            --accent: #4cc9f0;
            --dark: #212529;
            --light: #f8f9fa;
            --success: #4bb543;
            --header-text: #ffffff;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .auth-container {
            max-width: 400px;
            margin: auto;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
            animation: fadeIn 0.8s ease forwards;
        }
        
        .auth-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--primary-light) 100%);
            color: var(--header-text);
            padding: 3rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            border-bottom: 4px solid var(--accent);
        }
        
        .auth-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            z-index: 1;
        }
        
        .auth-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
            transition: all 0.3s ease;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(58, 12, 163, 0.4);
            width: 100%;
        }
        
        .btn-primary-custom:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(114, 9, 183, 0.5);
        }
        
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }
        
        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
    </style>
</head>
<body>
    <div class="auth-hero">
        <div class="container text-center">
            <h1 class="display-5 fw-bold">Добро пожаловать в систему</h1>
            <p class="lead">Пожалуйста, авторизуйтесь для доступа к вашему аккаунту</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="auth-container animate-fade-in">
            <h2 class="auth-title"><i class="bi bi-person-circle me-2"></i>Авторизация</h2>
            <?php if ($error): ?>
                <div class="alert alert-danger text-center mb-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Имя пользователя</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Введите имя пользователя" required
                               value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Пароль</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Введите пароль" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary-custom mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Войти
                </button>
            </form>
        </div>
    </div>

    <footer class="footer mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">© <?=date('Y')?> Центр дополнительного образования. Все права защищены.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-3"><i class="bi bi-telegram"></i></a>
                    <a href="#" class="text-white"><i class="fa fa-vk" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>