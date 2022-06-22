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
-- Create employees table
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

