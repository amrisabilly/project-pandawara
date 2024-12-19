<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Partnership</title>
    <!-- Boostrap Css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- style -->
    <style>
      body {
        overflow: auto;
      }
      body::-webkit-scrollbar {
        display: none;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark py-4 px-4">
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

    <div style="margin: 150px">
      <h1 style="font-size: 70px">Galery</h1>
      <p style="margin-top: 10px; font-size: 20px">
        Beberapa Dokumentasi Kegiatan Yang Telah Kami lakukan
      </p>

      <div class="container">
        <center>
          <?php
          // Koneksi ke database
          include('../../config/database.php');

          // Query untuk mengambil data local_hero
          $query = "SELECT * FROM local_hero";
          $result = mysqli_query($conn, $query);

          // Variabel untuk menghitung jumlah item per row
          $counter = 0; // Counter untuk item
          $columns = 3; // Jumlah kolom per baris

          // Looping data local_hero
          while ($hero = mysqli_fetch_assoc($result)) {
              // Jika item pertama atau setiap kelipatan jumlah kolom, buka row baru
              if ($counter % $columns === 0) {
                  echo '<div class="row" style="margin-top: 70px">';
              }

              // Tampilkan data dalam kolom
              echo '<div class="col-' . (12 / $columns) . '">';
              echo '<img src="' . htmlspecialchars($hero['location']) . '" alt="" style="width: 100%; border-radius: 20px" />';
              echo '<p>' . htmlspecialchars($hero['title']) . '</p>';
              echo '</div>';

              $counter++; // Increment counter

              // Jika sudah mencapai jumlah kolom, tutup row
              if ($counter % $columns === 0) {
                  echo '</div>';
              }
          }

          // Tutup row terakhir jika ada item yang tersisa
          if ($counter % $columns !== 0) {
              echo '</div>';
          }
          ?>
        </center>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
      <div class="container">
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
          <div class="col-md-4" style="padding-left: 8em">
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
            <a href="donasi.html" class="btn btn-light btn-sm text-dark"
              >Donate Now</a
            >
          </div>
        </div>

        <hr class="border-light my-4" />

        <!-- Footer Bottom -->
        <div class="text-center">
          <p class="mb-0">&copy; 2024 Pandawara. All Rights Reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Script Boostrap -->
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
