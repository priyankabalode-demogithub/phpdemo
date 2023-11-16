
<?php $this->load->view('includes/header'); ?>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Add User</h5>
                <form method="post" id="frm" action="<?= base_url() ?>welcome/add">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" placeholder="Username" class="form-control" id="username"
                        value="<?php echo set_value('username');?>">
                        <?php echo form_error('username');?>
                    </div>
                   
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" 
                         value="<?php echo set_value('email');?>" aria-describedby="emailHelp">
                        <?php echo form_error('email');?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="password" 
                         value="<?php echo set_value('password');?>" aria-describedby="passwordHelp">
                        <?php echo form_error('password');?>
                    </div>
                   
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" maxlength="10" class="form-control" name="mobile" placeholder="Mobile" id="mobile"
                        value="<?php echo set_value('mobile');?>">
                        <?php echo form_error('mobile');?>
                    </div>
                    

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" placeholder="Address" class="form-control" id="address"
                        value="<?php echo set_value('address');?>">
                        <?php echo form_error('address');?>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
