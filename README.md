# Learnme - Self-Learning Platform

A comprehensive web application for self-learning with features for note-taking, calendar management, time tracking, and productivity tools.

## Features

- **User Authentication**: Register and login with email
- **Dashboard**: User profile management and calendar
- **Calendar**: Add tasks, assignments, exams, and reminders
- **Jotpad**: Hand draw and type notes
- **Notes Upload**: Upload and manage notes (PDF, DOC, TXT, Images)
- **Notes View**: View and download your notes
- **Pomodoro Clock**: Time management tool
- **AI Summarizer**: Summarize text content
- **Todo List**: Manage your tasks

## Technology Stack

- **Frontend**: HTML, CSS, JavaScript, Bootstrap 5
- **Backend**: PHP
- **Database**: MySQL

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or PHP built-in server

### Setup Steps

1. **Clone or download the project** to your web server directory

2. **Create the database**:
   - Open phpMyAdmin or MySQL command line
   - Import the `database.sql` file to create the database and tables

3. **Configure database connection**:
   - Open `config.php`
   - Update the database credentials if needed:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'learnme_db');
     ```

4. **Create uploads directory**:
   - Create a folder named `uploads` in the project root
   - Inside `uploads`, create a folder named `notes`
   - Set appropriate permissions (chmod 755 or 777) for the uploads directory

5. **Start the server**:
   - Using PHP built-in server:
     ```bash
     php -S localhost:8000
     ```
   - Or configure Apache/Nginx to point to the project directory

6. **Access the application**:
   - Open your browser and navigate to `http://localhost:8000` (or your configured URL)

## File Structure

```
learnme/
├── api/
│   ├── calendar.php      # Calendar events API
│   ├── notes.php         # Notes management API
│   ├── todos.php         # Todo list API
│   └── summarizer.php    # AI summarizer API
├── assets/
│   ├── css/
│   │   └── style.css     # Main stylesheet
│   └── js/
│       ├── chatbot.js    # Chatbot functionality
│       ├── calendar.js   # Calendar functionality
│       └── features.js   # Features functionality
├── uploads/
│   └── notes/            # Uploaded notes storage
├── config.php            # Database configuration
├── index.php             # Home page
├── login.php             # Login page
├── register.php          # Registration page
├── logout.php            # Logout handler
├── dashboard.php         # User dashboard
├── overview.php          # Platform overview
├── features.php          # Features page
├── about.php             # About page
├── database.sql          # Database schema
└── README.md             # This file
```

## Usage

1. **Register**: Create a new account with your email
2. **Login**: Access your account
3. **Dashboard**: Update your profile and manage calendar events
4. **Features**: Use various learning tools:
   - Create notes with Jotpad
   - Upload and download notes
   - Use Pomodoro timer for time management
   - Summarize text with AI
   - Manage your todo list

## Color Scheme

- **Background**: White / Light Gray
- **Text**: Black / Dark Gray
- **Buttons**: Blue / Green
- **Highlights**: Soft Orange / Teal

## Notes

- The AI Summarizer uses a simple text extraction algorithm. For production, consider integrating with AI APIs like OpenAI.
- File uploads are stored in the `uploads/notes/` directory
- All user data is stored securely in the MySQL database
- The application is responsive and works on mobile devices

## Security Considerations

- Passwords are hashed using PHP's `password_hash()` function
- SQL injection protection using prepared statements
- Session management for authentication
- File upload validation

## License

This project is created for educational purposes.

## Support

For issues or questions, please contact the development team.

