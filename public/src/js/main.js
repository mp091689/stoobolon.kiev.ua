$(function () {

    // Add mask for every input field with name=phone
    $('input[name="phone"]').mask('+38 (999) 999-9999');

    /**
     *
     * Modal callback form
     * Begin
     *
     */
    var $modalInput = $('.modal').find('.modal-input');
    var $modalAuthor = $('.modal').find('input[name="author"]');
    var $modalPhone = $('.modal').find('input[name="phone"]');
    var $modalBody = $('.modal').find('textarea[name="body"]');
    var $modalBtn = $('.modal').find('button');
    var $modalLoading = $('.modal').find('.loading-svg');
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
    // If there is success or fail message
    // modal will be closed with any click
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
        $modalBtn.css('display', 'none');
        $modalLoading.css('display', 'block');
        $.ajax({
            type: "POST",
            url: "/callback/send",
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
                $modalBtn.css('display', 'block');
                $modalLoading.css('display', 'none');
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
                $modalBtn.css('display', 'block');
                $modalLoading.css('display', 'none');
            }
        });
    });

    // reset all input colors to default
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

    function closeClear() {
        $('.modal').hide();
        $('.modal-content').fadeIn(300);
        $('.modal .info-box').hide();
        $modalAuthor.val('');
        $modalPhone.val('');
        $modalBody.val('');
        $modalBtn.css('display', 'block');
        $modalLoading.css('display', 'none');
        setDefaultColors();
    }

    $('.review-form form button.btn').click(function () {
        $('.review-form form button.btn').css('display','none');
        $('.review-form form img.loading-svg').css('display', 'inline-block');
        $('.review-form form input').attr('readonly','readonly');
        $('.review-form form textarea').attr('readonly','readonly');

    });
});