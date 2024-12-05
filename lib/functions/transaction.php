<?php
// Database connection
include_once('../db_connection.php');

// Handle Payment Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['transactionId']) && isset($_POST['amount']) && isset($_POST['paymentMethod'])) {
        $transactionId = $_POST['transactionId'];
        $amount = $_POST['amount'];
        $paymentMethod = $_POST['paymentMethod'];

        // Update the transaction status to 'Paid'
        $sql = "UPDATE transactions SET status='Paid', payment_method='$paymentMethod', amount_paid='$amount' WHERE transaction_id=$transactionId";

        if ($conn->query($sql) === TRUE) {
            echo "Payment successful for Transaction ID: $transactionId";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Fetch All Transactions
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $query = "SELECT * FROM transactions WHERE 1";

    // Apply filters
    if (isset($_GET['transactionType']) && $_GET['transactionType'] != 'all') {
        $query .= " AND type='" . $_GET['transactionType'] . "'";
    }
    if (isset($_GET['clientSearch']) && $_GET['clientSearch'] != '') {
        $query .= " AND client_name LIKE '%" . $_GET['clientSearch'] . "%'";
    }
    if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
        $query .= " AND transaction_date BETWEEN '" . $_GET['startDate'] . "' AND '" . $_GET['endDate'] . "'";
    }

    $result = $conn->query($query);
}
