<main class="main">
	<!-- Breadcrumb-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Dashboard</li>
		<!-- Breadcrumb Menu-->
		<li class="breadcrumb-menu d-md-down-none">
			<div class="btn-group" role="group" aria-label="Button group">
				<a class="btn" href="#">
					<i class="icon-speech"></i>
				</a>
				<a class="btn" href="./">
					<i class="icon-graph"></i>  Dashboard</a>
					<a class="btn" href="#">
						<i class="icon-settings"></i>  New Member</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-10">
							<div class="card">
								<div class="card-header">
									<strong>New Member</strong>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label for="amount" class="col-md-2 col-form-label">Member ID</label>
										<div class="col-md-10">
											<input class="form-control" id="amount" type="text" placeholder="Member ID">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">First Name</label>
										<div class="col-md-10">
											<input class="form-control" id="company" type="text" placeholder="Enter your First Name">
										</div>
									</div>
									<div class="form-group row">
										<label for="vat" class="col-md-2 col-form-label">Last Name</label>
										<div class="col-md-10">
											<input class="form-control" id="vat" type="text" placeholder="Enter your Last Name">
										</div>
									</div>
									<div class="form-group row">
										<label for="street" class="col-md-2 col-form-label">Email Address</label>
										<div class="col-md-10">
											<input class="form-control" id="street" type="email" placeholder="Enter your Email address">
										</div>
									</div>
									<div class="form-group row">
										<label for="city" class="col-md-2 col-form-label">Phone Number</label>
										<div class="col-md-10">
											<input class="form-control" id="city" type="text" placeholder="Enter your Phone number">
										</div>
									</div>
									<div class="form-group row">
										<label for="postal-code" class="col-md-2 col-form-label">Gender</label>
										<div class="col-md-10">
											<select name="gender" class="form-control">
												<option>Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="country" class="col-md-2 col-form-label">Date Of Birth</label>
										<div class="col-md-10">
											<input class="form-control" id="country" type="date" placeholder="Date of Birth">
										</div>
									</div>
									<input type="submit" name="submit" class="btn btn-danger" value="Register User" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>