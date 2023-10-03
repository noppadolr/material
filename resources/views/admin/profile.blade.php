
@extends('admin.body.main')
@section('title','Admin Profile')
@section('main')
    @push('css')
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/page-profile.css')}}" />
    @endpush
    <div class="container-xxl flex-grow-1 container-p-y">
{{--        <h4 class="py-3 mb-4"><span class="text-muted fw-light">User Profile /</span> Profile</h4>--}}
        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{asset('admin/assets/img/pages/profile-banner.png')}}" alt="Banner image" class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img
                                src="{{asset('admin/assets/img/avatars/1.png')}}"
                                alt="user image"
                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{$adminData->name}}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
{{--                                        <li class="list-inline-item">--}}
{{--                                            <i class="mdi mdi-invert-colors me-1 mdi-20px"></i--}}
{{--                                            ><span class="fw-medium">UX Designer</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <i class="mdi mdi-map-marker-outline me-1 mdi-20px"></i--}}
{{--                                            ><span class="fw-medium">Vatican City</span>--}}
{{--                                        </li>--}}
                                        <li class="list-inline-item">
                                            <i class="mdi mdi-calendar-blank-outline me-1 mdi-20px"></i
                                            ><span class="fw-medium"> Joined April 2021</span>
                                        </li>
                                    </ul>
                                </div>
{{--                                <a href="javascript:void(0)" class="btn btn-primary">--}}
{{--                                    <i class="mdi mdi-account-check-outline me-1"></i>Connected--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->
        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <!--/ Navbar pills -->
        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="card-text text-uppercase">About</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-account-outline mdi-24px"></i
                                ><span class="fw-medium mx-2">Full Name:</span> <span>{{ $adminData->name }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-account-alert mdi-24px"></i
                                ><span class="fw-medium mx-2">User Name:</span> <span>{{ $adminData->username }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-check mdi-24px"></i><span class="fw-medium mx-2">Status:</span>

                                @if( $adminData->status  == "active")
                                    <span class="badge bg-label-success rounded-pill">Active</span>
                                @else
                                    <span class="badge bg-label-danger rounded-pill">Inactive</span>
                                @endif


                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-star-outline mdi-24px"></i><span class="fw-medium mx-2">Role:</span>
                                @if( $adminData->role  == "admin")
                                    <span class="badge bg-label-info rounded-pill">Admin</span>
                                @elseif( $adminData->role  == "manager")
                                    <span class="badge bg-label-warning rounded-pill">Manager</span>
                                @endif
{{--                                <span>{{ $adminData->role }}</span>--}}
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-flag-outline mdi-24px"></i><span class="fw-medium mx-2">Address:</span>
                                <span>USA</span>
                            </li>

                        </ul>
                        <small class="card-text text-uppercase">Contacts</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-medium mx-2">Contact:</span>
                                <span>{{ $adminData->phone }}</span>
                            </li>

                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-email-outline mdi-24px"></i><span class="fw-medium mx-2">Email:</span>
                                <span>{{ $adminData->email }}</span>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">

                <div class="row">
                    <div class="card mb-8">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Update Profile</h5>
                            <small class="text-body float-end">Merged input group</small>
                        </div>
                        <div class="card-body">


                            <form method="POST" enctype="multipart/form-data" action="">
                                @csrf
                                <div class="input-group input-group-merge mb-4">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" class="form-control" name="name" id="basic-icon-default-fullname"
                                               placeholder="" aria-label="" aria-describedby="basic-icon-default-fullname2"
                                                value="{{$adminData->name}}"
                                        >
                                        <label for="basic-icon-default-fullname">Full Name</label>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge mb-4">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="mdi mdi-account-alert"></i></span>
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="basic-icon-default-company" name="username"
                                               class="form-control" placeholder="" aria-label=""
                                               aria-describedby="basic-icon-default-company2"
                                               value="{{$adminData->username}}"
                                        >
                                        <label for="basic-icon-default-company">User Name</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="basic-icon-default-email" value="{{$adminData->email}}" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2">
                                            <label for="basic-icon-default-email">Email</label>
                                        </div>
                                        <span id="basic-icon-default-email2" class="input-group-text"></span>
                                    </div>
                                    <div class="form-text">You can use letters, numbers &amp; periods</div>
                                </div>
                                <div class="input-group input-group-merge mb-4">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="basic-icon-default-phone" value="{{$adminData->phone}}" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                                        <label for="basic-icon-default-phone">Phone No</label>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge mb-4">
                                    <span id="basic-icon-default-message2" class="input-group-text"><i class="mdi mdi-home-account"></i></span>
                                    <div class="form-floating form-floating-outline">
                                        <textarea id="basic-icon-default-message" class="form-control" placeholder=""
                                                  aria-label="" aria-describedby="basic-icon-default-message2"
                                                  style="height: 60px" >{{$adminData->address}}</textarea>
                                        <label for="basic-icon-default-message">Address</label>
                                    </div>
                                </div>

                                <div class="input-group mb-4" >
                                    <label class="input-group-text" for="inputGroupFile01">Photo</label>
                                    <input type="file" class="form-control" id="inputGroupFile01">
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light">Send</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--/ User Profile Content -->








    </div>{{--end container-xxl --}}
    @push('script')
        <script src="{{asset('admin/assets/js/pages-profile.js')}}"></script>
    @endpush
@endsection
