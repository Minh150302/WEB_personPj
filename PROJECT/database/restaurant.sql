CREATE DATABASE restaurant_db;
USE restaurant_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    royal_points INT DEFAULT 0
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100)
);

CREATE TABLE foods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255),
    rating FLOAT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories(category_name)
VALUES
('Pizza'),
('Burger'),
('Drinks'),
('Dessert');

CREATE TABLE managers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

INSERT INTO foods(food_name, description, price, image, rating, category_id)
VALUES
('Seafood Pizza', 'Fresh seafood pizza', 12.99, 'pizza.jpg', 4.5, 1),
('Cheese Burger', 'Burger with cheese', 8.99, 'burger.jpg', 4.2, 2),
('Orange Juice', 'Fresh orange juice', 3.99, 'juice.jpg', 4.0, 3);