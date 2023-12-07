@extends('backend.template.index')

@section('content')
<div class="card">
	<!--begin::Card header-->
	<div class="card-header border-0 pt-6">
		<!--begin::Card title-->
		<div class="card-title">
			<!--begin::Search-->
			<div class="d-flex align-items-center position-relative my-1">
				<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
				<span class="svg-icon svg-icon-1 position-absolute ms-6">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
						<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
					</svg>
				</span>
				<!--end::Svg Icon-->
				<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Company Customer" />
			</div>
			<!--end::Search-->
		</div>
		<!--begin::Card title-->
		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base"> 
				<a href="{{ route('company.customer.create') }}">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Company Customer</button>
				</a> 
				<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
					<div class="fw-bolder me-5">
					<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
					<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
				</div>
				<!--end::Group actions-->

				


			</div>
			<!--end::Toolbar--> 
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->



	<!--begin::Card body BEGIN CUSTOMER -->
	<div class="card-body pt-0">
		<!--begin::Table-->
		<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
			<!--begin::Table head-->
			<thead>
				<!--begin::Table row-->
				<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
					<th class="min-w-25px">No</th>
					<th class="min-w-125px">Company</th>
					<th class="min-w-125px">Customer</th> 
					<th class="min-w-125px">Type</th>  
					<th class="min-w-125px">Contact</th>
					<th class="min-w-125px">Address</th> 
					<th class="text-end min-w-70px">Actions</th>
				</tr>
				<!--end::Table row-->
			</thead>
			<!--end::Table head-->
			<!--begin::Table body-->
			<tbody class="fw-bold text-gray-600">
				<?php $i = 1; ?>
				@foreach ($rows as $com)
				<tr>
					<td><?= $i++; ?></td> 
					<td>
						<a href="" class="text-gray-800 text-hover-primary mb-1">{{ $com->company_name }}</a>
						<span class="text-muted fw-bold text-muted d-block fs-7">{{ ucwords($com->company_industry) }}</span>
					</td> 
					<td>
						<a href="" class="text-gray-800 text-hover-primary mb-1">{{ $com->customer_fullname }}</a>
					</td>
					<td>
						<a href="" class="text-gray-800 text-hover-primary mb-1">{{ $com->customer_type }}</a>
					</td> 

					<td>
						<a href="" class="text-gray-800 text-hover-primary mb-1">{{ $com->company_website }}</a>
						<span class="text-muted fw-bold text-muted d-block fs-7">{{ $com->company_province }}</span>
					</td> 
					<td>
						{{ $com->company_address }} 
					</td> 
					<td class="text-end">
						<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
						<span class="svg-icon svg-icon-5 m-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon--></a>
						<!--begin::Menu-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
							<!--begin::Menu item-->
							{{-- <div class="menu-item px-3">
								<a href="{{ Route('company.show', $com->company_id) }}" class="menu-link px-3">View</a>
							</div>   --}}
							<div class="menu-item px-3">
								<a href="{{ Route('company.customer.show', $com->company_custemp_id) }}" class="menu-link px-3">Edit</a>
							</div> 
							<div class="menu-item px-3">
								<a href="{{ Route('company.customer.delete', $com->company_custemp_id) }}" id="del-btn" data-title="Yakin?" data-text="Company Customer akan dihapus!" data-icon="warning" class="menu-link px-3">Delete</a>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
			<!--end::Table body-->
		</table>
		<!--end::Table-->
	</div>
	<!--end::Card body-->
</div>
@endsection