<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dependent Dropdown</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add if you need styles -->
</head>
<body>

    <form>
        <!-- Region Dropdown -->
        <label for="region">Select Region:</label>
        <select name="region" id="region" onchange="loadProvinces(this.value)">
            <option value="">Select Region</option>
            <option value="NCR">National Capital Region (NCR)</option>
            <option value="CAR">Cordillera Administrative Region (CAR)</option>
            <option value="Region I">Ilocos Region</option>
            <option value="Region II">Cagayan Valley</option>
            <option value="Region III">Central Luzon</option>
            <option value="Region IV-A">CALABARZON</option>
            <option value="Region IV-B">MIMAROPA</option>
            <option value="Region V">Bicol Region</option>
            <option value="Region VI">Western Visayas</option>
            <option value="Region VII">Central Visayas</option>
            <option value="Region VIII">Eastern Visayas</option>
            <option value="Region IX">Zamboanga Peninsula</option>
            <option value="Region X">Northern Mindanao</option>
            <option value="Region XI">Davao Region</option>
            <option value="Region XII">SOCCSKSARGEN</option>
            <option value="Region XIII">Caraga</option>
            <option value="BARMM">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
        </select>

        <!-- Province Dropdown -->
        <label for="province">Select Province:</label>
        <select name="province" id="province" onchange="loadCities(this.value)">
            <option value="">Select Province</option>
            <!-- Options populated by JavaScript -->
        </select>

        <!-- City Dropdown -->
        <label for="city">Select City:</label>
        <select name="city" id="city" onchange="loadMunicipalities(this.value)">
            <option value="">Select City</option>
            <!-- Options populated by JavaScript -->
        </select>

        <!-- Municipality Dropdown -->
        <label for="barangay">Select Barangay:</label>
        <select name="barangay" id="barangay">
            <option value="">Select Barangay</option>
            <!-- Options populated by JavaScript -->
        </select>
    </form>

    <!-- External JavaScript file -->
    <script src="dropdown.js"></script>
</body>
</html>
