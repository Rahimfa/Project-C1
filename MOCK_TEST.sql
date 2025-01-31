-- Create the users table
CREATE TABLE users
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    username      VARCHAR(50)  NOT NULL UNIQUE,
    email         VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    auth_key      VARCHAR(32)  NOT NULL,
    access_token  VARCHAR(255) UNIQUE,
    created_at    TIMESTAMP             DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP             DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



-- Insert into the users table
INSERT INTO user (username, email, password_hash, auth_key, access_token )
VALUES ('men', 'men@gmail.com', '$2y$13$jyhEE7RPsNm0Khg8a63oqeEVlXpgFK/Y6jPz8XybJHwY5SNBk7UnS', 'authkey1', 'token1'),
       ('john_doe', 'john@example.com', 'hashedpassword1', 'authkey1', 'token1'),
       ('jane_smith', 'jane@example.com', 'hashedpassword2', 'authkey2', 'token2'),
       ('alice_williams', 'alice@example.com', 'hashedpassword3', 'authkey3', 'token3'),
       ('bob_johnson', 'bob@example.com', 'hashedpassword4', 'authkey4', 'token4'),
       ('charlie_brown', 'charlie@example.com', 'hashedpassword5', 'authkey5', 'token5');
