<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding" />
    <meta name="author" content="bildstudio" />
    <!-- End Meta -->

    <!-- Title -->
    <title>Reset password | Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="{{ asset('img/library-favicon.ico') }}" type="image/vnd.microsoft.icon" />
    <!-- End Title -->

    <!-- Styles -->
    @include('includes/layout/styles')
    <!-- End Styles -->
</head>

<body>
<!-- Main content -->
<main class="h-screen small:hidden bg-login">
    <div class="flex items-center justify-center pt-[13%]">
        <div class="w-full" style="max-width: 550px">
            <form class="px-12 pt-6 pb-4 mb-4 bg-white rounded shadow-lg" method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('POST')
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="flex justify-center py-2 mb-4 text-2xl text-gray-800 border-b-2">
                    Online Biblioteka - Type new password
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-normal text-gray-700" for="email">
                        {{ __('Email Address') }}
                    </label>

                    <input
                        id="email" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="email"  type="email" required autofocus placeholder="Email" value="{{ $email ?? old('email') }}">

                    @error('email')
                        <span class="invalid-feedback text-sm text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-normal text-gray-700" for="password">
                        {{ __('Password') }}
                    </label>
                    <input
                        id="password" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        type="password" placeholder="Password" name="password" required autocomplete="new-password"/>

                    @error('password')
                        <span class="invalid-feedback text-sm text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password-confirm" class="block mb-2 text-sm font-normal text-gray-700">{{ __('Confirm Password') }}</label>
                    <input
                        id="password-confirm" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        type="password" placeholder="Password" name="password_confirmation" required autocomplete="new-password"/>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="inline-block px-4 py-2 text-white bg-blue-500 rounded shadow-lg btn-animation hover:bg-blue-600 focus:bg-blue-700">
                        {{ __('Reset Password') }}
                    </button>
                </div>
                <p class="text-xs text-center mt-[30px] text-gray-500">
                    &copy;2022 ICT Cortex. All rights reserved.
                </p>
            </form>
        </div>
    </div>
</main>
<!-- End Main content -->

<!-- Notification for small devices -->
@include('includes/layout/inProgress')

<!-- Scripts -->
@include('includes/layout/scripts')
<!-- End Scripts -->

</body>

</html>
