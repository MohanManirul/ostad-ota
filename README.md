<p align="center"><a href="https://laravel.com" target="_blank"><img src="public\assets\images\readme.png" width="250" alt="Laravel Logo"></a></p>

<h1 align="center">Flight Tickets Booking Online</h1>

This repository contains a Laravel-based Flight Tickets Booking Online application with JWT token-based authentication, Axios for HTTP requests, and Bootstrap for styling in laravel 11.

## Installation
Follow these steps to get the project up and running on your local machine:

### Prerequisites
- PHP (>=8.2)
- Composer
- git
- MySQL or another database of your choice

## Step 1: Clone the Repository
 ```bash
git clone https://github.com/MohanManirul/ostad-ota.git
cd ostad-ota
```
## Step 2: Install Composer Dependencies
 ```bash
composer install
```
## Step 3: Set Up Environment Variables
- Copy the .env.example file to .env.
- Update the database connection details in the .env file.
 ```bash
cp .env.example .env
```
- <b> JWT_TOKEN</b> generate in .env file
 ```bash
 JWT_KEY=jdfb735^&GFBGF%X!gf67
```
### Step 4: Generate Application Key
```
php artisan key:generate
```
### Step 5: Run Migrations and Seeders
```
php artisan migrate
php artisan db:seed
```
### Step 6: Start the Development Server
```
php artisan serve
```
### Usage
Access the application by visiting http://localhost:8000 in your web browser.

### Additional Notes
- Make sure your database server is running and accessible.
- Adjust the .env file with your database credentials and other settings.
- You may need to configure a virtual host or adjust the server configuration based on your setup (e.g., Apache, Nginx).