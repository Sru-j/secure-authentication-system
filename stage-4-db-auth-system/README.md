# Stage 4 – Database-Backed Authentication System

## Overview
This stage enhances the authentication system by migrating user data storage from JSON files to a relational database using MySQL.  
It represents a more realistic and scalable approach to user authentication systems used in real-world applications.

## Features Implemented
- User registration and login using PHP
- Password peppering and hashing
- Secure credential storage in a MySQL database
- Failed login attempt tracking

## Authentication Workflow
1. User submits credentials via PHP forms.
2. Password is modified using a numeric peppering technique.
3. The processed password is hashed.
4. User data is stored in a MySQL database.
5. Failed login attempts are tracked per user.
6. Accounts are temporarily blocked after exceeding allowed attempts.

## Technologies Used
- PHP
- MySQL
- XAMPP
- HTML/CSS

## Security Concepts Demonstrated
- Persistent credential storage
- Brute-force attack mitigation
- Server-side validation
- Progressive security hardening

## Purpose
This stage demonstrates:
- Transition from file-based storage to database-backed authentication
- Scalable and structured user management
- Practical implementation of authentication security controls
