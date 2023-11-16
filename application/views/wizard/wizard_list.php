<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Codeiginator</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">User List</h3>

				<div class="card">
					<div class="card-body">
						<form action="<?= base_url() ?>" method="get">
						
							<div class="row g-3 align-items-center">
								<div class="col-auto">
									<label for="search_text" class="col-form-label">Search</label>
								</div>
								<div class="col-auto">
									<input type="text" placeholder="Search here" value="<?php if($this->input->get('search_text')){echo $this->input->get('search_text');}?>" id="search_text" name="search_text" class="form-control" aria-describedby="">
								</div>
								<div class="col-auto">
									<input type="submit" class="btn btn-primary" value="Search" >
								</div>
							</div>
						</form>
						<?php $i = 1;
								// foreach ($users as $row) { 
								// 	print_r($row);
								// }
								?>
						<table class="table table-striped table-bordered" style="margin-top: 20px">
							<thead>
								<tr>
								<th>SN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Options</th>

								</tr>
							</thead>
							<tbody>
							
								<?php $i = 1;
								foreach ($users as $val) { ?>
								
									<tr>
										<td><?= $i++ ?></td>
										<td><?= $val['first_name'] ?></td>
										<td><?= $val['last_name'] ?></td>
										<td><?= $val['mobile'] ?></td>
                                        <td><?= $val['email'] ?></td>
                                        <td><?= $val['address'] ?></td>
										<td><?= $val['city'] ?></td>
										
									
										<td>
                                <a href="<?=base_url()?>wizard/edit/<?=$val['id']?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?=base_url()?>wizard/delete/<?=$val['id']?>" onclick="return confirm('Are you sure want to delete this user ?')" class="btn btn-sm btn-danger">Delete</a>
								
                            </td>
									</tr>
									
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- <?=$links?> -->
					
				</div>
			</div>
		</div>
	</div>


    </div>
	</form>
  </div>
 
  
</div>
	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" 
      ></script>
	  
      <script></script>
	  <?php
	//   foreach($users as $row)
	//   {
	// 	  if($row['p_id']==$this->session->userdata('auth_user')['id']){
    //        echo $row['sub_permission'];
	// 	  }
	// 	}
	?>
	 
</body>

</html>