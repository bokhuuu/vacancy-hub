# Vacancy Hub

**Vacancy Hub** is a dynamic job listing platform built using **vanilla PHP** with a Laravel-like structure. It allows users to browse and manage job listings with features like user authentication, role-based access control, and search functionality. Designed for job seekers and employers, it offers a streamlined and secure experience for managing job postings.

---

## Features

### User Features

- **User Registration & Login**: Secure user authentication with email and password validation.
- **Job Listings Management**:
  - View job listings.
  - Search by keywords and location.
  - Add, edit, or delete job listings (restricted to listing owners).
- **Flash Messaging**: Feedback for successful actions or errors.
- **Role-Based Access Control**:
  - Access restrictions for guests and non-owners.
  - Authorization checks for editing and deleting listings.

### Backend Features

- **Laravel-like MVC Infrastructure with Vanilla PHP**:
  - **`app` folder**:
    - **Controllers**: Handles HTTP requests and responses.
    - **Views**: HTML templates for the frontend.
  - **`framework` folder**:
    - Middleware for role-based access control.
    - Authorization class to enforce ownership checks.
    - Router for dynamic and clean URL handling.
    - Session management for user state and flash messages.
    - Validation class for data validation (e.g., email, string length).
    - Database class for PDO-based connection and queries.
  - **`config` folder**:
    - Database configuration and connection settings.
  - **Helpers**: Reusable utility functions.
  - **Routes**: Centralized route definitions.
- **Routing**:
  - Clean and dynamic URL handling using PSR-4 routing.
  - HTTP method spoofing for better RESTful behavior.
- **Validation**:
  - Custom methods for email validation, string length, and field matching.
- **Database**:
  - PDO-based database connection with error handling.
  - Dynamic query construction and data sanitization.

---

## Installation and Setup

### Prerequisites

- PHP 8.0 or higher
- MySQL
- Composer
- A local server like XAMPP (for testing) or a web host like Hostinger (for deployment)

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/bokhuuu/vacancy-hub.git
   ```
