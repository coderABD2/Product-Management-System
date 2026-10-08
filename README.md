# 🛒 E-Commerce & Product Management System

A dynamic, full-stack **E-Commerce & Food/Product Management Web Application** built using **PHP, MySQL, Bootstrap 5, and FontAwesome**.
This application supports product cataloging, session-based shopping cart management, CRUD actions for store items, and data export (CSV/PDF).

---

## 📌 Project Description

This project provides a complete e-commerce solution where store admins can manage inventory (add, edit, delete products with custom image uploads) and users can browse categorized products, add items to a dynamic shopping cart, and perform checkout operations.

---

## 🚀 Key Features

* 🛍️ **Dynamic Product Catalog:** Displays store products with high-quality images, descriptions, pricing, and category badges.
* 🛒 **Session-Based Shopping Cart:** Live cart management, item quantity counters, dynamic subtotal & grand total calculation.
* 📦 **Product Management (CRUD):** 
  * Add new store items with custom image uploads (`add.php`).
  * Edit existing product details, price, and category (`edit.php`).
  * Delete out-of-stock items safely from database (`delete.php`).
* 📊 **Data Export Functionality:** Export product inventory directly into **CSV file** format (`export.php`).
* 📄 **PDF Generation:** Integrated **TCPDF library** via Composer for generating invoices and reports.
* 🔐 **User Authentication System:** Secure registration and login authentication using password hashing (`password_hash`).
* 🎨 **Modern Dark/Light UI:** Styled using Bootstrap 5 and FontAwesome icons.

---

## 🛠️ Tech Stack & Dependencies

* **Backend:** PHP 
* **Database:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, Bootstrap 5.
* **Package Manager:** Composer (TCPDF Dependency).
* **Database Driver:** PHP MySQLi (Prepared Statements).

---

## 📁 File Structure

```text
ecommerce-management-system/
│── db.php               # Database configuration connection
│── homes.php            # Store homepage & product list view
│── cart.php             # Shopping cart & checkout logic
│── add.php              # Product creation form & upload logic
│── edit.php             # Edit product details
│── delete.php           # Delete menu/product item
│── export.php           # CSV data export script
│── login.php            # User authentication form
│── register.php         # User registration
│── upload/              # Directory for uploaded product images
│── dbs.sql              # Exported MySQL database structure & sample data[cite: 22, 23]
│── composer.json        # TCPDF composer dependency file[cite: 19]
└── screenshots/         # Application screenshots folder
