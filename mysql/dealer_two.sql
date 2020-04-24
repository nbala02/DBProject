create database dealer_two;
use dealer_two;

create table sales_person
(	
	sale_no             varchar(10) NOT NULL, #unique id for salesperson
    name                varchar(20) NOT NULL, #name of the salesperson
    address             varchar(20) NOT NULL, #address of salesperson
    phone				varchar(15) NOT NULL, #phone number of salesperson
    comm				decimal(15) NOT NULL, # commission for the salesperson
    base_salary			decimal(15) NOT NULL, # base salary for the salesperson
    ytdsales			decimal(15) NOT NULL, # year to date amount for the salesperson
   
    
    
    PRIMARY KEY (sale_no)
);

create table customer_d2
(	
	buyer_no            varchar(10) NOT NULL, #unique id for the customer 
    name                varchar(20) NOT NULL, #name of the customer
    address             varchar(20) NOT NULL, #address of customer
    phone				varchar(15) NOT NULL, #phone number of customer
    
    PRIMARY KEY (buyer_no)
);

create table rebate2
(
	rebate_no			varchar(10) NOT NULL, #unique id for the rebate no 
    model               varchar(10) NOT NULL, #model for car
    rebate_amt			decimal(15) NOT NULL, #how much the rebate1 is
    start_date 			DATE	   NOT NULL, # start date of rebate1
    end_date 			DATE	   NOT NULL, # end date of the rebate1
    
    PRIMARY KEY(rebate_no)
);

create table autos
(
	vehicle_no			varchar(10) NOT NULL, #Unique id for car
    model               varchar(10) NOT NULL, #unique model for car
	color				varchar(10) NOT NULL, #color of the car 
    autotrans			varchar(10)	NOT NUll, # yes or no if its autotransmission
    warehouse			varchar(20) NOT NULL, # warehouse city
	
    PRIMARY KEY  (vehicle_no)

);

create table finance
(
	vehicle_no			varchar(10) NOT NULL, #Unique id for car
    buyer_no         varchar(10) NOT NULL, #unique id for the customer 
    amount				decimal(15) NOT NULL, #how much the loan is
    start_date 			DATE	   NOT NULL, # start date of loan
    end_date 			DATE	   NOT NULL, # end date of the loan
    months				int(20)	   NOT NULL, # how many months the loan is 
    balance 			decimal(15) NOT NULL, #how much the balance is 
    
	PRIMARY KEY(vehicle_no),
    FOREIGN KEY(buyer_no) REFERENCES customer_d2(buyer_no)
);

create table deal
(
	deal_no	            varchar(10) NOT NULL, #Unique id for transaction
    rebate_no			 varchar(10) NOT NULL, #unique id for the rebate no 
    sale_no              varchar(10) NOT NULL, #unique id for representative 
    buyer_no		    varchar(10) NOT NULL, #unique id for the customer
    vehicle_no			varchar(10) NOT NULL, #Unique id for car
	amount				decimal(15) NOT NULL, #how much the transaction is
	fin_amt			    decimal(15) NOT NULL, #the balance left 
    date                DATE 	    NOT NULL, #Date of transaction
    
    PRIMARY KEY(deal_no),
    FOREIGN KEY(rebate_no) REFERENCES rebate2(rebate_no),
    FOREIGN KEY(sale_no) REFERENCES sales_person(sale_no),
    FOREIGN KEY(buyer_no) REFERENCES customer_d2(buyer_no),
    FOREIGN KEY(vehicle_no) REFERENCES finance(vehicle_no)
);