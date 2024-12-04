CREATE DATABASE tintuc;
  USE tintuc;

  CREATE TABLE users (
      id INT PRIMARY KEY AUTO_INCREMENT,
      username VARCHAR(255),
      password VARCHAR(255),
      role INT
  );

  CREATE TABLE categories (
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(255)
  );

  CREATE TABLE news (
      id INT PRIMARY KEY AUTO_INCREMENT,
      title VARCHAR(255),
      content TEXT,
      image VARCHAR(255),
      created_at DATETIME,
      category_id INT,
      FOREIGN KEY (category_id) REFERENCES categories(id)
  );