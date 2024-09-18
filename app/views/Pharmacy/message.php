<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="../../../public/assets/css/Pharmacy/message.css">
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
            <li id="dashboardLink">
               <a href="../Phamacist_Dashboad/phamacistDashboard.html">
                  <i class="fas fa-tachometer-alt"></i>
                  <span class="menu-text">Dashboard</span>
               </a>
            </li>
            <li>
               <i class="fas fa-list"></i><span class="menu-text">Requests</span>
            </li>
            <li class="active">
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
            <div class="container">
               <div class="chat-list">
                  <div class="search-bar">
                     <input type="text" placeholder="Search">
                  </div>
                  <ul>
                     <li>
                        <div class="chat-item">
                           <div class="avatar"></div>
                           <div class="chat-info">
                              <h4>Management one</h4>
                              <p>Sent attachment</p>
                           </div>
                           <span class="time">9:00am</span>
                        </div>
                     </li>
                     <li>
                        <div class="chat-item">
                           <div class="avatar"></div>
                           <div class="chat-info">
                              <h4>Management one</h4>
                              <p>Sent attachment</p>
                           </div>
                           <span class="time">9:00am</span>
                        </div>
                     </li>
                  </ul>
               </div>

               <div class="chat-window">
                  <div class="chat-header">
                     <div class="avatar"></div>
                     <div class="header-info">
                        <h4>Management one</h4>
                        <p>Online</p>
                     </div>
                  </div>
                  <div class="chat-messages">
                     <div class="message received">
                        <p>ullamco veniam, quis nostrud exer labor...</p>
                        <span class="time">11:20pm</span>
                     </div>
                     <div class="message sent">
                        <p>Lorem ipsum dolor sit amet, consectetu...</p>
                        <span class="time">11:25am</span>
                     </div>
                     <div class="message received">
                        <p>ullamco veniam, quis nostrud exer labor...</p>
                        <span class="time">11:26pm</span>
                     </div>
                     <div class="message sent">
                        <p>ullamco veniam, quis nostrud exer labor...</p>
                        <span class="time">11:25am</span>
                     </div>
                  </div>
                  <div class="chat-input">
                     <input type="text" placeholder="Type a message">
                     <button>Send</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="../../../public/assets/js/Pharmacy/message.js"></script>
</body>

</html>