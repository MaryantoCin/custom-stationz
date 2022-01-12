let qty = 1;
$("#addColor").on('click', function () {
    parentCol = $('.color-row').parent()
    elem = $('.color-row').last().clone(true)
    $(elem).appendTo(parentCol);
    $(elem).find(".specialTrash").removeAttr('disabled');
    obj = $(elem).children()
    
    jQuery.each( obj, function( i, val ) {
        $("#input"+i).attr("id","input"+((qty*3)+i));
    });
    qty+=1;
});

$(".specialTrash").on('click', function () {
    $(this).closest(".color-row").remove();
    qty-=1;


});