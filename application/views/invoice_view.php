<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #<?= $invoice_id ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 400px;
            margin: 40px auto;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .barcode {
            text-align: center;
            margin-top: 20px;
        }
        .barcode img {
            width: 80%;
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <h2>Invoice #<?= $invoice_id ?></h2>
    <p><strong>Date:</strong> <?= date('d M, Y') ?></p>
    <p><strong>Customer:</strong> Rahim Uddin</p>
    <p><strong>Total:</strong> ৳1200.00</p>

    <div class="barcode">
        <img src="<?= $barcode_image ?>" alt="Barcode">
        <p><?= $invoice_id ?></p>
    </div>

    <button onclick="window.print()">Print Invoice</button>
</div>

</body>
</html>
