function showLoader(option = Boolean, text = String) {
    option ? $('.l-wrapper').css({ top: 0 }) : $('.l-wrapper').css({ top: '-120%' });
    text ? $('.l-wrapper .err').text(text).css({ color: 'rgb(18, 66, 105)', opacity: 1 }) :
        $('.l-wrapper .err').text(text);

}

function showAnimation(status, text) {
    $('.l-left, .l-right').addClass('stopanimations');
    status ?
        setTimeout(() => {
            $('.l-left').addClass('c-down');
            $('.l-right').addClass('c-top');
            setTimeout(() => { $('.l-inner').css({ borderTop: '4px gray solid' }); }, 400);
            setTimeout(() => { $('.l-inner').css({ borderLeft: '4px gray solid' }); }, 480);
            setTimeout(() => { $('.l-inner').css({ borderBottom: '4px gray solid' }); }, 560);
            setTimeout(() => { $('.l-inner').css({ borderRight: '4px gray solid' }); }, 640);
            setTimeout(() => { $('.l-inner').css({ transform: 'scale(.7)' }); }, 720);
            setTimeout(() => { $('.l-wrapper .err').text(text).css({ color: 'rgb(18, 66, 105)', opacity: 1 }); }, 800);
        }, 500) :
        setTimeout(() => {
            $('.l-left').addClass('w-top');
            $('.l-right').addClass('w-down');
            setTimeout(() => { $('.l-inner').css({ borderTop: '4px rgb(82, 32, 32) solid' }); }, 400);
            setTimeout(() => { $('.l-inner').css({ borderLeft: '4px rgb(82, 32, 32) solid' }); }, 480);
            setTimeout(() => { $('.l-inner').css({ borderBottom: '4px rgb(82, 32, 32) solid' }); }, 560);
            setTimeout(() => { $('.l-inner').css({ borderRight: '4px rgb(82, 32, 32) solid' }); }, 640);
            setTimeout(() => { $('.l-inner').css({ transform: 'scale(.7)' }); }, 720);
            setTimeout(() => { $('.l-wrapper .err').text(text).css({ color: 'rgb(82, 32, 32)', opacity: 1 }); }, 800);
        }, 500);
    setTimeout(() => {
        $('.l-wrapper').css({ top: '-120%' });
        setTimeout(() => {
            removeAnimationStatus();
        }, 1000);
    }, 4000);
}

function removeAnimationStatus() {
    $('.l-left').removeClass('c-down');
    $('.l-right').removeClass('c-top');
    $('.l-left').removeClass('w-top');
    $('.l-right').removeClass('w-down');
    $('.l-wrapper .err').text('').css({ opacity: 0 });
    $('.l-left, .l-right').removeClass('stopanimations');
    $('.l-inner').css({ border: 'none', transform: 'scale(1)' });

}

function updateLoaderText(text = String) {
    $('.l-wrapper .err').text(text);
}