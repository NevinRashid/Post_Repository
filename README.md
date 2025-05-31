# 📝 Post CRUD API (Laravel + Repository Pattern)


## Description
This is a simple Laravel project that implements a RESTful API for managing blog posts using the Repository Pattern for clean and maintainable code architecture.

### Key Features:
- **CRUD Operations**: Create, read, update, and delete posts.
- **Form Requests**: Validation is handled by custom form request classes.
- **Service Layer**: Business logic is separated into service classes.
- **Repository pattern**: Structured data handling using the Repository pattern.
- **API Documentaion**: Postman collection available for testing and documentation.

### Technologies Used:
- **Laravel 12**
- **PHP**
- **MySQL**
- **XAMPP** (for local development environment)
- **Composer** (PHP dependency manager)
- **Postman** (API testing and docs)

---

## Installation
To install this application you have to install composer in your machine. Then install laravel package globally using composer. After got composer and laravel installed in your machine you can follow the steps below to get this application installed properly.

### Prerequisites
Ensure you have the following installed on your machine:
- **XAMPP**: For running MySQL and Apache servers locally.
- **Composer**: For PHP dependency management.
- **PHP**: Required for running Laravel.
- **MySQL**: Database for the project

### Steps to Run the Project

1. Clone the Repository  
   ```bash
   git clone https://github.com/NevinRashid/Post_Repository.git
2. Navigate to the Project Directory
   ```bash
   cd postRepository
3. Install Dependencies
   ```bash
   composer install
4. Create Environment File
   ```bash
   cp .env.example .env
   Update the .env file with your database configuration (MySQL credentials, database name, etc.).
5. Generate Application Key
    ```bash
    php artisan key:generate
6. Run Migrations
    ```bash
    php artisan migrate
7. Run the Application
    ```bash
    php artisan serve

## API Documentation
You can find and test all API endpoints in the provided Postman collection.

### Postman Collection:
- https://www.postman.com/nevinrashid/new-workspace/collection/i6al0h0/post-management
