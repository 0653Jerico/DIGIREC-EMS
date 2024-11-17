<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        #filter-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        #filter-bar {
            width: 50%;
            padding: 10px;
        }
        #filter-button {
            padding: 10px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <h1>Manage Patient Records</h1>
    <div id="filter-container">
        <input type="text" id="filter-bar" placeholder="Filter by name...">
        <button id="filter-button"><i class="fas fa-filter"></i></button>
    </div>

    <table id="records-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Records will be populated here -->
        </tbody>
    </table>

    <script>
        const patients = [
            { id: 1, name: 'Alice Green', age: 28 },
            { id: 2, name: 'Bob White', age: 34 },
            { id: 3, name: 'Charlie Black', age: 45 },
            { id: 4, name: 'Diana Blue', age: 29 }
        ];

        const filterBar = document.getElementById('filter-bar');
        const filterButton = document.getElementById('filter-button');
        const recordsTableBody = document.getElementById('records-table').querySelector('tbody');

        function filterRecords() {
            const query = filterBar.value.toLowerCase();
            const filteredPatients = patients.filter(patient => 
                patient.name.toLowerCase().includes(query)
            );

            recordsTableBody.innerHTML = '';
            filteredPatients.forEach(patient => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${patient.id}</td>
                    <td>${patient.name}</td>
                    <td>${patient.age}</td>
                    <td>
                        <button onclick="updatePatient(${patient.id})">Update</button>
                        <button onclick="deletePatient(${patient.id})">Delete</button>
                    </td>
                `;
                recordsTableBody.appendChild(row);
            });
        }

        filterBar.addEventListener('input', filterRecords);
        filterButton.addEventListener('click', filterRecords);

        function updatePatient(id) {
            alert('Update patient with ID: ' + id);
        }

        function deletePatient(id) {
            alert('Delete patient with ID: ' + id);
        }
    </script>
</body>
</html>