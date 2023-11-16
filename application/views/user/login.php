
<?php $this->load->view('includes/header'); ?>

<div class="container">
    <div class="row">
        <?php if($this->session->flashdata('status')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('status');?>
        </div>
        <?php endif;?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Login User</h5>
                <form method="post" id="frm" action="<?= base_url() ?>welcome/home">
                    
                   
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
                   
                
                    

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
