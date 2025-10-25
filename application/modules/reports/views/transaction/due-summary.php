<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Transaction Report</title>
<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; margin: 0; }
    .container { width: 90%; margin: 30px auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; color: #2c3e50; }
    form { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin-bottom: 20px; }
    input, select, button { padding: 8px 10px; border-radius: 5px; border: 1px solid #ccc; }
    button { background: #28a745; color: #fff; cursor: pointer; transition: 0.3s; }
    button:hover { background: #218838; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    th { background: #e9ecef; }
    tr:nth-child(even) { background: #f9f9f9; }
    .total-row { font-weight: bold; background: #d1e7dd; }
    .summary-box { margin-top: 25px; border: 1px solid #ccc; padding: 15px; border-radius: 8px; background: #f8f9fa; }
    .summary-box h4 { margin-bottom: 10px; }
    .print-btn { float: right; background: #007bff; color: white; padding: 6px 15px; border: none; border-radius: 5px; cursor: pointer; }
    .print-btn:hover { background: #0056b3; }
    @media print {
        form, .print-btn { display: none; }
        body { background: white; }
        .container { box-shadow: none; border: none; }
    }
</style>
</head>
<body>
<div class="container">
    <button class="print-btn" onclick="window.print()">🖨️ Print</button>
    <h2>Payment Transaction Report</h2>

   
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Invoice No</th>
                <th>Customer</th>
                <th>Bill Date</th>
                <th>Subtotal</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Payment Method(s)</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        $total_sub = $total_discount = $total_total = $total_paid = $total_due = 0;
        if (!empty($allPdt)) {
            foreach ($allPdt as $row) {
                $total_sub += $row->original_price ?? 0;
                $total_discount += $row->original_price-$row->subtotal ?? 0;
                $total_total += $row->subtotal ?? 0;
        ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->invoice_no; ?></td>
                <td><?= $row->registration_no . ' - ' . $row->name; ?></td>
                <td><?= date('d-m-Y', strtotime($row->invoice_date)); ?></td>
                <td>৳<?= number_format($row->original_price, 2); ?></td>
                <td>৳<?= number_format($row->original_price-$row->subtotal, 2); ?></td>
                <td>৳<?= number_format($row->subtotal, 2); ?></td>
                <td><?= $row->payment_details ?? '—'; ?></td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="10" style="color:red;">No transactions found!</td></tr>
        <?php } ?>
        </tbody>

        <!-- 🧮 Totals -->
        <tfoot>
            <tr class="total-row">
                <td colspan="4">Total</td>
                <td>৳<?= number_format($total_sub, 2); ?></td>
                <td>৳<?= number_format($total_discount, 2); ?></td>
                <td>৳<?= number_format($total_total, 2); ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <!-- 📦 Payment Summary -->
    <?php if (!empty($payment_summary)) { ?>
    <div class="summary-box">
        <h4>💰 Payment Summary by Method</h4>
        <table style="width:50%; margin:auto;">
            <tr><th>Method</th><th>Amount (৳)</th></tr>
            <?php foreach ($payment_summary as $sum) { ?>
                <tr>
                    <td><?= $sum->method_name; ?></td>
                    <td>৳<?= number_format($sum->total_amount, 2); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
</div>
</body>
</html>
