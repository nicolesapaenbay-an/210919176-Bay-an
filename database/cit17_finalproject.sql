CREATE DATABASE cit17_finalproject;
USE cit17_project;

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  phone_number VARCHAR(15) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('customer', 'therapist', 'admin') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Services (
  service_id INT AUTO_INCREMENT PRIMARY KEY,
  service_name VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  duration INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Appointments (
  appointment_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  therapist_id INT NOT NULL,
  service_id INT NOT NULL,
  appointment_date DATE NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  status ENUM('pending', 'confirmed', 'completed', 'canceled') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (therapist_id) REFERENCES Users(user_id),
  FOREIGN KEY (service_id) REFERENCES Services(service_id)
);

CREATE TABLE Payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  appointment_id INT NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  payment_method ENUM('cash', 'credit_card', 'paypal') NOT NULL,
  payment_status ENUM('paid', 'unpaid', 'refunded') DEFAULT 'unpaid',
  transaction_id VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id)
);

CREATE TABLE Availability (
  availability_id INT AUTO_INCREMENT PRIMARY KEY,
  therapist_id INT NOT NULL,
  date DATE NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (therapist_id) REFERENCES Users(user_id)
);

CREATE TABLE Reviews (
  review_id INT AUTO_INCREMENT PRIMARY KEY,
  appointment_id INT NOT NULL,
  user_id INT NOT NULL,
  rating INT NOT NULL,
  comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Optional: Promotions Table
CREATE TABLE Promotions (
  promo_id INT AUTO_INCREMENT PRIMARY KEY,
  promo_code VARCHAR(50) UNIQUE NOT NULL,
  description TEXT NOT NULL,
  discount_percent DECIMAL(5,2) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL
);