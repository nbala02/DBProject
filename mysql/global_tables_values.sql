use globalviews;

INSERT INTO model(model,price,type,gas_mileage,seat,engine)
VALUES('Lambo', '20000','truck', '35', '4', '4.0');

INSERT INTO model(model,price,type,gas_mileage,seat,engine)
VALUES('Tundra','12000','truck', '32', '5', '5.6');

INSERT INTO model(model,price,type,gas_mileage,seat,engine)
VALUES('Jeep','32000','truck', '32', '5', '5.6');


INSERT INTO model(model,price,type,gas_mileage,seat,engine)
VALUES('Avalon','23000','sedan', '34', '4', '3.5');

INSERT INTO model(model,price,type,gas_mileage,seat,engine)
VALUES('Camry','20000','sedan', '30', '5', '2.3');

INSERT INTO model(model,price,type,gas_mileage,seat,engine)
VALUES('RAV4','40000','suv', '30', '5', '2.0');

INSERT INTO add_on(package_no, package_description,price,mode_available) 
VALUES('P1','Naviagation','2000', 'SE,XE,XLE');

INSERT INTO add_on(package_no, package_description,price,mode_available) 
VALUES('P2','security','2000', 'SE,XE,XLE');

INSERT INTO potential_buyer(buyer_no,name,address, phone, email) 
VALUES('B023','John Smith','123 MAIN','573-555-1212','JSMITH@email.com');

