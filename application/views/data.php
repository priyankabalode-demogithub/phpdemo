<h1>welcome Dashboard</h1>
<h5>username:<?= $this->session->userdata('auth_user')['username'];?></h5>
<?php if(! $this->session->has_userdata('authentication')){ ?>
<a href="<?= base_url('welcome/logout');?>">Logout</a>
<?php } ?>

composer require phpoffice/phpspreadsheet --ignore-platform-req=ext-gd

<?php if($val['is_admin'] != 1){ ?>
					<a href="<?=base_url()?>welcome/setpermission/<?=$val['id']?>" class="btn btn-sm btn-primary">Set Permission</a>
					<?php }?>