# Second-Hand Clothing Web Application

##  Overview
- Pastimes is a full-stack web-based e-commerce application that enables users to buy and sell second-hand clothing online. The system demonstrates the use of PHP, MySQL, and session-based authentication to simulate a real-world online marketplace. The platform supports user registration, admin verification, product management, shopping cart functionality, and order tracking.

---

## System Objectives
- Provide a secure platform for second-hand clothing trading
- Implement role-based access control (User / Admin)
- Demonstrate CRUD operations using PHP and MySQL
- Apply session management for authentication
- Enable interactive user experience through search, filtering, and cart functionality

---

## Features

### User Features
- Secure user registration with password hashing (`password_hash`)
- Login system with session authentication
- Browse and search clothing items using filters and live search (AJAX)
- Add/remove items from shopping cart (session-based)
- Checkout system that generates orders
- View order history and status tracking

---

### Seller Features
- Upload clothing items with:
  - Title
  - Description
  - Price
  - Image upload
- Manage listed products

---

### Admin Features
- Secure admin login system
- Verify newly registered users before platform access
- Manage user accounts via dashboard
- Control system access and maintain platform integrity

---

## System Architecture

### Backend
- PHP (Server-side scripting)
- MySQL (Relational database management)
- Session handling for authentication and user state

### Frontend
- HTML5 (Structure)
- CSS3 (Styling and layout)
- JavaScript (AJAX live search functionality)

---

## Database Functionality
The system uses a relational database structure with the following key operations:
- User management (tblUser)
- Product management (tblClothes)
- Order processing (tblOrders, tblOrderItems)
- Admin verification system

All CRUD operations are performed using PHP and MySQL queries.

---

## Security Implementation
- Password hashing using `password_hash()`
- Session-based login authentication
- Admin-only access control for sensitive functions
- Input sanitization using `mysqli_real_escape_string()`

---

## How to Run the Project

1. Install XAMPP (Apache + MySQL)
2. Copy project folder into `htdocs`
3. Start Apache and MySQL services
4. Open phpMyAdmin and import database
5. Run project using:
http://localhost/pastimes


---

##  Development Environment
- PHP 8+
- MySQL / phpMyAdmin
- XAMPP Server
- Visual Studio Code

---

##  Conclusion
- The Pastimes web application successfully demonstrates the implementation of a full-stack e-commerce system using PHP and MySQL. It incorporates essential web development concepts such as authentication, session management, CRUD operations, and dynamic user interaction, making it a complete and functional online marketplace prototype.

---

##  Authors
- Oladayo william oladele - ST10157844
- FUMANI THATHO YIBGWANE BALOYI - ST10450908