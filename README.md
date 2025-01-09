# Complaint Management System

The Complaint Management System is a web application designed to manage and track user complaints efficiently. It provides separate dashboards for users and admins, allowing users to submit complaints and admins to review and resolve them.

## Features

- **User Dashboard**:
  - Users can log in and submit complaints with details such as title, description, and category.
  - Users can view the status of their submitted complaints.

- **Admin Dashboard**:
  - Admins can log in to review, edit, and resolve complaints.
  - Admins can update the status of complaints (Pending, In Progress, Resolved).
  - Admins can view detailed information about each complaint.

## Technologies Used

- **Frontend**:
  - HTML5: For structuring the web pages.
  - CSS3: For styling the application.
  - Bootstrap 4: For responsive design and UI components.

- **Backend**:
  - PHP: For server-side scripting and handling business logic.
  - MySQL: For database management and storage of user and complaint data.

- **Security**:
  - Password hashing using `password_hash()` for secure password storage.
  - Prepared statements in SQL queries to prevent SQL injection attacks.

## Database Schema

The application uses a MySQL database with the following tables:

- **users**:
  - `id`: INT, Primary Key, Auto Increment
  - `name`: VARCHAR(255)
  - `username`: VARCHAR(255), Unique
  - `email`: VARCHAR(255), Unique
  - `password`: VARCHAR(255)
  - `created_at`: TIMESTAMP, Default Current Timestamp

- **admins**:
  - `id`: INT, Primary Key, Auto Increment
  - `name`: VARCHAR(255)
  - `username`: VARCHAR(255), Unique
  - `email`: VARCHAR(255), Unique
  - `password`: VARCHAR(255)
  - `created_at`: TIMESTAMP, Default Current Timestamp

- **complaints**:
  - `id`: INT, Primary Key, Auto Increment
  - `user_id`: INT, Foreign Key References `users(id)`
  - `title`: VARCHAR(255)
  - `description`: TEXT
  - `category`: VARCHAR(255)
  - `status`: ENUM('Pending', 'In Progress', 'Resolved'), Default 'Pending'
  - `created_at`: TIMESTAMP, Default Current Timestamp

## Installation

1. Clone the repository to your local machine.
2. Set up a MySQL database and import the provided SQL schema.
3. Update the database connection details in the PHP files (`db.php` or directly in scripts).
4. Ensure your web server (e.g., XAMPP) is running and navigate to the project directory in your browser.

## Usage

- **User Access**: Users can sign up and log in to submit complaints.
- **Admin Access**: Admins can log in to manage complaints. Admin signup requires an invitation code for security.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the MIT License. See the `LICENSE` file for more information.