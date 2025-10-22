<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Receipt</title>
    <style>
        @page {
     size: A4 portrait;
      margin:0mm 40mm;
    }
        body {
            font-family: Arial, sans-serif;
            width: 14.8cm;
            height: 21cm;
            margin: 0 auto;
            padding: 1cm;
            font-size: 12pt;
            background: #fff;
            position: relative;
        }
     .header {
      text-align: center;
      padding: 0;
      margin-bottom: 8px;
      position: relative;
    }

    .header h2 {
      margin: 0;
      font-size: 35px;
      font-weight: bold;
    }

    .header p {
      margin: 1px 0;
      font-size: 16px;
    }

    .header h3 {
      margin-top: 4px;
      font-size: 18px;
      font-weight: bold;
      text-decoration: underline;
    }
    
     .logo-left,
    .logo-right {
      position: absolute;
      top: 0;
      width: 90px;
      height: 90px;
    }

    .logo-left {
      left: 0;
    }

    .logo-right {
      right: 0;
    }
        .receipt-title {
            font-size: 13pt;
            text-align: center;
            margin: 10px 0;
            padding: 3px;
            border: 1px solid #000;
            background-color: #f0f0f0;
        }
        .patient-info, .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .patient-info td, .items-table td, .items-table th {
            border: 1px solid #000;
            padding: 3px;
        }
        .summary-table{
             width: 50%;
             float:right;
           
        }
        
        .summary-table td{
              border: 1px solid #000;
            padding: 3px;
        }
        .patient-info .label {
            background-color: #f0f0f0;
            width: 25%;
        }
        
        .patient-info .data {
            width: 55%; 
        }
        .items-table th {
            background-color: #f0f0f0;
        }
        .items-table .sl {
            width: 5%;
            text-align: center;
        }
        .items-table .description {
            width: 65%;
        }
        .items-table .amount {
            width: 30%;
            text-align: right;
        }
        .summary-table .label {
            background-color: #f0f0f0;
            width: 70%;
            text-align: right;
        }
        .summary-table .value {
            text-align: right;
        }
        .inwords {
            font-style: italic;
            padding: 5px;
            border: 1px dashed #000;
            margin-top: 155px;
        }
        .signature-area {
            margin-top: 20px;
        }
        .signature-space {
            width: 120px;
            border-top: 1px solid #000;
            margin: 0 auto;
        }
        .footer {
            text-align: center;
            font-size: 7pt;
            border-top: 1px solid #000;
            margin-top: 10px;
            padding-top: 5px;
        }
        .watermark {
            position: absolute;
            opacity: 0.1;
            font-size: 40pt;
            color: #000;
            transform: rotate(-45deg);
            top: 58%;
            left: 20%;
            z-index: -1;
        }
        .print-button {
            display: none;
        }
        @media screen {
            .print-button {
                display: block;
                text-align: center;
                margin-bottom: 10px;
            }
            .print-button .btn {
                padding: 10px 15px;
                margin: 0 5px;
                font-size: 8pt;
                text-decoration: none;
                border: none;
                border-radius: 4px;
                color: white;
                cursor: pointer;
            }
            .btn-print { background-color: green; }
            .btn-back { background-color: orange; }
            .btn-consent { background-color: #e91e63; }
            .btn-surgery { background-color: #3f51b5; }
        }
    </style>
</head>
<body>

<div class="print-button">
    <a class="btn btn-back" href="<?php echo base_url().'patient/create'; ?>">Back</a>
    <button class="btn btn-print" onclick="window.print()">Print Receipt</button>
    <a class="btn btn-surgery" href="<?php echo base_url().'billinfo/surgeryaplication/'.$id; ?>">Surgery Application</a>
    <a class="btn btn-consent" href="<?php echo base_url().'billinfo/surgicalinvoice/'.$id; ?>">Consent Letter</a>
</div>

<?php
$logo = $allSup['logo'];
if (isset($allPdt)) {
    foreach ($allPdt as $pdt) {
?>

<div class="header">
  <!-- Left Logo -->
  <div class="logo-left">
    <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" alt="Left Logo" class="logo-left">
  </div>

  <!-- Right Logo -->
  <div class="logo-right">
  <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" alt="Right Logo" class="logo-right">
  </div>

  <!-- Header Text -->
  <div class="header-text">
 <h2><?php echo $allSup['title'] ?></h2>
      <h2><?php echo $allSup['name'] ?></h2>
    <p><?= $allSup['address'] ?></p>
    <p>Phone: <?= $allSup['phone'] ?></p>
    <h3>Patient Registration Form</h3>
  </div>
</div>

<div class="receipt-title">Invoice: <?php echo $pdt->invoiceNumber; ?></div>

<table class="patient-info">
    <tr>
        <td class="label ">Patient Name:</td>
        <td class="data"><?php echo $pdt->name; ?></td> 
        <td class="label">Mobile No:</td>
        <td><?php echo $pdt->mobile_no; ?></td>
         
    </tr>
 
    <tr>
        <td class="label">Registration No:</td>
        <td><?php echo $pdt->registration_no; ?></td>
         <td class="label">Bill Date:</td>
        <td><?php echo date("d/m/Y", $pdt->invoice_date); ?></td>
    </tr>

</table>

<table class="items-table">
    <thead>
        <tr>
            <th class="sl">SL</th>
            <th class="description">Facial Name</th>
            <th class="amount">Regular Price (৳)</th>
            <th class="amount">Discount Price (৳)</th>
            <th class="amount">Price (৳)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if (isset($allDdt)) {
            foreach ($allDdt as $item) {
        ?>
        <tr>
            <td class="sl"><?php echo $i++; ?></td>
            <td class="description"><?php echo $item->name; ?></td>
            <td class="description"><?php if($item->discount_type  == 'Percentage'){echo  $item->discount_percentage." ( ".$item->discount_type. ")";  }else  if($item->discount_type  == ''){echo  $item->regular_price;  }?></td>
            <td class="amount"><?php echo $item->discount_type; ?></td>
            <td class="amount"><?php echo $item->offer_price; ?></td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<div class="watermark"><?php echo $pdt->isPaid; ?></div>

<table class="summary-table">
    <tr>
        <td class="label">Sub Total:</td>
        <td class="value"><?php echo $pdt->subTotal; ?></td>
    </tr>
    <tr>
        <td class="label">Discount:</td>
        <td class="value"><?php echo $pdt->totalDisAmount; ?></td>
    </tr>
    <tr>
        <td class="label">Grand Total:</td>
        <td class="value"><?php echo $pdt->totalAmount; ?></td>
    </tr>
    <tr>
        <td class="label">Paid Amount:</td>
        <td class="value"><?php echo $pdt->paidAmount; ?></td>
    </tr>
    <tr>
        <td class="label">Due:</td>
        <td class="value"><?php echo $pdt->dueAmount; ?></td>
    </tr>
</table>

<div class="inwords">
    <strong>In words:</strong>
    <?php
        $words = number_to_words($pdt->totalAmount);
        echo $words;
    ?> Only.
</div>

<div class="signature-area">
    <div class="signature-space"></div>
</div>

<div class="footer">
    আমাদের সাথে থাকার জন্য আপনাকে ধন্যবাদ। আপনার দ্রুত আরোগ্য কামনা করছি।<br>
    Software Developed By: <b>Master IT</b>
</div>

<?php
    }
}
?>

<script>
    // Auto close after print (optional)
    if (window.location.search.indexOf('print') === -1) {
        window.addEventListener('afterprint', function () {
            window.close();
        });
    }
</script>

</body>
</html>
