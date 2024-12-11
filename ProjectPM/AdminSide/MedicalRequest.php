<?php
include '../Backend/config.php';
?>
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
      <h3 class="section-title">Medical Request</h3>
      <div class="body">
        <div class="table-container">
          <table class="minimalist-table">
            <thead>
              <tr>
                <th>Requester Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Detainee's Full Name</th>
                <th>Assistance need</th>
                <th>Additional Information</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM medical WHERE terms = '1'";
            $result = mysqli_query($connect, $query);
            
            if (!$result) {
                die("Query Failed: " . mysqli_error($connect));
            }
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";

                  // Display data for each row
                  echo "<td>" . $row['fullname'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['phone_number'] . "</td>";
                  echo "<td>" . $row['inmate_name'] . "</td>";         
                  echo "<td>" . $row['assistance'] . "</td>";
                  echo "<td>" . $row['additional_info'] . "</td>";
                  // Action buttons for approve and reject
                            echo '<td>
                              <a href="../Backend/MedicalUpdate.php?regID=' . $row['id'] . '" class="approve-btn">Done</a> 
                          </td>';
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7' class='text-center'>No Records Found</td></tr>";
          }

            ?>
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
