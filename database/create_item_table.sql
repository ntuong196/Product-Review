drop table if exists item;
create table item (
        id integer not null primary key not null,
        summary varchar(80) not null,
        manufacturer varchar(80) not null
        
);
insert into item values (1, "Canon PowerShot S110","Canon");
insert into item values (2, "Canon EOS 700D","Canon");
insert into item values (3, "Canon EOS 7D","Canon");
insert into item values (4, "Canon EOS 6D","Canon");
insert into item values (5, "Fujifilm X-Pro1","Fuji");

create table review (
        id integer not null primary key not null,
        client varchar(80) not null,
        review text default ‘’
);

insert into review values (1, "richard","Excellent pocket camera.");
insert into review values (2, "richard","Excellent entry-level digital SLR camera");
insert into review values (3, "richard","Excellent if aging mid-range digital SLR camera.");
insert into review values (4, "richard","Excellent modern full-frame semiprofessional digital SLR camera.");
insert into review values (5, "richard","Outstanding compact mirrorless system camera");