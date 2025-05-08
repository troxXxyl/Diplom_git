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
        
        .card {
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
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
        
        @media (max-width: 768px) {
            .hero {
                padding: 3rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <header class="hero">
            <div class="container">
                <div class="hero-content text-center animate-fade-in">
                    <h1 class="display-4 fw-bold mb-3">Расписание занятий</h1>
                </div>
            </div>
        </header>
    </div>

    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <a href="parent_dashboard.php" class="btn btn-primary-custom">
                    <i class="bi bi-arrow-left me-2"></i>На главную
                </a>
            </div>
        </div>

        <main>
            <section id="schedule" class="row animate-fade-in delay-1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Все расписания</h3>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="" class="row mb-4 g-3">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                                        <input type="text" name="subject" id="subject" class="form-control" 
                                            value="<?php echo isset($_GET['subject']) ? htmlspecialchars($_GET['subject']) : ''; ?>" 
                                            placeholder="Введите название предмета">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary-custom w-100">
                                        <i class="bi bi-funnel me-2"></i>Фильтровать
                                    </button>
                                </div>
                            </form>

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
                                        // Подключение к базе данных
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "dop_school";

                                        // Создаем подключение
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                            die("Ошибка подключения: " . $conn->connect_error);
                                        }

                                        // Массив соответствий кружков и их страниц
                                        $clubPages = [
                                            "Занятие по танцам" => "parent_dance.php",
                                            "Занятие по вышиванию" => "/clubs/chess.php",
                                            "Занятие по рисованию" => "parent_painting.php",
                                            "Занятия по хоровой деятельности" => "parent_choir.php",
                                            "Занятие по гитаре" => "parent_guitar.php",
                                        ];

                                        // Получаем введенный фильтр
                                        $subject = isset($_GET['subject']) ? $_GET['subject'] : '';

                                        // SQL-запрос для получения данных с учетом фильтра
                                        $sql = "SELECT * FROM schedule";
                                        if ($subject) {
                                            $sql .= " WHERE subject LIKE '%" . $conn->real_escape_string($subject) . "%'";
                                        }
                                        $result = $conn->query($sql);

                                        // Вывод данных из таблицы
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                    <td>" . htmlspecialchars($row["id"]) . "</td>
                                                    <td>";
                                                if (array_key_exists($row["subject"], $clubPages)) {
                                                    echo '<a href="' . htmlspecialchars($clubPages[$row["subject"]]) . '" class="text-decoration-none">' . 
                                                         '<i class="bi bi-link-45deg me-1"></i>' . htmlspecialchars($row["subject"]) . '</a>';
                                                } else {
                                                    echo htmlspecialchars($row["subject"]);
                                                }
                                                echo "</td>
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

                                        // Закрываем подключение
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="mt-5">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

