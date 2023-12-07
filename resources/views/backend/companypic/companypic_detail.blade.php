@extends('backend.template.index')

@section('content')
	<!--begin::Section-->
	<div class="row g-5 g-xl-8">
				<!--begin::Block-->
				<div class="py-5">
					<div class="card card-bordered">
						<div class="card-body">
							<!--begin::Form-->
							<form action="{{ Route('companypic.update', $row->companypic_id) }}" method="POST" class="form">
							{{ csrf_field() }}
								<!--begin::Options-->
								<div class="row g-10">
									<div class="col-lg-6"> 
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<label class="required form-label fs-6 mb-2">Company</label>
											<!--end::Label-->
											<!--begin::Select2-->
											<select class="form-select" name="company_code" data-control="select2" required data-placeholder=" Pilih Company " data-allow-clear="true">
												<option></option>
												@foreach ($company as $com)
													<option value="{{ $com['company_code'] }}" {{ ($com['company_code'] == $row->company_code)? 'selected': ''; }}>{{ $com['company_name'].' ~ '.$com['company_code'] }}</option>
												@endforeach 
											</select>
											<!--begin::Select2-->
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
													<option value="{{ $cus['customer_number'] }}" {{ ($cus['customer_number'] == $row->customer_number)? 'selected': ''; }}>{{ $cus['customer_fullname'].' ~ '.$cus['customer_number'] }}</option>
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
												<select class="form-select" name="employee_number" data-control="select2" data-placeholder=" Pilih Employee " data-allow-clear="true">
													<option></option>
													@foreach ($employee as $emp)
														<option value="{{ $emp['employee_number'] }}" {{ ($emp['employee_number'] == $row->employee_number)? 'selected': ''; }}>{{ $emp['employee_name'].' ~ '.$emp['employee_number']  }}</option>
													@endforeach 
												</select>
												<!--begin::Select2-->
										</div>
										<!--end::Input group=-->
										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">PIC Name</label>
											<input name="companypic_name" id="sekolah" type="text" class="form-control" required placeholder=" Input Nama PIC "  value="{{ $row->companypic_name }}"/>
										</div>

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Position</label>
											<input id="showEasing" name="companypic_position" type="text" class="form-control mb-2" required placeholder=" Input Position " value="{{ $row->companypic_position }}" />
										</div>

										<div class="form-group">
											<div class="form-group mb-5">
												<label class="fw-bolder mb-3" for="showEasing">Departement</label>
												<input id="showEasing" name="companypic_departement" type="text" class="form-control mb-2" required placeholder=" Input Departement " value="{{ $row->companypic_departement }}" />
											</div>
										</div>

										<div class="form-group">
											<div class="form-group mb-5">
												<label class="fw-bolder mb-3" for="showEasing">Division</label>
												<input id="showEasing" name="companypic_division" type="text" class="form-control mb-2" required placeholder=" Input Division " value="{{ $row->companypic_division }}" />
											</div>
										</div>
									</div>
									<div class="col-lg-5">
										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Email</label>
											<input name="companypic_email" id="sekolah" type="email" class="form-control" required placeholder=" Input Email " value="{{ $row->companypic_email }}" />
										</div>

										<div class="form-group mb-5">
											<label class="fw-bolder mb-3">Telephone</label>
											<input name="companypic_phone" id="sekolah" type="text" class="form-control" required placeholder=" Input Telepon " value="{{ $row->companypic_phone }}" />
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
										<button type="submit" class="btn btn-primary btn-md">Update</button>
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