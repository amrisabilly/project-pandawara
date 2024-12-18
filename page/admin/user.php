<?php
include('../../config/database.php');
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../login/login.php'); // Jika belum login, arahkan ke halaman login
    exit();
}

// Fetch all users
$users = mysqli_query($conn, "SELECT * FROM user");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Users</title>
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
                    <a href="user.php" class="nav-link active">
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
    <div class="container-fluid p-5">
        <h3>Manage Users</h3>
        <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>

        <!-- User Table -->
        <div class="table-responsive bg-white p-3 rounded">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>********</td> <!-- Password disembunyikan untuk keamanan -->
                        <td>
                            <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editUserModal<?= $user['id'] ?>">Edit</button>
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteUserModal<?= $user['id'] ?>">Delete</button>
                        </td>
                    </tr>

                    <!-- Add User Modal -->
                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="../../controller/addUser.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Username Input -->
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" required>
                                        </div>
                                        <!-- Password Input -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal<?= $user['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="../../controller/editUser.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control"
                                                value="<?= $user['username'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" required>
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

                    <!-- Delete User Modal -->
                    <div class="modal fade" id="deleteUserModal<?= $user['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="../../controller/deleteUser.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete <strong><?= $user['username'] ?></strong>?
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
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
