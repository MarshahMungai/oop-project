<!DOCTYPE html>
<html>
<head>
    <title>Banking Dashboard</title>
    <link rel="stylesheet" href="../public/assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        h1, h2 {
            color: #333;
        }
        
        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        h1 a {
            background-color: white;
            color: red;
            padding: 4px 8px;
            text-decoration: none;
            border: ipx solid red;
            border-radius: 4px;
            cursor: pointer;
        }

        h1 a:hover {
            background-color: red;
            color: white;
        }
        
        h2 {
            margin-bottom: 10px;
        }
        
        p {
            margin-bottom: 5px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        form {
            margin-bottom: 20px;
            display: inline-block;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>
        Welcome to Your Banking Dashboard
        <a href="logout.php">Logout</a>
    </h1>

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
