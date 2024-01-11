<?php
   session_start(); // Запускаем сессию
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="57">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top" style="font-size: 29px;">Soho HoSTEL<p
                    style="font-size: 11px;">Хостел в красноярске</p></a><button data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">О ХОСТЕЛЕ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">КОНТАКТЫ</a></li>
                    <?php
                    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
                        if(isset($_SESSION["admin"]) && $_SESSION["admin"] === 1){ // Проверка на администратора
                            // Если пользователь авторизован и является администратором, показать ссылку на профиль и на админ панель   
                             echo '
                                <li class="nav-item"><a class="nav-link" href="/admin/applications.php">АДМИН ПАНЕЛЬ</a></li>
                            ';
                        } 
                        echo '
                            <li class="nav-item"><a class="nav-link" href="/user/profile.php">ПРОФИЛЬ</a></li>
                        ';
                    } else {
                        // Если пользователь не авторизован, показать ссылку на авторизацию
                        echo '<li class="nav-item"><a class="nav-link" href="/user/login.html">ВХОД</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <header id="header" class="text-center text-white d-flex masthead"
        style="background: url(&quot;assets/img/_1.png&quot;);background-size: cover;">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 col-xl-6 mx-auto">
                    <h1 class="text-uppercase"><strong>Чистота и комфорт, как дома!</strong></h1>
                    <hr>
                </div>
                <div class="col-lg-10 col-xl-6 mx-auto">
                    <form action="php/admin/applications/applications-create.php" style="padding: 0px;margin: 0px;"
                        method="POST" id="formApplication">
                        <fieldset>
                            <label for="phone"
                                style="display: block;text-align: left;font-size: 14px;margin-bottom: 0px;margin-top: 20px;">Введите
                                ваш
                                номер
                                телефона:</label>
                            <input class="form-control form-control-lg" type="text"
                                style="margin-top: 10px;padding-top: 0;border-radius: 5.6px;" placeholder="+7 933 ....."
                                name="phone" id="phone">
                        </fieldset>
                        <fieldset>
                            <label for="check_in_date"
                                style="display: block; text-align: left;font-size: 14px;margin-bottom: 0px;margin-top: 20px;">Выберите
                                дату заселения:</label>
                            <input name="check_in_date" id="check_in_date" class="form-control form-control-lg"
                                type="date" style="margin: 0;margin-top: 10px;border-radius: 5.6px;">
                        </fieldset>
                        <fieldset>
                            <label for="check_out_date"
                                style="display: block;text-align: left;font-size: 14px;margin-bottom: 0px;margin-top: 20px;">Выберите
                                дату
                                выселения:</label>
                            <input name="check_out_date" id="check_out_date" class="form-control form-control-lg"
                                type="date" style="margin: 0;margin-top: 10px;border-radius: 5.6px;">
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-xl" role="button"
                            style="margin-top: 33px;width: 100%;max-width: auto;border-radius: 5.6px;">Забронировать по
                            акции</button>
                    </form>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5"><strong><span style="color: rgb(128, 128, 128);">Более&nbsp;</span><span
                            style="color: rgb(254, 0, 0);">500</span><span
                            style="color: rgb(128, 128, 128);">&nbsp;клиентов нам доверяют
                            ежедневно!</span></strong><br><strong><span style="color: rgb(254, 0, 0);">8,7
                            баллов</span><span style="color: rgb(128, 128, 128);">&nbsp;средняя оценка на
                            Booking.com</span></strong></p>
            </div>
        </div>
    </header>
    <section id="about" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col offset-lg-8 text-center mx-auto">
                    <h2 class="text-white section-heading">Забронировать в 1 клик</h2>
                    <hr class="light my-4">
                    <p class="text-faded mb-4">Удобное бранирование и отмена бронирования 24\7. <br>Наш администратор,
                        всегда вам поможет.</p><a class="btn btn-light btn-xl" role="button" href="#header"
                        style="border-radius: 5.6px;">Забронировать</a>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><strong><span style="color: rgb(20, 20, 20);">ДЛЯ ВАС&nbsp;</span><span
                                style="color: rgb(237, 91, 41);">ВСЕГДА</span></strong></h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-diamond fa-4x text-primary mb-3 sr-icons"
                            data-aos="zoom-in" data-aos-duration="200" data-aos-once="true"></i>
                        <h3 class="mb-3">Заселение</h3>
                        <p class="text-muted mb-0"><span style="color: rgb(20, 20, 20);">Круглосуточное заселение и
                                выезд</span></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-paper-plane fa-4x text-primary mb-3 sr-icons"
                            data-aos="zoom-in" data-aos-duration="200" data-aos-delay="200" data-aos-once="true"></i>
                        <h3 class="mb-3">Чистота</h3>
                        <p class="text-muted mb-0"><span style="color: rgb(20, 20, 20);">Влажная уборка 2 раза в
                                день</span></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-newspaper-o fa-4x text-primary mb-3 sr-icons"
                            data-aos="zoom-in" data-aos-duration="200" data-aos-delay="400" data-aos-once="true"></i>
                        <h3 class="mb-3">Развлечения</h3>
                        <p class="text-muted mb-0"><span style="color: rgb(20, 20, 20);">Вы всегда сможете найти чем
                                заняться у нас</span></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="mx-auto service-box mt-5"><i class="fa fa-heart fa-4x text-primary mb-3 sr-icons"
                            data-aos="fade" data-aos-duration="200" data-aos-delay="600" data-aos-once="true"></i>
                        <h3 class="mb-3">Наша любовь</h3>
                        <p class="text-muted mb-0" style="color: rgb(240,95,64);"><span
                                style="color: rgb(20, 20, 20);">Вежливый администратор 24/7</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="p-0">
        <div class="container-fluid p-0">
            <div class="row g-0 popup-gallery">
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/thumbnails/6.png"><img
                            class="img-fluid" src="assets/img/thumbnails/6.png"></a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/thumbnails/9.png"><img
                            class="img-fluid" src="assets/img/thumbnails/9.png"></a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/thumbnails/11.png"><img
                            class="img-fluid" src="assets/img/thumbnails/11.png"></a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box"
                        href="assets/img/thumbnails/telegram-cloud-photo.png"><img class="img-fluid"
                            src="assets/img/thumbnails/telegram-cloud-photo.png"></a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/thumbnails/7.png"><img
                            class="img-fluid" src="assets/img/thumbnails/7.png"></a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/thumbnails/10.png"><img
                            class="img-fluid" src="assets/img/thumbnails/10.png"></a></div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center mx-auto">
                    <h2 class="section-heading">Бронирование</h2>
                    <hr class="my-4">
                    <p class="mb-5">Если вы хотите заселиться в наш чудесный хостел, вы всегда можете связаться со мной
                        - Наталья Мулякова</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center ms-auto"><i class="fa fa-phone fa-3x mb-3 sr-contact"
                        data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p>+7 913 579-00-98</p>
                </div>
                <div class="col-lg-4 text-center me-auto"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact"
                        data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com" style="color: rgb(240, 95, 64);">mulya@yandex.ru</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact-1" style="height: 30px;padding: 0px;background: rgb(240,95,64);">
        <div class="container" style="background: rgb(240,95,64);">
            <div class="row" style="background: rgb(240,95,64);">
                
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
    document.getElementById('formApplication').onsubmit = function() {
        var now = new Date();
        var today = new Date(now.getFullYear(), now.getMonth(), now.getDate()).toISOString().split('T')[0];
        var input1 = document.getElementById('check_in_date').value;
        var input2 = document.getElementById('check_out_date').value;

        if (input1 < today || input2 < today) {
            alert("Дата заселения и выселения не может быть раньше сегодняшней даты");
            return false;
        }
        if (input1 > input2) {
            alert("Дата заселения не может быть позже даты выселения");
            return false;
        }
        else return true;
    }
    </script>
</body>

</html>