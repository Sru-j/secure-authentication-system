# Stage 3 – JSON-Based Authentication with Rate Limiting

## Overview
This stage implements a complete authentication system using PHP, where user credentials are stored in a JSON file.  
In addition to password hashing with pepper, this stage introduces security controls to mitigate brute-force attacks.

## Features Implemented
- User registration and login functionality
- Password peppering before hashing
- Credential storage in a JSON file

## Authentication Logic
1. User registers with a password.
2. The password is modified using a numeric peppering technique.
3. The peppered password is hashed using MD5.
4. User credentials and metadata are stored in a JSON file.
5. During login, failed attempts are counted.
6. If failed attempts exceed 5, the account is blocked for 5 minutes.

## Security Controls
- Rate limiting via failed attempt counter
- Time-based account lockout
- Server-side password handling

## Tools Used
- PHP
- JSON
- XAMPP (Apache)

## Purpose
This stage demonstrates:
- Implementation of basic access control mechanisms
- Protection against brute-force login attempts
- Secure server-side authentication workflows
