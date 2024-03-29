function profileUpdateValidation() {
    event.preventDefault();
    const unameRegEx = '^(?=[a-zA-Z0-9_-]{3,254}$)(?!.*[_-]{2})[^_-].*[^_-]$';
    var form = document.getElementById('profileUpdateForm');
    var data = $(form).serializeArray();

    var fname = data[2];
    var lname = data[3];
    var uname = data[4];
    var jmbg = data[5];
    var pass = data[6];
    var passConf = data[7];


    var errors = 0;

    data.slice(2, 6).forEach(function (item) {
        if (item.value.length < 1) {
            errors++;
            $(form.querySelector(`input[name=${item.name}]`)).addClass('is-invalid');
        }
    });

    if (!(uname.value.match(unameRegEx))) {
        errors++;
        $(form.querySelector(`input[name=${uname.name}]`)).addClass('is-invalid');
    }

    if (!(/^[0-9]{13}$/.test(jmbg.value))) {
        errors++;
        $(form.querySelector(`input[name=${jmbg.name}]`)).addClass('is-invalid');
    }

    if (pass.value.length > 0) {
        if (pass.value.length < 8) {
            errors++;
            $(form.querySelector(`input[name=${pass.name}]`)).addClass('is-invalid');
        } else if (pass.value !== passConf.value) {
            errors++;
            $(form.querySelector(`input[name=${passConf.name}]`)).addClass('is-invalid');
        }
    }

    if (errors === 0) {
        $(form).submit();
    }
}

function removeInvalid(input) {
    $(input).removeClass('is-invalid');
}
