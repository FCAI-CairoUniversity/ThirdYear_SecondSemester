USE MYDB;

-- SELECT (from select_example.php)
SELECT id, firstname, lastname FROM myguests;

-- UPDATE (from update_example.php)
UPDATE myguests SET lastname = 'Smith' WHERE id = 2;

-- DELETE (from delete_example.php)
DELETE FROM myguests WHERE id = 3;
