# PHP Web-App File Inclusions and Sessions

## COMP 016 - WEB DEVELOPMENT

**Submitted by:** Paulo Neil A. Sevilla BSIT 3-1  
**Forked from:** https://github.com/frew00/EYEWEAR-E-SHOP.git

---

## Table of Contents
- [Project Overview](#project-overview)
- [Features](#features)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [File Inclusions](#file-inclusions)
- [Session Management](#session-management)
- [Database Schema](#database-schema)
- [Usage Guide](#usage-guide)
- [Admin Panel](#admin-panel)
- [Development](#development)
- [Security Features](#security-features)
- [Troubleshooting](#troubleshooting)

---

## Project Overview

Silicon Optics is a full-featured e-commerce web application for an eyewear shop built with PHP, MySQL, and modern front-end technologies. The application demonstrates the use of **PHP file inclusions** and **session management** for building a secure, modular web application.

### Technology Stack
- **Backend:** PHP 7.4+
- **Database:** MySQL/MariaDB
- **Frontend:** Bootstrap 5.3.8, Bulma 1.0.4, jQuery 3.7.1
- **Build Tools:** PostCSS, Autoprefixer
- **Server:** Apache/XAMPP (recommended)

---

## Features

### Customer Features
- 🛍️ **Product Browsing:** Browse eyewear by category (vision, protection, sunglasses, fashion)
- 🔍 **Search Functionality:** Search products by name or category
- 🛒 **Shopping Cart:** Add, update, and remove items from cart
- 👤 **User Authentication:** Secure login and registration system
- 💳 **Checkout Process:** Complete order placement with payment integration
- 📦 **Order History:** View past orders and order details
- 👁️ **Product Details:** View detailed product information and images

### Admin Features
- 📊 **Dashboard:** Overview of sales, orders, and inventory
- 📦 **Product Management:** Add, edit, and delete products
- 📋 **Order Management:** View and manage customer orders
- 👥 **User Management:** View and manage registered users
- 💰 **Payment Tracking:** Monitor payment transactions
- 🔐 **Role-Based Access:** Admin-only access to management panel

---

## Project Structure

```
PHP_web_app-file_-_sessions/
├── admin/                      # Admin panel files
│   ├── assets/                 # Admin CSS and resources
│   ├── dashboard.php           # Admin dashboard
│   ├── login.php               # Admin login page
│   ├── productlist.php         # Product management
│   ├── product-form.php        # Add/Edit products
│   ├── orders-list.php         # Order management
│   ├── orders-details.php      # Order details view
│   ├── users-list.php          # User management
│   ├── user-details.php        # User details view
│   ├── payments.php            # Payment tracking
│   ├── messages.php            # Messages/notifications
│   └── sidebar.php             # Admin sidebar navigation
│
├── css/                        # Custom stylesheets
├── dist/                       # Compiled CSS output
├── img/                        # Product and site images
├── js/                         # JavaScript files
│
├── misc/                       # PHP utility files (file inclusions)
│   ├── db.php                  # Database connection
│   ├── headernavfooter.php     # Header/navbar/footer components
│   ├── login_function.php      # User login logic (session start)
│   ├── signup_function.php     # User registration logic
│   ├── logout.php              # Logout and session destroy
│   ├── cart_functions.php      # Shopping cart operations (session)
│   ├── disp_products.php       # Product display functions
│   ├── product_page_handler.php # Product page logic
│   └── search_function.php     # Search functionality
│
├── profile/                    # User profile pages
│   └── orders-list.php         # User order history
│
├── template/                   # Reusable template components
│   ├── head.php                # HTML head section
│   ├── login-modal.php         # Login modal component
│   └── scripts.php             # Common JavaScript includes
│
├── index.php                   # Homepage
├── products.php                # Products listing page
├── product-page.php            # Individual product page
├── search.php                  # Search results page
├── cart.php                    # Shopping cart page
├── checkout.php                # Checkout page
├── checkout-success.php        # Order confirmation page
├── checkout-cancel.php         # Checkout cancellation page
├── about.php                   # About us page
├── contact-us.php              # Contact page
├── account.php                 # User account page
│
├── dump-shop-202510171618.sql  # Database dump file
├── package.json                # NPM dependencies
├── postcss.config.js           # PostCSS configuration
├── styles.css                  # Main stylesheet (source)
└── README.md                   # This file
```

---

## Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Apache Server (XAMPP recommended)
- Node.js and npm (for building CSS)

### Step 1: Clone the Repository
```bash
git clone https://github.com/novakamiii/PHP_web_app-file_-_sessions.git
cd PHP_web_app-file_-_sessions
```

### Step 2: Database Setup

**A. Create the Database**

Using MySQL command line or phpMyAdmin:
```sql
CREATE DATABASE shop;
```

**B. Import the Database**

The database dump file is located at the root of the project:
```
dump-shop-202510171618.sql
```

**Using MySQL command line:**
```bash
mysql -u root -p shop < dump-shop-202510171618.sql
```

**Using phpMyAdmin:**
1. Open phpMyAdmin
2. Select the `shop` database
3. Click on "Import" tab
4. Choose the `dump-shop-202510171618.sql` file
5. Click "Go"

### Step 3: Configure Database Connection

Edit the database credentials in `misc/db.php`:

```php
// Located at: misc/db.php

// Configure your MySQL/MariaDB credentials
$db_server = "localhost:3306";  // Change port if different (3306 or 3307)
$db_user = "root";              // Your MySQL username
$db_pass = "";                  // Your MySQL password

// Database name (keep as 'shop')
$db_name = "shop";
```

**Example configurations:**

For XAMPP (default):
```php
$db_server = "localhost:3306";
$db_user = "root";
$db_pass = "";
```

For custom MySQL installation:
```php
$db_server = "localhost:3307";
$db_user = "root";
$db_pass = "your_password";
```

### Step 4: Install Node Dependencies

```bash
npm install
```

### Step 5: Build CSS (Optional)

If you make changes to `styles.css`:

**One-time build:**
```bash
npm run build:css
```

**Watch mode (auto-rebuild on changes):**
```bash
npm run watch:css
```

### Step 6: Start the Server

**Using XAMPP:**
1. Place the project folder in `htdocs/`
2. Start Apache and MySQL from XAMPP Control Panel
3. Access the application at: `http://localhost/PHP_web_app-file_-_sessions/`

**Using PHP built-in server (development only):**
```bash
php -S localhost:8000
```
Then access at: `http://localhost:8000/`

**Using npm start (serves static files only):**
```bash
npm start
```
Then access at: `http://127.0.0.1:5500/`

---

## File Inclusions

This project demonstrates PHP file inclusion best practices for modular code organization.

### Types of Inclusions Used

**`include` vs `require` vs `include_once` vs `require_once`**

- **`include`**: Includes file, continues on error (warning only)
- **`require`**: Includes file, stops on error (fatal error)
- **`include_once`**: Includes file only once, prevents duplicate includes
- **`require_once`**: Same as include_once but stops on error

### File Inclusion Patterns in This Project

#### 1. **Database Connection (Required)**
```php
// Used in: misc/*.php files
include 'db.php';  // or require 'db.php'
```
The `db.php` file is included in all files that need database access.

#### 2. **Header/Navigation/Footer Components (Once per page)**
```php
// Used in: index.php, products.php, etc.
include_once 'misc/headernavfooter.php';
```
This file contains reusable navigation and footer functions.

#### 3. **Product Display Functions**
```php
// Used in: index.php
include_once 'misc/disp_products.php';
```
Functions for displaying product listings.

#### 4. **Template Components**
```php
// Used in: most pages
require_once 'template/head.php';  // HTML head section
```
Reusable HTML components loaded with `require_once`.

#### 5. **Admin Components**
```php
// Used in: admin/*.php
require_once __DIR__ . '/../misc/db.php';  // Using relative path from admin folder
```
Admin files use `__DIR__` for proper path resolution.

### Benefits of File Inclusions
- ✅ **Code Reusability:** Write once, use everywhere
- ✅ **Maintainability:** Update in one place, changes reflect everywhere
- ✅ **Modularity:** Separate concerns (database, display, logic)
- ✅ **Security:** Centralized database credentials
- ✅ **Clean Code:** Avoid repetition (DRY principle)

---

## Session Management

This project extensively uses PHP sessions for user authentication and shopping cart functionality.

### Session Usage Patterns

#### 1. **User Authentication Sessions**

**Login Process** (`misc/login_function.php`):
```php
session_start();  // Always called at the start

// After successful login verification:
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];
```

**Session Variables Stored:**
- `user_id`: Unique user identifier
- `user_name`: User's display name
- `user_email`: User's email address

#### 2. **Admin Authentication Sessions**

**Admin Login** (`admin/login.php`):
```php
session_start();

// After successful admin verification:
$_SESSION['admin_id'] = $user['id'];
$_SESSION['admin_name'] = $user['name'];
$_SESSION['admin_email'] = $user['email'];
```

**Session Variables Stored:**
- `admin_id`: Admin user ID
- `admin_name`: Admin display name
- `admin_email`: Admin email

#### 3. **Shopping Cart Sessions**

**Cart Operations** (`misc/cart_functions.php`):
```php
session_start();

// Cart data stored in session
$_SESSION['cart'] = [
    'product_id' => [
        'name' => 'Product Name',
        'quantity' => 1,
        'price' => 99.00,
        'frame_size' => 'medium'
    ]
];
```

#### 4. **Session Lifecycle**

**Starting a Session:**
```php
session_start();  // Must be called before any output
```

Files that start sessions:
- `misc/headernavfooter.php` - For navigation (checks login status)
- `misc/login_function.php` - During login
- `misc/cart_functions.php` - For cart operations
- `admin/login.php` - For admin access
- `checkout-success.php` - After order completion

**Destroying a Session** (`misc/logout.php`):
```php
session_start();
session_unset();     // Unset all session variables
session_destroy();   // Destroy the session
header("Location: ../index.php");  // Redirect to homepage
```

#### 5. **Session Security**

The application implements several security measures:
- ✅ Password hashing with `password_verify()`
- ✅ Input sanitization with `filter_input()`
- ✅ Prepared statements to prevent SQL injection
- ✅ Role-based access control (user vs admin)
- ✅ Session regeneration on login

### Checking Login Status

```php
// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
} else {
    // User is not logged in
    // Redirect to login or show login modal
}
```

### Session Flow Diagram

```
┌─────────────┐
│   Visitor   │
└──────┬──────┘
       │
       ├─── Login ──────► session_start()
       │                  ├─ $_SESSION['user_id']
       │                  ├─ $_SESSION['user_name']
       │                  └─ $_SESSION['user_email']
       │
       ├─── Shopping ────► $_SESSION['cart']
       │                  └─ Cart items data
       │
       └─── Logout ──────► session_destroy()
                           └─ Clear all session data
```

---

## Database Schema

The application uses a MySQL database named `shop` with the following tables:

### Tables Overview

#### 1. **`users`** - User Accounts
Stores customer and admin account information.
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- name (VARCHAR)
- email (VARCHAR, UNIQUE)
- password (VARCHAR, hashed)
- role (VARCHAR) - 'user' or 'admin'
- is_admin (BOOLEAN)
- last_session (DATETIME)
- created_at (DATETIME)
```

#### 2. **`products`** - Product Catalog
Stores all eyewear products.
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- prod_name (VARCHAR)
- price (DECIMAL(10,2))
- category (VARCHAR) - 'vision', 'protection', 'sunglasses', 'fashion'
- stock (INT)
- description (TEXT)
- img (VARCHAR) - image filename
- date_added (DATETIME)
```

**Product Categories:**
- `vision`: Vision correction glasses
- `protection`: Protective eyewear (blue light, safety)
- `sunglasses`: UV protection sunglasses
- `fashion`: Fashion/designer eyewear

#### 3. **`cart`** - Shopping Cart Items
Stores items added to users' carts.
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- usr_id (INT, FOREIGN KEY to users.id)
- prod_name (VARCHAR)
- quantity (INT)
- price (INT)
- frame_size (VARCHAR) - 'small', 'medium', 'large'
- dateadded (DATETIME)
```

#### 4. **`orders`** - Customer Orders
Stores completed orders.
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- user_id (INT, FOREIGN KEY to users.id)
- total_amount (DECIMAL(10,2))
- status (VARCHAR) - 'pending', 'processing', 'completed', 'cancelled'
- payment_status (VARCHAR)
- shipping_address (TEXT)
- order_date (DATETIME)
```

#### 5. **`order_items`** - Order Line Items
Stores individual items in each order.
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- order_id (INT, FOREIGN KEY to orders.id)
- product_id (INT, FOREIGN KEY to products.id)
- quantity (INT)
- price (DECIMAL(10,2))
- frame_size (VARCHAR)
```

#### 6. **`payments`** - Payment Transactions
Stores payment information.
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- order_id (INT, FOREIGN KEY to orders.id)
- payment_method (VARCHAR)
- amount (DECIMAL(10,2))
- transaction_id (VARCHAR)
- payment_date (DATETIME)
- status (VARCHAR)
```

### Database Relationships

```
users (1) ─────► (N) orders
orders (1) ─────► (N) order_items
products (1) ───► (N) order_items
orders (1) ─────► (1) payments
users (1) ──────► (N) cart
```

---

## Usage Guide

### For Customers

#### 1. **Registration**
- Click "Sign Up" in the navigation
- Fill in name, email, and password
- Submit to create account

#### 2. **Login**
- Click "Login" in the navigation
- Enter email and password
- Click "Login" to access your account

#### 3. **Browse Products**
- View featured products on homepage
- Click "Products" to see all items
- Filter by category (vision, protection, sunglasses, fashion)

#### 4. **Search Products**
- Use the search bar in navigation
- Enter product name or keyword
- View matching results

#### 5. **View Product Details**
- Click on any product card
- View detailed description and price
- Select frame size
- Add to cart

#### 6. **Manage Cart**
- Click cart icon to view cart
- Update quantities
- Remove items
- Proceed to checkout

#### 7. **Checkout**
- Review order summary
- Enter shipping information
- Select payment method
- Complete order

#### 8. **View Orders**
- Go to "My Orders" in profile
- View order history
- Check order status and details

---

## Admin Panel

### Accessing Admin Panel

**URL:** `http://localhost/PHP_web_app-file_-_sessions/admin/login.php`

**Default Admin Credentials:**
Check the database dump or create an admin user with:
- Role: `admin`
- OR `is_admin` = 1

### Admin Features

#### 1. **Dashboard** (`admin/dashboard.php`)
- Overview of store statistics
- Recent orders
- Low stock alerts

#### 2. **Product Management**
- **Product List** (`admin/productlist.php`): View all products
- **Add Product** (`admin/product-form.php`): Add new products
- **Edit Product**: Update existing products
- **Delete Product**: Remove products from catalog

#### 3. **Order Management**
- **Orders List** (`admin/orders-list.php`): View all orders
- **Order Details** (`admin/orders-details.php`): View detailed order information
- Update order status
- Track order fulfillment

#### 4. **User Management**
- **Users List** (`admin/users-list.php`): View all registered users
- **User Details** (`admin/user-details.php`): View user information
- View user order history

#### 5. **Payment Tracking** (`admin/payments.php`)
- View all payment transactions
- Track payment status
- Monitor revenue

---

## Development

### NPM Scripts

```bash
# Start development server (static files)
npm start

# Build CSS (one-time)
npm run build:css

# Watch CSS (auto-rebuild on changes)
npm run watch:css
```

### CSS Development

The project uses PostCSS for CSS processing:

**Source file:** `styles.css`  
**Output file:** `dist/styles.css`

**PostCSS plugins:**
- `postcss-import`: Import CSS files
- `autoprefixer`: Add vendor prefixes automatically

### Adding New Features

#### Adding a New Page
1. Create PHP file in root directory (e.g., `new-page.php`)
2. Include necessary files:
   ```php
   include_once 'misc/headernavfooter.php';
   require_once 'template/head.php';
   ```
3. Add page content
4. Include navigation and footer:
   ```php
   <?php navbarcall(); ?>
   <!-- Your content here -->
   <?php footercall(); ?>
   ```

#### Adding a New Database Table
1. Design table schema
2. Add CREATE TABLE statement to SQL dump
3. Update documentation
4. Create PHP functions to interact with table

---

## Security Features

### Implemented Security Measures

#### 1. **Password Security**
- ✅ Passwords hashed using `password_hash()` with bcrypt
- ✅ Verification with `password_verify()`
- ✅ Never stored in plain text

#### 2. **SQL Injection Prevention**
- ✅ Prepared statements with parameter binding
- ✅ `mysqli_prepare()` and `mysqli_stmt_bind_param()`
- ✅ No direct SQL concatenation with user input

#### 3. **Input Sanitization**
- ✅ `filter_input()` with appropriate filters:
  - `FILTER_SANITIZE_EMAIL` for emails
  - `FILTER_SANITIZE_SPECIAL_CHARS` for text
  - `FILTER_UNSAFE_RAW` when needed with additional validation

#### 4. **Session Security**
- ✅ Session data validated on each request
- ✅ Role-based access control (user vs admin)
- ✅ Proper session destruction on logout

#### 5. **Access Control**
- ✅ Admin pages check for admin session
- ✅ Unauthorized users redirected to login
- ✅ Role verification from database

### Security Best Practices

**For Developers:**
- Always use prepared statements for database queries
- Never trust user input - always sanitize and validate
- Use HTTPS in production
- Keep passwords hashed
- Implement CSRF protection (future enhancement)
- Regular security audits

---

## Troubleshooting

### Common Issues and Solutions

#### 1. **Database Connection Failed**

**Error:** `mysqli_connect(): (HY000/1045): Access denied`

**Solution:**
- Check credentials in `misc/db.php`
- Verify MySQL/MariaDB is running
- Ensure database `shop` exists
- Check MySQL port (3306 or 3307)

#### 2. **Session Not Working**

**Error:** Session variables not persisting

**Solution:**
- Ensure `session_start()` is called before any output
- Check PHP session configuration
- Verify `session.save_path` has write permissions
- Clear browser cookies

#### 3. **CSS Not Loading**

**Error:** Styles not applied

**Solution:**
- Run `npm run build:css`
- Check if `dist/styles.css` exists
- Verify path in HTML: `<link href="dist/styles.css">`
- Clear browser cache

#### 4. **Images Not Displaying**

**Error:** Product images broken

**Solution:**
- Verify images exist in `img/` directory
- Check image filenames in database match actual files
- Ensure correct path: `img/{filename}.jpg`

#### 5. **Admin Login Not Working**

**Error:** Cannot access admin panel

**Solution:**
- Verify user has `role = 'admin'` or `is_admin = 1` in database
- Check admin session variables are set
- Review `admin/login.php` logic

#### 6. **Port Already in Use**

**Error:** `Address already in use`

**Solution:**
- Change port in XAMPP/server configuration
- Update `misc/db.php` with correct port
- Stop conflicting services

---

## Contributing

This is an educational project for COMP 016 - Web Development.

### Contribution Guidelines
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

---

## License

This project is created for educational purposes as part of COMP 016 - Web Development course.

Original project forked from: https://github.com/frew00/EYEWEAR-E-SHOP.git

---

## Contact

**Developer:** Paulo Neil A. Sevilla  
**Program:** BSIT 3-1  
**Course:** COMP 016 - WEB DEVELOPMENT

---

## Acknowledgments

- Original EYEWEAR-E-SHOP project by frew00
- Bootstrap team for the UI framework
- PHP and MySQL communities

---

**Last Updated:** January 2026
