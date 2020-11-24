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
    Display VARCHAR(5) NOT NULL,
    StartTime TIME NOT NULL
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
    DateId INT NOT NULL,
    TimeslotId INT NOT NULL,
    UserId INT NOT NULL,
    FOREIGN KEY (UserId) REFERENCES Users(UserId),
    FOREIGN KEY (DoctorId) REFERENCES Doctors(DoctorId),
    FOREIGN KEY (DateId) REFERENCES Dates(DateId),
    FOREIGN KEY (TimeslotId) REFERENCES Timeslots(TimeslotId),
    UNIQUE INDEX idx_DoctorId_DateId_TimeslotId (DoctorId, DateId, TimeslotId)
);