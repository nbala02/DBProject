create database globalviews;
use globalviews;

CREATE VIEW available_auto AS
	SELECT serial_no, model, color, warehouse, rebate, 'D1' dealer FROM dealer_one.cars
	UNION ALL
	SELECT vehicle_no, model, color, warehouse, rebate, 'D2' dealer FROM dealer_two.autos;

CREATE VIEW salesperson(
	rep_no,
    base_salary,
    ytd_sales,
    comm,
    dealer
)
 AS
	SELECT rep_no, base_salary, ytd_sales, comm, 'D1' from dealer_one.representative
    UNION ALL
    SELECT sale_no, comm, base_salary, ytdsales, 'D2' from dealer_two.sales_person;

CREATE VIEW customer_global AS
	SELECT customer_no, name, address, phone from dealer_one.customer_d1
    UNION ALL
    SELECT buyer_no, name, address, phone from dealer_two.customer_d2;

CREATE VIEW sales(
	dealer,
	transaction_no,
    rebate_no,
    package_no,
    rep_no,
    customer_no,
    serial_no,
    amount,
    date
)
 AS
	SELECT 'D1', deal_no, rebate_no, package_no, rep_no, customer_no, serial_no, amount, date from dealer_one.transaction
    UNION ALL
    SELECT 'D2', deal_no, rebate_no, package_no, sale_no, buyer_no, vehicle_no, amount, date from dealer_two.deal;

CREATE VIEW rebate_Global AS
	SELECT rebate_no, model, rebate_amt, start_date, end_date, expired, 'D1' dealer from dealer_one.rebate1 WHERE expired = '0'
    UNION ALL
    SELECT rebate_no, model, rebate_amt, start_date, end_date, expired, 'D2' dealer from dealer_two.rebate2 WHERE expired = '0';

CREATE  VIEW employee(
	emp_no,
    name,
    address,
    phone
)
AS
	SELECT rep_no, name, address, phone FROM dealer_one.representative
	UNION ALL
	SELECT sale_no, name, address, phone FROM dealer_two.sales_person;

CREATE VIEW purchased AS
	SELECT serial_no, model, color, amount FROM dealer_one.purchased_cars
    UNION ALL
	SELECT vehicle_no, model, color, amount FROM dealer_two.purchased_autos;

CREATE VIEW loans(
	vehicle_no,
    customer_no,
    amount,
    model
)
 AS
	SELECT loan.serial_no, loan.customer_no, loan.amount, purchased_cars.model
		FROM dealer_one.loan, dealer_one.purchased_cars WHERE loan.serial_no = purchased_cars.serial_no
	UNION ALL
	SELECT finance.vehicle_no, finance.buyer_no, finance.amount, purchased_autos.model
		FROM dealer_two.finance, dealer_two.purchased_autos WHERE finance.vehicle_no = purchased_autos.vehicle_no;
