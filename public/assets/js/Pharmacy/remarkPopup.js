document.addEventListener('DOMContentLoaded', function () {
   const remarksButton = document.getElementById('remarksButton');
   const currentDateElement = document.getElementById('currentDate');

   // Get current date and set in remarks
   const currentDate = new Date().toLocaleDateString();
   currentDateElement.textContent = currentDate;

   // Print functionality
   remarksButton.addEventListener('click', function () {
      window.print();
   });
});

// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
   // Select all the sidebar menu items
   const menuItems = document.querySelectorAll('.sidebar-menu li');

   // Loop through each menu item and add a click event listener
   menuItems.forEach(item => {
      item.addEventListener('click', function () {
         // Remove the 'active' class from all menu items
         menuItems.forEach(menu => menu.classList.remove('active'));

         // Add the 'active' class to the clicked item
         this.classList.add('active');
      });
   });
});