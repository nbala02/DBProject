
CREATE ALGORITHM=MERGE VIEW  available_autoo (
	serial_no,
    model,
    color
    

) AS
	SELECT 
    dealer_one.serial_no,
    dealer_one.model, 
    dealer_one.color
FROM cars.dealer_one;




create database globalview;


use globalview;


CREATE VIEW available_auto AS 
	SELECT cars.serial_no,cars.model,cars.color FROM dealer_one.cars
   UNION ALL 
	SELECT autos.vehicle_no,autos.model,autos.color FROM dealer_two.autos;
    
CREATE VIEW salesperson AS 
	SELECT representative.rep_no, representative.base_salary, representative.ytd_sales, representative.comm from dealer_one.representative
    UNION ALL
    SELECT sales_person.sale_no,sales_person.base_salary, sales_person.ytdsales,sales_person.comm from dealer_two.sales_person;
 
CREATE VIEW customer_global AS
	SELECT customer_d1.customer_no, customer_d1.name,customer_d1.address,customer_d1.phone from dealer_one.customer_d1
    UNION ALL
    SELECT customer_d2.buyer_no,customer_d2.name,customer_d2.address,customer_d2.phone from dealer_two.customer_d2;
    
CREATE ALGORITHM=MERGE VIEW sales(
	transaction_no,
    rep_no,
    customer_no,
    veh_no,
    date
)
 AS
	SELECT transaction.deal_no,transaction.rep_no, transaction.customer_no, transaction.serial_no,transaction.date from dealer_one.transaction
    UNION ALL
    SELECT deal.deal_no, deal.sale_no,deal.buyer_no,deal.vehicle_no,deal.date from dealer_two.deal;
    
CREATE VIEW rebate_Global AS
	SELECT rebate1.model,rebate1.rebate_amt,rebate1.start_date,rebate1.end_date from dealer_one.rebate1
    UNION ALL
    SELECT rebate2.model,rebate2.rebate_amt,rebate2.start_date,rebate2.end_date from dealer_two.rebate2
    








