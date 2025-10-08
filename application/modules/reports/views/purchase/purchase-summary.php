<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Reports</title>
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
            <h2>Purchase Reports</h2>
            <p><strong>From:</strong> <?php echo $from_date; ?> <strong>To:</strong> <?php echo $to_date; ?></p>
            <div class="date">Print Date: <?php echo date('Y-m-d H:i:s');  // Format: YYYY-MM-DD HH:MM:SS
?></div>
        </div>
  
        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Invoice</th>
                    <th>Name</th>
                    <th>Total Amount</th>
                    <th>Discount Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Payment Type</th>
                    <th>Purchase Date</th>
                   
                </tr>
            </thead>
            <tbody>
    <?php
    $i = 1;
    $total_grand_total = 0;
    $total_discountAmount = 0;
    $total_total_paidAmount = 0;  // Cumulative balance
    $total_dueAmount = 0;  // Cumulative balance

    if(isset($allPdt)){
        foreach($allPdt as $pdt){
            // Update total debit and total credit
            $total_grand_total += $pdt->totalAmount;
            $total_discountAmount+= $pdt->discountAmount;
            $total_total_paidAmount += $pdt->paidAmount;
            $total_dueAmount+= $pdt->dueAmount;
            // Update the balance (cumulative)
         
    ?>
    <tr>
        <td><?php echo $i; $i++; ?></td>
        <td><?php echo $pdt->invoiceNumber; ?></td>
        <td><?php echo $pdt->name." ".$pdt->contact_no; ?></td>
        <td><?php echo number_format($pdt->totalAmount, 2); ?></td>
        <td><?php echo number_format($pdt->discountAmount, 2); ?></td>
        <td><?php echo number_format($pdt->paidAmount, 2); ?></td>
        <td><?php echo number_format($pdt->dueAmount, 2); ?></td>
        
        <td><?php echo $pdt->paymentType; ?></td>
        <td><?php echo date("d-m-Y",$pdt->saleDate); ?></td>
       
      
    </tr>
    <?php
        }
    }
    ?>
    <!-- Display total debit and credit -->
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong><?php echo number_format($total_grand_total, 2); ?></strong></td>
        <td><strong><?php echo number_format($total_discountAmount, 2); ?></strong></td>
        <td><strong><?php echo number_format($total_total_paidAmount, 2); ?></strong></td>
        <td><strong><?php echo number_format($total_dueAmount, 2); ?></strong></td>
    </tr>
</tbody>
        </table>
        <div class="footer">
            Design and developed by: Master IT.
        </div>
    </div>
</body>
</html>
