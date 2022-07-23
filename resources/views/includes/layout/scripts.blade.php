<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--<script src="{{ asset('js/jquery.min.js') }}" defer=""></script>--}}
<script src="{{ asset('js/bootstrap.bundle.js') }}" defer=""></script>
<script src="{{ asset('js/scripts.js') }}" defer=""></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- File upload -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
{{--<script src="https://unpkg.com/create-file-list"></script>--}}
<script src="{{ asset('js/create-file-list.min.js') }}"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- convert select to select2 -->
<script>
    $(document).ready(function() {
        $('.select2').select2({

        });
    });
</script>

    <!-- fade out flash session message -->
<script>
    $("document").ready(function(){
        let flash = 3000;
        let flash_msg = 5000;

        setTimeout(function(){
            $("#flash").fadeOut('slow');
        }, flash );

        setTimeout(function(){
            $("#flash-msg").fadeOut('slow');
        }, flash_msg );

        setTimeout(function(){
            $(".flash").fadeOut('slow');
        }, flash );
    });
</script>

{{-- cropper js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
