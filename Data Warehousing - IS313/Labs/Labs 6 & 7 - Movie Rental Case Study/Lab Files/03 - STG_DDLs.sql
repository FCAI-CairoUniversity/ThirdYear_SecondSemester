DROP DATABASE IF EXISTS Movie_Rental

CREATE DATABASE Movie_Rental
GO

USE Movie_Rental
GO

CREATE SCHEMA STG
GO


CREATE TABLE STG.Customer
(
  customer_id  int,
  first_name   varchar(45),
  last_name    varchar(45),
  email        varchar(50),
  city         varchar(50),
  country      varchar(50),
  postal_code  varchar(10),
  active	   char(1),
  src_update_date  datetime,
  create_timestamp	datetime
);

-------------------------------------------------------

CREATE TABLE STG.Movie
(
  movie_id           int,
  title              varchar(255),
  description        text,
  release_year       varchar(4),
  language           varchar(20),
  rental_duration    tinyint,
  length             tinyint,
  rating             varchar(10),
  src_update_date    datetime,
  create_timestamp	 datetime
);
-------------------------------------------------------

CREATE TABLE STG.Store
(
  store_id            int,
  address             varchar(50),
  city                varchar(50),
  country             varchar(50),
  manager_first_name  varchar(45),
  manager_last_name   varchar(45),
  src_update_date     datetime,
  create_timestamp	  datetime
);

-------------------------------------------------------

CREATE TABLE STG.Rental (
    rental_id         INT NOT NULL,
    rental_date       DATE NOT NULL,
    return_date       DATE NULL,
    customer_id       INT NOT NULL,
    movie_id          INT NOT NULL,
    store_id          INT NOT NULL,
	rental_duration   INT,
	late_return_flag  INT,
	src_update_date   datetime,
	create_timestamp  datetime
);
-------------------------------------------------------

CREATE TABLE STG.etl_watermark
(
  table_name		 varchar(30),
  last_extract_date	 datetime
);

INSERT INTO STG.etl_watermark VALUES
	('Customer', '1950-01-01'),
	('Film', '1950-01-01'),
	('Store', '1950-01-01'),
	('Rental', '1950-01-01');
	
/*
SELECT * FROM STG.Customer;

SELECT * FROM STG.etl_watermark;

SELECT * FROM Movies.dbo.customer;
*/

/*
SELECT  * 
FROM Movies.dbo.customer 
WHERE last_update > 
(
	SELECT last_extract_date
	FROM STG.etl_watermark
	WHERE table_name = 'Customer'
)
*/

/*
UPDATE STG.etl_watermark
SET last_extract_date = 
(SELECT ISNULL(MAX(src_update_date), last_extract_date) FROM STG.Customer)
WHERE table_name = 'Customer';
*/

-- delete from stg.etl_watermark

/*
INSERT INTO [Movies].[dbo].[customer]
           ([store_id]
           ,[first_name]
           ,[last_name]
           ,[email]
           ,[address_id]
           ,[active]
           ,[create_date]
           ,[last_update])
     VALUES
           (2,'test','test', 'test@gmail.com', 261,1, '2026-4-18', '2026-4-18')

*/

SELECT * FROM STG.Customer;
SELECT * FROM STG.Movie;
SELECT * FROM STG.Store;

SELECT * FROM STG.Rental


select * from Movies.dbo.rental where return_date is null



REPLACE((DT_WSTR,15)(rental_date),"-","")

20260426