USE Veillehub
--@block
create table users(
    user_id int primary key auto_increment,
    user_firstname varchar(50) not null,
    user_lastname varchar(50) not null,
    user_email varchar(100) not null,
    user_password varchar(150) not null,
    user_profile varchar(255),
    user_score int default 0,
    user_role enum('student','instructor') not null
)

--@block
select * from users 
--@block 
describe users

--@block
alter table users modify column user_profile varchar(255) default 'https://i.pinimg.com/736x/09/21/fc/0921fc87aa989330b8d403014bf4f340.jpg'


create table presentations(
    presentation_id int primary key auto_increment,
    presentation_title varchar(100) not null,
    presentation_date DATE FORMAT 'dd.mm.yyyy',
    is_accepted boolean default
)