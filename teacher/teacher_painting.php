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
        
        .teacher-photo img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .teacher-photo img:hover {
            transform: scale(1.05);
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
                    <h1 class="display-4 fw-bold mb-3">Кружок по рисованию</h1>
                    <p class="lead mb-4">Раскрываем творческий потенциал через искусство</p>
                </div>
            </div>
        </header>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-center gap-3 mb-5 animate-fade-in delay-1">
            <a href="teacher_dashboard.php" class="btn btn-primary-custom">
                <i class="bi bi-arrow-left me-2"></i>На главную
            </a>
            <a href="teacher_clubs.php" class="btn btn-primary-custom">
                <i class="bi bi-people me-2"></i>Все секции
            </a>
        </div>

        <div class="content-card animate-fade-in delay-1">
            <h2 class="mb-4"><i class="bi bi-palette text-primary me-2"></i>О кружке</h2>
            <p class="mb-0">Кружок по рисованию предлагает увлекательные занятия для детей и взрослых. Участники изучают основы композиции, перспективы, работы с различными художественными материалами, включая акварель, гуашь, карандаш и акрил. Кружок помогает раскрыть творческий потенциал и развить художественное видение.</p>
        </div>

        <div class="content-card animate-fade-in delay-1">
            <h2 class="mb-4"><i class="bi bi-person-badge text-primary me-2"></i>Преподаватель</h2>
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <div class="teacher-photo">
                        <img src="/upload/teachers/Painting_teacher.jpg" alt="Ковалёва Татьяна Алексеевна" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="h4">Ковалёва Татьяна Алексеевна</h3>
                    <p>Профессиональный художник и педагог с более чем 15-летним стажем. Екатерина окончила Академию художеств и имеет богатый опыт выставочной деятельности. Её работы выставлялись в галереях по всему миру.</p>
                </div>
            </div>
        </div>

        <div class="content-card animate-fade-in delay-2">
            <h2 class="mb-4"><i class="bi bi-calendar-week text-primary me-2"></i>Расписание занятий</h2>
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

                        $sql = "SELECT * FROM schedule WHERE subject = 'Занятие по рисованию'";
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

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
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
</body>
</html>