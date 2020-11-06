@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap4-select2-theme@1.0.3/src/css/bootstrap4-select2-theme.css" rel="stylesheet" /> -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<style type="text/css">
	.step {
		display: none;
	}
	.step.active {
		display: inline;
	}
	.step.finish {
		background-color: #4CAF50;
	}.
	.pointer{
		cursor: pointer;
	}
	a.setting-list:not([href]):not([tabindex]):hover {
		cursor: pointer;
	}
</style>
<main role="main">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-danger">Open Jobs</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#" id="openJob"></a>
						</h3>
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-warning">Ready Jobs</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#" id="readyJob"></a>
						</h3>
						<!-- <div class="mb-1 text-muted">Nov 12</div>
						<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-primary">Progress Jobs</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#" id="progressJob"></a>
						</h3>
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-success">Done Jobs</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#" id="doneJob"></a>
						</h3>
						<!-- <div class="mb-1 text-muted">Nov 12</div>
						<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2 text-default">Total Job</strong>
						<h3 class="mb-0">
							<a class="text-dark" href="#" id="totalJob"></a>
						</h3>
						<!-- <div class="mb-1 text-muted">Nov 12</div>
						<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
						<a href="#">See All</a> 
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="d-inline-flex align-items-center">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" onclick="showTab(0)">
						<i class="fas fa-plus"></i> Add Job
					</button>
					<h3 style="margin-bottom: 0px !important" class="ml-3">Job List</h3>	
					<i class="fas fa-cog" style="margin-left: 15px;color:#6c757d" data-toggle="dropdown" id="navbarDropdown">                       
					</i>	
					<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
	                    <a class="dropdown-item setting-list" data-value='list'>Move to List <i class="fa fa-list" style="margin-left: 5px"></i></a>
	                    <a class="dropdown-item setting-list" data-value="grid">Move to Card <i class="fas fa-square" style="margin-left: 5px"></i></a>
	                </div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="d-inline-flex pb-3 border-bottom" style="float: right;">
					
					<div class="btn-group" style="padding-right: 10px">
						<button data-toggle="dropdown" type="button" onclick="jobStatusFilter()" class="btn btn-secondary dropdown-toggle dropbtn">Filter <i class="fas fa-filter"></i></button>
						<div class="dropdown-menu statusContent" id="jobStatusContent">
						</div>
					</div>
					<div class="btn-group" role="group">
						<button id="jobShowCount" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Show 10</button>
						<div class="dropdown-menu" id="jobShowCountList">
							<span class="dropdown-item active pointer" onclick="changeJobShowCount(10)">10 List</span>
							<span class="dropdown-item pointer" onclick="changeJobShowCount(25)">25 List</span>
							<span class="dropdown-item pointer" onclick="changeJobShowCount(50)">50 List</span>
						</div>
					</div>
					<div class="ml-2 input-group">
						<input type="text" id="jobSearch" name="jobSearch" class="form-control jobSearch" placeholder="Search" onchange="changeSearch(this.value)">
						<div class="input-group-append">
							<button type="button" class="btn btn-secondary" onclick="changeSearch(document.getElementById('jobSearch').value)"><i class="fas fa-search"></i></button>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="row resultSearch" style="display: none;">
			<div class="col-md-6 mb-2 mt-1">
				<p class="mb-0 resultSearchCount">12 result</p>
			</div>
			<div class="col-md-6 text-right mb-2 mt-1">
				<p class="mb-0 resultSearchKeyword">Search for : BPJS Kesehatan</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="jobHolder">
				<!--content disini-->
				<div class="col-md-12" id="paginationJob">
					<nav aria-label="Page navigation example" class="ml-auto">
						
					</nav>
				</div>
			</div>
			<div class="col-md-6" id="jobSumaryHolder" style="display: none">
				<div class="col-md-12">
				</div>
			</div>
		</div>
	</div>
