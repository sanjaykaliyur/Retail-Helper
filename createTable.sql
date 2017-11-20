drop table Reviews1;

drop table Supplier1;

drop table ShippingContainer1;

drop table Manufacturer1;

drop table UserPurchases1;

drop table Products1;

drop table Users1;

Create table Users1(userId VARCHAR(15) Primary Key, firstName VARCHAR(20),
lastName VARCHAR(20), street VARCHAR(30), city VARCHAR(20), state VARCHAR(20),
zipCode decimal(10,2));

Create table Products1(productId VARCHAR(15) PRIMARY KEY, price decimal(10,2),
color VARCHAR(15), quantityAvailable decimal(10,2));

Create table UserPurchases1(userId, productId, shirtSize VARCHAR(5) 
	CHECK (shirtSize in ('s','m','l','xl')), 
	quantity decimal(10,2), dateOrdered DATE, 
	foreign key (userId) REFERENCES Users1(userId),
	foreign key (productId) REFERENCES Products1(productId));

Create table Manufacturer1(manufacturerId varchar(15), location VARCHAR(15), productId, FOREIGN KEY (productId) REFERENCES Products1(productId));

Create table ShippingContainer1(containerId varchar(10) PRIMARY KEY, location varchar(10), productId, FOREIGN KEY (productId) REFERENCES Products1(productId));

Create table Supplier1(supplierId varchar(15) PRIMARY KEY, location varchar(15), materialProd varchar(15), productId, FOREIGN KEY (productId) REFERENCES Products1(productId));

Create table Reviews1(userId, productId, review varchar(50), FOREIGN KEY (userId) REFERENCES Users1(userId), FOREIGN KEY (productId) references Products1(productId));

