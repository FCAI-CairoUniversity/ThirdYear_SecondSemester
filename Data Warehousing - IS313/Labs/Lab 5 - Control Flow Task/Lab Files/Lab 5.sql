USE data_warehouse

-- Exercise 1
SELECT COUNT(ProductID)
FROM [AdventureWorks].[Production].[Product]
WHERE Name LIKE  '%Mountain%' and productNumber like 'R%'

select *
FROM [AdventureWorks].[Production].[Product]

-- Exercise 2
select * from Employee

select * from Employee_SCD_Type2

select ISNULL(max(created_date), '1/1/1950') last_extract_date
from Employee_SCD_Type2

Update Employee
set Title = 'Android Developer', UpdateDate = '2026-3-30'
where ID = 2

INSERT INTO Employee (ID, Name, Title, City, UpdateDate)
VALUES (4, 'Mostafa', 'Data Engineer', 'Cairo', '2026-03-31')

/*
CREATE TABLE Employee (
    ID INT,
    Name VARCHAR(255),
    Title VARCHAR(255),
    City VARCHAR(255),
    UpdateDate DATE
);

CREATE TABLE Employee_SCD_Type2 (
    emp_key int identity(1,1),
	ID INT,
    Name VARCHAR(255),
    Title VARCHAR(255),
    City VARCHAR(255),
	active_flag bit,
    created_date DATE,
    updated_date DATE
);

TRUNCATE TABLE Employee
TRUNCATE TABLE Employee_SCD_Type2

INSERT INTO Employee (ID, Name, Title, City, UpdateDate)
VALUES (1, 'Ahmed', 'Data Engineer', 'Cairo', '2025-03-20'),
       (2, 'Ali', 'Java Developer', 'Giza', '2025-03-20'),
       (3, 'Omar', 'Backend Developer', 'Alex', '2025-03-20');
*/


-- Exercise 3

select * from Customers

/*
CREATE TABLE Customers (
    CustomerID INT,
    Name VARCHAR(50),
    Email VARCHAR(100),
    Age INT
);

TRUNCATE TABLE Customers

*/