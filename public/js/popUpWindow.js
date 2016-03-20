/**
 * Created by carmichael on 2016-03-18.
 */

function popupDates(){
    $( "#date" ).dialog({
        maxHeight: 600,
        minHeight: 600,
        maxWidth: 800,
        minWidth: 800,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}

function popupComments(){
    var temp = 3
    $( "#comments" ).dialog({
        maxHeight: 600,
        minHeight: 600,
        maxWidth: 800,
        minWidth: 800,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}

function popupUpdated(){
    var temp = 3
    $( "#updated" ).dialog({
        maxHeight: 600,
        minHeight: 600,
        maxWidth: 800,
        minWidth: 800,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}

function popupFinished(){
    var temp = 3
    $( "#finished" ).dialog({
        maxHeight: 600,
        minHeight: 600,
        maxWidth: 800,
        minWidth: 800,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}