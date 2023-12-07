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
			<!--begin::Search-->
			<div class="d-flex align-items-center position-relative my-1">
				<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
				<!--begin::Label-->
				<label class="required form-label fs-6 mx-2">Address</label>
				<!--end::Label-->
				<!--begin::Select2-->
				<select class="form-select" name="customer_address_code" data-control="select2" required data-placeholder=" Pilih Address " data-allow-clear="true">
					<option></option>
					@foreach ($address as $a)
						<option value="{{ $a['customer_address_code'] }}" {{ (old('customer_address_code') == $a['customer_address_code'])? 'selected' : ''; }}>{{ $a['customer_address_address'] }}</option> 
					@endforeach  
				</select>
				<!--begin::Select2-->
					
			</div>
			<!--end::Search-->
		</div>
		<!--begin::Card title-->
		<!--begin::Card toolbar-->
		<form action="{{ route('orders.store') }}" method="POST">
			{{ csrf_field() }}

		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
					
				<!--end::Export-->
				<!--begin::Add customer-->
				<button type="submit" class="btn btn-primary" >Make Order</button>
					
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

	<!--begin::Card body BEGIN CUSTOMER -->
	<div class="card-body pt-0">
		
		<!--begin::Table-->
		<table class="table align-middle table-row-dashed fs-6 gy-5" id="more_data">
			<!--begin::Table head-->
				<input type="hidden" name="customer_number" value="{{ $customer_number }}">

			<thead>
				<!--begin::Table row-->
				<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
					<th>
						<div class="form-check">
						<input class="form-check-input" type="checkbox" value=""  id="checkAll">
						<label class="form-check-label" for="flexCheckDefault">
							Select All
						</label>
						</div>
					</th>
					<th class="min-w-125px">Photos</th> 
					<th class="min-w-125px">Price</th>
					<th class="min-w-125px">Quantity</th> 
					<th class="min-w-125px">Sub Total</th> 
					<th class="text-end min-w-70px">Actions</th>
				</tr>
				<!--end::Table row-->
			</thead>
			<!--end::Table head-->
			<!--begin::Table body-->
			<tbody class="fw-bold text-gray-600">
				@foreach ($rows as $r)
				<tr>
					
					<td>
						<input type="checkbox" class="form-check-input" name="cart_id[]" value="{{ $r->cart_id }}">
					</td>
					<td>
                        <img src="data:image/{{ $r->product_icon_fileext }};base64,{{ chunk_split(base64_encode($r->product_icon)) }}" class="img-fluid" style="width: 60%; height: auto;" alt="...">
                    </td>
					<td>Rp. {{ $r->cart_price_item }}</td>
					<td>{{ $r->cart_quantity }}</td>
					<td>Rp. {{ $r->cart_price_subtotal }}</td>
					<td class="">
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
								<a href="{{ Route('cart.delete', $r->cart_id) }}" class="menu-link px-3" id="del-btn" data-title="Yakin?" data-text="Item cart akan dihapus!" data-icon="warning">Delete</a>
							</div>
						</div>
						<!--end::Menu-->
					</td>
					
					<!--end::Action=-->
				</tr>
				@endforeach
			</tbody>
			<!--end::Table body-->
		</form>

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
	<script>
		 
	$("#checkAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
	</script>



@endsection 