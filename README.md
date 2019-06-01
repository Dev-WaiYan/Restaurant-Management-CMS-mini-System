# Restaurant-Management-CMS-mini-System
This is not big CMS system but you can improve high level projects from this. Because it has simple backend code for server side and good web responsive design. We believe it will give good support you if you find to make simple mini Restaurant-Management-CMS system. This is developed by Code Fluid-TeamCF. Our website is http://codefluid.dx.am/ and you can check this to more sample projects.

## IMPORTANT

>_You will have error when you run this project this is because you have no correct MYSQL database for this project. Solution is please run the following mysql-command in your mysql._

>_When you finish this, it will solve your problem._

#### Creating "myrestaurant" database
#### Copy from below line.

```mysql
CREATE DATABASE myrestaurant CHARACTER SET utf8 COLLATE utf8_general_ci;

use myrestaurant;

create table adminData(
	id int not null auto_increment, 
	username varchar(50) not null,
	password varchar(50) not null,
	primary key(id) 
);

insert into adminData(
	username,password)
	values(
	"admin","admin") ;

create table booking(
	id int not null auto_increment,
	customerName varchar(100) not null,
	email varchar(100) not null,
	phone varchar(25) not null,
	date varchar(25) not null,
	time varchar(10) not null,
	timePartition varchar(4) not null,
	tables int not null,
	primary key(id)
);

create table menu(
	id int not null auto_increment,
	menu varchar(100) not null,
	price varchar(10) not null,
	img varchar(255) not null,
	primary key(id)
);
