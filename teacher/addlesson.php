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
                    <h1 class="display-4 fw-bold mb-3">Расписание занятий</h1>
                    <p class="lead mb-4">Управление расписанием занятий</p>
                </div>
            </div>
        </header>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-center gap-3 mb-5 animate-fade-in delay-1">
            <a href="teacher_dashboard.php" class="btn btn-primary-custom">
                <i class="bi bi-arrow-left me-2"></i>На главную
            </a>
            <a href="teacher_raspisanie.php" class="btn btn-primary-custom">
                <i class="bi bi-calendar-week me-2"></i>Расписание
            </a>
        </div>

        <div class="row g-4">
            <section class="col-12 animate-fade-in delay-1">
                <div class="content-card">
                    <h2 class="mb-4"><i class="bi bi-table text-primary me-2"></i>Все расписания</h2>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID занятия</th>
                                    <th>Предмет</th>
                                    <th>Преподаватель</th>
                                    <th>Кабинет</th>
                                    <th>День недели</th>
                                    <th>Начало</th>
                                    <th>Окончание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "dop_school";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Ошибка подключения: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM schedule";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                                <td>" . htmlspecialchars($row["subject"]) . "</td>
                                                <td>" . htmlspecialchars($row["teacher"]) . "</td>
                                                <td>" . htmlspecialchars($row["class"]) . "</td>
                                                <td>" . htmlspecialchars($row["day"]) . "</td>
                                                <td>" . htmlspecialchars($row["stime"]) . "</td>
                                                <td>" . htmlspecialchars($row["etime"]) . "</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center py-4'>Нет данных для отображения</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="col-12 col-md-6 animate-fade-in delay-2">
                <div class="content-card">
                    <h2 class="mb-4"><i class="bi bi-plus-circle text-primary me-2"></i>Добавить запись</h2>
                    <form method="POST" action="" class="form-container">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Предмет:</label>
                            <select name="subject" id="subject" class="form-select" required>
                                <option value="" disabled selected>Выберите предмет</option>
                                <?php
                                $sql = "SELECT DISTINCT subject, teacher FROM subjects";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $subject = htmlspecialchars($row["subject"]);
                                        $teacher = htmlspecialchars($row["teacher"]);
                                        echo "<option value='$subject' data-teacher='$teacher'>$subject</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="teacher" class="form-label">Преподаватель:</label>
                            <input type="text" name="teacher" id="teacher" class="form-control" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="class" class="form-label">Кабинет:</label>
                            <input type="text" name="class" id="class" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="day" class="form-label">День недели:</label>
                            <input type="text" name="day" id="day" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="stime" class="form-label">Начало:</label>
                            <input type="datetime-local" name="stime" id="stime" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="etime" class="form-label">Окончание:</label>
                            <input type="datetime-local" name="etime" id="etime" class="form-control" required>
                        </div>

                        <button type="submit" name="add_schedule" class="btn btn-primary-custom w-100">
                            <i class="bi bi-plus-circle me-2"></i>Добавить
                        </button>
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
// Подключение к базе данных
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'C:/wamp64/www/diplom/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dop_school";

// Настройки RabbitMQ
$rabbitHost = 'localhost';
$rabbitPort = 5672;
$rabbitUser = 'guest';
$rabbitPass = 'guest';
$exchangeName = 'school_exchange';
$queueName = 'Added_Lesson';
$routingKey = 'lessons.added';

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка формы для добавления новой записи
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_schedule'])) {
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $class = $_POST['class'];
    $day = $_POST['day'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];

    $sql = "INSERT INTO schedule (subject, teacher, class, day, stime, etime) VALUES 
            ('" . $conn->real_escape_string($subject) . "', 
             '" . $conn->real_escape_string($teacher) . "', 
             '" . $conn->real_escape_string($class) . "', 
             '" . $conn->real_escape_string($day) . "', 
             '" . $conn->real_escape_string($stime) . "', 
             '" . $conn->real_escape_string($etime) . "')";

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
                'action' => 'lesson_added',
                'id' => $lastId,
                'subject' => $subject,
                'teacher' => $teacher,
                'class' => $class,
                'day' => $day,
                'start_time' => $stime,
                'end_time' => $etime,
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
        echo "<script>alert('Ошибка при добавлении записи: " . $conn->error . "');</script>";
    }
}
?>