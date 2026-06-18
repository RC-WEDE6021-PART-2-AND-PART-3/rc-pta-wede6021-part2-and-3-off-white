# Pastimes - Second-Hand Clothing Marketplace

## Project Overview

Pastimes is a web-based marketplace application that allows users to buy and sell second-hand branded clothing through a secure and user-friendly platform.

The system was developed using PHP, MySQL, HTML, CSS, JavaScript, and XAMPP. It supports customer registration, administrator verification, clothing management, shopping cart functionality, checkout processing, and order tracking.



### Group Members

ST10450908      Fumani Thatho Yibgwane Baloyi 
ST10157844      Oladele Oladayo William       

---

 System Features

## Customer Features

* User registration
* Secure login using hashed passwords
* Account verification by administrator
* Browse available clothing items
* Search clothing items by title
* Filter clothing items by price
* View detailed product information
* Add products to shopping cart
* Remove products from shopping cart
* Continue shopping functionality
* Checkout functionality
* View order history
* View order status



## Seller Features

* Submit clothing items for sale
* Upload clothing images
* Add clothing description
* Add clothing brand
* Add pricing information
* Manage personal clothing listings


## Administrator Features

* Administrator login
* Verify new customer registrations
* Manage customers
* Add clothing items
* Update clothing items
* Delete clothing items
* Approve seller requests
* Manage orders
* Communicate with buyers and sellers

---

# Technologies Used


* CSS
* PHP 8
* MySQL
* phpMyAdmin
* XAMPP


# Database Structure

## tblUser

Stores customer and seller information.

Fields:

* id
* name
* email
* username
* password
* isVerified



## tblAdmin

Stores administrator credentials.

Fields:

* id
* username
* password


## tblClothes

Stores clothing listings.

Fields:

* id
* title
* description
* brand
* price
* image
* user_id



## tblOrders

Stores order information.

Fields:

* id
* user_id
* total
* status



## tblOrderItems

Stores products associated with each order.

Fields:

* id
* order_id
* product_id



## tblMessages

Stores communication between administrators, buyers, and sellers.

Fields:

* id
* sender
* receiver
* message
* date_sent



 Installation Instructions

## Step 1: Install XAMPP

Download and install XAMPP.

---

## Step 2: Start Services

Open XAMPP Control Panel.

Start:

* Apache
* MySQL

---

## Step 3: Copy Project

Copy the project folder into:

C:\xampp\htdocs\pastimes

---

## Step 4: Create Database

Open:

http://localhost/phpmyadmin

Create a database called:

ClothingStore

---

## Step 5: Import Database

Select ClothingStore.

Import:

myClothingStore.sql

---

## Step 6: Run Application

Open browser and navigate to:

http://localhost/pastimes/login.php

---

# Default Administrator Account

Username:admin

Password:admin123


---



# Future Improvements

* Online payment gateway integration
* Advanced search and filtering
* Wishlist functionality
* Product ratings and reviews
* Email notifications
* Mobile application integration

---

# Conclusion

Pastimes provides a complete second-hand clothing marketplace that enables secure buying and selling of branded clothing items. The application demonstrates the practical implementation of PHP programming, MySQL database integration, session management, CRUD functionality, user authentication, and e-commerce principles.