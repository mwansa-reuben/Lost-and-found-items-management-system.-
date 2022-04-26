$('.log-div.login').submit(function(e) {
    e.preventDefault();
    var txt = $('.log-sign-btn').text()
    ajaxFileRequest(
        './signinscript.php',
        new FormData(this),
        () => addBtnLoader($('.log-sign-btn'), 'Submitting', false),
        (r) => {
            alert(r.data);
            location.href = './index.php';
        },
        (r) => {
            $('.log-sign-btn').text(txt);
            warn($('.log-err'), r.err, 'element')
        }
    )
})


$('.log-div.sign').submit(function(e) {
    e.preventDefault();
    var txt = $('.log-sign-btn').text()
    ajaxFileRequest(
        './signinscript.php',
        new FormData(this),
        () => addBtnLoader($('.log-sign-btn'), 'Submitting', false),
        (r) => {
            alert(r.data);
            location.href = './login.php';
        },
        (r) => {
            $('.log-sign-btn').text(txt);
            warn($('.log-err'), r.err, 'element')
        }
    )
})


$('.forgot').click(function(e) {
    e.preventDefault();
    $('.log-div.login').addClass('d-n').removeClass('d-f');
    $('.log-div.reset').addClass('d-f').removeClass('d-n');
})
$('.login-show').click(function(e) {
    e.preventDefault();
    $('.log-div.login').addClass('d-n').removeClass('d-f');
    $('.log-div.reset').addClass('d-f').removeClass('d-n');
})

$('.log-div.reset').submit(function(e) {
    e.preventDefault();
    var txt = $('.log-sign-btn').text()
    ajaxFileRequest(
        './signinscript.php',
        new FormData(this),
        () => addBtnLoader($('.reset-sign-btn'), 'Submitting', false),
        (r) => {
            alert('Password Reset Successfully!');
            $('.log-div.login').addClass('d-n').removeClass('d-f');
            $('.log-div.reset').addClass('d-f').removeClass('d-n');
        },
        (r) => {
            $('.reset-sign-btn').text(txt);
            warn($('.reset-err'), r.err, 'element')
        }
    )
})