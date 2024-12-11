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
          <a href="#">
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
      <h3 class="section-title">Medical Assistance Request</h3>
      <div class="body">
        <div class="form-container">
          <form action="../Backend/submit_medical.php" method="POST">
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
              <label for="address">Home Address</label>
              <textarea
                id="address"
                name="address"
                class="form-control"
                rows="2"
                required
              ></textarea>
            </div>

            <!-- Patient Details -->
            <h3>Patient Details of Inmate</h3>
            <div class="form-group mb-3">
              <label for="patientName">Inmate Name</label>
              <input
                type="text"
                id="patientName"
                name="patientName"
                class="form-control"
                pattern="[A-Za-z\s]+"
                title="Only letters and spaces are allowed"
                required
              />
            </div>
            <div class="form-group mb-3">
              <label for="patientAge">Inmate Age</label>
              <input
                type="number"
                id="patientAge"
                name="patientAge"
                class="form-control"
                min="0"
                max="999"
                pattern="^\d{1,4}$"
                required
              />
            </div>
            <div class="form-group mb-3">
              <label for="medicalCondition">Medical Condition</label>
              <textarea
                id="medicalCondition"
                name="medicalCondition"
                class="form-control"
                rows="3"
                required
              ></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="medicalHistory">Medical History</label>
              <textarea
                id="medicalHistory"
                name="medicalHistory"
                class="form-control"
                rows="3"
                required
              ></textarea>
            </div>

            <!-- Assistance Details -->
            <h3>Assistance Details</h3>
            <div class="form-group mb-3">
              <label for="typeOfAssistance">Type of Assistance Needed</label>
              <select
                id="typeOfAssistance"
                name="typeOfAssistance"
                class="form-control"
                required
              >
                <option value="Medical Supplies">Medical Supplies</option>
                <option value="Hospitalization Assistance">
                  Hospitalization Assistance
                </option>
                <option value="Medical Supplies">
                  Medical Supplies
                </option>
                <option value="Emergency Surgery">
                  Emergency Surgery
                </option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="additionalInfo">Additional Information</label>
              <textarea
                id="additionalInfo"
                name="additionalInfo"
                class="form-control"
                rows="3"
              ></textarea>
            </div>

            <!-- Consent -->
            <h3>Consent</h3>
            <div class="form-group mb-3">
              <label>
                <input type="checkbox" name="terms" required />
                I consent to providing the above information for medical
                assistance purposes.
              </label>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">
              Submit Request
            </button>
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
