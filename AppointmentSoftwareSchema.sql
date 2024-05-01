-- MySQL Script generated by MySQL Workbench
-- Wed May  1 15:34:23 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema appointmentSoftwareDB
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `appointmentSoftwareDB` ;

-- -----------------------------------------------------
-- Schema appointmentSoftwareDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `appointmentSoftwareDB` DEFAULT CHARACTER SET utf8 ;
USE `appointmentSoftwareDB` ;

-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`User` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`User` (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Phone` VARCHAR(45) NULL,
  `Type` ENUM('user', 'provider', 'admin') NOT NULL,
  PRIMARY KEY (`UserID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`Appointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`Appointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`Appointment` (
  `AppointmentID` INT NOT NULL AUTO_INCREMENT,
  `DateTime` DATETIME NULL,
  `Type` ENUM('Medical', 'Beauty', 'Fitness') NULL,
  `Information` VARCHAR(45) NULL,
  PRIMARY KEY (`AppointmentID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`AppointmentSlot`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`AppointmentSlot` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`AppointmentSlot` (
  `AppointmentSlotID` INT NOT NULL AUTO_INCREMENT,
  `DateTime` DATETIME NULL,
  `Type` ENUM('Medical', 'Beauty', 'Fitness') NULL,
  `Information` VARCHAR(45) NULL,
  PRIMARY KEY (`AppointmentSlotID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`UserAppointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`UserAppointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`UserAppointment` (
  `UserAppointmentID` INT NOT NULL AUTO_INCREMENT,
  `UserID` INT NOT NULL,
  `AppointmentID` INT NOT NULL,
  PRIMARY KEY (`UserAppointmentID`, `UserID`, `AppointmentID`),
  INDEX `fk_UserAppointment_User1_idx` (`UserID` ASC) VISIBLE,
  INDEX `fk_UserAppointment_Appointment1_idx` (`AppointmentID` ASC) VISIBLE,
  CONSTRAINT `fk_UserAppointment_User1`
    FOREIGN KEY (`UserID`)
    REFERENCES `appointmentSoftwareDB`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserAppointment_Appointment1`
    FOREIGN KEY (`AppointmentID`)
    REFERENCES `appointmentSoftwareDB`.`Appointment` (`AppointmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`Cancelled`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`Cancelled` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`Cancelled` (
  `CancelledSlotID` INT NOT NULL AUTO_INCREMENT,
  `DateTime` DATETIME NULL,
  `Type` ENUM('Medical', 'Beauty', 'Fitness') NULL,
  `Information` VARCHAR(45) NULL,
  PRIMARY KEY (`CancelledSlotID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`ProviderAppointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`ProviderAppointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`ProviderAppointment` (
  `ProviderAppointmentID` INT NOT NULL AUTO_INCREMENT,
  `ProviderID` INT NOT NULL,
  `AppointmentSlotID` INT NOT NULL,
  `AppointmentID` INT NOT NULL,
  `CancelledSlotID` INT NOT NULL,
  PRIMARY KEY (`ProviderAppointmentID`, `ProviderID`, `AppointmentSlotID`, `AppointmentID`, `CancelledSlotID`),
  INDEX `fk_ProviderAppointment_User1_idx` (`ProviderID` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_AppointmentSlot1_idx` (`AppointmentSlotID` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_Appointment1_idx` (`AppointmentID` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_Cancelled1_idx` (`CancelledSlotID` ASC) VISIBLE,
  CONSTRAINT `fk_ProviderAppointment_User1`
    FOREIGN KEY (`ProviderID`)
    REFERENCES `appointmentSoftwareDB`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProviderAppointment_AppointmentSlot1`
    FOREIGN KEY (`AppointmentSlotID`)
    REFERENCES `appointmentSoftwareDB`.`AppointmentSlot` (`AppointmentSlotID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProviderAppointment_Appointment1`
    FOREIGN KEY (`AppointmentID`)
    REFERENCES `appointmentSoftwareDB`.`Appointment` (`AppointmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProviderAppointment_Cancelled1`
    FOREIGN KEY (`CancelledSlotID`)
    REFERENCES `appointmentSoftwareDB`.`Cancelled` (`CancelledSlotID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
