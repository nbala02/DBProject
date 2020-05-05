create database globalviews;
use globalviews;


CREATE VIEW available_auto AS 
	SELECT cars.serial_no,cars.model,cars.color FROM dealer_one.cars
   UNION ALL 
	SELECT autos.vehicle_no,autos.model,autos.color FROM dealer_two.autos;
    
CREATE VIEW salesperson(
	rep_no,
    name,
    address,
    phone,
    base_salary,
    ytd_sales,
    comm
)
 AS 
	SELECT representative.rep_no,representative.name,representative.address,representative.phone, representative.base_salary, representative.ytd_sales, representative.comm from dealer_one.representative
    UNION ALL
    SELECT sales_person.sale_no,sales_person.name,sales_person.address,sales_person.phone,sales_person.comm, sales_person.base_salary, sales_person.ytdsales from dealer_two.sales_person;
 
CREATE VIEW customer_global AS
	SELECT customer_d1.customer_no, customer_d1.name,customer_d1.address,customer_d1.phone from dealer_one.customer_d1
    UNION ALL
    SELECT customer_d2.buyer_no,customer_d2.name,customer_d2.address,customer_d2.phone from dealer_two.customer_d2;
    
CREATE  VIEW sales(
	transaction_no,
    rebate_no,
    rep_no,
    customer_no,
    serial_no,
    amount,
    date
)
 AS
	SELECT transaction.deal_no,transaction.rebate_no,transaction.rep_no, transaction.customer_no, transaction.serial_no,transaction.amount,transaction.date from dealer_one.transaction
    UNION ALL
    SELECT deal.deal_no,deal.rebate_no, deal.sale_no,deal.buyer_no,deal.vehicle_no,deal.amount,deal.date from dealer_two.deal;


CREATE VIEW rebate_Global AS
	SELECT rebate1.rebate_no, rebate1.model,rebate1.rebate_amt,rebate1.start_date,rebate1.end_date, rebate1.expired from dealer_one.rebate1
    UNION ALL
    SELECT rebate2.rebate_no,rebate2.model,rebate2.rebate_amt,rebate2.start_date,rebate2.end_date, rebate2.expired from dealer_two.rebate2;
    
CREATE  VIEW employee(
	emp_no,
    name,
    address,
    phone
)
AS
	SELECT rep_no, name,address,phone
	FROM	
		salesperson;

CREATE VIEW purchased AS
	SELECT purchased_cars.serial_no,purchased_cars.model,purchased_cars.color,purchased_cars.amount FROM dealer_one.purchased_cars
   UNION ALL
	SELECT purchased_autos.vehicle_no,purchased_autos.model,purchased_autos.color,purchased_autos.amount FROM dealer_two.purchased_autos;

	

 



