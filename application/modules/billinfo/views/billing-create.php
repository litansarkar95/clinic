	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
 <style>
/* Patient result card style */
.patient-result-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

/* Card hover effect */
.patient-result-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Card header styling (name) */
.patient-result-card-header {
    font-size: 18px;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 10px;
}

/* Card body styling */
.patient-result-card-body {
    font-size: 14px;
    color: #333;
}

.patient-result-card-body p {
    margin: 5px 0;
}

/* Ensure search results have some margin */
#search_results {
    margin-top: 5px;
}

/* No results message style */
#search_results p {
    font-size: 16px;
    color: #888;
}
.input_form{
  border-radius:0px !important;
}

.input_form_new3{
  margin-top:10px;
  padding: 30px;
    background: linear-gradient(121deg, rgba(102, 222, 96, 0.2), rgba(1, 194, 49, 0.5));
    border-radius: 15px;
    transition: all 
    linear 0.3s;
    box-shadow: 1px 1px 1px #777;
}

.ui-widget-content
 {
    border: 1px solid #dddddd;
    background: #0e9f2bff;
    color: #f1f4f3ff;
}

                        </style>
     <script>
    $(document).ready(function() {
   

   $("#registration_date").datepicker({
  dateFormat: "dd-mm-yy",
  changeMonth: true,
  changeYear: true,
  yearRange: "1900:2100",
});
$("#surgery_date").datepicker({
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
  yearRange: "1900:2100",
  onSelect: function(dateText) {
    fetchSerial(dateText);
  }
});

// Set a default date (e.g., today's date)
var today = $.datepicker.formatDate("dd-mm-yy", new Date());
$("#registration_date,.to_date").val(today);

  });



     
    </script>
<style>
.product-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: inline-block;
  width: 150px;
  margin: 10px;
  text-align: center;
}

.product-card:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

.product-title {
  font-weight: 600;
  color: #333;
  font-size: 14px;
  min-height: 10px;
}

.price-section {
  font-size: 15px;
  margin-bottom: 5px;
}

.original-price {
  text-decoration: line-through;
  color: #888;
  margin-right: 4px;
}

.discount-price {
  color: #28a745;
  font-weight: bold;
}

.add-now-btn {
  background-color: #28a745;
  border: none;
  transition: 0.3s;
  padding: 5px 10px;
}

.add-now-btn:hover {
  background-color: #218838;
}

.discount-badge {
  display: inline-block;
  background: #ff4d4d;
  color: #fff;
  font-weight: bold;
  font-size: 12px;
  border-radius: 5px;
  padding: 3px 8px;
  margin-bottom: 5px;
}

/* 🧩 Responsive Layout */
.products-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

/* বড় স্ক্রিনে প্রতি সারিতে 5টা */
@media (min-width: 992px) {
  .product-card {
    width: 18%;
  }
}

/* ট্যাবলেট স্ক্রিনে প্রতি সারিতে 3টা */
@media (max-width: 991px) and (min-width: 576px) {
  .product-card {
    width: 30%;
  }
}

