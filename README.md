
# Upload and Share File - PHP Malfat

Upload and Share File - PHP Malfat is a PHP-based file-sharing application that allows users to upload files either as private or public. Each user has a limited storage balance of 15MB (configurable in core/init.php). The project features user authentication, including password reset via email, and utilizes MySQL for database management.


## Features

- Upload files as private or public.
- User authentication with email-based password reset.
- Storage limit of 15MB per user (modifiable in core/init.php).
- Bootstrap-powered UI for responsive design.
- Configurable email settings and base URL in core/init.php.


## Tech Stack

**Client:** Bootstrap

**Server:** PHP (Core PHP, without frameworks),MySQL


## Installation

## Prerequisites
- PHP 7.x or later
- MySQL Server
- Apache Server (or any local server like XAMPP, WAMP)

### Steps to Install

1. Clone the repository:
```bash
  git clone https://github.com/Rabie-s/upload-and-share-file-php-malfat.git
  cd upload-and-share-file-php-malfat
```

2. Create MySQL Database:

- Create a database.
- Import the provided SQL file (database/upload-and-share-file-php-malfat.sql) into your MySQL database.

3. Configure Database Connection:

- Navigate to classes/dbConfig.php.
- Update the database credentials:
```bash
    private static $DB_HOST = 'localhost';
    private static $DB_USER = 'root';
    private static $DB_PASS = '';
    private static $DB_NAME = 'upload-and-share-file-php-malfat';
```

4. Setup Email, Storage Limit, and Base URL Configuration:

- Navigate to core/init.php.
- Update the following settings if you need:
```bash
    define("PHPMailerEMAIL","");// Your Gmail
    define("PHPMailerPASSWORD","");// Your Password
    define("MAXStorageForOneUser",15);// Storage limit (15MB, modifiable)
    define('UPLOADFilesPATH','uploads/'); 
    define("BU","http://localhost/upload-and-share-file-php-malfat/");// Base URL 
    define("ASSETS","http://localhost/upload-and-share-file-php-malfat/assets/");// Website assets 
    define('DOMINEName',$_SERVER['SERVER_NAME']);// Get domain name

```

5. Run the project:
- Place the project in your local server directory (htdocs for XAMPP).

- Open the browser and go to:
```bash
    http://localhost/upload-and-share-file-php-malfat
```



## Screenshots

![App Screenshot](https://github.com/Rabie-s/upload-and-share-file-php-malfat/blob/main/screenshots/1.png?raw=true)

![App Screenshot](https://github.com/Rabie-s/upload-and-share-file-php-malfat/blob/main/screenshots/2.png?raw=true)

![App Screenshot](https://github.com/Rabie-s/upload-and-share-file-php-malfat/blob/main/screenshots/3.png?raw=true)

![App Screenshot](https://github.com/Rabie-s/upload-and-share-file-php-malfat/blob/main/screenshots/4.png?raw=true)


## License

[MIT](https://choosealicense.com/licenses/mit/)
