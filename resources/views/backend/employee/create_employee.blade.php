@extends('backend.template.index')

@section('content')
	<div class="row g-5 g-xl-8">
		<!--begin::Block-->
		<div class="py-5">
			<div class="card card-bordered">
				<div class="card-body">
					<!--begin::Form-->
					<form method="post" action="{{ Route('employee.store') }}" class="form">
						{{ csrf_field() }}
						<!--begin::Options-->
						<div class="row g-10">
							<div class="col-lg-6">

								<!--begin::Input group=-->
								<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="required form-label fs-6 mb-2">Role</label>
										<!--end::Label-->
										<!--begin::Select2-->
										<select class="form-select" name="role_code" data-control="select2" data-placeholder=" Pilih Hak Akses " data-allow-clear="true">
											<option></option>
											@foreach ($role as $ro)
												<option value="{{ $ro['role_code'] }}">{{ $ro['role_category'] }}</option>
											@endforeach 
										</select>
										<!--begin::Select2-->
								</div>
								<!--end::Input group=-->

								<div class="form-group mb-5">
									<label class="fw-bolder mb-3">Name</label>
									<input name="employee_name" id="sekolah" type="text" class="form-control" placeholder=" Input Name " />
								</div>

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Position</label>
										<input id="showEasing" type="text" name="employee_position" class="form-control mb-2" placeholder=" Input Position" value="" />
									</div>
								</div>
							
								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Department</label>
										<input id="showEasing" name="employee_departement" type="text" class="form-control mb-2" placeholder=" Input Department " value="" />
									</div>
								</div>

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Division</label>
										<input id="showEasing" name="employee_division" type="text" class="form-control mb-2" placeholder=" Input Division " value="" />
									</div>
								</div>

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Grade</label>
										<input id="showEasing" type="text" name="employee_grade" class="form-control mb-2" placeholder=" Input Grade " value="" />
									</div>
								</div>

								<div class="form-group mb-5">
									<label class="fw-bolder mb-3">Handphone</label>
									<input name="employee_handphone1" id="sekolah" type="text" class="form-control" placeholder=" Telephone " />
								</div>

								<div class="form-group mb-5">
									<label class="fw-bolder mb-3">Handphone 2</label>
									<input name="employee_handphone2" id="sekolah" type="text" class="form-control" placeholder=" Telephone " />
								</div>

								<div class="form-group mb-5">
									<label class="fw-bolder mb-3">Address</label>
									<textarea name="employee_address"  id="alamat" class="form-control" rows="3" placeholder=" Input Address"></textarea>
								</div>
							</div>
							<div class="col-lg-6">

								<div class="form-group mb-5">
									<label class="fw-bolder mb-3">Email</label>
									<input name="employee_email" id="sekolah" type="text" class="form-control" placeholder=" Input Email" required />
								</div>


								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Password</label>
										<input id="employee_passwd" name="employee_passwd" type="text" class="form-control mb-2" placeholder=" Input Password " value="" />
									</div>
								</div>

								

								<!--begin::Input group=-->
								<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="required form-label fs-6 mb-2">Gender</label>
										<!--end::Label-->
										<!--begin::Select2-->
										<select class="form-select" name="employee_gender" data-control="select2" data-placeholder=" Pilih Kelamin " data-allow-clear="true">
											<option></option>
											<option value="1">Male</option>
											<option value="0">Female</option> 
										</select>
										<!--begin::Select2-->
								</div>
								<!--end::Input group=-->

								<div class="form-group mb-5">
									<label for="" class="form-label">Date Start Work</label>
									<input name="employee_workdate_start" type="date" class="form-control form-control-solid" placeholder=" Input Date Start Work " id="kt_inputmask_1" />
									<div class="form-text">Format Date :
									<code>dd/mm/yyyy</code></div>
								</div>

								<div class="form-group mb-5">
									<label for="" class="form-label">Birthday</label>
									<input name="employee_birthday" type="date" class="form-control form-control-solid" placeholder=" Input Birthday " id="kt_inputmask_1" />
									<div class="form-text">Format Date :
									<code>dd/mm/yyyy</code></div>
								</div>

								

								

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Salary</label>
										<input name="employee_salary" id="showEasing" type="text" class="form-control mb-2" placeholder=" Input Salary " value="" />
									</div>
								</div>

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Bank Name</label>
										<input name="employee_bank_name" id="showEasing" type="text" class="form-control mb-2" placeholder=" Input Bank Name " value="" />
									</div>
								</div>

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Bank Account Name</label>
										<input name="employee_bank_accountname" id="showEasing" type="text" class="form-control mb-2" placeholder=" Input Bank Account Name " value="" />
									</div>
								</div>

								<div class="form-group">
									<div class="form-group mb-5">
										<label class="fw-bolder mb-3" for="showEasing">Bank Account Number</label>
										<input name="employee_bank_accountnumber" id="showEasing" type="text" class="form-control mb-2" placeholder=" Input Bank Account Number " value="" />
									</div>
								</div> 

							</div>
								
						</div>
						<!--end::Options-->
							
						<!--end::Code Preview-->
						<!--begin::Actions-->
						<div class="row d-flex		 mt-3">
							<div class="col-md-8">
							</div>
							<div class="col-md-4 text-right align-self-end d-flex justify-content-end">
								<button type="button" onclick="window.history.go(-1)" class="btn btn-secondary btn-md mx-2">
									Kembali
								</button>
								<button type="submit" class="btn btn-primary btn-md">Save</button>
							</div>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
			</div>
		</div>
		<!--end::Block-->
				
	</div>

@endsection