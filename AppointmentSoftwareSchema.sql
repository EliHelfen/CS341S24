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
  `AppointmentID` INT NOT NULL,
  `UserID` INT NOT NULL,
  PRIMARY KEY (`UserAppointmentID`, `AppointmentID`, `UserID`),
  INDEX `fk_UserAppointment_Appointment1_idx` (`AppointmentID` ASC) VISIBLE,
  INDEX `fk_UserAppointment_User1_idx` (`UserID` ASC) VISIBLE,
  CONSTRAINT `fk_UserAppointment_Appointment1`
    FOREIGN KEY (`AppointmentID`)
    REFERENCES `appointmentSoftwareDB`.`Appointment` (`AppointmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserAppointment_User1`
    FOREIGN KEY (`UserID`)
    REFERENCES `appointmentSoftwareDB`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`ProviderAppointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`ProviderAppointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`ProviderAppointment` (
  `ProviderAppointmentID` INT NOT NULL AUTO_INCREMENT,
  `UserID` INT NOT NULL,
  `AppointmentSlotID` INT NOT NULL,
  `AppointmentID` INT NOT NULL,
  PRIMARY KEY (`ProviderAppointmentID`, `UserID`, `AppointmentSlotID`, `AppointmentID`),
  INDEX `fk_ProviderAppointment_User1_idx` (`UserID` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_AppointmentSlot1_idx` (`AppointmentSlotID` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_Appointment1_idx` (`AppointmentID` ASC) VISIBLE,
  CONSTRAINT `fk_ProviderAppointment_User1`
    FOREIGN KEY (`UserID`)
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
    ON UPDATE NO ACTION)