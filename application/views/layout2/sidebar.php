
<aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
               <li class="active">
                     <a href="<?php echo base_url(); ?>dashboard" class="<?php if($active == 'dashboard'){ echo 'activeColor';}?>" ><i class="fa fa-home"></i><span><?php echo display('dashboard'); ?></span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <?php 
             $loggedin_role_id = $this->session->userdata('loggedin_role_id');
            
            if($loggedin_role_id == 2  || $loggedin_role_id == 1){
               ?>

               <li class="treeview <?php if($active == 'designation' || $active == 'departments' ||  $active == 'staff_list' || $active == 'daily_attendance'|| $active == 'monthly_attendance' || $active == 'salary_allowance' ){ echo 'active';}?>">
               <a href="#" class="  <?php if($active == 'designation'  || $active == 'departments' || $active == 'staff_list' ){ echo 'activeColor';} ?>" >
                     <i class="fa fa-users"></i><span><?php echo display('human_resources'); ?></span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu <?php if($active == 'designation' || $active == 'departments' || $active == 'daily_attendance'  || $active == 'daily_attendance'  || $active == 'monthly_attendance' || $active == 'salary_allowance' ){ echo "menu-open"; }?> " <?php if($active == 'designation' || $active == 'departments' || $active == 'staff_list' || $active == 'daily_attendance' || $active == 'monthly_attendance' || $active == 'salary_allowance' ){ echo 'style="display: block;"'; }?> >
                        <li class="<?php if($active == 'designation'){ echo 'activeColorSub';}?>"><a href="<?php echo base_url(); ?>staff/designation" > <?php echo display('designation_list'); ?></a></li>
                        <li class="<?php if($active == 'departments'){ echo 'activeColorSub';}?>"><a href="<?php echo base_url(); ?>staff/departments" > <?php echo display('departments'); ?></a></li>
                        <li class="<?php if($active == 'staff_list'){ echo 'activeColorSub';}?>"><a href="<?php echo base_url(); ?>staff" > <?php echo display('employee_list'); ?></a></li>
                    
                     
                     </ul>
                  </li>
                  <li class="treeview <?php if($active == 'districts'  || $active == 'upazila' || $active == 'occupation'){ echo 'active';} ?>" >
                  <a href="#" class="  <?php if($active == 'districts'  || $active == 'upazila' || $active == 'occupation'){ echo 'activeColor';} ?>" >
                     <i class="fa fa-flask"></i>Base </span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu <?php if($active == 'districts'  || $active == 'upazila' || $active == 'occupation'){ echo "menu-open"; }?> " <?php if($active == 'districts' || $active == 'upazila' || $active == 'occupation'){ echo 'style="display: block;"'; }?> >
                        <li class="<?php if($active == 'districts'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>patient/districts" >Districts  </a></li>
                        <li class="<?php if($active == 'upazila'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>patient/upazila" >Upazila  </a></li>
                        <li class="<?php if($active == 'occupation'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>patient/occupation" >Occupation  </a></li>

                     </ul>
                  </li>
                  <li class="treeview <?php if($active == 'patient_create'  || $active == 'bill_invoice_list'){ echo 'active';} ?>" >
                  <a href="#" class="  <?php if($active == 'patient_create'  || $active == 'bill_invoice_list'){ echo 'activeColor';} ?>" >
                     <i class="fa fa-user"></i>Patient </span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu <?php if($active == 'patient_create'  || $active == 'bill_invoice_list'){ echo "menu-open"; }?> " <?php if($active == 'patient_create' || $active == 'bill_invoice_list'){ echo 'style="display: block;"'; }?> >
                        <li class="<?php if($active == 'patient_create'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>patient/create" >Patient Create </a></li>
                        <li class="<?php if($active == 'bill_invoice_list'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>billinfo/list" >Bill Invoice List </a></li>

                     </ul>
                  </li>
                  <li class="treeview <?php if($active == 'doctors_list'  ){ echo 'active';}?>">
                     <a href="#" class="  <?php if($active == 'doctors_list'){ echo 'activeColor';} ?>">
                     <i class="fa fa-user-md"></i><span>Doctors</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                  <ul class="treeview-menu <?php if($active == 'doctors_list' ){ echo "menu-open"; }?> " <?php if($active == 'doctors_list'  ){ echo 'style="display: block;"'; }?> >
                        <li class="<?php if($active == 'doctors_list'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>billinfo/doctors" > Doctors List</a></li>


                      </ul> 
                  </li>
                 
                
                  <li class="treeview <?php if($active == 'transactionReport' || $active == 'purchase_reports' || $active == 'due_customer'  || $active == 'supplier_due' || $active =='sales_ledger_reports'){ echo 'active';} ?>" >
                  <a href="#" class="  <?php if($active == 'transactionReport'  || $active == 'purchase_reports' || $active == 'due_customer' || $active == 'supplier_due' || $active =='sales_ledger_reports'){ echo 'activeColor';} ?>" >
                     <i class="fa fa-bug"></i><span><?php echo display('reports'); ?></span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu <?php if($active == 'transactionReport' || $active == 'purchase_reports'  || $active == 'due_customer'  || $active == 'supplier_due' || $active =='sales_ledger_reports'){ echo "menu-open"; }?> " <?php if($active == 'transactionReport' || $active =='purchase_reports' || $active == 'due_customer' || $active == 'supplier_due' || $active =='sales_ledger_reports'){ echo 'style="display: block;"'; }?> >
                        <li class="<?php if($active == 'transactionReport'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>reports/transactionReport" > Transaction Report</a></li>
                       <li class="<?php if($active == 'DuetransactionReport'){ echo 'activeColorSub';}?>" ><a href="<?php echo base_url(); ?>reports/transactionReport/duereports" > Due Transaction Report</a></li>
                     

                     </ul>
                  </li>
                  <li class="treeview <?php if($active == 'general_settings'){ echo 'active';}?> ">
                     <a href="#">
                     <i class="fa fa-gear"></i>
                     <span><?php echo display('settings'); ?></span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu <?php if($active == 'general_settings'){ echo "menu-open"; }?> " <?php if($active == 'general_settings'){ echo 'style="display: block;"'; }?> >
                        <li><a href="<?php echo base_url()."settings/general_settings"; ?>" <?php if($active == 'general_settings'){ echo 'style="color:#009688;"';}?>><?php echo display('general_settings'); ?></a></li>
                
                        <?php
                         $is_superadmin = $this->session->userdata("is_superadmin");
                         $role_slug     = $this->session->userdata("role_slug"); 
                         //if ($this->auth->logged_in() && $is_superadmin  == $role_slug) { 
                        ?>
                        <li><a href="<?php echo base_url()."settings/database_backup"; ?>">Database Backup</a></li> 

                        <?php
                        // }
                        ?>
                     </ul>
                  </li>
               <?php
                  } 
               ?>

           
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>