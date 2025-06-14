CREATE TABLE IF NOT EXISTS users(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
);

CREATE TABLE if NOT EXISTS item (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    item_id INTEGER NOT NULL UNIQUE,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    shipping FLOAT NOT NULL,
    src VARCHAR(255) NOT NULL
);

CREATE TABLE if NOT EXISTS saved_item (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id),
    item_id INTEGER NOT NULL,
    FOREIGN KEY(item_id) REFERENCES item(id)
);

CREATE TABLE if NOT EXISTS cart (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id),
    item_id INTEGER NOT NULL,
    FOREIGN KEY(item_id) REFERENCES item(id)
);