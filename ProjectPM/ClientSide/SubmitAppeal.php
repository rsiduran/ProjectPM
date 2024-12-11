<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashboard | jail jail</title>
    <link rel="stylesheet" href="../assets/style/sidebar.css" />
    <link rel="stylesheet" href="../assets/style/visitRequest.css" />

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="sidebar">
      <div class="nav-header">
        <p class="logo">SYSTEMJAIL</p>
        <i class="bx bx-menu-alt-right btn-menu"></i>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php">
            <i class="bx bxs-edit"></i>
            <span class="title">Visitation Request</span>
          </a>
          <span class="tooltip">Visitation Request</span>
        </li>
        <li>
          <a href="VirtualRequest.php">
            <i class="bx bx-table"></i>
            <span class="title">Virtual Request</span>
          </a>
          <span class="tooltip">Virtual Request</span>
        </li>
        <li>
          <a href="MedicalRequest.php">
            <i class="bx bx-location-plus"></i>
            <span class="title">Medical Request</span>
          </a>
          <span class="tooltip">Medical Request</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-navigation"></i>
            <span class="title">Submit Appeal</span>
          </a>
          <span class="tooltip">Submit Appeal</span>
        </li>
        <li>
          <a href="../index.php">
            <i class="bx bx-log-out"></i>
            <span class="title">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
    </section>
    <section class="home">
      <h3 class="section-title">Submit Appeal</h3>
      <div class="body">
        <div class="form-container">
          <form action="../Backend/submit_appeal.php" method="POST">
            <!-- Personal Details -->
            <h3>Personal Details</h3>
            <div class="form-group mb-3">
              <label for="fullName">Full Name</label>
              <input
                type="text"
                id="fullName"
                name="fullName"
                class="form-control"
                pattern="[A-Za-z\s]+"
                title="Only letters and spaces are allowed"
                required
              />
            </div>
            <div class="form-group mb-3">
              <label for="email">Email Address</label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                required
              />
            </div>
            <div class="form-group mb-3">
              <label for="phoneNumber">Phone Number</label>
              <input
                type="tel"
                id="phoneNumber"
                name="phoneNumber"
                class="form-control"
                pattern="\d{11}"
                required
              />
            </div>
            <div class="form-group mb-3">
              <label for="address">Address (Optional)</label>
              <textarea
                id="address"
                name="address"
                class="form-control"
                rows="2"
              ></textarea>
            </div>

            <!-- Appeal Details -->
            <h3>Appeal Details</h3>
            <div class="form-group mb-3">
              <label for="appealType">Type of Appeal</label>
              <select
                id="appealType"
                name="appealType"
                class="form-control"
                required
              >
                <option value="Missing Documents">Missing Documents</option>
                <option value="Incorrect Details">Incorrect Details</option>
                <option value="Request for Reconsideration">
                  Request for Reconsideration
                </option>
                <option value="Other Concerns">Other Concerns</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="inmateName"
                >Inmate name</label
              >
              <input
                type="text"
                id="inmateName"
                name="inmateName"
                class="form-control"
                pattern="[A-Za-z\s]+"
                title="Only letters and spaces are allowed"

              />
            </div>
            <div class="form-group mb-3">
              <label for="appealDescription">Appeal Description</label>
              <textarea
                id="appealDescription"
                name="appealDescription"
                class="form-control"
                rows="3"
                required
              ></textarea>
            </div>

            <!-- Supporting Details -->
            <h3>Supporting Details</h3>
            <div class="form-group mb-3">
              <label for="supportingDocuments"
                >Upload Supporting Documents (Optional)</label
              >
              <input
                type="file"
                id="supportingDocuments"
                name="supportingDocuments"
                class="form-control"
                accept="image/*"
              />
            </div>
            <div class="form-group mb-3">
              <label for="previousCommunication"
                >Previous Communication (if any)</label
              >
              <textarea
                id="previousCommunication"
                name="previousCommunication"
                class="form-control"
                rows="3"
              ></textarea>
            </div>

            <!-- Consent -->
            <h3>Consent</h3>
            <div class="form-group mb-3">
              <label>
                <input type="checkbox" name="terms" required />
                I hereby declare that the information provided is accurate to
                the best of my knowledge.
              </label>
              <br />
              <label>
                <input type="checkbox" name="consent" required />
                I consent to the use of my personal information for the
                resolution of this appeal.
              </label>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit Appeal</button>
          </form>
        </div>
      </div>
    </section>

    <script>
      const btn_menu = document.querySelector(".btn-menu");
      const side_bar = document.querySelector(".sidebar");

      btn_menu.addEventListener("click", function () {
        side_bar.classList.toggle("expand");
        changebtn();
      });

      function changebtn() {
        if (side_bar.classList.contains("expand")) {
          btn_menu.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
          btn_menu.classList.replace("bx-menu-alt-right", "bx-menu");
        }
      }
    </script>

  </body>
</html>
