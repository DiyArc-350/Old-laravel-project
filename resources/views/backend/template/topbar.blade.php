<!--begin::Menu wrapper-->
<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">

        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item  <?php // echo " here show"; ?> menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">Dashboard</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
            </div>
        </div>
        
        @if (auth()->guard('employee')->user()->role_code == '100')
        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item  <?php // echo " here show"; ?> menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">Asset</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('role.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Role</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('employee.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Employee</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('customer.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Customer</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('customer.address.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Customer Address</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('company.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Company</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('companypic.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Company PIC</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('company.employee.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Company Employee</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('company.customer.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Company Customer</span>
                    </a>
                </div>


            </div>
        </div>

        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item  <?php // echo " here show"; ?> menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">E-Commerse</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product-category.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Category </span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.discount.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Discount</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.info.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Information</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.image.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Image</span>
                    </a>
                </div>

                

                 
                

            </div>
        </div>



        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item  <?php // echo " here show"; ?> menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">Transaction</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('discount.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Discount</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('cart.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Cart</span>
                    </a>
                </div> 


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('orders.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Order</span>
                    </a>
                </div> 
            </div>
        </div>
        @endif

        @if (auth()->guard('employee')->user()->role_code == '200')

        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item  <?php // echo " here show"; ?> menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">E-Commerse</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product-category.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Category </span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.discount.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Discount</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.info.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Information</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('product.image.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Product Image</span>
                    </a>
                </div>

                

                 
                

            </div>
        </div>



        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item  <?php // echo " here show"; ?> menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">Transaction</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('discount.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Discount</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('cart.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Cart</span>
                    </a>
                </div> 


                <div class="menu-item">
                    <a class="menu-link py-3" href="{{ route('orders.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-calendar3-event fs-3"></i>
                        </span>
                        <span class="menu-title">Order</span>
                    </a>
                </div> 
            </div>
        </div>
        @endif


    </div>	 
    <!--end::Menu--> 
</div>
<!--end::Menu wrapper-->
