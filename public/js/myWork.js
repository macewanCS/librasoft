/**
 * Created by lolzoloz9 on 2016-04-08.
 */
$(function() {

    var defaults = {
        disabled: true,
        mode: 'popup',
        showbuttons: true,
        onblur: 'true',
        inputclass: 'input-xxlarge',
    };

    $.extend($.fn.editable.defaults, defaults);

    $('#edit').click(function () {
        $('#table-edit .editable').editable('toggleDisabled');
    });

    $(function(value) {
        if ($.trim(value) == '')
            return 'Value is required.';
    });
    
    $('#action-lead a').editable({
        inputclass: 'input-large',
        type: 'select2',
        select2: {
            tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
            tokenSeparators: [",", " "]
        },
        url: '{{URL::to("/")}}/plan/action/lead',
        title: 'Input Leads',
        send: 'always',
        ajaxOptions: {
            datatype: 'json'
        }
    });


    $('#task-lead a').editable({
        inputclass: 'input-large',
        type: 'select2',
        select2: {
            tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
            tokenSeparators: [",", " "]
        },
        url: '{{URL::to("/")}}/plan/task/lead',
        title: 'Input Leads',
        send: 'always',
        ajaxOptions: {
            datatype: 'json'
        }
    });

    $('#action-collab a').editable({
        inputclass: 'input-large',
        type: 'select2',
        select2: {
            tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
            tokenSeparators: [","," "]
        },
        url: '{{URL::to("/")}}/plan/action/lead',
        title: 'Input Leads',
        send: 'always',
        ajaxOptions: {
            datatype: 'json'
        }
    });


    $('#task-collab a').editable({
        inputclass: 'input-large',
        type: 'select2',
        select2: {
            tags: ['Vicky Varga', 'Admin', 'J McPhee', 'E Jones', 'Jody Crilly', 'Deputy CEO', 'Sharon Karr',
                'Digital Public Spaces Librarian', 'Peter Schoenberg', 'J Woods', 'S Foremski', 'B Crittenden',
                'E Stuebing', 'Michael Doe', 'Luc Doe', 'John Doe', 'Andrew Nisbet', 'Chris Doe', 'Alex Carruthers',
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe'],
            tokenSeparators: [","," "]
        },
        url: '{{URL::to("/")}}/plan/task/lead',
        title: 'Input Leads',
        send: 'always',
        ajaxOptions: {
            datatype: 'json'
        }
    });
}