</main>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Create New Jobs</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate="">
					<div class="tab" style="display: none;">
						<div class="mb-3">
							<label for="client">Client</label>
							<select class="custom-select d-block w-100" id="inputJobClient" required="" style="width: 100%">
								<option value="">Choose...</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid Client.
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 mb-3">
								<label for="country">Region</label>
								<select class="custom-select d-block w-100" id="inputJobRegion" required="" style="width: 100%">
									<option value="">Choose...</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="state">Area</label>
								<select class="custom-select d-block w-100" id="inputJobArea" required="" style="width: 100%" disabled>
									<option value="">Choose...</option>
								</select>
							</div>
							<div class="col-md-4 mb-3">
								<label for="zip">Location</label>
								<select class="custom-select d-block w-100" id="inputJobLocation" required="" style="width: 100%" disabled>
									<option value="">Choose...</option>
								</select>
							</div>
						</div>

						<div class="mb-3">
							<label for="country">Person In Charge</label>
							<select class="custom-select d-block w-100" id="inputJobPic" required="">
								<option value="">Choose...</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid PIC.
							</div>
							<small class="text-primary" style="cursor: pointer;" onclick="showAddPIC()">
								+ Add here if PIC Not Exist
							</small>
						</div>
						<div class="row" id="addPICField" style="display: none;">
							<div class="col-md-4 mb-3">
								<label for="jobTitle">PIC Name</label>
								<input type="text" class="form-control" id="jobTitle" required="">
								<div class="invalid-feedback">
									Please enter the Job Title.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="jobTitle">Contact Number</label>
								<input type="text" class="form-control" id="jobTitle" required="">
								<div class="invalid-feedback">
									Please enter the Job Title.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="jobTitle">Email</label>
								<input type="text" class="form-control" id="jobTitle" required="">
								<div class="invalid-feedback">
									Please enter the Job Title.
								</div>
							</div>
						</div>
					</div>
					<div class="tab" style="display: none;">
						<div class="mb-3">
							<label for="country">Level</label>
							<select class="custom-select d-block w-100" id="inputJobLevel" required="">
								<option value="">Choose...</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid Level.
							</div>
						</div>

						<div class="mb-3">
							<label for="country">Category</label>
							<select class="custom-select d-block w-100" id="inputJobCategory" required="">
								<option value="">Choose...</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid Client.
							</div>
						</div>

						<div class="mb-3">
							<label for="jobTitle">Note (Optional)</label>
							<input type="text" class="form-control" id="inputJobNote" required="">
							<div class="invalid-feedback">
								Please enter the Job Title.
							</div>
						</div>
					</div>
					<div class="tab" style="display: none;">
						<div class="mb-3">
							<label for="jobTitle">Job Title</label>
							<input type="text" class="form-control" id="inputJobTitle" required="">
							<div class="invalid-feedback">
								Please enter the Job Title.
							</div>
						</div>

						<div class="mb-3">
							<label for="jobTitle">Range Date</label>
							<input type="text" class="form-control" id="inputJobRangeDate" required="">
						</div>

						<div class="mb-3">
							<label for="jobDescription">Job Description</label>
							<textarea class="form-control" id="inputJobDescription" rows="3" required=""></textarea>
							<div class="invalid-feedback">
								Please enter the Job Description.
							</div>
						</div>

						<div class="mb-3">
							<label for="jobRequirement">Job Requirement</label>
							<textarea class="form-control" id="inputJobRequirement" rows="3" required=""></textarea>
							<div class="invalid-feedback">
								Please enter the Job Requirement.
							</div>
						</div>

						<div class="mb-3">
							<label for="jobRequirement">Job Address</label>
							<textarea class="form-control" id="inputJobAddress" rows="3" required=""></textarea>
							<div class="invalid-feedback">
								Please enter the Job Requirement.
							</div>
						</div>
					</div>
					<div class="tab" style="display: none;">
						<div class="d-block mb-3">
							<div class="custom-control custom-radio">
								<input id="base" value="base" name="paymentMethod" type="radio" class="custom-control-input" required="">
								<label class="custom-control-label" for="base">Base Payment</label>
							</div>
							<!-- <div class="custom-control custom-radio">
								<input id="range" value="range" name="paymentMethod" type="radio" class="custom-control-input" required="">
								<label class="custom-control-label" for="range">Range Payment</label>
							</div> -->
						</div>

						<div id="basePaymentInput">
						<!-- <div id="basePaymentInput" style="display: none"> -->
							<div class="mb-3">
								<label for="jobRequirement">Base Payment</label>
								<input type="text" class="form-control" id="inputJobPriceBase" data-type="currency" placeholder="IDR 100.000" required="">	
								<div class="invalid-feedback">
									Please enter the Job Requirement.
								</div>
							</div>
						</div>

						<div id="rangePaymentInput" style="display: none">
							<div class="mb-2">Range Payment</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<!-- <label for="jobTitle">Start Range</label> -->
									<input type="text" class="form-control" id="jobTitle" data-type="currency" placeholder="Start Range" required="">
									<div class="invalid-feedback">
										Please enter the Job Title.
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<!-- <label for="jobTitle">End Range</label> -->
									<input type="text" class="form-control" id="jobTitle" data-type="currency" placeholder="End Range" required="">
									<div class="invalid-feedback">
										Please enter the Job Title.
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="option1">
							<label class="custom-control-label" for="option1">Activate Point Member</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="option2">
							<label class="custom-control-label" for="option2">Count Error To Deduct</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="option3">
							<label class="custom-control-label" for="option3">Early complate increase</label>
						</div> -->
					</div>
					<div class="tab" style="display: none;">
						<div class="row">
							<div class="col-md-6">
								<strong class="text-primary" id="finaliseClient">PT. Sinergy Informasi Pratama</strong>
								<p id="finaliseLocation">Madura - Jawa Timur - Jawa</p>
							</div>
							<div class="col-md-6 text-right">
								<strong id="finalisePic">Brilian Aditiya [082302474400]</strong>
								<p id="finalisePicEmail">brliliyan@bpjskesehatan.go.id</p>
							</div>
						</div>
						<hr class="mb-4 mt-0">
						<div class="mb-3">
							<h2 class="text-primary" id="finaliseJobTitle">Upgrade PC Client KC Madura</h2>
						</div>
						<div class="row">
							<div class="col-md-6">
								<strong id="finaliseJobCategory"><i class="fas fa-hard-hat"></i> [Hardware] Utility Engineer</strong>
								<p id="finaliseJobLevel"><i class="fas fa-signal"></i> Level 3 - Third Entry</p>
							</div>
							<div class="col-md-6 text-right">
								<strong>Job Duration</strong>
								<p id="finaliseJobDuration"><i class="fas fa-calendar-alt"></i> 1 Desember - 21 Desember 2020</p>
							</div>
						</div>
						<hr class="mb-4 mt-0">
						<div class="row">
							<div class="col-md-6" id="finaliseJobDescription">
								<h4>Job Description</h4>
									- Developing a highly concurent and distrubed system<br>
									- Performance Optimazitation and problem diagnosis<br>
									- Designing/Developint for high-availability<br>
									- Designing/Developing and testing new features<br>
									- Estimating the effort requeired to develop<br>
									- Help define coding standrads and develpo process<br>
									- Willing to learn & adapt different technologies<br>
									- Create internal software<br><br>
							</div>
							<div class="col-md-6" id="finaliseJobRequirement">
								<h4>Job Requirement</h4>
									- Experience with HTTP and RPC base service<br>
									- Avibility to carefully breakdown the problem<br>
									- Be abel to debug non-trivial application code<br>
									- Experience with SQL and NoSQL database<br>
									- Proficient with Git, and Github<br>
									- Strong Data Structures & Algorithms concepts<br><br>
							</div>
						</div>
						<hr class="mb-4 mt-0">
						<div class="mb-3" id="finaliseJobAddress">
							<h4>Job Address</h4>
							Head Quarter - PT. Sinergy Informasi Pratama 7631 Ashley Ave. Owosso, MI 48867
						</div>
						<hr class="mb-4 mt-0">
						<div class="row">
							<div class="col-md-6">
								<h4>Payment Option</h4>
								<!-- <strong class="d-inline-block text-primary">Activate Point Member</strong><br>
								<strong class="d-inline-block text-primary">Count Error To Deduct</strong><br>
								<strong class="d-inline-block text-primary">Early complate increase</strong> -->
							</div>
							<div class="col-md-6 text-right">
								<h4>Base Payment Method</h4>
								<strong>Total : </strong> <span id="finaliseJobPrice">$100.00</span>
							</div>
						</div>
						
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="mr-auto">
					<span class="step" style="display: none;">1. Initial job</span>
					<span class="step" style="display: none;">2. Worker competence</span>
					<span class="step" style="display: none;">3. Job detail</span>
					<span class="step" style="display: none;">4. Price establishing</span>
					<span class="step" style="display: none;">5. Finalise</span>
				</div>
				<button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Back</button>
				<button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="showSummaryModal" tabindex="-1" role="dialog" aria-labelledby="showSummaryModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Job Sumary</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body card-body d-flex flex-column">
				<div class="ml-1">
					<div class="d-flex d-inline-block align-items-center">
						<strong class="text-primary" id="jobSumaryHolderCustomer">PT. Sinergy Informasi Pratama</strong>
						<!-- <span class="ml-auto badge badge-success" id="statusShowSummary">Done</span> -->
						<div class="ml-auto" id="statusShowSummary"></div>
					</div>
					<h2 class="mb-2" id="jobSumaryHolderTitle">
						Create Internal Software
					</h2>
					<h5>Job Description</h5>
					<p id="jobSumaryHolderDescription">
					</p>
					<h5>Job Requirement</h5>
					<p id="jobSumaryHolderRequirement">
					</p>
					<p>
						<span id="jobSumaryHolderAddress"><i class="fas fa-building"></i> Head Quarter - PT. Sinergy Informasi Pratama </span><br>
						<span id="jobSumaryHolderLocation"><i class="fas fa-map-marker"></i> Kembangan - Jakarta Barat - Jakarta </span><br>
						<span id="jobSumaryHolderLevel"><i class="fas fa-signal"></i> Level 3 </span><br>
						<span id="jobSumaryHolderDuration"><i class="fas fa-calendar-alt"></i> 1 Desember - 21 Desember 2020 </span><br>
					</p>
					<hr>
					<p id="jobSumaryHolderLatest"><b>Latest Update</b><br>
					16 June - 15:36 [Alam] <br>
					Panding Ticket - waiting part controler, eta sedan dikordinasikan</p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary ml-auto" id="jobSumaryHolderButton">Show More</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.2/cjs/popper.min.js"></script> -->
