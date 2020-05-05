use globalviews;

create table model
(
	model          varchar(10) NOT NULL, #unique model for car
    price          varchar(11) NOT NULL, #price for car 
    type           varchar(10) Not Null, # brand of car
    gas_mileage    int(2) Not Null, #number of gas miles
    seat           int(1) Not Null, # number of seats in car
    engine 		   DECIMAL(2,1) NOT Null, #engine number 
 
   PRIMARY KEY (model)
);

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

SET GLOBAL event_scheduler = ON; -- enable event scheduler.
SELECT @@event_scheduler;  -- check whether event scheduler is ON/OFF
CREATE EVENT rebate1Expired  -- create your event
    ON SCHEDULE
      EVERY 24 HOUR  -- run every 24 hours
    DO
      UPDATE dealer_one.rebate1 set expired='1' WHERE end_date = current_date();

CREATE EVENT rebate2Expired  -- create your event
    ON SCHEDULE
      EVERY 24 HOUR  -- run every 24 hours
    DO
      UPDATE dealer_two.rebate2 set expired='1' WHERE end_date = current_date();
