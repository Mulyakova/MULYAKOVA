<?php
session_start();
// Проверка, был ли авторизован пользователь
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Если нет, перенаправляем его на главную страницу
    header('location: /index.php');
    exit();
}
// Проверка, является ли пользователь админом
if ($_SESSION['admin'] !== 1) {
    // Если нет, перенаправляем его на страницу профиля
    header('location: /index.php');
    exit();
}
// Если пользователь является админом, он может открыть эту страницу
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Заявки</title>
    <meta name="description" content="Курсовая работа Наталья Муляковой">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: rgb(240,95,64);">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="/index.php" style="padding: 0px;width: 125px;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>SOHO<br>HOSTEL</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link active" href="applications.php">
                            <i class="far fa-user-circle"></i>
                            <span>Заявки</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bookings.php">
                            <i class="fas fa-table"></i>
                            <span>Бронирование</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clients.html"><i class="far fa-user"></i><span>Клиенты</span></a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">
                            <i class="fas fa-table"></i>
                            <span>Комнаты</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../php/auth/user/logout.php"><i
                                class="far fa-user-circle"></i><span>Выход</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1"></li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                    aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="/index.html"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small">Выход</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="../php/auth/user/logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header d-xl-flex justify-content-between align-items-xl-center py-3">
                            <p class="text-primary m-0 fw-bold" style="color: rgb(240,95,64)!important;">Заявки</p>
                            <button class="btn btn-primary d-xl-flex justify-content-xl-end" type="button"
                                style="background: rgb(240,95,64);border-width: 0px;" data-bs-toggle="modal"
                                data-bs-target="#modal-1">Добавить бронь</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Телефон</th>
                                            <th>Заезд</th>
                                            <th>Выезд</th>
                                            <th class="text-center">Примечание</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../php/connect/connect.php';
                                        $sql = 'SELECT * FROM applications ORDER BY id DESC'; // Запрос для выборки всех заявок
                                        $result = mysqli_query($conn, $sql);
                                        
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "
                                                                                            <tr>
                                                                                            <td><a href='tel:" .
                                                    $row['phone'] .
                                                    "'>" .
                                                    $row['phone'] .
                                                    "</a></td>
                                                                                            <td>" .
                                                    $row['check_in_date'] .
                                                    "</td>
                                                                                            <td>" .
                                                    $row['check_out_date'] .
                                                    "</td>
                                                                                            <td style='text-align: center;'>
                                                                                            <button type='button' name='delete' id='" .
                                                    $row['id'] .
                                                    "' class='delete btn btn-primary'><i class='far fa-trash-alt'></i></button>
                                                                                            </td>
                                                                                            </tr>
                                                                                        ";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Новое бронирование</h4><button class="btn-close"
                                    type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="../php/admin/booking/booking-create.php" method="POST" id="bookingform">
                                <div class="modal-body"
                                    style="border-color: rgb(133, 135, 150);border-top-color: rgb(133,;border-right-color: 135,;border-bottom-color: 150);border-left-color: 135,;">
                                    <input class="form-control" type="text" placeholder="Введите имя клиента"
                                        style="color: var(--bs-gray-dark);border-color: var(--bs-gray-500);"
                                        name="name">
                                    <input class="form-control" type="tel" placeholder="Введите телефон"
                                        style="color: var(--bs-gray-dark);border-color: var(--bs-gray-500);margin-top: 10px;"
                                        name="phone">
                                    <input class="form-control" type="email" placeholder="Введите емаил"
                                        style="width: 100%;height: 38px;padding: 0px;margin-top: 10px;border-radius: 5.6px;padding-right: 12px;padding-left: 11px;border-width: 1px;border-color: var(--bs-gray-500);"
                                        name="email">
                                    <div class="container" style="padding: 0px;">
                                        <div class="row" style="padding: 0px;margin: 0px;">
                                            <div class="col-md-6" style="padding: 0px;">
                                                <p style="margin: 0px;padding: 0px;padding-top: 10px;">Дата заезда:</p>
                                                <input class="form-control" type="date"
                                                    style="border-color: var(--bs-gray-500);" name="check_in_date"
                                                    id="check_in_date">
                                            </div>
                                            <div class="col-md-6">
                                                <p style="margin: 0px;padding: 0px;padding-top: 10px;">Дата выезда:</p>
                                                <input class="form-control" type="date"
                                                    style="border-color: var(--bs-gray-500);" name="check_out_date"
                                                    id="check_out_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                    <?php
                                        require_once '../php/connect/connect.php';
                                        $sql = 'SELECT * FROM rooms WHERE is_occupied != 1 ORDER BY id DESC';
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            echo '<select class="form-select" id="selectExample" name="room_id">';

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value=' . $row['id'] . '>Комната ' . $row['id'] . ', Стоимость в сутки: ' . $row['cost_per_day'] . '</option>';
                                            }

                                            echo '</select>';
                                        } else {
                                            echo '<p>В настоящее время нет доступных комнат.</p>';
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" type="button"
                                        data-bs-dismiss="modal">Закрыть</button>
                                        <?php
                                        require_once '../php/connect/connect.php';
                                        $sql = 'SELECT * FROM rooms WHERE is_occupied != 1 ORDER BY id DESC';
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                        echo '<button class="btn btn-primary" type="submit"
                                        style="background: rgb(240,95,64);border-width: 0px;">Сохранить</button>';
                                        }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Редактировать бронирование</h4><button class="btn-close"
                                    type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body"
                                style="border-color: rgb(133, 135, 150);border-top-color: rgb(133,;border-right-color: 135,;border-bottom-color: 150);border-left-color: 135,;">
                                <form><input class="form-control" type="tel" placeholder="Введите телефон"
                                        style="color: var(--bs-gray-dark);border-color: var(--bs-gray-500);"><input
                                        class="form-control" type="email" placeholder="Введите емаил"
                                        style="width: 100%;height: 38px;padding: 0px;margin-top: 10px;border-radius: 5.6px;padding-right: 12px;padding-left: 11px;border-width: 1px;border-color: var(--bs-gray-500);">
                                    <div class="container" style="padding: 0px;">
                                        <div class="row" style="padding: 0px;margin: 0px;">
                                            <div class="col-md-6" style="padding: 0px;">
                                                <p style="margin: 0px;padding: 0px;padding-top: 10px;">Дата заезда:</p>
                                                <input class="form-control" type="date"
                                                    style="border-color: var(--bs-gray-500);">
                                            </div>
                                            <div class="col-md-6">
                                                <p style="margin: 0px;padding: 0px;padding-top: 10px;">Дата выезда:</p>
                                                <input class="form-control" type="date"
                                                    style="border-color: var(--bs-gray-500);">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer"><button class="btn btn-light" type="button"
                                    data-bs-dismiss="modal">Закрыть</button><button class="btn btn-primary"
                                    type="button"
                                    style="background: rgb(240,95,64);border-width: 0px;">Сохранить</button></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal fade" role="dialog" tabindex="-1" id="modal-3">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Удалить бронь</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" style="border-color: rgb(133, 135, 150);border-top-color: rgb(133,;border-right-color: 135,;border-bottom-color: 150);border-left-color: 135,;">
                                <form>
                                    <div class="container" style="padding: 0px;">
                                        <p class="text-center" style="font-size: 25px;">Вы точно хотите удалить бронь?
                                        </p>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Удалить</button><button class="btn btn-primary" type="button" style="background: rgb(240,95,64);border-width: 0px;">Отмена</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Курсовая работа - Мулякова Наталья Ивановна © SOHO
                            HOSTEL 2023-2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>

    <!-- Удаление заявки  -->
    <script>
        document.querySelectorAll(".delete").forEach(button =>
            button.addEventListener("click", function() {
                let confirmation = window.confirm("Вы уверены, что хотите удалить эту запись?");
                if (confirmation) {
                    let del_id = this.id;
                    let $ele = this.parentNode.parentNode;
                    fetch("../php/admin/applications/applications-delete.php", {
                            method: "POST",
                            body: JSON.stringify({
                                del_id
                            }),
                            headers: {
                                "Content-type": "application/json; charset=UTF-8"
                            }
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data == "YES") {
                                $ele.style.display = "none";
                            } else {
                                alert("Не удалось удалить строку");
                            }
                        });
                }
            })
        );
    </script>
    <script>
        document.getElementById('bookingform').onsubmit = function() {
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
            } else return true;
        }
    </script>
</body>

</html>
