CREATE DATABASE project_dir;

USE project_dir;

DROP TABLE IF EXISTS projects (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(256) NOT NULL UNIQUE,
	description TEXT,
	start_date DATE,
	due_date DATE
);
