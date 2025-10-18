<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Registration Form - A5</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      margin: 0;
      background: white;
    }

    .form-container {
      width: 148mm; /* A5 width */
      height: 210mm; /* A5 height */
      margin: 0 auto;
      padding: 10mm;
      box-sizing: border-box;
      position: relative;
    }

    .print-btn {
      text-align: center;
      margin: 20px 0;
    }

    .print-btn button, .btn {
      background: green;
      color: white;
      padding: 10px 15px;
      border: 1px solid #ccc;
      text-decoration: none;
      border-radius: 4px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-back {
      background: orange;
    }

    .header {
      text-align: center;
      padding: 0;
      margin-bottom: 8px;
      position: relative;
    }

    .header h2 {
      margin: 0;
      font-size: 20px;
      font-weight: bold;
    }

    .header p {
      margin: 2px 0;
      font-size: 13px;
    }

    .header h3 {
      margin-top: 4px;
      font-size: 15px;
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

    .info-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
    }

    .info-table td {
      font-size: 13px;
      padding: 3px 4px;
      vertical-align: top;
    }

    .info-table td.label {
      width: 130px;
      font-weight: bold;
    }

    .box {
      display: inline-block;
      border: 1px solid #000;
      padding: 2px 8px;
      min-width: 60px;
      font-weight: 600;
      background: #fcfcfc;
    }

    .divider {
      height: 1px;
      background: #000;
      margin: 12px 0;
    }

    .fee-table {
      width: 100%;
      border-collapse: collapse;
    }

    .fee-table th,
    .fee-table td {
      border: 1px solid #000;
      padding: 5px;
      font-size: 13px;
    }

    .fee-table th {
      background: #e9ecef;
    }

    .footer {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      font-weight: bold;
    }

    .token {
      font-size: 15px;
    }

 @page {
      size: A4 portrait;
      margin: 0;
    }
    @media print {
      body {
        background: white;
        margin: 0;
      }

      .print-btn {
        display: none;
      }

      .form-container {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 10mm;
        box-sizing: border-box;
        border: none;
      }
    }
  </style>
</head>
<body onload="window.print()">

<!-- Print buttons (only visible on screen) -->
<div class="print-btn">
  <a class="btn btn-back" href="<?php echo base_url()."patient/create"?>">Back</a>
  <button onclick="window.print()">🖨️ Print Invoice</button>
  <a class="btn" href="<?php echo base_url()."patient/registrationinvoice/$id"?>">Consent Letter</a>
</div>

<!-- Form container -->
<div class="form-container">
  <!-- Logos -->
 


  <!-- Header -->
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


  <!-- Patient Info -->
  <table class="info-table">
    <tr>
      <td class="label">Patient ID:</td>
      <td><span class="box">P-<?= $patient->registration_int_no; ?></span></td>
      <td class="label">Age:</td>
      <td><span class="box"><?= $patient->age; ?></span></td>
    </tr>
    <tr>
      <td class="label">Patient Name:</td>
      <td><span class="box"><?= $patient->name; ?></span></td>
      <td class="label">Sex:</td>
      <td><span class="box"><?= $patient->gender; ?></span></td>
    </tr>
    <tr>
      <td class="label">Father/Hus. Name:</td>
      <td><span class="box"><?= $patient->father_husband_name; ?></span></td>
      <td class="label">Mobile No:</td>
      <td><span class="box"><?= $patient->mobile_no; ?></span></td>
    </tr>
    <tr>
      <td class="label">Address:</td>
      <td colspan="3"><span class="box" style="min-width: 350px;"><?= $patient->village; ?>, <?= $patient->upazilla; ?> , <?= $patient->districts; ?> </span></td>
    </tr>
    <tr>
      <td class="label">Consultant:</td>
      <td colspan="3"><span class="box" style="min-width: 350px;"><?= $patient->doctor; ?></span></td>
    </tr>
    <tr>
      <td class="label">Registration Date:</td>
      <td colspan="3"><span class="box"><?= date("d/m/Y",$patient->registration_date); ?></span></td>
    </tr>
  </table>

  <div class="divider"></div>

  <!-- Fee Table -->
  <table class="fee-table">
    <thead>
      <tr>
        <th>Description</th>
        <th style="width: 90px;">Tk.</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($allTest)) {
        foreach ($allTest as $test) { ?>
          <tr>
            <td><?= $test->tname; ?></td>
            <td><?= $test->price; ?></td>
          </tr>
        <?php }
      } ?>
    </tbody>
  </table>

  <!-- Footer -->
  <div class="footer">
    <div>Date: <span class="box" style="width:200px;"><?= date("d/m/Y h:i:s A", $patient->create_date); ?></span></div>
    <div class="token">Token: <span class="box"><?= $patient->serial_no; ?></span></div>
  </div>
</div>

</body>
</html>
