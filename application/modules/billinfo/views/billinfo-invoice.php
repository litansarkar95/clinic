<?php
// assume $cart_items, $customer, $billing_summary available
$total_original = 0;
$total_offer = 0;

foreach ($cart_items as $item) {
    $total_original += $item['original_price'];
    $total_offer += $item['price'];
}

$discount = $total_original - $total_offer;
$adjustment = $billing_summary['adjustment'] ?? 0;
$grand_total = $total_offer + $adjustment;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice #<?= $billing_summary['id'] ?? '0001' ?></title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: center; }
        th { background: #f7f7f7; }
        tfoot td { font-weight: bold; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .discount { color: red; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>Invoice</h1>
        <p><strong>Invoice ID:</strong> <?= $billing_summary['invoice_no'] ?? '0001' ?></p>
        <p><strong>Date:</strong> <?= date('d-m-Y H:i', strtotime($billing_summary['invoice_date'] ?? date('Y-m-d H:i'))) ?></p>
        <p><strong>Customer:</strong> <?= $customer['name'] ?? 'Walk-in' ?> (<?= $customer['mobile_no'] ?? '' ?>)</p>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-left"> Name</th>
                    <th>Original Price (৳)</th>
                    <th>Offer Price (৳)</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($cart_items as $item): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-left"><?= $item['product_name'] ?></td>
                    <td>৳<?= number_format($item['original_price'],2) ?></td>
                    <td>৳<?= number_format($item['price'],2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right">Subtotal (Original)</td>
                    <td>৳<?= number_format($total_original,2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right discount">Discount</td>
                    <td class="discount">৳<?= number_format($discount,2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Adjustment (+/-)</td>
                    <td>৳<?= number_format($adjustment,2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Grand Total</td>
                    <td>৳<?= number_format($grand_total,2) ?></td>
                </tr>
            </tfoot>
        </table>

        <h3>Payment Methods</h3>
        <table>
            <thead>
                <tr>
                    <th>Method</th>
                    <th>Amount (৳)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billing_payments as $pay): ?>
                <tr>
                    <td><?= $pay['method_name'] ?></td>
                    <td>৳<?= number_format($pay['amount'],2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p style="text-align:center; margin-top:20px;">Thank you for your Facials !</p>
    </div>
</body>
</html>
