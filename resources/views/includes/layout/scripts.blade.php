{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/jquery.min.js') }}" crossorigin="anonymous"></script>

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

<script>
    $(document).ready(function () {
        $('table').each(function () {
            this.removeAttribute('class');
            this.class = 'table table-striped table-bordered';
        })
        $('table thead').each(function () {
            this.removeAttribute('class');
        })
        $('table thead tr').each(function () {
            this.removeAttribute('class');
        })
        // Setup - add a text input to each footer cell
        $('#myTable tfoot th').slice(1).each(function () {

            var title = $.trim($(this).text());
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        })

        // DataTable
        var table = $('#myTable').DataTable({
            columnDefs: [ {
                orderable: false,
                targets:   0
            } ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/sr-SP.json"
            },
            initComplete: function () {
                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
        });
        $('#myTable_filter').find('input').each(function () {
            this.placeholder = 'Search';
            this.class = 'py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900';
        })
        // const filter = document.getElementById('myTable_filter');
        // console.log(filter);
        // filter.removeChild(filter.firstChild);
        // const  label = document.createElement('label');
        // const node = document.createElement('input');
        // node.type = 'search';
        // node.placeholder = 'Search';
        // node.classList = 'form-control-sm py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900';
        // node.setAttribute('aria-controls', 'myTable');
        // label.appendChild(node);
        // console.log(filter);
        // filter.appendChild(label);
    });
</script>

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
