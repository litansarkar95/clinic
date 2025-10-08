<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hospital Receipt</title>
    <style type="text/css">

        @page {
            size: A5;
            margin: 0;
			
        }
        body {
            font-family: Arial, sans-serif;
            width: 14.8cm; /* A5 width */
            height: 21cm; /* A5 height */
            margin: 0 auto;
            padding: 0.5cm; /* Reduced padding for A5 */
            color: #000;
            background: #fff;
            font-size: 8pt; /* Reduced font size for A5 */
            position: relative; /* Required for absolute positioning of the watermark */
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #000;
        }
        .hospital-name {
            font-size: 16pt; /* Reduced font size */
           
            margin-bottom: 3px;
        }
        .hospital-address {
            font-size: 8pt;
            margin-bottom: 3px;
        }
        .hospital-contact {
            font-size: 8pt;
        }
        .receipt-title {
            font-size: 15pt; /* Reduced font size */
           
            text-align: center;
            margin: 10px 0;
            padding: 3px;
            border: 1px solid #000;
            background-color: #f0f0f0;
        }
        .patient-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .patient-info td {
            padding: 3px; /* Reduced padding */
            border: 1px solid #000;
        }
        .patient-info .label {
           
            width: 20%;
            background-color: #f0f0f0;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .items-table th {
            background-color: #f0f0f0;
           
            padding: 3px; /* Reduced padding */
            border: 1px solid #000;
            text-align: center;
        }
        .items-table td {
            padding: 3px; /* Reduced padding */
            border: 1px solid #000;
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
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .summary-table td {
            padding: 3px; /* Reduced padding */
            border: 1px solid #000;
        }
        .summary-table .label {
           
            width: 70%;
            text-align: right;
            background-color: #f0f0f0;
        }
        .summary-table .value {
            width: 30%;
            text-align: right;
           
        }
        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 7pt; /* Reduced font size */
            border-top: 1px solid #000;
            padding-top: 5px;
        }
        .watermark {
            position: absolute;
            opacity: 0.2; /* Slightly transparent */
            font-size: 40pt; /* Adjusted for A5 size */
           
            color: #000;
            transform: translate(0, -50%) rotate(-45deg); /* Adjusted to left side and rotated */
            left: 20%; /* Positioned to the left */
            top: 45%; /* Center vertically */
            z-index: -1; /* Ensure it stays in the background */
            pointer-events: none; /* Prevents interaction with the watermark */
            white-space: nowrap;
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
            .print-button button {
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 8pt; /* Reduced font size */
            }
        }
        .inwords {
            font-style: italic;
            margin-top: 5px;
            padding: 3px;
            border: 1px dashed #000;
        }
        .signature-area {
            margin-top: 15px;
            width: 100%;
            text-align: left;
        }
		.signature-area p{
			  text-align: center;
		}
        .signature-line {
            display: inline-block;
            margin: 0 20px;
            text-align: left;
        }
        .signature-name {
           
            margin-top: 5px;
        }
        .signature-space {
            border-top: 1px solid #000;
            width: 100px;
            display: block;
            margin: 0 auto;
        }
        .content-wrapper {
            display: flex;
            justify-content: space-between;
        }
        .watermark-container {
            width: 70%;
        }
        .summary-container {
            width: 65%;
        }
    </style>
</head>
<body>
  
    <div class="print-button">
        <button onclick="window.print()">Print Receipt</button>
    </div>
<?php

$logo =  $allSup['logo'];
?>
    
      <div class="header">
    <div style="display: flex; align-items: center; justify-content: flex-start;">
        <div style="flex-shrink: 0;">
            <img src="<?php echo base_url()."assets/images/$logo"?>" alt="Hospital Logo" style="height: 50px; margin-right: 80px;">
        </div>
        <div>
            <div class="hospital-name"><?php echo $allSup['name'] ?></div>
            <div class="hospital-address"><?php echo $allSup['address'] ?></div>
            <div class="hospital-contact">Mobile: <?php echo $allSup['phone'] ?></div>
        </div>
    </div>
</div>
<?php
    if(isset($allPdt)){
        foreach($allPdt as $pdt){
    
    ?>
    <div class="receipt-title">Invoice: <?php echo $pdt->invoiceNumber; ?></div>
    
    <table class="patient-info">
        <tr>
            <td class="label">Patient Name:</td>
            <td><?php echo $pdt->pat_name; ?></td>
            <td class="label">Age:</td>
            <td><?php echo $pdt->pat_age." ".$pdt->pat_age_type; ?></td>
        </tr>
        <tr>
            <td class="label">Sex:</td>
            <td><?php echo $pdt->pat_sex; ?></td>
            <td class="label">Bill Date:</td>
            <td><?php echo date("d F, Y",$pdt->invoice_date); ?></td>
        </tr>
        <tr>
            <td class="label">Address:</td>
            <td><?php echo $pdt->pat_address; ?></td>
            <td class="label">Mobile No:</td>
            <td><?php echo $pdt->pat_mobile; ?></td>
        </tr>
        <tr>
            <td class="label">Ref. Doctor:</td>
            <td colspan="3"><?php echo $pdt->name." - ".$pdt->degree; ?></td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th class="sl">SL</th>
                <th class="description">Particulars</th>
                <th class="amount">Amount (৳)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i =1;
            if(isset($allDdt)){
                foreach($allDdt as $del){
            
            ?>
            <tr>
                <td class="sl"><?php echo $i; $i++; ?></td>
                <td class="description"><?php echo $del->name; ?></td>
                <td class="amount"><?php echo $del->price; ?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    
    <div class="content-wrapper">
        <div class="watermark-container">
            <div class="watermark"><?php echo $pdt->isPaid; ?></div>
        </div>
        <div class="summary-container">
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
                <strong>In words:</strong> <?php
                    
                    $words = number_to_words($pdt->totalAmount  );
                    echo $words;
                    ?> Only.
            </div>
        </div>
    </div>
    
    <div class="signature-area">
        <div class="signature-line">
         <p> Farhad </p>
            <div class="signature-space"></div>
           <!-- <div class="signature-name">Entry by</div> -->
        </div>
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
        // Automatically trigger print when on screen and not in print preview
        if (window.location.search.indexOf('print') === -1 && window.location.href.indexOf('print') === -1) {
            window.addEventListener('afterprint', function() {
                window.close();
            });
        }
    </script>
</body>
</html>