--sql
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

-- Rooms table
CREATE TABLE IF NOT EXISTS rooms (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    room_type VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    amenities TEXT,
    price DECIMAL(10,2) NOT NULL,
    time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -- Add other room-related columns like images, description, etc.
);

-- Conference Rooms table (inherits from Rooms)
CREATE TABLE IF NOT EXISTS conference_rooms (
    room_id INT PRIMARY KEY,
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