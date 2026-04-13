-- Create user test_user and grant privileges (as before)
CREATE USER IF NOT EXISTS 'test_user'@'localhost' IDENTIFIED BY 'password123';
GRANT SELECT, INSERT, UPDATE, DELETE ON MYDB.* TO 'test_user'@'localhost';
FLUSH PRIVILEGES;