CREATE TABLE USER (
    phoneNum varchar (10) NOT NULL,
    name VARCHAR (50) NOT NULL,
    PRIMARY KEY (phoneNum)
) ;

CREATE TABLE SONG (
    songID int NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    bandArtist varchar (50) NOT NULL,
    PRIMARY KEY (songID)
);

CREATE TABLE  FILES(
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
    phoneNum varchar (10) NOT NULL,
    fileID int NOT NULL,
    PRIMARY KEY (timeDate, phoneNum),
    FOREIGN KEY (fileID) references FILES (fileID),
    FOREIGN KEY (phoneNum) references USER (phoneNum)
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
