<main class="main">
	<!-- Breadcrumb-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Loans</li>
		<!-- Breadcrumb Menu-->
		<li class="breadcrumb-menu d-md-down-none">
			<div class="btn-group" role="group" aria-label="Button group">
				<a class="btn" href="#">
					<i class="icon-speech"></i>
				</a>
				<a class="btn" href="./">
					<i class="icon-graph"></i>  Dashboard</a>
					<a class="btn" href="./">
						<i class="icon-graph"></i>  Loans
					</a>
					<a class="btn" href="#">
						<i class="icon-settings"></i>  Loan Prepare Form</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-10">
							<div class="card">
								<div class="card-header">
									<strong>Loan Prepare Form</strong>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label for="amount" class="col-md-2 col-form-label">Loan Product</label>
										<div class="col-md-10">
											<select class="form-control" id="amount" type="text">
												<option>Choose Type</option>
												<option value="Bussiness Loan">Business Loan</option>
												<option value="Overseas Worker Loan">Overseas Worker Loan</option>
												<option value="Prisoner Loan">Prisoner Loan</option>
												<option value="Personal Loan">Personal Loan</option>
												<option value="Student Loan">Student Loan</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="amount" class="col-md-2 col-form-label">Borrower</label>
										<div class="col-md-10">
											<select class="form-control" id="amount" type="text">
												<option>Select Borrower</option>
												<option value="Bussiness Loan"></option>
											</select>
										</div>
									</div>
									<!--breaker header-->
									<div class="row" style="background: #d2d6de;">
										<div class="col-sm-12 m-1 pt-1">
											<h6>Loan Terms (required fields):</h6>
										</div>
									</div>
									<h6 style="color:red;" class="mt-1">Principal:</h6>
									<div class="form-group row mt-2">
										<label for="amount" class="col-md-2 col-form-label">Disbursed By</label>
										<div class="col-md-10">
											<select class="form-control" id="amount" type="text">
												<option value="Cash">Cash</option>
												<option value="Cheque">Cheque</option>
												<option value="Wire Transfer">Wire Transfer</option>
												<option value="Online Transfer">Online Transfer</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="interest" class="col-md-2 col-form-label">Principal Amount</label>
										<div class="col-md-10">
											<input class="form-control" id="interest" type="text" placeholder="Principal Amount">
										</div>
									</div>
									<div class="form-group row">
										<label for="interest" class="col-md-2 col-form-label">Loan Release Date </label>
										<div class="col-md-10">
											<input class="form-control" id="interest" type="date" placeholder="Number of Months">
										</div>
									</div>
									<!--breaker header-->
									<div class="row" style="background: #d2d6de;">
										<div class="col-sm-12 m-1 pt-1">
											<h6>Loan Terms (required fields):</h6>
										</div>
									</div>
									<div class="form-group row">
										<label for="interest" class="col-md-2 col-form-label">Date </label>
										<div class="col-md-10">
											<input class="form-control" id="interest" type="date" placeholder="Date">
										</div>
									</div>
									<input type="submit" name="submit" class="btn btn-danger" value="Prepare Loan" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>