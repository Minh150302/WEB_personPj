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
    location_name VARCHAR(100),
    address VARCHAR(255),
    phone VARCHAR(20),
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8)
);

CREATE TABLE food_locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    food_id INT,
    location_id INT,
    available BOOLEAN DEFAULT 1,
    FOREIGN KEY (food_id) REFERENCES foods(id),
    FOREIGN KEY (location_id) REFERENCES locations(id)
);

INSERT INTO locations(location_name, address, phone, latitude, longitude)
VALUES
('Downtown Branch', '123 Food Street, Downtown', '(555) 111-2222', 40.7128, -74.0060),
('Mall Location', '456 Shopping Plaza, Mall District', '(555) 333-4444', 40.7580, -73.9855),
('Airport Branch', '789 Terminal Road, Airport', '(555) 555-6666', 40.7769, -73.8740);

INSERT INTO foods(food_name, description, price, image, rating, category_id)
VALUES
('Seafood Pizza', 'Fresh seafood pizza', 12.99, 'pizza.png', 4.5, 1),
('Cheese Burger', 'Burger with cheese', 8.99, 'burger.png', 4.2, 2),
('Orange Juice', 'Fresh orange juice', 3.99, 'juice.png', 4.0, 3);

INSERT INTO food_locations(food_id, location_id, available)
VALUES
(1, 1, 1), (1, 2, 1),
(2, 1, 1), (2, 3, 1),
(3, 1, 1), (3, 2, 1), (3, 3, 1);