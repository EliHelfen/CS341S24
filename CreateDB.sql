CREATE DATABASE IF NOT EXISTS AppointmentSoftware;
USE AppointmentSoftware;

DROP TABLE IF EXISTS User;

CREATE TABLE IF NOT EXISTS User (
  UserID INT NOT NULL AUTO_INCREMENT,
  Username NVARCHAR(45) NULL,
  Password NVARCHAR(45) NULL,
  Email NVARCHAR(45) NULL,
  Phone NVARCHAR(45) NULL,
  Type ENUM('user', 'provider', 'admin') NOT NULL,
  PRIMARY KEY (UserID))

DROP TABLE IF EXISTS Appointment;

CREATE TABLE IF NOT EXISTS Appointment (
  AppointmentID INT NOT NULL AUTO_INCREMENT,
  DateTime DATETIME NULL,
  Type ENUM('Medical', 'Beauty', 'Fitness') NULL,
  Information NVARCHAR(45) NULL,
  PRIMARY KEY (AppointmentID))

DROP TABLE IF EXISTS AppointmentSlot ;

CREATE TABLE IF NOT EXISTS AppointmentSlot (
  AppointmentSlotID INT NOT NULL AUTO_INCREMENT,
  DateTime DATETIME NULL,
  Type ENUM('Medical', 'Beauty', 'Fitness') NULL,
  Information NVARCHAR(45) NULL,
  PRIMARY KEY (AppointmentSlotID))

DROP TABLE IF EXISTS UserAppointment ;

CREATE TABLE IF NOT EXISTS UserAppointment (
  UserAppointmentID INT NOT NULL AUTO_INCREMENT,
  AppointmentID INT NOT NULL,
  UserID INT NOT NULL,
  PRIMARY KEY (UserAppointmentID, AppointmentID, UserID),
  INDEX fk_UserAppointment_Appointment1_idx (AppointmentID ASC) VISIBLE,
  INDEX fk_UserAppointment_User1_idx (UserID ASC) VISIBLE,
  CONSTRAINT fk_UserAppointment_Appointment1
    FOREIGN KEY (AppointmentID)
    REFERENCES Appointment (AppointmentID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_UserAppointment_User1
    FOREIGN KEY (UserID)
    REFERENCES User (UserID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

DROP TABLE IF EXISTS ProviderAppointment ;

CREATE TABLE IF NOT EXISTS ProviderAppointment (
  ProviderAppointmentID INT NOT NULL AUTO_INCREMENT,
  ProviderID INT NOT NULL,
  AppointmentSlotID INT NOT NULL,
  AppointmentID INT NOT NULL,
  PRIMARY KEY (ProviderAppointmentID, ProviderID, AppointmentSlotID, AppointmentID),
  INDEX fk_ProviderAppointment_User1_idx (ProviderID ASC) VISIBLE,
  INDEX fk_ProviderAppointment_AppointmentSlot1_idx (AppointmentSlotID ASC) VISIBLE,
  INDEX fk_ProviderAppointment_Appointment1_idx (AppointmentID ASC) VISIBLE,
  CONSTRAINT fk_ProviderAppointment_User1
    FOREIGN KEY (ProviderID)
    REFERENCES User (UserID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ProviderAppointment_AppointmentSlot1
    FOREIGN KEY (AppointmentSlotID)
    REFERENCES AppointmentSlot (AppointmentSlotID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ProviderAppointment_Appointment1
    FOREIGN KEY (AppointmentID;)
    REFERENCES Appointment (AppointmentID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
