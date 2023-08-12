--sql
use hotel_site;

-- Create the tables

-- Users table
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Rooms table
CREATE TABLE rooms (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    room_type VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    amenities TEXT,
    -- Add other room-related columns like images, description, etc.
);

-- Conference Rooms table (inherits from Rooms)
CREATE TABLE conference_rooms (
    room_id INT PRIMARY KEY,
    -- Additional columns specific to conference rooms
    -- You can add foreign keys to the rooms table for room_id
);

-- Reservations table
CREATE TABLE reservations (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    room_id INT,
    start_date DATETIME,
    end_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);

-- Reviews table
CREATE TABLE reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    room_id INT,
    rating INT,
    review_text TEXT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);

-- Support Messages table
CREATE TABLE support_messages (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    message_text TEXT,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);