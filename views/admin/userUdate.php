<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
}

?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Udate User</h1>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<form action="?page=userUdateController" method="POST" class="container-fluid">
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="hidden" value=<?php echo $id ?> name="id">
											<input type="text" value=<?php echo $name ?> name="name" id="name" class="form-control" placeholder="Name">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Email</label>
											<input type="text" value=<?php echo $email ?> name="email" id="email" class="form-control" placeholder="Email">	
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="phone">Phone</label>
											<input type="text" value=<?php echo $phone ?> name="phone" id="phone" class="form-control" placeholder="Phone">	
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="phone">Address</label>
											<textarea name="address" id="address" class="form-control" cols="30" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submite" class="btn btn-primary">Udate</button>
							<a href="?page=users" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</form>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>