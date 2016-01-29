#Summary of Requirements

##Solution goals
1. Enable users to create and update goals in a standardized way.
2. Allow users to see the following elements for each task when applicable:
  1. Action
  2. Budget
  3. Due date
  4. Lead
  5. Collaborator(s)
  6. Owning department/team
  7. Dated status updates
  8. Success measure(s)
  9. Notes
3. Differentiation of access levels, with different actions available for each user type.
4. Allow users to sort by:
  1. Lead
  2. Collaborator(s)
  3. Due date
  4. Goal type
  5. Other relevant data groupings
5. Structure the display of data following:
  1. Business plan objectives
  2. Actions beneath an objective
  3. Team/department goals beneath a business plan objective
  4. Team/department goals not associated with the business plan
6. Allow users to see a changelog of updates for each goal or objective.
7. Use a dashboard to collect information such as on time, completed, and overdue actions.
8. Support a notification system to update users of coming-due tasks.

##Access Levels

###Read-Only
1. Able to view all business plan objectives, actions, team, and department tasks.
2. Able to view all progress updates and notes on tasks.

###Basic User
*All the rights of a read-only user, plus:*

1. Able to update the status of tasks assigned to themselves.
2. Able to modify notification settings for their tasks as well as department and library-wide goal progress.
3. Able to track my personal progress.
4. Able to comment on personal tasks when updating progress.

###Team/Department Lead
*All the rights of a basic user, plus:*

1. Able to create, modify, and delete tasks internal to my team/department.
2. Able to assign tasks to individual team/department members.
3. Able to track the progress of my team/deparement members.
4. Able to create additional goals internal to my team/department.
5. Able to modify team/department goals with a reason for goals running past the deadline.
6. Able to comment on team/department tasks and goals.

###Business Plan Lead
*All the rights of a team/department lead, plus:*

1. Able to create, modify, and delete business plan objectives and actions.
2. Able to create, modify, and delete team/department goals related to the business plan.
3. Able to create and modify team/department goals not related to the business plan. **ASK VICKY**
4. Able to assign business plan objectives and actions to teams and departments.
5. Able to collect data in an organized manner to create quarterly reports for the board.
6. Able to modify business plan objectives and actions with a reason for running past the deadline.
7. Able to comment on business plan objectives and actions.

###Administrator
*All the rights of a basic user, plus:*

1. Able to create, modify, and delete user accounts.
2. Able to modify role-based permissions.

##Departments
1. Are unique in function.
2. Have members associated.
3. Have a budget.

##Teams
1. Are cross department.
2. Have a sponsor.

##Users
1. May belong to multiple teams and departments.
2. May have multiple team/department tasks assigned.
3. All users can view library-wide goals and progress at any time.
4. Able to see a change history for every task and objective.
5. Should be notified when relevant changes are made.
6. Able to see a deadline for goals and objectives.

##Goals, Tasks, Objectives, and Actions
1. Trackable by all users.
2. Have teams, departments, and/or names associated.
3. Have a deadline.
4. Have a status, which can be updated by collaborators.
5. Should auto-notify collaborators when relevant changes are made.
6. Has a measure of success.
7. Can be commented upon, and have notes added.
8. Can have a budget associated.
