# Stage 2 – Password Hashing via PHP Form

## Overview
This stage demonstrates a web-based implementation of password hashing using PHP.  
A simple HTML form is served through XAMPP, allowing the user to input a password, which is then processed securely on the server side.

## Functionality
- The user submits a password through a PHP form.
- A custom peppering technique is applied before hashing.
- The processed password is converted into an MD5 hash and displayed as output.

## Peppering Logic
A numeric pepper is inserted after every 3rd character of the password, starting from 0 and incrementing sequentially.

### Example
- Original password:  
  admin@123

- After applying pepper:  
  0adm4in@8123

## Tools Used
- PHP
- HTML
- XAMPP (Apache)

## Purpose
This stage demonstrates:
- Server-side password processing
- Basic form handling in PHP
- Secure handling concepts in authentication workflows
