<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>রোটারী চক্ষু হাসপাতাল - অপারেশনের সম্মতিপত্র (A4)</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* --- Page Setup for One Full A4 --- */
    @page {
      size: A4 portrait;
      margin: 5mm;
    }

    html, body {
      background: #f0f0f0;
      margin: 0;
      padding: 0;
      font-family: 'Noto Sans Bengali','Roboto',sans-serif;
      -webkit-print-color-adjust: exact;
    }

    .sheet {
      width: 210mm;
      height: 297mm;
      margin: 0 auto;
      background: #fff;
      box-shadow: 0 0 0.5cm rgba(0,0,0,0.15);
      padding: 15mm;
      box-sizing: border-box;
      color: #111;
      position: relative;
      overflow: hidden;
    }

    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 6mm;
    }

    .logo, .right-logo {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: #eee;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }

    .title {
      flex: 1;
      text-align: center;
    }

    .title h1 {
      margin: 0;
      font-size: 34px;
      letter-spacing: 1px;
    }

    .title h2 {
      margin: 0;
      font-size: 24px;
      color: #333;
    }

    .title p {
      margin: 4px 0 0;
      font-size: 18px;
    }

    .notice {
      background: #000;
      color: #fff;
      display: inline-block;
      padding: 6px 10px;
      border-radius: 4px;
      font-weight: 700;
      margin: 8px 0 12px;
      font-size:22px;
    }

    .form-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 18px;
    }
       .form-table tr {
        line-height:30px;
       }

    .form-table td {
      vertical-align: top;
      padding: 4px 6px;
    }

    .line {
      display: inline-block;
      border-bottom: 1px dotted #333;
      min-width: 120px;
    }

    .short-line { min-width: 60px; }

    .fill-line {
      width: 50%;
      border-bottom: 1px dotted #333;
      display: inline-block;
      text-align:center;
    }

    .section { margin-top: 8px; }

    .consent-text {
      font-size: 18px;
      line-height: 1.6;
      margin-top: 10px;
      text-align: justify;
    }

    .signature-block {
      margin-top: 24mm;
      display: flex;
      justify-content: space-between;
    }

    .sig {
      width: 45%;
    }

    .sig .label {
      font-size: 18px;
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
    .sig .line {
      display: block;
      margin-top: 26px;
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
    /* .print-btn {
      display: inline-block;
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      padding: 10px 18px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 18px;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      z-index: 1000;
    }

    .print-btn:hover { background: #0056b3; } */

    @media print {
      html, body { background: none; }
      .sheet { box-shadow: none; margin: 0; height: 100%; padding: 12mm; }
      .print-btn , .btn-back { display: none; }
    }
.logo {
    text-align: left;
    margin-bottom: 10px;
}

.logo-left , .logo-right {
    width: 80px;       /* লোগোর প্রস্থ */
    height: auto;      /* অনুপাত ঠিক রাখবে */
    object-fit: contain;
    display: block;
}

@media print {
    .logo-left, .logo-right{
        width: 80px;   /* প্রিন্টে সাইজ একই রাখবে */
        height: auto;
    }
}

   
    .center { text-align: center; }
  </style>
</head>
<body>
  <div style="text-align:center;">
    <a class="btn btn-back " href="<?php echo base_url().'billinfo'; ?>">Back</a>
    <button class="print-btn " onclick="window.print()">🖨️ Print</button>
    
    <a class="btn btn-back " href="<?php echo base_url().'billinfo/list'; ?>">Billing List</a>
    <a class="btn btn-back " href="<?php echo base_url().'dashboard'; ?>">dashboard</a>
  </div>
  <?php
  if(isset($allPdt)){
    foreach($allPdt as $pdt){
  
  ?>
  <div class="sheet" role="document">
    <header>
      <div class="logo">    <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" class="logo-left" alt="Logo Left" /></div>
      <div class="title">
        <h1><?php echo $allSup['title'] ?></h1>
        <h2><?php echo $allSup['name'] ?></h2>
        <p><?php echo $allSup['address'] ?></p>
      </div>
      <div class="right-logo">  <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" class="logo-right" alt="Logo Right" /></div>
    </header>

    <div class="center">
      <span class="notice">অপারেশনের সম্মতিপত্র</span>
    </div>
     <hr style="1px solid #000;">

    <table class="form-table" style="margin-top:8px">
      <tr>
        <td colspan="2">রোগীর নাম: <span class="fill-line"><?php echo !empty($pdt->name) ? $pdt->name : '&nbsp;'; ?></span></td>
      </tr>
    
      <tr>
        <td style="width:60%">লিঙ্গ: <span class="fill-line" style="width:58%"><?php echo !empty($pdt->gender) ? $pdt->gender : '&nbsp;'; ?></span></td>
        <td style="width:60%">বয়স: <span class="fill-line" style="width:68%"> <?php echo !empty($pdt->age) ? $pdt->age : '&nbsp;'; ?></span></td>
      </tr>
       <tr>
        <td style="width:60%">জাতীয়তা : <span class="fill-line" style="width:58%"><?php echo !empty($pdt->nationality) ? $pdt->nationality : '&nbsp;'; ?></span></td>
        <td style="width:60%">পেশা  : <span class="fill-line" style="width:68%"> <?php echo !empty($pdt->occupation) ? $pdt->occupation : '&nbsp;'; ?></span></td>
      </tr>

       <tr>
        <td style="width:60%">পিতা/স্বামী  নাম : <span class="fill-line" style="width:58%"><?php echo !empty($pdt->nationality) ? $pdt->nationality : '&nbsp;'; ?></span></td>
        <td style="width:60%">ধর্ম  : <span class="fill-line" style="width:68%"> <?php echo !empty($pdt->religion) ? $pdt->religion : '&nbsp;'; ?></span></td>
      </tr>
       <tr>
        <td style="width:60%">লিঙ্গ : <span class="fill-line" style="width:58%"><?php echo !empty($pdt->gender) ? $pdt->gender : '&nbsp;'; ?></span></td>

      </tr>
       
   
      <tr>
        <td colspan="2">চিকিৎসার কারণ/রোগীর ইতিহাস: <span class="fill-line"></span></td>
      </tr>
      <tr>
        <td colspan="2">প্রস্তাবিত চিকিৎসা/অপারেশনের বিবরণ: <span class="fill-line" ></span></td>
      </tr>
    </table>

    <div class="section consent-text">
      <p>আমি নিজে/আমার প্রাপ্তবয়স্ক রুগী (যদি প্রযোজ্য) উপরের বর্ণিত চিকিৎসা/অপারেশন সম্পর্কে বিস্তারিতভাবে জানানো হয়েছে এবং আমি তা বুঝেছি। চিকিৎসাজনিত বা অ্যানেস্থেসিয়া সংক্রান্ত ঝুঁকি, জটিলতা এবং সম্ভাব্য ফলাফল চিকিৎসক কর্তৃক ব্যাখ্যা করা হয়েছে। আমি সম্মতি প্রদান করছি যে উক্ত চিকিৎসা/অপারেশন করা হবে এবং প্রয়োজনে অতিরিক্ত ব্যবস্থা গ্রহণ করা যাবে।</p>
      <p>আমি জানি যে অপারেশনের পরে পুনরুদ্ধার ও ফলাফল ভিন্ন ব্যক্তির ক্ষেত্রে ভিন্ন হতে পারে এবং চিকিৎসা চলাকালীন অনাকাঙ্ক্ষিত ঘটনা ঘটতে পারে। উপরোক্ত বিষয়গুলো আমাকে বোঝানো হয়েছে এবং আমি সম্পূর্ণ সচেতনভাবে সম্মত হয়েছি।</p>
    </div>

    <div class="section">
      <table class="form-table">
        <tr>
          <td>রোগীর/অভিভাবকের স্বাক্ষর: <span class="line" style="width:40%"></span></td>
          <td>তারিখ: <span class="line short-line"></span></td>
        </tr>
        <tr>
          <td>স্বাক্ষরের নাম (প্রিন্ট): <span class="fill-line" style="width:45%"></span></td>
          <td>মোবাইল: <span class="line short-line"></span></td>
        </tr>
        <tr>
          <td>ঠিকানা: <span class="fill-line" style="width:80%"></span></td>
          <td>জেলা: <span class="line short-line"></span></td>
        </tr>
      </table>
    </div>

    <div class="signature-block">
      <div class="sig">
        <div class="label muted">চিকিৎসকের স্বাক্ষর ও নাম</div>
        <span class="line" style="display:block;margin-top:28px;width:80%"></span>
      </div>

      <div class="sig">
        <div class="label muted">হাসপাতালের বৈধতা/পদবী</div>
        <span class="line" style="display:block;margin-top:28px;width:80%"></span>
      </div>
    </div>
  <?php
  }
}
  ?>
   
  </div>
</body>
</html>