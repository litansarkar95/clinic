<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($title)) { echo $title; } ?> </title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">
  <style>
   @page {
  size: A4;
  margin: 10mm; /* আগে 25mm ছিল, এখন কমিয়ে 10mm করা হলো */
}

body {
  font-family: 'Noto Serif Bengali', serif;
  font-size: 15px;
  color: #000;
  line-height: 1.6;
  margin: 0; 
  padding: 0;
}

.header img.right {
  right: 30px; 
}


    .btn-back {
      display: inline-block;
      background: #16acceff;
      color: #fff;
      border: none;
      padding: 6px 15px;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      text-decoration: none;
    }

    .print-btn {
      display: inline-block;
      background: #0369a1;
      color: #fff;
      border: none;
      padding: 6px 15px;
      border-radius: 4px;
      font-size: 14px;
      margin: 10px 0;
      cursor: pointer;
    }

    .print-btn:hover {
      background: #0c4a6e;
    }

    .page {
      width: 100%;
      max-width: 800px;
      margin: auto;
      padding: 20px;
      border: 1px solid #000;
    }

   .header {
    text-align: center;
    position: relative;
    margin-bottom: 20px;
    padding-top: 10px; 
      }


    .header img {
      width: 100px;
      height: 100px;
      position: absolute;
      top: 0;
    }

    .header img.left {
      left: 0;
    }

 

    .header h1 {
      font-size: 26px;
      margin: 0;
      font-weight: 900;
    }

    .header h2 {
      font-size: 18px;
      margin: 0;
      letter-spacing: 1px;
    }

    .header p {
      margin: 4px 0 0;
      font-size: 14px;
    }

    .admission-title {
      background: #000;
      color: #fff;
      text-align: center;
      font-weight: bold;
      padding: 10px 0;
      margin: 20px 0;
      font-size: 20px;
      letter-spacing: 1px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    td {
      vertical-align: top;
      padding: 5px 2px;
      font-size: 15px;
    }

    .small-input {
      display: inline-block;
      border: 1px solid #000;
      width: 80px;
      height: 20px;
      text-align: center;
    }

    .token-box {
      display: inline-block;
      border: 1px solid #000;
      width: 80px;
      height: 30px;
      text-align: center;
      line-height: 30px;
      font-weight: bold;
      font-size: 16px;
    }

    .signature {
      text-align: right;
      margin-top: 50px;
      font-size: 15px;
      padding-right: 50px;
    }

    .label {
      font-weight: bold;
      font-size: 15px;
    }

    @media print {
      .print-btn, .btn-back {
        display: none !important;
      }

      .page {
        border: none;
      }
    }
  </style>
</head>

<body>
  <?php
  if(isset($allPdt)){
    foreach($allPdt as $pdt){
  
  ?>
  <div style="text-align:center;">
    <a class="btn btn-back" href="<?php echo base_url().'billinfo'; ?>">Back</a>
    <button class="print-btn" onclick="window.print()">🖨️ Print</button>
  </div>

  <div class="page">
    <div class="header">
      <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" class="left" alt="Logo Left">
      <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" class="right" alt="Logo Right">
      <h1><?php echo $allSup['title'] ?></h1>
      <h2><?php echo $allSup['name'] ?></h2>
      <p><?php echo $allSup['address'] ?></p>
      <p><?php echo $allSup['phone'] ?></p>
    </div>

    <div class="admission-title">ADMISSION TICKET</div>

    <table>
      <tr>
        <td><span class="label">Out Door. Regn. No.:</span> <div class="small-input"></div></td>
        <td><span class="label">Date:</span> ...........................................</td>
      </tr>
      <tr>
        <td><span class="label">Admission Regn. No.:</span> <div class="small-input"><?php echo $pdt->registration_no; ?></div></td>
        <td><span class="label">Gender:</span> .........................................</td>
      </tr>
      <tr>
        <td></td>
        <td><span class="label">Bed No.:</span> ........................................</td>
      </tr>
      <tr>
        <td></td>
        <td><span class="label">Invoice No.:</span> ....................................</td>
      </tr>
    </table>

    <p><span class="label">Name:</span> .......................................................................................................................................</p>
    <p><span class="label">Father’s/Husband’s Name:</span> .........................................................................................................</p>
    <p><span class="label">Sex:</span> ..................................... <span class="label">Age:</span> .......................... <span class="label">Caste:</span> ..........................................................</p>
    <p><span class="label">Occupation:</span> ................................................................................................................................</p>
    <p><span class="label">Permanent Address:</span> .....................................................................................................................</p>
    <p><span class="label">Local Guardian:</span> ...................................... <span class="label">Telephone (if any):</span> .....................................................</p>
    <p><span class="label">Date & Time of Admission:</span> ............................................................................................</p>
    <p><span class="label">Date & Time of Discharge:</span> ................................................................................................</p>
    <p><span class="label">Note for Admission:</span> .................................................................................................</p>

    <p><span class="label">Token:</span> <span class="token-box"><?php echo $pdt->serial; ?></span></p>
    <p><span class="label">Date:</span> ........................................................</p>

    <div class="signature">
      Signature<br>
      Consultant (Eye)/R.M.O
    </div>
  </div>

  <?php
  }
}
  ?>
</body>
</html>
