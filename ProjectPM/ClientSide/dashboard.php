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
          <a href="#">
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
          <a href="SubmitAppeal.php">
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
      <h3 class="section-title">Visitation Request</h3>
      <div class="body">
        <div class="form-container">
          <form action="../Backend/submit_visitation.php" method="POST" enctype="multipart/form-data">
            <!-- Visitor Details -->
            <h3>Visitor Details</h3>
            <div class="form-group mb-3">
              <label for="visitorName">Your Name</label>
              <input
                type="text"
                id="visitorName"
                name="visitorName"
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
              <label for="idType">ID Type</label>
              <select id="idType" name="idType" class="form-control" required>
                <option value="Driver's License">Driver's License</option>
                <option value="Passport">Passport</option>
                <option value="National ID">National ID</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="idNumber">ID Number</label>
              <input
                type="text"
                id="idNumber"
                name="idNumber"
                class="form-control"
                required
              />
            </div>

            <!-- Inmate Details -->
            <h3>Inmate Details</h3>
            <div class="form-group mb-3">
              <label for="inmateName">Inmate Name</label>
              <input
                type="text"
                id="inmateName"
                name="inmateName"
                class="form-control"
                pattern="[A-Za-z\s]+"
                title="Only letters and spaces are allowed"
                required
              />
            </div>
            <div class="form-group mb-3">
            <label for="inmateID">Inmate ID (Optional)</label>
              <input
                type="file"
                id="inmateID"
                name="inmateID"
                class="form-control"
                accept="image/*"/>
            </div>

            <!-- Visit Details -->
            <h3>Visit Details</h3>
            <div class="form-group mb-3">
              <label for="relationship">Relationship to Inmate</label>
              <input
                type="text"
                id="relationship"
                name="relationship"
                class="form-control"
                required
              />
            </div>
            <div class="form-group mb-3">
              <label for="visitReason">Reason for Visit</label>
              <textarea
                id="visitReason"
                name="visitReason"
                class="form-control"
                rows="3"
                required
              ></textarea>
            </div>

            <!-- Consent -->
            <h3>Consent</h3>
            <div class="form-group mb-3">
              <label>
                <input type="checkbox" name="terms" required />
                I agree to the visitation terms and conditions.
              </label>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary" name="submit_btn">Submit Request</button>
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
