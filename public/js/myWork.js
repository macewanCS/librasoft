/**
 * Created by lolzoloz9 on 2016-04-08.
 */
$(document).ready(function()
    {
        $(".mywork-table").tablesorter();
    }
);

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
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe', 'School Aged Services Team',
                'Community-Led Team', 'Foundational Programming Team', 'Membership Services Team', 'Discovery Team',
                'Events Team', 'IT Services', 'Human Resources', 'Financial Services', 'Finance', 'Fund Development',
                'Collection Management and Access'],
            tokenSeparators: [",", " "]
        },
        url: '{{URL::to("/")}}/mywork/action/lead',
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
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe', 'School Aged Services Team',
                'Community-Led Team', 'Foundational Programming Team', 'Membership Services Team', 'Discovery Team',
                'Events Team', 'IT Services', 'Human Resources', 'Financial Services', 'Finance', 'Fund Development',
                'Collection Management and Access'],
            tokenSeparators: [",", " "]
        },
        url: '{{URL::to("/")}}/mywork/task/lead',
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
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe', 'School Aged Services Team',
                'Community-Led Team', 'Foundational Programming Team', 'Membership Services Team', 'Discovery Team',
                'Events Team', 'IT Services', 'Human Resources', 'Financial Services', 'Finance', 'Fund Development',
                'Collection Management and Access'],
            tokenSeparators: [","," "]
        },
        url: '{{URL::to("/")}}/mywork/action/collab',
        title: 'Input Collaborators',
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
                'Khalil Doe', 'Robin Doe', 'Rachael Collins', 'Jamie Doe', 'School Aged Services Team',
                'Community-Led Team', 'Foundational Programming Team', 'Membership Services Team', 'Discovery Team',
                'Events Team', 'IT Services', 'Human Resources', 'Financial Services', 'Finance', 'Fund Development',
                'Collection Management and Access'],
            tokenSeparators: [","," "]
        },
        url: '{{URL::to("/")}}/mywork/task/collab',
        title: 'Input Collaborators',
        send: 'always',
        ajaxOptions: {
            datatype: 'json'
        }
    });
});