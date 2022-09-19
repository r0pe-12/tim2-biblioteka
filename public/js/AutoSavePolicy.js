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

$('form.policy').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    var savedMsg = $('#savedMessage'+this.getAttribute('identifier'));
    savedMsg.fadeOut();

    var errorDiv = document.getElementById('errorDiv'+this.getAttribute('identifier'));

    $(errorDiv.querySelector('.e1')).fadeOut();
    $(errorDiv.querySelector('.e2')).fadeOut();
    $(errorDiv.querySelector('.e3')).fadeOut();

    var form = this;
    var value = $('.inputValue', this).val();

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
                url: form.action,
                data: $(form).serialize(),
                success:function(data){
                    setTimeout(function () {
                        savedMsg.fadeIn();
                    }, 200);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    savedMsg.fadeOut();
                }
            });
        }, 500);
    }

});
