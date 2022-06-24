<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Bank Sampah </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('template/dist') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('template/dist') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/dist') }}/assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-stylesheet" />

</head>

<body class="authentication-bg">

    @include('sweetalert::alert')

    <div class="">

    </div>
    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="">
                        @include('sweetalert::alert')
                        <div class="card mb-0">
                            <div class="card-body p-4">

                                <div class="text-center">
                                    <div class="my-3">
                                        <a href="index.html">
                                            <span><img src="{{ asset('login') }}/images/banksampah.png" alt=""
                                                    height="100"></span>
                                        </a>
                                    </div>
                                    <h5 class="text-muted text-uppercase py-3 font-20">Change Password</h5>
                                </div>

                                <form action="{{ route('reset-password') }}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            {{ Session::get('success') }}
                                        </div>
                                    @elseif (Session::has('failed'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            {{ Session::get('failed') }}
                                        </div>
                                    @endif
                                    <input type="hidden" name="email" value="{{ $email }} " />

                                    <div class="form-group mb-3">
                                        <label for="">Password</label>

                                        <input type="password" name="password"
                                            class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                            value="{{ old('password') }}" placeholder="New Password">
                                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="confirm_password"
                                            class="form-control {{ $errors->first('confirm_password') ? 'is-invalid' : '' }}"
                                            value="{{ old('confirm_password') }}" placeholder="Confirm Password">
                                        {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}

                                    </div>



                                    <div class="form-group text-center">
                                        <button class="btn btn-success btn-block waves-effect waves-light"
                                            type="submit">Change Password</button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{ asset('template/dist') }}/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('template/dist') }}/assets/js/app.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>
