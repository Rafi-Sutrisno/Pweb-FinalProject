CREATE DATABASE movie_theatre;
use movie_theatre;

CREATE TABLE City (
  CI_ID int(11) NOT NULL AUTO_INCREMENT,
  CI_Name varchar(25) NOT NULL,

  primary key (CI_ID)
);

CREATE TABLE Bioskop (
  B_ID int(11) NOT NULL AUTO_INCREMENT,
  B_Name varchar(255) NOT NULL,
  B_Address varchar(255) NOT NULL,
  B_Phone varchar(12) NOT NULL,
  City_CI_ID int(11) NOT NULL,
  primary key (B_ID),
  foreign key (City_CI_ID) references City(CI_ID)
);

CREATE TABLE Movies (
  M_ID int(11) NOT NULL AUTO_INCREMENT,
  M_Title varchar(255) NOT NULL,
  M_Description varchar(255) NOT NULL,
  M_Duration varchar(20) NOT NULL,
  M_ReleaseDate Date NOT NULL,
  primary key (M_ID)
);

CREATE TABLE Genre (
  G_ID int(11) NOT NULL AUTO_INCREMENT,
  G_Name varchar(50) NOT NULL,
  primary key (G_ID)
);

CREATE TABLE Characters (
  CH_ID int(11) NOT NULL AUTO_INCREMENT,
  CH_Name varchar(255) NOT NULL,
  primary key (CH_ID)
);

CREATE TABLE Lang (
  L_ID int(11) NOT NULL AUTO_INCREMENT,
  L_Name varchar(255) NOT NULL,
  primary key (L_ID)
);

CREATE TABLE User (
  U_ID int(11) NOT NULL AUTO_INCREMENT,
  U_Name varchar(255) NOT NULL,
  U_Email varchar(255) NOT NULL,
  U_Password varchar(255) NOT NULL,
  U_Role char(4) NOT NULL,
  primary key (U_ID)
);

CREATE TABLE Detail_Bioskop_Movies (
  DBM_ID INT NOT NULL AUTO_INCREMENT,
  Bioskop_B_ID int(11) NOT NULL,
  Movies_M_ID int(11) NOT NULL,
  
  primary key (DBM_ID),
  foreign key (Bioskop_B_ID) references Bioskop(B_ID),
  foreign key (Movies_M_ID) references Movies(M_ID)
);

CREATE TABLE Detail_Movies_Characters (
  DMC_ID INT NOT NULL AUTO_INCREMENT,
  Characters_CH_ID int(11) NOT NULL,
  Movies_M_ID int(11) NOT NULL,
  
  primary key (DMC_ID),
  foreign key (Characters_CH_ID) references Characters(CH_ID),
  foreign key (Movies_M_ID) references Movies(M_ID)
);

CREATE TABLE Detail_Movies_Genre (
  DMG_ID INT NOT NULL AUTO_INCREMENT,
  Genre_G_ID int(11) NOT NULL,
  Movies_M_ID int(11) NOT NULL,
  
  primary key (DMG_ID),
  foreign key (Genre_G_ID) references Genre(G_ID),
  foreign key (Movies_M_ID) references Movies(M_ID)
);

CREATE TABLE Detail_Movies_Lang (
  DML_ID INT NOT NULL AUTO_INCREMENT,
  Lang_L_ID int(11) NOT NULL,
  Movies_M_ID int(11) NOT NULL,
  
  primary key (DML_ID),
  foreign key (Lang_L_ID) references Lang(L_ID),
  foreign key (Movies_M_ID) references Movies(M_ID)
);

CREATE TABLE Theatre (
  T_ID int(11) NOT NULL AUTO_INCREMENT,
  T_Name varchar(20) NOT NULL,
  T_Type varchar(25) NOT NULL,
  T_Num_of_seat int(11) NOT NULL,
  T_Price decimal(10) NOT NULL,
  Movies_M_ID int(11) NOT NULL,
  Bioskop_B_ID int(11) NOT NULL,

  primary key (T_ID),
  foreign key (Movies_M_ID) references Movies(M_ID),
  foreign key (Bioskop_B_ID) references Bioskop(B_ID)
);

CREATE TABLE Transaksi (
  TR_ID int(11) NOT NULL AUTO_INCREMENT,
  TR_MetodeBayar varchar(20) NOT NULL,
  TR_Tglbeli date NOT NULL,
  TR_Num_of_tickets int(11) NOT NULL,
  Movies_M_ID int(11) NOT NULL,
  Theatre_T_ID int(11) NOT NULL,
  User_U_ID int(11) NOT NULL,

  primary key (TR_ID),
  foreign key (Movies_M_ID) references Movies(M_ID),
  foreign key (Theatre_T_ID) references Theatre(T_ID),
  foreign key (User_U_ID) references User(U_ID)
);