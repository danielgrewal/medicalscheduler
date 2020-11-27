CREATE DATABASE Bookings;
USE Bookings;

CREATE TABLE Users (
	UserId INT NOT NULL auto_increment PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(20),
    UNIQUE INDEX idx_Email (Email)
);

CREATE TABLE Dates (
	DateId INT NOT NULL PRIMARY KEY,
    FullDate Date NOT NULL,
    Year INT NOT NULL,
    Month INT NOT NULL,
    Day INT NOT NULL
);

CREATE TABLE Timeslots (
	TimeslotId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Display VARCHAR(7) NOT NULL,
    StartTime TIME NOT NULL,
    INDEX idx_StartTime(StartTime)
);

CREATE TABLE Specialties (
	SpecialtyId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Description VARCHAR(4000) NOT NULL
);

CREATE TABLE Doctors (
	DoctorId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    SpecialtyId INT NOT NULL,
    FOREIGN KEY (SpecialtyId) REFERENCES Specialties(SpecialtyId)
);

CREATE TABLE Appointments (
	AppointmentId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DoctorId INT NOT NULL,
    FullDate Date NOT NULL,
    TimeslotId INT NOT NULL,
    UserId INT NOT NULL,
    FOREIGN KEY (UserId) REFERENCES Users(UserId),
    FOREIGN KEY (DoctorId) REFERENCES Doctors(DoctorId),
    FOREIGN KEY (TimeslotId) REFERENCES Timeslots(TimeslotId),
    UNIQUE INDEX idx_DoctorId_FullDate_TimeslotId (DoctorId, FullDate, TimeslotId)
);

insert into Timeslots values (null, '8:00am', '08:00:00');
insert into Timeslots values (null, '8:30am', '08:30:00');
insert into Timeslots values (null, '9:00am', '09:00:00');
insert into Timeslots values (null, '9:30am', '09:30:00');
insert into Timeslots values (null, '10:00am', '10:00:00');
insert into Timeslots values (null, '10:30am', '10:30:00');
insert into Timeslots values (null, '11:00am', '11:00:00');
insert into Timeslots values (null, '11:30am', '11:30:00');
insert into Timeslots values (null, '12:00pm', '12:00:00');
insert into Timeslots values (null, '12:30pm', '12:30:00');
insert into Timeslots values (null, '1:00pm', '13:00:00');
insert into Timeslots values (null, '1:30pm', '13:30:00');
insert into Timeslots values (null, '2:00pm', '14:00:00');
insert into Timeslots values (null, '2:30pm', '14:30:00');
insert into Timeslots values (null, '3:00pm', '15:00:00');
insert into Timeslots values (null, '3:30pm', '15:30:00');
insert into Timeslots values (null, '4:00pm', '16:00:00');
insert into Timeslots values (null, '4:30pm', '16:30:00');

insert into specialties values (null, 'Diagnostic Medicine', 'Placeholder Diagnostic Medicine description');
insert into specialties values (null, 'Family Medicine', 'Placeholder Family Medicine description');
insert into specialties values (null, 'Psychiatric Medicine', 'Placeholder Psychiatric Medicine description');

insert into doctors values (null, 'Dr.Gregory House', 1);
insert into doctors values (null, 'Dr.Perry Cox', 2);
insert into doctors values (null, 'Dr.John J.D. Dorian', 2);
insert into doctors values (null, 'Dr.Frasier Crane', 3);
insert into doctors values (null, 'Dr.Niles Crane', 3);

#insert into appointments values (null, 3, '2020-11-27', 15, 1);
#insert into appointments values (null, 3, '2020-11-27', 11, 2);
#insert into appointments values (null, 1, '2020-11-27', 11, 2);