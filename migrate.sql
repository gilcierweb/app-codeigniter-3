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
        first_name varchar(255) NULL,
        last_name varchar(255)  NULL,
        website varchar(255) NULL,
        instagram varchar(255) NULL,
        facebook varchar(255) NULL,
        linkedin varchar(255) NULL,
        twitter_x varchar(255) NULL,
		avatar varchar(255) NULL,
		bio TEXT NULL,
		user_id int NOT NULL,
	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		FOREIGN KEY (user_id) REFERENCES users(id),
		UNIQUE (user_id),     
        PRIMARY KEY (id)       
);
