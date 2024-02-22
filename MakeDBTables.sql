CREATE DATABASE IF NOT EXISTS AppointmentSoftware;
USE AppointmentSoftware;



CREATE TABLE User (
    UserID INT AUTO_INCREMENT,
    PRIMARY KEY (UserID)
);

CREATE TABLE ProviderUser (
    PID INT AUTO_INCREMENT,
    PRIMARY KEY (PID)
);

CREATE TABLE Appointment (
    AppID INT AUTO_INCREMENT,
    PRIMARY KEY (AppID)
);

CREATE TABLE AppointmentSlot (
    AppSID INT AUTO_INCREMENT,
    PRIMARY KEY (AppSID)
);

CREATE TABLE UserAppointment (
    UAppID INT AUTO_INCREMENT,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES User (UserID),
    AppID INT,
    FOREIGN KEY (AppID) REFERENCES Appointment (AppID),
    PRIMARY KEY (UAppID)
);

CREATE TABLE ProviderUserAppointment (
    PAppID INT AUTO_INCREMENT,
    AppID INT,
    FOREIGN KEY (AppID) REFERENCES Appointment (AppID),
    AppSID INT,
    FOREIGN KEY (AppSID) REFERENCES AppointmentSlot (AppSID),
    PRIMARY KEY (PAppID)
);