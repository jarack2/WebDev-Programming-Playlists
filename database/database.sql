 create database progplay;
 use progplay;

CREATE TABLE Users ( 
  ID int NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  Email varchar(255) NOT NULL UNIQUE, 
  Username varchar(64) NOT NULL UNIQUE, 
  Password varchar(255) NOT NULL 
);

CREATE TABLE Videos (
  ID int NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  Name varchar(32) NOT NULL,
  Link varchar(255) NOT NULL
);

CREATE TABLE Favorites (
  UserID int NOT NULL,
  VideoID int NOT NULL,
  FOREIGN KEY (VideoID) REFERENCES Videos(ID),
  FOREIGN KEY (UserID) REFERENCES User(ID)
);

CREATE TABLE Playlists (
  Topic varchar(255) NOT NULL,
  VideoID int NOT NULL,
  FOREIGN KEY (VideoID) REFERENCES Videos(ID)
);