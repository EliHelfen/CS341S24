
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
  `idUser` INT NOT NULL,
  `Username` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Phone` VARCHAR(45) NULL,
  `Type` ENUM('user', 'provider', 'admin') NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`Appointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`Appointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`Appointment` (
  `idAppointment` INT NOT NULL,
  `DateTime` DATETIME NULL,
  `Type` ENUM('Medical', 'Beauty', 'Fitness') NULL,
  `Information` VARCHAR(45) NULL,
  PRIMARY KEY (`idAppointment`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`AppointmentSlot`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`AppointmentSlot` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`AppointmentSlot` (
  `idAppointmentSlot` INT NOT NULL,
  `DateTime` DATETIME NULL,
  `Type` ENUM('Medical', 'Beauty', 'Fitness') NULL,
  `Information` VARCHAR(45) NULL,
  PRIMARY KEY (`idAppointmentSlot`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`UserAppointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`UserAppointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`UserAppointment` (
  `idUserAppointment` INT NOT NULL,
  `Appointment_idAppointment` INT NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idUserAppointment`, `Appointment_idAppointment`, `User_idUser`),
  INDEX `fk_UserAppointment_Appointment1_idx` (`Appointment_idAppointment` ASC) VISIBLE,
  INDEX `fk_UserAppointment_User1_idx` (`User_idUser` ASC) VISIBLE,
  CONSTRAINT `fk_UserAppointment_Appointment1`
    FOREIGN KEY (`Appointment_idAppointment`)
    REFERENCES `appointmentSoftwareDB`.`Appointment` (`idAppointment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserAppointment_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `appointmentSoftwareDB`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointmentSoftwareDB`.`ProviderAppointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `appointmentSoftwareDB`.`ProviderAppointment` ;

CREATE TABLE IF NOT EXISTS `appointmentSoftwareDB`.`ProviderAppointment` (
  `idProviderAppointment` INT NOT NULL,
  `User_idUser` INT NOT NULL,
  `AppointmentSlot_idAppointmentSlot` INT NOT NULL,
  `Appointment_idAppointment` INT NOT NULL,
  PRIMARY KEY (`idProviderAppointment`, `User_idUser`, `AppointmentSlot_idAppointmentSlot`, `Appointment_idAppointment`),
  INDEX `fk_ProviderAppointment_User1_idx` (`User_idUser` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_AppointmentSlot1_idx` (`AppointmentSlot_idAppointmentSlot` ASC) VISIBLE,
  INDEX `fk_ProviderAppointment_Appointment1_idx` (`Appointment_idAppointment` ASC) VISIBLE,
  CONSTRAINT `fk_ProviderAppointment_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `appointmentSoftwareDB`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProviderAppointment_AppointmentSlot1`
    FOREIGN KEY (`AppointmentSlot_idAppointmentSlot`)
    REFERENCES `appointmentSoftwareDB`.`AppointmentSlot` (`idAppointmentSlot`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProviderAppointment_Appointment1`
    FOREIGN KEY (`Appointment_idAppointment`)
    REFERENCES `appointmentSoftwareDB`.`Appointment` (`idAppointment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

