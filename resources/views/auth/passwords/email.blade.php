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
    <!-- Main Content -->
    <main class="h-screen small:hidden bg-login">
        <div class="flex items-center justify-center pt-[13%]">
            <div class="w-full" style="max-width: 500px">
                @if (session('status'))
                    <div class="bg-blue-100 border-t flex items-center border-b border-blue-500 text-blue-700 px-4 py-3" style="background-color:#34d399" role="alert">
                        <p class="font-bold items-center">{{session('status')}}</p>
                    </div>
                @endif

                <form class="px-12 pt-6 pb-4 mb-4 bg-white rounded shadow-lg" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @method('POST')

                    <div class="flex justify-center py-2 mb-4 text-2xl text-gray-800 border-b-2">
                        Online Biblioteka - Password reset
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-normal text-gray-700" for="email">
                            {{ __('Email Address') }}
                        </label>

                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            name="email"  type="email" required autofocus placeholder="Email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="inline-block px-4 py-2 text-white bg-blue-500 rounded shadow-lg btn-animation hover:bg-blue-600 focus:bg-blue-700">
                            {{ __('Send Password Reset Link') }}
                        </button>&nbsp;&nbsp;

                        <a href="{{route('login')}}" class="inline-block text-sm font-normal text-blue-500 align-baseline hover:text-blue-800" href="{{ route('password.request') }}">
                            Back to Login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |
                        </a>

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
