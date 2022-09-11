var timeoutId;

function validate(value, errorDiv) {
    var send = true;

    if (value.length === 0) {
        send = false;
        $(errorDiv.querySelector('.e1')).fadeIn();
    }
    if (isNaN(value)) {
        send = false;
        $(errorDiv.querySelector('.e2')).fadeIn();
    }
    if (value < 0) {
        send = false;
        $(errorDiv.querySelector('.e3')).fadeIn();
    }
    return send;
}

$('#rokRezervacije').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage1").fadeOut();

    var errorDiv = document.getElementById('errorDiv1');

    $(errorDiv.querySelector('.e1')).fadeOut();
    $(errorDiv.querySelector('.e2')).fadeOut();
    $(errorDiv.querySelector('.e3')).fadeOut();

    var form = document.getElementById('rokRezervacijeForma');
    var value = $('#rokRezervacije').val();
    var id = form.querySelector('.id').value;

    var send = validate(value, errorDiv);

    if (send) {
        setTimeout(function() {
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
    }

});

$('#rokVracanja').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage2").fadeOut();

    var errorDiv = document.getElementById('errorDiv2');

    $(errorDiv.querySelector('.e1')).fadeOut();
    $(errorDiv.querySelector('.e2')).fadeOut();
    $(errorDiv.querySelector('.e3')).fadeOut();

    var form = document.getElementById('rokVracanjaForma');
    var value = $('#rokVracanja').val();
    var id = form.querySelector('.id').value;

    var send = validate(value, errorDiv)

    if (send) {
        setTimeout(function() {
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
    }

});

$('#rokKonflikta').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage3").fadeOut()

    var errorDiv = document.getElementById('errorDiv3');

    $(errorDiv.querySelector('.e1')).fadeOut();
    $(errorDiv.querySelector('.e2')).fadeOut();
    $(errorDiv.querySelector('.e3')).fadeOut();

    var form = document.getElementById('rokKonfliktaForma');
    var value = $('#rokKonflikta').val();
    var id = form.querySelector('.id').value;

    var send = validate(value, errorDiv);
    if (send) {
        setTimeout(function() {
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
    }

});

$('#maxIzdavanja').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    $("#savedMessage4").fadeOut();

    var errorDiv = document.getElementById('errorDiv4');

    $(errorDiv.querySelector('.e1')).fadeOut();
    $(errorDiv.querySelector('.e2')).fadeOut();
    $(errorDiv.querySelector('.e3')).fadeOut();

    var form = document.getElementById('maxIzdavanjaForma');
    var value = $('#maxIzdavanja').val();
    var id = form.querySelector('.id').value;

    var send = validate(value, errorDiv);

    if (send) {
        setTimeout(function() {
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
    }

});
