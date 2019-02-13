$(function () {
    if ($('#mailLogin').hasClass('is-invalid')) {
        $('#mailRegister').removeClass('is-invalid');
        $('#passwordRegister').removeClass('is-invalid');
        $('#modalLogin').modal('show');
        $('#nav-register-login').tab('show');
    }

    if ($('#mailRegister').hasClass('is-invalid')) {
        $('#mailLogin').removeClass('is-invalid');
        $('#passwordLogin').removeClass('is-invalid');
        $('#modalLogin').modal('show');
        $('#nav-register-tab').tab('show');
    }
});
