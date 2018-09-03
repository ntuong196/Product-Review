drop table if exists item;
drop table if exists review;
create table item (
        id integer not null,
        summary varchar(80) not null,
        manufacturer varchar(80) not null,
        primary key (id) 
);

insert into item values (1, "Canon PowerShot S110","Canon");
insert into item values (2, "Canon EOS 700D","Canon");
insert into item values (3, "Canon EOS 7D","Canon");
insert into item values (4, "Canon EOS 6D","Canon");
insert into item values (5, "Fujifilm X-Pro1","Fuji");

create table review (
        id integer not null,
        client varchar(80) not null,
        rating integer not null,
        comment text default '',
        CHECK (rating >0 and rating <6),
        FOREIGN KEY (id) REFERENCES item(id)
);

insert into review values (1, "richard", 5,"Excellent pocket camera.");
insert into review values (2, "richard",4,"Excellent entry-level digital SLR camera");
insert into review values (3, "richard",3,"Excellent if aging mid-range digital SLR camera.");
insert into review values (4, "richard",2,"Excellent modern full-frame semiprofessional digital SLR camera.");
insert into review values (5, "richard",1,"Outstanding compact mirrorless system camera");