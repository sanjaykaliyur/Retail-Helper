Create table Users(userId VARCHAR(15) Primary Key, firstName VARCHAR(20),
lastName VARCHAR(20), street VARCHAR(30), city VARCHAR(20), state VARCHAR(20),
zipCode decimal(10,2));

Create table Product(productId VARCHAR(15) PRIMARY KEY, price decimal(10,2),
color VARCHAR(15), quantityAvailable decimal(10,2));

Create table UserPurchases(userId, productId, size VARCHAR(5) CHECK (size in ('s','m','l','xl')), quantity decimal(10,2), dateOrdered date, foreign key (userId) REFERENCES Users(userId),foreign key(productId) REFERENCES Product(productId));

Create table Manufacturer(location VARCHAR(15), productId, FOREIGN KEY (productId) REFERENCES Product(productId));

Create table ShippingContainer(containerId varchar(10) PRIMARY KEY, location varchar(10), productId, FOREIGN KEY (productId) REFERENCES Product(productId));

Create table Supplier(supplierId varchar(15) PRIMARY KEY, location varchar(15), materialProd varhcar(15), productId, FOREIGN KEY (productId) REFERENCES Product(productId));

Create table Reviews(userId, productId, review varhcar(50), FOREIGN KEY (userId) REFERENCES Users(userId), FOREIGN KEY (productId) references Product(productId));

