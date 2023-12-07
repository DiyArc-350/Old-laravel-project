@extends('backend.template.index')

@section('content')

	<div class="row g-5 g-xl-8">
				<!--begin::Block-->
				<div class="py-5">
					<div class="card card-bordered">
						<div class="card-body">
							<!--begin::Form-->
							<form action="{{ Route('company.store') }}" method="POST" class="form">
							{{ csrf_field() }}
								<!--begin::Optons-->
								<div class="row g-10">
									<div class="col-lg-6"> 

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Company Name</label>
											<input name="company_name" id="sekolah" type="text" class="form-control" required placeholder=" Input Nama Company " />
										</div>

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Website</label>
											<input name="company_website" id="sekolah" type="text" class="form-control" required placeholder=" Input Website " />
										</div>

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Email</label>
											<input name="company_email" id="sekolah" type="email" class="form-control" required placeholder=" Input Website " />
										</div>

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Telephone</label>
											<input name="company_phone" id="sekolah" type="text" class="form-control" required placeholder=" Input Telepon " />
										</div>

										<!--begin::Input group=-->
										<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required form-label fs-6 mb-2">Customer</label>
												<!--end::Label-->
												<!--begin::Select2-->
												<select class="form-select" name="customer_number" data-control="select2"  data-placeholder=" Pilih Customer " data-allow-clear="true">
													<option></option>
													@foreach ($customer as $cus)
														<option value="{{ $cus['customer_number'] }}">{{ $cus['customer_fullname'].' ~ '.$cus['customer_number'] }}</option>
													@endforeach 
												</select>
												<!--begin::Select2-->
										</div>
										<!--end::Input group=-->

										<!--begin::Input group=-->
										<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required form-label fs-6 mb-2">Employee</label>
												<!--end::Label-->
												<!--begin::Select2-->
												<select class="form-select" name="employee_number" data-control="select2"  data-placeholder=" Pilih Employee " data-allow-clear="true">
													<option></option>
													@foreach ($employee as $emp)
														<option value="{{ $emp['employee_number'] }}">{{ $emp['employee_name']." ~ ".$emp['employee_number'] }}</option>
													@endforeach 
												</select>
												<!--begin::Select2-->
										</div>
										<!--end::Input group=-->

										<!--begin::Input group=-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<label class="required form-label fs-6 mb-2">Priority Type</label>
											<!--end::Label-->
											<!--begin::Select2-->
											<select class="form-select" name="company_priority" data-control="select2" data-placeholder="Jenis Priority" data-allow-clear="true">
												<option></option>
												<option value="GOLD" >Gold</option>
												<option value="SILVER">Silver</option> 
												<option value="PLATINUM">Platinum</option> 
											</select>
										<!--begin::Select2-->
										</div>
										<!--end::Input group=--> 

										<!--begin::Input group=-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<label class="required form-label fs-6 mb-2">Category Type</label>
											<!--end::Label-->
											<!--begin::Select2-->
											<select class="form-select" name="company_category" data-control="select2" data-placeholder="Jenis Category" data-allow-clear="true">
												<option></option>
												<option value="STARTUP" >Startup</option>
												<option value="GOVERMENT" >Goverment</option> 
												<option value="SWASTA" >Swasta</option> 
											</select>
											<!--begin::Select2-->
										</div>
										<!--end::Input group=-->
									</div>
									<div class="col-lg-5">

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Address</label>
											<textarea name="company_address"  id="alamat" class="form-control" rows="3" required placeholder=" Input Address "></textarea>
										</div>

										<div class="form-group">
											<div class="form-group mb-5">
												<label class="fw-bolder mb-3" for="showEasing">Province</label>
												<input id="showEasing" name="company_province" type="text" class="form-control mb-2" required placeholder=" Input Province " value="" />
											</div>
										</div>

										<div class="form-group">
											<div class="form-group mb-5">
												<label class="fw-bolder mb-3" for="showEasing">Kode Pos</label>
												<input id="showEasing" name="company_postcode" type="number" class="form-control mb-2" required placeholder=" Input Kode Pos " value="" />
											</div>
										</div>
										<div class="form-group">
											<div class="form-group mb-5">
												<label class="fw-bolder mb-3" for="showEasing">Industry</label>
												<input id="showEasing" type="text" name="company_industry" class="form-control mb-2" required placeholder=" Input Industry " value="" />
											</div>
										</div>

											
									</div>
										
								</div>
								<!--end::Options-->
									
								<!--end::Code Preview-->
								<!--begin::Actions-->
								<div class="row mt-3 d-flex">
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