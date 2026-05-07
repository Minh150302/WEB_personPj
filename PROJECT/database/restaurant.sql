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
('Food'),
('Sides'),
('Drinks'),
('Dessert');

CREATE TABLE managers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(255),
    phone VARCHAR(20),
    hours VARCHAR(100)
);

INSERT INTO locations(name, address, phone, hours)
VALUES
('District 1 Branch', '1 Nguyen Hue, District 1', '(555) 123-4567', '10AM - 0AM'),
('District 7 Branch', 'District 7', '(555) 234-5678', '7AM - 11PM'),
('District 10 Branch', '496 Hoa Hao', '(555) 345-6789', '10AM - 9PM');

CREATE TABLE food_locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    food_id INT NOT NULL,
    location_id INT NOT NULL,
    stock INT DEFAULT 10,
    FOREIGN KEY (food_id) REFERENCES foods(id),
    FOREIGN KEY (location_id) REFERENCES locations(id)
);

INSERT INTO foods(food_name, description, price, image, rating, category_id)
VALUES
('Seafood Pizza', 'Fresh seafood pizza', 12.99, 'pizza.png', 4.5, 1),
('Cheese Burger', 'Burger with cheese', 8.99, 'burger.png', 4.2, 2),
('Orange Juice', 'Fresh orange juice', 3.99, 'juice.png', 4.0, 3);

INSERT INTO food_locations(food_id, location_id, stock)
VALUES
(1, 1, 15), (1, 2, 10), (1, 3, 12),
(2, 1, 20), (2, 2, 18), (2, 3, 15),
(3, 1, 30), (3, 2, 25), (3, 3, 28);