# Student_Dropout_Analysis
==========================
For the login page, create a database in your myadmin.php with the name 'dropout'
Add the following querry
QUERRY->
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role VARCHAR(20) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

=============================
For the dataset.csv and DOR.csv files give the correct path in the analysis page
Also for the images used
