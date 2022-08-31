{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/jquery.min.js') }}" crossorigin="anonymous"></script>

<script src="{{ asset('js/modal.min.js') }}" defer=""></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}" defer=""></script>
<script src="{{ asset('js/scripts.js') }}" defer=""></script>

{{--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>--}}
<script src="{{ asset('js/cke/ckeditor.js') }}"></script>

<!-- File upload -->
{{--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}
    <script src="{{ asset('js/alpine.min.js') }}"defer></script>

    {{--<script src="https://unpkg.com/create-file-list"></script>--}}
    <script src="{{ asset('js/create-file-list.min.js') }}"></script>
<!-- end file upload -->

<!-- select2 -->
    {{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
    <script src="{{ asset('js/select2.min.js') }}"></script>
<!-- end select2 -->

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{asset('js/datatables.js')}}"></script>

<!-- convert select to select2 -->
    <script>
        $(document).ready(function() {
            $('.select2').select2({

            });
        });
    </script>
<!-- end convert select to select2 -->

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
<!-- end fade out flash session message -->

<!-- cropper.js -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script src="{{ asset('js/cropper.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- end cropper.js -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.onload = function () {
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

<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script>dayjs().format()</script>

<script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/sr.js"></script>
<script>dayjs.locale('sr')</script>

<script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
<script>dayjs.extend(window.dayjs_plugin_relativeTime)</script>
