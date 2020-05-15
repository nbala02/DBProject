use dealer_two;

INSERT INTO sales_person(sale_no, name, address, phone, comm, base_salary, ytdsales)
VALUES('S86592', 'Fernanda Tovar', '45 Cross St', '573-555-8888', '52000', '55000', '109000');
      
INSERT INTO customer_d2(buyer_no, name, address, phone)
VALUES('5678', 'Mike King', '33 Second', '573-555-7890');

INSERT INTO rebate2(rebate_no,model, rebate_amt, start_date, end_date, expired)
VALUES('R4564','Rav4', '1750', '2014/02/01', '2014/05/31', '0');

INSERT INTO rebate2(rebate_no,model, rebate_amt, start_date, end_date, expired)
VALUES('R6666','Tundra', '2750', '2014/02/01', '2014/05/31', '0');

INSERT INTO autos(vehicle_no, model, color, autotrans, warehouse)
VALUES('S12212', 'Tundra', 'Silver', 'yes', 'Liberty');

INSERT INTO autos(vehicle_no, model, color, autotrans, warehouse)
VALUES('S14414', 'Rav4', 'Yellow', 'no', 'Lees Summit');

INSERT INTO finance(vehicle_no, buyer_no, amount, months,start_date,end_date, balance)
VALUES('S14414', '5678', '13000', '12', '2014/02/01', '2014/05/31','13000');

INSERT INTO deal(deal_no, rebate_no, sale_no, buyer_no, vehicle_no, amount, fin_amt, date)
VALUES('T45678', 'R4564', '654','5678', 'S14414', '23000', '13000', '2014/02/07');

