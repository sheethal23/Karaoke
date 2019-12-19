
CREATE TABLE Song (SongId int auto_increment PRIMARY KEY,
		   Title varchar(255),
		   NameoftheBand varchar(255));

CREATE TABLE Karaoke(KaraokeFileId int auto_increment PRIMARY KEY,
		     Version float(3),
		     SongId int,
		     FOREIGN KEY(SongId) REFERENCES Song(SongId));

CREATE TABLE People(UserID int auto_increment PRIMARY KEY ,
		    Password varchar(8),
		    Name VARCHAR(100), 
		    PhoneNumber int(10));

CREATE TABLE Contributor(ContributorId int auto_increment PRIMARY KEY,
			 Name VARCHAR(100),
			 Role VARCHAR(100));

CREATE TABLE SongContributor(Id SERIAL PRIMARY KEY,
			     SongId integer,
			     ContributorId integer, 
			     FOREIGN KEY(ContributorId) REFERENCES Contributor(ContributorId),
			     FOREIGN KEY(SongId) REFERENCES Song(SongId)); 

CREATE TABLE SongSelection(Id SERIAL PRIMARY KEY,
			   KaraokeFileId integer,
			   Time timestamp,
			   AmountPaid float,
			   IsPlayed int(1),
			   FOREIGN KEY(KaraokeFileId) REFERENCES Karaoke(KaraokeFileId));



insert into Song (Title,NameOfTheBand) values('Wild Love','James Bay');
insert into Song (Title,NameOfTheBand) values('Perferct Duet','Ed Sheeran,Beyonce');
insert into Song (Title,NameOfTheBand) values('Chemicals','Dean Lewis');
insert into Song (Title,NameOfTheBand) values('Tell Me','Sabrina Claudio');
insert into Song (Title,NameOfTheBand) values('Closer','The ChainSmokers');
insert into Song (Title,NameOfTheBand) values('Havana','Camila Cabello');
insert into Song (Title,NameOfTheBand) values('Cheap Thrills','Sia');


insert into Karaoke (Version,SongId) values('Cover',1),
('Reprise',1),
('POP',1),
('Cover',2),
('Reprise',2),
('Cover',3),
('POP',3),
('Instrumental Version with Back Vocals',3),
('Cover',3),
('POP',3),
('Instrumental Version without Back Vocals',4),
('Cover',4);



insert into People (Username,Password,Name,PhoneNumber) values ('Anushac','Anushac','Anusha Chanduri',3133676072),('SruthiM','SruthiM','Sruthi Myneni',345823901),('SnehaK','SnehaK','Sneha Konatham',2567890987),('GopalaU','GopalaU','Gopala Sai Uppalapati',901278290);



insert into Contibutor(ContibutorName,ContributorId,Role) values('Ray',1,'Singer');

insert into Contibutor(ContibutorName,ContributorId,Role) values('Ron',2,'Singer');

insert into Contibutor(ContibutorName,ContributorId,Role) values('Jim',3,'Singer');

insert into Contibutor(ContibutorName,ContributorId,Role) values('Jhon',4,'Guitarist');

insert into Contibutor(ContibutorName,ContributorId,Role) values('Josh',5,'Singer');

insert into Contibutor(ContibutorName,ContributorId,Role) values('Martin',6,'Singer');

insert into Contibutor(ContibutorName,ContributorId,Role) values('Joy',7,'Guitarist');





insert into SongContributor(SongId, ContributorId) values(2,5);
insert into SongContributor(SongId, ContributorId) values(1,6);
insert into SongContributor(SongId, ContributorId) values(3,4);
insert into SongContributor(SongId, ContributorId) values(4,3);
insert into SongContributor(SongId, ContributorId) values(5,2);
insert into SongContributor(SongId, ContributorId) values(6,1);






