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

function showDetails(){
    $( "#user" ).dialog({
        maxHeight: 300,
        minHeight: 300,
        maxWidth: 700,
        minWidth: 700,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}

function newGoal() {
    $("#newGoal").dialog({
        maxHeight: 290,
        minHeight: 290,
        maxWidth: 700,
        minWidth: 700,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}

function newObjective(){
    $( "#newObjective" ).dialog({
        maxHeight: 370,
        minHeight: 370,
        maxWidth: 700,
        minWidth: 700,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}

function newAction(){
    $( "#newAction" ).dialog({
        maxHeight: 450,
        minHeight: 450,
        maxWidth: 700,
        minWidth: 700,
        draggable: false,
        resizable: false,
        dialogClass: 'no-close success-dialog',
        modal: true
    });
}