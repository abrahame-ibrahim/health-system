# Health System

A simple PHP-based health management system designed to manage client enrollment, viewing client details, and providing a dashboard for admins and users. The system supports client registration, login, and searching, along with the ability to manage health-related data.

## Features

- **Client Registration**: Clients can register through the `register_client.php` form.
- **User Authentication**: Secure login and logout functionality using `login.php` and `logout.php`.
- **Client Management**: Admins can view, search, and manage client details through the `view_client.php` and `search_client.php` pages.
- **Dashboard**: A personalized dashboard for users and admins, accessible via `dashboard.php`.
- **Client Enrollment**: Admins can enroll clients into the health system through `enroll_client.php`.
- **Health Records**: Admins can manage health records and track clients' progress.
- **Responsive Design**: Styled with `styles.css` for a responsive user experience.

## File Structure

- `api.php`: API for interacting with the database and handling client data.
- `dashboard.php`: Dashboard page for admins and clients to manage data.
- `enroll_client.php`: Form to enroll a client into the health system.
- `health_system.sql`: SQL file containing the database schema and initial data.
- `index.php`: Home page of the system.
- `login.php`: Login page for user authentication.
- `logout.php`: Logout page for user sessions.
- `register_client.php`: Registration form for new clients.
- `register.php`: Registration page for creating new user accounts.
- `search_client.php`: Page to search for clients by their health data.
- `styles.css`: CSS file for styling the health system pages.
- `view_client.php`: Page for viewing client health information.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/health-system.git
    cd health-system
    ```

2. Set up your WAMP server or any compatible web server with PHP and MySQL.

3. Create a MySQL database and import the `health_system.sql` file to create the necessary tables and initial data.

4. Configure your database connection in `api.php` by updating the credentials.

5. Access the system by navigating to `http://localhost/health-system/index.php` in your browser.

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- JavaScript (for any dynamic interactions)

## Contributing

Feel free to fork the repository and submit pull requests. Contributions are welcome!

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For questions, feedback, or suggestions, contact me at [your-email@example.com].
