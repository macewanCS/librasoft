/**
 * Created by lolzoloz9 on 2016-03-27.
 */

$(function() {
    for (i = 2016; i < 2100; i++)
    {
        $('#startpicker').append($('<option />').val(i).html(i));
        $('#endpicker').append($('<option />').val(i).html(i));
    }
});


$(document).ready(function(){
    //Step 1
    //Next button: Plan->Goals
    $('#toGoals').click(function(){
        $('#step1').fadeOut(function(){
            $('#step2, #backToPlan, #submitAll').fadeIn();
        });
    });

    //Step 2
    //Next Button: Goal 1 -> Objectives
    $('#toObjs1').click(function(){
        $('#step2').fadeOut(function() {
            $('#step3a, #backToGoals1').fadeIn();
        })
    });

    //Next Button: Goal 2 -> Objectives
    $('#toObjs2').click(function(){
        $('#step2').fadeOut(function() {
            $('#step3b, #backToGoals2').fadeIn();
        })
    });

    //Back Button: Goals -> Plan
    $('#backToPlan').click(function(){
        $('#step2').fadeOut(function() {
            $('#step1, #toGoals').fadeIn();
        });
    });

    //Step 3
    //Next Button: Obj 1 -> Actions
    $('#toActions1').click(function(){
        $('#step3a').fadeOut(function() {
            $('#step4a, #backToObjs1').fadeIn();
        });
    });

    //Next Button: Obj 2 -> Actions
    $('#toActions2').click(function(){
        $('#step3a').fadeOut(function() {
            $('#step4b, #backToObjs2').fadeIn();
        });
    });

    //Next Button: Obj 3 --> Actions
    $('#toActions3').click(function(){
        $('#step3b').fadeOut(function() {
            $('#step4c, #backToObjs3').fadeIn();
        });
    });

    //Next Button: Obj 4 --> Actions
    $('#toActions4').click(function(){
        $('#step3b').fadeOut(function() {
            $('#step4d, #backToObjs4').fadeIn();
        });
    });

    //Back Button: Objectives -> Goals
    $('#backToGoals1').click(function(){
        $('#step3a').fadeOut(function() {
            $('#step2, #backToPlan').fadeIn();
        })
    });

    //Back Button: Objectives -> Goals
    $('#backToGoals2').click(function(){
        $('#step3b').fadeOut(function() {
            $('#step2, #backToPlan').fadeIn();
        })
    });

    //Step 4
    //Next Button: Action 1 -> Tasks
    $('#toTasks1').click(function(){
        $('#step4a').fadeOut(function() {
            $('#step5a, #backToActions1').fadeIn();
        });
    });

    //Next Button: Action 2 -> tasks
    $('#toTasks2').click(function(){
        $('#step4a').fadeOut(function() {
            $('#step5b, #backToActions2').fadeIn();
        });
    });

    //Next Button: Action 3 -> tasks
    $('#toTasks3').click(function(){
        $('#step4b').fadeOut(function() {
            $('#step5c, #backToActions3').fadeIn();
        });
    });

    //Next Button: Action 4 -> tasks
    $('#toTasks4').click(function(){
        $('#step4b').fadeOut(function() {
            $('#step5d, #backToActions4').fadeIn();
        });
    });

    //Next Button: Action 5 -> tasks
    $('#toTasks5').click(function(){
        $('#step4c').fadeOut(function() {
            $('#step5e, #backToActions5').fadeIn();
        });
    });

    //Next Button: Action 5 -> tasks
    $('#toTasks6').click(function(){
        $('#step4c').fadeOut(function() {
            $('#step5f, #backToActions6').fadeIn();
        });
    });

    //Next Button: Action 6 -> tasks
    $('#toTasks7').click(function(){
        $('#step4d').fadeOut(function() {
            $('#step5g, #backToActions7').fadeIn();
        });
    });

    //Next Button: Action 4 -> tasks
    $('#toTasks8').click(function(){
        $('#step4d').fadeOut(function() {
            $('#step5h, #backToActions8').fadeIn();
        });
    });

    //Back Button: Actions -> Objectives
    $('#backToObjs1').click(function(){
        $('#step4a').fadeOut(function() {
            $('#step3a, #backToGoals1').fadeIn();
        })
    });

    //Back Button: Actions -> Objectives
    $('#backToObjs2').click(function(){
        $('#step4b').fadeOut(function() {
            $('#step3a, #backToGoals1').fadeIn();
        })
    });

    //Back Button: Actions -> Objectives
    $('#backToObjs3').click(function(){
        $('#step4c').fadeOut(function() {
            $('#step3b, #backToGoals2').fadeIn();
        })
    });

    //Back Button: Actions -> Objectives
    $('#backToObjs4').click(function(){
        $('#step4d').fadeOut(function() {
            $('#step3b, #backToGoals2').fadeIn();
        })
    });

    //Step 5
    //Back Button: Tasks -> Actions
    $('#backToActions1').click(function(){
        $('#step5a').fadeOut(function() {
            $('#step4a, #backToObjs1').fadeIn();
        })
    });
    
    //Back Button: Tasks -> Actions
    $('#backToActions2').click(function(){
        $('#step5b').fadeOut(function() {
            $('#step4a, #backToObjs1').fadeIn();
        })
    });
    
    //Back Button: Tasks -> Actions
    $('#backToActions3').click(function(){
        $('#step5c').fadeOut(function() {
            $('#step4b, #backToObjs2').fadeIn();
        })
    });
    
    //Back Button: Tasks -> Actions
    $('#backToActions4').click(function(){
        $('#step5d').fadeOut(function() {
            $('#step4b, #backToObjs2').fadeIn();
        })
    });

    //Back Button: Tasks -> Actions
    $('#backToActions5').click(function(){
        $('#step5e').fadeOut(function() {
            $('#step4c, #backToObjs3').fadeIn();
        })
    });

    //Back Button: Tasks -> Actions
    $('#backToActions6').click(function(){
        $('#step5f').fadeOut(function() {
            $('#step4c, #backToObjs3').fadeIn();
        })
    });

    //Back Button: Tasks -> Actions
    $('#backToActions7').click(function(){
        $('#step5g').fadeOut(function() {
            $('#step4d, #backToObjs4').fadeIn();
        })
    });

    //Back Button: Tasks -> Actions
    $('#backToActions8').click(function(){
        $('#step5h').fadeOut(function() {
            $('#step4d, #backToObjs4').fadeIn();
        })
    });
});
