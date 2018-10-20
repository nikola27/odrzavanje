drop database if exists mojprimjer1;

create database mojprimjer1 default character set utf8;

# za byethost
# alter database b24_22616270_odrzavanje18 default character set utf8;

#c:\xampp\mysql\bin\mysql -uedunova -pedunova --default_character_set=utf8 < C:\xampp\htdocs\Odrzavanje\mojabaza1.sql
use mojprimjer1;
#use b24_22616270_odrzavanje18


create table operater(
sifra int not null primary key auto_increment,
email varchar(50) not null,
lozinka varchar(255) not null,
ime varchar(50) not null,
prezime varchar(50) not null,
uloga varchar(50) not null,
sessionid char(32),
odobren boolean default false
);


insert into operater (email,lozinka,uloga,ime,prezime,odobren)  
values ('nikola.s89@hotmail.com','$2y$12$q1/lO30GSBxaBmR9jqwggOpgWW3D6g6XnthDYup/RrxeABNop6ouu',
'admin','Nikola','Šarić',true);


insert into operater (email,lozinka,uloga,ime,prezime,odobren)  
values ('voodoo@gmail.com','$2y$12$SutwYpX/56vRh7R0Ce7zOOrt2j8zO2s9cKhcttJn77EEU/gBfM8s2',
'korisnik','Dominik','Vidović',true);

insert into operater (email,lozinka,uloga,ime,prezime,odobren)  
values ('saricnikola27@gmail.com','$2y$12$PHhxbsk683g9S/ooOMJL1.n3r5knA6CYjX3e.ntwLyOFUG1JJQ.dG',
'korisnik','Boris','Ivoković',true);

create table korisnik(
sifra int not null primary key auto_increment,
ime varchar(20) not null,
prezime varchar(20) not null,
lozinka char(32) not null,
oib char(11) not null,
telefon varchar(20) not null,
adresa varchar(50) not null,
email varchar(50) not null
);

insert into korisnik(sifra, ime, prezime,lozinka, oib, telefon,adresa,email) values
(null, 'Goran', 'Kvas', '0d86eed65f38608df63d6e188483ff67', '36430061999','0981724455', 'Hrvatskih kraljeva 1, Vinkovci', 'gogac@gmail.com'),
(null, 'Ivan', 'Galić', '1717a1b1a925568692afd63100331023', '20779865093','0989566293', 'M.J. Zagorke 21, Vinkovci', 'ivan777@gmail.com'),
(null, 'Dominik', 'Vidović', 'b4aa2b48dbea8988e09addd46b4cbf38', '60208620513','0915629567', 'Zagrebačka 3, Vinkovci', 'voodoo@gmail.com'),
(null, 'Boris', 'Ivoković','b', '55193019424','0977764656', 'Zagrebačka 25, Vinkovci', 'saricnikola27@gmail.com'),
(null, 'Nikola', 'Šarić', 'n', '85348629651','0989502219', 'Bognerova 15, Vinkovci', 'nikola.s89@hotmail.com');

create table kvar(
sifra int not null primary key auto_increment,
naziv varchar(100) not null,
opis varchar(200) not null,
kategorija int not null,
datum datetime not null
);


insert into kvar(sifra, naziv, opis, kategorija, datum)values
(null, 'Kvar na bojleru', 'Nema tople vode',1,'2016-05-12' ), 
(null, 'Curi voda', 'Slavina u kuhinji neispravna',2,'2016-05-14' ),
(null, 'Razbijeno staklo', 'Napuklo staklo na vratima',3,'2017-07-05' ),
(null, 'Vlaga na zidu', 'Na zidu između kupatila i sobe pojavila se vlaga ',4,'2017-06-25');



create table kategorija(
sifra int not null primary key auto_increment, 
naziv varchar(50) not null
);

insert into kategorija(sifra, naziv)values
(null, 'Elektroinstalaterski popravci'),
(null, 'Vodoinstalaterski popravci'),
(null, 'Staklarski popravci'),
(null, 'Unutarnji građevinski popravci');


create table tvrtka(
sifra int not null primary key auto_increment,
naziv varchar(30) not null,
adresa varchar(50) not null,
oib char(11) not null,
telefon varchar(20) not null,
email varchar(50) not null
);

insert into tvrtka(sifra, naziv, adresa, oib, telefon, email)values
(null, 'Staklar Marko', 'Marka Marulica 15, Vinkovci','08741598419', '032-358-359','staklo@gmail.com'),
(null, 'Vodorad', 'bana Jelačića 5, Vinkovci','18211641978', '032-845-554','vodorad@gmail.com'),
(null, 'Elemont', 'Zalužje 4, Vinkovci','14743644268', '032-554-789','elemont@gmail.com'),
(null, 'Suhorad', 'Zalužje 55, Vinkovci','68604619324', '032-456-654','suhorad@gmail.com');


create table korisnikkvar(
korisnik int not null,
kvar int not null,
datumkvara datetime not null
);

insert into korisnikkvar(korisnik,kvar,datumkvara)values
(1,1,'2016-05-12'),
(2,2,'2016-05-14'),
(3,3,'2017-07-05'),
(4,4,'2017-06-25');

create table kvartvrtka(
kvar int not null,
tvrtka int not null
);

insert into kvartvrtka(kvar, tvrtka)values
(1,1),
(2,2),
(3,3),
(4,3);



alter table kvar add foreign key (kategorija) references kategorija(sifra);

alter table korisnikkvar add foreign key (korisnik) references korisnik(sifra);
alter table korisnikkvar add foreign key (kvar) references kvar(sifra);


alter table kvartvrtka add foreign key (kvar) references kvar(sifra);
alter table kvartvrtka add foreign key (tvrtka) references tvrtka(sifra);

select 'Sve uspjesno odradeno' as poruka;












