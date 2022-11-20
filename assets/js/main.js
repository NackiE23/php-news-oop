let messagesPk = 0

function showMessage(message, type = 'success', timeOut = 3000) {
    $('#pop-up-messages').show();
    let messagePk = messagesPk + 1;
    messagesPk = messagePk;
    $('#pop-up-messages').append(`<div id="pop-up-${messagePk}" class="pop-up-message ${type}">\
                                <div class="close"></div>\
                                <p class="pop-up-message__text">${message}</p>\
                                </div>`);
    setTimeout(function() {
        $(`#pop-up-${messagePk}`).slideUp('fast');
    }, timeOut)
    setTimeout(function() {
        $(`#pop-up-${messagePk}`).remove();
    }, timeOut+100)
}

function closeAllForms() {
    $('.form').fadeOut('fast');
};

$('.close').click(function() {
    $(this).parent().fadeOut('fast');
    $("#blur").fadeOut('fast');
});

$("#pop-up-messages").on("click", '.close', function() {
    var el = $(this).parent();
    el.slideUp('fast');
    setTimeout(function() {el.remove();}, 600)
});
