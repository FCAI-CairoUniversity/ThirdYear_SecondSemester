use AdventureWorks

select * from [AdventureWorks].[Production].[Product]

Use HR

select * from HR.dbo.[Products]

-- truncate table HR.dbo.[Products]

select * from student

-- truncate table student

/*
create table student(
ID varchar(50),
Name varchar(50),
city varchar(50),
Level varchar(50)
)

CREATE TABLE Products(
	Product_ID int IDENTITY(1,1) NOT NULL,
	Product_Name nvarchar(25) NOT NULL,
	Product_Number nvarchar(25) NOT NULL,
	Make_Flag bit NOT NULL,
	Finished_Goods_Flag bit NOT NULL,
	Color nvarchar(15) NULL DEFAULT 'NNNNNNN',
	SafetyStockLevel smallint NOT NULL,
	ReorderPoint smallint NOT NULL,
	StandardCost money NOT NULL,
	ListPrice money NOT NULL,
	Size nvarchar(5) NULL,
	SizeUnitMeasureCode nchar(3) NULL,
	WeightUnitMeasureCode nchar(3) NULL,
	Weight decimal(8, 2) NULL,
	DaysToManufacture int NOT NULL,
	ProductLine nchar(2) NULL,
	Class nchar(2) NULL,
	Style nchar(2) NULL,
	ProductSubcategoryID int NULL,
	ProductModelID int NULL,
	SellStartDate datetime NOT NULL,
	SellEndDate datetime NULL,
	DiscontinuedDate datetime NULL,
	ModifiedDate datetime NOT NULL,
)
*/