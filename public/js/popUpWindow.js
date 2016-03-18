/**
 * Created by carmichael on 2016-03-18.
 */

function popup(){
    $( "#dialog" ).dialog({
        maxHeight: 600,
        minHeight: 600,
        maxWidth: 800,
        minWidth: 800,
        draggable: false,
        resizable: false
    });
}

function close(){
    $("#h").live("click", function () {
        alert('hi');
        $("#dialog").dialog('close');
    });
}