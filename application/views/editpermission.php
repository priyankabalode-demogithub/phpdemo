<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    echo"<pre>";
     print_r($userpermission);?>
<h1>Welcome <?= $this->session->userdata('auth_user')['username'];?></h1>
<form method="post" id="frm" action="">
<input type="checkbox" id="pname" name="pname[]" value="add_user">Add User<br>
<input type="checkbox" id="pname" name="pname[]" value="user_list">List User<br>
<ul>
    
<input type="checkbox" id="sub_permission" name="sub_permission[]" value="edit_user">Edit<br>
<input type="checkbox" id="sub_permission" name="sub_permission[]" value="delete_user">Delete<br>
<input type="checkbox" id="sub_permission" name="sub_permission[]" value="user_admin">Make Admin<br>
<input type="checkbox" id="sub_permission" name="sub_permission[]" value="user_permission">Permission<br>

</ul>

<input type="checkbox" id="pname" name="pname[]" value="news">News<br>
<input type="checkbox" id="pname" name="pname[]" value="add_blog">Add Blog<br>
<input type="checkbox" id="pname" name="pname[]" value="blog_list">Blog list<br>
<input type="checkbox" id="pname" name="pname[]" value="contact">Contact<br>
<button type="submit" class="btn btn-primary">Save permission</button>
</form>
</body>
</html>