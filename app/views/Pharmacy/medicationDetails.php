<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="../../../public/assets/css/Pharmacy/medicationDetails.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
   <div class="dashboard-container">
      <!-- Sidebar -->
      <div class="sidebar">
         <div class="sidebar-logo">
            <img src="../../../public/assets/images/logo.png">
            <h2>WELLBE</h2>
         </div>
         <ul class="sidebar-menu">
            <li>
               <i class="fas fa-tachometer-alt"></i><span class="menu-text">Dashboard</span>
            </li>
            <li class="active">
               <i class="fas fa-list"></i><span class="menu-text">Requests</span>
            </li>
            <li>
               <i class="fa-solid fa-comment-dots"></i><span class="menu-text">Chat</span>
            </li>
            <li>
               <i class="fa-solid fa-gear"></i><span class="menu-text">Settings</span>
            </li>
            <li>
               <i class="fas fa-sign-out-alt"></i><span class="menu-text">Logout</span>
            </li>
         </ul>
      </div>

      <!-- Main Content -->
      <div class="main-content">
         <!-- Top Header -->
         <header class="main-header">
            <div class="header-left">
               <h1>Medication Requests</h1>
            </div>
            <div class="header-right">
               <div class="notification-icon">
                  <i class="fas fa-bell"></i>
                  <span class="notification-badge"></span>
               </div>
               <div class="user-details">
                  <div class="user-avatar">
                     <!-- User Avatar Icon -->
                  </div>
                  <div class="user-info">
                     <p style="font-weight: bold;">K.S.Perera</p>
                     <p style="padding-top:4px;color:#989898">Pharmacist</p>
                  </div>
               </div>
            </div>
         </header>

         <!-- Dashboard Content -->
         <div class="dashboard-content">
            <h2>MEDICINES NEED TO BE GIVEN:</h2>
            <table class="medication-table">
               <thead>
                  <tr>
                     <th>Name of the Medication</th>
                     <th>Dosage of the Medication</th>
                     <th colspan="4">Number taken at a time</th>
                     <th>Do not substitute</th>
                     <th></th>
                  </tr>
                  <tr>
                     <th></th>
                     <th></th>
                     <th>Morning</th>
                     <th>Noon</th>
                     <th>Night</th>
                     <th>If Needed</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Medicine 1</td>
                     <td>2 mg</td>
                     <td>1</td>
                     <td>2</td>
                     <td>2</td>
                     <td>2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                  </tr>
                  <tr>
                     <td>Medicine 1</td>
                     <td>2 mg</td>
                     <td>1</td>
                     <td>2</td>
                     <td>2</td>
                     <td>2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                  </tr>
                  <tr>
                     <td>Medicine 1</td>
                     <td>2 mg</td>
                     <td>1</td>
                     <td>2</td>
                     <td>2</td>
                     <td>2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                  </tr>
                  <tr>
                     <td>Medicine 1</td>
                     <td>2 mg</td>
                     <td>1</td>
                     <td>2</td>
                     <td>2</td>
                     <td>2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                  </tr>
                  <!-- Add more rows as needed -->
               </tbody>
            </table>

            <!-- Remarks Section -->
            <div class="remarks-section">
               <h3>Remarks</h3>
               <p>Patient Name: John Doe</p>
               <p>Doctor Name: Dr. Smith</p>
               <p>Date: <span id="currentDate"></span></p>

               <!-- Textarea for additional remarks -->
               <textarea id="additionalRemarks" placeholder="Enter additional remarks..."></textarea>
            </div>

            <div class="buttons">
               <button class="btn done">Done</button>
               <button class="btn remarks" id="remarksButton">Print</button>
            </div>
         </div>
      </div>

      <script src="../../../public/assets/js/Pharmacy/remarkPopup.js"></script>
   </div>
</body>

</html>