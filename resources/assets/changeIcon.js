/**
 * Created by Carmichael on 2016-03-03.
 */


$(document).ready(function(){
    $('.collapse').on('shown.bs.collapse', function (){
        $(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
    }).on('hidden.bs.collapse', function(){
        $(this).parent().find(".glyphicon-chevron-right").removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
    });

})


function toggleChevron(el) {
    if ($(el).find('i').hasClass('glyphicon-chevron-down'))
        $(el).find('.icon-chevron-left').removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
    else
        $(el).find('.icon-chevron-down').removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
}