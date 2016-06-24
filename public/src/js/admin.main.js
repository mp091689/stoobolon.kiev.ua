$(function () {
    var $deleteBtns = $('a').filter('[href*="admin"]').filter('[href*="delete"]');
    $deleteBtns.click(function () {
        alert('Действительно хотите удалить?');
    });
});