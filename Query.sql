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