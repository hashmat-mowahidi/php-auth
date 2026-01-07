
<div align="center">

# 🔐 Simple PHP Authentication System

</div>

A simple authentication system built with core PHP (no framework), demonstrating user registration, login, logout and session-based authentication.

## 📌 Features

- User Registration
- User Login
- User Logout
- Password hashing
- Session-based authentication
- Server-side validation
- Proper error Handling
- Clean folder structure

## 🛠️ Technologies Used

- PHP (Core PHP)
- MySQL
- HTML5
- CSS3
- Apache (XAMPP)


## ⚙️ Configuration & Setup

### 1️⃣ Clone the Repository

### 2️⃣ Server Requirements

- XAMPP installed

- Apache running

- MySQL running


### 3️⃣ Database Configuration

Edit the database configuration file:

#### config/db.php:
```md

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "php_auth";

```md

#### 📌 Important:

- You do NOT need to manually create the database
- The database and required tables are created automatically when index.php is run for the first time


### 4️⃣ Run the Project

Move the project folder to:

xampp/htdocs/


Open your browser and visit:

http://localhost/project-folder/index.php