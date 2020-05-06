create database testingDB;
use testingDB;

create table employee
(
	emp_no			varchar(6), #Unique id
    fname			varchar(50) NOT NULL, #first name
    lname			varchar(50) NOT NULL, #last name
    email			varchar(100) NOT NULL, #email
    password		varchar(20) NOT NULL, #password
    location		varchar(2) NOT NULL, #which dealer
    
    PRIMARY KEY	(emp_no)
);

create table customeracc
(
	customer_no		varchar(6), #Unique id
	fname			varchar(50) NOT NULL, #first name
    lname			varchar(50) NOT NULL, #last name
    email			varchar(100) NOT NULL, #email
    username		varchar(50) NOT NULL, #username used for login
    password		varchar(20) NOT NULL, #password
    location		varchar(2) NOT NULL, #which dealer
    
    PRIMARY KEY	(customer_no)
);

SELECT * FROM employee;
SELECT * FROM customeracc;
SELECT * FROM contactInfo;