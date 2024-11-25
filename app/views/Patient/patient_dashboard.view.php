<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Patient Dashboard</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Patient/patient_dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
  <div class="dashboard-container">
    <!-- Sidebar -->
    <?php
    $this->renderComponent('navbar', $active);
    ?>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Top Header -->
      <?php
      $pageTitle = "Dashboard"; // Set the text you want to display
      include $_SERVER['DOCUMENT_ROOT'] . '/mvc/app/views/Components/Patient/header.php';
      ?>

      <!-- Dashboard Content -->
      <div class="container">
        <div class="dashboard">
          <div class="profile-card">
          <div class="image">
                <?php if ($_SESSION['USER']->gender === 'M'): ?>
                  <img src="<?= ROOT ?>/assets/images/male_pro.png" alt="Profile Picture" class="profile-img" />
                <?php else: ?>
                  <img src="<?= ROOT ?>/assets/images/female_pro.png" alt="Profile Picture" class="profile-img1" />
                <?php endif; ?>
              </div>
            <div class="text-data">
              <span class="name"><?= $_SESSION['USER']->first_name ?> <?= $_SESSION['USER']->last_name ?></span>
              <span class="job"><?= $_SESSION['USER']->nic ?></span>
            </div>
            <div class="profile-details">

              

              <p><strong>gender:</strong> <?= $_SESSION['USER']->gender ?></p>
              <p><strong>Contact:</strong> <?= $_SESSION['USER']->contact ?></p>
              <p><strong>Emergency Contact:</strong> <?= $_SESSION['USER']->emergency_contact_no ?></p>
              <p><strong>Email:</strong> <?= $_SESSION['USER']->email ?></p>
              <p><strong>Address:</strong> <?= $_SESSION['USER']->address ?></p>
              <br>
              <div class="medical-info">
  <p><strong>Medical History:</strong> <?= $_SESSION['USER']->medical_history ?></p>
  <p><strong>Allergies:</strong> <?= $_SESSION['USER']->allergies ?></p>
</div>

              
            </div>
            <div class="buttons">
              <button class="button" onclick="window.location.href='../chat_with_the_doctor'">Message</button>
              <button class="button">Edit Profile</button>
            </div>

          </div>

          <div class="right">

            <div class="cards-container">
              <div class="card med-rep">
                <div class="circle-background">
                  <i class="fas fa-user icon"></i>
                </div>

                <div class="label" onclick="window.location.href='../view_medical_reports'">View Medical Reports</div>
              </div>

              <div class="card lab-rep">
                <div class="circle-background">
                  <i class="fas fa-user icon"></i>
                </div>

                <div class="label" onclick="window.location.href='../view_lab_reports'">View Medical Reports</div>
              </div>

              <div class="card app">
                <div class="circle-background">
                  <i class="fas fa-flask icon"></i>
                </div>
                <div class="label" onclick="window.location.href='../appointments'">Book an Appointment</div>
              </div>
            </div>


            <div class="calendar-wrapper">
              <div class="calendar-container">
                <div class="calendar-header">
                  <h3>Health Tips</h3>
                 
                  <div class="mini1-wrapper">
                  <div class="mini1">
                    <div class="mini1-part part1">
                      <h4>Dr. Upul Priyarathne</h4>
                    </div>
                    <div class="mini1-part part2">
                      <span>Date: <span>24/11/2024</span></span>
                    </div>
                    <div class="mini1-part part3">
                      <span>Appointment No: <span>25</span></span>
                    </div>
                  </div>

                  <div class="mini1">
                    <div class="mini1-part part1">
                      <h4>Dr. Saman Rathnayake</h4>
                    </div>
                    <div class="mini1-part part2">
                      <span>Date: <span>24/11/2024</span></span>
                    </div>
                    <div class="mini1-part part3">
                      <span>Appointment No: <span>25</span></span>
                    </div>
                  </div>
                  <div class="mini1">
                    <div class="mini1-part part1">
                      <h4>Dr. Jaya Swaminadan</h4>
                    </div>
                    <div class="mini1-part part2">
                      <span>Date: <span>24/11/2024</span></span>
                    </div>
                    <div class="mini1-part part3">
                      <span>Appointment No: <span>25</span></span>
                    </div>
                  </div>
                </div>
                 
                </div>
                
              </div>

              <div class="additional-container">
                <h3>Upcoming Appointments</h3>
                <div class="mini-wrapper">
                  <div class="mini">
                    <div class="mini-part part1">
                      <h4>Dr. Upul Priyarathne</h4>
                    </div>
                    <div class="mini-part part2">
                      <span>Date: <span>24/11/2024</span></span>
                    </div>
                    <div class="mini-part part3">
                      <span>Appointment No: <span>25</span></span>
                    </div>
                  </div>

                  <div class="mini">
                    <div class="mini-part part1">
                      <h4>Dr. Saman Rathnayake</h4>
                    </div>
                    <div class="mini-part part2">
                      <span>Date: <span>24/11/2024</span></span>
                    </div>
                    <div class="mini-part part3">
                      <span>Appointment No: <span>25</span></span>
                    </div>
                  </div>
                  <div class="mini">
                    <div class="mini-part part1">
                      <h4>Dr. Jaya Swaminadan</h4>
                    </div>
                    <div class="mini-part part2">
                      <span>Date: <span>24/11/2024</span></span>
                    </div>
                    <div class="mini-part part3">
                      <span>Appointment No: <span>25</span></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>


          <script src="<?= ROOT ?>/assets/js/Patient/script.js"></script>
        </div>
      </div>

</body>

</html>