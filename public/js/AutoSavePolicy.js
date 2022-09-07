var timeoutId;

$('#rokRezervacije').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage1").fadeOut();
    setTimeout(function() {

        var form = document.getElementById('rokRezervacijeForma');
        var value = $('#rokRezervacije').val();
        var id = form.querySelector('.id').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/settings/policy/" + id,
            data: $(form).serialize(),
            success:function(data){
                setTimeout(function () {
                    $("#savedMessage1").fadeIn();
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#savedMessage1").fadeOut();
            }
        });

    }, 500);

});

$('#rokVracanja').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage2").fadeOut();
    setTimeout(function() {

        var form = document.getElementById('rokVracanjaForma');
        var value = $('#rokVracanja').val();
        var id = form.querySelector('.id').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "/settings/policy/" + id,
            data: $(form).serialize(),
            success:function(){
                setTimeout(function () {
                    $("#savedMessage2").fadeIn();
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#savedMessage2").fadeOut();
            }
        });


    }, 500);

});

$('#rokKonflikta').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage3").fadeOut()
    setTimeout(function() {

        var form = document.getElementById('rokKonfliktaForma');
        var value = $('#rokKonflikta').val();
        var id = form.querySelector('.id').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "/settings/policy/" + id,
            data: $('#rokKonfliktaForma').serialize(),
            success:function(){
                setTimeout(function () {
                    $("#savedMessage3").fadeIn()
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#savedMessage3").fadeOut()
            }
        });


    }, 500);

});

$('#maxIzdavanja').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage4").fadeOut();
    setTimeout(function() {

        var form = document.getElementById('maxIzdavanjaForma');
        var value = $('#rokKonflikta').val();
        var id = form.querySelector('.id').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "/settings/policy/" + id,
            data: $(form).serialize(),
            success:function(){
                setTimeout(function () {
                    $("#savedMessage4").fadeIn();
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#savedMessage4").fadeOut();
            }
        });


    }, 500);

});
