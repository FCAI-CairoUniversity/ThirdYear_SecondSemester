-- drop table employee
-- drop table department
-- create database data_warehouse
USE data_warehouse

create table department(
Dept_ID int primary key,
Dept_Name varchar(50)
)

create table employee(
ID int primary key,
Name varchar(50),
age int,
dept_id int --References department(dept_id)
)

insert into department values (1,'HR')
insert into department values (2,'Finance')
insert into department values (3,'Accounting')
insert into department values (4,'IT')

insert into employee values 
(1,'Ahmed', 25, 1),
(2,'Mohamed', 35, 2),
(3,'Mahmoud', 23, 4),
(4,'Hana', 26, 3), 
(5,'Laila', 45, 4),
(6,'Sara', 28, 2),
(7,'Mariam', 20, 5)