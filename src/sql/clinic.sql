CREATE TABLE user(
id int(10)  AUTO_INCREMENT PRIMARY KEY,
firstName varchar(255) NOT NULL,
lastName varchar(255) NOT NULL,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
emailAddress varchar(255) NOT NULL,
dateOfBirth date
);

CREATE TABLE patient(
id int PRIMARY KEY AUTO_INCREMENT,
userId int,
FOREIGN KEY (userId) REFERENCES user(id)
);

CREATE TABLE doctor(
id int PRIMARY KEY AUTO_INCREMENT,
userId int,
FOREIGN KEY (userId) REFERENCES user(id)
);

CREATE TABLE appointment(
id int PRIMARY KEY AUTO_INCREMENT,
appointmentTime TIMESTAMP,
doctorId int,
patientId int,
FOREIGN KEY(doctorId) REFERENCES doctor(id),
FOREIGN KEY(patientId) REFERENCES patient(id)
);

CREATE TABLE schedules(
id int PRIMARY KEY AUTO_INCREMENT,
scheduleDate DATE,
doctorId int,
FOREIGN KEY(doctorId) REFERENCES doctor(id)
);

CREATE TABLE slot(
id int PRIMARY KEY AUTO_INCREMENT,
slotReference varchar(255),
UNIQUE KEY `slotReference_UNIQUE` (`slotReference`),
startTime time
);

CREATE TABLE schedules_slot(
id int PRIMARY KEY AUTO_INCREMENT,
scheduleId int,
slotReference varchar(255),
FOREIGN KEY(scheduleId) REFERENCES schedules(id),
FOREIGN KEY(slotReference) REFERENCES slot(slotReference)
);