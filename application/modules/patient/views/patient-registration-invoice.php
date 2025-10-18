<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consent Letter</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #fff;
    }

    .print-controls {
      text-align: center;
      margin: 20px 0;
    }

    .print-btn {
      display: inline-block;
      padding: 10px 20px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      font-size: 16px;
      margin: 0 5px;
    }

    .print-btn:hover {
      background: #0056b3;
    }

    .page {
      width: 210mm;
      min-height: 297mm;
      margin: auto;
      padding: 15mm;
      background: #fff;
      box-sizing: border-box;
      position: relative;

      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    header {
      text-align: center;
      border-bottom: 1px solid #000;
      /* padding-bottom: 5px;
      margin-bottom: 10px; */
    }

    .header-logos {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header-logos img {
      height: 100px;
      width: auto;
    }

    header h1 {
      font-size: 24px;
      margin: 0;
      font-weight: bold;
    }

    header h2 {
      font-size: 18px;
      margin: 0;
    }

    header p {
      font-size: 14px;
      margin: 5px 0;
      background: #000;
      color: #fff;
      padding: 2px 8px;
      border-radius: 3px;
      display: inline-block;
    }

    .info {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      /* margin: 5px 0; */
      padding: 10px;
      border: 1px solid #000;
      border-radius: 5px;
      background-color: #f9f9f9;
      flex-wrap: wrap;
    }

    .info div {
      margin: 4px 0;
      width: 48%;
    }

    .content {
      min-height: 300px;
      padding: 10px;
      font-size: 16px;
    }

    .eye-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .eye-table th, .eye-table td {
      border: 1px solid #000;
      padding: 6px;
      text-align: center;
      font-size: 14px;
    }

    .serial-info {
      border: 1px solid #000;
      width: 150px;
      padding: 10px;
      margin-top: 10px;
    }

    .signature {
      text-align: right;
      margin-top: 20px;
    }

    .signature span {
      border-top: 1px solid #000;
      padding-top: 5px;
      display: inline-block;
      width: 150px;
      text-align: center;
    }

    footer {
      border-top: 1px solid #000;
      text-align: center;
      font-size: 12px;
      line-height: 1.5;
      padding-top: 10px;
      margin-top: 20px;
    }

    footer strong {
      background: #000;
      color: #fff;
      padding: 2px 6px;
      border-radius: 2px;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {
      .print-controls {
        display: none;
      }

      body {
        margin: 0;
        padding: 0;
      }

      .page {
        padding: 10mm; /* ensure print safe zone */
        margin: 0;
        border: none;
        box-shadow: none;
        width: 100%;
      }

       .barcode-container {
    margin-top: 0;
  }
    }
  </style>
</head>
<body>

  <div class="print-controls">
    <a class="print-btn" href="<?php echo base_url()."patient/invoice/$id"?>">Back</a>
    <button class="print-btn" onclick="window.print()">🖨️ Print</button>
  </div>

  <div class="page">
    <header>
      <div class="header-logos">
        <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" alt="Left Logo">
        <div>
          <h1><?= $allSup['title'] ?></h1>
          <h1><?= $allSup['name'] ?></h1>
          <h2><?= $allSup['address'] ?></h2>
          <h2><?= $allSup['phone'] ?></h2>
          <p>বহিঃ বিভাগের রোগীর চেকআপ</p>
        </div>
        <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" alt="Right Logo">
      </div>
    </header>

    <div class="info">
      <div>রেজি. নাম্বার: <strong>R-<?= $patient->registration_int_no; ?></strong></div>
      <div>রোগীর নাম: <strong><?= $patient->name; ?></strong></div>
      <div>রোগীর বয়স: <strong><?= $patient->age; ?></strong></div>
      <div>তারিখ: <strong><?= date("d/m/Y",$patient->registration_date); ?></strong></div>
    </div>

    <div class="content">
      <!-- মূল Content -->
    </div>

    <table class="eye-table">
      <tr>
        <th colspan="3">RIGHT</th>
        <th colspan="3">LEFT</th>
      </tr>
      <tr>
        <td>Sph</td><td>Cyl</td><td>Axis</td>
        <td>Sph</td><td>Cyl</td><td>Axis</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;">Dist:</td>
        <td colspan="3" style="text-align:left;">Dist:</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;">Near:</td>
        <td colspan="3" style="text-align:left;">Near:</td>
      </tr>
    </table>

    <div class="serial-info">
      Serial: <strong><?= $patient->serial_no; ?></strong>
    </div>

    <div class="signature">
      <span>Signature</span>
    </div>

    <footer>
      রোগী দেখার সময় : সকাল ৯টা - দুপুর ২টা, পরবর্তীতে স্বাক্ষরিত ব্যবস্থাপত্রটি সাথে আনিবেন।<br>
      <strong>শুক্রবার ও সরকারি ছুটির দিন বন্ধ</strong>
    </footer>

    
<!-- বারকোড অংশ শুরু -->
<!-- <div class="barcode-container" style="text-align: center; margin-top:0;">
  <img src="path/to/your‐barcode.png" alt="Patient Barcode" style="max-width:200px; width:100%; height:auto; display:inline-block;">
</div> -->
  </div>

</body>
</html>
