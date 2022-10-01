<x-landing-layout>
    @section('styles')
        <style>
            body {
                background: rgb(99, 39, 120)
            }

            .form-control:focus {
                box-shadow: none;
                border-color: #BA68C8
            }

            .profile-button {
                background: rgb(99, 39, 120);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                background: #682773
            }

            .profile-button:focus {
                background: #682773;
                box-shadow: none
            }

            .profile-button:active {
                background: #682773;
                box-shadow: none
            }

            .back:hover {
                color: #682773;
                cursor: pointer
            }

            .labels {
                font-size: 11px
            }

            .add-experience:hover {
                background: #BA68C8;
                color: #fff;
                cursor: pointer;
                border: solid 1px #BA68C8
            }
            #cropper-wrapper {
                width: 100vw;
                height: 100vh;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 99999;
                background: rgba(0, 0, 0, 0.85);
            }

            #cropper-frame {
                margin: 1.25rem auto;
                position: absolute;
                top: 55%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 1.25rem;

            }

            #cropper-image-frame {
                max-width: 80vw;
                max-height: 60vh;
            }

            #cropper-preview {
                width: 100%;
            }

            #cropper-image-frame {
                min-width: 25vw;
                min-height: 25vh;
            }

            #cropper-action-btns {
                margin-top: 1.25rem;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection
    @section('scripts')
            <script src="{{ asset('js/cropper.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script class="u-script" src="{{ asset('js/landing/profile-update.js') }}"></script>
            <script>
                var cropperFunction = function (e) {
                    var cropperOverlay = document.getElementById('cropper-wrapper');
                    var cropperPreview = document.getElementById('cropper-preview');
                    var croppedOutput = document.getElementById('image-output');
                    var cropperCropBtn = document.getElementById('cropper-crop-btn');
                    var cropperCancleBtn = document.getElementById('cropper-cancle-btn');
                    var form = document.getElementById('profileUpdateForm');

                    console.log()

                    var cropper;

                    // load cropper overlay and crop image
                    console.log(e.target.files[0]);
                    if(e.target.files && e.target.files[0]) {

                        // file reader API
                        var reader = new FileReader();
                        reader.readAsDataURL(e.target.files[0]);
                        reader.onload = function (e) {

                            // setup cropper
                            cropperPreview.src = e.target.result;
                            var options = {
                                aspectRatio: 1
                            }
                            cropper = new Cropper(cropperPreview, options);
                            cropperOverlay.style.display = 'block';
                        }

                        // save cropped data
                        cropperCropBtn.addEventListener('click', function (e) {

                            // get cropped data from cropper && display cropped image into output block
                            cropper.getCroppedCanvas().toBlob(blob => {
                                var file = new File([blob], Date.now(), { type: blob.type });
                                var container = new DataTransfer();

                                container.items.add(file);

                                var input = document.createElement('input');
                                input.name = "photoPath";
                                input.type = 'file';
                                input.files = container.files;
                                input.classList.add('hidden');
                                form.appendChild(input);

                                croppedOutput.style.display = 'block';
                                croppedOutput.src = URL.createObjectURL(blob);
                            });

                            // destroy cropper and cropper overlay
                            cropper.destroy();
                            cropperOverlay.style.display = 'none';
                            $('input[type="file"]').val('');
                        });

                        // reject cropped data
                        cropperCancleBtn.addEventListener('click', function(e) {
                            cropper.destroy();
                            cropper = null;
                            cropperOverlay.style.display = 'none';
                            $('input[type="file"]').val('');
                        });
                    }

                }
            </script>
    @endsection
        <div id="cropper-wrapper" style="display: none;">
            <div id="cropper-frame" class="bg-white shadow-lg">
                <div id="cropper-image-frame">
                    <img src="{{ asset('img/login.jpg') }}" alt="" id="cropper-preview">
                </div>

                <div id="cropper-action-btns" class="mx-2">
                    <button id="cropper-cancle-btn" type="button" class="btn btn-danger">
                        Otkaži
                    </button>
                    <button id="cropper-crop-btn" type="button" class="btn btn-primary">
                        Sačuvaj
                    </button>
                </div>
            </div>
        </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <form id="profileUpdateForm" action="{{ route('me.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div id="empty-cover-art" class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                            <input hidden onchange="cropperFunction(event)" id="upload-picture" value="" name="picture-raw" type="file" class="hidden" :accept="accept">
                            <img style="cursor: pointer" class="rounded-circle mt-5" id="image-output" width="150px" src="{{ $user->photoPath }}" onclick="$('#upload-picture').click()" alt="profilePhoto">
                        </div>
                        <span class="font-weight-bold">{{ $user->name }} {{ $user->surname }}</span><span class="text-black-50">{{ $user->email }}</span><span> </span></div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input onkeydown="removeInvalid(this)" type="text" required class="form-control" name="firstname" placeholder="First name" value="{{ $user->name }}"></div>
                            <div class="col-md-6"><label class="labels">Surname</label><input onkeydown="removeInvalid(this)" type="text" class="form-control" value="{{ $user->surname }}" name="lastname" placeholder="Surname"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Username</label><input pattern="^(?=[a-zA-Z0-9_-]{3,254}$)(?!.*[_-]{2})[^_-].*[^_-]$" onkeydown="removeInvalid(this)" type="text" required class="form-control" name="username" placeholder="Username" value="{{ $user->username }}"></div>
                            <div class="col-md-12"><label class="labels">JMBG</label><input type="text" disabled class="form-control" placeholder="JMBG" value="{{ $user->jmbg }}"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" disabled class="form-control" placeholder="E-mail" value="{{ $user->email }}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Password</label><input onkeydown="removeInvalid(this)" name="password" type="password" class="form-control" placeholder="Password" value=""></div>
                            <div class="col-md-6"><label class="labels">Confirm Password</label><input onkeydown="removeInvalid(this)" name="password_confirmation" type="password" class="form-control" value="" placeholder="Confirm Password"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-prem" id="profileUpdateBtn" type="button" onclick="profileUpdateValidation()">Save Profile</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-landing-layout>
