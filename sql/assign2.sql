mysql> 
mysql> system cls
mysql> use practice;
Database changed
mysql> 
mysql> show tables;
+--------------------+
| Tables_in_practice |
+--------------------+
| attendance         |
| faculty            |
| student            |
| tab01              |
| tab02              |
+--------------------+
5 rows in set (0.00 sec)

mysql> 
mysql> desc faculty;
+--------+-------------+------+-----+---------+----------------+
| Field  | Type        | Null | Key | Default | Extra          |
+--------+-------------+------+-----+---------+----------------+
| fid    | int         | NO   | PRI | NULL    | auto_increment |
| fname  | varchar(20) | NO   |     | NULL    |                |
| age    | smallint    | NO   |     | NULL    |                |
| degree | varchar(20) | NO   |     | NULL    |                |
+--------+-------------+------+-----+---------+----------------+
4 rows in set (0.00 sec)

mysql> 
mysql> desc student;
+--------+-------------------+------+-----+---------+-------+
| Field  | Type              | Null | Key | Default | Extra |
+--------+-------------------+------+-----+---------+-------+
| sid    | varchar(50)       | NO   | PRI | NULL    |       |
| sname  | varchar(50)       | NO   |     | NULL    |       |
| course | varchar(50)       | NO   |     | NULL    |       |
| syear  | smallint unsigned | NO   |     | NULL    |       |
| phone  | varchar(50)       | YES  |     | NULL    |       |
| pass   | varchar(50)       | NO   |     | NULL    |       |
+--------+-------------------+------+-----+---------+-------+
6 rows in set (0.00 sec)

mysql> 
mysql> desc attendance;
+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| fid           | int         | YES  | MUL | NULL    |       |
| sid           | varchar(50) | YES  | MUL | NULL    |       |
| subject       | varchar(30) | NO   |     | NULL    |       |
| date_of_class | date        | NO   | PRI | NULL    |       |
| no_of_class   | int         | NO   |     | NULL    |       |
+---------------+-------------+------+-----+---------+-------+
5 rows in set (0.00 sec)

mysql> system cls
mysql> select * from faculty limit 10;
+-----+---------------------+-----+----------+
| fid | fname               | age | degree   |
+-----+---------------------+-----+----------+
| 101 | Dr. Ananya Sharma   |  38 | B.Pharm  |
| 102 | Prof. Vikram Kapoor |  39 | DMorM.Ch |
| 103 | Sr. Nisha Reddy     |  43 | BCA      |
| 104 | Dr. Rohan Verma     |  37 | M.Com    |
| 105 | Aisha Patel         |  59 | B.Pharm  |
| 106 | Prof. Rajeev Singh  |  32 | BCA      |
| 107 | Sr. Meera Deshmukh  |  36 | Ph.D.    |
| 108 | Dr. Arjun Khanna    |  47 | LLB      |
| 109 | Varun Iyer          |  30 | B.Sc     |
| 110 | Prof. Sneha Menon   |  43 | M.Tech   |
+-----+---------------------+-----+----------+
10 rows in set (0.00 sec)

mysql> 
mysql> 
mysql> -- count no of faculties
mysql> 
mysql> select count(fid) No_of_faculties from faculty;
+-----------------+
| No_of_faculties |
+-----------------+
|              30 |
+-----------------+
1 row in set (0.01 sec)

mysql> select count(fid) No_of_faculties from faculty where degree = 'Ph.D';
+-----------------+
| No_of_faculties |
+-----------------+
|               0 |
+-----------------+
1 row in set (0.00 sec)

mysql> select count(fid) No_of_faculties from faculty where degree = 'Ph.D.';
+-----------------+
| No_of_faculties |
+-----------------+
|               3 |
+-----------------+
1 row in set (0.00 sec)

mysql> 
mysql> notee;
