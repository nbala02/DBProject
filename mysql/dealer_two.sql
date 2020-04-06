create database dealer_two;
use dealer_two;

create table sales_person
(	
	sale_no             varchar(5) NOT NULL, #unique id for salperson
    name                varchar(20) NOT NULL, #name of the salperson
    address             varchar(20) NOT NULL, #address of salperson
    phone				varchar(15) NOT NULL, #phone number of salperson
    comm				varchar(11) NOT NULL, # commission for the salperson
    base_salary			varchar(11) NOT NULL, # base salary for the salperson
	ytdsales			varchar(11) NOT NULL, # year to date amount for the salperson
    
    PRIMARY KEY (sale_no)
);

create table customer_d2
(	
	buyer_no	        varchar(4) NOT NULL, #unique id for the customer 
    name                varchar(20) NOT NULL, #name of the customer
    address             varchar(20) NOT NULL, #address of customer
    phone				varchar(15) NOT NULL, #phone number of customer
    
    PRIMARY KEY (buyer_no)
);



create table rebate2
(
	model               varchar(10) NOT NULL, #unique model for car
    rebate_amt			varchar(11) NOT NULL, #how much the rebate2 is
    start_date 			DATE	   NOT NULL, # start date of rebate2
    end_date 			DATE	   NOT NULL, # end date of the rebate2
    
    PRIMARY KEY (model)
);
create table autos
(
	vehicle_no			varchar(6) NOT NULL, #Unique id for car
    model               varchar(10) NOT NULL, #unique model for car
	color				varchar(10) NOT NULL, #color of the car 
    autotrans			varchar(3)	NOT NUll, # yes or no if its autotransmission
    warehouse			varchar(20) NOT NULL, # warehouse city
    financed			varchar(3)	NOT NUll, # yes or no if its financed
    
    PRIMARY KEY  (vehicle_no), 
	FOREIGN KEY   (model) REFERENCES rebate2(model)
);
create table finance
(
	vehicle_no			varchar(6) NOT NULL, #Unique id for car
    buyer_no	        varchar(4) NOT NULL, #unique id for the customer 
    amount				DECIMAL(11) NOT NULL, #how much is the finance 
    months 				INT (20)    NOT NULL, # how many months to finance 
    balance 			varchar(11) NOT NULL, #how much the balance is
    
    FOREIGN KEY(vehicle_no) REFERENCES autos(vehicle_no),
    FOREIGN KEY(buyer_no) REFERENCES customer_d2(buyer_no)
);
create table deal
(
	deal_no	            varchar(7) NOT NULL, #Unique id for transaction
    sale_no             varchar(4) NOT NULL, #unique id for salesperson
    buyer_no		    varchar(4) NOT NULL, #unique id for the customer
    vehicle_no			varchar(6) NOT NULL, #Unique id for car
	amount				varchar(11) NOT NULL, #how much the transaction is
	fin_amt			    varchar(11) NOT NULL, #the balance left 
    date                DATE 	    NOT NULL, #Date of transaction
    rebate_amt			varchar(11) NOT NULL, #the the rebate amount
    
    PRIMARY KEY(deal_no),
    FOREIGN KEY(sale_no) REFERENCES sales_person(sale_no),
    FOREIGN KEY(buyer_no) REFERENCES customer_d2(buyer_no),
    FOREIGN KEY(vehicle_no) REFERENCES autos (vehicle_no)
);