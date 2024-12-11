<?php
include '../Backend/config.php';

$query = "SELECT * FROM Visitation WHERE terms_accepted = '1'";
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
  <link rel="stylesheet" href="../assets/style/table2.css" />

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
    <h3 class="section-title">Visitation Request</h3>
    <div class="body">
      <div class="table-container">
        <table class="minimalist-table">
          <thead>
            <tr>
              <th>Visitor Name</th>
              <th>Visitor Email</th>
              <th>Inmate Name</th>
              <th>Inmate ID</th>
              <th>Relationship</th>
              <th>Visit Reason</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Check if the table has data
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    // Display data for each row
                    echo "<td>" . $row['visitor_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['inmate_name'] . "</td>";
                    
                    // Display the image with a link to open in a new tab
                    echo "<td>
                            <a href='../Backend/" . $row['inmate_id'] . "' target='_blank'>
                                <img src='../Backend/" . $row['inmate_id'] . "' alt='ID Picture' style='width: auto; height: 40px;'>
                            </a>
                          </td>";
                    echo "<td>" . $row['relationship'] . "</td>";
                    echo "<td>" . $row['visit_reason'] . "</td>";
                    // Action buttons for approve and reject
                    echo '<td>
                    <a href="#" 
                       onclick="if(confirm(\'Are you sure you want to approve this visitation?\')) { window.location.href=\'../Backend/VisitationApproval.php?regID=' . $row['id'] . '\'; }">Approve</a> 
                    <a href="#" 
                       onclick="if(confirm(\'Are you sure you want to reject this visitation?\')) { window.location.href=\'../Backend/VisitationRejection.php?regID=' . $row['id'] . '\'; }">Reject</a>
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
    <h3 class="section-title">Virtual Visitation Request</h3>
    <div class="body">
      <div class="table-container">
        <table class="minimalist-table">
          <thead>
            <tr>
              <th>Visitor Name</th>
              <th>Visitor Email</th>
              <th>Inmate Name</th>
              <th>Calling Number</th>
              <th>Inmate ID</th>
              <th>Relationship</th>
              <th>Visit Reason</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM Virtual WHERE terms = '1'";
            $result = mysqli_query($connect, $query);
            
            if (!$result) {
                die("Query Failed: " . mysqli_error($connect));
            }
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";

                  // Display data for each row
                  echo "<td>" . $row['visitor_name'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['inmate_name'] . "</td>";
                  echo "<td>" . $row['number_call'] . "</td>";
                  
                  // Display the image with a link to open in a new tab
                  echo "<td>
                          <a href='../Backend/" . $row['inmate_id'] . "' target='_blank'>
                              <img src='../Backend/" . $row['inmate_id'] . "' alt='ID Picture' style='width: auto; height: 40px;'>
                          </a>
                        </td>";
                  echo "<td>" . $row['relationship'] . "</td>";
                  echo "<td>" . $row['reason'] . "</td>";
                  // Action buttons for approve and reject
                  echo '<td>
                    <a href="#" 
                      onclick="if(confirm(\'Are you sure you want to approve this virtual visitation?\')) { window.location.href=\'../Backend/VirtualApproval.php?regID=' . $row['id'] . '\'; }">Approve</a> 
                    <a href="#" 
                      onclick="if(confirm(\'Are you sure you want to reject this virtual visitation?\')) { window.location.href=\'../Backend/VirtualRejection.php?regID=' . $row['id'] . '\'; }">Reject</a>
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