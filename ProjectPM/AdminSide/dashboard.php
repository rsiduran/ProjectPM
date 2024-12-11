<?php
include '../Backend/config.php';

$query = "SELECT * FROM Registration WHERE RegistrationStatus = 'Pending'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($connect));
}
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
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
          <i class='bx bx-file'></i>
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
          <i class='bx bx-location-plus'></i>
          <span class="title">Medical Request</span>
        </a>
        <span class="tooltip">Medical Request</span>
      </li>
      <li>
        <a href="DetaineeUpdate.php">
          <i class='bx bx-navigation'></i>
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
            <?php
                // Check if the table has data
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        
                        echo "<td>" . $row['FullName'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Address'] . "</td>";
                        echo "<td>" . $row['DetaineesFullName'] . "</td>";
                        echo "<td>" . $row['Relationship'] . "</td>"; 
                        // Display the image if it exists
                        echo "<td>
                                <a href='../Backend/img/" . $row['IDPicture'] . "' target='_blank'>
                                    <img src='../Backend/img/" . $row['IDPicture'] . "' alt='ID Picture' style='width: auto; height: 40px;'>
                                </a>
                              </td>";
                        echo '<td>
                              <a href="#" 
                                onclick="if(confirm(\'Are you sure you want to approve?\')) { window.location.href=\'../Backend/registerApproval.php?regID=' . $row['RegistrationID'] . '\'; }" 
                                class="approve-btn">Approve</a> 
                              <a href="#" 
                                onclick="if(confirm(\'Are you sure you want to reject?\')) { window.location.href=\'../Backend/registerRejection.php?regID=' . $row['RegistrationID'] . '\'; }" 
                                class="reject-btn">Reject</a>
                            </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No Records Found</td></tr>";
                }
                ?>

          </tbody>
        </table>
      </div>
    </div>
    <!-- for modal -->
    <!-- <div id="imageModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6);">
          <span style="position:absolute; top:10px; right:20px; font-size:30px; color:white; cursor:pointer;" onclick="document.getElementById('imageModal').style.display='none'">×</span>
          <img id="modalImage" src="" alt="Full Image" style="display:block; margin:auto; margin-top: 30px; max-width:90%; max-height:90%;">
      </div> -->
  </section>
  <!-- for modal -->
  <!-- <script>
        function openImageModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modal.style.display = 'block';
            modalImage.src = imageSrc;
        }
    </script> -->

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