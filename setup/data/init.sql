USE blog_post;
CREATE TABLE authors (
email VARCHAR(128) NOT NULL PRIMARY KEY,
hash_password VARCHAR(255) NOT NULL,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
biography TEXT NOT NULL,
create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
last_login_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO authors (email, hash_password, first_name, last_name, biography) VALUES ("chinny.hardeep@gmail.com","$2a$20$TI16h5cBne/Z7.zZJLvvcOi.ar9gFkLvY5G0O9Upz36IendzgwzuG","Hardy","Dhello","Student at Cambrian College.");


CREATE TABLE posts (
slug VARCHAR(128) NOT NULL PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT,
author VARCHAR(128) NOT NULL,
pub_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
INDEX (author), 
FOREIGN KEY (author) REFERENCES authors (email)
);

INSERT INTO `posts` (slug, title, content, author) VALUES ("Test-1", "Post 1", "First post","chinny.hardeep@gmail.com");
