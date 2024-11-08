<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Patient/dashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <div class="dashboard-container">
    <?php
        $this->renderComponent('navbar', $active);
        ?>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <!-- Top Header -->
        <?php
            $pageTitle = "Dashboard"; // Set the text you want to display
            include $_SERVER['DOCUMENT_ROOT'] . '/MVC/app/views/Components/Patient/header.php';
            ?>

        <!-- Dashboard Content -->
<div class="container">
        <div class="header">
            <h1>Welcome Mr. K.S.Perera</h1>
            <p>10 August, 2024</p>
        </div>
        <div class="dashboard">
            <div class="left-column">
                <div class="card patient-info">
                    <div>
                        <div class="profile">
                            <div class="avatar"></div>
                            <div>
                                <h2>Amrah Slamath</h2>
                                <p>PatientID: P001</p>
                            </div>
                        </div>
                        <div class="appointments">
                            <div>
                                <h3>5</h3>
                                <p>Past</p>
                            </div>
                            <div>
                                <h3>2</h3>
                                <p>Upcoming</p>
                            </div>
                        </div>
                        <button class="btn-primary" onclick="window.location.href='../Message/message.html'">Send Message</button>
                    </div>
                    <div class="patient-details">
                        <div><p><strong>Gender</strong></p><p>-</p></div>
                        <div><p><strong>Email</strong></p><p>-</p></div>
                        <div><p><strong>City</strong></p><p>-</p></div>
                        <div><p><strong>Address</strong></p><p>-</p></div>
                        <div><p><strong>Phone Number</strong></p><p>-</p></div>
                        <div><p><strong>Birthday</strong></p><p>-</p></div>
                        <div><p><strong>Registration Date</strong></p><p>-</p></div>
                        <div><p><strong>Member Status</strong></p><p>-</p></div>
                    </div>
                </div>
                <div class="card appointment-list" onclick="window.location.href='../Appointment/Appointment.html'">
                    <h3>Appointments</h3>
                    <div class="appointment-item" >
                        <div>
                            <strong>01 Aug '24</strong>
                            <p>08:00 am</p>
                        </div>
                        <div>
                            <p><strong>Type</strong></p>
                            <p>Consultation</p>
                        </div>
                        <div>
                            <p><strong>Doctor</strong></p>
                            <p>Consultation</p>
                        </div>
                        <div>
                            <p><strong>Room No.</strong></p>
                            <p>25</p>
                        </div>
                        <div>
                            <p><strong>App No.</strong></p>
                            <p>04</p>
                        </div>
                    </div>
                    <div class="appointment-item">
                        <div>
                            <strong>01 Aug '24</strong>
                            <p>09:00 am</p>
                        </div>
                        <div>
                            <p><strong>Type</strong></p>
                            <p>Consultation</p>
                        </div>
                        <div>
                            <p><strong>Doctor</strong></p>
                            <p>Consultation</p>
                        </div>
                        <div>
                            <p><strong>Room No.</strong></p>
                            <p>26</p>
                        </div>
                        <div>
                            <p><strong>App No.</strong></p>
                            <p>05</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-column">
              <button class="btn btn-success"  onclick="window.location.href='../Medical_report/Medical.html'">
                <span class="icon-circle">
                  <i class="fas fa-file-medical-alt"></i>
                </span>
                View Medical Records
              </button>
              <button class="btn btn-info"  onclick="window.location.href='../Lab_report/Lab.html'">
                <span class="icon-circle">
                  <i class="fas fa-flask"></i>
                </span>
                View Lab 
                <br>Reports</br>
              </button>
              
                <div class="dashboard calendar-container">
                  <div class="calendar-header">
                      <h3>Calendar</h3>
                      <div class="calendar-nav">
                          <button id="prevMonth">&lt;</button>
                          <span id="monthYear"></span>
                          <button id="nextMonth">&gt;</button>
                      </div>
                  </div>
                  <table class="calendar-table">
                      <thead>
                          <tr>
                              <th>S</th>
                              <th>M</th>
                              <th>T</th>
                              <th>W</th>
                              <th>T</th>
                              <th>F</th>
                              <th>S</th>
                          </tr>
                      </thead>
                      <tbody id="calendar-body">
                          <!-- Calendar Dates will be generated dynamically -->
                      </tbody>
                  </table>
              </div>

        </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/Patient/script.js"></script>
  </body>
</html>
