var iid = 0;
ajaxRequest(
    './claimscript.php', { 'search': '' },
    null,
    (r) => {
        $('.item-list').html(r.data);
        $('.viewInfoBtn').click(function() {
            iid = $(this).attr('iid');
            fetchInfo($(this).attr('iid'));
        })
    },
    (r) => {
        $('.item-list').html(r.data);
    }
)
$('#filter').change(function() {
    ajaxRequest(
        './claimscript.php', { 'filter': $(this).val() },
        null,
        (r) => {
            $('.item-list').html(r.data);
            $('.viewInfoBtn').click(function() {
                fetchInfo($(this).attr('iid'));
            })
        },
        (r) => {
            $('.item-list').html(r.data);
        }
    )
})
$('.search-field').keyup(function() {
    if ($(this).val().trim())
        ajaxRequest(
            './claimscript.php', { 'search': $(this).val() },
            null,
            (r) => {
                $('.item-list').html(r.data);
                $('.viewInfoBtn').click(function() {
                    fetchInfo($(this).attr('iid'));
                })
            },
            (r) => {
                $('.item-list').html(r.data);
            }
        )
})

$('.close-view-item').click(function(e) {
    e.preventDefault();
    $('.claim-wrapper').css({ transform: 'translateX(0)' });
    $('.view-item').css({ transform: 'translateX(150%)' });
})

function fetchInfo(iid) {
    ajaxRequest(
        './claimscript.php', { 'infoid': iid },
        () => {
            $('.claim-wrapper').css({ transform: 'translateX(-150%)' });
            $('.view-item').css({ transform: 'translateX(0)' });
        },
        (r) => {
            var d = r.data
            $('.iname').text(d.name)
            $('.icat').text(d.catname)
            $('.iloc').text(d.loc)
            $('.fem').text(d.em)
            $('.fnum').text(d.pn)
            $('.idesc').text(d.des)
            $('.iimg').attr('src', `./media/lattach/${d.img}`)
            $('.claim-btn').attr('iid', d.iid)
        },
        (r) => {
            alert(r.err)
        }
    )
}
$('.claim-btn').click(function() {
    var quest = prompt("What location did you loose/drop this item?")
    if (quest) {
        ajaxRequest(
            './claimscript.php', { sendClaim: iid, loc: quest },
            addBtnLoader($('.claim-btn'), 'Sending Mail', false),
            (r) => {
                alert('Claim Mail sent successfully!')
                location.href = './index.php'
            },
            (r) => {

            }
        )
    }
});