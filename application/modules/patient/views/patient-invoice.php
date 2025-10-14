<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Registration Form - A5</title>
<style>
  body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    background: #f5f6f8;
  }
.btn {
  background: green;
  color: white;
  padding: 10px 15px;
  border: 1px solid #ccc;
  text-decoration: none;
  border-radius: 4px;
  font-weight: bold;
}


  .print-btn  , .btn{
    text-align: center;
    margin: 20px 0;
  }

  .print-btn button  {
    background: #0078d7;
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 5px;
    font-size: 15px;
    cursor: pointer;
  }

  .print-btn button:hover {
    background: #005bb5;
  }

  .form-container {
    background: #fff;
    border: 1px solid #000;
    padding: 18px 22px;
    width: 148mm; /* A5 size */
    height: 210mm;
    margin: auto;
    box-sizing: border-box;
  }

  .header {
    text-align: center;
    border-bottom: 1px solid #000;
    padding-bottom: 6px;
    margin-bottom: 12px;
  }

  .header h2 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 0.5px;
  }

  .header p {
    margin: 2px 0;
    font-size: 13px;
  }

  .header h3 {
    margin-top: 5px;
    font-size: 15px;
    font-weight: bold;
    text-decoration: underline;
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

  /* Box style for data fields */
  .box {
    display: inline-block;
    border: 1px solid #000;
    padding: 2px 8px;
    min-width: 60px;
    font-weight: 600;
    letter-spacing: 0.5px;
    background: #fcfcfc;
  }

  .divider {
    height: 1px;
    background: #000;
    margin: 12px 0;
  }

  table.fee-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 5px;
  }

  .fee-table th, .fee-table td {
    border: 1px solid #000;
    padding: 5px;
    font-size: 13px;
  }

  .fee-table th {
    background: #e9ecef;
    text-align: left;
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

  /* PRINT SETTINGS */
  @page {
    size: A5 portrait;
    margin: 10mm;
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
      border: 1px solid #000;
      width: 100%;
      height: auto;
      margin: 0;
      padding: 10mm;
    }
  }
</style>
</head>
<body>

<div class="print-btn">
  <button onclick="window.print()">🖨️ Print / Save as PDF (A5)</button>
  <a class="btn" href="<?php echo base_url()."patient/registrationinvoice/$id"?>">Consent Letter </a>
</div>

<div class="form-container">
  <div class="header">
    <h2><?php echo $allSup['name'] ?></h2>
    <p><?php echo $allSup['address'] ?></p>
    <p>Phone: <?php echo $allSup['phone'] ?></p>
    <h3>Patient Registration Form</h3>
  </div>

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

  <table class="fee-table">
    <thead>
      <tr>
        <th>Description</th>
        <th style="width: 90px;">Tk.</th>
      </tr>
    </thead>
    <tbody>
       <tbody id="">
                   <?php
                                                        if(isset($allTest)){
                                        foreach ($allTest as $test){
                                        
                                            ?>
                                                    <tr>
                                                     <td id=""><?php echo $test->tname; ?></td>
                                                         <td id=""><?php echo $test->price; ?></td>
                                        </tr>
                                                        <?php
                                        }
                                    }
                                                        ?>
    </tbody>
  </table>

  <div class="footer">
    <div>Date: <span class="box" style="width:200px;"><?= date("d/m/Y h:i:s A", $patient->create_date); ?></span></div>
    <div class="token">Token: <span class="box"><?= $patient->serial_no; ?></span></div>
  </div>
</div>

</body>
</html>
