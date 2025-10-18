
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consent Letter</title>
<style>
  body {
    margin: 0;
    padding: 0;
    background: #f0f0f0;
  
  }

  /* --- Print Button --- */
  .top-buttons {
    text-align: center;
    margin: 20px 0;
  }

  .print-btn {
    display: inline-block;
    padding: 10px 18px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 15px;
    margin: 5px;
    font-weight: bold;
     text-decoration: none;
  }

  .print-btn:hover {
    background: #0056b3;
  }

  /* --- A4 Page Setup --- */
  .page {
    width: 210mm;
    min-height: 297mm;
    background: #fff;
    margin: auto;
    padding: 20mm;
    border: 1px solid #000;
    box-sizing: border-box;
    position: relative;
  }

  header {
    text-align: center;
    border-bottom: 1px solid #000;
    padding-bottom: 5px;
    margin-bottom: 10px;
  }

  .header-logos {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
  }

  .header-logos img {
    height: 90px;
    width: auto;
  }

  header h1 {
    font-size: 26px;
    margin: 0;
    font-weight: bold;
  }

  header h2 {
    font-size: 18px;
    margin: 0;
  }

  header p {
    font-size: 14px;
    margin: 5px 0 0 0;
    font-weight: bold;
    color: #000;
    display: inline-block;
    padding: 2px 8px;
    border-radius: 3px;
  }

  .info {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-top: 10px;
    margin-bottom: 25px;
    padding: 10px;
    border: 1px solid #000;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  .content {
    min-height: 480px;
    margin-bottom: 20px;
    padding: 15px;
    font-size: 16px;
  }

   .eye-table {
    width: 300px;
    border: 1px solid #000;
    border-collapse: collapse;
    margin-bottom: 10px;
  }

  .eye-table th, .eye-table td {
    border: 1px solid #000;
    padding: 5px;
    text-align: center;
    font-size: 13px;
  }

  .serial-info {
    border: 1px solid #000;
    width: 160px;
    padding: 8px;
    font-size: 14px;
  }

  .signature {
    text-align: right;
    margin-top: 60px;
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
    width: 100%;
    text-align: center;
    font-size: 12px;
    line-height: 1.4;
    padding: 12px;
    top:0;
    bottom:0;
  }

  footer strong {
    background: #000;
    color: #fff;
    padding: 2px 6px;
    border-radius: 2px;
  }

  /* --- Print Settings --- */
  @page {
    size: A4;
    margin: 10mm;
  }

  @media print {
    body { background: #fff; margin: 0; }
    .page { border: none; padding: 10mm; box-shadow: none; }
    .top-buttons { display: none; }
  }
</style>
</head>
<body>

  <!-- Centered Buttons -->
  <div class="top-buttons">
    <a class="print-btn" href="<?php echo base_url().'dashboard' ?>"> Dashboard</a>
   
     <a class="print-btn btn-back" href="<?php echo base_url()."patient/invoice/$id"?>">Back</a>
  <button class="print-btn" onclick="window.print()">🖨️ Print Invoice</button>
  <a class="print-btn" target="_blank" href="<?php echo base_url()."patient/create"?>">Patient Registration </a>
  </div>

  <div class="page">
    <header>
      <div class="header-logos">
        <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" alt="Left Logo" class="logo left-logo">
        <div>
         <h1><?php echo $allSup['title'] ?></h1>
      <h2><?php echo $allSup['name'] ?></h2>
      <p><?php echo $allSup['address'] ?></p>
          <p>বহিঃ বিভাগের রোগীর চেকআপ</p>
        </div>
       <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" alt="Right Logo" class="logo right-logo">
      </div>
    </header>

    <div class="info">
      <div>রেজি. নাম্বার: <strong><?= $patient->registration_no; ?></strong></div>
      <div>রোগীর নাম: <strong><?= $patient->name; ?></strong></div>
        <div>রোগীর বয়স: <strong><?= $patient->age; ?></strong></div>
      <div>তারিখ: <strong><?= date("d/m/Y",$patient->registration_date); ?></strong></div>
    </div>

    <div class="content">
      <!-- Your content here -->
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
  </div>

</body>
</html>
