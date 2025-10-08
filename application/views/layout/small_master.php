<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php if (isset($title)) { echo $title; } ?> </title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="<?php echo base_url(); ?>public/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="<?php echo base_url(); ?>public/assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="<?php echo base_url(); ?>public/assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
         <!-- Include Toastr CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/toastr/toastr.min.css">
      <!-- Sweet Alert css-->
     <link href="<?php echo base_url(); ?>public/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
      <!-- Pace css -->
      <!-- <link href="<?php echo base_url(); ?>public/assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/> -->
      <!-- Font Awesome -->
      <link href="<?php echo base_url(); ?>public/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="<?php echo base_url(); ?>public/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="<?php echo base_url(); ?>public/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- dataTables css -->
      <link href="<?php echo base_url(); ?>public/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
       <!-- select2 css -->
       <link href="<?php echo base_url(); ?>public/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
      <!-- DataTables CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/datatables/jquery.dataTables.min.css">

      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="<?php echo base_url(); ?>public/assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
         <!-- Custom js -->
         <link href="<?php echo base_url(); ?>public/dist/css/main.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="<?php echo base_url(); ?>public/assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
       <!-- jQuery -->
       <script src="<?php echo base_url(); ?>public/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
         <!-- Include Toastr JavaScript -->
      <script src="<?php echo base_url(); ?>public/toastr/toastr.min.js"></script>
      <!-- Sweet Alerts js -->
      <script src="<?php echo base_url(); ?>public/sweetalert2/sweetalert2.min.js"></script>
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">

       <!-- alert -->
   <script>
    <?php if ($this->session->flashdata('success')): ?>
        toastr.success('<?php echo $this->session->flashdata('success'); ?>');
    <?php endif; ?>
    

    <?php if ($this->session->flashdata('error')): ?>
        toastr.error('<?php echo $this->session->flashdata('error'); ?>');
    <?php endif; ?>
      </script>
      <!-- Site wrapper -->
      <div class="wrapper">
        <!--   Header -->
    
        <input type="hidden" name="baseURL" id="baseURL" value="<?php echo base_url(); ?>">
            <!-- End  Header -->
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
 
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include('small_device/menu.php'); ?>
         </div>
         <!-- /.content-wrapper -->
           <!-- footer -->
            <?php include('footer.php'); ?>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
     
      <!-- jquery-ui --> 
      <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(); ?>public/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- Custome javascript -->
      <script src="<?php echo base_url(); ?>public/dist/js/main.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/dist/js/custom.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="<?php echo base_url(); ?>public/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="<?php echo base_url(); ?>public/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- table-export js -->
      <script src="<?php echo base_url(); ?>public/assets/plugins/table-export/tableExport.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/assets/plugins/table-export/jquery.base64.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/assets/plugins/table-export/html2canvas.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/assets/plugins/table-export/sprintf.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/assets/plugins/table-export/jspdf.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/assets/plugins/table-export/base64.js" type="text/javascript"></script>
      <!-- dataTables js -->
      <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
     <!-- /.select2 -->
     <script src="<?php echo base_url(); ?>public/select2/js/select2.min.js"></script>
      <!-- SlimScroll -->
      <script src="<?php echo base_url(); ?>public/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url(); ?>public/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="<?php echo base_url(); ?>public/assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="<?php echo base_url(); ?>public/assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
         <script>
new DataTable('#tableData');       
</script>
   </body>
</html>

