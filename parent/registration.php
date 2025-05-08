<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary: #3a0ca3;
            --primary-light: #4361ee;
            --secondary: #7209b7;
            --accent: #4cc9f0;
            --dark: #212529;
            --light: #f8f9fa;
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
        
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--primary-light) 100%);
            color: white;
            border-radius: 0 0 1.5rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 5rem 2rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            border-bottom: 4px solid var(--accent);
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
            transition: all 0.3s ease;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(58, 12, 163, 0.4);
        }
        
        .btn-primary-custom:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(114, 9, 183, 0.5);
        }
        
        .content-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .table {
            border-radius: 0.75rem;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary-light);
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <header class="hero">
            <div class="container">
                <div class="hero-content text-center animate-fade-in">
                    <h1 class="display-4 fw-bold mb-3">Запись ребенка в секцию</h1>
                    <p class="lead mb-4">Вырастим юных дарований</p>
                </div>
            </div>
        </header>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-center gap-3 mb-5 animate-fade-in delay-1">
            <a href="parent_dashboard.php" class="btn btn-primary-custom">
                <i class="bi bi-arrow-left me-2"></i>На главную
            </a>
            <a href="parent_clubs.php" class="btn btn-primary-custom">
                <i class="bi bi-calendar-week me-2"></i>Секции
            </a>
        </div>

            <section class="col-12 col-md-6 animate-fade-in delay-2">
                <div class="content-card">
                    <h2 class="mb-4"><i class="bi bi-plus-circle text-primary me-2"></i>Добавить запись</h2>
                    <form method="POST" action="" class="form-container">
                    <div class="mb-3">
                <label for="childName" class="form-label">ФИО Ребенка</label>
                <input type="text" class="form-control" id="childName" name="childName" placeholder="Введите ФИО" required>
            </div>

            <div class="mb-3">
                <label for="birthDate" class="form-label">Дата рождения</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Пол</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Мужской" required>
                        <label class="form-check-label" for="genderMale">Мужской</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Женский">
                        <label class="form-check-label" for="genderFemale">Женский</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="height" class="form-label">Рост (см)</label>
                <input type="number" class="form-control" id="height" name="height" placeholder="Введите рост" min="30" max="250" required>
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Вес (кг)</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Введите вес" min="1" max="300" required>
            </div>

            <div class="mb-3">
                <label for="section" class="form-label">Выберите секцию</label>
                <select class="form-select" id="section" name="section" required>
                    <option value="">Выберите секцию</option>
                    <option value="Кружок по танцам">Кружок по танцам</option>
                    <option value="Кружок по хоровой деятельности">Кружок по хоровой деятельности</option>
                    <option value="Кружок по рисованию">Кружок по рисованию</option>
                    <option value="Секция по гитаре">Секция по гитаре</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="height" class="form-label">Контактный номер</label>
                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Контактный номер" min="30" max="250" required>
            </div>

            <button type="submit" class="btn btn-danger">Отправить заявку</button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">© <?=date('Y')?> Центр дополнительного образования. Все права защищены.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-3"><i class="bi bi-telegram"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-vimeo"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const subjectSelect = document.getElementById('subject');
            const teacherInput = document.getElementById('teacher');

            subjectSelect.addEventListener('change', function () {
                const selectedOption = subjectSelect.options[subjectSelect.selectedIndex];
                const teacher = selectedOption.getAttribute('data-teacher');
                teacherInput.value = teacher || '';
            });
        });

        // Обработка формы для добавления новой записи
        if (window.location.search.includes('success=1')) {
            alert('Запись успешно добавлена');
        }
    </script>
</body>
</html>

<?php
require_once 'C:/wamp64/www/diplom/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
error_reporting(E_ALL ^ E_DEPRECATED);

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dop_school";

// Настройки RabbitMQ
$rabbitHost = 'localhost';
$rabbitPort = 5672;
$rabbitUser = 'guest';
$rabbitPass = 'guest';
$exchangeName = 'New_request';
$queueName = 'Applications received';
$routingKey = 'Application.added';

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $childName = $conn->real_escape_string($_POST['childName']); // Изменил $name на $childName
    $birthDate = $conn->real_escape_string($_POST['birthDate']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $height = (int)$_POST['height'];
    $weight = (int)$_POST['weight'];
    $section = $conn->real_escape_string($_POST['section']);
    $PhoneNumber = $conn->real_escape_string($_POST['PhoneNumber']); // Добавил получение номера телефона

    // SQL-запрос для записи данных в базу
    $sql = "INSERT INTO Request (childName, birthDate, gender, height, weight, section, PhoneNumber)
            VALUES ('$childName', '$birthDate', '$gender', $height, $weight, '$section', '$PhoneNumber')";

    if ($conn->query($sql) === TRUE) {
        $lastId = $conn->insert_id;
        
        try {
            // Подключение к RabbitMQ
            $connection = new AMQPStreamConnection($rabbitHost, $rabbitPort, $rabbitUser, $rabbitPass);
            $channel = $connection->channel();
            
            // Объявляем обменник
            $channel->exchange_declare(
                $exchangeName,
                'direct', // тип обменника
                false,    // passive
                true,     // durable
                false     // auto-delete
            );
            
            // Объявляем очередь
            $channel->queue_declare(
                $queueName,
                false, // passive
                true,  // durable
                false, // exclusive
                false  // auto-delete
            );
            
            // Привязываем очередь к обменнику
            $channel->queue_bind($queueName, $exchangeName, $routingKey);
            
            // Формируем сообщение
            $messageData = [
                'action' => 'Request.added',
                'id' => $lastId,
                'Name' => $childName,
                'birthData' => $birthDate,
                'gender' => $gender,
                'height' => $height,
                'weight' => $weight,
                'section' => $section,
                'phoneNumber' => $PhoneNumber,
                'timestamp' => date('Y-m-d H:i:s')
            ];
            
            $msg = new AMQPMessage(
                json_encode($messageData, JSON_UNESCAPED_UNICODE),
                ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]
            );
            
            // Отправляем сообщение
            $channel->basic_publish($msg, $exchangeName, $routingKey);
            
            $channel->close();
            $connection->close();
            
            echo "<script>alert('Запись успешно добавлена и отправлена в RabbitMQ');</script>";
        } catch (Exception $e) {
            error_log("Ошибка RabbitMQ: " . $e->getMessage());
            echo "<script>alert('Запись добавлена, но ошибка RabbitMQ: ".addslashes($e->getMessage())."');</script>";
        }
    } else {
        echo "<div class='alert alert-danger'>Ошибка: " . $conn->error . "</div>";
    }
}
?>
