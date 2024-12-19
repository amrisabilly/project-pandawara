<?php
include('../../config/database.php');
$sql = "SELECT * FROM team ORDER BY id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Team</title>
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

    <!-- isi konten -->
    <div style="margin: 150px">
      <center>
        <h1 style="font-size: 70px">Our Team</h1>
        <p style="margin-top: 10px; font-size: 20px">
          Orang - Orang Hebat di Balik Pandawara
        </p>
      </center>
      <div class="container" style="margin-top: 70px">
        <div class="row">
            <?php
            $counter = 0; // Counter untuk melacak jumlah kartu
            $total_rows = ceil(mysqli_num_rows($result) / 3); // Total baris berdasarkan data
            $data = []; // Array untuk menyimpan hasil
            while ($team = mysqli_fetch_assoc($result)) {
                $data[] = $team; // Simpan setiap baris data ke dalam array
            }

            for ($row = 0; $row < $total_rows; $row++) {
                $start = $row * 3; // Awal indeks
                $end = min($start + 3, count($data)); // Akhir indeks (maksimal 3 per baris)
            ?>
            <div class="row justify-content-center">
                <?php for ($i = $start; $i < $end; $i++) { ?>
                    <div class="col-md-4 mb-4">
                        <center>
                            <img src="<?= $data[$i]['image']; ?>" alt="" style="height: 200px; border-radius: 20px;margin-bottom: 1em;" class="img-hover"/>
                            <h3><?= htmlspecialchars($data[$i]['name']); ?></h3>
                        </center>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
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
