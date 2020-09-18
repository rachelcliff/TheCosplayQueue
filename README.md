# TheCosplayQueue

Notes about UX1
The queue is part of the admin user panel and as such it isn't displayed on the apps frontend and the general user, which is who I interpreted the target audience of this assessment to be. I will have a semi-functional user panel finished for Proj2 and UX3 so this part will be demonstrated then. 

Aside from that all noted errors have been corrected. 

API:
- functions started for pulling data utilising the code from Monday/Tuesday's classes. Will spend more time over the break getting everything up and functioning. 
- Started the function on the join the queue modal to display the relevant position in the queue using JSON. This function has been put on the backburner until it is determined whether I will be using straight JSON or Websockets to implement the feature. 

WIP functions -> still need to be combined into the single functions folder:
changelog -> currently implemented but non-functioning/needs testing
user sign up-> currently implemented but non-functioning/needs testing
update user data-> currently implemented but non-functioning/needs testing
logout-> implemented and functioning
filterInput-> implemented and functioning
checkLogin-> currently implemented but needs testing
database-connect-> implemented and functioning
rate limiting -> implemented but untested

Front-end pages:
- index (contains all of bases for the app)

Back-end/admin pages:
- admin page (contains a functional display of the queue using JSON)

Database:
- created and tables built out and filled with dummy data and images.
 
Planning:
$_GET
1- preview next in line on backend profile
2- echo current place in queue
3- refresh queue
4- Get details from database to auto-fill join queue form

$_POST
1- join queue
2- sign in
3- sign up
4- update user details in local storage and database

CRUD 1- Update
Update user details using form

CRUD 2 - Delete
Remove user from queue
Remove self from queue
