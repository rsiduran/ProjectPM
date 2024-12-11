<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashboard | jail jail</title>
    <link rel="stylesheet" href="../assets/style/sidebar.css" />
    <link rel="stylesheet" href="../assets/style/table.css" />

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
            <i class='bx bxs-user-account'></i>
            <span class="title">Registration Request</span>
          </a>
          <span class="tooltip">Registration Request</span>
        </li>
        <li>
          <a href="Records.php">
            <i class='bx bx-file' ></i>
            <span class="title">Records</span>
          </a>
          <span class="tooltip">Records</span>
        </li>
        <li>
          <a href="VisitationLogs.php">
            <i class='bx bxs-edit'></i>
            <span class="title">Visitation Logs</span>
          </a>
          <span class="tooltip">Visitation Logs</span>
        </li>
        <li>
          <a href="VisitationRequest.php">
            <i class='bx bx-table'></i>
            <span class="title">Visitation Reqeust</span>
          </a>
          <span class="tooltip">Visitation Reqeust</span>
        </li>
        <li>
          <a href="MedicalRequest.php">
            <i class='bx bx-location-plus' ></i>
            <span class="title">Medical Request</span>
          </a>
          <span class="tooltip">Medical Request</span>
        </li>
        <li>
          <a href="DetaineeUpdate.php">
            <i class='bx bx-navigation' ></i>
            <span class="title">Detainee Update</span>
          </a>
          <span class="tooltip">Detainee Update</span>
        </li>
        <li>
          <a href="../Backend/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="title">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
      
      <div class="theme-wrapper">
        <p>Welcome Admin</p>
      </div>

    </section>
    <section class="home">
      <h3 class="section-title">Registration Request</h3>
      <div class="body">
        <div class="table-container">
          <table class="minimalist-table">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Detainee's Full Name</th>
                <th>Relationship</th>
                <th>ID Picture</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td><a href="#">Approve</a> <a href="#">Reject</a></td>
              </tr>
              <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td><a href="#">Approve</a> <a href="#">Reject</a></td>
              </tr>
              <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
                <td><a href="#">Approve</a> <a href="#">Reject</a></td>
              </tr>
            </tbody>
          </table>
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
