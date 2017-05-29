DROP TABLE IF EXISTS sport; 
CREATE TABLE sport (
 leagueName VARCHAR(20) PRIMARY KEY,
 sport VARCHAR(20)
)ENGINE = INNODB;

DROP TABLE IF EXISTS team; 
CREATE TABLE team (
 teamName VARCHAR(20) PRIMARY KEY,
 league VARCHAR(20),
 FOREIGN KEY (league) REFERENCES sport(leagueName)  
)ENGINE = INNODB;

DROP TABLE IF EXISTS game;
CREATE TABLE game(
    gameID integer PRIMARY KEY,
    home varchar (30),
    guest varchar (30),
    gameTime timestamp
)ENGINE=INNODB;

DROP TABLE IF EXISTS team_game;
CREATE TABLE team_game(
teamname varchar(30) REFERENCES team,
game_ID integer REFERENCES game,
PRIMARY KEY(teamname, game_ID)
)ENGINE=INNODB;

DROP TABLE IF EXISTS logins;
CREATE TABLE logins (
	login_id integer AUTO_INCREMENT PRIMARY KEY,
	time_of_login timestamp,
	time_of_logout timestamp,
	userName VARCHAR(20),
	loginTimes integer DEFAULT 0,
	logoutTimes integer DEFAULT 0,
	FOREIGN KEY (userName) REFERENCES users(userName)	
)ENGINE = INNODB;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
      userName VARCHAR(20) PRIMARY KEY,
      userType VARCHAR(20),
      salt VARCHAR(20),
      hashed_password VARCHAR(256)
)ENGINE = INNODB;

DROP TABLE IF EXISTS pick;
CREATE TABLE pick (
   pick_id integer AUTO_INCREMENT PRIMARY KEY,
   user_name varchar(20) REFERENCES users(userName),
   leagueName varchar(20) REFERENCES sport(leagueName),
   week integer,
   pick1 varchar(1),
   pick2 varchar(1),
   pick3 varchar(1),
   pick4 varchar(1),
   pick5 varchar(1)
)ENGINE = INNODB;
