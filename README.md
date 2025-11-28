# Pokestellar - Pokémon E-Commerce Website

<div align="center">
  <img src="https://github.com/user-attachments/assets/c22dea3a-6a24-493d-adf8-28ac661a311c" alt="Pokestellar Dashboard" width="800">
  <br><br>
  <b>Gotta Buy 'Em All! The ultimate destination for Pokémon cards and merchandise.</b>
</div>

---

**Pokestellar** is a responsive e-commerce application built for Pokémon enthusiasts. It features a seamless shopping experience allowing users to browse products, manage their cart, and securely checkout, while providing administrators with a robust dashboard for managing orders and inventory.

## 🌟 Key Features

Based on the project structure, the application includes the following features:

### 🛍️ User Features
* **Product Browsing**: View a catalog of Pokémon products with details.
* **Shopping Cart**: Add items to a cart and manage selections before purchasing.
* **Checkout System**: Secure checkout process to finalize orders.
* **Order History**: Users can view their past orders.
* **User Authentication**: Secure login and logout functionality,.
* **Informational Pages**: Dedicated pages for "About Us" and "Contact Us",.

### 🛠️ Admin Features
* **Admin Dashboard**: A dedicated interface for administrators to manage the site.
* **Order Management**: Ability to delete or manage existing orders.

## 💻 Technology Stack

* **Backend**: PHP (Native)
* **Frontend**: HTML, JavaScript, [Tailwind CSS](https://tailwindcss.com/)
* **Database**: MySQL (implied by `db_connect.php`)
* **Package Manager**: npm (Node Package Manager) for managing CSS dependencies.

## 📋 Installation Prerequisites

Before you begin, ensure you have the following installed:
1.  **Local Server Environment**: XAMPP, WAMP, or any environment supporting PHP and MySQL.
2.  **Node.js & npm**: Required to build the Tailwind CSS styles.
3.  **Code Editor**: VS Code or similar.

## 🚀 Installation Guide

1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/your-username/pokestellar-website.git](https://github.com/your-username/pokestellar-website.git)
    ```
    *If using XAMPP, place the folder inside `htdocs`.*

2.  **Install Dependencies**
    Open your terminal in the project root and install the necessary node modules:
    ```bash
    npm install
    ```

3.  **Build CSS**
    Generate the Tailwind CSS output file:
    ```bash
    npm run build
    ```

4.  **Database Setup**
    * Create a new database in phpMyAdmin (e.g., `pokestellar_db`).
    * Import the SQL file (if provided in the repo) or manually set up tables based on `src/db_connect.php`.
    * Configure your database credentials in `src/db_connect.php`.

5.  **Run the Project**
    * Start your Apache and MySQL modules in XAMPP.
    * Open your browser and navigate to `http://localhost/pokestellar-website/src/index.php`.

## 📂 Project Structure

```text
pokestellar-website/
├── config/                 # Configuration files
│   └── tailwind.config.js  # Tailwind CSS configuration
├── public/                 # Public assets
│   └── input.css           # Source CSS file
├── src/                    # Source code (PHP logic & Views)
│   ├── admin.php           # Admin dashboard
│   ├── cart.php            # Shopping cart logic
│   ├── checkout.php        # Order finalization
│   ├── db_connect.php      # Database connection settings
│   ├── index.php           # Homepage
│   ├── login.php           # User login page
│   ├── product.php         # Product catalog
│   └── ...
├── node_modules/           # Node.js dependencies
├── package.json            # Project metadata and scripts
└── output.css              # Compiled CSS (Tailwind output)
