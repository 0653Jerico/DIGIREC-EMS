<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Records</title>
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
        #search-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        #search-bar {
            width: 50%;
            padding: 10px;
        }
        #search-button {
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
    <h1>Search Bar</h1>
    <div id="search-container">
        <input type="text" id="search-bar" placeholder="Search for patients...">
        <button id="search-button"><i class="fas fa-search"></i></button>
    </div>

    <h2>Table for results</h2>
    <table id="results-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Results will be populated here -->
        </tbody>
    </table>

    <script>
        const patients = [
            { id: 1, name: 'John Doe', age: 30 },
            { id: 2, name: 'Jane Smith', age: 25 },
            { id: 3, name: 'Emily Johnson', age: 40 },
            { id: 4, name: 'Michael Brown', age: 35 }
        ];

        const searchBar = document.getElementById('search-bar');
        const searchButton = document.getElementById('search-button');
        const resultsTableBody = document.getElementById('results-table').querySelector('tbody');

        function performSearch() {
            const query = searchBar.value.toLowerCase();
            console.log('Search query:', query); // Debugging line
            const filteredPatients = patients.filter(patient => 
                patient.name.toLowerCase().includes(query)
            );
            console.log('Filtered patients:', filteredPatients); // Debugging line

            resultsTableBody.innerHTML = '';
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
                resultsTableBody.appendChild(row);
            });
        }

        searchBar.addEventListener('input', performSearch);
        searchButton.addEventListener('click', performSearch);

        function updatePatient(id) {
            alert('Update patient with ID: ' + id);
        }

        function deletePatient(id) {
            alert('Delete patient with ID: ' + id);
        }
    </script>
</body>
</html>