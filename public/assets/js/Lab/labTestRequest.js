let uploadedReports = {};  // Global variable to track uploaded reports

document.addEventListener("DOMContentLoaded", function () {
   const rowsPerPage = 9;
   let currentPage = 1;
   let totalPages = 0;
   let currentTable = null;

   function setupPagination(table) {
      const rows = table.querySelectorAll("tbody tr");
      totalPages = Math.ceil(rows.length / rowsPerPage);
      const paginationContainer = document.querySelector(".pagination");
      paginationContainer.innerHTML = "";

      const prevButton = document.createElement("button");
      prevButton.className = "pagination-btn";
      prevButton.textContent = "Previous";
      prevButton.disabled = currentPage === 1;
      prevButton.addEventListener("click", () => {
         if (currentPage > 1) {
            currentPage--;
            displayPage(currentPage);
         }
      });
      paginationContainer.appendChild(prevButton);

      for (let i = 1; i <= totalPages; i++) {
         const pageButton = document.createElement("button");
         pageButton.className = `pagination-page ${i === currentPage ? "active" : ""}`;
         pageButton.textContent = i;
         pageButton.addEventListener("click", () => {
            currentPage = i;
            displayPage(currentPage);
         });
         paginationContainer.appendChild(pageButton);
      }

      const nextButton = document.createElement("button");
      nextButton.className = "pagination-btn";
      nextButton.textContent = "Next";
      nextButton.disabled = currentPage === totalPages;
      nextButton.addEventListener("click", () => {
         if (currentPage < totalPages) {
            currentPage++;
            displayPage(currentPage);
         }
      });
      paginationContainer.appendChild(nextButton);
   }

   function displayPage(page) {
      if (!currentTable) return;

      const rows = currentTable.querySelectorAll("tbody tr");
      const start = (page - 1) * rowsPerPage;
      const end = start + rowsPerPage;
      rows.forEach((row, index) => {
         row.style.display = index >= start && index < end ? "" : "none";
      });

      document.querySelectorAll(".pagination-page").forEach(button => {
         button.classList.toggle("active", parseInt(button.textContent) === page);
      });

      document.querySelector(".pagination-btn:first-of-type").disabled = page === 1;
      document.querySelector(".pagination-btn:last-of-type").disabled = page === totalPages;

      addRowClickListeners(); // Add row click listeners to handle popup
   }

   window.showTab = function (tabId) {
      document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
      document.querySelectorAll('.requests-section').forEach(section => section.classList.remove('active'));

      const tab = document.querySelector(`.tab[onclick="showTab('${tabId}')"]`);
      if (tab) {
         tab.classList.add('active');
      }

      const selectedSection = document.getElementById(tabId);
      if (selectedSection) {
         selectedSection.classList.add('active');
         currentTable = selectedSection.querySelector(".requests-table");
         currentPage = 1; // Reset to the first page
         displayPage(currentPage);
         setupPagination(currentTable);
      }
   };

   function addRowClickListeners() {
      const completedRequestsTable = document.querySelector('#completed-requests');

      if (!completedRequestsTable) return;

      const rows = completedRequestsTable.querySelectorAll('tbody tr');

      rows.forEach(row => {
         row.addEventListener('click', function () {
            const patientId = this.querySelector('td:nth-child(3)').textContent;

            openReportPopup(patientId);
         });
      });
   }

   window.openReportPopup = function (patientId) {
      const patientIdElement = document.getElementById('patientId');
      if (patientIdElement) {
         patientIdElement.innerText = patientId;
      } else {
         console.error('Element with ID "patientId" not found.');
      }

      const modal = document.getElementById('reportPopup');
      if (modal) {
         modal.style.display = "block";
         loadReports(patientId);  // Function to load reports based on the Patient ID
      } else {
         console.error('Modal with ID "reportPopup" not found.');
      }
   };

   // Call the function to add event listeners once the DOM is fully loaded
   document.addEventListener("DOMContentLoaded", addRowClickListeners);

   window.closeReportPopup = function () {
      const modal = document.getElementById('reportPopup');
      if (modal) {
         modal.style.display = "none";
      } else {
         console.error('Modal with ID "reportPopup" not found.');
      }
   };

   window.uploadFile = function () {
      const fileInput = document.createElement('input');
      fileInput.type = 'file';
      fileInput.onchange = function (event) {
         const file = event.target.files[0];  // Get the selected file
         if (file) {
            const patientId = document.getElementById('patientId').innerText;

            if (!patientId) {
               alert('Patient ID is missing.');
               return;
            }

            if (!uploadedReports[patientId]) {
               uploadedReports[patientId] = [];
            }

            // Check if the file already exists and replace it
            const existingFileIndex = uploadedReports[patientId].findIndex(report => report.name === file.name);
            if (existingFileIndex !== -1) {
               uploadedReports[patientId][existingFileIndex] = {
                  name: file.name,
                  url: URL.createObjectURL(file),  // Replace the file
                  comments: uploadedReports[patientId][existingFileIndex].comments || ''  // Preserve existing comments
               };
            } else {
               // Add a new file if it doesn't exist
               uploadedReports[patientId].push({
                  name: file.name,
                  url: URL.createObjectURL(file),
                  comments: ''  // Initialize comments field
               });
            }

            loadReports(patientId);
         }
      };

      fileInput.click();
   };

   function loadReports(patientId) {
      const reportTableBody = document.getElementById('reportTableBody');
      reportTableBody.innerHTML = '';

      const reports = uploadedReports[patientId] || [];
      reports.forEach(report => {
         const row = document.createElement('tr');
         row.innerHTML = `
               <td>
                  <div style="display: flex; align-items: center; width: 100%;">
                     <div class="file-info">
                        <i style="margin-right: 5px" class="fa-solid fa-file"></i>
                        ${report.name}
                     </div>
                     <div class="document-actions">
                        <button onclick="printReport('${report.url}')"><i class="fa fa-print"></i></button>
                        <button onclick="viewReport('${report.url}', '${report.name}', '${patientId}')"><i class="fa fa-eye"></i></button>
                        <button onclick="deleteReport('${patientId}', '${report.name}')"><i class="fa fa-trash"></i></button>
                     </div>
                  </div>
               </td>
            `;

         reportTableBody.appendChild(row);
      });
   }

   window.deleteReport = function (patientId, reportName) {
      uploadedReports[patientId] = uploadedReports[patientId].filter(report => report.name !== reportName);
      loadReports(patientId);
   };

   // Function to print the report along with comments
   window.printReport = function (reportUrl) {
      // Get the patientId to retrieve the correct report
      const patientId = document.getElementById('patientId').innerText;
      const reports = uploadedReports[patientId] || [];
      const lastReport = reports.find(report => report.url === reportUrl);

      if (!lastReport) {
         alert('Report not found.');
         return;
      }

      const contentToPrint = lastReport.updatedContent || 'No content available for printing.';

      // Open a new window to print the content
      const printWindow = window.open('', '_blank');
      printWindow.document.write(`
      <html>
      <head><title>Print Report</title></head>
      <body>
         <pre>${contentToPrint}</pre>
      </body>
      </html>
   `);

      printWindow.document.close();
      printWindow.focus();

      // Ensure the window is fully loaded before invoking the print dialog
      printWindow.onload = function () {
         printWindow.print();
      };
   };


   window.viewReport = function (reportUrl, reportName, patientId) {
      const modal = document.getElementById('filePreviewModal');
      const filePreview = document.getElementById('filePreview');
      const commentsField = document.getElementById('comments');

      if (modal) {
         modal.style.display = 'block';

         filePreview.innerHTML = `<embed src="${reportUrl}" type="application/pdf" width="100%" height="100%">`;

         const report = uploadedReports[patientId].find(report => report.name === reportName);
         if (report && report.comments) {
            commentsField.value = report.comments;
         } else {
            commentsField.value = '';
         }
      }
   };

   window.saveReports = function () {
      const patientId = document.getElementById('patientId').innerText;

      if (uploadedReports[patientId] && uploadedReports[patientId].length > 0) {
         uploadedReports[patientId].forEach(report => {
            const commentsField = document.getElementById('comments');
            report.comments = commentsField.value;
         });

         alert('Reports saved successfully.');
         closeFilePreviewModal();  // Close the modal after saving
      }
   };

   window.closeFilePreview = function () {
      const modal = document.getElementById('filePreviewModal');
      if (modal) {
         modal.style.display = 'none';
      }
   };
});

// Function to save comments
window.saveFileComments = function () {
   const comments = document.getElementById('comments').value;

   if (!comments) {
      alert('Please add some comments.');
      return;
   }

   // Get the patientId to associate the comment with the correct file
   const patientId = document.getElementById('patientId').innerText;
   const reports = uploadedReports[patientId] || [];

   if (reports.length === 0) {
      alert('No file found to add comments.');
      return;
   }

   // Get the last report (assuming comments are being added to the last uploaded file)
   const lastReport = reports[reports.length - 1];
   const reportUrl = lastReport.url;

   // Example: Simulating adding comments at the end of a file content
   // Assuming the file is a text or PDF, you would need to modify the actual file content (this is a simplified approach)
   const updatedFileContent = `File Content...\n\n---\nComments: ${comments}`;

   // Simulate saving the updated file
   lastReport.updatedContent = updatedFileContent;  // You can process or send this to the backend
   alert('Comments saved and added to the file.');
   closeFilePreview();
};


