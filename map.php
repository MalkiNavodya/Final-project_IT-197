<?php
// Connect to the database
include('lib/functions/db_connection.php');

// Example query to fetch location data from the database
$query = "SELECT id, name, latitude, longitude, address FROM locations";
$result = mysqli_query($conn, $query);

$locations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $locations[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Integration</title>
    <link rel="stylesheet" href="style.css">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt-kgvM5MAwsUU-uM8Yk6ppAKfANMmt7o&callback=initMap"></script>

    <style>
        /* Full Page Map */
        #map {
            height: 100vh;
            width: 100%;
        }

        .location-list {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            max-height: 70vh; /* Limit the height to 70% of the viewport */
            overflow-y: auto; /* Enable vertical scrolling */
            display: none; /* Start hidden by default */
        }

        .location-item {
            padding: 8px;
            margin-bottom: 8px;
            background-color: #f9f9f9;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .toggle-button:hover {
            background-color: #0056b3;
        }
        .back-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }

    .back-button:hover {
        background-color: #218838;
    }
    </style>
</head>
<body>
    <!-- Button to toggle the visibility of the location list -->
    <button class="toggle-button" onclick="toggleList()">Show Locations</button>

    <!-- Map container -->
    <div id="map"></div>

    <!-- Scrollable location list -->
    <div class="location-list" id="locationList">
        <h3>Locations</h3>
        <?php foreach ($locations as $location) { ?>
            <div class="location-item" 
                onclick="centerMap(<?php echo $location['latitude']; ?>, <?php echo $location['longitude']; ?>, '<?php echo $location['name']; ?>', '<?php echo addslashes($location['address']); ?>')">
                <strong><?php echo $location['name']; ?></strong>
                <p><?php echo $location['address']; ?></p>
            </div>
        <?php } ?>
    </div>

    <script>
        var map;
        var markers = [];

        // Initialize Google Map
        function initMap() {
            // Default center location (adjust as needed)
            var defaultCenter = { lat: 7.8731, lng: 80.7718 }; // Example: Sri Lanka

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7, // Adjust zoom level
                center: defaultCenter
            });

            // Add markers for locations from PHP
            <?php foreach ($locations as $location) { ?>
                var marker = new google.maps.Marker({
                    position: { lat: <?php echo $location['latitude']; ?>, lng: <?php echo $location['longitude']; ?> },
                    map: map,
                    title: "<?php echo $location['name']; ?>"
                });

                // Create InfoWindow for the marker
                var infowindow = new google.maps.InfoWindow({
                    content: `<strong><?php echo $location['name']; ?></strong><br><p><?php echo addslashes($location['address']); ?></p>`
                });

                // Add click event to open InfoWindow
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

                markers.push(marker);
            <?php } ?>
        }

        // Function to center the map on a clicked location
        function centerMap(lat, lng, name, address) {
            var center = new google.maps.LatLng(lat, lng);
            map.panTo(center);
            map.setZoom(15);

            // Display an InfoWindow for the centered location
            var infowindow = new google.maps.InfoWindow({
                content: `<strong>${name}</strong><br><p>${address}</p>`
            });
            infowindow.setPosition(center);
            infowindow.open(map);
        }

        // Function to toggle the location list visibility
        function toggleList() {
            var list = document.getElementById('locationList');
            var button = document.querySelector('.toggle-button');
            if (list.style.display === 'none' || list.style.display === '') {
                list.style.display = 'block';
                button.innerText = 'Hide Locations';
            } else {
                list.style.display = 'none';
                button.innerText = 'Show Locations';
            }
        }
    </script>
    <!-- Back to Home Button -->
    <a href="home.php" class="back-button">Back to Home</a>

</body>
</html>
