<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 210mm;
            margin: auto;
            padding: 20px;
            background: white;
            border: 1px solid #ccc;
            position: relative;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }
        .header img {
            max-width: 150px;
        }
        .header h1 {
            margin: 5px 0;
            font-size: 24px;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 18px;
        }
        .header .date {
            text-align: right;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            
            bottom: 10px;
            left: 0;
            right: 0;
            font-size: 12px;
            background: white;
            padding: 5px 0;
            border-top: 1px solid black;
        }
        .print-button {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .print-button button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        @media print {
            .print-button {
                display: none;
            }
            .footer {
                position: fixed;
                bottom: 0;
                border-top: 1px solid black;
            }
            .container {
                page-break-after: always;
            }
        }
    </style>
</head>
<?php $com =  $this->main_model->InvoiceHeader();  ?>
<body>
    <div class="container">
        <div class="print-button">
            <button onclick="window.print()">Print</button>
        </div>
        <div class="header">
            <h1><?php echo  $com['name']; ?></h1>
            <h2>Due Transaction Reports</h2>
            <p><strong>From:</strong> <?php echo $from_date; ?> <strong>To:</strong> <?php echo $to_date; ?></p>
            <div class="date">Print Date: <?php echo date('Y-m-d H:i:s');  // Format: YYYY-MM-DD HH:MM:SS
?></div>
        </div>
  
        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Bill No</th>
                    <th>Bill Date</th>
                    <th>Paid Amount</th>
                   
                </tr>
            </thead>
            <tbody>
    <?php
    $i = 1;
    $total_subTotal = 0;
    $total_totalDisAmount = 0;
    $total_totalAmount = 0;  // Cumulative balance
    $total_paidAmount = 0;  // Cumulative balance
    $total_dueAmount = 0;  // Cumulative balance

    if(isset($allPdt)){
        foreach($allPdt as $pdt){
            // Update total debit and total credit
            $total_subTotal += $pdt->credit;
            $total_totalDisAmount+= $pdt->totalDisAmount;
            $total_totalAmount += $pdt->totalAmount;
            $total_paidAmount+= $pdt->paidAmount;
            $total_dueAmount+= $pdt->dueAmount;
            // Update the balance (cumulative)
         
    ?>
    <tr>
        <td><?php echo $i; $i++; ?></td>
        <td><?php echo $pdt->invoiceNumber; ?></td>
        <td><?php echo date("d-m-Y",$pdt->	transaction_date); ?></td>
        <td><?php echo number_format($pdt->credit, 2); ?></td>

       
      
    </tr>
    <?php
        }
    }
    ?>
    <!-- Display total debit and credit -->
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong><?php echo number_format($total_subTotal, 2); ?></strong></td>
     
    </tr>
</tbody>
        </table>
        <div class="footer">
            Design and developed by: Master IT.
        </div>
    </div>
</body>
</html>
