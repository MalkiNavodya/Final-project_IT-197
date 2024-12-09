<?php
// Include database connection
include_once('lib/functions/db_connection.php');

// Fetch transactions from the database
$sql = "SELECT * FROM transactions ORDER BY transaction_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions and Payments</title>
    <link rel="stylesheet" href="../../css/style.css">
      <style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    background-image: url('background.jpg'); /* Add a background image */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.container {
    width: 80%;
    margin: auto;
    padding: 20px;
    backdrop-filter: blur(10px); /* Apply blur effect */
    background-color: rgba(255, 255, 255, 0.2); /* Slight transparency */
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #ffffff; /* Ensure heading is visible on top of background */
}

.filters {
    margin-bottom: 20px;
    display: flex;
    gap: 10px;
}

.filters label {
    font-weight: bold;
    color: #ffffff; /* White text for contrast */
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    backdrop-filter: blur(10px); /* Apply blur effect to table background */
    background-color: rgba(255, 255, 255, 0.3); /* Slight transparency for table */
    border-radius: 8px;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border: 1px solid rgba(255, 255, 255, 0.2); /* Soft borders for table */
}

button {
    background-color: rgba(0, 128, 0, 0.7); /* Semi-transparent green */
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    backdrop-filter: blur(5px); /* Optional, can add blur to button */
}

button:hover {
    background-color: rgba(0, 128, 0, 1); /* More opaque green on hover */
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: rgba(255, 255, 255, 0.3); /* Slightly transparent background */
    margin: 10% auto;
    padding: 20px;
    width: 50%;
    border-radius: 15px;
    backdrop-filter: blur(10px); /* Apply blur effect for the modal */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Soft shadow */
}

.close {
    float: right;
    font-size: 20px;
    cursor: pointer;
}

/* Adjust the input fields for glassmorphism effect */
  input[type="text"],
  input[type="date"],
  input[type="number"],
select {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    background-color: rgba(255, 255, 255, 0.2);
    color: #fff;
    backdrop-filter: blur(8px);
    margin: 5px 0;
}

  input[type="text"]:focus,
  input[type="date"]:focus,
  input[type="number"]:focus,
select:focus {
    outline: none;
    border-color: #4CAF50; /* Highlight border on focus */
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    margin-top: 10px;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

</style>
</head>
<body>
    <?php include_once('navbar.php'); ?>
    <br><br><br><br><br>

    <div class="container">
        <h1>Transactions and Payments Management</h1>

        <!-- Filters -->
        <div class="filters">
            <form method="GET" action="transactions.php">
                <label for="transactionType">Transaction Type:</label>
                <select id="transactionType" name="transactionType">
                    <option value="all">All</option>
                    <option value="sale">Sale</option>
                    <option value="rent">Rent</option>
                    <option value="deposit">Deposit</option>
                </select>

                <label for="clientSearch">Client Name:</label>
                <input type="text" id="clientSearch" name="clientSearch" placeholder="Search by Client Name">

                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate">

                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate">

                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Transactions Table -->
        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Client Name</th>
                    <th>Property</th>
                    <th>Amount</th>
                    <th>Transaction Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['transaction_id'] . "</td>
                                <td>" . $row['client_name'] . "</td>
                                <td>" . $row['property'] . "</td>
                                <td>" . $row['amount'] . "</td>
                                <td>" . $row['transaction_date'] . "</td>
                                <td>" . $row['status'] . "</td>
                                <td><button onclick='openPaymentModal(" . $row['transaction_id'] . ")'>Pay</button></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No transactions found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pending Payments Section -->
        <h2>Pending Payments</h2>
        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Client Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically display pending transactions here -->
                <tr>
                    <td>1001</td>
                    <td>John Doe</td>
                    <td>$500</td>
                    <td>2024-12-10</td>
                    <td><button onclick="openPaymentModal(1001)">Pay Now</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Generate Report Button -->
        <button onclick="generateReport()">Generate Financial Report</button>
    </div>

    <!-- Modal for Payment -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePaymentModal()">&times;</span>
            <h2>Payment Details</h2>
            <form method="POST" action="../../lib/functions/transaction.php">
                <input type="hidden" id="transactionId" name="transactionId">
                <label for="amount">Amount to Pay:</label>
                <input type="number" id="amount" name="amount" required>

                <label for="paymentMethod">Payment Method:</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="creditCard">Credit Card</option>
                    <option value="bankTransfer">Bank Transfer</option>
                </select>

                <button type="submit">Submit Payment</button>
            </form>
        </div>
    </div>

    <script src="../../js/scripts.js"></script>
</body>
</html>
<script>// Open the payment modal
function openPaymentModal(transactionId) {
    document.getElementById('transactionId').value = transactionId;
    document.getElementById('paymentModal').style.display = 'block';
}

// Close the payment modal
function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
}

// Close the modal if clicked outside
window.onclick = function(event) {
    if (event.target === document.getElementById('paymentModal')) {
        closePaymentModal();
    }
};

// Generate report (Placeholder)
function generateReport() {
    alert("Generating Financial Report...");
}
</script>