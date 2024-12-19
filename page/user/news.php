<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pandawara - Events</title>
    <!-- Boostrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Custom Style -->
    <style>
      body {
        overflow: auto;
      }
      body::-webkit-scrollbar {
        display: none;
      }
      .event-header {
        background: url("https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80")
          no-repeat center center/cover;
        height: 400px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
      }
      .event-header h1 {
        font-size: 4rem;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
      }

      .img-hover {
          transition: transform 0.4s ease, box-shadow 0.3s ease; /* Transisi lebih smooth */
        } 

        .img-hover:hover {
          transform: scale(1.05); 
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); 
        }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark py-4 px-4 fixed-top">
      <div
        class="container-fluid d-flex justify-content-between align-items-center"
      >
        <!-- Logo dan Bintang -->
        <div class="d-flex align-items-center gap-3">
          <div class="d-flex align-items-center gap-1 text-light">
            <i data-feather="star"></i>
            <i data-feather="star"></i>
            <i data-feather="star"></i>
          </div>
          <a class="navbar-brand text-light" href="index.html">Pandawara</a>
        </div>

        <!-- Tombol Toggle Navbar -->
        <button
          class="navbar-toggler text-light"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto gap-3">
            <li class="nav-item">
              <a class="nav-link text-light" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="galery.php">Galery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="team.php">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="kontak.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header Section -->
    <header class="event-header">
      <h1>Upcoming Events</h1>
    </header>

    <!-- Events Content -->
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6">
          <img
            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60"
            class="img-fluid rounded shadow img-hover"
            alt="Event Highlight"
          />
        </div>
        <div class="col-lg-6">
          <h2 class="mt-3 mt-lg-0">Join Our Next Event</h2>
          <p>
            Be a part of our environmental mission! Join our next event where
            volunteers come together to make a lasting impact on our planet.
          </p>
          <p>
            Whether it's a beach cleanup, a tree-planting campaign, or a
            workshop on sustainable living, your involvement makes all the
            difference.
          </p>
          <p>
            Check out the details and register today to become part of this
            transformative movement.
          </p>
          <a href="join.html" class="btn btn-primary">Join Us</a>
        </div>
      </div>

      <!-- Event Highlights -->
      <div class="row mt-5">
        <h3>Highlights</h3>
        <?php
        // Koneksi ke database
        include('../../config/database.php');

        // Query untuk mengambil data event
        $query = "SELECT * FROM event ORDER BY date DESC LIMIT 6";
        $result = mysqli_query($conn, $query);

        // Looping data event
        while ($event = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-md-4">
            <img
              src="<?= htmlspecialchars($event['image']); ?>"
              class="img-fluid rounded shadow img-hover"
              alt="<?= htmlspecialchars($event['title']); ?>"
            />
            <p class="mt-2"><?= htmlspecialchars($event['description']); ?></p>
          </div>
        <?php } ?>
      </div>
  </div>


    <!-- Footer -->
<footer class="bg-dark text-light py-5">
  <div class="container-fluid px-5">
    <div class="row">
      <!-- Column 1: About -->
      <div class="col-md-4">
        <h4 class="text-uppercase fw-bold mb-3">Pandawara</h4>
        <p>
          Dedicated to preserving nature and fostering sustainability. Join
          us in making a difference for our planet, one step at a time.
        </p>
        <div class="social-icons mt-3">
          <a
            href="https://www.youtube.com/@pandawaragroup"
            class="text-light me-3"
            target="blank_"
            ><i data-feather="youtube"></i
          ></a>
          <a
            href="https://x.com/pandawarag?s=21&t=UCUfBcpf15fmjSib2sfXng"
            class="text-light me-3"
            target="blank_"
            ><i data-feather="twitter"></i
          ></a>
          <a
            href="https://www.instagram.com/pandawaragroup/"
            class="text-light me-3"
            target="blank_"
            ><i data-feather="instagram"></i
          ></a>
        </div>
      </div>

      <!-- Column 2: Navigation Links -->
      <div class="col-md-4">
        <h4 class="text-uppercase fw-bold mb-3">Quick Links</h4>
        <ul class="list-unstyled">
              <li>
                <a href="about.html" class="text-light text-decoration-none"
                  >About Us</a
                >
              </li>
              <li>
                <a href="news.php" class="text-light text-decoration-none"
                  >News</a
                >
              </li>
              <li>
                <a href="galery.php" class="text-light text-decoration-none"
                  >Gallery</a
                >
              </li>
              <li>
                <a href="kontak.html" class="text-light text-decoration-none"
                  >Contact</a
                >
              </li>
            </ul>
      </div>

      <!-- Column 3: Donation Center -->
      <div class="col-md-4">
        <h4 class="text-uppercase fw-bold mb-3">Donation Center</h4>
        <p>
          Every donation counts. Your financial support fuels our efforts to
          clean rivers, protect habitats, and preserve biodiversity.
        </p>
        <a href="donasi.html" class="btn btn-light btn-sm text-dark">Donate Now</a>
      </div>
    </div>

    <hr class="border-light my-4" />

    <!-- Footer Bottom -->
    <div class="text-center">
      <p class="mb-0">&copy; 2024 Pandawara. All Rights Reserved.</p>
    </div>
  </div>
</footer>

<!-- Script Bootstrap -->
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <!-- Script Icons -->
    <script>
      feather.replace();
    </script>
  </body>
</html>