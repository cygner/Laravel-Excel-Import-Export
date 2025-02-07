# Laravel 11 Excel and CSV Import/Export

This repository is crafted by Cygner Technolabs Pvt. Ltd. to demonstrate the capabilities of importing and exporting Excel and CSV files within a Laravel 11 application, utilizing the `maatwebsite/excel` package.

## Features

- **Import Functionality**: Allows uploading and processing of CSV files into the database.
- **Export Functionality**: Enables the generation and downloading of user data in Excel format.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP >= 8.4
- Composer
- Laravel 11.x
- MySQL or any other database system

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/cygner/Laravel-Excel-Import-Export.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd Laravel-Excel-Import-Export
   ```

3. **Install dependencies**:
   ```bash
   composer install
   ```

4. **Create an .env file and configure your database**:
   ```bash
   cp .env.example .env
   ```
   Edit the `.env` file and set your database credentials.

5. **Generate an application key**:
   ```bash
   php artisan key:generate
   ```

6. **Run migrations**:
   ```bash
   php artisan migrate
   ```

7. **Generate dummy data**:
   ```bash
   php artisan tinker
  
   User::factory()->count(10)->create()
   ```

### Usage

- **Start the server**:
  ```bash
  php artisan serve
  ```
- **Visit** `http://localhost:8000/` in your web browser to view the application.

### Enjoy!

Thank you for using this project!