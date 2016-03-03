/**
 * Created by Carmichael on 2016-03-03.
 */

$('.collapse').on('shown.bs.collapse', function(){
    $(this).parent().find(".glyphicon-chevron-right").removeClass("glyphicon glyphicon-chevron-right").addClass("glyphicon glyphicon-chevron-down");
}).on('hidden.bs.collapse', function(){
    $(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-right");
});
