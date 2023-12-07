@extends('backend.template.index')

@section('styless')
<link href="/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/plugins/datatables/Buttons-2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link href="/plugins/datatables/Buttons-2.2.2/css/buttons.dataTables.css" rel="stylesheet">
@endsection

@section('content')


<!--begin::Card-->
<div class="card">
	<!--begin::Card header-->
	<div class="card-header border-0 pt-6">
		<!--begin::Card title-->
		<div class="card-title">
			<h3>Product Discount</h3>
		</div>
		<!--begin::Card title-->
		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
					
				<!--end::Export-->
				<!--begin::Add customer-->
				<a href="{{ route('product.discount.create') }}">
					<button type="button" class="btn  btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Product Discount</button>
				</a>
				<!--end::Add customer-->
			</div>
			<!--end::Toolbar-->
			<!--begin::Group actions-->
			<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
				<div class="fw-bolder me-5">
				<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
				<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
			</div>
			<!--end::Group actions-->
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->


    <hr>
	<!--begin::Card body BEGIN CUSTOMER -->
	<div class="card-body pt-0">
		<!--begin::Table-->
		<table class="table border text-gray-600 align-middle text-center " id="more_data">
			<!--begin::Table head-->
			<thead class="border ">
				<!--begin::Table row-->
				<tr class=" fw-bolder fs-7 text-uppercase gs-0">
					<th class="min-w-25px">No</th> 
					<th class="min-w-125px">Discount</th> 
					<th class="min-w-125px">Percent</th> 
					<th class="min-w-125px">Status</th> 
					<th class="min-w-70px">Actions</th>
				</tr>
				<!--end::Table row-->
			</thead>
			<!--end::Table head-->
			<!--begin::Table body-->
			<tbody class="fw-bold border ">
				<?php $i = 1; ?>
				<?php foreach ($rows as $r): ?>
				<tr>
					<th scope="row"><?= $i++; ?></th>
					<td><?= $r['product_discount_name']; ?></td>
					<td><?= $r['product_discount_percent']; ?>%</td>
					<td><?= $r['product_discount_active']; ?></td>
					<td class="text-center">
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
							<div class="menu-item px-3">
								<a href="{{ route('product.discount.show', $r->product_discount_id) }}" class="menu-link px-3">Edit</a>
							</div>  
							<div class="menu-item px-3">
								<a href="{{ route('product.discount.delete', $r->product_discount_id) }}" id="del-btn" data-title="Yakin?" data-text="Product Discount akan dihapus!" data-icon="warning" class="menu-link px-3">Delete</a>
							</div>
						</div>
						<!--end::Menu-->
					</td>
					<!--end::Action=-->
				</tr>
				<?php endforeach; ?>
			</tbody>
			<!--end::Table body-->
		</table>
		<!--end::Table-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->

@endsection

@section('scripts')
    <!-- data tables -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables/datatables.min.js"></script>
    <script src="/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection