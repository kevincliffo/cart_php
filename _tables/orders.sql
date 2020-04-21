CREATE TABLE orders (
	order_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	customer_order_id int(11) NOT NULL,
	customer_name varchar(100) DEFAULT NULL,
	customer_email varchar(100) DEFAULT NULL,
	customer_mobileno varchar(100) DEFAULT NULL,
	customer_address varchar(100) DEFAULT NULL,
	customer_paymentmode varchar(100) DEFAULT NULL,
	product_price float(10,2) DEFAULT NULL,
	product_qty float(10,2) DEFAULT NULL,
	product_total_price float(10,2) DEFAULT NULL,
	product_name varchar(100) DEFAULT NULL,
	product_image varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
