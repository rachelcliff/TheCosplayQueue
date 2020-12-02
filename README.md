# TheCosplayQueue

# INSTALLATION INSTRUCTIONS:

Create a new blank database and name it "cosplay_queue". Import the sql file contained in the API folder (alternatively there is a deployment script currently being created)

Install the client and api folders into a web server such as Xampp or Wamp. The folders need to be installed into the htdocs folder if your using Xampp, or the www folder if you're using Wamp.

Update the database connection settings found within the db.php file with the username and password needed to access the database.

Installation is now complete, and the app should now be functional.

The admin username for the production app is test5 and the password is 1234.
Regular username for the production app is rctest_1 and the password is 1234.

# Notes about Proj 3
Admin users in the system are created using the regular submission form on the and then their permissions changed in the database itself. This means that all admin passwords are hashed using the PHP password_hash function (one way encryption) automatically. 

## Technologies utilised in this build:
Materalize - Version 1.0.0, implemented using CDN, used to create the display and functionality on the home page of the app.
React - Version 17.0.1, implemented via local installation and node cmd, used to create the display and functionality on the app admin panel. 
PHP - hardcode relating to Version 7.4.12, implemented in the API base case, sessions and functions file to create the database connection and functionality for the app. 
HTML, CSS, and JS - regular use of these coding languages used throughout all pages of the app to create display, look, style and functionality. 

# Notes about UX1
The queue is part of the admin user panel and as such it isn't displayed on the apps frontend and the general user, which is who I interpreted the target audience of this assessment to be. I will have a semi-functional user panel finished for Proj2 and UX3 so this part will be demonstrated then. 

Folders have been completely restructured to accommodate a more streamlined app processs. 

# Notes about UX2
The UX2 assessment and Proj2 assessment has been completed and is functional.

## Functions:
- changelog -> Complete
- user sign up-> Complete
- update user data-> Complete
- logout-> Complete
- checkLogin-> Complete
- database-connect-> Complete
- rate limiting -> Complete
- show data inputted into queue - Complete
- show current place in queue - Complete
- refresh queue - Complete
- autofill queue update form - Complete
- join queue - Complete
- Login - Complete
- Register - Complete
- Update user details - Complete
- Create user - Complete
- Remove self from queue - Complete
- Logout - Complete

## Front-end pages:
- index (contains all of bases for the app)

## Back-end/admin pages:
- admin page (contains a functional display of the queue using JSON)
- Photo taken function - complete and functioning
- Remove from queue function - complete and functioning
- Show full queue function - complete and functioning

## Database:
- created and tables built out and filled with dummy data and images.

## Images:
- Redesigned and updated on 6/10/2020.

# Planning:
## $_GET
- 1- Echo data inputted to form -> Complete
- 2- Echo current place in queue (count sql query where photo taken = no) -> Complete
- 3- Refresh queue -> Complete
- 4- Fill the update form with data using $_SESSIONS -> Complete

## $_POST
- 1- join queue -> Complete
- 2- login -> Complete
- 3- sign up -> Complete
- 4- update user details in local storage and database -> Complete

## CRUD 1- Create
- Create new user -> Complete

## CRUD 2 - Update
- Remove self from queue -> Complete


# Getting Started with Create React App

## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in the browser.

The page will reload if you make edits.\
You will also see any lint errors in the console.

### `npm test`

Launches the test runner in the interactive watch mode.\
See the section about [running tests](https://facebook.github.io/create-react-app/docs/running-tests) for more information.

### `npm run build`

Builds the app for production to the `build` folder.\
It correctly bundles React in production mode and optimizes the build for the best performance.

The build is minified and the filenames include the hashes.\
Your app is ready to be deployed!

See the section about [deployment](https://facebook.github.io/create-react-app/docs/deployment) for more information.

### `npm run eject`

**Note: this is a one-way operation. Once you `eject`, you can’t go back!**
