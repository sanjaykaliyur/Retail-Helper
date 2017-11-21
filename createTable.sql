drop table Reviews;

drop table Supplier;

drop table ShippingContainer;

drop table Manufacturer;

drop table UserPurchases;

drop table Products;

drop table Users;

Create table Users(userId VARCHAR(15) Primary Key, password VARCHAR(64), firstName VARCHAR(20),
lastName VARCHAR(20), street VARCHAR(30), city VARCHAR(20), state VARCHAR(20),
zipCode decimal(10,2));

Create table Products(productId VARCHAR(15) PRIMARY KEY, price decimal(10,2),
color VARCHAR(15), quantityAvailable decimal(10,2), filePath varchar(150), description VARCHAR(200));

Create table UserPurchases(userId, productId, shirtSize VARCHAR(5) 
	CHECK (shirtSize in ('s','m','l','xl')), 
	quantity decimal(10,2), dateOrdered DATE, 
	foreign key (userId) REFERENCES Users(userId),
	foreign key (productId) REFERENCES Products(productId));

Create table Manufacturer(manufacturerId varchar(15), location VARCHAR(15), productId, FOREIGN KEY (productId) REFERENCES Products(productId));

Create table ShippingContainer(containerId varchar(10) PRIMARY KEY, location varchar(10), productId, FOREIGN KEY (productId) REFERENCES Products(productId));

Create table Supplier(supplierId varchar(15) PRIMARY KEY, location varchar(15), materialProd varchar(15), productId, FOREIGN KEY (productId) REFERENCES Products(productId));

Create table Reviews(userId, productId, review varchar(150), FOREIGN KEY (userId) REFERENCES Users(userId), FOREIGN KEY (productId) references Products(productId));

Create table courseTemp(productId VARCHAR(15) PRIMARY KEY, price decimal(10,2),
color VARCHAR(15), quantityAvailable decimal(10,2), filePath varchar(150), description VARCHAR(200), userId, FOREIGN KEY (userId) REFERENCES Users(userId));
