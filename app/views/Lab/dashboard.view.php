<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Lab/labTechnicianDashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <!--?php include '../Components/Lab/sidebar.php'; ?-->
        <?php
        $this->renderComponent('navbar', $active);
        ?>
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Header -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/MVC/app/views/Components/Lab/header.php'; ?>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="welcome-message">
                    <h4 class="welcome">Welcome Mr. K.S.Perera</h4>
                    <h4 class="date">10 August, 2024</h4>
                </div>
                <div class="topbar">
                    <div class="search-bar">
                        <input type="text" placeholder="Search by Patient ID" />
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="cards-container">
                        <!-- Statistics Cards -->
                        <div class="card new-request">
                            <span class="circle-background">
                                <i class="fa-solid icon fa-hourglass-start"></i>
                            </span>
                            <p>120<br>Pending</p>
                        </div>
                        <div class="card ongoing">
                            <span class="circle-background">
                                <i class="fa-solid icon fa-microscope"></i>
                            </span>
                            <p>25 <br>Testing</p>
                        </div>
                        <div class="card completed">
                            <span class="circle-background">
                                <i class="fas icon fa-tasks"></i>
                            </span>
                            <p>34 <br> Completed</p>
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <div class="dashboard messages">

                        <div class="header">
                            <h3>Ongoing Tests</h3>
                            <a href="#" class="see-all">See all</a>
                        </div>
                        <table class="request-table">
                            <tr>
                                <th style="padding-right: 140px;">Patient_ID</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>pID_123432</td>
                                <td><span class="status progress">progress</span></td>
                            </tr>
                            <tr>
                                <td>pID_124562</td>
                                <td><span class="status progress">progress</span></td>
                            </tr>
                            <tr>
                                <td>pID_123782</td>
                                <td><span class="status pending">pending</span></td>
                            </tr>
                            <tr>
                                <td>pID_123472</td>
                                <td><span class="status pending">pending</span></td>
                            </tr>
                            <tr>
                                <td>pID_123430</td>
                                <td><span class="status pending">pending</span></td>
                            </tr>

                        </table>
                    </div>
                    <div class="dashboard messages">
                        <div class="header">
                            <h3>New Messages</h3>
                            <a href="#" class="see-all">See all</a>
                        </div>
                        <table class="request-table">
                            <tr>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Unread</th>
                            </tr>
                            <tr>
                                <td>Mr. K.G. Gunawardana</td>
                                <td>3:30 pm</td>
                                <td><span class="unread-messages">1</span></td>
                            </tr>
                            <tr>
                                <td>Mr. K.G. Gunawardana</td>
                                <td>3:30 pm</td>
                                <td><span class="unread-messages">1</span></td>
                            </tr>
                            <tr>
                                <td>Mr. K.G. Gunawardana</td>
                                <td>3:30 pm</td>
                                <td><span class="unread-messages">1</span></td>
                            </tr>
                            <tr>
                                <td>Mr. K.G. Gunawardana</td>
                                <td>3:30 pm</td>
                                <td><span class="unread-messages">1</span></td>
                            </tr>
                            <tr>
                                <td>Mr. K.G. Gunawardana</td>
                                <td>3:30 pm</td>
                                <td><span class="unread-messages">1</span></td>
                            </tr>
                            <tr>
                                <td>Mr. K.G. Gunawardana</td>
                                <td>3:30 pm</td>
                                <td><span class="unread-messages">1</span></td>
                            </tr>

                        </table>
                    </div>
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
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/Lab/labTechnicianDashboard.js"></script>
</body>

</html>