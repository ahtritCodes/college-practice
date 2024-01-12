-- SHOW DATABASES;
-- USE practice;
SHOW TABLES;
CREATE TABLE Faculty (
    fid INT PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20) NOT NULL,
    age SMALLINT NOT NULL,
    degree VARCHAR(20) NOT NULL,
    CONSTRAINT age_not_between_24and65 CHECK (
        age >= 24
        AND age < 65
    )
);
-- DROP TABLE faculty;
-- DESC faculty;
-- SELECT * FROM faculty;
CREATE TABLE student (
    sid VARCHAR(50) PRIMARY KEY,
    sname VARCHAR(50) NOT NULL,
    course VARCHAR(50) NOT NULL,
    syear SMALLINT UNSIGNED NOT NULL,
    phone VARCHAR(50),
    pass VARCHAR(50) NOT NULL,
    CONSTRAINT invalid_phone CHECK (
        LENGTH(phone) >= 10
        AND LENGTH(phone) < 12
    ),
    CONSTRAINT weak_password CHECK (LENGTH(pass) >= 8)
);
-- SELECT LENGTH('yA3K{sgb9mm1jr');
-- SELECT YEAR();
-- SELECT VALIDATE_PASSWORD_STRENGTH('royCoder_webVC23');
-- SELECT LENGTH(890237187799);
CREATE TABLE attendance (
    fid INT,
    sid VARCHAR(50),
    subject VARCHAR(50) NOT NULL,
    date_of_class DATE PRIMARY KEY,
    no_of_class INT NOT NULL,
    FOREIGN KEY (fid) REFERENCES faculty(fid) ON
DELETE CASCADE,
    FOREIGN KEY (sid) REFERENCES student(sid) ON
DELETE CASCADE
);
-- DROP TABLE student;
-- =============================================
-- Questions
-- 1.a)
SELECT COUNT(fid)
FROM faculty
WHERE degree = 'Ph.D';
-- b)
SELECT DISTINCT S.sid,
    S.sname
FROM student S
    JOIN attendance A ON S.sid = A.sid
    JOIN faculty F ON A.fid = A.fid
WHERE S.course = 'B.Sc'
    AND F.fname = 'Prof.A. Mondal';
-- c)
LOAD DATA INFILE 'E:/SEMESTER-5/Assignments/Attendance.csv' INTO TABLE attendance FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE 1 ROWS;