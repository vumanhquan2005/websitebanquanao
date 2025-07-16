<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MQ-Trang quản trị')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/linearicon.css') }}">

    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/font-awesome.css') }}">

    <!-- Themify icon css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/themify.css') }}">

    <!-- ratio css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/ratio.css') }}">

    <!-- remixicon css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/remixicon.css') }}">

    <!-- Feather icon css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/feather-icon.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/animate.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/bootstrap.css') }}">

    <!-- vector map css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vector-map.css') }}">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors/slick.css') }}">

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="">
                            <img class="img-fluid main-logo" src="assets/images/logo/1.png" alt="logo">
                            <img class="img-fluid white-logo" src="assets/images/logo/1-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.html">
                            <img src="assets/images/logo/1.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <form class="form-inline search-full" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Tìm kiếm .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                {{-- Hiển thị avatar user đăng nhập --}}
                                @php
                                    $user = auth()->user();
                                    $avatar =
                                        $user && $user->avatar
                                            ? asset('storage/' . $user->avatar)
                                            : asset('assets/images/users/4.jpg');
                                @endphp
                                <img class="user-profile rounded-circle" src="{{ $avatar }}"
                                    alt="User Avatar" />
                                <div class="user-name-hide media-body">
                                    <span>{{ $user->name ?? 'User' }}</span>
                                    <p class="mb-0 font-roboto">{{ ucfirst($user->role ?? '') }}<i
                                            class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href="{{ route('admin.users.myaccount') }}">
                                        <i data-feather="users"></i>
                                        <span>TK của tôi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/') }}">
                                        <i data-feather="home"></i>
                                        <span>Quay lại trang chủ</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="{{ url('/admin/reports') }}" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="assets/images/logo/full-white.png" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo main-white" src="assets/images/logo/logo.png"
                                alt="logo">
                            <img class="img-fluid main-logo main-dark" src="assets/images/logo/logo-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                        href="{{ url('/admin/reports') }}">
                                        <i class="ri-home-line"></i>
                                        <span>Tổng Quan</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Người dùng</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ url('/admin/users') }}">Danh sách người dùng</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Sản Phẩm</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ url('/admin/products') }}">Danh sách sản phẩm</a>
                                        </li>

                                        <li>
                                            <a href="a{{ url('/admin/products/create') }}">Thêm sản phẩm</a>
                                        </li>

                                        <li>
                                            <a href="add-new-product.html">Thùng rác</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Danh mục</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ url('/admin/categories') }}">Danh sách danh mục</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/admin/categories/create') }}">Thêm danh mục</a>
                                        </li>

                                        <li>
                                            <a href="add-new-category.html">Thùng rác</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-settings-line"></i>
                                        <span>Thuộc tính</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="attributes.html">Danh sách thuộc tính</a>
                                        </li>

                                        <li>
                                            <a href="add-new-attributes.html">Thêm thuộc tính</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Đơn hàng</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="order-list.html">Danh sách đơn hàng</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Mã giảm giá</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="coupon-list.html">Danh sách mã giảm giá</a>
                                        </li>

                                        <li>
                                            <a href="create-coupon.html">Thêm mã giảm giá</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="taxes.html">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Liên hệ</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-settings-line"></i>
                                        <span>Cài đặt</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="profile-setting.html">Profile Setting</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Reports</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="list-page.html">
                                        <i class="ri-list-check"></i>
                                        <span>List Page</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->

            {{-- contents start --}}
            @yield('contents')
            {{-- contents end --}}

            <!-- footer start-->
            <div class="container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2024 © Fastkart theme by pixelstrap</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- footer End-->
        </div>
        <!-- index body end -->
    </div>
    <!-- Page Body End -->

    <!-- Modal Start -->
    <!-- ... giữ nguyên modal ... -->

    <!-- latest js -->
    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js -->
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar simplebar js -->
    <script src="{{ asset('backend/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery -->
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
    <!-- tooltip init js -->
    <script src="{{ asset('backend/assets/js/tooltip-init.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('backend/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('backend/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart/apex-chart/apex-chart1.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart/apex-chart/chart-custom1.js') }}"></script>
    <script src="{{ asset('backend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom-slick.js') }}"></script>
    <script src="{{ asset('backend/assets/js/customizer.js') }}"></script>
    <script src="{{ asset('backend/assets/js/ratio.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sidebareffect.js') }}"></script>
    <script src="{{ asset('backend/assets/js/script.js') }}"></script>


    {{-- Validate form thêm user --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-add-user');

            // Lưu placeholder mặc định ban đầu
            ['name', 'email', 'phone', 'password', 'password_confirmation'].forEach(function(field) {
                const input = form.querySelector('[name="' + field + '"]');
                if (input) {
                    input.dataset.placeholderDefault = input.placeholder;
                }
            });

            // === Check email trùng realtime ===
            let emailTimer = null;
            const emailInput = form.querySelector('[name="email"]');
            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    // Reset khi user gõ lại
                    emailInput.classList.remove('is-invalid');
                    emailInput.placeholder = emailInput.dataset.placeholderDefault || '';

                    clearTimeout(emailTimer);
                    const email = emailInput.value.trim();
                    if (!validateEmailStrict(email)) return;

                    emailTimer = setTimeout(function() {
                        fetch(
                                `/admin/users/api/check-email-exists?email=${encodeURIComponent(email)}`
                            )
                            .then(res => res.json())
                            .then(data => {
                                if (data.exists) {
                                    showError('email', 'Email đã tồn tại');
                                }
                            });
                    }, 600);
                });
            }

            // === Validate client + gửi AJAX ===
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let valid = true;

                // Reset lỗi cũ
                ['name', 'email', 'phone', 'password', 'password_confirmation'].forEach(function(field) {
                    const input = form.querySelector('[name="' + field + '"]');
                    if (input) {
                        input.classList.remove('is-invalid');
                        input.placeholder = input.dataset.placeholderDefault || '';
                    }
                });

                // Lấy dữ liệu
                const name = form.querySelector('[name="name"]').value.trim();
                const email = form.querySelector('[name="email"]').value.trim();
                const phone = form.querySelector('[name="phone"]').value.trim();
                const password = form.querySelector('[name="password"]').value.trim();
                const password_confirmation = form.querySelector('[name="password_confirmation"]').value
                    .trim();

                // Họ và tên
                if (name === '') {
                    showError('name', 'Họ và tên không được bỏ trống');
                    valid = false;
                } else if (name.length < 4) {
                    showError('name', 'Họ và tên phải tối thiểu 4 ký tự');
                    valid = false;
                } else if (!/[A-ZÀÁẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶĐÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴ]/.test(
                        name)) {
                    showError('name', 'Họ và tên phải có ít nhất 1 chữ in hoa');
                    valid = false;
                } else if (/[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(name)) {
                    showError('name', 'Họ và tên không chứa số hoặc ký tự đặc biệt');
                    valid = false;
                }

                // Email
                if (email === '') {
                    showError('email', 'Email không được bỏ trống');
                    valid = false;
                } else if (!validateEmailStrict(email)) {
                    showError('email', 'Email không hợp lệ');
                    valid = false;
                }

                // Số điện thoại
                if (phone === '') {
                    showError('phone', 'Số điện thoại không được bỏ trống');
                    valid = false;
                } else if (!/^(0[3|5|7|8|9])[0-9]{8}$/.test(phone)) {
                    showError('phone', 'Số điện thoại không hợp lệ');
                    valid = false;
                }

                // Mật khẩu
                if (password === '') {
                    showError('password', 'Mật khẩu không được bỏ trống');
                    valid = false;
                } else if (password.length < 6) {
                    showError('password', 'Mật khẩu tối thiểu 6 ký tự');
                    valid = false;
                } else if (!/(?=.*[A-Z])/.test(password)) {
                    showError('password', 'Mật khẩu phải có ít nhất 1 chữ in hoa');
                    valid = false;
                } else if (!/(?=.*[0-9])/.test(password)) {
                    showError('password', 'Mật khẩu phải có ít nhất 1 số');
                    valid = false;
                }

                // Nhập lại mật khẩu
                if (password_confirmation === '') {
                    showError('password_confirmation', 'Vui lòng nhập lại mật khẩu');
                    valid = false;
                } else if (password !== password_confirmation) {
                    showError('password_confirmation', 'Mật khẩu nhập lại không khớp');
                    valid = false;
                }

                if (!valid) return;

                // Gửi AJAX lên server (Laravel validate lại)
                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                    })
                    .then(async response => {
                        let data = {};
                        try {
                            data = await response.json();
                        } catch (err) {}

                        if (response.status === 422) {
                            // Lỗi validate từ backend
                            let errors = data.errors || {};
                            for (let field in errors) {
                                showError(field, errors[field][0]);
                            }
                        } else if (response.ok) {
                            // Thành công, chuyển trang
                            window.location.href = data.redirect || "/admin/users";
                        } else {
                            alert("Có lỗi hệ thống!");
                        }
                    })
                    .catch(() => {
                        alert("Không thể kết nối đến server!");
                    });
            });

            // Khi user gõ lại, bỏ viền đỏ và placeholder về mặc định
            ['name', 'email', 'phone', 'password', 'password_confirmation'].forEach(function(field) {
                const input = form.querySelector('[name="' + field + '"]');
                if (input) {
                    input.addEventListener('input', function() {
                        input.classList.remove('is-invalid');
                        input.placeholder = input.dataset.placeholderDefault || '';
                    });
                }
            });

            // Hiển thị lỗi cho 1 input
            function showError(inputName, message) {
                const input = form.querySelector('[name="' + inputName + '"]');
                if (input) {
                    input.classList.add('is-invalid');
                    input.value = '';
                    input.placeholder = message;
                }
            }

            // Check email chuẩn
            function validateEmailStrict(email) {
                return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
            }
        });
    </script>
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
            background-color: #fff3f3;
        }

        .is-invalid::placeholder {
            color: #dc3545 !important;
            opacity: 1;
        }
    </style>

    {{-- popup start --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn-toggle-status').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const url = btn.getAttribute('data-url');

                Swal.fire({
                    title: 'Bạn có chắc chắn muốn ẩn user này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const url = btn.getAttribute('data-url');
                Swal.fire({
                    title: 'Bạn chắc chắn muốn xóa?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Tạo form POST xóa động và submit
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;

                        const csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = '{{ csrf_token() }}';
                        form.appendChild(csrf);

                        const method = document.createElement('input');
                        method.type = 'hidden';
                        method.name = '_method';
                        method.value = 'DELETE';
                        form.appendChild(method);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    </script>

    {{-- popup end --}}

</body>

</html>
