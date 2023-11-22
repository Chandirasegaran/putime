-- Create a new database
CREATE DATABASE IF NOT EXISTS `pu_timetable`;
DROP DATABASE pu_timetable;
-- Use the new database
USE `pu_timetable`;

-- Create tables
CREATE TABLE IF NOT EXISTS `courses` (
    `subject_code` VARCHAR(50) PRIMARY KEY,
    `subject_name` VARCHAR(255) NOT NULL,
    `hcsc` VARCHAR(10) NOT NULL,
    `course` VARCHAR(50) NOT NULL,
    `subject_type` VARCHAR(50) NOT NULL,
    `sem_no` INT NOT NULL
);
drop Table courses;

CREATE TABLE IF NOT EXISTS `staff` (
    `staff_code` VARCHAR(50) PRIMARY KEY,
    `staff_name` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `assignments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `subject_code` VARCHAR(50) NOT NULL,
    `subject_name` VARCHAR(255) NOT NULL,
    `subject_type` VARCHAR(50) NOT NULL,
    `sem_no` INT NOT NULL,
    `staff_code` VARCHAR(50) NOT NULL,
    `staff_name` VARCHAR(255) NOT NULL,
    `hcsc` VARCHAR(10) NOT NULL,
    FOREIGN KEY (`subject_code`) REFERENCES `courses` (`subject_code`),
    FOREIGN KEY (`staff_code`) REFERENCES `staff` (`staff_code`)
);


insert into courses values("101","subject1","Hardcore","M.Tech","Theory",1);
insert into courses values("102","subject2","Softcore","MCA","Lab",1);
insert into courses values("103","subject3","Softcore","MCA","Lab",3);
insert into courses values("104","subject4","Softcore","MCA","Lab",4);
insert into courses values("105","subject5","Softcore","MCA","Lab",2);
insert into courses values("106","subjectn","Softcore","a","Lab",1);
insert into courses values("107","subjectn","Hardcore","a","Lab",1);


insert into staff VALUES("201","name1");
insert into staff VALUES("202","name2");

insert into assignments( 
    `subject_code`,
    `subject_name`,
    `subject_type` ,
    `sem_no`,
    `staff_code` ,
    `staff_name` ,
    `hcsc` ) values("104","subject3","Lab",3,"201","name1","Softcore");


SELECT *from courses;

SELECT * FROM assignments;