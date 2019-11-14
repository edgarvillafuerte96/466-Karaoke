Create DATABASE KARAOKE;
USE KARAOKE;

CREATE TABLE USER (
    phoneNum INT NOT NULL,
    firstName VARCHAR (15),
    lastName VARCHAR(15),
    timeDate DATETIME,
    FileId int ,
    PRIMARY KEY (phoneNum),
    FOREIGN KEY (timeDate) REFERENCES SELECTS (timeDate),
    FOREIGN KEY (fileId) References FILES(fileId)
);

CREATE TABLE  FILES (
    fileId int NOT NULL AUTO_INCREMENT,
    timeDate DATETIME NOT NULL,
    songID int NOT NULL,
    PRIMARY KEY (fileId),
    FOREIGN KEY (timeDate) REFERENCES SELECTS (timeDate),
    FOREIGN KEY (songID) REFERENCES SONG (songID)
);

CREATE TABLE SONG (
    songID int AUTO_INCREMENT NOT NULL,
    title VARCHAR(25),
    bandArtist varchar (25),
);