/* মোবাইলে প্রতি সারিতে 2টা */
@media (max-width: 575px) {
  .product-card {
    width: 45%;
    margin: 8px;
  }

  .product-title {
    font-size: 13px;
  }

  .price-section {
    font-size: 14px;
  }

  .add-now-btn {
    padding: 4px 8px;
    font-size: 13px;
  }
}
</style>
<style>
.toast-msg {
  position: fixed;
  top: 20px;
  right: 20px;
  background: linear-gradient(135deg, #2ecc71, #27ae60);
  color: #fff;
  padding: 14px 20px;
  border-radius: 10px;
  font-weight: 500;
  box-shadow: 0 4px 10px rgba(0,0,0,0.25);
  opacity: 0;
  transform: translateY(-20px);
  transition: all 0.4s ease;
  z-index: 9999;
  text-align: left;
  min-width: 250px;
  line-height: 1.4;
}

.toast-msg.show {
  opacity: 1;
  transform: translateY(0);
}

/* 💫 সুন্দর অ্যানিমেশন যুক্ত করো */
@keyframes toastPulse {
  0% { box-shadow: 0 0 5px rgba(46, 204, 113, 0.5); }
  50% { box-shadow: 0 0 20px rgba(46, 204, 113, 0.8); }
  100% { box-shadow: 0 0 5px rgba(46, 204, 113, 0.5); }
}

.toast-msg.show {
  animation: toastPulse 1.5s infinite;
}
</style>

   <div class="container-fluid">
            <div id="toast-msg" class="toast-msg"></div>

								<div class="row px-3 ">
									<div class="col-12 bg_grey">
								
											
											<div class="row justify-content-center pb-5">
												<div class="col-md-12">
                                                <div class="row pb-3">
												<div class="col-auto">
													<h3>Create Billing</h3>
												</div>
                                                
                                                
												<div class="col-auto ms-auto">
                                                       <form action="<?php echo base_url(); ?>billinfo/list" method="POST">
                                                <!-- Add hidden inputs to send data -->
                                                <input type="hidden" name="from_date" value="<?php echo date("d-m-Y"); ?>">
                                                <input type="hidden" name="to_date" value="<?php echo  date("d-m-Y"); ?>">
                                                <button type="submit" class="btn btn_bg">Billing List</button>
                                            </form>
													
												</div>
											</div>


              

<!-- The search result container will appear here -->


 
	
									  



                                      <div class=" " >
                                          <div class="row">
                                        <div class="col-12 text-center">
                                         <a type="submit" href="<?php echo base_url('billinfo/confirm_page'); ?>" class="btn btn-success">Bill Confirm Now </a>

                                        </div>
                                      </div>
									      				<div class="row mb-3">
                                  <div class="col-md-12">
<div class="products-container">
                            <?php
if (isset($allPdt)) {
    foreach ($allPdt as $pdt) {
        // ছাড়ের হিসাব করা (যদি থাকে)
        $discountPercent = 0;
        if ($pdt->regular_price > 0 && $pdt->offer_price < $pdt->regular_price) {
            $discountPercent = round((($pdt->regular_price - $pdt->offer_price) / $pdt->regular_price) * 100);
        }
?>
        <div class="product-card text-center p-3">
     

            <h5 class="product-title mb-2"><?php echo $pdt->name; ?></h5>

            <div class="price-section mb-2">
                <?php if ($discountPercent > 0) { ?>
                    <span class="original-price me-2">৳<?php echo $pdt->regular_price; ?></span>
                    <span class="discount-price">৳<?php echo $pdt->offer_price; ?></span>
                <?php } else { ?>
                    <span class="discount-price">৳<?php echo $pdt->regular_price; ?></span>
                <?php } ?>
            </div>

            <?php if ($discountPercent > 0) { ?>
                <div class="discount-badge mb-3">
                    <span><?php echo $discountPercent; ?>% OFF</span>
                </div>
            <?php } ?>

    <button 
  class="btn btn-success btn-sm add-now-btn"
  data-id="<?php echo $pdt->id; ?>"
  data-name="<?php echo htmlspecialchars($pdt->name); ?>"  
  data-original="<?php echo $pdt->regular_price; ?>" 
  data-price="<?php echo $pdt->offer_price < $pdt->regular_price ? $pdt->offer_price : $pdt->regular_price; ?>"
>
 <span><i class="fas fa-shopping-cart"></i></span>

</button>


        </div>
<?php
    }
}
?>
                                          
  </div>


                                    </div> 
                      

                                            
                              
									      					
									          		</div>	
                                    

                                	</div>
									      	
												</div>
											</div>
										</div>
                    
									</div>
								</div>
							</div>

<script>
$(document).on('click', '.add-now-btn', function() {
  let id = $(this).data('id');
  let name = $(this).data('name');
  let price = $(this).data('price');
  let original_price = $(this).data('original');
  
  $.ajax({
    url: '<?php echo base_url("billinfo/add_to_session"); ?>',
    type: 'POST',
    data: { id: id, name: name, price: price , regular_price: original_price },
    dataType: 'json',
    success: function(res) {
      if (res.status === 'success') {
        // 🧾 নতুন টোস্ট মেসেজে কার্ট সংখ্যা + মোট টাকা দেখাবে
        showToast(`✅ <b>${name}</b> added to cart!<br>
        🛒 <b>${res.cart_count}</b> items | 💰 <b>৳${res.cart_total}</b>`);
      }
    }
  });
});

// ✨ Custom Toast Function
function showToast(message) {
  let toast = $('#toast-msg');
  toast.html(message).addClass('show');

  // ৩ সেকেন্ড পর অটো হাইড
  setTimeout(function() {
    toast.removeClass('show');
  }, 3500);
}
</script>

