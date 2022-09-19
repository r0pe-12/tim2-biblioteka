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
    let value, data;
    var id = form.querySelector('.id').value

    var input = $('.inputValue', this);
    if (input.prop('type').toLowerCase() === 'checkbox') {
        if (input.prop('checked')) {
            value = 1;
            data = $(form).serialize()

        } else {
            value = 0;
            data = $(form).serialize() + '&value=' + value;
        }
    } else {
        value = input.val();
        data = $(form).serialize()
    }

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
                data: data,
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
