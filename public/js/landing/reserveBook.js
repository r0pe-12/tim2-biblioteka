function pullReserveModal(btn) {
    var bookName = $(btn).attr('data-book-name');
    var clientName = $('meta[name="client-name"]').attr('content');
    var bookId = $(btn).attr('data-book-id');

    Swal.fire({
        title: 'Da li želite rezervisati knjigu?',
        text: `${bookName} na ime ${clientName}`,
        icon: 'warning',
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Da, rezerviši!',
        cancelButtonText: 'Ne, odustani!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '/knjige/' + bookId + '/rezervisi',
                success:function(data){
                    if (data.success) {
                        Swal.fire(
                            'Rezervisano!',
                             data.message,
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Greška!',
                            data.data.errors,
                            'error'
                        )
                    }
                },
                error: function (xhr, ajaxOptions, thrownError, data) {
                    console.log(data)
                }
            });
        }
    })
}
