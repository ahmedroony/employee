# Employee & Shift Management System

A comprehensive web application built with **Laravel** and **Livewire** to streamline employee administration, shift scheduling, and role-based access control.

---

## Features

* **User Management:** Create, update, and delete employee records, contact details, and role assignments.
* **Shift Management:** Full CRUD functionality to create, assign, and manage work shifts.
* **Admin Dashboard:** Centralized panel for managing users, monitoring logs, and scheduling shifts[cite: 1].
* **Employee Dashboard:** Dedicated user portal for employees to view their assigned shifts[cite: 1].
* **Role-Based Authorization:** Secure route protection using custom middleware (`CheckUserRole`)[cite: 1].
* **Activity Logging:** Automated logging system to track critical operations within the app[cite: 1].

---

## Tech Stack

* **Framework:** Laravel 11[cite: 1]
* **Frontend:** Livewire, Blade, Vite (Tailwind CSS/CSS)[cite: 1]
* **Database:** MySQL / SQLite[cite: 1]
* **PHP Version:** >= 8.2

---

## Quick Start

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/your-username/employee-management.git](https://github.com/your-username/employee-management.git)
   cd employee-management
   Install PHP and Node dependencies:

Bash
composer install
npm install
Configure the environment file:

Bash
cp .env.example .env
Update database credentials in your .env file.

Generate application key:

Bash
php artisan key:generate
Run migrations and seeders:

Bash
php artisan migrate --seed
Build frontend assets & start local server:

Bash
npm run dev
php artisan serve
Access the app at http://127.0.0.1:8000.

📁 Architecture Overview
app/Http/Domains/: Contains domain-driven business logic (Users, Shifts, RegisterUser)[cite: 1].

app/Livewire/Pages/: Contains Livewire page components for full-stack reactive UI[cite: 1].

app/Http/Middleware/: Handles user authentication and role verification[cite: 1].



   
