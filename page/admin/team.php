<?php
include('../../config/database.php');
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../login/login.php'); // Jika belum login, arahkan ke halaman login
    exit();
}

// Fetch all teams
$teams = mysqli_query($conn, "SELECT * FROM team");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="d-flex flex-row">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100vh;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <i class="fa fa-tachometer me-3" style="font-size:34px"></i>
                <span class="fs-4">Admin, <?= htmlspecialchars($_SESSION['username']) ?></span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link link-body-emphasis" aria-current="page">
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
                    <a href="team.php" class="nav-link active">
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
        
    <div class="container mt-5">
        <h3>Manage Teams</h3>
        <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTeamModal">Add Team</button>

        <!-- Team Table -->
        <div class="table-responsive bg-white p-3 rounded">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($team = mysqli_fetch_assoc($teams)) : ?>
                    <tr>
                        <td><?= $team['id'] ?></td>
                        <td><?= $team['name'] ?></td>
                        <td><img src="<?= $team['image'] ?>" alt="Team Image" width="50"></td>
                        <td>
                            <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editTeamModal<?= $team['id'] ?>">Edit</button>
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteTeamModal<?= $team['id'] ?>">Delete</button>
                        </td>
                    </tr>

                    <!-- Add Team Modal -->
                    <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="../../controller/addTeam.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addTeamModalLabel">Add Team</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image URL</label>
                                            <input type="text" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Team</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Team Modal -->
                    <div class="modal fade" id="editTeamModal<?= $team['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="../../controller/editTeam.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Team</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $team['id'] ?>">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="<?= $team['name'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Image URL</label>
                                            <input type="text" name="image" class="form-control"
                                                value="<?= $team['image'] ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Team Modal -->
                    <div class="modal fade" id="deleteTeamModal<?= $team['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="../../controller/deleteTeam.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Team</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete <strong><?= $team['name'] ?></strong>?
                                        <input type="hidden" name="id" value="<?= $team['id'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
