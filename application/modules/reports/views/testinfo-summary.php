<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Test Summary</title>
<style>
  @media print {
    .no-print {
      display: none;
    }
    body {
      margin: 0;
    }
  }

  body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 40px;
    background: #f8fafc;
    color: #000;
  }

  .container {
    background: #fff;
    padding: 30px;
    border: 1px solid #ddd;
    max-width: 800px;
    margin: auto;
  }

  .header {
    text-align: center;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
  }

  .header h2 {
    margin: 0;
    font-size: 22px;
  }

  .header p {
    margin: 3px 0;
    font-size: 14px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
  }

  th, td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
    font-size: 14px;
  }

  th {
    background-color: #e2e8f0;
  }

  .section-title {
    background: #f1f5f9;
    padding: 6px 10px;
    font-weight: bold;
    border: 1px solid #000;
    margin-top: 15px;
  }

  .total {
    text-align: right;
    padding: 10px 0;
    font-size: 15px;
    font-weight: bold;
  }

  .signature {
    text-align: right;
    margin-top: 60px;
    font-size: 14px;
  }

  .print-btn {
    background: #0f172a;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 5px;
    float: right;
  }

  .print-btn:hover {
    background: #1e293b;
  }

</style>
</head>



<body>
  <button class="print-btn no-print" onclick="window.print()">🖨 Print</button>
<div class="container">


  <div class="header">
    <h2><?php echo $allSup['name'] ?></h2>
    <p><?php echo $allSup['address'] ?></p>
    <p><?php echo $allSup['phone'] ?></p>
    <h3 style="margin-top:10px;">Test Summary</h3>
   <p><strong>From:</strong> <?= $from_date ?> &nbsp; <strong>To:</strong> <?= $to_date ?></p>
  </div>

  <?php
  $grand_total = 0;
  foreach ($bill_summary as $bill) { ?>
        <div class="section-title"><?= $bill->category_name ?></div>
        <table>
            <thead>
                <tr>
                    <th>Test Name</th>
                    <th>Quantity</th>
                    <th>Price (Tk)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $subtotal = 0;
                foreach ($testinfo_summary as $item){
                    if($item->cid == $bill->cid){
                    
                ?>
                    <tr>
                        <td><?= $item->test_name ?></td>
                        <td><?= $item->total_count ?></td>
                        <td><?= number_format($item->total_test_fee, 2) ?></td>
                    </tr>
                <?php 
                 $subtotal += $item->total_test_fee;
              } 
                }
                ?>
            </tbody>
        </table>
        <div class="total">Sub Total : Tk. <?= number_format( $bill->total_test_fee, 2) ?></div>
          <?php $grand_total += $subtotal; // Now correctly add subtotal to grand_total ?>
    <?php } ?>
 

    <div class="total grand-total">Grand Total: Tk. <?= number_format($grand_total , 2) ?></div>


  <div class="signature">
    <p>__________________________</p>
    <p>Authorized Signature</p>
  </div>
</div>


</body>
</html>
