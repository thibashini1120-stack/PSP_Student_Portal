# PSP Student Portal

A web-based Student Portal developed using PHP and MySQL with a Model-View-Controller (MVC) architecture.

## Project Overview

The PSP Student Portal is designed to provide a simple web-based platform for managing student information and student account functions.

The system includes student authentication, student profile management, password management, student information management, and profile picture uploading.

## Main Features

### Student Authentication
- Student login
- Session-based authentication
- Logout functionality

### Student Profile
- View student profile
- Display student name
- Display IC number
- Display programme
- Display marks
- Upload profile picture

### Profile Picture Upload
- Supports JPG, JPEG and PNG files
- Maximum file size of 2MB
- Unique filename generation
- Uploaded filename stored in MySQL
- Profile picture displayed on the student profile

### Password Management
- Change password functionality
- Password validation
- Password update through the system

### Student Management
- View student records
- Add student records
- Edit student records
- Delete student records

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Bootstrap
- XAMPP
- Git
- GitHub

## System Architecture

The system follows the Model-View-Controller (MVC) architecture.

```text
PSP Student Portal
│
├── Model
│   ├── Student.php
│   └── User.php
│
├── View
│   ├── auth/
│   ├── layouts/
│   ├── profile/
│   └── students/
│
└── Controller
    ├── AuthController.php
    ├── PasswordController.php
    ├── ProfileController.php
    └── StudentController.php