-- DDL
create database student;

use student;

create table details (
	roll integer,
	subject varchar(20),
	marks decimal(10,2),
	full_marks integer,
	address varchar(200)
);

select * from details;

insert into details (roll, subject, marks, full_marks, address) values
	(1,'a',50.34,29,'asldfjlsj'),
	(2,'b',23.32,39,'aseower'),
	(3,'c',92.34,100,'aksdjpq'),
	(4,'d',38.4,45,'pqiwres'),
	(5,'e',52.34,23,'rasarani');

select * from details;

alter table details add phone_no bigint;

alter table details drop column full_marks;

truncate table details;

drop table details;

-- DML 

update details 
	set phone_no=2998349299
	where roll=1;
 
delete from details
	where roll=2;

