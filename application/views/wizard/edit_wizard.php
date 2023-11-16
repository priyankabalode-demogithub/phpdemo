
<?php $this->load->view('includes/header'); ?>

<div class="container">
    <div class="row demo1">
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="card-title text-center">Employee Info</h5> -->
                <form method="post" id="personal-info" action="">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">first name</label>
                        <input type="text" name="first_name" value="<?=$user->first_name?>" placeholder="first name" class="form-control" id="first_name"
                        value="<?php echo set_value('first_name');?>">
                        <?php echo form_error('first_name');?>
                    </div>
                   
                    <div class="mb-3">
                        <label for="last_name" class="form-label">last name</label>
                        <input type="text" class="form-control"  value="<?=$user->last_name?>" name="last_name" id="last_name" placeholder="last name" 
                         value="<?php echo set_value('last_name');?>" aria-describedby="last_nameHelp">
                        <?php echo form_error('last_name');?>
                    </div>

                   
                    

                    <button type="submit" id="submit-p" class="btn btn-primary">Next</button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row demo2" style="display:none">
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="card-title text-center">Employee Info</h5> -->
                <form method="post" id="frm" action="">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="number" name="mobile" value="<?=$user->mobile?>" placeholder="mobile" class="form-control" id="mobile"
                       >
                        <?php echo form_error('mobile');?>
                    </div>
                   
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?=$user->email?>" name="email" id="email" placeholder="email" 
                         value="<?php echo set_value('email');?>" aria-describedby="emailHelp">
                        <?php echo form_error('email');?>
                    </div>

                   
                    
                    <button type="submit" id="back-q" class="btn btn-primary">Back</button>
                    <button type="submit" id="submit-q" class="btn btn-primary">Next</button>
                    
                </form>
                
            </div>
        </div>
    </div>
    <div class="row demo3" style="display:none" >
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="card-title text-center">Employee Info</h5> -->
                <form method="post" id="frm" action="">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" value="<?=$user->address?>" placeholder="address" class="form-control" id="address"
                        value="<?php echo set_value('address');?>">
                        <?php echo form_error('address');?>
                    </div>
                   
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control"  value="<?=$user->city?>"name="city" id="city" placeholder="city" 
                         value="<?php echo set_value('city');?>" aria-describedby="cityHelp">
                        <?php echo form_error('city');?>
                    </div>

                   
                    
                    <button type="submit" id="back-r" class="btn btn-primary">Back</button>
                    <button type="submit" id="submit-r" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript" language="javascript">
      $(document).ready(function(){
        $("#submit-p").click(function(e){
            e.preventDefault();
                    $(".demo1").hide();
                    $(".demo2").show();
                    $(".demo3").hide();
                }
               
        );
        
        $("#submit-q").click(function(e){
            e.preventDefault();
           
                    $(".demo1").hide();
                    $(".demo2").hide();
                    $(".demo3").show();
               
        });

        $("#back-q").click(function(e){
            e.preventDefault();
           
            $(".demo1").show();
            $(".demo2").hide();
            $(".demo3").hide();
                    
        });

         $("#submit-r").click(function(e){
            e.preventDefault();
            var first_name = $("#first_name").val();
            var last_name= $("#last_name").val();
            var mobile= $("#mobile").val();
            var email= $("#email").val();
            var address=$("#address").val();
            var city=$("#city").val();

            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>wizard/edit/<?=$id?>',
                data: {first_name:first_name,last_name:last_name,mobile:mobile,
                    email:email,
                    address:address,
                    city:city
                },
                success:function(data)
                {
                    $(".demo1").hide();
                    $(".demo2").hide();
                    $(".demo3").show();
                    
                },
                error:function()
                {
                    alert('fail');
                }
            });
        });

        $("#back-r").click(function(e){
            e.preventDefault();
           
            $(".demo1").hide();
            $(".demo2").show();
            $(".demo3").hide();
                    
        });

        
    });
     

            </script>