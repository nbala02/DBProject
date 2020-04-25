create database dealer_one;
use dealer_one;

create table representative 
(	
	rep_no              varchar(10) NOT NULL, #unique id for representative 
    name                varchar(20) NOT NULL, #name of the representative
    address             varchar(50) NOT NULL, #address of representative
    phone				varchar(15) NOT NULL, #phone number of representative
    base_salary			decimal(15) NOT NULL, # base salary for the representative
    ytd_sales			decimal(15) NOT NULL, # year to date amount for the representative
    comm				decimal(15) NOT NULL, # commission for the representative
    
    
    PRIMARY KEY (rep_no)
);

select * from representative;

create table customer_d1
(	
	customer_no         varchar(10) NOT NULL, #unique id for the customer 
    name                varchar(20) NOT NULL, #name of the customer
    address             varchar(20) NOT NULL, #address of customer
    phone				varchar(15) NOT NULL, #phone number of customer
    
    PRIMARY KEY (customer_no)
);



create table rebate1
(
	rebate_no			varchar(10) NOT NULL, #unique id for the rebate no 
    model               varchar(10) NOT NULL, #model for car
    rebate_amt			decimal(15) NOT NULL, #how much the rebate1 is
    start_date 			DATE	   NOT NULL, # start date of rebate1
    end_date 			DATE	   NOT NULL, # end date of the rebate1
    
    PRIMARY KEY(rebate_no)
);

create table cars
(
	serial_no			varchar(10) NOT NULL, #Unique id for car
    model               varchar(10) NOT NULL, #unique model for car
	color				varchar(10) NOT NULL, #color of the car 
    autotrans			varchar(10)	NOT NUll, # yes or no if its autotransmission
    warehouse			varchar(20) NOT NULL, # warehouse city
	
    PRIMARY KEY  (serial_no)

);

create table purchased_cars
(
	serial_no			varchar(10) NOT NULL, #Unique id for car
    model               varchar(10) NOT NULL, #unique model for car
	color				varchar(10) NOT NULL, #color of the car
    autotrans			varchar(10)	NOT NUll, # yes or no if its autotransmission
    warehouse			varchar(20) NOT NULL, # warehouse city
    amount				decimal(15) NOT NULL, # warehouse city

    PRIMARY KEY  (serial_no)

);

create table loan
(
	serial_no			varchar(10) NOT NULL, #Unique id for car
    customer_no         varchar(10) NOT NULL, #unique id for the customer 
    amount				decimal(15) NOT NULL, #how much the loan is
    start_date 			DATE	   NOT NULL, # start date of loan
    end_date 			DATE	   NOT NULL, # end date of the loan
    months				int(20)	   NOT NULL, # how many months the loan is 
    balance 			decimal(15) NOT NULL, #how much the balance is 
    
    FOREIGN KEY(serial_no) REFERENCES purchased_cars(serial_no),
    FOREIGN KEY(customer_no) REFERENCES customer_d1(customer_no)
);

create table transaction
(
	deal_no	            varchar(10) NOT NULL, #Unique id for transaction
    rebate_no			varchar(10) NULL, #unique id for the rebate no 
    rep_no              varchar(10) NOT NULL, #unique id for representative 
    customer_no		    varchar(10) NOT NULL, #unique id for the customer
    serial_no			varchar(10) NOT NULL, #Unique id for car
	amount				decimal(15) NOT NULL, #how much the transaction is
	fin_amt			    decimal(15) NOT NULL, #the balance left 
    date                DATE 	    NOT NULL, #Date of transaction
    
    PRIMARY KEY(deal_no),
    FOREIGN KEY(rep_no) REFERENCES representative(rep_no),
    FOREIGN KEY(customer_no) REFERENCES customer_d1(customer_no),
    FOREIGN KEY(serial_no) REFERENCES purchased_cars(serial_no)
);
