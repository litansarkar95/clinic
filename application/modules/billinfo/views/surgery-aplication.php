<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ROTARY EYE HOSPITAL | Admission Ticket</title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">
<style>
  @page {
    size: A4;
    margin: 25mm;
  }

  body {
    font-family: 'Noto Serif Bengali', serif;
    font-size: 14px;
    color: #000;
    line-height: 1.4;
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
    padding: 10px;
    border: 1px solid #000;
  }

  .header {
    text-align: center;
    position: relative;
    margin-bottom: 10px;
  }

  .header img {
    width: 70px;
    height: 70px;
    position: absolute;
    top: 0;
  }

  .header img.left {
    left: 0;
  }

  .header img.right {
    right: 0;
  }

  .header h1 {
    font-size: 22px;
    margin: 0;
  }

  .header h2 {
    font-size: 16px;
    margin: 0;
    letter-spacing: 1px;
  }

  .header p {
    margin: 2px 0 0;
    font-size: 13px;
  }

  .admission-title {
    background: #000;
    color: #fff;
    text-align: center;
    font-weight: bold;
    padding: 5px 0;
    margin: 10px 0;
    letter-spacing: 1px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
  }

  td {
    vertical-align: top;
    padding: 3px 2px;
  }

  .small-input {
    display: inline-block;
    border: 1px solid #000;
    width: 80px;
    height: 20px;
  }

  .token-box {
    display: inline-block;
    border: 1px solid #000;
    width: 70px;
    height: 25px;
    text-align: center;
    line-height: 25px;
    font-weight: bold;
  }

  .signature {
    text-align: right;
    margin-top: 30px;
    font-size: 14px;
  }

  @media print {
    .print-btn {
      display: none !important;
    }
    .page {
      border: none;
    }
  }
</style>
</head>

<body>
  <div style="text-align:center;">
    <button class="print-btn" onclick="window.print()">🖨️ Print</button>
  </div>

  <div class="page">
    <div class="header">
      <img src="<?php echo base_url()?>assets/static/imgs/rotary-eye.jpg" class="left" alt="Logo Left">
      <img src="<?php echo base_url()?>assets/static/imgs/rotary-logo.jpg" class="right" alt="Logo Right">
      <h1>রোটারী চোখ হাসপাতাল</h1>
      <h2>ROTARY EYE HOSPITAL</h2>
      <p>বিরিঞ্চ বাজার রোড, জয়শংকরপুর, আদর্শ সদর, কুমিল্লা, ৩৫০০।</p>
    </div>

    <div class="admission-title">ADMISSION TICKET</div>

    <table>
      <tr>
        <td>Out Door. Regn. No. <div class="small-input">3</div></td>
        <td>Date: ...........................................</td>
      </tr>
      <tr>
        <td>Admission Regn. No. <div class="small-input"></div></td>
        <td>Gender: .........................................</td>
      </tr>
      <tr>
        <td></td>
        <td>Bed No.: ........................................</td>
      </tr>
      <tr>
        <td></td>
        <td>Invoice No.: ....................................</td>
      </tr>
    </table>

    <p>Name : .......................................................................................................................................................</p>
    <p>Father’s/Husband’s Name : ...............................................................................................................................</p>
    <p>Sex : ..................................... Age : .......................... Caste : .................................................................</p>
    <p>Occupation : ...........................................................................................................................................................</p>
    <p>Permanent Address : ..................................................................................................................................................</p>
    <p>Local Guardian : .................................................................... Telephone (if any) : ...................................................</p>
    <p>Date & Time of Admission : .................................................................................................................................</p>
    <p>Date & Time of Discharge : .................................................................................................................................</p>
    <p>Note for Admission : ..............................................................................................................................................</p>

    <p><b>Token :</b> <span class="token-box">3</span></p>

    <div class="signature">
      Signature<br>
      Consultant (Eye)/R.M.O
    </div>
  </div>
</body>
</html>
