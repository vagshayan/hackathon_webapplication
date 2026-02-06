# Learnme Project Summary

## Project Overview
Learnme is a comprehensive self-learning platform built with HTML, CSS, JavaScript, Bootstrap, and PHP. It provides students and learners with tools for effective learning, organization, and productivity.

## Pages Created

### 1. **Home Page (index.php)**
- Website details and information
- Interactive chatbot for user inquiries
- Hero section with call-to-action
- Responsive navigation

### 2. **Dashboard (dashboard.php)**
- User profile management (name, email, phone, institute, about)
- Interactive calendar with month navigation
- Add events (tasks, assignments, exams, reminders)
- View upcoming events list
- Profile update functionality

### 3. **Overview (overview.php)**
- Platform overview and introduction
- Core functionality description
- Getting started guide
- Key benefits

### 4. **Features (features.php)**
- Tabbed interface for 5 main features:
  - **Jotpad**: Hand drawing and typing notes with canvas
  - **Notes Upload**: Upload PDF, DOC, TXT, and image files
  - **Notes**: View and download uploaded notes
  - **Pomodoro Clock**: Time management timer (25/5/15 minutes)
  - **AI Summarizer**: Text summarization tool
  - **Todo List**: Task management with checkboxes

### 5. **About (about.php)**
- Website ownership information
- Mission statement
- Contact information
- Terms of service and privacy policy

### 6. **Authentication**
- **Register (register.php)**: User registration with email
- **Login (login.php)**: User authentication
- **Logout (logout.php)**: Session termination

## API Endpoints

### `/api/calendar.php`
- GET: Retrieve user's calendar events
- POST: Add new calendar event

### `/api/notes.php`
- GET: Retrieve user's notes
- POST: Upload note, save jotpad, delete note

### `/api/todos.php`
- GET: Retrieve user's todos
- POST: Add todo, toggle completion, delete todo

### `/api/summarizer.php`
- POST: Summarize text content

## Database Structure

### Tables:
1. **users**: User accounts and profiles
2. **calendar_events**: Tasks, assignments, exams, reminders
3. **notes**: Uploaded and jotpad notes
4. **todos**: Todo list items

## Design Features

### Color Scheme:
- Background: White / Light Gray (#ffffff / #f5f5f5)
- Text: Black / Dark Gray (#000000 / #333333)
- Buttons: Blue / Green (#007bff / #28a745)
- Highlights: Soft Orange / Teal (#ff8c42 / #20b2aa)

### UI/UX:
- Clean and modern design
- Fully responsive (mobile-friendly)
- Bootstrap 5 integration
- Smooth transitions and hover effects
- Card-based layout
- Intuitive navigation

## Key Features Implemented

✅ User registration and login
✅ Profile management
✅ Interactive calendar with event management
✅ Jotpad with drawing and typing
✅ File upload for notes
✅ Notes viewing and downloading
✅ Pomodoro timer
✅ AI text summarizer
✅ Todo list management
✅ Interactive chatbot
✅ Responsive design
✅ Secure authentication
✅ Database integration

## File Structure

```
learnme/
├── api/                    # API endpoints
│   ├── calendar.php
│   ├── notes.php
│   ├── todos.php
│   └── summarizer.php
├── assets/
│   ├── css/
│   │   └── style.css       # Main stylesheet
│   └── js/
│       ├── chatbot.js      # Chatbot logic
│       ├── calendar.js     # Calendar functionality
│       └── features.js     # Features functionality
├── uploads/                # File uploads (created on first upload)
│   └── notes/
├── config.php              # Database configuration
├── index.php               # Home page
├── login.php               # Login page
├── register.php            # Registration page
├── logout.php              # Logout handler
├── dashboard.php           # User dashboard
├── overview.php            # Platform overview
├── features.php            # Features page
├── about.php               # About page
├── setup.php               # Setup script
├── database.sql            # Database schema
├── .htaccess              # Apache configuration
├── README.md               # Installation guide
└── PROJECT_SUMMARY.md      # This file
```

## Setup Instructions

1. Import `database.sql` to create database
2. Configure `config.php` with database credentials
3. Run `setup.php` to create upload directories
4. Start PHP server: `php -S localhost:8000`
5. Access: `http://localhost:8000`

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Framework**: Bootstrap 5.3.0
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Server**: Apache/Nginx or PHP built-in server

## Security Features

- Password hashing (bcrypt)
- Prepared statements (SQL injection prevention)
- Session management
- File upload validation
- Directory protection (.htaccess)

## Browser Compatibility

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Notes

- AI Summarizer uses a simple algorithm; for production, consider integrating with OpenAI API
- File uploads are limited to common document and image formats
- Calendar events are stored with date and optional time
- All user data is isolated per user account

