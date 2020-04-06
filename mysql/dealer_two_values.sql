use dealer_two;

INSERT INTO sales_person(sale_no, name, address, phone, comm, base_salary, ytdsales)
VALUES('654', 'Sally Rogers', '45 Cross St', '573-555-8888', '$52,000', '$55,000', '$109,000');

INSERT INTO customer_d2(buyer_no, name, address, phone)
VALUES('5678', 'Mike King', '33 Second', '573-555-7890');

INSERT INTO rebate2(model, rebate_amt, start_date, end_date)
VALUES('Rav4', '$1,750', '2014/02/01', '2014/05/31');

INSERT INTO rebate2(model, rebate_amt, start_date, end_date)
VALUES('Tundra', '$2,750', '2014/02/01', '2014/05/31');

INSERT INTO autos(vehicle_no, model, color, autotrans, warehouse, financed)
VALUES('S12212', 'Tundra', 'Silver', 'yes', 'Liberty', 'yes');

INSERT INTO autos(vehicle_no, model, color, autotrans, warehouse, financed)
VALUES('S14414', 'Rav4', 'Yellow', 'no', 'Lees Summit', 'no');

INSERT INTO finance(vehicle_no, buyer_no, amount, months, balance)
VALUES('S14414', '5678', '$13,000', '60', '$13,000');

INSERT INTO deal(deal_no, sale_no, buyer_no, vehicle_no, amount, fin_amt, date, rebate_amt)
VALUES('T45678', '654', '5678', 'S14414', '$23,000', '$13,000', '2014/02/07', '$1,750');