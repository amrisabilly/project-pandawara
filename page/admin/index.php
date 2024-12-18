<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: rgb(243, 244, 246);
        }
        .btn-sm {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (empty($_SESSION['username'])) {
        header("Location: ../login/login.php");
        exit();
    }
    ?>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100vh;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <i class="fa fa-tachometer me-3" style="font-size:34px"></i>
                <span class="fs-4">Admin, <?= htmlspecialchars($_SESSION['username']) ?></span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active" aria-current="page">
                        <i class="fa fa-home me-3" style="font-size:20px;"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="user.php" class="nav-link link-body-emphasis">
                        <i class="fa fa-star me-3" style="font-size:20px;"></i>
                        User
                    </a>
                </li>
                <li>
                    <a href="team.php" class="nav-link link-body-emphasis">
                        <i class="fa fa-users me-3" style="font-size:20px;"></i>
                        Team
                    </a>
                </li>
                <li>
                    <a href="event.php" class="nav-link link-body-emphasis">
                        <i class="fa fa-calendar me-3" style="font-size:20px;"></i>
                        Event
                    </a>
                </li>
                <li>
                    <a href="local_hero.php" class="nav-link link-body-emphasis">
                        <i class="fa fa-star me-3" style="font-size:20px;"></i>
                        Local Heroes
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-circle-o rounded-circle me-2" style="font-size:32px;"></i>
                    <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="../../controller/sessionDestroy.php">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div style="width: 100%; padding: 20px;">
            <div class="text-center">
                <h3>Dashboard Admin</h3>
                <p>Fitur ini digunakan untuk menampilkan data statistik dari database `pandawara`.</p>
            </div>

            <!-- Statistik -->
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Statistik Baris Pertama -->
                    <div class="col-md-4">
                        <div class="card text-center mb-3">
                            <div class="card-header">Users</div>
                            <div class="card-body">
                                <i class="fa fa-user" style="font-size:50px;"></i>
                                <h2>
                                    <?php
                                    include('../../config/database.php');
                                    $sql = "SELECT COUNT(*) FROM user";
                                    $result = mysqli_query($conn, $sql);
                                    $user_count = mysqli_fetch_array($result);
                                    echo $user_count[0];
                                    ?>
                                </h2>
                                <p>Total Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center mb-3">
                            <div class="card-header">Events</div>
                            <div class="card-body">
                                <i class="fa fa-calendar" style="font-size:50px;"></i>
                                <h2>
                                    <?php
                                    $sql = "SELECT COUNT(*) FROM event";
                                    $result = mysqli_query($conn, $sql);
                                    $event_count = mysqli_fetch_array($result);
                                    echo $event_count[0];
                                    ?>
                                </h2>
                                <p>Total Events</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center mb-3">
                            <div class="card-header">Teams</div>
                            <div class="card-body">
                                <i class="fa fa-users" style="font-size:50px;"></i>
                                <h2>
                                    <?php
                                    $sql = "SELECT COUNT(*) FROM team";
                                    $result = mysqli_query($conn, $sql);
                                    $team_count = mysqli_fetch_array($result);
                                    echo $team_count[0];
                                    ?>
                                </h2>
                                <p>Total Teams</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Statistik Baris Kedua -->
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card text-center mb-3">
                            <div class="card-header">Local Heroes</div>
                            <div class="card-body">
                                <i class="fa fa-star" style="font-size:50px;"></i>
                                <h2>
                                    <?php
                                    $sql = "SELECT COUNT(*) FROM local_hero";
                                    $result = mysqli_query($conn, $sql);
                                    $hero_count = mysqli_fetch_array($result);
                                    echo $hero_count[0];
                                    ?>
                                </h2>
                                <p>Total Local Heroes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
