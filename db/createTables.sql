-- Delete if exists, create and activate DB
DROP DATABASE IF EXISTS employees_v2;
CREATE DATABASE employees_v2;
USE employees_v2;

-- Create users table
CREATE TABLE users(
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(60) NOT  NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    type ENUM('admin', 'user') 
);

-- Create gym users table
CREATE TABLE employees(
    employee_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(20) NOT NULL, 
    lastName VARCHAR(50),
    email VARCHAR(100) NOT NULL UNIQUE,
    gender ENUM('man', 'woman', 'not defined') DEFAULT 'man',
    age INT NOT NULL,
    city VARCHAR(20),
    streetAddress VARCHAR(100),
    state VARCHAR(5),
    postalCode INT,
    phoneNumber VARCHAR(15) NOT NULL UNIQUE
);

-- Create goals table
CREATE TABLE sessions(
    session_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_from DATE NOT NULL,
    date_to DATE NOT NULL,
    goal INT NOT NULL
);

-- Create users sport data table
CREATE TABLE sport_data (
    session_id INT,
    employee_id INT,
    distance INT,
    steps INT,
    calories INT,
    weight FLOAT,
    FOREIGN KEY (session_id) REFERENCES sessions(session_id),
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);