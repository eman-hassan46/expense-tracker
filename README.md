
# Personal Expense Tracker

A simple Personal Expense Tracker web application built with Laravel 11, MySQL, Blade, and Bootstrap. It allows users to add, edit, delete, and filter expenses while displaying the total amount of the currently visible expenses.

## Features

- Add a new expense
- View all expenses (newest first)
- Edit existing expenses
- Delete expenses with a confirmation prompt
- Filter expenses by category
- Display the total amount of visible expenses
- Form Request validation
- Database seeder with 20+ sample expense records

## Technologies Used

- Laravel 11
- PHP
- MySQL
- Blade Templates
- Bootstrap 5

## Setup Instructions

1. Clone the repository.

```bash
git clone <repository-url>
```

2. Open the project folder.

```bash
cd expense-tracker
```

3. Install dependencies.

```bash
composer install
```

4. Copy the environment file.

```bash
cp .env.example .env
```

5. Generate the application key.

```bash
php artisan key:generate
```

6. Configure your MySQL database in the `.env` file.

7. Run migrations and seed the database.

```bash
php artisan migrate --seed
```

8. Start the development server.

```bash
php artisan serve
```

9. Open your browser and visit:

```
http://127.0.0.1:8000
```

## Design Decision

I used Laravel Form Requests to keep validation logic separate from the controller. This makes the controller cleaner, improves code organization, and follows Laravel best practices.

## Future Improvement

With more time, I would add user authentication so each user can manage their own expenses securely. I would also add charts and monthly expense reports to help users better understand their spending habits.

## Author

Eman Fatima