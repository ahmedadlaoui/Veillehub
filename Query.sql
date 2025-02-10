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

--@block
CREATE TABLE presentations (
    presentation_id INT PRIMARY KEY AUTO_INCREMENT,
    presentation_title VARCHAR(100) NOT NULL,
    presentation_date DATE NOT NULL,
    is_accepted TINYINT(1) DEFAULT 0 
);  
--@block
SELECT * FROM assigned_presentations

--@block

CREATE TABLE assigned_presentations (
    user_id INT NOT NULL,
    presentation_id INT NOT NULL,
    PRIMARY KEY (user_id, presentation_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (presentation_id) REFERENCES presentations(presentation_id) ON DELETE CASCADE
);