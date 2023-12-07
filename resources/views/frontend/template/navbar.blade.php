<div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
    <div class="nav-panel__container container">
        <div class="nav-panel__row">
            <div class="nav-panel__logo">
                <a href="{{ route('fe.dashboard') }}">
                    <!-- logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="20px">
                        <path d="M118.5,20h-1.1c-0.6,0-1.2-0.4-1.4-1l-1.5-4h-6.1l-1.5,4c-0.2,0.6-0.8,1-1.4,1h-1.1c-1,0-1.8-1-1.4-2l1.1-3
             l1.5-4l3.6-10c0.2-0.6,0.8-1,1.4-1h1.6c0.6,0,1.2,0.4,1.4,1l3.6,10l1.5,4l1.1,3C120.3,19,119.5,20,118.5,20z M111.5,6.6l-1.6,4.4
             h3.2L111.5,6.6z M99.5,20h-1.4c-0.4,0-0.7-0.2-0.9-0.5L94,14l-2,3.5v1c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17
             C88,0.7,88.7,0,89.5,0h1C91.3,0,92,0.7,92,1.5v8L94,6l3.2-5.5C97.4,0.2,97.7,0,98.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3L96.3,10l4.5,7.8
             C101.4,18.8,100.7,20,99.5,20z M80.3,11.8L80,12.3v6.2c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-6.2l-0.3-0.5l-5.5-9.5
             c-0.6-1,0.2-2.3,1.3-2.3h1.4c0.4,0,0.7,0.2,0.9,0.5L76,4.3l2,3.5l2-3.5l2.2-3.8C82.4,0.2,82.7,0,83.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3
             L80.3,11.8z M60,20c-5.5,0-10-4.5-10-10S54.5,0,60,0s10,4.5,10,10S65.5,20,60,20z M60,4c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6
             S63.3,4,60,4z M47.8,17.8c0.6,1-0.2,2.3-1.3,2.3h-2L41,14h-4v4.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17
             C33,0.7,33.7,0,34.5,0H41c0.3,0,0.7,0,1,0.1c3.4,0.5,6,3.4,6,6.9c0,2.4-1.2,4.5-3.1,5.8L47.8,17.8z M42,4.2C41.7,4.1,41.3,4,41,4h-3
             c-0.6,0-1,0.4-1,1v4c0,0.6,0.4,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.6-0.3,0.9-0.5C43.6,8.8,44,7.9,44,7C44,5.7,43.2,4.6,42,4.2z
              M29.5,4H25v14.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5V4h-4.5C15.7,4,15,3.3,15,2.5v-1C15,0.7,15.7,0,16.5,0h13
             C30.3,0,31,0.7,31,1.5v1C31,3.3,30.3,4,29.5,4z M6.5,20c-2.8,0-5.5-1.7-6.4-4c-0.4-1,0.3-2,1.3-2h1c0.5,0,0.9,0.3,1.2,0.7
             c0.2,0.3,0.4,0.6,0.8,0.8C4.9,15.8,5.8,16,6.5,16c1.5,0,2.8-0.9,2.8-2c0-0.7-0.5-1.3-1.2-1.6C7.4,12,7,11,7.4,10.3l0.4-0.9
             c0.4-0.7,1.2-1,1.8-0.6c0.6,0.3,1.2,0.7,1.6,1.2c1,1.1,1.7,2.5,1.7,4C13,17.3,10.1,20,6.5,20z M11.6,6h-1c-0.5,0-0.9-0.3-1.2-0.7
             C9.2,4.9,8.9,4.7,8.6,4.5C8.1,4.2,7.2,4,6.5,4C5,4,3.7,4.9,3.7,6c0,0.7,0.5,1.3,1.2,1.6C5.6,8,6,9,5.6,9.7l-0.4,0.9
             c-0.4,0.7-1.2,1-1.8,0.6c-0.6-0.3-1.2-0.7-1.6-1.2C0.6,8.9,0,7.5,0,6c0-3.3,2.9-6,6.5-6c2.8,0,5.5,1.7,6.4,4C13.3,4.9,12.6,6,11.6,6
             z"></path>
                    </svg>
                    <!-- logo / end -->
                </a>
            </div>
            <!-- .nav-links -->
            <div class="nav-panel__nav-links nav-links">
                <ul class="nav-links__list">
                    {{-- <li class="nav-links__item  nav-links__item--has-submenu px-5 text-center">
                        <a class="nav-links__item-link" href="{{ route('fe.dashboard') }}">
                            <div class="nav-links__item-body">
                                Home
                                <svg class="nav-links__item-arrow" width="9px" height="6px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                                </svg>
                            </div>
                        </a>
                        <div class="nav-links__submenu nav-links__submenu--type--menu">
                            <!-- .menu -->
                            <div class="menu menu--layout--classic ">
                                <div class="menu__submenus-container"></div>
                                <ul class="menu__list">
                                    <li class="menu__item">
                                        <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                        <div class="menu__item-submenu-offset"></div>
                                        <a class="menu__item-link" href="{{ route('fe.dashboard') }}">
                                            Store
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .menu / end -->
                        </div>
                    </li> --}}
                    {{-- <li class="nav-links__item  nav-links__item--has-submenu px-5 text-center">
                        <a class="nav-links__item-link" href="">
                            <div class="nav-links__item-body">
                                Categories
                                <svg class="nav-links__item-arrow" width="9px" height="6px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                                </svg>
                            </div>
                        </a>
                        <div class="nav-links__submenu nav-links__submenu--type--megamenu nav-links__submenu--size--nl">
                            <!-- .megamenu -->
                            <div class="megamenu ">
                                <div class="megamenu__body">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="megamenu__links megamenu__links--level--0">
                                                <li class="megamenu__item  megamenu__item--with-submenu ">
                                                    <a href="">Makanan & Minuman</a>
                                                    <ul class="megamenu__links megamenu__links--level--1">
                                                        <li class="megamenu__item"><a href="">Aneka Juice</a></li>
                                                        <li class="megamenu__item"><a href="">Aneka Susu</a></li>
                                                        <li class="megamenu__item"><a href="">Makanan Beku</a></li>
                                                        <li class="megamenu__item"><a href="">Makanan Ringan</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="megamenu__links megamenu__links--level--0">
                                                <li class="megamenu__item  megamenu__item--with-submenu ">
                                                    <a href="">Komputer & Laptop</a>
                                                    <ul class="megamenu__links megamenu__links--level--1">
                                                        <li class="megamenu__item"><a href="">Aksesoris Komputer & Laptop</a></li>
                                                        <li class="megamenu__item"><a href="">Laptop</a></li>
                                                        <li class="megamenu__item"><a href="">Komponen Komputer</a></li>
                                                        <li class="megamenu__item"><a href="">Software</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .megamenu / end -->
                        </div>
                    </li> --}}

                    
                </ul>
            </div>
            <!-- .nav-links / end -->
            <div class="nav-panel__indicators">
                <div class="indicator">
                    @if (auth()->guard('customer')->check())
                    <a href="{{ route('fe.cart') }}" class="indicator__button">
                        <span class="indicator__area">
                            <i class="fas fa-shopping-cart"></i>
                            {{-- <span class="indicator__value">1</span> --}}
                        </span>
                    </a>
                        
                    @endif
                    {{-- <div class="indicator__dropdown">
                        <!-- .dropcart -->
                        <div class="dropcart dropcart--style--dropdown">
                            <div class="dropcart__body">
                                <div class="dropcart__products-list">
                                    <div class="dropcart__product">
                                        <div class="product-image dropcart__product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="/frontend/images/products/product-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="dropcart__product-info">
                                            <div class="dropcart__product-name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                                            <ul class="dropcart__product-options">
                                                <li>Color: Yellow</li>
                                                <li>Material: Aluminium</li>
                                            </ul>
                                            <div class="dropcart__product-meta">
                                                <span class="dropcart__product-quantity">2</span> ×
                                                <span class="dropcart__product-price">$699.00</span>
                                            </div>
                                        </div>
                                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                            <svg width="10px" height="10px">
                                                <use xlink:href="images/sprite.svg#cross-10"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="dropcart__totals">
                                    <table>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>$5,877.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>$25.00</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>$5,902.00</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="dropcart__buttons">
                                    <a class="btn btn-secondary" href="cart.html">View Cart</a>
                                    <a class="btn btn-primary" href="checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- .dropcart / end -->
                    </div> --}}
                </div>
                <div class="indicator indicator--trigger--click">
                    <a href="account-login.html" class="indicator__button">
                        <span class="indicator__area">
                            <i class="fas fa-user"></i>
                        </span>
                    </a>
                    <div class="indicator__dropdown">
                        <div class="account-menu">
                            @if (auth()->guard('customer')->check())
                            <a href="{{ route('fe.editprofile') }}" class="account-menu__user">
                                <div class="account-menu__user-avatar">
                                    @if (auth()->guard('customer')->user()->customer_picture)
                                    <img src="data:image/{{ auth()->guard('customer')->user()->customer_picture_ext }};base64,{{ chunk_split(base64_encode(auth()->guard('customer')->user()->customer_picture)) }}" alt="...">
                                        
                                    @else
                                    
                                    <img src="/frontend/images/avatars/no-profile.jpg" alt="">
                                    @endif
                                </div>
                                <div class="account-menu__user-info">
                                    <div class="account-menu__user-name">{{ auth()->guard('customer')->user()->customer_fullname }}</div>
                                    <div class="account-menu__user-email">{{ auth()->guard('customer')->user()->customer_email }}</div>
                                </div>
                            </a>
                            <div class="account-menu__divider"></div>
                            <ul class="account-menu__links">
                                <li>
                                    <form action="{{ route('logout') }}" id="logout" method="post">
                                        @csrf
                                        <a a href="#" onclick="document.getElementById('logout').submit();" class="menu__item-link" onclick="">Log Out </a>
                                    </form>
                                </li>
                            </ul>
                            
                            <div class="account-menu__divider"></div>
                            @else
                            
                            <form class="account-menu__form" action="{{ route('login.attempt') }}" method="POST">
                                @csrf
                                <div class="account-menu__form-title">Log In to Your Account</div>
                                <div class="form-group">
                                    <label for="header-signin-email" class="sr-only">Email address</label>
                                    <input id="header-signin-email" type="email" name="customer_email" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="header-signin-password" class="sr-only">Password</label>
                                    <div class="account-menu__form-forgot">
                                        <input id="header-signin-password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group account-menu__form-button">
                                    <button type="submit" class="btn btn-primary btn-sm">Login</button>
                                </div>
                                <div class="account-menu__form-link"><a href="{{ route('register') }}">Create An Account</a></div>
                            </form>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>