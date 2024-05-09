 create database NBA;
use NBA;

#drop database NBA; 

create table TEAM (name varchar(225), location varchar(255), picks varchar(255), coach varchar(255),
primary key(name)); 

#has to be USER_INFO bc SQL wont accept USER as a table name
create table USER_INFO (user_id char(5), username varchar(255), dob date,
primary key(user_id));

create table PLAYER (player_name varchar(255), height double, position varchar(255), salary varchar(255), pts double, rbg double, apg double, fg_pr double, team_name varchar(255),
foreign key(team_name) REFERENCES TEAM(name), primary key(player_name));
 
#double for decimals/percentages
#salary = annual

#adding foreign keys to already created tables
alter table USER_INFO add (fav_pl varchar(255), fav_team varchar(255),
foreign key(fav_pl) REFERENCES PLAYER(player_name), foreign key(fav_team) REFERENCES TEAM(name)); 


#creating rest of the tables
create table INJURY (muscle varchar(255), current_status varchar(255), injury_date date, player_name varchar(255),
foreign key(player_name) REFERENCES PLAYER(player_name),
primary key(muscle, player_name)); 

create table FAVORITES_PLAYER( user_id char(5), player_name varchar(225), 
foreign key(user_id) REFERENCES USER_INFO(user_id),
foreign key(player_name) REFERENCES PLAYER(player_name),
primary key(user_id, player_name)); 

create table FAVRITES_TEAM( user_id char(5), team_name varchar(225), 
foreign key(user_id) REFERENCES USER_INFO(user_id),
foreign key(team_name) REFERENCES TEAM(name),
primary key(user_id, team_name)); 


#DATA ENTRY:
#made up picks number
 insert into TEAM values 
("Knicks", "NY", 1, "Tom Thibodeau"), 
("Lakers", "CA", 28, "Frank Vogel"),
("Heat", "FL", 14, "Erik Spoelstra"),
("Nets", "Brooklyn", 17, "Jordi Fernández"),
("Celtics", "Boston", 11, "Joe Mazulla"),
("76ers", "Philadelphia", 15, "Nick Nurse"),
("Raptors", "Toronto", 14, "Darko Rajaković");


 insert into PLAYER values
 ("J.Brunson", 6.2, "PG", 26000000, 27.8, 3.6, 6.6, 47.5, "Knicks"),
 ("D.DiVincenzo", 6.4, "SG", 11717500, 15.2, 3.6, 2.6, 44.0, "Knicks"),
 ("J.Hart", 6.4, "SG", 12640000, 8.9, 8.2, 4.0, 41.8, "Knicks"),

 ("M.McBride", 6.1, "PG", 43000000, 8.2, 1.3, 1.6, 45.8, "Knicks"),
 ("LeBron James", 6.9, "SF", 39204100, 25.8, 7.9, 10.2, 51.0, "Lakers"),
