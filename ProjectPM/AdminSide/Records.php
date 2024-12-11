<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detainee Records </title>
    <link rel="stylesheet" href="../assets/style/sidebar.css" />
    <link rel="stylesheet" href="../assets/style/recordlist.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <style>
      
    </style>
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
          <a href="../index.php">
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
      <h3 class="section-title">Detainee Personal Record</h3>
      <button type="button" name="detainee" class="left-button" id="openModal">
        Add Detainee
      </button>

      <div class="modal" id="modal">
        <div class="modal-content">
            <div class="modal-header" style="margin-left: 100px;">
                <span id="modalTitle">Detainee Personal Record</span>
                <span class="modal-close" id="closeModal">&times;</span>
            </div>
            <div class="modal-body">
                <!-- Card 1 -->
                <form action="../Backend/addrecord.php" method="POST" enctype="multipart/form-data" id="detaineeForm">
                    <div class="form-group">
                        <label for="name">Name (Last, First, M):</label>
                        <input type="text" name="name" placeholder="Name (Last, First, M)" required />
                    </div>
                    <div class="form-group">
                        <label for="dateofcapture">Date of Capture:</label>
                        <input type="date" name="dateofcapture" required />
                    </div>
                    <div class="form-group">
                        <label for="dateohbirth">Date of Birth:</label>
                        <input type="date" name="dateohbirth" required />
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality:</label>
                        <input type="text" name="nationality" placeholder="Nationality" required />
                    </div>
                    <div class="form-group">
                        <label for="education">Education:</label>
                        <input type="text" name="education" placeholder="Education" required />
                    </div>
                    <div class="form-group">
                        <label for="religion">Religion:</label>
                        <input type="text" name="religion" placeholder="Religion" required />
                    </div>
                    <!-- Card 2 -->
                    <div class="form-group">
                        <label for="sex">Sex:</label>
                        <select name="sex" class="form-control form-control-sm" required>
                          <option value="" disabled selected>Sex</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="physicalcondition">Physical Condition:</label>
                        <select name="physicalcondition" class="form-control form-control-sm" required>
                          <option value="" disabled selected>Physical Condition</option>
                          <option value="Good">Good</option>
                          <option value="Not Good">Not Good</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="placeofcapture">Place of Capture:</label>
                        <input type="text" name="placeofcapture" placeholder="Place of Capture" required />
                    </div>
                    <div class="form-group">
                        <label for="placeofbirth">Place of Birth:</label>
                        <input type="text" name="placeofbirth" placeholder="Place of Birth" required />
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" placeholder="Address" required />
                    </div>
                    <div class="form-group">
                        <label for="father">Father's Name:</label>
                        <input type="text" name="father" placeholder="Father's Name" required />
                    </div>
                    <div class="form-group">
                        <label for="mother">Mother's Name:</label>
                        <input type="text" name="mother" placeholder="Mother's Name" required />
                    </div>
                    <div class="form-group">
                        <label>Photo (Front):</label>
                        <input type="file" id="photofront" name="photofront" accept=".jpg, .jpeg, .png" required />
                    </div>
                    <div class="form-group">
                        <label>Photo (Left):</label>
                        <input type="file" id="photoleft" name="photoleft" accept=".jpg, .jpeg, .png" required />
                    </div>
                    <div class="form-group">
                        <label for="preparedby">Prepared By:</label>
                        <input type="text" name="preparedby" placeholder="Prepared By" required />
                    </div>
                    <div class="form-group">
                        <label for="dateofprepared">Date Prepared:</label>
                        <input type="date" name="dateofprepared" required />
                    </div>
                    <div class="form-group">
                        <label for="placeofprison">Place of the Prison:</label>
                        <input type="text" name="placeofprison" placeholder="Place of the Prison" required />
                    </div>

                    <button type="submit" class="submit-btn" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>

      <div class="body">
        <div class="table-container">
          <table id="recordsTable" class="minimalist-tables">
          <thead>
            <tr> 
                <th>ID</th>
                <th>Full Name</th>
                <th>Date Of Capture</th>
                <th>Address</th>
                <th>Prepared By</th>
                <th>Date Prepared</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
                <!-- Data will be inserted dynamically via JavaScript -->
          </tbody>
          <script src="script.js"></script>  <!-- Link to JavaScript file -->
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
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('modal');
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');

        // Open Add Modal
        openModal.addEventListener('click', () => {
            modal.style.display = 'flex';
            document.getElementById('modalTitle').textContent = 'Detainee Personal Record';
            document.getElementById('detaineeForm').reset();  // Reset form for adding new detainee
        });

        openModal.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
    fetchData();
  });
  </script>
  <script>
  function editRecord(id) {
    const modal = document.getElementById('modal');
    modal.style.display = 'flex';
    document.getElementById('modalTitle').textContent = 'Edit Detainee Personal Record';
    
  }

  function ViewRecord(id) {
    window.location.href = `../AdminSide/ViewRecord.php?id=${id}`;
    
  }




  function fetchData() {
    fetch('../Backend/RecordList.php')
        .then(response => response.json())  
        .then(data => {
            if (Array.isArray(data) && data.length > 0) {
                let tableBody = document.querySelector('#recordsTable tbody');
                tableBody.innerHTML = ''; 

                data.forEach(row => {
                    let tr = document.createElement('tr');
                    tr.id = `record-${row.id}`;  

                    tr.innerHTML = `
                        <td>${row.id}</td>
                        <td>${row.name}</td> 
                        <td>${row.dateofcapture}</td>
                        <td>${row.address}</td>
                        <td>${row.preparedby}</td>
                        <td>${row.dateofprepared}</td>
                        <td>
                            <a href="#" title="View">
                            <i class="fas fa-eye" onclick="ViewRecord(${row.id})"></i>
                        </a>
                            <a href="#" title="Edit"><i class="fas fa-edit" onclick="editRecord(${row.id})"></i></a>
                            <a href="#" title="Delete"><i class="fas fa-trash" onclick="deleteRecord(${row.id})"></i></a>
                        </td>
                    `;
                    tableBody.appendChild(tr);  
                });
            } else {
                alert('No records found');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

// The delete function remains the same
function deleteRecord(recordId) {
    const confirmation = confirm("Are you sure you want to delete the record?");
    
    if (confirmation) {
        var formData = new FormData();
        formData.append('id', recordId);  

        fetch('../Backend/deleterecord.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log('Response:', data);  
            if (data === "success") {
                alert("Record deleted.");
                
                const recordElement = document.getElementById(`record-${recordId}`);
                if (recordElement) {
                    recordElement.remove(); 
                } else {
                    alert("Record element not found in DOM.");
                }
            } else {
                alert("Error: " + data);  
            }
        })
        .catch(error => {
            alert("Error: " + error.message);  
        });
    } else {
        alert("Deletion canceled.");
    }
}

// function editRecord(id) {
//     // Redirect to viewrecord.php and pass the record ID as a URL parameter
//     window.location.href = `../AdminSide/editrecord.php?id=${id}`;
// }
  </script> 
  </body>
</html>
