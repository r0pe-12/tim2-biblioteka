<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | InTheLoop - Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding" />
    <meta name="author" content="bildstudio" />
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="{{ asset('img/landing/intheloop-icon.svg') }}" type="image/vnd.microsoft.icon" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth-pages/css/main.css') }}">
    <!--===============================================================================================-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function flashMsg(msg, type) {
            Swal.fire({
                "title": msg,
                // "text":msg,
                "timer":5000,
                "width":"40rem",
                "padding":"1.2rem",
                "showConfirmButton":false,
                "showCloseButton":true,
                "timerProgressBar":false,
                "customClass":{"container":null,"popup":null,"header":null,"title":null,"closeButton":null,"icon":null,"image":null,"content":null,"input":null,"actions":null,"confirmButton":null,"cancelButton":null,"footer":null},
                "toast":true,
                "icon":type,
                "position":"top-end"});
        }

        window.onload = function () {
            @if($errors->any())
                @foreach($errors->all() as $error)
                    flashMsg("{{ $error }}", "error");
                @endforeach
                {{--const tempMsg = "{{ session('success') }}";--}}
                {{--var temp = document.createElement('div');--}}
                {{--temp.setAttribute('hidden', 'true');--}}
                {{--temp.innerHTML = tempMsg;--}}
                {{--const msg = temp.innerHTML;--}}

                {{--flashMsg(msg, 'success');--}}
            @endif

            @if(session('success'))
                const tempMsg = "{{ session('success') }}";
                var temp = document.createElement('div');
                temp.setAttribute('hidden', 'true');
                temp.innerHTML = tempMsg;
                const msg = temp.innerHTML;

                flashMsg(msg, 'success');
            @elseif(session('fail'))
                const tempMsg1 = "{{ session('fail') }}";
                var temp1 = document.createElement('div');
                temp1.setAttribute('hidden', 'true');
                temp1.innerHTML = tempMsg1;
                const msg1 = temp1.innerHTML;

                flashMsg(msg1, 'error');
            @endif
        }
    </script>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('auth-pages/images/img-01.png') }}" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                @method('POST')

					<span class="login100-form-title">
						Online Biblioteka
					</span>

                <!-- username -->
                <div class="wrap-input100 validate-input" data-validate = "Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-at @error('username') text-danger @enderror" aria-hidden="true"></i>
						</span>
                </div>

                <!-- fname -->
                <div class="wrap-input100 validate-input" data-validate = "First name is required">
                    <input class="input100" type="text" name="name" placeholder="First name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user @error('name') text-danger @enderror" aria-hidden="true"></i>
						</span>
                </div>

                <!-- lname -->
                <div class="wrap-input100 validate-input" data-validate = "Last name is required">
                    <input class="input100" type="text" name="surname" placeholder="Last name" value="{{ old('surname') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user @error('surname') text-danger @enderror" aria-hidden="true"></i>
						</span>
                </div>

                <!-- email -->
                <div class="wrap-input100 validate-input" data-validate = "Email is required">
                    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope-open @error('email') text-danger @enderror" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock @error('password') text-danger @enderror" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password confirmation is required">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Password confirmation">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock @error('password') text-danger @enderror" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-100">
                    <a class="txt2" href="{{ route('login') }}">
                        <i class="fa fa-long-arrow-left m-r-5" aria-hidden="true"></i>
                        Login instead
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="{{ asset('auth-pages/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('auth-pages/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('auth-pages/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('auth-pages/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('auth-pages/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{ asset('auth-pages/js/main.js') }}"></script>

</body>
</html>
