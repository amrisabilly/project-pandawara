<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Boostrap Css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Css External -->
    <style>
      .gradient-custom-2 {
        background: #fccb90;

        background: linear-gradient(
          to right,
          #332d29,
          #373030,
          #959293,
          #6a6a6a
        );
      }
    </style>
  </head>
  <body>
    <section class="h-100 gradient-form" style="background-color: #eee">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                      <div class="d-flex justify-content-center gap-2">
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                      </div>
                      <h4 class="mt-1 mb-5 pb-1">Pandawara</h4>
                      <!-- Alert Section -->
                      <?php
                      session_start();
                      if (isset($_SESSION['error'])) {
                          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                          echo $_SESSION['error'];
                          echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                          echo "</div>";
                          unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
                      }
                      ?>
                    </div>

                    <form action="../../controller/loginController.php" method="POST">
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11"
                          >Username</label
                        >
                        <input
                          type="text"
                          id="form2Example11"
                          class="form-control border-2 border-dark shadow-none"
                          placeholder="Username"
                          name = "username"
                          required
                        />
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="password"
                          >Password</label
                        >
                        <input
                          type="password"
                          id="password"
                          name="password"
                          placeholder="Password"
                          required
                          class="form-control border-2 border-dark shadow-none"
                        />
                      </div>

                      <div class="text-center pt-1 mb-5 pb-1">
                        <button
                          class="btn btn-dark btn-block fa-lg gradient-custom-2 mb-3"
                          type="submit"
                        >
                          Log in
                        </button>
                      </div>

                      <div
                        class="d-flex align-items-center justify-content-center pb-4"
                      >
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <a href="registrasi.html">
                          <button type="button" class="btn btn-dark">
                            Create new
                          </button>
                        </a>
                      </div>
                    </form>
                  </div>
                </div>
                <div
                  class="col-lg-6 d-flex align-items-center gradient-custom-2"
                >
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">We are more than just a company</h4>
                    <p class="small mb-0">
                    Pandawara Komunitas berkomitmen untuk menjaga kelestarian lingkungan dengan melaksanakan kegiatan bersih-bersih pantai, sebagai bentuk kepedulian terhadap kebersihan alam dan pelestarian ekosistem laut demi masa depan yang lebih baik.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
