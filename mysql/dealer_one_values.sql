use dealer_one;


Insert INTO representative (rep_no,name,address,phone,base_salary, ytd_sales,comm)
values ('R987', 'Frank Doe', '10 Broad St', '573-555-6666', '60000','122000','56000');


Insert INTO customer_d1 (customer_no,name,address,phone)
values ('C1234','Mary Jones','23 Hillside','573-555-2345');

Insert INTO customer_d1 (customer_no,name,address,phone)
values ('C1235','Kim Jones','23 Hillside','573-555-2346');

Insert INTO customer_d1 (customer_no,name,address,phone)
values ('C1236','Lamy Jones','23 Hillside','573-555-2347');

Insert INTO representative (rep_no,name,address,phone,base_salary, ytd_sales,comm)
values ('S57848', 'Arpit', '10 Broad St', '573-555-6666', '60000','122000','56000');

Insert INTO rebate1 (rebate_no,model,rebate_amt,start_date,end_date, expired)
values ('R1234','Rav4','1000','2014/02/01','2014/04/30', '0');

Insert INTO rebate1 (rebate_no,model,rebate_amt,start_date,end_date, expired)
values ('R1235','porche','2000','2014/02/01','2014/04/30', '0');

Insert INTO cars (serial_no,model,color,autotrans,warehouse, rebate )
values ( 'S11111','Rav4','Blue','yes','Bridgeport', 'No');

Insert INTO cars (serial_no,model,color,autotrans,warehouse)
values ( 'S13313','Camry','Red','no','st.Charles');

INSERT INTO purchased_cars (serial_no, model, color, autotrans, warehouse, amount)
values('V24353125','Avalon','Pink','Auto','Flushing', '23000');

INSERT INTO purchased_cars (serial_no, model, color, autotrans, warehouse, amount)
values('V72364234','RAV4','Blue','Auto','Flushing', '40000');

INSERT INTO purchased_cars (serial_no, model, color, autotrans, warehouse, amount)
values('V32094712','Tundra','Gray','Auto','Flushing', '12000');

Insert INTO loan (serial_no,customer_no, amount, start_date,end_date,months,balance)
values('V24353125','C1234','23000','2020/05/10','2023/02/20','36','10000');

Insert INTO loan (serial_no,customer_no, amount, start_date,end_date,months,balance)
values('V72364234','C1235','40000','2020/05/10','2023/02/20','36','40000');

Insert INTO loan (serial_no,customer_no, amount, start_date,end_date,months,balance)
values('V32094712','C1236','10000','2020/05/10','2023/02/20','36','10000');

Insert INTO transaction (deal_no, rebate_no, rep_no,customer_no,serial_no,amount,fin_amt, date)
values('T123456','R1235','R987','C1234','S13313','20000','10000','2014/02/10');

Insert INTO transaction (deal_no, rebate_no, package_no, rep_no,customer_no,serial_no,amount,fin_amt, date)
values('T1236','R1234','P1','R987','C1234','S13313','20000','10000','2014/02/10');



