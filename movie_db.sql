SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `movie_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `movie_db` ;

-- -----------------------------------------------------
-- Table `movie_db`.`Actors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`Actors` (
  `ActorID` INT NOT NULL AUTO_INCREMENT ,
  `ActorFullName` VARCHAR(45) NOT NULL ,
  `ActorNotes` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ActorID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`RoleTypes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`RoleTypes` (
  `RoleTypeID` INT NOT NULL AUTO_INCREMENT ,
  `RoleType` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`RoleTypeID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`FilmGenres`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`FilmGenres` (
  `GenreID` INT NOT NULL AUTO_INCREMENT ,
  `Genre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`GenreID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`FilmCertificates`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`FilmCertificates` (
  `CertificateID` INT NOT NULL AUTO_INCREMENT ,
  `Certificate` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`CertificateID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`FIlmTitles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`FIlmTitles` (
  `FilmTitleID` INT NOT NULL AUTO_INCREMENT ,
  `GenreID` INT NOT NULL ,
  `CertificateID` INT NOT NULL ,
  `FilmTitle` VARCHAR(45) NOT NULL ,
  `FilmStory` VARCHAR(45) NOT NULL ,
  `FilmReleaseDate` DATE NOT NULL ,
  `FIlmDuration` INT NOT NULL ,
  `FilmAdditionalInfo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`FilmTitleID`, `GenreID`, `CertificateID`) ,
  INDEX `fk_FIlmTitles_FilmGenres1_idx` (`GenreID` ASC) ,
  INDEX `fk_FIlmTitles_FilmCertificates1_idx` (`CertificateID` ASC) ,
  CONSTRAINT `fk_FIlmTitles_FilmGenres1`
    FOREIGN KEY (`GenreID` )
    REFERENCES `movie_db`.`FilmGenres` (`GenreID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FIlmTitles_FilmCertificates1`
    FOREIGN KEY (`CertificateID` )
    REFERENCES `movie_db`.`FilmCertificates` (`CertificateID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`FilmsActorRoles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`FilmsActorRoles` (
  `FilmTitleID` INT NOT NULL ,
  `ActorID` INT NOT NULL ,
  `RoleTypeID` INT NOT NULL ,
  `CharacterName` VARCHAR(45) NOT NULL ,
  `CharacterDescriptiom` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`FilmTitleID`, `ActorID`, `RoleTypeID`) ,
  INDEX `fk_FilmsActorRoles_Actors1_idx` (`ActorID` ASC) ,
  INDEX `fk_FilmsActorRoles_RoleTypes1_idx` (`RoleTypeID` ASC) ,
  CONSTRAINT `fk_FilmsActorRoles_FIlmTitles`
    FOREIGN KEY (`FilmTitleID` )
    REFERENCES `movie_db`.`FIlmTitles` (`FilmTitleID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmsActorRoles_Actors1`
    FOREIGN KEY (`ActorID` )
    REFERENCES `movie_db`.`Actors` (`ActorID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmsActorRoles_RoleTypes1`
    FOREIGN KEY (`RoleTypeID` )
    REFERENCES `movie_db`.`RoleTypes` (`RoleTypeID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`Producers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`Producers` (
  `ProducerID` INT NOT NULL AUTO_INCREMENT ,
  `ProducerName` VARCHAR(45) NOT NULL ,
  `ContactEmailAddress` VARCHAR(45) NOT NULL ,
  `Website` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ProducerID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movie_db`.`FIlmTitlesProducers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `movie_db`.`FIlmTitlesProducers` (
  `Producers_ProducerID` INT NOT NULL ,
  `FIlmTitles_FilmTitleID` INT NOT NULL ,
  PRIMARY KEY (`Producers_ProducerID`, `FIlmTitles_FilmTitleID`) ,
  INDEX `fk_FIlmTitles_has_Producers_Producers1_idx` (`Producers_ProducerID` ASC) ,
  INDEX `fk_FIlmTitles_has_Producers_FIlmTitles1_idx` (`FIlmTitles_FilmTitleID` ASC) ,
  CONSTRAINT `fk_FIlmTitles_has_Producers_FIlmTitles1`
    FOREIGN KEY (`FIlmTitles_FilmTitleID` )
    REFERENCES `movie_db`.`FIlmTitles` (`FilmTitleID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FIlmTitles_has_Producers_Producers1`
    FOREIGN KEY (`Producers_ProducerID` )
    REFERENCES `movie_db`.`Producers` (`ProducerID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `movie_db` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
