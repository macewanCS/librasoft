/**
 * Created by carmichael on 2016-04-05.
 */
function fillObjectives(){
    var startdate = $('#planYear option:selected').text();
    var selectedText = $('#goalBody option:selected').text();

    var select = document.getElementById("objective");
    removeOptions(document.getElementById("objective"));
    $.ajax({
        type: "POST",
        url: '/get/objective',          //the script to call to get data
        data: {"plan": startdate, "goal":selectedText},           //you can insert url argumnets here to pass to api.php
                                        //for example "id=5&parent=6"
        dataType: 'JSON',               //data format
        success: function(objectives)         //on recieve of reply
        {

            for(var i = 0; i < objectives.length; i++) {
                var el = document.createElement("option");
                el.innerHTML = objectives[i];
                select.appendChild(el);
            }
        }
    });


    /*var hi = [1,2,3,4,5,6];
    var select = document.getElementById("objective");
    for(var i = 0; i < hi.length; i++) {
        var el = document.createElement("option");
        el.innerHTML = hi[i];
        el.value = i;
        select.appendChild(el);
    }*/
}


function removeOptions(selectbox)
{
    var i;
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        selectbox.remove(i);
    }
}