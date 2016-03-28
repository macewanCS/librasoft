/**
 * Created by carmichael on 2016-03-27.
 */
var counter = 1;
var limit = 5;
function addInput(divName){
    if (counter == limit)  {
        alert("You have reached the limit of adding " + counter + " inputs");
    }
    else {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "Goal " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
}

function removeInput(divName){
    var newdiv = document.createElement('div');
    document.getElementById(divName).removeChild(newdiv);
}


$(document).ready(function() {

    var inputs = 1;

    $('#btnAdd').click(function() {
        $('.btnDel:disabled').removeAttr('disabled');
        var c = $('.clonedInput:first').clone(true);
        c.children(':text').attr('name','input'+ (++inputs) ).val('');
        c.children(':button').attr('name','btnDelete'+ (inputs) );
        $('.clonedInput:last').after(c);
    });

    $('.btnDel').click(function() {
        if (confirm('continue delete?')) {
            --inputs;
            $(this).closest('.clonedInput').remove();
            $('.btnDel').attr('disabled',($('.clonedInput').length  < 2));
            fixNames();
        }
    });

    function fixNames(){
        var i = inputs;
        while(i--) {
            $('input:text')[i].name = 'input'+ (i+1);
            $('input:button')[i].name = 'btnDelete'+ (i+1);
        }
    }

});