create table students (
	studentID int not null AUTO_INCREMENT,
	name varchar(50) not null,
	address varchar(100) not null,
	phone varchar(20)not null,
	level varchar(3) not null,
	primary key (studentID)
);

create table teachers (
	teacherID int not null AUTO_INCREMENT,
	name varchar(50) not null,
	address varchar(100) not null,
	phone varchar(20) not null,
	subject varchar(20) not null,
	primary key (teacherID)
);

create table sessions (
	sessionID int not null auto_increment,
	session_date date,
	studentID int,
	teacherID int,
	primary key (sessionID),
	foreign key (studentID) references students(studentID),
	foreign key (teacherID) references teachers(teacherID)	
);

insert into students (name, address, phone, level) values
('Dani Rahmat', 'Jl. Mawar No.5', '089234567810', 'SMA'),
('Mutia Putri', 'Jl. Melati No.1', '0852445631908', 'SMA'),
('Kevin Suryana', 'Jl. Soka No.10', '087655543210', 'SMP'),
('Ranita Alexandra', 'Jl. Anggrek No.3', '0865421098', 'SD'),
('Mahesa Putra', 'Jl. Anggrek No.5', '08923465710', 'SMP');

insert into teachers (name, address, phone, subject) values
('Ari Ibrahim', 'Jl. Mangga No.7', '085332167590', 'Math'),
('Tika Kartika', 'Jl. Lengkeng No.9', '08334567810', 'Physics'),
('Sofia Wulandari', 'Jl. Durian No.5', '0855432896541', 'Biology'),
('Arisa Maharani', 'Jl. Durian No.8', '0899876543212', 'Chemistry'),
('Muhammad Putra', 'Jl. Manggis No.1', '088765431109', 'Sciences');


insert into sessions (session_date, studentID, teacherID) values
('2023-12-03', 1, 1),
('2023-11-10', 2, 3);