<!-- <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2"></script> -->

<script type="text/javascript">
	// Jquery Dependency

	$(document).ready(function(){

		getDashboard();
		// $("#jobSearch").on('change',function(){
			
			
		// })
		// $("#jobSearch").on('change',function(){
		// 	if($("#jobSearch").val() != ""){
		// 		fillDataJobList("dashboard/getJobListAndSumary/search?search=" + $("#jobSearch").val() + "&type=list","POST")
		// 	} else {
		// 		// fillDataJobList("dashboard/getJobListAndSumary/paginate?type=list","GET")
		// 		// $(".resultSearch").hide()
		// 	}
		// })
		
		
		fillDataJob("dashboard/getJobListAndSumary/paginate?type=card","GET")

		$("#inputJobClient").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterClientAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll",
				dataType: 'json',
			}
		});

		$("#inputJobRegion").on('select2:select', function (e) {
			var id_region = e.params.data.id;
			$("#inputJobArea").prop("disabled", false)
			$("#inputJobArea").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll?level=2&region=" + id_region,
					dataType: 'json',
				}
			});
		})

		$("#inputJobArea").on('select2:select', function (e) {
			var id_area = e.params.data.id;
			$("#inputJobLocation").prop("disabled", false)
			$("#inputJobLocation").select2({
				theme: 'bootstrap4',
				ajax: {
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLocationAll?level=3&area=" + id_area,
					dataType: 'json',
				}
			});
		})

		$("#inputJobPic").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterPicAll",
				dataType: 'json',
			}
		})

		$("#inputJobLevel").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterLevelAll",
				dataType: 'json',
			}
		})

		$("#inputJobCategory").select2({
			theme: 'bootstrap4',
			ajax: {
				url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterCategoryAll",
				dataType: 'json',
			}
		})

		$("#inputJobRangeDate").daterangepicker({
			"locale": {
				"format": "DD/MM/YYYY"
			}
		})

		$("input[data-type='currency']").on({
				keyup: function() {
					formatCurrency($(this));
				},
				blur: function() { 
					formatCurrency($(this), "blur");
				}
		});

		$('input[type=radio][name=paymentMethod]').change(function() {
			if (this.value == 'base') {
				$("#basePaymentInput").show()
				$("#rangePaymentInput").hide()
			}
			else if (this.value == 'range') {
				$("#rangePaymentInput").show()
				$("#basePaymentInput").hide()

			}
		});

	})

	function changeSearch(val)
	{
		console.log("tes");
		if ($(".jobHolderItem").is(':visible')) {
			if(val != ""){
				fillDataJob("dashboard/getJobListAndSumary/search?search=" + $("#jobSearch").val() + "&type=card","GET")
			} else {
				fillDataJob("dashboard/getJobListAndSumary/paginate?type=card","GET")
				$(".resultSearch").hide()
			}
		}else{
			if(val != ""){
				fillDataJobList("dashboard/getJobListAndSumary/search?search=" + $("#jobSearch").val() + "&type=list","GET")
			} else {
				fillDataJobList("dashboard/getJobListAndSumary/paginate?type=list","GET")
				$(".resultSearch").hide()
			}
		}
	}

	function jobStatusFilter(){
		var element = document.getElementById("jobStatusContent");
		element.classList.toggle("statusContent");

		var status = ["Open","Ready","Progress","Done"];

		var append = "";
		for (var i = 0 ; i < status.length; i++) {
			if (i == 0) {
				// var onclick = "jobFilter('"+ status[i] +"')";
				var onclick = "jobFilter('dashboard/getJobListAndSumary/FilterStatus?search=" + status[i] + "','POST')";

				append = append + '<span class="active dropdown-item pointer" onclick="'+ onclick +'">'+ status[i] +'</span>';
			}else{
				var onclick = "jobFilter('dashboard/getJobListAndSumary/FilterStatus?search=" + status[i] + "','POST')";

				append = append + '<span class="dropdown-item pointer" onclick="'+ onclick +'">'+ status[i] +'</span>';
			}
			
		}

		$("#jobStatusContent").html(append);
	}

	function jobFilter(url,method){
		console.log(url);
		$.ajax({
			type:method,
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
			success: function (result) {
				$(".jobHolderItem").remove()
				var prepend = "<div class='row jobHolderItem'>"
				var n = 25
				$.each(result["data"], function( index, value ) {
					if(value['job_status'] == "Open"){
						var badgeJob = "danger"
					} else if(value['job_status'] == "Ready"){
						var badgeJob = "warning"
					} else if(value['job_status'] == "Progress"){
						var badgeJob = "primary"
					} else if(value['job_status'] == "Done"){
						var badgeJob = "success"
					}
					jobName = value['job_name'].length > n ? value['job_name'].slice(0,n) + "..." : value['job_name']
					prepend = prepend + '<div class="col-md-6">'
					prepend = prepend + '	<div class="card flex-md-row mb-4 shadow-sm"  border-radius:.25rem;">'
					prepend = prepend + '		<div class="flex-md-row card" style="width:165px;background: url(' + value['category']['category_image_url'] + ');background-repeat: no-repeat;background-size: 100% 100%;background-color:#f6f6f6;object-fit:cover">'
					prepend = prepend + '			<div style="position: absolute;bottom: 0px;left: 0px;font-size: medium;">'
					prepend = prepend + '				<span class="badge badge-' + badgeJob + '">' + value['job_status'] + '</span>'
					prepend = prepend + '			</div>'
					prepend = prepend + '		</div>'
					prepend = prepend + '		<div class="card-body d-flex flex-column align-items-start">'
					prepend = prepend + '			<strong class="d-inline-block mb-2 text-primary">' + value['customer']['customer_name'] + '</strong>'
					prepend = prepend + '			<h4 class="mb-0">'
					prepend = prepend + '				<a class="text-dark" href="#">' + jobName + '</a>'
					prepend = prepend + '			</h4>'
					prepend = prepend + '			<div class="mb-0 text-muted">' + moment(value['date_start']).format("DD MMMM") + " - " + moment(value['date_end']).format("DD MMMM YYYY") + '</div>'
					
					//numeric format rupiah
					var	number_string = value.job_price.toString(),
					split	= number_string.split(','),
					sisa 	= split[0].length % 3,
					rupiah 	= split[0].substr(0, sisa),
					ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
						
					if (ribuan) {
						separator = sisa ? '.' : '';
						rupiah += separator + ribuan.join('.');
					}
					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;


					prepend = prepend + '<div class="mb-0">'+ 'Rp.' + rupiah +'</div>'
					prepend = prepend + '<div class="mb-0 ml-auto">'
					prepend = prepend + '			<span class="ml-auto text-primary" style="cursor: pointer;" href="#" onclick="showSumary(' + value['id'] + ')">Show Summary</span>'
					prepend = prepend + '</div>'
					prepend = prepend + '		</div>'
					prepend = prepend + '	</div>'
					prepend = prepend + '</div>'
				});
				$("#jobHolder").prepend(prepend + "</div>")				

				$("#jobPaginateHolder").empty("")
				var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
				var first_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
				var second_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
				var third_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
				
				if(result["current_page"] == 1){
					previous = "disabled"
					first = result["current_page"],first_active = "active"
					second = result["current_page"] + 1 
					third = result["current_page"] + 2

					var first_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var second_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
					var previous_onclick = ""

					if(result["last_page"] == 1){
						next = "disabled"
						var next_onclick = ""
					} else {
						var next_onclick = second_onclick
					}
				} else if (result["current_page"] == result["last_page"]){
					previous = ""
					next = "disabled"
					if(result["last_page"] == 2){
						first = result["current_page"] - 1
						second = result["current_page"], second_active = "active"
						third = result["current_page"]
					} else {
						first = result["current_page"] - 2
						second = result["current_page"] - 1
						third = result["current_page"],third_active = "active"
					}

					var first_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
					var second_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var previous_onclick = second_onclick
					var next_onclick = ""

				} else {
					next = ""
					previous = ""
					first = result["current_page"] - 1
					second = result["current_page"],second_active = "active"
					third = result["current_page"] + 1
					var previous_onclick = first_onclick
					var next_onclick = third_onclick

				}
				var append = ""
				append = append + '<li class="page-item ' + previous + '" ' + previous_onclick + '><span class="page-link">Previous</span></li>'
				append = append + '<li class="page-item ' + first_active + '" ' + first_onclick + '><span class="page-link">' + first + '</span></li>'
				if(result["last_page"] > 1){
					append = append + '<li class="page-item ' + second_active + '" ' + second_onclick + '><span class="page-link">' + second + '</span></li>'
				}
				if(result["last_page"] > 2){
					append = append + '<li class="page-item ' + third_active + '" ' + third_onclick + '><span class="page-link">' + third + '</span></li>'
				}
				append = append + '<li class="page-item ' + next + '" ' + next_onclick + '><span class="page-link">Next</span></li>'
				
				$("#jobPaginateHolder").append(append)
				if(method == "POST"){
					if(result['total'] == 0){
						$(".resultSearchCount").empty("").text("Not found")
						$("#paginationJob").hide()
					} else {
						$(".resultSearchCount").empty("").text(result["total"] + " results")
					}
					$(".resultSearchKeyword").empty("").text("Search for : " + url.split("=")[1])
					$(".resultSearch").show()
				} else {
					$(".resultSearch").hide()
				}

			}
		})
	}

	function getDashboard(){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/dashboard/getDashboardModerator",
			success: function(result){
				console.log(result);
				$("#openJob").text(result.open)
				$("#readyJob").text(result.ready)
				$("#progressJob").text(result.progress)
				$("#doneJob").text(result.done)
				$("#totalJob").text(result.total)
			}
		})
	}

	function changeJobShowCount(n){
		$("#jobShowCount").text("Show " + n)
		var active_10 = (n == 10) ? 'active' : ''
		var active_25 = (n == 25) ? 'active' : ''
		var active_50 = (n == 50) ? 'active' : ''
		var append = ""
		append = append + '<span class="dropdown-item ' + active_10 + '" onclick="changeJobShowCount(10)">10 List</span>'
		append = append + '<span class="dropdown-item ' + active_25 + '" onclick="changeJobShowCount(25)">25 List</span>'
		append = append + '<span class="dropdown-item ' + active_50 + '" onclick="changeJobShowCount(50)">50 List</span>'
		$("#jobShowCountList").empty()
		$("#jobShowCountList").append(append)
		if ($(".jobHolderItem").is(':visible')) {
			if($("#jobSearch").val() != ""){
				fillDataJob("dashboard/getJobListAndSumary/search?search=" + $("#jobSearch").val() + "&type=card","GET")
			} else {
				fillDataJob("dashboard/getJobListAndSumary/paginate?type=card","GET")
				$(".resultSearch").hide()
			}
		}else{
			if($("#jobSearch").val() != ""){
				fillDataJobList("dashboard/getJobListAndSumary/search?search=" + $("#jobSearch").val() + "&type=list","GET")
			} else {
				fillDataJobList("dashboard/getJobListAndSumary/paginate?type=list","GET")
				$(".resultSearch").hide()
			}
		}

	}

	function fillDataJob(url,method){
		$.ajax({
			type:method,
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
			success: function (result) {
				
				var n = 25
				var prepend = "<div class='row jobHolderItem'>"

				$(".jobHolderItem").remove()
				$.each(result["data"], function( index, value ) {
					if(value['job_status'] == "Open"){
						var badgeJob = "danger"
					} else if(value['job_status'] == "Ready"){
						var badgeJob = "warning"
					} else if(value['job_status'] == "Progress"){
						var badgeJob = "primary"
					} else if(value['job_status'] == "Done"){
						var badgeJob = "success"
					}
					jobName = value['job_name'].length > n ? value['job_name'].slice(0,n) + "..." : value['job_name']
					prepend = prepend + '<div class="col-md-6">'
					prepend = prepend + '	<div class="card flex-md-row mb-4 shadow-sm"  border-radius:.25rem;">'
					// prepend = prepend + '		<div style="width:160px;height: 148px;background: url(' + value['category']['category_image_url'] + ');background-repeat: no-repeat;background-position: center;">'
					prepend = prepend + '		<div class="flex-md-row card" style="width:165px;background: url(' + value['category']['category_image_url'] + ');background-repeat: no-repeat;background-size: 100% 100%;background-color:#f6f6f6;">'
					prepend = prepend + '			<div style="position: absolute;bottom: 0px;left: 0px;font-size: medium;">'
					prepend = prepend + '				<span class="badge badge-' + badgeJob + '">' + value['job_status'] + '</span>'
					prepend = prepend + '			</div>'
					prepend = prepend + '		</div>'
					prepend = prepend + '		<div class="card-body d-flex flex-column align-items-start">'
					prepend = prepend + '			<strong class="d-inline-block mb-2 text-primary">' + value['customer']['customer_name'] + '</strong>'
					prepend = prepend + '			<h4 class="mb-0">'
					prepend = prepend + '				<a class="text-dark" href="#">' + jobName + '</a>'
					prepend = prepend + '			</h4>'
					prepend = prepend + '			<div class="mb-0 text-muted">' + moment(value['date_start']).format("DD MMMM") + " - " + moment(value['date_end']).format("DD MMMM YYYY") + '</div>'
					
					//numeric format rupiah
					var	number_string = value.job_price.toString(),
					split	= number_string.split(','),
					sisa 	= split[0].length % 3,
					rupiah 	= split[0].substr(0, sisa),
					ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
						
					if (ribuan) {
						separator = sisa ? '.' : '';
						rupiah += separator + ribuan.join('.');
					}
					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;


					prepend = prepend + '<div class="mb-0">'+ 'Rp.' + rupiah +'</div>'
					prepend = prepend + '<div class="mb-0 ml-auto">'
					prepend = prepend + '			<span class="ml-auto text-primary" style="cursor: pointer;" href="#" onclick="showSumary(' + value['id'] + ')">Show Summary</span>'
					prepend = prepend + '</div>'
					prepend = prepend + '		</div>'
					prepend = prepend + '	</div>'
					prepend = prepend + '</div>'
				});
			
				$("#jobHolder").prepend(prepend + "</div>")

				$("#paginationJob nav").empty("")
				var prepend2 = "<ul class='pagination justify-content-end' id='jobPaginateHolder'>"
				$("#paginationJob nav").prepend(prepend2 + "</ul>")

				$("#jobPaginateHolder").empty("")
				var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
				var first_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
				var second_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
				var third_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
				
				if(result["current_page"] == 1){
					previous = "disabled"
					first = result["current_page"],first_active = "active"
					second = result["current_page"] + 1 
					third = result["current_page"] + 2

					var first_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var second_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
					var previous_onclick = ""

					if(result["last_page"] == 1){
						next = "disabled"
						var next_onclick = ""
					} else {
						var next_onclick = second_onclick
					}
				} else if (result["current_page"] == result["last_page"]){
					console.log("second")
					previous = ""
					next = "disabled"
					if(result["last_page"] == 2){
						first = result["current_page"] - 1
						second = result["current_page"], second_active = "active"
						third = result["current_page"]
					} else {
						first = result["current_page"] - 2
						second = result["current_page"] - 1
						third = result["current_page"],third_active = "active"
					}

					var first_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
					var second_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var third_onclick = "onclick=fillDataJob('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var previous_onclick = second_onclick
					var next_onclick = ""

				} else {
					console.log("last")
					next = ""
					previous = ""
					first = result["current_page"] - 1
					second = result["current_page"],second_active = "active"
					third = result["current_page"] + 1
					var previous_onclick = first_onclick
					var next_onclick = third_onclick

				}
				var append = ""
				append = append + '<li class="page-item ' + previous + '" ' + previous_onclick + '><span class="page-link">Previous</span></li>'
				append = append + '<li class="page-item ' + first_active + '" ' + first_onclick + '><span class="page-link">' + first + '</span></li>'
				if(result["last_page"] > 1){
					append = append + '<li class="page-item ' + second_active + '" ' + second_onclick + '><span class="page-link">' + second + '</span></li>'
				}
				if(result["last_page"] > 2){
					append = append + '<li class="page-item ' + third_active + '" ' + third_onclick + '><span class="page-link">' + third + '</span></li>'
				}
				append = append + '<li class="page-item ' + next + '" ' + next_onclick + '><span class="page-link">Next</span></li>'
				
				$("#jobPaginateHolder").append(append)
				if($(".jobSearch").val() != ""){
					if(result['total'] == 0){
						$(".resultSearchCount").empty("").text("Not found")
						$("#paginationJob").hide()
					} else {
						$(".resultSearchCount").empty("").text(result["total"] + " results")
					}
					$(".resultSearchKeyword").empty("").text("Search for : " + url.split("=")[1].split("&")[0])
					$(".resultSearch").show()
				} else {
					$(".resultSearch").hide()
				}

			}
		})
	
	}

	function fillDataJobList(url,method)
	{
		if($.fn.dataTable.isDataTable("#DataTables-jobList")){
			$('#DataTables-jobList').DataTable().ajax.url("{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url 
		            + "&per_page=" + $('#jobShowCount').text().split(" ")[1]).load();

			$.ajax({
				type:method,
				url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
				success: function (result) {
					$("#paginationJob nav").empty("")
					var prepend = "<ul class='pagination justify-content-end' id='jobPaginateHolder2'>"
					$("#paginationJob nav").prepend(prepend + "</ul>")
					var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
					var first_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var second_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var third_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					
					if(result["current_page"] == 1){
						console.log("one")
						previous = "disabled"
						first = result["current_page"],first_active = "active"
						second = result["current_page"] + 1 
						third = result["current_page"] + 2

						var first_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
						var second_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
						var third_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
						var previous_onclick = ""

						if(result["last_page"] == 1){
							next = "disabled"
							var next_onclick = ""
						} else {
							var next_onclick = second_onclick
						}
					} else if (result["current_page"] == result["last_page"]){
						console.log("two")
						previous = ""
						next = "disabled"
						if(result["last_page"] == 2){
							first = result["current_page"] - 1
							second = result["current_page"], second_active = "active"
							third = result["current_page"]
						} else {
							first = result["current_page"] - 2
							second = result["current_page"] - 1
							third = result["current_page"],third_active = "active"
						}

						var first_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
						var second_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
						var third_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
						var previous_onclick = second_onclick
						var next_onclick = ""

					} else {
						console.log("three")
						next = ""
						previous = ""
						first = result["current_page"] - 1
						second = result["current_page"],second_active = "active"
						third = result["current_page"] + 1
						var previous_onclick = first_onclick
						var next_onclick = third_onclick

					}

					var append = ""
					append = append + '<li class="page-item ' + previous + '" ' + previous_onclick + '><span class="page-link">Previous</span></li>'
					append = append + '<li class="page-item ' + first_active + '" ' + first_onclick + '><span class="page-link">' + first + '</span></li>'
					if(result["last_page"] > 1){
						append = append + '<li class="page-item ' + second_active + '" ' + second_onclick + '><span class="page-link">' + second + '</span></li>'
					}
					if(result["last_page"] > 2){
						append = append + '<li class="page-item ' + third_active + '" ' + third_onclick + '><span class="page-link">' + third + '</span></li>'
					}
					append = append + '<li class="page-item ' + next + '" ' + next_onclick + '><span class="page-link">Next</span></li>'
					
					$("#jobPaginateHolder2").append(append)
					if($(".jobSearch").val() != ""){
						if(result['total'] == 0){
							$(".resultSearchCount").empty("").text("Not found")
							$("#paginationJob").hide()
						} else {
							$(".resultSearchCount").empty("").text(result["total"] + " results")
						}
						$(".resultSearchKeyword").empty("").text("Search for : " + url.split("=")[1].split("&")[0])
						$(".resultSearch").show()
					} else {
						$(".resultSearch").hide()
					}
				},
			})
		}else{
			var n = 25
			var prepend2 = "<div class='row jobHolderItem2'>"
			$(".jobHolderItem2").empty("");
				prepend2 = prepend2 + '<div class="col-md-12 mb-4">'
				prepend2 = prepend2 + '<table class="table table-striped" id="DataTables-jobList">'
				prepend2 = prepend2 + '<thead>'
			    prepend2 = prepend2 + '<tr>'
			    prepend2 = prepend2 + '<th>Customer</th>'
			    prepend2 = prepend2 + '<th>Project</th>'
			    prepend2 = prepend2 + '<th>Latest History</th>'
			    prepend2 = prepend2 + '<th>Price</th>'
			    prepend2 = prepend2 + '<th>Status</th>'
			    // prepend2 = prepend2 + '<th hidden>Latest Update</th>'
			    prepend2 = prepend2 + '</tr>'
			    prepend2 = prepend2 + '</thead>'
			    prepend2 = prepend2 + '<tbody>'
			    prepend2 = prepend2 + '<tr>'
				prepend2 = prepend2 + '</tbody>'
				prepend2 = prepend2 + '</table>'
				prepend2 = prepend2 + '</div>'
			$("#jobHolder").prepend(prepend2 + "</div>")

			$("#DataTables-jobList").DataTable({
				"ajax":{
		            "type":method,
		            "url":"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url 
		            + "&per_page=" + $('#jobShowCount').text().split(" ")[1]
		          },
		          "columns": [
		            {
		            render: function ( data, type, row ) {
		                return row.customer.customer_name;
		              }
		            },
		            {
		            render: function ( data, type, row ) {
		                return row.job_name ;
		              }
		            },
		            {
		            render: function ( data, type, row ) {
		                return moment(row.latest_history.history.date_time).format("L h:mm:ss a");
		              }
		            },
		            {
		            render: function ( data, type, row ) {
		                return $.fn.dataTable.render.number(',', '.', 0, 'Rp.').display(row.job_price);
		              }
		            },
		            {
		            render: function ( data, type, row ) {
		            	if(row.job_status == "Open"){
							var badgeJob = "danger"
						} else if(row.job_status == "Ready"){
							var badgeJob = "warning"
						} else if(row.job_status == "Progress"){
							var badgeJob = "primary"
						} else if(row.job_status == "Done"){
							var badgeJob = "success"
						}

						return '<span class="badge badge-' + badgeJob + '">' + row.job_status + '</span>';
		              }
		            }, 
		          ],
				paging: false,
				searching: false,
				"bInfo" : false,
				order: [[2, 'desc']],
			});

			$.ajax({
				type:method,
				url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/" + url + "&per_page=" + $("#jobShowCount").text().split(" ")[1],
				success: function (result) {
					$("#paginationJob nav").empty("")
					var prepend = "<ul class='pagination justify-content-end' id='jobPaginateHolder2'>"
					$("#paginationJob nav").prepend(prepend + "</ul>")
					var previous = "",next = "", first,second,third,first_active = "",second_active = "",third_active = ""
					var first_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
					var second_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
					var third_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
					
					if(result["current_page"] == 1){
						console.log("one")
						previous = "disabled"
						first = result["current_page"],first_active = "active"
						second = result["current_page"] + 1 
						third = result["current_page"] + 2

						var first_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
						var second_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] + 1) + "','" + method + "')"
						var third_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] + 2) + "','" + method + "')"
						var previous_onclick = ""

						if(result["last_page"] == 1){
							next = "disabled"
							var next_onclick = ""
						} else {
							var next_onclick = second_onclick
						}
					} else if (result["current_page"] == result["last_page"]){
						console.log("two")
						previous = ""
						next = "disabled"
						if(result["last_page"] == 2){
							first = result["current_page"] - 1
							second = result["current_page"], second_active = "active"
							third = result["current_page"]
						} else {
							first = result["current_page"] - 2
							second = result["current_page"] - 1
							third = result["current_page"],third_active = "active"
						}

						var first_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] - 2) + "','" + method + "')"
						var second_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"] - 1) + "','" + method + "')"
						var third_onclick = "onclick=fillDataJobList('" + url + "&page=" + (result["current_page"]) + "','" + method + "')"
						var previous_onclick = second_onclick
						var next_onclick = ""

					} else {
						console.log("three")
						next = ""
						previous = ""
						first = result["current_page"] - 1
						second = result["current_page"],second_active = "active"
						third = result["current_page"] + 1
						var previous_onclick = first_onclick
						var next_onclick = third_onclick

					}

					var append = ""
					append = append + '<li class="page-item ' + previous + '" ' + previous_onclick + '><span class="page-link">Previous</span></li>'
					append = append + '<li class="page-item ' + first_active + '" ' + first_onclick + '><span class="page-link">' + first + '</span></li>'
					if(result["last_page"] > 1){
						append = append + '<li class="page-item ' + second_active + '" ' + second_onclick + '><span class="page-link">' + second + '</span></li>'
					}
					if(result["last_page"] > 2){
						append = append + '<li class="page-item ' + third_active + '" ' + third_onclick + '><span class="page-link">' + third + '</span></li>'
					}
					append = append + '<li class="page-item ' + next + '" ' + next_onclick + '><span class="page-link">Next</span></li>'
					
					$("#jobPaginateHolder2").append(append)
				},
			})
		
		}
		
	}

	$('.setting-list').click(function(){
		if ($(this).data("value") == 'list') {
			$(".jobHolderItem").hide();
			$(".jobHolderItem2").show();
			$("#paginationJob nav").empty("")
			$("#jobSearch").removeClass("jobSearchGrid").addClass("jobSearchList")
			if ($(".jobSearch").val() != "") {
				$(".jobSearch").val("")
				$(".resultSearch").hide()
			}else{
				$(".resultSearch").hide()
			}
			
			
			fillDataJobList("dashboard/getJobListAndSumary/paginate?type=list","GET")
			
		}else if ($(this).data("value") == 'grid') {
			$(".jobHolderItem2").hide();
			$(".jobHolderItem").show();
			$("#paginationJob nav").empty("")
			$("#jobSearch").removeClass("jobSearchList").addClass("jobSearchGrid")
			if ($(".jobSearch").val() != "") {
				$(".jobSearch").val("")
				$(".resultSearch").hide()
			}else{
				$(".resultSearch").hide()
			}
			
			fillDataJob("dashboard/getJobListAndSumary/paginate?type=card","GET")
		}	
	})

	function showSumary(id){
		$.ajax({
			type:"GET",
			url:"{{env('API_LINK_CUSTOM_PUBLIC')}}/job/getJobOpen",
			data:{
				id_job:id
			},
			success: function(result){
				console.log(result.job.job_status)
				// console.log(result.job.customer.customer_name)
				if(result.job.job_status == "Open"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-danger">Open</span>')
				} else if(result.job.job_status == "Ready"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-warning">Ready</span>')
				} else if(result.job.job_status == "Progress"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-primary">Progress</span>')
				} else if(result.job.job_status == "Done"){
					$("#statusShowSummary").html('<span class="ml-auto badge badge-success">Done</span>')
				}

				$("#jobSumaryHolderCustomer").html(result.job.customer.customer_name)
				$("#jobSumaryHolderTitle").html(result.job.job_name)
				$("#jobSumaryHolderDescription").html(result.job.job_description.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryHolderRequirement").html(result.job.job_requrment.replace(/(?:\r\n|\r|\n)/g, '<br>'))
				$("#jobSumaryHolderAddress").html('<i class="fas fa-building"></i> ' + result.job.job_location)
				$("#jobSumaryHolderLocation").html('<i class="fas fa-map-marker"></i> ' + result.job.location.long_location)
				$("#jobSumaryHolderLevel").html('<i class="fas fa-signal"></i> ' + result.job.level.level_name + " - " + result.job.level.level_description)
				$("#jobSumaryHolderDuration").html('<i class="fas fa-calendar-alt"></i> ' + moment(result.job.date_start).format("DD MMMM") + " - " + moment(result.job.date_end))
				
				$("#jobSumaryHolderButton").attr('href','{{url("job/detail/")}}/' + result.job.id)
				$("#jobSumaryHolderLatest").html('<b>Latest Update</b><br>' + moment(result.job.latest_history.history.date_time).format('DD MMMM - HH:mm') + ' [' + result.job.latest_history.user_name + '] <br>' + result.job.latest_history.history_activity + ' - ' + result.job.latest_history.history.detail_activity + '</p>')

				$("#jobSumaryHolder").show()
				$("#showSummaryModal").modal('toggle')
			}
		});
	}

	function showAddPIC(){
		$("#pic").attr("disabled","true")
		$("#addPICField").show()

	}

	function finalize(){
		var splited = $("#inputJobRangeDate").val().split(' - ');
		$.ajax({
			url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/getParameterFinalize",
			data: {
				id_location:$("#inputJobLocation").select2("data")[0].id,
				id_pic:$("#inputJobPic").select2("data")[0].id,
				id_category:$("#inputJobCategory").select2("data")[0].id
			},
			success: function(result){
				$("#finaliseClient").html($("#inputJobClient").select2("data")[0].text)
				$("#finaliseLocation").html(result.location)
				$("#finalisePic").html(result.pic)
				$("#finalisePicEmail").html(result.pic_email)
				$("#finaliseJobTitle").html($("#inputJobTitle").val())
				$("#finaliseJobCategory").html('<i class="fas fa-hard-hat"></i> ' + result.category)
				$("#finaliseJobLevel").html('<i class="fas fa-signal"></i> ' + $("#inputJobLevel").select2('data')[0].text)
				$("#finaliseJobDuration").html(moment(splited[0],"DD/MM/YYYY").format("DD MMMM") + " - " + moment(splited[1],"DD/MM/YYYY").format("DD MMMM YYYY"))
				$("#finaliseJobDescription").html("<h4>Job Description</h4>" + $("#inputJobDescription").val())
				$("#finaliseJobRequirement").html("<h4>Job Requirement</h4>" + $("#inputJobRequirement").val())
				$("#finaliseJobAddress").html('<h4>Job Address</h4>' + $("#inputJobAddress").val())
				$("#finaliseJobPrice").html($("#inputJobPriceBase").val())
			}
		})
	}

	function publishJob(){
		Swal.fire({
			title: 'Are you sure?',
			text: "to publish this job",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Please Wait..!',
					text: "It's sending..",
					allowOutsideClick: false,
					allowEscapeKey: false,
					allowEnterKey: false,
					customClass: {
						popup: 'border-radius-0',
					},
					onOpen: () => {
						Swal.showLoading()
					}
				})
				var splited = $("#inputJobRangeDate").val().split(' - ');
				$.ajax({
					url: "{{env('API_LINK_CUSTOM_PUBLIC')}}/job/createJob/postPublishJobs",
					type:"POST",
					data:{
						id_client:$("#inputJobClient").select2("data")[0].id,
						id_location:$("#inputJobLocation").select2("data")[0].id,
						id_pic:$("#inputJobPic").select2("data")[0].id,
						id_category:$("#inputJobCategory").select2("data")[0].id,
						id_level:$("#inputJobLevel").select2('data')[0].id,
						job_title:$("#inputJobTitle").val(),
						job_duration_start:moment(splited[0],"DD/MM/YYYY").format("YYYY-MM-DD"),
						job_duration_end:moment(splited[1],"DD/MM/YYYY").format("YYYY-MM-DD"),
						job_description:$("#inputJobDescription").val(),
						job_requrement:$("#inputJobRequirement").val(),
						job_address:$("#inputJobAddress").val(),
						job_payment_base:$("#inputJobPriceBase").val().replace(',00','').replace(/\D/g, ""),
						id_user:'{{Auth::user()->id}}',

					},
					success: function(result){
						Swal.showLoading()
						Swal.fire(
							'Published!',
							'Job has been Published.',
							'success'
						).then((result) => {
							if (result.value) {
								$("#exampleModalCenter").modal('toggle')
							}
						})
					}
				})
			}
		})
	}

	var currentTab = 0;
	// showTab(currentTab); // Display the current tab

	function showTab(n) {
		var x = document.getElementsByClassName("tab");
		var y = document.getElementsByClassName("step");
		x[n].style.display = "inline";
		y[n].style.display = "inline";
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			finalize()
			document.getElementById("nextBtn").innerHTML = "Publish";
			$(".modal-dialog").addClass("modal-lg");
			$("#nextBtn").attr('onclick','publishJob()');
		} else {
			$("#nextBtn").attr('onclick','nextPrev(1)');
			$(".modal-dialog").removeClass("modal-lg");
			document.getElementById("nextBtn").innerHTML = "Next";
		}
	}

	function nextPrev(n) {
		var x = document.getElementsByClassName("tab");
		var y = document.getElementsByClassName("step");
		// if (n == 1 && !validateForm()) return false;
		x[currentTab].style.display = "none";
		y[currentTab].style.display = "none";
		currentTab = currentTab + n;
		if (currentTab >= x.length) {
			$("#exampleModalCenter").modal('hide');
			x[n].style.display = "none";
			currentTab = 0;
			// document.getElementById("regForm").submit();
			// return false;
		}
		showTab(currentTab);
	}

	function formatNumber(n) {
		return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
	}

	function formatCurrency(input, blur) {
		var input_val = input.val();
		if (input_val === "") { return; }
		var original_len = input_val.length;
		var caret_pos = input.prop("selectionStart");
		if (input_val.indexOf(",") >= 0) {
			var decimal_pos = input_val.indexOf(",");
			var left_side = input_val.substring(0, decimal_pos);
			var right_side = input_val.substring(decimal_pos);
			left_side = formatNumber(left_side);
			right_side = formatNumber(right_side);
			if (blur === "blur") {
				right_side += "00";
			}
			right_side = right_side.substring(0, 2);
			input_val =  left_side + "," + right_side;
		} else {
			input_val = formatNumber(input_val);
			input_val =  input_val;
			if (blur === "blur") {
				input_val = "Rp. " + input_val;
				input_val += ",00";
			}
		}
		
		input.val(input_val);

		var updated_len = input_val.length;
		caret_pos = updated_len - original_len + caret_pos;
		input[0].setSelectionRange(caret_pos, caret_pos);
	}

</script>

@endsection
