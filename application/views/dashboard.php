<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assest/admin_assest/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assest/admin_assest/css/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
     <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-md-3">
                 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">User Management</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">



<!-- Nav Item - Pages Collapse Menu -->
<?php 
foreach($permisions as $row)
{
    if($row['p_id']==$this->session->userdata('auth_user')['id']){
        
        ?>
        <li class="nav-item"style="margin-top:5px;">
       <?php if($row['pname']=='add_user'){?>
        <a style="color:white;margin-left:60px;"  href="<?= base_url() ?>admin/add">ADD USER</a>
      <?php }?>
       
       
   </li>
   
   <li class="nav-item"style="margin-top:5px;">
       <?php if($row['pname']=='user_list'){?>
        <a style="color:white;margin-left:60px;" href="<?= base_url() ?>welcome/index">USER LIST</a>
      <?php }?>
       
       
   </li>

   <li class="nav-item"style="margin-top:5px;">
       <?php if($row['pname']=='news'){?>
        <a style="color:white;margin-left:60px;" href="<?= base_url() ?>admin/news">NEWS</a>
      <?php }?>
       
       
   </li>
   <li class="nav-item"style="margin-top:5px;">
       <?php if($row['pname']=='add_blog'){?>
        <a style="color:white;margin-left:60px;" href="<?= base_url() ?>admin/add_blog">ADD BLOG</a>
      <?php }?>
       
       
   </li>
   <li class="nav-item"style="margin-top:5px;">
       <?php if($row['pname']=='blog_list'){?>
        <a style="color:white;margin-left:60px;" href="<?= base_url() ?>admin/blog_list">BLOG LIST</a>
      <?php }?>
       
       
   </li>
   <li class="nav-item"style="margin-top:5px;">
       <?php if($row['pname']=='contact'){?>
        <a style="color:white;margin-left:60px;" href="<?= base_url() ?>admin/contact">CONTACT</a>
      <?php }?>
       
       
   </li>

   <?php }
 
}
?>



   
           
</ul>
           </div>
           <div class="col-md-8 pt-5">
           <h1>welcome Dashboard</h1>
      <h5>username:<?= $this->session->userdata('auth_user')['username'];?></h5>
<?php if(! $this->session->has_userdata('authentication')){ ?>
<a href="<?= base_url('welcome/logout');?>">Logout</a>
<?php } ?>

</div>

        </div>
</div>

       
            </div>
           
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assest/admin_assest/vendor/jquery/jquery.min.js');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assest/admin_assest/vendor/jquery/jquery.min.js');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assest/admin_assest/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assest/admin_assest/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assest/admin_assest/vendor/chart.js/Chart.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assest/admin_assest/js/demo/chart-area-demo.js');?>"></script>
    <script src="<?php echo base_url('assest/admin_assest/js/demo/chart-pie-demo.js');?>"></script>

</body>

</html>