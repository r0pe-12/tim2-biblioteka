function pullReserveModal(btn) {
    var bookName = $(btn).attr('data-book-name');
    var clientName = $('meta[name="client-name"]').attr('content');

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
            console.log('ako je confirmed onda saljemo ajax request i rokamo swal da nas razveseli');
            // Swal.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success'
            // )
        }
    })
}
