create table branch (
  LOCATION VARCHAR(40),
  CITY VARCHAR(40),
  PRIMARY KEY (LOCATION, CITY));
  
create table VehicleType (
  VTNAME VARCHAR(40),
  FEATURES VARCHAR(40),
  WRATE numeric(10,2),
  DRATE numeric(10,2),
  HRATE numeric(10,2),
  WIRATE numeric(10,2),
  DIRATE numeric(10,2),
  HIRATE numeric(10,2),
  KRATE numeric(10,2),
  PRIMARY KEY (VTNAME));
  
create table Vehicle(
  VID NUMBER(13), #not sure how many digits i need to keep for this
  VLICENSE NUMBER(13), #not sure how many digits i need to keep for this
  MAKE VARCHAR(40),
  MODEL VARCHAR(40),
  YEAR NUMBER(13),
  COLOR VARCHAR(40),
  ODOMETER numeric(10,2),
  STATUS VARCHAR(40),
  VTNAME VARCHAR(40),
  LOCATION VARCHAR(40),
  CITY VARCHAR(40),
  PRIMARY KEY (VID),
  FOREIGN KEY (VTNAME) REFERENCES VehicleType,
  FOREIGN KEY (LOCATION, CITY) REFERENCES branch
  );

create table Equipment(
  EID NUMBER(13), #not sure how many digits i need to keep for this
  ETNAME VARCHAR(40),
  VTNAME VARCHAR(40),
  STATUS VARCHAR(40),
  LOCATION VARCHAR(40),
  CITY VARCHAR(40),
  DRATE numeric(10,2),
  HRATE numeric(10,2),
  PRIMARY KEY (EID),
  FOREIGN KEY (VTNAME) REFERENCES Vehicle,
  FOREIGN KEY (LOCATION, CITY) REFERENCES branch
  );
  
create table Customer(
  DLICENSE NUMBER(13), #not sure how many digits i need to keep for this
  CELLPHONE NUMBER(13),
  NAME VARCHAR(40),
  ADDRESS VARCHAR(40),
  POINTS NUMBER(13)
  FEES numeric(10,2),
  PRIMARY KEY (DLICENSE)
  );
  
create table Reservations(
  CONFNO NUMBER(13), #not sure how many digits i need to keep for this
  VTNAME VARCHAR(40),
  DLICENSE VARCHAR(40),
  FROMDATE date,
  FROMTIME TIME [ ( p ) ],
  TODATE date,
  TOTIME TIME [ ( p ) ],
  HRATE numeric(10,2),
  EID NUMBER(13),
  PRIMARY KEY (EID),
  FOREIGN KEY (VTNAME) REFERENCES Vehicle,
  FOREIGN KEY (DLICENSE) REFERENCES Customer
  FOREIGN KEY (EID) REFERENCES Equipment
  );
  
create table Rentals(
  RID NUMBER(13), #not sure how many digits i need to keep for this
  VID NUMBER(13),
  EID NUMBER(13),
  DLICENSE VARCHAR(40),
  FROMDATE date,
  FROMTIME TIME [ ( p ) ],
  TODATE date,
  TOTIME TIME [ ( p ) ],
  ODOMETER numeric(10,2),
  CARDNAME VARCHAR(40),
  CARDNO NUMBER(13),
  EXPDATE date,
  CONFNO NUMBER(13),
  PRIMARY KEY (RID),
  FOREIGN KEY (VID) REFERENCES Vehicle,
  FOREIGN KEY (DLICENSE) REFERENCES Customer,
  FOREIGN KEY (CONFNO) REFERENCES Reservations
  );
  
create table Returns(
  RID NUMBER(13), #not sure how many digits i need to keep for this
  DATE date,
  TIME TIME [ ( p ) ],
  ODOMETER numeric(10,2),
  FULLTANK VARCHAR(40),
  VALUE NUMBER(13),
  FOREIGN KEY (RID) REFERENCES Rentals
  );  

  
  