<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Operation Reports</title>
  <style>
    @page {
      size: A4 landscape;
      margin: 10mm;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      font-size: 10pt;
    }

    .container {
      width: 100%;
      margin: auto;
      padding: 15px;
      background: white;
    }

    .print-button {
      margin-bottom: 10px;
    }

    .print-button button {
      padding: 8px 16px;
      font-size: 14px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .header {
      text-align: center;
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 5px;
    }

    .header h1 {
      font-size: 20pt;
      margin: 5px 0;
    }

    .header h2 {
      font-size: 14pt;
      margin: 5px 0;
    }

    .header .date {
      text-align: right;
      font-size: 9pt;
      margin-top: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      font-size: 8pt;
    }

    th, td {
      border: 1px solid #000;
      padding: 4px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .footer {
      text-align: center;
      font-size: 9pt;
      margin-top: 15px;
      padding-top: 8px;
      border-top: 1px solid black;
    }

    @media print {
      .print-button {
        display: none;
      }

      body {
        font-size: 8pt;
      }

      .container {
        border: none;
        margin: 0;
        padding: 0;
      }

      th, td {
        font-size: 7pt;
        padding: 3px;
      }

      .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: white;
        border-top: 1px solid black;
        padding: 5px 0;
      }
    }
  </style>
</head>
<?php $com =  $this->main_model->InvoiceHeader(); ?>
<body>
  <div class="container">

    <!-- Print Button -->
    <div class="print-button">
      <button onclick="window.print()">🖨️ Print</button>
    </div>

    <!-- Header -->
    <div class="header">
      <h1><?php echo $com['name']; ?></h1>
      <h2>Operation Reports</h2>
      <p><strong>From:</strong> <?php echo $from_date; ?> &nbsp;&nbsp; <strong>To:</strong> <?php echo $to_date; ?></p>
      <div class="date">Print Date: <?php echo date('d-m-Y H:i:s'); ?></div>
    </div>

    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>SL</th>
          <th>Reg. Date</th>
          <th>Serial</th>
          <th>Reg. No</th>
          <th>Name</th>
          <th>Father/Husband</th>
          <th>Mobile</th>
          <th>Gender</th>
          <th>Age</th>
          <th>District</th>
          <th>Upazilla</th>
          <th>Village</th>
          <th>Occupation</th>
          <th>Religion</th>
          <th>Nationality</th>
          <th>Doctor</th>
          <th>Adult/Child</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        $total_count = 0;

        if (isset($allPdt)) {
          foreach ($allPdt as $pdt) {
            $total_count++;
        ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo date("d-m-Y", $pdt->registration_date); ?></td>
              <td><?php echo $pdt->serial_no; ?></td>
              <td><?php echo $pdt->registration_no; ?></td>
              <td><?php echo $pdt->name; ?></td>
              <td><?php echo $pdt->father_husband_name; ?></td>
              <td><?php echo $pdt->mobile_no; ?></td>
              <td><?php echo $pdt->gender; ?></td>
              <td><?php echo $pdt->age; ?></td>
              <td><?php echo $pdt->district; ?></td>
              <td><?php echo $pdt->upazilla; ?></td>
              <td><?php echo $pdt->village; ?></td>
              <td><?php echo $pdt->occupation; ?></td>
              <td><?php echo $pdt->religion; ?></td>
              <td><?php echo $pdt->nationality; ?></td>
              <td><?php echo $pdt->doctor_name; ?></td>
              <td><?php echo $pdt->adult_child; ?></td>
            </tr>
        <?php
          }
        }
        ?>
        <tr>
          <td colspan="13" style="text-align: right;"><strong>Total Records:</strong></td>
          <td colspan="4" style="text-align: left;"><strong><?php echo $total_count; ?></strong></td>
        </tr>
      </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
      Design and developed by: <strong>Master IT</strong>
    </div>
  </div>
</body>
</html>
