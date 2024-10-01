# Contact Management Application

This is a simple contact management application built using Laravel. The application allows users to create, read, update, and delete contacts (CRUD) with the following additional features:
- Bulk import of contacts via XML file.
- Pagination for viewing contacts (10 contacts per page).
- Success and error messages with dismiss functionality.
- Display of the most recently added contacts first.

## Features

- **CRUD Operations**: Create, edit, view, and delete contacts.
- **Bulk Import**: Import multiple contacts at once using an XML file.
- **Pagination**: View contacts with pagination (10 contacts per page).
- **Success and Error Messages**: Display messages for success or failure with dismiss option.
- **Ordering**: Display the most recently added contact first.

## Requirements

- PHP >= 7.4
- Composer
- Laravel 8.x
- MySQL or any other supported database

## Installation

1. Clone the repository:

   ```
   git clone https://github.com/Devendera/contactApp.git
   cd contact-app


Install dependencies:
composer install
Copy the .env file:

cp .env.example .env

Generate application key:
php artisan key:generate
Configure the .env file with your database credentials.

Run migrations to create the necessary tables:

php artisan migrate
Start the application:

php artisan serve
The application will be available at http://127.0.0.1:8000/contacts