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
        
        .club-card {
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .club-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        
        .club-card .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        
        .club-card .card-body {
            display: flex;
            flex-direction: column;
        }
        
        .club-card .card-title {
            color: var(--primary);
            font-weight: 700;
        }
        
        .club-card .btn {
            margin-top: auto;
            align-self: flex-start;
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
                    <h1 class="display-4 fw-bold mb-3">Секции</h1>
                    <p class="lead mb-4">Разнообразие кружков для развития талантов</p>
                </div>
            </div>
        </header>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-center mb-5 animate-fade-in delay-1">
            <a href="student_dashboard.php" class="btn btn-primary-custom">
                <i class="bi bi-arrow-left me-2"></i>На главную
            </a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col animate-fade-in delay-1">
                <div class="card club-card h-100">
                    <img src="/upload/medialibrary/dance.jpg" class="card-img-top" alt="Кружок по танцам">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Кружок по танцам</h5>
                        <p class="card-text">Изучение различных стилей танца, от классических до современных.</p>
                        <a href="student_dance.php" class="btn btn-primary-custom mt-3">
                            <i class="bi bi-arrow-right me-1"></i>Подробнее
                        </a>
                    </div>
                </div>
            </div>

            <div class="col animate-fade-in delay-1">
                <div class="card club-card h-100">
                    <img src="/upload/medialibrary/choir.jpg" class="card-img-top" alt="Кружок по хоровой деятельности">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-mic-fill me-2"></i>Кружок по хоровой деятельности</h5>
                        <p class="card-text">Обучение вокальному искусству и коллективное пение в хоре.</p>
                        <a href="student_choir.php" class="btn btn-primary-custom mt-3">
                            <i class="bi bi-arrow-right me-1"></i>Подробнее
                        </a>
                    </div>
                </div>
            </div>

            <div class="col animate-fade-in delay-2">
                <div class="card club-card h-100">
                    <img src="/upload/medialibrary/painting.jpg" class="card-img-top" alt="Кружок по рисованию">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-palette-fill me-2"></i>Кружок по рисованию</h5>
                        <p class="card-text">Развитие навыков рисования и изучение различных художественных техник.</p>
                        <a href="student_painting.php" class="btn btn-primary-custom mt-3">
                            <i class="bi bi-arrow-right me-1"></i>Подробнее
                        </a>
                    </div>
                </div>
            </div>

            <div class="col animate-fade-in delay-2">
                <div class="card club-card h-100">
                    <img src="/upload/medialibrary/guitar.jpg" class="card-img-top" alt="Секция по гитаре">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-music-note-beamed me-2"></i>Секция по гитаре</h5>
                        <p class="card-text">Обучение игре на гитаре, аккорды, техника и музыкальные произведения.</p>
                        <a href="student_guitar.php" class="btn btn-primary-custom mt-3">
                            <i class="bi bi-arrow-right me-1"></i>Подробнее
                        </a>
                    </div>
                </div>
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