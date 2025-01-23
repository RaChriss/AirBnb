-- Active: 1737563431782@@127.0.0.1@3306@rentalagency

-- Create database
CREATE DATABASE RentalAgency;
CREATE ROLE rental_agency
LOGIN PASSWORD 'rental_agency';
GRANT ALL PRIVILEGES ON DATABASE RentalAgency TO rental_agency;
ALTER DATABASE RentalAgency OWNER TO rental_agency;
USE RentalAgency;

-- Habitation table
CREATE TABLE Habitation (
    id SERIAL PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    number_of_rooms INT NOT NULL,
    daily_rent DECIMAL(10, 2) NOT NULL,
    photos TEXT,
    neighborhood VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

-- Client table
CREATE TABLE Client (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL
);

-- Reservation table
CREATE TABLE Reservation (
    id SERIAL PRIMARY KEY,
    client_id INT NOT NULL REFERENCES Client(id),
    habitation_id INT NOT NULL REFERENCES Habitation(id),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_cost DECIMAL(10, 2) NOT NULL
);

-- Administrator table
CREATE TABLE Administrator (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);


CREATE TABLE HabitationCategory (
    id SERIAL PRIMARY KEY,
    habitation_id INT NOT NULL REFERENCES Habitation(id),
    category_id INT NOT NULL REFERENCES Category(id)
);

INSERT INTO Category (name) VALUES 
('Seaside'), 
('Cabin'), 
('With View'), 
('Luxury'), 
('Budget Friendly');


INSERT INTO HabitationCategory (habitation_id, category_id) VALUES 
(1, 1), -- Habitation 1 belongs to "Seaside"
(2, 2), -- Habitation 2 belongs to "Cabin"
(3, 3), -- Habitation 3 belongs to "With View"
(3, 4); -- Habitation 3 also belongs to "Luxury"


-- Sample data
INSERT INTO Habitation (type, number_of_rooms, daily_rent, photos, neighborhood, description) 
VALUES 
('Maison', 4, 100.00, 'photo1.jpg', 'Downtown', 'Maison 4 chambres côte plein sud avec piscine'),
('Studio', 1, 50.00, 'photo2.jpg', 'Uptown', 'Studio moderne avec vue sur la ville'),
('Appartement', 3, 75.00, 'photo3.jpg', 'Suburbs', 'Appartement spacieux et lumineux.');

INSERT INTO Administrator (name, password) 
VALUES ('admin', 'admin');

-- Sample queries for application functionalities
-- 1. List all habitations
SELECT * FROM Habitation;

-- 2. Check availability for a specific habitation
SELECT * 
FROM Reservation 
WHERE habitation_id = 1 AND 
      (start_date <= '2025-01-20' AND end_date >= '2025-01-15');

-- 3. Reserve a habitation
INSERT INTO Reservation (client_id, habitation_id, start_date, end_date, total_cost) 
VALUES (1, 1, '2025-01-15', '2025-01-20', 500.00);


SELECT h.*
FROM Habitation h
JOIN HabitationCategory hc ON h.id = hc.habitation_id
JOIN Category c ON hc.category_id = c.id
WHERE c.name = 'Seaside';

INSERT INTO Client (username, name, password, phone_number) VALUES 
('jdupont', 'Jean Dupont', 'client1', '+33612345678'),
('mmartin', 'Marie Martin', 'client2', '+33623456789'),
('pberger', 'Pierre Berger', 'client3', '+33634567890'),
('smoreau', 'Sophie Moreau', 'client4', '+33645678901'),
('lrobert', 'Lucas Robert', 'client5', '+33656789012'),
('cdurand', 'Claire Durand', 'client6', '+33667890123'),
('tbernard', 'Thomas Bernard', 'client7', '+33678901234'),
('lpetit', 'Laura Petit', 'client8', '+33689012345'),
('rsimon', 'Romain Simon', 'client9', '+33690123456'),
('amelie_p', 'Amélie Petit', 'client10', '+33601234567');
