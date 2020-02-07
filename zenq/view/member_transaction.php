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
						<i class="icon-settings"></i>  Transaction</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-10">
							<div class="card">
								<div class="card-header">
									<strong>New Member Transaction</strong>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label for="amount" class="col-md-2 col-form-label">Member ID</label>
										<div class="col-md-10">
											<input class="form-control" id="amount" type="text" placeholder="Member ID">
										</div>
									</div>

									<div class="form-group row">
										<label for="city" class="col-md-2 col-form-label">Amount</label>
										<div class="col-md-10">
											<input class="form-control" id="city" type="text" placeholder="Enter Amount">
										</div>
									</div>
									<div class="form-group row">
										<label for="postal-code" class="col-md-2 col-form-label">Type</label>
										<div class="col-md-10">
											<select name="gender" class="form-control">
												<option>Select Type</option>
												<option value="1">1</option>
												<option value="2">2</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="country" class="col-md-2 col-form-label">Summary</label>
										<div class="col-md-10">
                                            <textarea class="form-control" id="summary" placeholder="Short Or Long Description"></textarea>
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
