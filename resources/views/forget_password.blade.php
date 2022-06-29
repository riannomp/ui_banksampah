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
                        <div class="card mb-0">
                            <div class="card-body p-4">
                                @include('sweetalert::alert')

                                <div class="text-center">
                                    <div class="my-3">
                                        <a href="index.html">
                                            <span><img src="{{ asset('login') }}/images/banksampah.png" alt=""
                                                    height="100"></span>
                                        </a>
                                    </div>
                                    <h5 class="text-muted text-uppercase py-3 font-20">Forget Password</h5>
                                </div>

                                <form class="mt-2" action="{{ route('forgot-password') }}" method="post">
                                    @csrf
                                    @if (session('errors'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Something it's wrong:
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif

                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input class="form-control" type="text"
                                            required="Valid email is required: ex@abc.xyz" name="email"
                                            placeholder="Masukkan Email">
                                    </div>



                                    <div class="form-group text-center">
                                        <button class="btn btn-success btn-block waves-effect waves-light"
                                            type="submit">Reset Password</button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <p class="text-black-50">Kembali ke <a href="{{ route('login') }}"
                                                    class="text-black ml-1"><b>Login</b></a></p>
                                        </div> <!-- end col -->
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
