<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register | Bank Sampah </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('login') }}/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login') }}/css/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login') }}/images/banksampah.png" alt="IMG" height="300">
                </div>
				<form class="validate-form" action="{{ route('register') }}" method="post">
                    @csrf
					<span class="login100-form-title">
						Register Nasabah
					</span>
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="nama" placeholder="nama">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div> --}}


					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="myInput" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                            {{-- <span id="mybutton" onclick="change()"><i class="fa fa-eye"></i></span> --}}
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_confirmation" id="myInput" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                            {{-- <span id="mybutton" onclick="change()"><i class="fa fa-eye"></i></span> --}}
						</span>
					</div>
                    {{-- <div class="wrap-input100 validate-input">
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div> --}}

					<div>
                        <button type="submit" class="btn btn-success btn-block">Register</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('login') }}">
							Back To Login
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="{{ asset('login') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('login') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('login') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('login') }}/vendor/select2/select2.min.js"></script>
	<script src="{{ asset('login') }}/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
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
<!--===============================================================================================-->
	<script src="{{ asset('login') }}/js/main.js"></script>

</body>
</html>
