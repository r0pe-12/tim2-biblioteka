function searchBook() {
    var form = document.getElementById("searchBookForm");
    var data = $(form).serialize();
    var wrapper = document.getElementById("bookWrapper");

    // ISTER EG
    $('body').removeClass('istereg');
    if( $('#searchBar').val().toLowerCase() === 'loop') {
        $('body').addClass('istereg');
    }


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
                } else {
                    wrapper.innerHTML = noResult();
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
                    <a style="height: 461px" href="/knjige/${book.id}">
                        <img style="object-fit: contain;height: 100%; width: 100%"
                             src="${book.photo}" class="book-image" alt="...">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: x-large"><a href="/knjige/${book.id}">${book.title}</a>
                        </h2>
                        <div class="card-text" style="min-height: 120px">
                            ${book.description ? book.description.slice(0, 100).replace(/<\/?[^>]+(>|$)/g, "") + '...' : ''}
                        </div>
                        <div class="d-grid gap-2">
                            <button disabled class="btn btn-premium">Nije moguće rezervisati knjigu</button>
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
                    <a style="height: 461px" href="/knjige/${book.id}">
                        <img style="object-fit: contain;height: 100%; width: 100%"
                             src="${book.photo}" class="book-image" alt="...">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: x-large"><a href="/knjige/${book.id}">${book.title}</a>
                        </h2>
                        <div class="card-text" style="min-height: 120px">
                            ${book.description ? book.description.slice(0, 100).replace(/<\/?[^>]+(>|$)/g, "") + '...' : ''}
                        </div>
                        <div class="d-grid gap-2">
                            ${btn}
                        </div>
                    </div>
                </div>
            </div>`
    return card;

}

function noResult() {
    var card =
        `
        <div style="margin: auto" class="col-auto">
            <div class="card" style="width: 18rem;height: auto">
                <div class="card-body">
                    <h2 class="card-title" style="font-size: x-large; text-align: center">
                    Nema rezultata
                    </h2>
                </div>
            </div>
        </div>
        `
    return card;
}
