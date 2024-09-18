<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="../../../public/assets/css/Lab/labTestDetails.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
   <div class="dashboard-container">
      <!-- Sidebar -->
      <?php include '../Components/Lab/sidebar.php'; ?>

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
                     <p style="padding-top:4px;color:#989898">Lab Technician</p>
                  </div>
               </div>
            </div>
         </header>

         <!-- Dashboard Content -->
         <div class="dashboard-content">
            <h2>THINGS NEED TO BE TESTED:</h2>

            <?php
            if (isset($_GET['patientID'])) {
               $patientID = $_GET['patientID'];

               // Using dummy data instead of querying the database
               if ($patientID == '56481321') {
                  $patientName = 'John Doe';
                  $medicationDetails = 'Blood test, Urine test';
               } elseif ($patientID == '56481457') {
                  $patientName = 'Jane Smith';
                  $medicationDetails = 'X-ray, MRI scan';
               } else {
                  $patientName = 'Unknown';
                  $medicationDetails = 'No details available';
               }

               // Output the patient medication details along with patient ID
               echo "<div class='test-list' style='max-height: 450px;'>";
               echo "<table>";
               echo "<tr><td><b>Patient ID: {$patientID}</b></td><td></td></tr>";
               echo "<tr><td>Blood (Acute)</td><td><input type='checkbox'></td></tr>";
               echo "<tr><td>Blood (EDTA)</td><td><input type='checkbox'></td></tr>";
               echo "<tr><td>Oropharyngeal/Throat Swab</td><td><input type='checkbox'></td></tr>";
               echo "<tr><td>Oropharyngeal/Throat Swab</td><td><input type='checkbox'></td></tr>";
               echo "<tr><td>Eye</td><td><input type='checkbox'></td></tr>";
               echo "</table>";
               echo "</div>";
               echo "<button class='completed-btn'>Completed</button>";
            } else {
               echo "<p>Invalid patient ID.</p>";
            }
            ?>

         </div>
      </div>

   </div>
</body>

</html>