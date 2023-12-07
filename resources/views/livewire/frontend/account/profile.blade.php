<div wire:ignore class="block">
    <div class="container">
        
        <div class="product-tabs  product-tabs--sticky">
            <div class="product-tabs__list">
                <div class="product-tabs__list-body">
                    <div class="product-tabs__list-container container">
                        <h4 class="font-weight-bold m-0  px-2">My Account</h4>
                        <a href="#tab-dashboard" class="product-tabs__item m-0 fs-5 font product-tabs__item--active">Dashboard</a>
                        <a href="#tab-edit" class="product-tabs__item m-0 fs-5 font">Edit Profile</a>
                        <a href="#tab-address" class="product-tabs__item m-0 fs-5 font">Address</a>
                        {{-- <a href="#tab-password" class="product-tabs__item m-0 fs-5 font">Change Password</a> --}}
                        <!-- <a href="#tab-reviews" class="product-tabs__item">Reviews</a> -->
                    </div>
                </div>
            </div>
            <div class="product-tabs__content">
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-dashboard">
                    <div class="typography">
                        <h3>Dashboard</h3>
                        
                        <div class="dashboard">
                            <div class="dashboard__profile card profile-card">
                                <div class="card-body profile-card__body">
                                    <div class="profile-card__avatar">
                                        @if (auth()->guard('customer')->user()->customer_picture)
                                        <img src="data:image/{{ auth()->guard('customer')->user()->customer_picture_ext }};base64,{{ chunk_split(base64_encode(auth()->guard('customer')->user()->customer_picture)) }}" alt="...">
                                            
                                        @else
                                        
                                        <img src="/frontend/images/avatars/no-profile.jpg" alt="">
                                        @endif                                    
                                    </div>
                                    <div class="profile-card__name">{{ auth()->guard('customer')->user()->customer_fullname }}</div>
                                    <div class="profile-card__email">{{ auth()->guard('customer')->user()->customer_email }}</div>
                                </div>
                            </div>
                            <div class="dashboard__address card address-card address-card--featured">
                                <div class="address-card__badge">Default</div>
                                <div class="address-card__body">
                                    <div class="address-card__name">{{ $default_address->customer_address_name }}</div>
                                    <div class="address-card__row">
                                        {{ $default_address->customer_address_address }}
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Phone Number</div>
                                        <div class="address-card__row-content">{{ $default_address->customer_address_phone }}</div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Province</div>
                                        <div class="address-card__row-content">{{ $default_address->customer_address_province }}</div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">City</div>
                                        <div class="address-card__row-content">{{ $default_address->customer_address_city }}</div>
                                    </div>
                                    <div class="address-card__footer">
                                        <a href="{{ route('fe.edit.address', $default_address->customer_address_id) }}">Edit</a>&nbsp;&nbsp;
                                        <a href="">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard__orders card">
                                <div class="card-header">
                                    <h5>Recent Orders</h5>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $o )
                                                <tr>
                                                    <td><a href="{{ route('fe.checkout.invoice', $o['orders_code']) }}" target="_blank">{{ $o->orders_invoice }}</a></td>
                                                    <?php $d = strtotime($o->orders_datetime) ?>
                                                    <td>{{ date('d M, Y - H:i') }}</td>
                                                    <td>{{ $o->orders_status }}</td>
                                                    <td>Rp {{ $o->orders_total_price }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="dashboard__orders card">
                                <div class="card-header">
                                    <h5>Recent Orders</h5>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="">#8132</a></td>
                                                    <td>02 April, 2019</td>
                                                    <td>Pending</td>
                                                    <td>$2,719.00 for 5 item(s)</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#7592</a></td>
                                                    <td>28 March, 2019</td>
                                                    <td>Pending</td>
                                                    <td>$374.00 for 3 item(s)</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#7192</a></td>
                                                    <td>15 March, 2019</td>
                                                    <td>Shipped</td>
                                                    <td>$791.00 for 4 item(s)</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                        </div>


                    </div>
                </div>
                {{-- <div class="product-tabs__pane" id="tab-editprofile">
                    <div class="spec">
                        <h3 class="spec__header">Edit Profile</h3>
                        <div class="spec__section">
                            <h4 class="spec__section-title">General</h4>
                            @foreach ($info as $pi)
                            <div class="spec__row">
                                <div class="spec__name">{{ $pi->product_info_name }}</div>
                                <div class="spec__value">{{ $pi->product_info_value }}</div>
                            </div>
                            @endforeach
                            
                        </div>
                       
                        <div class="spec__disclaimer">
                            Information on technical characteristics, the delivery set, the country of manufacture and the appearance
                            of the goods is for reference only and is based on the latest information available at the time of publication.
                        </div>
                    </div>
                </div> --}}
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-edit">
                    <div class="typography">
                        <h3>Edit Profile</h3>
                        <form wire:submit="updateProfile({{ auth()->guard('customer')->user()->customer_id }})" class="form">
                            <input type="hidden" wire:model="customer_id">
                            {{-- {{ csrf_field() }} --}}
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-7 col-xl-6">
                                    <div class="form-group">
                                        <label for="profile-last-name">Full Name</label>
                                        <input type="text" class="form-control" wire:model="customer_fullname"  id="profile-last-name" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-email">Email Address</label>
                                        <input type="email" class="form-control" wire:model="customer_email"  id="profile-email" placeholder="Email Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-phone">Phone Number</label>
                                        <input type="text" class="form-control" wire:model="customer_handphone1"  id="profile-phone" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group mt-5 mb-0">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-address">
                    <div class="typography">
                        <h3>Address</h3>
                        <div class="addresses-list">
                            <a href="{{ route('fe.add.address') }}" class="addresses-list__item addresses-list__item--new">
                                <div class="addresses-list__plus"></div>
                                <div class="btn btn-secondary btn-sm">Add New</div>
                            </a>
                            <div class="addresses-list__divider"></div>
                            @foreach ($address as $a )
                           
                            <div class="addresses-list__item card address-card">
                                @if ($a->customer_address_id == $default)
                                    <div class="address-card__badge">Default</div>
                                @endif
                                <div class="address-card__body">
                                    <div class="address-card__name">{{ $a->customer_address_name }}</div>
                                    <div class="address-card__row">
                                        {{ $a->customer_address_address }}
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Phone Number</div>
                                        <div class="address-card__row-content">{{ $a->customer_address_phone }}</div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Province</div>
                                        <div class="address-card__row-content">{{ $a->customer_address_province }}</div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">City</div>
                                        <div class="address-card__row-content">{{ $a->customer_address_city }}</div>
                                    </div>
                                    <div class="address-card__footer">
                                        <a href="{{ route('fe.edit.address', $a->customer_address_id) }}">Edit</a>&nbsp;&nbsp;
                                        <a href="{{ Route('fe.delete.address', $a->customer_address_id) }}">Remove</a>
                                    </div>
                                </div>
                            </div>
                                  
                            <div class="addresses-list__divider"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="product-tabs__pane product-tabs__pane--active" id="tab-password">
                    <div class="typography">
                        <h3>Change Password</h3>
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-7 col-xl-6">
                                <div class="form-group">
                                    <label for="password-current">Current Password</label>
                                    <input type="password" class="form-control" id="password-current" placeholder="Current Password">
                                </div>
                                <div class="form-group">
                                    <label for="password-new">New Password</label>
                                    <input type="password" class="form-control" id="password-new" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Reenter New Password</label>
                                    <input type="password" class="form-control" id="password-confirm" placeholder="Reenter New Password">
                                </div>
                                <div class="form-group mt-5 mb-0">
                                    <button class="btn btn-primary">Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>