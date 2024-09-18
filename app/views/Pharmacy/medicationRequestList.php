<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="../../../public/assets/css/Pharmacy/medicationRequestList.css">
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

            <div class="tabs">
               <button class="tab active" onclick="showTab('pending-requests')">Pending Requests</button>
               <button class="tab" onclick="showTab('completed-requests')">Completed Requests</button>
            </div>

            <div class="search-container">
               <input type="text" class="search-input" placeholder="Search">
            </div>

            <!-- Pending Requests Section -->
            <div id="pending-requests" class="requests-section active">
               <table class="requests-table">
                  <thead>
                     <tr>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Doctor</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="active-row">
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481321</td>
                        <td>Dr. John</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <tr>
                        <td>9:30 AM</td>
                        <td>05/12/2022</td>
                        <td>56481457</td>
                        <td>Dr. Joel</td>
                     </tr>
                     <!-- More Pending Requests Rows Here -->
                  </tbody>
               </table>
            </div>

            <!-- Completed Requests Section -->
            <div id="completed-requests" class="requests-section">
               <table class="requests-table">
                  <thead>
                     <tr>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Doctor</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="active-row">
                        <td>2:00 PM</td>
                        <td>03/11/2022</td>
                        <td>56481456</td>
                        <td>Dr. Emily</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <tr>
                        <td>3:30 PM</td>
                        <td>01/11/2022</td>
                        <td>56481234</td>
                        <td>Dr. David</td>
                     </tr>
                     <!-- More Completed Requests Rows Here -->
                  </tbody>
               </table>
            </div>

            <div class="pagination">
               <button class="pagination-btn">Previous</button>
               <button class="pagination-page active">1</button>
               <button class="pagination-page">2</button>
               <button class="pagination-page">3</button>
               <button class="pagination-page">4</button>
               <button class="pagination-btn">Next</button>
            </div>
         </div>
      </div>
      <script src="../../../public/assets/js/Pharmacy/medicationRequestList.js"></script>
</body>

</html>