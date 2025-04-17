CREATE TABLE IF NOT EXISTS users (
        id int NOT NULL AUTO_INCREMENT,
        username varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)       
);

CREATE TABLE IF NOT EXISTS profiles (
        id int NOT NULL AUTO_INCREMENT,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        website varchar(255) NOT NULL,
        instagram varchar(255) NOT NULL,
        facebook varchar(255) NOT NULL,
        linkedin varchar(255) NOT NULL,
        twitter_x varchar(255) NOT NULL,
		avatar varchar(255) NOT NULL,
		bio varchar(255) NOT NULL,
		user_id int NOT NULL,
	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		FOREIGN KEY (user_id) REFERENCES users(id),
		UNIQUE (user_id),     
        PRIMARY KEY (id)       
);
