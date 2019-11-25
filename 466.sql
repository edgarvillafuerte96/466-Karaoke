CREATE TABLE USERS (
    phoneNum INT NOT NULL PRIMARY KEY,
    firstName VARCHAR (15) NOT NULL,
    lastName VARCHAR(15) NOT NULL,
    timeDate DATETIME,
    FileId int
) ;

CREATE TABLE  FILES (
    fileId int NOT NULL AUTO_INCREMENT,
    timeDate DATETIME,
    songID int NOT NULL,
    PRIMARY KEY (fileId)
)  ;

CREATE TABLE SONG (
    songID int AUTO_INCREMENT NOT NULL,
    title VARCHAR(25) NOT NULL,
    bandArtist varchar (25) NOT NULL,
    fileId int NOT NULL,
    PRIMARY KEY (songID)
);

CREATE TABLE CONTRIBUTOR (
    contributorId int AUTO_INCREMENT NOT NULL,
    fName VARCHAR(25) NOT NULL,
    PRIMARY KEY(contributorId),
);

CREATE TABLE SELECTS (
    timeDate DATETIME NOT NULL,
    ammount INT,
    phoneNum INT NOT NULL,
    fileId int NOT NULL,
    PRIMARY KEY (timeDate)
) ;

CREATE TABLE TYPECONTRIBUTOR (
    types VARCHAR (25) NOT NULL,
    songId int NOT NULL,
    contributorId INT NOT NULL,
    PRIMARY KEY (types)
) ;