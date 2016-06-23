$(function () {
    var $modalInput = $('.modal').find('.modal-input');
    var $modalAuthor = $('.modal').find('input[name="author"]');
    var $modalPhone = $('.modal').find('input[name="phone"]');
    var $modalBody = $('.modal').find('textarea[name="body"]');
    var $modalBtn = $('.modal').find('button');
    var $_token = $('.modal input[name="_token"]').val();

    // Show modal form
    $('.modal-icon').click(function() {
        $('.modal').fadeIn(300);
        $('.modal-content').fadeIn(300);
        $('.modal .info-box').hide();
    });

    // Hide modal form
    $('.modal .modal-content-close').click(function(){
        closeClear();
    });
    $('.modal').click(function(){
        if ( $('.modal .info-box').css('display') == 'block' ){
            closeClear();
        }
    });

    // Set default colors in the form
    $modalInput.click(function() {
        setDefaultColors();
    });

    // AJAX send callback form
    $modalBtn.click(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/callback/sendcallback",
            data: {
                author: $('.modal input[name="author"]').val(),
                phone: $('.modal input[name="phone"]').val(),
                body: $('.modal textarea[name="body"]').val(),
                _token: $_token
            },
            success: function(response) {
                $('.modal .info-box').html(response.success);
                $('.modal-content').hide();
                $('.modal .info-box').fadeIn(300);
                // setTimeout(function(){
                //     closeClear();
                // }, 10000);
            },
            error: function(response) {
                var err_object = $.parseJSON(response.responseText);
                $.each(err_object, function(index, error) {
                    $('.modal [name="'+index+'"]').css({
                        'background-color': '#ffdfdf',
                        'border-color': '#c70000',
                        'color': '#c70000'
                    });
                });
                setTimeout(function(){
                    setDefaultColors();
                }, 5000);
            }
        });
    });

    function setDefaultColors() {
        $modalAuthor.stop().animate({
            backgroundColor: '#eee',
            borderColor: '#000',
            color: '#000'
        }, 500);
        $modalPhone.stop().animate({
            'backgroundColor': '#eee',
            'borderColor': '#000',
            'color': '#000'
        }, 500);
        $modalBody.stop().animate({
            'backgroundColor': '#eee',
            'borderColor': '#000',
            'color': '#000'
        }, 500);
    }
    
    function clearAll() {
        setDefaultColors();
        $modalAuthor.val('');
        $modalPhone.val('');
        $modalBody.val('');
    }

    function closeClear() {
        $('.modal').hide();
        $('.modal-content').fadeIn(300);
        $('.modal .info-box').hide();
        clearAll();
    }

});