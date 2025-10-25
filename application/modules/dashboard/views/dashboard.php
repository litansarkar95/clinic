       <style>
                      .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      max-width: 1200px;
      margin: auto;
    }

    .card {
      background: #fff;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-left: 5px solid;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeUp 0.6s forwards;
    }

    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }
    .card:nth-child(5) { animation-delay: 0.5s; }
    .card:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .card-content {
      flex: 1;
    }

    .card h3 {
      font-size: 14px;
      color: #6c757d;
      text-transform: uppercase;
      margin-bottom: 6px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .card p {
      font-size: 32px;
      font-weight: bold;
      margin: 0;
    }

    .card i {
      font-size: 42px;
      opacity: 0.7;
      margin-left: 15px;
    }

    .card-order-pending {
      border-left-color: #ff6b6b;
    }

    .card-order-pending i {
      color: #ff6b6b;
    }

    .card-order-processing {
      border-left-color: #4dabf7;
    }

    .card-order-processing i {
      color: #4dabf7;
    }

    .card-order-completed {
      border-left-color: #51cf66;
    }

    .card-order-completed i {
      color: #51cf66;
    }

    .card-total-products {
      border-left-color: #f783ac;
    }

    .card-total-products i {
      color: #f783ac;
    }

    .card-total-customers {
      border-left-color: #748ffc;
    }

    .card-total-customers i {
      color: #748ffc;
    }

    .card-total-posts {
      border-left-color: #20c997;
    }
.card p {
  text-align: center;
  width: 100%;
}

    .card-total-posts i {
      color: #20c997;
    }

    @media (max-width: 768px) {
      .card {
        padding: 20px;
      }

      .card p {
        font-size: 24px;
      }

      .card i {
        font-size: 36px;
      }
    }
                    </style>
   <div class="container-fluid">
               

                  <div class="row px-3">
                    
                    <div class="col-6 col-sm-6 col-md-3 pb-4">
                      <a href="<?php echo base_url(); ?>billinfo/create" class="crd_4_link">
                        <div class="dashbord_card4 dashbord_card4_bg2">
                          <div class="card_top">
                            <span><i class="fas fa-plus"></i></span>
                          </div>
                          <div class="card_bottom">
                            <h3>Create Billing</h3>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 pb-4">
                      <a href="<?php echo base_url(); ?>billinfo/list" class="crd_4_link">
                        <div class="dashbord_card4 dashbord_card4_bg1">
                          <div class="card_top">
                            <span><i class="fas fa-list"></i></span>
                          </div>
                          <div class="card_bottom">
                            <h3>Billing List</h3>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 pb-4">
                      <a href="<?php echo base_url(); ?>patient" class="crd_4_link">
                        <div class="dashbord_card4 dashbord_card4_bg3">
                          <div class="card_top">
                            <span><i class="fas fa-list"></i></span>
                          </div>
                          <div class="card_bottom">
                            <h3>Customer List</h3>
                          </div>
                        </div>
                      </a>
                    </div>
                  
               
                  </div>
              


                 

  <script>
    const counters = document.querySelectorAll('.card p');

    counters.forEach(counter => {
      const animate = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;

        const speed = 20; // lower is faster
        const increment = Math.ceil(target / speed);

        if (count < target) {
          counter.innerText = count + increment;
          setTimeout(animate, 30);
        } else {
          counter.innerText = target;
        }
      };

      animate();
    });
  </script>
