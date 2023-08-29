--sql
CREATE DATABASE IF NOT EXISTS hotels_db;
use hotels_db;

-- Create the tables

-- Users table
CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- forgot password table set to expire the token after 1 hour for mysql database
CREATE TABLE IF NOT EXISTS forgot_password (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    token VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    expires_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- alter table users to include attributes such as id number with a maximum of 8 digits, phone number with a maximum of 10 digits, phone number of a maximum of 15 digits
-- ALTER TABLE users ADD COLUMN id_number INT(8) NOT NULL;
-- ALTER TABLE users ADD COLUMN phone_number INT(10) NOT NULL;


-- Rooms table
CREATE TABLE IF NOT EXISTS rooms (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(100) NOT NULL,
    room_type VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    amenities TEXT,
    booked BOOLEAN DEFAULT FALSE,
    price DECIMAL(10,2) NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -- Add other room-related columns like images, description, etc.
);

-- Conference Rooms table (inherits from Rooms)
CREATE TABLE IF NOT EXISTS conference_rooms (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    conference_room_name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    projector BOOLEAN DEFAULT FALSE,
    booked BOOLEAN DEFAULT FALSE,
    booking_date DATE,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    conference_reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -- Additional columns specific to conference rooms
    -- You can add foreign keys to the rooms table for room_id
);

-- Reservations table
CREATE TABLE IF NOT EXISTS reservations (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    room_id INT,
    start_date DATETIME,
    end_date DATETIME,
    reservation_reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);

-- Reviews table  
CREATE TABLE IF NOT EXISTS reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    room_id INT,
    rating INT,
    review_text TEXT,
    review_reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);

-- Support Messages table
CREATE TABLE IF NOT EXISTS support_messages (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    message_text TEXT,
    created_at DATETIME,
    support_reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Admins table
CREATE TABLE IF NOT EXISTS Admin (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    registration_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin images table
CREATE TABLE IF NOT EXISTS admin_images (
    image_id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT,
    image_name VARCHAR(100) NOT NULL,
    image_type VARCHAR(100) NOT NULL,
    image_size INT NOT NULL,
    image_url VARCHAR(100) NOT NULL,
    image_reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES Admin(admin_id)
);