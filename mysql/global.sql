create database GlobalView;
use GlobalView;

create table model
(
	model          varchar(10) NOT NULL, #unique model for car
    price          varchar(11) NOT NULL, #price for car 
    type           varchar(10) Not Null, # brand of car
    gas_mileage    int(2) Not Null, #number of gas miles
    seat           int(1) Not Null, # number of seats in car
    engine 		   DECIMAL(2) NOT Null, #engine number 
 
   PRIMARY KEY (model)
) ;

create table add_on
(
	package_no           varchar(2) NOT NULL, #unique id for the package for the add on
    package_description  varchar(20) NOT NULL, #package description like navigation or security
    price                varchar(11) NOT NULL, # price of the package
    mode_available       varchar(20) NOT NULL, # modes available 
    
    PRIMARY KEY (package_no)

);

create table potential_buyer
(
	buyer_no            varchar(4) NOT NULL, # unique id for buyer 
    name                varchar(20) NOT NULL, #name of the buyer
    address             varchar(20) NOT NULL, #address of buyer
    phone				varchar(15) NOT NULL, #phone number of the buyer
    email               varchar(20) NOT NULL, #email of the buyer
    
    PRIMARY KEY (buyer_no)

);

create table available_auto
(
	serial_no			varchar(6) NOT NULL, #Unique id for car
    model               varchar(10) NOT NULL, #unique model for car  
    color				varchar(10) NOT NULL, #color of the car 
    dealer 				varchar(3) NOT NULL, #dealer 
    
    PRIMARY KEY(serial_no),
    FOREIGN KEY(model) REFERENCES model(model)
);
create table rebate_global
(
	model               varchar(10) NOT NULL, #unique model for car
    amount				varchar(11) NOT NULL, #how much the rebate is
    dealer              varchar(3) NOT NULL, #dealer 
    start_date 			DATE	   NOT NULL, # start date of rebate
    end_date 			Date	   NOT NULL, # end date of the rebate
    
    FOREIGN KEY(model) REFERENCES model(model)
);

create table employee
(	
	emp_no	            varchar(3) NOT NULL, #Unique id for employee
    name                varchar(20) NOT NULL, #name of the employee
    address             varchar(20) NOT NULL, #address of employee
    phone				varchar(15) NOT NULL, #phone number of the employee
    position			varchar(15) NOT NULL, # job title of employee
    
    PRIMARY KEY (emp_no)
);

create table customer_global
(	
	customer_no	        varchar(4) NOT NULL, #unique id for the customer
    name                varchar(20) NOT NULL, #name of the customer
    address             varchar(20) NOT NULL, #address of customer
    phone				varchar(15) NOT NULL, #phone number of customer
    
    PRIMARY KEY (customer_no)
);

create table salesperson
(
	rep_no              varchar(5) NOT NULL, #unique id for salesperson 
    base_salary			varchar(11) NOT NULL, # base salary for the salesperson
    ytd_sales			varchar(11) NOT NULL, # year to date amount for the salesperson
    comm				varchar(11) NOT NULL, # commission for the salesperson
    
    PRIMARY KEY(rep_no)
);

create table sales
(
	transaction_no	    varchar(7) NOT NULL, #Unique id for transaction
    rep_no              varchar(5) NOT NULL, #unique id for salesperson 
    customer_no		    varchar(4) NOT NULL, #unique id for the customer
    veh_no 				varchar(6) NOT NULL, # id for vehicle 
    date                DATE 	   NOT NULL, #Date of transaction
    
    PRIMARY KEY(transaction_no),
    FOREIGN KEY(rep_no) REFERENCES salesperson(rep_no),
    FOREIGN KEY(customer_no) REFERENCES customer_global(customer_no)
);

