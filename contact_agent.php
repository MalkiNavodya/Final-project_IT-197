<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Agents</title>
    <link rel="stylesheet" href="style.css">
    <style>
              body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
            background-image: url('images/home.jpg');
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 55px;
            background-size: cover;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(70px); /* Glassmorphism blur effect */
            color: #fff; /* Ensure text is readable */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        .agent-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .agent-card {
            background: rgba(255, 255, 255, 0.1); /* Transparent background */
            backdrop-filter: blur(50px);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: rgba(0, 0, 0, 0.5); /* Adjusted background to match dark theme */
            color: #fff; /* Ensure text is readable */
        }

        .agent-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background-color: rgba(0, 0, 0, 0.7); /* Slightly darker on hover */
        }

        .agent-card h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #fff;
        }

        .agent-card p {
            margin: 5px 0;
            color: #fff;
        }

        .agent-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .contact-agent {
            display: inline-block;
            margin-top: 10px;
            color: #27ae60;
            text-decoration: none;
            font-weight: bold;
        }

        .contact-agent:hover {
            text-decoration: underline;
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7); /* Darker overlay */
            backdrop-filter: blur(10px); /* Apply blur effect to the background */
        }

        .modal-content {
            background: linear-gradient(135deg, #FF758C, #FF7B76, #FF9B5F, #FF9473, #FCE3DB); /* Gradient background */
            margin: 10% auto;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 30%;
            backdrop-filter: blur(0px); /* No blur for modal content */
            transition: transform 0.3s;
        }

        .modal-content h2 {
            font-size: 24px;
            color: #333;
        }

        .close {
            color: red; /* Red color for the close button */
            font-size: 28px;
            font-weight: bold;
            float: right;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: darkred; /* Dark red color when hovered/focused */
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styling */
        label {
            display: block;
            margin: 10px 0 5px;
            color: #fff;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        button {
            background-color: #27ae60;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218c53;
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
    <div class="container">
        <h1>Contact Our Agents</h1>

        <!-- Agent Grid -->
        <div class="agent-grid">
        <?php 
$agents = [
    ['name' => 'Saman Perera', 'phone' => '+94 743628778', 'email' => 'mnavodyasenevirathna@gmail.com', 'price' => '15,000,000', 'property_id' => 1, 'agent_id' => 101],
    ['name' => 'Nadeesha Silva', 'phone' => '+94 77 123 4567', 'email' => 'nadeesha.silva@yahoo.com', 'price' => '20,500,000', 'property_id' => 2, 'agent_id' => 102],
    ['name' => 'Kasun Jayasinghe', 'phone' => '+94 72 987 6543', 'email' => 'kasun.jayasinghe@hotmail.com', 'price' => '18,000,000', 'property_id' => 3, 'agent_id' => 103],
    ['name' => 'Ayesha Fernando', 'phone' => '+94 71 222 3333', 'email' => 'ayesha.fernando@gmail.com', 'price' => '12,500,000', 'property_id' => 4, 'agent_id' => 104],
    ['name' => 'Chamika Wijesuriya', 'phone' => '+94 77 876 5432', 'email' => 'chamika.wijesuriya@gmail.com', 'price' => '22,000,000', 'property_id' => 5, 'agent_id' => 105],
    ['name' => 'Rashmi Nirosha', 'phone' => '+94 76 555 1234', 'email' => 'rashmi.nirosha@gmail.com', 'price' => '19,500,000', 'property_id' => 6, 'agent_id' => 106],
    ['name' => 'Dinesh Rajapaksha', 'phone' => '+94 77 234 5678', 'email' => 'dinesh.rajapaksha@gmail.com', 'price' => '16,000,000', 'property_id' => 7, 'agent_id' => 107],
    ['name' => 'Tharindu Jayaratne', 'phone' => '+94 75 333 4444', 'email' => 'tharindu.jayaratne@yahoo.com', 'price' => '21,500,000', 'property_id' => 8, 'agent_id' => 108],
    ['name' => 'Niranjala Samanthi', 'phone' => '+94 71 444 5555', 'email' => 'niranjala.samanthi@gmail.com', 'price' => '14,000,000', 'property_id' => 9, 'agent_id' => 109],
    ['name' => 'Ruwan Wickramasinghe', 'phone' => '+94 72 222 3333', 'email' => 'ruwan.wickramasinghe@gmail.com', 'price' => '17,500,000', 'property_id' => 10, 'agent_id' => 110],
    ['name' => 'Madhavi Gunasekara', 'phone' => '+94 73 555 4444', 'email' => 'madhavi.gunasekara@gmail.com', 'price' => '13,500,000', 'property_id' => 11, 'agent_id' => 111],
    ['name' => 'Viraj Perera', 'phone' => '+94 74 777 5555', 'email' => 'viraj.perera@yahoo.com', 'price' => '25,000,000', 'property_id' => 12, 'agent_id' => 112]
];

// Loop through the agent data to display them in grid format
foreach ($agents as $agent) {
    $price = str_replace(',', '', $agent['price']);
    $price = (float)$price;  // Convert to a float
    echo "<div class='agent-card'>
            <img src='images/profile.jpg' alt='{$agent['name']} Profile Image' class='agent-image'>
            <h3>{$agent['name']}</h3>
            <p><strong>Phone:</strong> {$agent['phone']}</p>
            <p><strong>Email:</strong> <a href='mailto:{$agent['email']}'>{$agent['email']}</a></p>
            <p><strong>Property Price:</strong> LKR " . number_format($price, 2) . "</p>
            <a href='#' class='contact-agent' 
                data-agent-name='{$agent['name']}'
                data-agent-phone='{$agent['phone']}' 
                data-agent-email='{$agent['email']}'
                data-property-id='{$agent['property_id']}' 
                data-agent-id='{$agent['agent_id']}'>Contact Agent</a>
        </div>";
}
?>

        </div>
    </div>

    <!-- Modal -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Contact Agent</h2>
            <form id="contactForm" action="lib/functions/send_message.php" method="POST">
                <input type="hidden" name="agent_id" id="agent_id">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" required>
                <label for="email">Your Email</label>
                <input type="email" name="email" id="email" required>
                <label for="phone">Your Phone</label>
                <input type="text" name="phone" id="phone" required>
                <label for="message">Message</label>
                <textarea name="message" id="message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <script>
    // Get elements
    const contactLinks = document.querySelectorAll('.contact-agent');
    const modal = document.getElementById('contactModal');
    const closeBtn = document.querySelector('.close');
    const contactForm = document.getElementById('contactForm');

    // Open modal when clicking "Contact Agent"
    contactLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const agentId = this.getAttribute('data-agent-id');
            document.getElementById('agent_id').value = agentId;
            modal.style.display = 'block';
        });
    });

    // Close modal when clicking the "x"
    closeBtn.onclick = function() {
        modal.style.display = 'none';
    };

    // Handle form submission with AJAX
    contactForm.onsubmit = function(event) {
        event.preventDefault();

        // Create a FormData object to send the form data via AJAX
        var formData = new FormData(this);

        // Debugging: Check the data being sent
        console.log("Form Data being sent:", formData);

        // Send the form data using fetch
        fetch('lib/functions/send_message.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse the JSON response
        .then(data => {
            console.log("Response from server:", data); // Debugging: Check the response
            if (data.status === 'success') {
                // Display success message in an alert
                alert(data.message);
                modal.style.display = "none"; // Close the modal
            } else {
                // Display error message in an alert
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong. Please try again later.');
        });
    };
</script>
<!-- Back to Home Button -->
<a href="home.php" class="back-button">Back to Home</a>

</body>
</html>
