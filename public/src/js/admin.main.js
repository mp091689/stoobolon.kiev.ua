$(function () {
    var $deleteBtns = $('a').filter('[href*="admin"]').filter('[href*="delete"]');
    $deleteBtns.click(function () {
        alert('Действительно хотите удалить?');
    });

    var $editBtn = $('tr').filter('.show-row').find('.btn-warning');
    $editBtn.click(function () {
        $id = $(this).parent().parent().attr('data-id');
        $('tr[data-id="'+$id+'"]').toggle();
        $('tr').filter('.show-row').find('.btn').addClass('disabled');
        $('tr').filter('.show-row').css('background','#e2e2e2');
    })
});