CREATE TABLE USER (
    userID int NOT NULL AUTO_INCREMENT,
    phoneNum varchar (10) NOT NULL,
    firstName VARCHAR (50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    PRIMARY KEY (userID)
) ;

CREATE TABLE SONG (
    songID int NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    bandArtist varchar (50) NOT NULL,
    PRIMARY KEY (songID)
);

CREATE TABLE  FILE(
    fileID int NOT NULL AUTO_INCREMENT,
    songID int NOT NULL,
    version varchar(50),
    PRIMARY KEY (fileId),
    FOREIGN KEY (songID) REFERENCES SONG (songID)
);

CREATE TABLE CONTRIBUTOR (
    contributorID int  NOT NULL AUTO_INCREMENT,
    contributorName VARCHAR(50) NOT NULL,
    PRIMARY KEY(contributorID)
);

CREATE TABLE SELECTS (
    timeDate DATETIME NOT NULL,
    amount float,
    userID int NOT NULL,
    fileID int NOT NULL,
    PRIMARY KEY (timeDate, userID),
    FOREIGN KEY (fileID) references FILE (fileID),
    FOREIGN KEY (userID) references USER (userID)
);

CREATE TABLE TYPECONTRIBUTOR (
    typeID int NOT NULL AUTO_INCREMENT,
    contribution VARCHAR (50) NOT NULL,
    songID int NOT NULL,
    contributorID int NOT NULL,
    PRIMARY KEY (typeID),
    FOREIGN KEY (songID) references SONG (songID),
    FOREIGN KEY (contributorID) references CONTRIBUTOR (contributorID)
) ;