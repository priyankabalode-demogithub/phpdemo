<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <!-- <h1>Add User</h1> -->
    <?php
    foreach($permisions as $val){
       if($val['p_id']==$this->session->userdata('auth_user')['id']){
        if($val['pname']=='add_user'){?>
            <h1>Add User</h1>
        <?php }?>
    
     <?php } 
      
    }?>
    
   
</body>
</html>