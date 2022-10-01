function searchBook() {
    var form = document.getElementById("searchBookForm");
    var data = $(form).serialize();
    var wrapper = document.getElementById("bookWrapper");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: form.action,
        data: data,
        success:function(data){
            $(wrapper).addClass('blur1');
            // setTimeout(function () {
                var books = data.books;
                if (books.length > 0) {
                    wrapper.innerText = '';

                    if (data.auth) {
                        books.forEach(function (book) {
                            wrapper.innerHTML += auth(book);
                        });
                    } else {
                        books.forEach(function (book) {
                            wrapper.innerHTML += noAuth(book);
                        });
                    }

                }
            // }, 200)
            setTimeout(function () {
                $(wrapper).removeClass('blur1')
            }, 300);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log('error');
        }
    });
}

function noAuth(book) {
    var card =
            `<div style="margin: auto" class="col-auto">
                <div class="card" style="width: 18rem;height: auto">
                    <a style="height: 461px" href="#knjigaPrikaz">
                        <img style="object-fit: contain;height: 100%; width: 100%"
                             src="${book.photo}" class="book-image" alt="...">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: x-large"><a href="#knjigaPrikaz">${book.title}</a>
                        </h2>
                        <div class="card-text" style="min-height: 120px">
                            ${book.description.slice(0, 100)}...
                        </div>
                        <div class="d-grid gap-2">
                        </div>
                    </div>
                </div>
            </div>`
    return card;
}

function auth(book) {
    var btn =
    `
    <button ${book.ableToBorrow && book.ableToReserve ? '' : 'disabled'} onclick="pullReserveModal(this)" data-book-id="${book.id}" data-book-name="${book.title}" class="btn btn-prem">Rezerviši</button>
    `
    var card =
        `<div style="margin: auto" class="col-auto">
                <div class="card" style="width: 18rem;height: auto">
                    <a style="height: 461px" href="#knjigaPrikaz">
                        <img style="object-fit: contain;height: 100%; width: 100%"
                             src="${book.photo}" class="book-image" alt="...">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: x-large"><a href="#knjigaPrikaz">${book.title}</a>
                        </h2>
                        <div class="card-text" style="min-height: 120px">
                            ${book.description.slice(0, 100)}...
                        </div>
                        <div class="d-grid gap-2">
                            ${btn}
                        </div>
                    </div>
                </div>
            </div>`
    return card;

}
