<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Searchable Table with Sort Toggle, Pagination, and Scrollable Content</title>
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Additional CSS for styling the modal */
    .modal-header {
      background-color: #007bff;
      color: white;
    }
    .modal-footer button {
      margin-right: 5px;
    }
        .sort-indicator {
            font-size: 0.75em;
            margin-left: 5px;
        }
        /* Custom CSS for dropdown animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0px); }
        }

        .dropdown-menu {
            display: none;
            animation: fadeIn 0.3s ease-in;
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
    <script>
        const tableData = [
    { DATE: '2024-05-01', TIME: '08:30 AM', USN: '1234567890', Name: 'John Doe', Attendee: 'SHS student' },
    { DATE: '2024-05-01', TIME: '09:00 AM', USN: '2345678901', Name: 'Jane Smith', Attendee: 'College Student' },
    { DATE: '2024-05-01', TIME: '09:30 AM', USN: '3456789012', Name: 'Emily Johnson', Attendee: 'Instructor' },
    { DATE: '2024-05-01', TIME: '10:00 AM', USN: '4567890123', Name: 'Michael Brown', Attendee: 'Visitor' },
    { DATE: '2024-05-01', TIME: '10:30 AM', USN: '5678901234', Name: 'Jessica Williams', Attendee: 'Staff Personal' },
    { DATE: '2024-05-01', TIME: '11:00 AM', USN: '6789012345', Name: 'David Jones', Attendee: 'SHS student' },
    { DATE: '2024-05-01', TIME: '11:30 AM', USN: '7890123456', Name: 'Laura Garcia', Attendee: 'College Student' },
    { DATE: '2024-05-01', TIME: '12:00 PM', USN: '8901234567', Name: 'Kevin Martinez', Attendee: 'Instructor' },
    { DATE: '2024-05-01', TIME: '12:30 PM', USN: '9012345678', Name: 'Amy Rodriguez', Attendee: 'Visitor' },
    { DATE: '2024-05-01', TIME: '01:00 PM', USN: '0123456789', Name: 'Brian Davis', Attendee: 'Staff Personal' },
    { DATE: '2024-05-01', TIME: '01:30 PM', USN: '1123456789', Name: 'Sarah Miller', Attendee: 'SHS student' },
    { DATE: '2024-05-01', TIME: '02:00 PM', USN: '2123456789', Name: 'Daniel Wilson', Attendee: 'College Student' },
    { DATE: '2024-05-01', TIME: '02:30 PM', USN: '3123456789', Name: 'Hannah Moore', Attendee: 'Instructor' },
    { DATE: '2024-05-01', TIME: '03:00 PM', USN: '4123456789', Name: 'James Taylor', Attendee: 'Visitor' },
    { DATE: '2024-05-01', TIME: '03:30 PM', USN: '5123456789', Name: 'Olivia Anderson', Attendee: 'Staff Personal' },
    { DATE: '2024-05-01', TIME: '04:00 PM', USN: '6123456789', Name: 'Lucas Thomas', Attendee: 'SHS student' },
    { DATE: '2024-05-01', TIME: '04:30 PM', USN: '7123456789', Name: 'Ashley Jackson', Attendee: 'College Student' },
    { DATE: '2024-05-01', TIME: '05:00 PM', USN: '8123456789', Name: 'Anthony Harris', Attendee: 'Instructor' },
    { DATE: '2024-05-01', TIME: '05:30 PM', USN: '9123456789', Name: 'Patricia Clark', Attendee: 'Visitor' },
    { DATE: '2024-05-01', TIME: '06:00 PM', USN: '0134567890', Name: 'Robert Lewis', Attendee: 'Staff Personal' },
    { DATE: '2024-05-01', TIME: '06:30 PM', USN: '1134567890', Name: 'Linda Lee', Attendee: 'SHS student' },
    { DATE: '2024-05-01', TIME: '07:00 PM', USN: '2134567890', Name: 'William Walker', Attendee: 'College Student' },
    { DATE: '2024-05-01', TIME: '07:30 PM', USN: '3134567890', Name: 'Karen Hall', Attendee: 'Instructor' },
    { DATE: '2024-05-01', TIME: '08:00 PM', USN: '4134567890', Name: 'Charles Allen', Attendee: 'Visitor' },
    { DATE: '2024-05-01', TIME: '08:30 PM', USN: '5134567890', Name: 'Nancy Young', Attendee: 'Staff Personal' },
    { DATE: '2024-05-01', TIME: '09:00 PM', USN: '6134567890', Name: 'Steven Hernandez', Attendee: 'SHS student' },
    { DATE: '2024-05-01', TIME: '09:30 PM', USN: '7134567890', Name: 'Barbara King', Attendee: 'College Student' },
    { DATE: '2024-05-01', TIME: '10:00 PM', USN: '8134567890', Name: 'Paul Wright', Attendee: 'Instructor' },
    { DATE: '2024-05-01', TIME: '10:30 PM', USN: '9134567890', Name: 'Lisa Lopez', Attendee: 'Visitor' },
    { DATE: '2024-05-01', TIME: '11:00 PM', USN: '0145678901', Name: 'George Hill', Attendee: 'Staff Personal' },
    { DATE: '2024-05-01', TIME: '11:30 PM', USN: '1145678901', Name: 'Sandra Scott', Attendee: 'SHS student' },
    { DATE: '2024-05-02', TIME: '08:30 AM', USN: '2145678901', Name: 'Donald Green', Attendee: 'College Student' },
    { DATE: '2024-05-02', TIME: '09:00 AM', USN: '3145678901', Name: 'Betty Adams', Attendee: 'Instructor' },
    { DATE: '2024-05-02', TIME: '09:30 AM', USN: '4145678901', Name: 'Joseph Baker', Attendee: 'Visitor' },
    { DATE: '2024-05-02', TIME: '10:00 AM', USN: '5145678901', Name: 'Margaret Gonzalez', Attendee: 'Staff Personal' },
    { DATE: '2024-05-02', TIME: '10:30 AM', USN: '6145678901', Name: 'Thomas Nelson', Attendee: 'SHS student' },
    { DATE: '2024-05-02', TIME: '11:00 AM', USN: '7145678901', Name: 'Dorothy Carter', Attendee: 'College Student' },
    { DATE: '2024-05-02', TIME: '11:30 AM', USN: '8145678901', Name: 'Mark Mitchell', Attendee: 'Instructor' },
    { DATE: '2024-05-02', TIME: '12:00 PM', USN: '9145678901', Name: 'Susan Perez', Attendee: 'Visitor' },
    { DATE: '2024-05-02', TIME: '12:30 PM', USN: '0156789012', Name: 'Kenneth Roberts', Attendee: 'Staff Personal' },
    { DATE: '2024-05-02', TIME: '01:00 PM', USN: '1156789012', Name: 'Deborah Turner', Attendee: 'SHS student' },
    { DATE: '2024-05-02', TIME: '01:30 PM', USN: '2156789012', Name: 'Jason Phillips', Attendee: 'College Student' },
    { DATE: '2024-05-02', TIME: '02:00 PM', USN: '3156789012', Name: 'Patricia Campbell', Attendee: 'Instructor' },
    { DATE: '2024-05-02', TIME: '02:30 PM', USN: '4156789012', Name: 'Eric Parker', Attendee: 'Visitor' },
    { DATE: '2024-05-02', TIME: '03:00 PM', USN: '5156789012', Name: 'Linda Evans', Attendee: 'Staff Personal' },
    { DATE: '2024-05-02', TIME: '03:30 PM', USN: '6156789012', Name: 'Scott Edwards', Attendee: 'SHS student' },
    { DATE: '2024-05-02', TIME: '04:00 PM', USN: '7156789012', Name: 'Carol Collins', Attendee: 'College Student' },
    { DATE: '2024-05-02', TIME: '04:30 PM', USN: '8156789012', Name: 'Larry Stewart', Attendee: 'Instructor' }
];

        let currentPage = 1;
        const itemsPerPage = 10;
        const maxPageNumbers = 10; 
        let sortConditions = [];
        let isSortingEnabled = true; // Control sorting with a checkbox

        function renderTable(data) {
            const tableBody = document.getElementById('dataTableBody');
            tableBody.innerHTML = '';
            data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.DATE}</td>
                    <td>${item.TIME}</td>
                    <td>${item.USN}</td>
                    <td>${item.Name}</td>
                    <td>${item.Attendee}</td>
                `;
                tableBody.appendChild(row);
            });
        }
        

        function paginateData(data, page, itemsPerPage) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, data.length);
            return data.slice(startIndex, endIndex);
        }

        function renderPagination(totalItems, itemsPerPage) {
            const paginationContainer = document.getElementById('paginationContainer');
            paginationContainer.innerHTML = '';
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            const createPageButton = (page, text) => {
                const button = document.createElement('button');
                button.className = 'btn btn-outline-secondary mx-1';
                button.innerText = text;
                button.disabled = currentPage === page;
                button.onclick = () => {
                    currentPage = page;
                    updateTable();
                };
                return button;
            };

            const currentBlock = Math.ceil(currentPage / maxPageNumbers);
            const startPage = (currentBlock - 1) * maxPageNumbers + 1;
            const endPage = Math.min(startPage + maxPageNumbers - 1, totalPages);

            if (currentPage > 1) {
                paginationContainer.appendChild(createPageButton(currentPage - 1, 'Previous'));
            }

            if (startPage > 1) {
                paginationContainer.appendChild(createPageButton(1, '1'));
                if (startPage > 2) {
                    paginationContainer.appendChild(createPageButton(startPage - 1, '...'));
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                paginationContainer.appendChild(createPageButton(i, `${i}`));
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    paginationContainer.appendChild(createPageButton(endPage + 1, '...'));
                }
                paginationContainer.appendChild(createPageButton(totalPages, `${totalPages}`));
            }

            if (currentPage < totalPages) {
                paginationContainer.appendChild(createPageButton(currentPage + 1, 'Next'));
            }
        }

        function updateTable() {
            let filteredData = tableData;
            const searchInput = document.getElementById('searchInput').value.trim().toLowerCase();
            if (searchInput) {
                filteredData = filteredData.filter(item => {
                    return Object.values(item).some(value => {
                        return String(value).toLowerCase().includes(searchInput);
                    });
                });
            }

            if (isSortingEnabled && sortConditions.length > 0) {
                filteredData.sort((a, b) => {
                    for (const condition of sortConditions) {
                        const { column, direction } = condition;
                        const comparison = direction === 'asc'
                            ? a[column] > b[column] ? 1 : -1
                            : a[column] < b[column] ? 1 : -1;
                        if (comparison !== 0) {
                            return comparison;
                        }
                    }
                    return 0;
                });
            }

            const paginatedData = paginateData(filteredData, currentPage, itemsPerPage);
            renderTable(paginatedData);
            renderPagination(filteredData.length, itemsPerPage);
            updateHeaderIndicators();
        }

        function handleSort(column) {
            if (!isSortingEnabled) {
                return;
            }

            const existingConditionIndex = sortConditions.findIndex(cond => cond.column === column);
            if (existingConditionIndex !== -1) {
                const existingCondition = sortConditions[existingConditionIndex];
                existingCondition.direction = existingCondition.direction === 'asc' ? 'desc' : 'asc';
            } else {
                sortConditions.push({ column, direction: 'asc' });
            }
            updateTable();
        }

        function toggleSorting(isChecked) {
            isSortingEnabled = isChecked;
            if (!isSortingEnabled) {
                sortConditions = []; // Clear sort conditions when sorting is disabled
            }
            updateTable();
        }

        function updateHeaderIndicators() {
            const headers = document.querySelectorAll('#dataTable th');
            headers.forEach(header => {
                const column = header.innerText.split(' ')[0].toLowerCase();
                const conditionIndex = sortConditions.findIndex(cond => cond.column === column);
                if (isSortingEnabled && conditionIndex !== -1) {
                    const direction = sortConditions[conditionIndex].direction;
                    const indicator = direction === 'asc' ? '↑' : '↓';
                    header.innerText = `${header.innerText.split(' ')[0]} ${indicator}`;
                } else {
                    header.innerText = header.innerText.split(' ')[0];
                }
            });
        }

        function setupTable() {
            const headers = document.querySelectorAll('#dataTable th');
            headers.forEach(header => {
                const column = header.innerText.split(' ')[0].toLowerCase();
                header.style.cursor = 'pointer';
                header.onclick = () => handleSort(column);
            });

            updateTable();
        }

        function Return2Page1(){
            currentPage = 1;
            updateTable();
        }



        window.onload = setupTable;
    </script>

    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Universal.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/MyWebsites/AttendanceSystem/NavBar/navbar.php'; ?>
    <div class="container mt-4 rounded text-nowrap" style="border: solid 10px; background-color: white; min-height: 625px;">
        <b><center class="mb-2 mt-2" style="font-size: 30px;">PRESENT DATABASE</center></b>
        <!-- Search input -->
        <div class="mb-3">
            <input
                type="text"
                id="searchInput"
                class="form-control"
                placeholder="Search..."
                onkeyup="Return2Page1()"
            />
        </div>

        <!-- Scrollable table container -->
        <div style="overflow-x: auto; height: 591px;">
        <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#attendanceModal">
  Add Attendance
</button>
            <!-- Toggle sorting checkbox -->
            <input
                type="checkbox"
                id="sortToggleCheckbox"
                onchange="toggleSorting(this.checked)"
                checked
            />
            <label for="sortToggleCheckbox">Enable Sorting</label>

            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Attendee</th>
                    </tr>
                </thead>
                <tbody id="dataTableBody">
                    <!-- Table rows will be dynamically populated by JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Pagination buttons -->
        <hr style="margin-top: 0px; margin-bottom: 12px;">
        <div id="paginationContainer" class="text-center mb-3"></div>
    </div>

    <div class="modal fade" id="attendanceModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Attendance</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="attendanceForm">
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="text" class="form-control" id="date" name="date" readonly>
          </div>
          <div class="form-group">
            <label for="time">Time:</label>
            <input type="text" class="form-control" id="time" name="time" readonly>
          </div>
          <div class="form-group">
            <label for="USN">USN:</label>
            <input type="text" class="form-control" id="USN" name="USN" required>
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="attendee">Attendee:</label>
            <select class="form-control" id="attendee" name="attendee" required>
              <option value="SHS student">SHS student</option>
              <option value="College Student">College Student</option>
              <option value="Instructor">Instructor</option>
              <option value="Visitor">Visitor</option>
              <option value="Staff Personal">Staff Personal</option>
            </select>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="submitAttendance()">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    // Get current date and time
    var currentDate = new Date();
    var date = currentDate.toISOString().slice(0,10);
    
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight
    var time = hours + ':' + (minutes < 10 ? '0' + minutes : minutes) + ' ' + ampm;

    // Set date and time fields
    $('#date').val(date);
    $('#time').val(time);
  });

  function submitAttendance() {
    const form = document.getElementById('attendanceForm');
    if (form.checkValidity()) {
      // Here you would typically handle the form data submission, e.g., via AJAX
      alert('Attendance submitted successfully!');
      $('#attendanceModal').modal('hide');
    } else {
      form.reportValidity();
    }
  }
</script>
</body>
</html>
