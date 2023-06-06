<!DOCTYPE html>
<html>
<head>
    <title>Banking Dashboard</title>
    <link rel="stylesheet" href="../public/assets/css/styles.css">
</head>
<body>
    <h1>Welcome to Your Banking Dashboard <span><a href="logout.php">Logout</a> <!-- Logout link or button --></span></h1>

    <h2>Account Summary</h2>
    <p>Account Number: <?= $accountNumber ?></p>
    <p>Balance: $<?= $balance ?></p>

    <h2>Transactions</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $transaction['transaction_date'] ?></td>
                <td><?= $transaction['description'] ?></td>
                <td><?= $transaction['amount'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Transfer Funds</h2>
    <form method="POST" action="../public/process_transfer.php">
        <label for="recipient">Recipient:</label>
        <input type="text" name="recipient" id="recipient" required>

        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>

        <button type="submit" name="transfer">Transfer</button>
    </form>

    <script src="js/script.js"></script>
</body>
</html>