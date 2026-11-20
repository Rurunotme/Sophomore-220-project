# Employease (SmartHR)

A web-based workforce management system for small businesses. Employease replaces spreadsheets and paper timecards with a single place to manage employees, track attendance, process leave requests, and run payroll.

* **Purpose:** Small businesses often track people, hours, and pay in different tools, causing errors and extra admin work. Employease centralizes that data and provides employees with a self-service portal so there is less manual work for admins.
* **Status:** Work in progress. Some features below are still being built.
* **Team:** Kaden, Kay'ron, Adrian, Elizabeth (CSET 220)

---

## 1. Features

### Employees
* Admins can create, view, change, and delete employee profiles.
* Stores employee information such as names, email addresses, phone numbers, departments, designations, and salary.
* Allows admins to add, change, or delete profile pictures.
* Administrators can search for employee profiles to view attendance and payroll history.
* Administrators can filter employees by department, designation, salary, and attendance.

### Attendance
* Employees can clock in when beginning work and clock out when finishing work, saving each session as a record.
* Total work hours for employees are automatically calculated.
* Employees can submit leave requests with a reason, which administrators can manually approve or reject.
* Administrators can view employee attendance records by date range.

### Payroll
* Automatically calculates employee payroll using base salary, overtime hours, overtime rates, and applicable deductions.
* Generates monthly employee pay slips in PDF format.
* Maintains a history of employee payroll payments and allows administrators to mark payroll records as processed.
* Employees can view and access their pay slips.

### Admin Dashboard
* Displays the total number of employees working as well as who is present and absent for the current day.
* Displays the total calculated payroll for the current month.
* Displays a list of pending leave requests requiring admin approval.
* Displays an attendance trends line graph using Chart.js to visualize historical attendance over time.
* Displays a department distribution pie chart to show employees across different departments.

### Authentication and Employee Portal
* Supports two user roles: **Administrator** and **Employee**.
* Directs users to their designated dashboard based on their role.
* Provides employees with access to an employee portal where they can view attendance, pay slips, and leave statuses.
* Hashes and verifies passwords.
* Validates login credentials and form submissions.

---

## 2. Technology Stack

| Category | Technology |
| :--- | :--- |
| **Frontend** | Blade templates, HTML5, CSS3, JavaScript, Bootstrap 5 |
| **Backend** | PHP 8.2+, Laravel 12 |
| **Database** | MySQL (managed via phpMyAdmin or MySQL Workbench) |
| **Authentication** | Laravel session auth for the web app, Laravel Sanctum for the JSON API |
| **DevOps / Hosting** | EthioDeploy |

---

## 3. Prerequisites

Install the following before setting up the project:

* PHP 8.2 or higher
* Composer
* Node.js and npm
* MySQL 8+ (XAMPP is an easy way to get PHP and MySQL locally)
* Git

---

## 4. Setup Instructions

1. Clone the repository and open the project folder:
   ```bash
   git clone <your-repository-url>
   cd <project-folder>
   ```

2. Install PHP and JavaScript dependencies:
   ```bash
   composer install
   npm install
   ```

3. Create your environment file and application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Create an empty MySQL database, then add its name and your login credentials to your `.env` file (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

5. Run the database migrations to create the tables:
   ```bash
   php artisan migrate
   ```

6. Build the frontend assets and start the local development server:
   ```bash
   npm run build
   php artisan serve
   ```

7. Open your browser and navigate to `http://127.0.0.1:8000`.

---

## 5. How to Use or Test the Application

* Navigate to `/login` and sign in.
* **Admins** are redirected to the admin dashboard; **Employees** are redirected to the employee portal.
* **Test accounts:** *To be added*
* To run the test suite:
  ```bash
  php artisan test
  ```

---

## 6. Known Limitations

* Still under development, so not every feature is fully functional yet.
* Requires an active internet connection (for external assets/CDNs).
* Only supported on modern browsers (Chrome, Firefox, Safari, Edge).