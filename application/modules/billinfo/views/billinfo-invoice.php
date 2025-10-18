<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Receipt</title>
    <style>
        @page {
            size: A5;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            width: 14.8cm;
            height: 21cm;
            margin: 0 auto;
            padding: 1cm;
            font-size: 8pt;
            background: #fff;
            position: relative;
        }
        .logo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .logo-header img {
            height: 80px;
        }
        .hospital-info {
            text-align: center;
            flex-grow: 1;
        }
        .hospital-name {
            font-size: 14pt;
            font-weight: bold;
        }
        .hospital-address,
        .hospital-contact {
            font-size: 8pt;
        }
        .receipt-title {
            font-size: 13pt;
            text-align: center;
            margin: 10px 0;
            padding: 3px;
            border: 1px solid #000;
            background-color: #f0f0f0;
        }
        .patient-info, .items-table, .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .patient-info td, .items-table td, .items-table th, .summary-table td {
            border: 1px solid #000;
            padding: 3px;
        }
        .patient-info .label {
            background-color: #f0f0f0;
            width: 20%;
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
            margin-top: 5px;
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
            font-size: 50pt;
            color: #000;
            transform: rotate(-45deg);
            top: 40%;
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

<div class="logo-header">
    <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" alt="Logo Left">
    <div class="hospital-info">
        <div class="hospital-name"><?php echo $allSup['title']; ?></div>
        <div class="hospital-name"><?php echo $allSup['name']; ?></div>
        <div class="hospital-address"><?php echo $allSup['address']; ?></div>
        <div class="hospital-contact">Mobile: <?php echo $allSup['phone']; ?></div>
    </div>
    <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" alt="Logo Right">
</div>

<div class="receipt-title">Invoice: <?php echo $pdt->invoiceNumber; ?></div>

<table class="patient-info">
    <tr>
        <td class="label">Patient Name:</td>
        <td><?php echo $pdt->name; ?></td>
        <td class="label">Age:</td>
        <td><?php echo $pdt->age." ".$pdt->adult_child; ?></td>
    </tr>
    <tr>
        <td class="label">Sex:</td>
        <td><?php echo $pdt->gender; ?></td>
        <td class="label">Bill Date:</td>
        <td><?php echo date("d F, Y", $pdt->invoice_date); ?></td>
    </tr>
    <tr>
        <td class="label">Registration No:</td>
        <td><?php echo $pdt->registration_no; ?></td>
        <td class="label">Mobile No:</td>
        <td><?php echo $pdt->mobile_no; ?></td>
    </tr>
    <tr>
        <td class="label">Ref. Doctor:</td>
        <td colspan="3">
            
            <?php
            if($pdt->is_surgery == 1){
           echo $surgery->doctor_name." - ".$surgery->doctor_degree;

            }else{
            ?>
            <?php echo $pdt->doctors_name." - ".$pdt->degree; ?>
        <?php
            }
        ?>
        
        </td>
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
        $i = 1;
        if (isset($allDdt)) {
            foreach ($allDdt as $item) {
        ?>
        <tr>
            <td class="sl"><?php echo $i++; ?></td>
            <td class="description"><?php echo $item->name; ?></td>
            <td class="amount"><?php echo $item->price; ?></td>
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