("Anthony Davis", 6.10, "PF", 32742000, 22.5, 9.3, 3.2, 50.3, "Lakers"),
("Russell Westbrook", 6.3, "PG", 41000000, 22.0, 7.9, 8.4, 44.0, "Lakers"),
("Kyle Kuzma", 6.9, "PF", 13000000, 16.1, 6.1, 1.9, 45.6, "Lakers"),
("Dennis Schroder", 6.1, "PG", 15500000, 15.4, 3.5, 5.8, 43.7, "Lakers"),
("Jimmy Butler", 6.7, "SF", 34210975, 21.5, 6.9, 7.1, 47.0, "Heat"),
("Bam Adebayo", 6.9, "C", 28103550, 18.7, 10.4, 5.4, 57.0, "Heat"),
("Tyler Herro", 6.5, "SG", 4020000, 15.1, 4.5, 3.7, 43.5, "Heat"),
("Duncan Robinson", 6.7, "SF", 15300000, 13.5, 3.8, 1.4, 40.8, "Heat"),
("Kyle Lowry", 6.0, "PG", 28000000, 17.2, 5.4, 7.3, 42.7, "Heat"),
 ("J.Toppin", 6.8, "PF", 759245, 1.4,0.8,0.3,55.6,"Knicks"),
 ("P.Achiuwa", 6.8, "PF", 4379526, 7.6, 6.6, 1.3, 50.1, "Knicks"),
 ("O.Anunoby", 6.7, "SF", 18642857, 14.7, 4.2, 2.1, 48.8, "Knicks"),
 ("J.Randle", 6.8, "PF", 28226880, 24.0, 9.2, 5.0, 47.2, "Knicks"),
 ("M.Robinson", 7.0, "C", 15651818, 5.6, 8.5, 0.6, 57.5, "Knicks"),
 ("J.Tatum", 6.8, "SF", 32600060, 26.9, 9.1, 4.9, 47.1, "Celtics"),
 ("J.Holiday", 6.4, "PG", 36861707, 12.5, 5.4, 4.8, 48.0, "Celtics"),
 ("J.Brown", 6.6, "SG", 31830357, 23.0, 5.5, 3.6, 49.9, "Celtics"),
 ("K.Porzingis", 7.2, "C", 36016200, 20.1, 7.2, 2.0, 51.6, "Celtics"),
 ("D.White", 6.4, "SG", 18357143, 15.2, 4.2, 5.2, 46.1, "Celtics"),
 ("P.Pritchard", 6.1, "PG", 4037277, 9.6, 3.2, 3.4, 46.8, "Celtics"),
 ("A.Horford", 6.9, "PF", 10000000, 8.6, 6.4, 2.6, 51.1, "Celtics"),
 ("S.Hauser", 6.7, "SF", 1927896, 9.0, 3.5, 1.0, 44.6, "Celtics"),
 ("D.Whitehead", 6.6, "SG", 2966040, 1.5, 2.0, 1.5, 20.0, "Nets"),
 ("M.Bridges", 6.6, "SG", 21700000, 19.6, 4.5, 3.6, 43.6, "Nets"),
 ("B.Simmons", 6.10, "PG", 37893408, 6.1, 7.9, 5.7, 58.1, "Nets"),
 ("C.Johnson", 6.8, "SF", 25679348, 13.4, 4.3, 2.4, 44.6, "Nets"),
 ("D.Smith Jr.", 6.3, "PG", 2528233, 6.6, 2.9, 3.6, 43.5, "Nets"),
 ("L.Walker IV", 6.4, "PG", 2346614, 9.7, 2.2, 1.3, 42.3, "Nets"),
 ( "T.Watford", 6.8, "SF", 2019706, 6.9, 3.1, 1.3, 52.7, "Nets"),
 ( "N.Claxton", 6.11, "C", 9625000, 11.8, 9.9, 2.1, 62.9, "Nets"),
 ("T.Maxey", 6.2, "PG", 4343920, 20.3, 3.7, 6.2, 45.0, "76ers"),
 ("J.Embiid", 7.0, "C", 47607350, 34.7, 11.0, 5.6, 52.9, "76ers"),
 ("T.Harris", 6.8, "PF", 39270150, 17.1, 6.5, 3.1, 48.7, "76ers"),
 ("B.Hield", 6.4, "SG", 19279841, 12.2, 3.2, 3.0, 42.6, "76ers"),
 ("N.Batum", 6.8, "SF", 11710818, 5.5, 4.2, 2.2, 45.6, "76ers"),
 ("R.Covington", 6.7, "SF", 11692308, 4.5, 3.4, 0.7, 44.2, "76ers"),
 ("D.Melton", 6.3, "SG", 8000000, 11.1, 3.7, 3.0, 44.2, "76ers"),
 ("P.Reed", 6.9, "PF", 7723000, 7.3, 6.0, 1.3, 44.2, "76ers"),
 ("K.Oubre", 6.7, "SF", 2891467, 15.4, 5.0, 1.5, 44.2, "76ers"); 



 


 SELECT * from PLAYER; #Shows filled out table for all info under PLAYER table
 
insert into USER_INFO values
("00001", "user1", "1999-01-01", "J.Brunson", "Knicks"),
("00003", "heatWave", "1995-07-24", "Kyle Kuzma", "Heat"),
("00004", "dunkinDuncan", "1990-03-09", "Dennis Schroder", "Heat"),
("00005", "adFan", "1986-11-01","Anthony Davis", "Lakers"),
("00006", "tylerScores", "1998-05-25", "Bam Adebayo", "Heat"),
("00007", "victorVictory", "1993-04-04", "Kyle Lowry", "Heat");

SELECT * from USER_INFO; 

#foreign key constraint / error if I inserted the info in bulk, had to do them individually
INSERT INTO INJURY VALUES
("Hamstring", "Recovering", "2024-03-15", "LeBron James");
INSERT INTO INJURY VALUES
("Ankle", "Out", "2024-02-20", "Anthony Davis");
INSERT INTO INJURY VALUES
("Knee", "Day-to-day", "2024-03-10", "Jimmy Butler");
INSERT INTO INJURY VALUES
("Shoulder", "Out", "2024-01-05", "Bam Adebayo");
INSERT INTO INJURY VALUES
("Groin", "Recovering", "2024-03-22", "Tyler Herro");
INSERT INTO INJURY VALUES
("Calf", "Day-to-day", "2024-02-25", "Duncan Robinson");
INSERT INTO INJURY VALUES
("Back", "Out", "2024-03-01", "Kyle Lowry");







