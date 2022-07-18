var timeoutId;

$('#rokRezervacije').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    setTimeout(function() {

        var value = $('#rokRezervacije').val();
        var id = $('#id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/settings/policy/" + id,
            data: $('#rokRezervacijeForma').serialize(),
            success:function(){
                setTimeout(function () {
                    $("#savedMessage1").css({"visibility":"visible"})
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#savedMessage1").css({"visibility":"hidden"})
            }
        });

    }, 500);

});

$('#rokVracanja').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    setTimeout(function() {

        var value = $('#rokVracanja').val();
        var id = $('#id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "/settings/policy/" + id,
            data: $('#rokVracanjaForma').serialize(),
            success:function(){
                setTimeout(function () {
                    $("#savedMessage2").css({"visibility":"visible"})
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });


    }, 500);

});

$('#rokKonflikta').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    setTimeout(function() {

        var value = $('#rokKonflikta').val();
        var id = $('#id').val();

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
                    $("#savedMessage3").css({"visibility":"visible"})
                }, 200);
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });


    }, 500);

});
