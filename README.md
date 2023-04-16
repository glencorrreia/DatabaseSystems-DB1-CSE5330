# About the Project

This project is a part of CSE 5330 Database Systems Art Gallery Database project by Parshva Shah(ID: 1001838879) and Glen Correia(ID: 1001980331). This part of project is about creating a web interface for a database and performing certain operations. 

# Project Implementation

The project is implemented in PHP language. The web interface of the project is created using HTML and styling is done using Bootstrap.

The web app can perform various kind of operations like:

-  Inserting a new record
- Update and edit an existing record
- Delete an existing record
- Display a record by searching for attributes by Artist Name, City and Commission 


## Project Files Description

- config.php - This file makes a connection to the server and the database
- index.php - The front page of the web interface. It can direct to other pages to perform all the operations and, displays the Artist table fetching the data from database
- display.artist.php - To search for Artist's details by name, city, and commission rate
- insert.php - Contains a form to insert a record to the table
- delete.php - Delete a record
- update.php  - Contains a form to update and edit values of a record

## Notes

- Styling of the web interface is done using [Bootstrap](https://getbootstrap.com/docs/5.1/getting-started/introduction/)
- PHP Version: 8.0.10
- MySQLi Object Oriented Approach is used through out the project