function pullCancelResModal(btn) {
    var bookName = $(btn).attr('data-book-name');
    var clientName = $('meta[name="client-name"]').attr('content');
    var resId = $(btn).attr('data-res-id');

    Swal.fire({
        title: 'Da li želite otkazati rezervaciju?',
        text: `Knjige ${bookName}`,
        icon: 'warning',
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Da, otkaži!',
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
                url: '/rezervacije/' + resId + '/otkazi',
                success:function(data){
                    if (data.success) {
                        Swal.fire(
                            'Rezervacija otkazana!',
                            data.message,
                            'success'
                        )
                        window.location.reload();
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
    });
}
