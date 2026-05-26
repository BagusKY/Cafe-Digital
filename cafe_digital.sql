CREATE DATABASE cafe_digital;
USE cafe_digital;

CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    harga INT,
    gambar VARCHAR(255),
    kategori VARCHAR(50)
);

INSERT INTO menu (nama, harga, gambar, kategori) VALUES
('Cappuccino', 25000, 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1000', 'Coffee'),
('Latte', 28000, 'https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=1000', 'Coffee'),
('Americano', 22000, 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1000', 'Coffee');

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    phone VARCHAR(30),
    email VARCHAR(100),
    address TEXT,
    payment_method VARCHAR(50),
    subtotal INT,
    tax INT,
    service_fee INT,
    grand_total INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    menu_name VARCHAR(100),
    price INT,
    qty INT,
    subtotal INT
);