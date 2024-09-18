<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      /* General Reset */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: Arial, sans-serif;
      }

      /* Dashboard Container */
      .dashboard-container {
         display: flex;
         height: 100vh;
      }

      /* Sidebar */
      .sidebar {
         width: 80px;
         /* Show icons only */
         background-color: #172554;
         color: white;
         transition: width 0.3s ease;
         overflow: hidden;
      }

      .sidebar {
         width: 250px;
         /* Expands on hover */
      }

      .sidebar-logo {
         display: flex;
         align-items: center;
         cursor: pointer;
         padding: 10px;
         margin-top: 20px;
      }

      .sidebar-logo h2 {
         margin-left: 10px;
         font-size: 30px;
         color: #00C67A;
      }

      .sidebar-logo img {
         margin-left: 5px;
         max-width: 50px;
         margin-right: 10px;
      }

      .sidebar-menu {
         list-style-type: none;
         padding: 20px 0;
         margin-left: 10px;
         margin-top: 20px;
         ;
      }

      .sidebar-menu li {
         display: flex;
         align-items: center;
         padding: 15px 20px;
         cursor: pointer;
      }

      .sidebar-menu li:hover {
         background-color: #1C407F;
         border-radius: 30px 0 0 30px;
      }

      .sidebar-menu li.active {
         background-color: #fff;
         color: #172554;
         font-weight: bold;
         padding-top: 1rem;
         padding-bottom: 1rem;
         border-radius: 30px 0 0 30px;
      }


      .sidebar-menu li i {
         font-size: 18px;
         margin-right: 20px;
      }

      .menu-text {
         display: none;
         /* Hidden by default */
         font-size: 14px;
      }

      .sidebar:hover .menu-text {
         display: inline;
         /* Show on hover */
      }

      .menu-item {
         display: flex;
         align-items: center;
         padding: 15px 20px;
         cursor: pointer;
      }

      .menu-item i {
         font-size: 20px;
         margin-right: 20px;
      }

      .menu-text {
         display: none;
         /* Hidden by default */
         font-size: 16px;
      }

      .sidebar .menu-text {
         display: inline;
         /* Show on hover */
      }

      a {
         text-decoration: none;
         color: inherit;
         /* Inherits the color from the parent element */
      }
   </style>
</head>

<body>
   <div class="sidebar">
      <div class="sidebar-logo">
         <img src="../../../public/assets/images/logo.png">
         <h2>WELLBE</h2>
      </div>
      <ul class="sidebar-menu">
         <a href="../Pharmacy/phamacistDashboard.php">
            <li>
               <i class="fas fa-tachometer-alt"></i><span class="menu-text">Dashboard</span>
            </li>
         </a>
         <a href="../Pharmacy/medicationRequestList.php">
            <li>
               <i class="fas fa-list"></i><span class="menu-text">Requests</span>
            </li>
         </a>
         <a href="../Pharmacy/message.php">
            <li>
               <i class="fa-solid fa-comment-dots"></i><span class="menu-text">Chat</span>
            </li>
         </a>
         <a href="">
            <li>
               <i class="fa-solid fa-gear"></i><span class="menu-text">Settings</span>
            </li>
         </a>
         <a href="">
            <li>
               <i class="fas fa-sign-out-alt"></i><span class="menu-text">Logout</span>
            </li>
         </a>

      </ul>
   </div>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         const menuItems = document.querySelectorAll('.sidebar-menu li');

         // Check if there is a saved active item in localStorage
         const savedActiveItem = localStorage.getItem('activeMenuItem');
         if (savedActiveItem) {
            menuItems[savedActiveItem].classList.add('active');
         }

         menuItems.forEach((item, index) => {
            item.addEventListener('click', function() {
               // Remove active class from all menu items
               menuItems.forEach(menu => menu.classList.remove('active'));

               // Add active class to the clicked item
               this.classList.add('active');

               // Save the index of the active menu item to localStorage
               localStorage.setItem('activeMenuItem', index);
            });
         });
      });
   </script>

</body>

</html>