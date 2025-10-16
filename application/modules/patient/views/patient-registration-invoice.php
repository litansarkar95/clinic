<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Consent Letter</title>
<style>
   body {
    margin: 0;
    padding: 20px;
    background: #eee;
}

.print-btn {
    display: inline-block;
    padding: 8px 14px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-bottom: 15px;
}

.print-btn:hover {
    background: #0056b3;
}

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
    border-bottom: 1px solid #000; /* Increased border thickness for header */
    padding-bottom: 5px;
    margin-bottom: 10px;
    position: relative;
}

.header-logos {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
}

.header-logos img {
    height: 140px;
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
    font-weight: normal;
}

header p {
    font-size: 14px;
    margin: 5px 0 0 0;
    font-weight: bold;
    background: #000;
    color: #fff;
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
    border: 1px solid #000; /* Border for info section */
    border-radius: 5px; /* Optional rounded corners */
    background-color: #f9f9f9; /* Light background */
}
.serial-info{
 border: 1px solid #000;
    width: 150px;
     padding: 10px;
        margin-top: 10px;
}
.content {
    min-height: 510px;
    margin-bottom: 10px;
    padding: 10px;
    font-size: 16px;
}

.eye-table {
    width: 60%;
    border: 1px solid #000;
    border-collapse: collapse;
    margin-bottom: 4px;
}

.eye-table th, .eye-table td {
    border: 1px solid #000;
    padding: 5px;
    text-align: center;
    font-size: 13px;
}

.signature {
    text-align: right;
    margin-top: 5px;
    margin-bottom:5px;
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
    left: 0;
    width: 100%;
    text-align: center;
    font-size: 12px;
    line-height: 1.4;
    padding: 15px;
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

footer strong {
    background: #000;
    color: #fff;
    padding: 2px 6px;
    border-radius: 2px;
}

@media print {
    .print-btn { display: none; }
      .print-btn { display: none; }
    body { background: #fff; margin: 0; }
    .page { border: none; padding: 15mm; }
}

</style>
</head>
<body>

  <a class="btn print-btn" href="<?php echo base_url()."dashboard"?>">Dashboard </a>
  <button class="print-btn" onclick="window.print()">🖨️ Print</button>
  
  <div class="page">
    <header>
        <div class="header-logos">
            <!-- Left Logo -->
            <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" alt="Left Logo">
            
            <div>
                <h1><?php echo $allSup['name'] ?></h1>
                <h2><?php echo $allSup['address'] ?></h2>
                <h2><?php echo $allSup['phone'] ?></h2>
                <p>বহিঃ বিভাগের রোগীর চেকআপ</p>
            </div>

            <!-- Right Logo -->
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

    <div class="serial-info" style="">
        <div>Serial: <strong><?= $patient->serial_no; ?></strong></div>
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
