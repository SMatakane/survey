DROP TABLE IF EXISTS Likes;
DROP TABLE IF EXISTS Favorites;
DROP TABLE IF EXISTS Personal;

CREATE TABLE Personal (
  id int(10) NOT NULL AUTO_INCREMENT,
  surname varchar(30) NOT NULL,
  firstname varchar(30) NOT NULL,
  contacts varchar(20) NOT NULL,
  survey_date date,
  age int(2) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Favorites (
  fav_id int(10) NOT NULL,
  favorites varchar(50) NOT NULL,
  FOREIGN KEY (fav_id) REFERENCES Personal(id)
);

CREATE TABLE Likes (
  likes_id int(10) NOT NULL,
  eat int(1) NOT NULL,
  movies int(1) NOT NULL,
  tv int(1) NOT NULL,
  radio int(1) NOT NULL,
  PRIMARY KEY(likes_id),
  FOREIGN KEY (likes_id) REFERENCES Personal(id)
);

INSERT INTO Personal VALUES (1,'Matakane','Sipho','0716231236',20230531,25);
INSERT INTO Favorites VALUES (1,'Chicken stir fry');
INSERT INTO Likes VALUES (1,5,4,3,5);
