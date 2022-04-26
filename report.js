$('.rept-inner').submit(function(e) {
    e.preventDefault();
    ajaxFileRequest(
        './reportscript.php',
        new FormData(this),
        () => addBtnLoader($('.sub-item-btn'), 'Submitting', false),
        (r) => {
            alert(r.data);
            $('.rept-inner').trigger('reset');
            $('.sub-item-btn').text('Submit');
        },
        (r) => {
            $('.sub-item-btn').text('Submit');
            alert(r.err)
        }
    )
})