<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php if (isset($title)) { echo $title; } ?></title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet" />

<style>
/* Global font */
body {
  font-family: 'Noto Serif Bengali', serif;
  background: #fff;
  margin: 0;
  padding: 0;
  color: #000;
  line-height: 1.8;
  font-size: 15px;
}

/* Toolbar (screen only) */
.toolbar {
  text-align: center;
  padding: 10px 0;
  background: #eef2ff;
  border-bottom: 1px solid #ccc;
}
.toolbar button, .toolbar .btn-back {
  background: #0b66a3;
  color: white;
  border: none;
  padding: 8px 18px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
  text-decoration: none;
  font-weight: 600;
  margin: 0 6px;
}
.toolbar button:hover, .toolbar .btn-back:hover {
  background: #094e76;
}

/* Page layout */
.page {
  width: 210mm;
  height: 297mm;
  background: #fff;
  margin: 10px auto;
  padding: 20mm 18mm;
  box-sizing: border-box;
  border: 1px solid #ddd;
}

/* Header */
.header {
  text-align: center;
  position: relative;
  margin-bottom: 20px;
}
.header img.logo-left,
.header img.logo-right {
  position: absolute;
  top: 0;
  width: 90px;
  height: auto;
}
.header img.logo-left { left: 0; }
.header img.logo-right { right: 0; }

.header h1 {
  font-size: 24px;
  margin: 0;
  font-weight: 700;
}
.header h2 {
  font-size: 18px;
  margin: 5px 0 8px;
  font-weight: 600;
}
.header p {
  font-size: 13px;
  margin: 2px 0;
}

/* Title box */
.title {
  display: inline-block;
  border: 2px solid #000;
  padding: 6px 35px;
  font-weight: 700;
  font-size: 18px;
  margin: 18px 0 25px;
}

/* Content */
.content {
  text-align: justify;
  font-size: 15px;
  color: #000;
}

/* Dotted input */
.dotted {
  border-bottom: 1px dotted #000;
  display: inline-block;
  min-width: 200px;
  text-align: center;
  margin: 0 6px;
}

/* Signature section */
.signature-div {
  margin-top: 50px;
  display: flex;
  justify-content: flex-end;
}
.signature {
  width: 55%;
  font-size: 15px;
  line-height: 1.8;
}
.signature p { margin: 6px 0; }

/* Footer */
.footer {
  text-align: center;
  font-size: 13px;
  margin-top: 25px;
  color: #555;
}

/* Print setup */
@page {
  size: A4 portrait;
  margin: 12mm;
}
@media print {
  body {
    background: #fff;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }
  .toolbar { display: none !important; }
  .page {
    border: none;
    margin: 0;
    box-shadow: none;
    page-break-after: always;
  }
  .header img.logo-left,
  .header img.logo-right {
    width: 30mm;
  }
}
</style>
</head>
<body>

<div class="toolbar">
  <a class="btn-back" href="<?php echo base_url()."billinfo/invoice/$id"; ?>">← ফিরে যান</a>
  <button onclick="window.print()">🖨 প্রিন্ট করুন</button>
</div>

<div class="page">
  <div class="header">
    <img src="<?php echo base_url()."assets/images/".$allSup['favicon']?>" class="logo-left" alt="Logo Left" />
    <img src="<?php echo base_url()."assets/images/".$allSup['logo']?>" class="logo-right" alt="Logo Right" />
    <h1><?php echo $allSup['title'] ?></h1>
    <h2><?php echo $allSup['name'] ?></h2>
    <p><?php echo $allSup['address'] ?></p>
    <p>Mobile: <?php echo $allSup['phone'] ?></p>
    <div class="title">অস্ত্রোপচারের সম্মতিপত্র</div>
  </div>

<?php if(isset($allPdt)) { foreach($allPdt as $pdt) { ?>
  <div class="content">
  <p >
    চিকিৎসার প্রার্থী 
    <span class="dotted"><?php echo $pdt->name; ?></span>
  </p>
<p style="margin-bottom: 15px;">
    
    বয়স 
    <span class="dotted" ><?php echo $pdt->age; ?></span>
    লিঙ্গ 
    <span class="dotted"><?php echo $pdt->gender; ?></span>
  </p>
  <p style="margin-bottom: 15px;">
    জাতীয়তা 
    <span class="dotted" style="min-width: 150px;"><?php echo $pdt->nationality; ?></span>
    পেশা 
    <span class="dotted" style="min-width: 150px;"><?php echo $pdt->occupation; ?></span>
    ধর্ম 
    <span class="dotted" style="min-width: 150px;"><?php echo $pdt->religion; ?></span>
  </p>

  <p>
    পিতা/মাতা/অভিভাবকের নাম 
    <span class="dotted" style="min-width: 280px;"><?php echo $pdt->father_husband_name; ?></span>
  </p>

  <p>
    চিকিৎসার প্রার্থী আমি নিজে অথবা পুত্র/কন্যা/ভাই/বোন/স্বামী/স্ত্রী 
    <span class="dotted" style="min-width: 260px;"></span>
  </p>

  <p>
    উপরোক্ত চিকিৎসার প্রার্থী হিসেবে অনুমতি দিচ্ছি যে, প্রয়োজনীয় হলে অস্ত্রোপচার 
    <span class="dotted" style="min-width: 220px;"></span> করা হবে।
  </p>

  <p>
    আমি অস্ত্রোপচার ও তার পার্শ্বপ্রতিক্রিয়া সম্পর্কে চিকিৎসকের সাথে পরামর্শ করেছি এবং চিকিৎসা সহযোগী বিশেষজ্ঞদের পরামর্শ অনুযায়ী মনোনীত চিকিৎসা গ্রহণে সম্মত আছি। অস্ত্রোপচারের প্রক্রিয়ায় কোন নতুন সমস্যা দেখা দিলে বা পরবর্তীতে জটিলতা সৃষ্টি হলে আমি তার জন্য চিকিৎসক বা হাসপাতাল কর্তৃপক্ষকে দায়ী করবো না।
  </p>

  <p>
    অজ্ঞান করার দায়িত্বপ্রাপ্ত চিকিৎসক (anaesthesia) বিষয়টি ব্যাখ্যা করেছেন এবং আমি তা বুঝেছি।
  </p>

  <p>
    উপরোক্ত বিষয়াদি সম্পূর্ণ বুঝে শুনে আমি এই সম্মতিপত্রে স্বাক্ষর করছি।
  </p>
</div>


  <div class="signature-div">
    <div class="signature">
      <p>স্বাক্ষর: ...............................................................</p>
      <p>স্বাক্ষর দাতার নাম: ..................................................</p>
      <p>পিতা/মাতা/অভিভাবকের নাম: .........................................</p>
      <p>ঠিকানা: ...............................................................</p>
      <p>মোবাইল: . <span class="dotted"><?php echo $pdt->mobile_no; ?></span></p>
      <p>তারিখ:............................................. ..................</p>
    </div>
  </div>

<?php } } ?>

</div>

</body>
</html>
