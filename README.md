# Overview

This simple Employee Directory allows users to add, view, update, and delete employees from their database.

By creating this PHP-based web application, I wanted to practice PHP's ability to connect to a database and perform CRUD operations on its data.

[Software Demo Video](https://youtu.be/j3rTWWrNS-E)

# Relational Database

For this project, I used a MySQL database as part of a WAMP stack. The database is named "employee_dir".

The database only requires one table for now: the "employees" table. This table has six columns:

- emp_ID (PRIMARY KEY, INT, AUTO-INCREMENTING, NOT NULL)
- first_name (VARCHAR, NOT NULL)
- last_name (VARCHAR, NOT NULL)
- birth_date (DATE, NOT NULL)
- gender (ENUM('M', 'F'), NOT NULL)
- hire_date (DATE, NOT NULL)



# Development Environment

This projects operates in a WAMP stack: Windows, Apache, MySQL, and PHP. Windows and Apache make up the backend, MySQL holds the database, and PHP creates the models, controllers, and client-side views. 

The project is mostly written in PHP. The "models/connect.php" file creates a reusable connection to the database, and the "models/emp-model.php" file uses that connection to perform CRUD operations. This means it also contains SQL code (SELECT, INSERT, UPDATE, and DELETE statements) to achieve that purpose.

# Useful Websites

{Make a list of websites that you found helpful in this project}

- [Official PHP Docs](https://www.php.net/docs.php)
- [Official MySQL Docs](https://dev.mysql.com/doc/)

# Future Work

- Security: The inputs are not properly sanitized, meaning users could input SQL statements and do whatever they please with the database.
- Add Departments table: Create a new menu for adding, viewing, updating, and deleting company departments, with the option to add employees to various departments
- Option to sort Employees: using different ORDER BY statements, allow users to sort the employee list by name, birth date, etc. 