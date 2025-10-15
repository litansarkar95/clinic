<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>অস্ত্রোপচারের সম্মতিপত্র | ROTARY EYE HOSPITAL</title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">

<style>
  body {
    font-family: 'Noto Serif Bengali', serif;
    background: #f5f6f8;
    margin: 0;
    padding: 0;
  }

  .toolbar {
    text-align: center;
    padding: 10px;
    background: #eef2ff;
    border-bottom: 1px solid #ccc;
  }
  .toolbar button {
    background: #0b66a3;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    font-weight: bold;
  }

  .page {
    width: 210mm;
    min-height: 297mm;
    background: #fff;
    margin: 20px auto;
    padding: 25mm;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
  }

  .header {
    text-align: center;
    position: relative;
    margin-bottom: 15px;
  }
  .header img.logo-left {
    position: absolute;
    top: 0;
    left: 0;
    width: 90px;
  }
  .header img.logo-right {
    position: absolute;
    top: 0;
    right: 0;
    width: 90px;
  }
  .header h1 {
    font-size: 28px;
    margin: 0;
  }
  .header h2 {
    font-size: 18px;
    margin: 4px 0;
  }
  .header p {
    font-size: 13px;
    margin: 2px 0 10px;
  }
  .title {
    text-align: center;
    border: 1px solid #000;
    display: inline-block;
    padding: 3px 25px;
    font-weight: bold;
    margin: 10px 0;
    font-size: 16px;
  }

  .content {
    font-size: 15px;
    line-height: 1.8;
    text-align: justify;
  }

  .dotted {
    border-bottom: 1px dotted #000;
    display: inline-block;
    min-width: 200px;
  }

  /* ✅ Signature section fully right side */
  .signature-div {
    margin-top: 50px;
    display: flex;
    justify-content: flex-end;
  }

  .signature {
    width: 50%;
    text-align: justify;
    line-height: 1.8;
  }

  .signature p {
    margin: 5px 0;
  }

  .footer {
    text-align: center;
    margin-top: 25px;
    font-size: 12px;
    color: #555;
  }

  /* Print setup */
  @page {
    size: A4 portrait;
    margin: 15mm;
  }
  @media print {
    body {
      background: white;
      margin: 0;
      padding: 0;
    }
    .page {
      box-shadow: none;
      margin: 0;
      padding: 15mm;
    }
    .toolbar {
      display: none !important;
    }
  }
</style>
</head>
<body>

<div class="toolbar no-print">
  <button onclick="window.print()">🖨 প্রিন্ট / Print</button>
</div>

<div class="page">
  <div class="header">
    <img src="<?php echo base_url()?>assets/static/imgs/rotary-eye.jpg" class="logo-left" alt="Logo Left">
    <img src="<?php echo base_url()?>assets/static/imgs/rotary-logo.jpg" class="logo-right" alt="Logo Right">
    <h1><?php echo $allSup['name'] ?></h1>
    <!-- <h2>ROTARY EYE HOSPITAL</h2> -->
    <p><?php echo $allSup['address'] ?></p>
    <p>Mobile: <?php echo $allSup['phone'] ?></p>
    <div class="title">অস্ত্রোপচারের সম্মতিপত্র</div>
  </div>
<?php
    if(isset($allPdt)){
        foreach($allPdt as $pdt){
    
    ?>
  <div class="content">
    চিকিৎসার প্রার্থী <span class="dotted"><?php echo $pdt->name; ?></span> বয়স <span class="dotted"><?php echo $pdt->age; ?></span> পুরুষ/স্ত্রী <span class="dotted">  <?php echo $pdt->gender; ?></span>
    জাতীয়তা <span class="dotted"><?php echo $pdt->nationality; ?></span> পেশা <span class="dotted"><?php echo $pdt->occupation; ?></span> ধর্ম <span class="dotted"><?php echo $pdt->religion; ?></span>
    পিতা/মাতা/অভিভাবকের নাম <span class="dotted" style="width: 300px;"><?php echo $pdt->father_husband_name; ?></span>

    চিকিৎসার প্রার্থী আমি নিজে অথবা পুত্র/কন্যা/ভাই/বোন/স্বামী/স্ত্রী <span class="dotted" style="width: 250px;"></span>
    উপরোক্ত চিকিৎসার প্রার্থী হিসেবে অনুমতি দিচ্ছি যে, প্রয়োজনীয় হলে অস্ত্রোপচার <span class="dotted" style="width: 200px;"></span> করা হবে।

    আমি অস্ত্রোপচার ও তার পার্শ্বপ্রতিক্রিয়া সম্পর্কে চিকিৎসকের সাথে পরামর্শ করেছি এবং চিকিৎসা সহযোগী বিশেষজ্ঞদের পরামর্শ অনুযায়ী মনোনীত চিকিৎসা গ্রহণে সম্মত আছি। অস্ত্রোপচারের প্রক্রিয়ায় কোন নতুন সমস্যা দেখা দিলে বা পরবর্তীতে জটিলতা সৃষ্টি হলে আমি তার জন্য চিকিৎসক বা হাসপাতাল কর্তৃপক্ষকে দায়ী করবো না।<br><br>

    অজ্ঞান করার দায়িত্বপ্রাপ্ত চিকিৎসক (anaesthesia) বিষয়টি ব্যাখ্যা করেছেন এবং আমি তা বুঝেছি।<br><br>

    উপরোক্ত বিষয়াদি সম্পূর্ণ বুঝে শুনে আমি এই সম্মতিপত্রে স্বাক্ষর করছি।
  </div>

  <!-- ✅ Signature section right side -->
  <div class="signature-div">
    <div class="signature">
      <p>স্বাক্ষর: ..............................................................</p>
      <p>স্বাক্ষর দাতার নাম: .....................................................</p>
      <p>পিতা/মাতা/অভিভাবকের নাম: ............................................</p>
      <p>ঠিকানা: ...............................................................</p>
      <p>মোবাইল: ..............................................................</p>
       <p>তারিখ: ...............................................................</p>
    </div>
  </div>

 
</div>
   <?php
                }
            }
            ?>
</body>
</html>
