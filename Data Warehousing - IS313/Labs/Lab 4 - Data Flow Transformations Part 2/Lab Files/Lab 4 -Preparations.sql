use data_warehouse

create table product(
Product_ID nvarchar(10) primary key,
Product_Name nvarchar(50)
)

create table sales(
Order_ID	int, 
Product_ID nvarchar(10) references product(Product_ID),
Region nvarchar(20),
Customer_ID int, 
Order_Date datetime,
Revenue float, -- Price * Quantity
)

insert into product values
('P1', 'Laptop'),
('P2', 'Phone'),
('P3', 'Tablet')

insert into sales values
(1, 'P1','Cairo', 101, '2025-1-10', 200),
(2, 'P2','Giza', 102, '2025-2-5', 300),
(3, 'P1','Cairo', 103, '2025-4-12', 300),
(4, 'P3','Alex', 101, '2025-5-1', 1000)

SELECT * FROM SALES
-- PER PRODUCT
select product_name, DATEPART(QUARTER, Order_Date) Quarter ,sum(revenue) total_sales
from sales inner join product on sales.Product_ID = product.Product_ID
group by product_name, DATEPART(QUARTER, Order_Date)

-- REGION
select region , sum(revenue) total_sales
from sales 
group by region
-- ORDERS AND AVERAGE
select Customer_ID, avg(revenue) avg_sales, count(order_id) no_of_orders
from sales
group by Customer_ID







select Product_Name, DATEPART(QUARTER, Order_Date) Quarter, 
sum(Revenue) Total_Sales
from sales inner join product on sales.Product_ID = Product.Product_ID
group by Product_Name, DATEPART(QUARTER, Order_Date)





CREATE TABLE LogTable (
    LogID INT IDENTITY(1,1),
    LogMessage VARCHAR(50),
    RowsProcessed INT,
    LogDateTime DATETIME DEFAULT GETDATE()
);

/*
Insert into LogTable (LogMessage, RowsProcessed)
Values ('Passed Students', ?)

*/


select * from  LogTable

