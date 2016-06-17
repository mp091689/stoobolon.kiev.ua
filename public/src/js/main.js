$(function () {
    var $modalInput = $('.modal-content').find('input');
    var $modalTextarea = $('.modal-content').find('textarea');

    // show modal form
    $('.modal-icon').click(function() {
        $('.modal-content').show(300);
    });

    // hide modal form
    $('.modal-content-close').click(function() {
        $('.modal-content').hide();
		    $modalInput.val('');
		    $modalTextarea.val('');
    });
});