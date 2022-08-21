$(document).ready(function () {
    $('#myTable').each(function () {
        this.removeAttribute('class');
        this.class = 'table table-striped table-bordered';
    })
    $('#myTable thead').each(function () {
        this.removeAttribute('class');
    })
    $('#myTable thead tr').each(function () {
        this.removeAttribute('class');
    })
    // Setup - add a text input to each footer cell
    $('#myTable tfoot th').slice(1, -1).each(function () {

        var title = $.trim($(this).text());
        $(this).html('<input type="text" placeholder="Pretraži ' + title + '" />');
    })

    // DataTable
    var table = $('#myTable').DataTable({
        pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Sve']],
        "columnDefs": [ {
            "targets": [0, -1],
            "searchable": false,
            "orderable": false
        } ],
        order: [[1, 'asc']],
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
