<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php
    foreach($permisions as $val){
       if($val['p_id']==$this->session->userdata('auth_user')['id']){
        if($val['pname']=='add_blog'){?>
            <h1>Add Blog</h1>
        <?php }?>
    
     <?php } 
      
    }?>
</body>
</html>