
<!-- Подключаем Bootstrap -->
<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--primary-light) 100%);
            color: var(--header-text);
            border-radius: 0 0 1.5rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);

            background-repeat: no-repeat;
            background-size: auto 100%;
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
        
        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: linear-gradient(90deg, 
                var(--accent) 0%, 
                #f72585 20%, 
                #b5179e 40%, 
                var(--secondary) 60%, 
                var(--primary) 80%, 
                #3a0ca3 100%);
            z-index: 2;
        }
        
        .hero-content {
            position: relative;
            z-index: 3;
            max-width: 600px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }
        
        .hero .lead {
            font-size: 1.5rem;
            font-weight: 400;
            opacity: 0.9;
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
        
        /* Остальные стили остаются такими же */
        .service-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            height: 100%;
            background-color: white;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .service-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }
        
        .nav-link {
            color: var(--primary);
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--accent);
        }
        

        
        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        
        /* Новые анимации для шапки */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-0">
        <header class="hero">
            <div class="container">
                <div class="hero-content animate-fade-in">
                    <h1 class="display-3 fw-bold mb-3"> Центр дополнительного образования </h1>
                    <p class="lead mb-4 delay-1">Раскрываем таланты и развиваем способности</p>
                    <a href="#directions" class="btn btn-primary-custom btn-lg delay-2">
                        <i class="bi bi-arrow-down-circle me-2"></i>Наши направления
                    </a>
                </div>
            </div>
            
            <!-- Декоративные элементы -->
            <div class="position-absolute top-0 end-0 floating" style="z-index: 2; animation-delay: 0.5s;">
                <i class="bi bi-stars text-white opacity-10" style="font-size: 10rem;"></i>
            </div>
        </header>
    </div>

    <main class="container my-5">
        <div class="row g-4 mb-5">
            <div class="col-md-3 col-6 animate-fade-in delay-1">
                <a href="teacher_raspisanie.php" class="btn btn-primary-custom w-100 py-3 d-flex flex-column align-items-center">
                    <i class="bi bi-calendar-week fs-3 mb-2"></i>
                    <span>Расписание</span>
                </a>
            </div>
            <div class="col-md-3 col-6 animate-fade-in delay-2">
                <a href="addlesson.php" class="btn btn-primary-custom w-100 py-3 d-flex flex-column align-items-center">
                    <i class="bi bi-plus-circle fs-3 mb-2"></i>
                    <span>Добавить занятие</span>
                </a>
            </div>
            <div class="col-md-3 col-6 animate-fade-in delay-1">
                <a href="teacher_clubs.php" class="btn btn-primary-custom w-100 py-3 d-flex flex-column align-items-center">
                    <i class="bi bi-people fs-3 mb-2"></i>
                    <span>Коллективы</span>
                </a>
            </div>
            <div class="col-md-3 col-6 animate-fade-in delay-2">
                <a href="teacher_request.php" class="btn btn-primary-custom w-100 py-3 d-flex flex-column align-items-center">
                    <i class="bi bi-card-checklist fs-3 mb-2"></i>
                    <span>Заявки</span>
                </a>
            </div>
        </div>

        <section id="directions" class="mb-5 animate-fade-in delay-2">
            <h2 class="text-center mb-4 display-5 fw-bold">Наши направления</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-palette"></i>
                            </div>
                            <h3 class="h5">Творчество</h3>
                            <p class="text-muted">Художественные курсы, дизайн, рукоделие</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <h3 class="h5">Технологии</h3>
                            <p class="text-muted">Программирование, робототехника, 3D-моделирование</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-music-note-beamed"></i>
                            </div>
                            <h3 class="h5">Искусство</h3>
                            <p class="text-muted">Музыкальные, театральные и танцевальные студии</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <h3 class="h5">Спорт</h3>
                            <p class="text-muted">Секции для всех возрастов и уровней подготовки</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row g-4 mb-5">
            <div class="col-lg-6 animate-fade-in">
                <div class="card service-card h-100">
                    <div class="card-body p-4">
                        <h2 class="h3 mb-4"><i class="bi bi-info-circle me-2"></i>О нас</h2>
                        <p class="mb-0">Наш центр предоставляет широкий спектр образовательных услуг для детей и подростков, включая кружки, спортивные секции, творческие мастерские и STEM-направления. Мы гордимся индивидуальным подходом к каждому ученику и современными методиками обучения.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 animate-fade-in delay-1">
                <div class="card service-card h-100">
                    <div class="card-body p-4">
                        <h2 class="h3 mb-4"><i class="bi bi-telephone me-2"></i>Контакты</h2>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-envelope me-2"></i> <a href="mailto:info@example.com" class="text-decoration-none">info@example.com</a></li>
                            <li class="mb-2"><i class="bi bi-phone me-2"></i> <a href="tel:+71234567890" class="text-decoration-none">+7 123 456 7890</a></li>
                            <li><i class="bi bi-geo-alt me-2"></i> г. Москва, ул. Образцова, 12</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
    <script>
        // Активация подсказок Bootstrap
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>
</html>