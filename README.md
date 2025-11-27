


# 🐦‍🔥 Pokestellar – A Pokémon E-Commerce Platform

![Project Status](https://img.shields.io/badge/status-active-success.svg)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=flat\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat\&logo=mysql\&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat\&logo=tailwind-css\&logoColor=white)

<img width="1919" height="1079" alt="image" src="https://github.com/user-attachments/assets/c22dea3a-6a24-493d-adf8-28ac661a311c" />

> **Pokestellar** is a fan-made e-commerce website where users can browse, explore, and "adopt" their favorite Pokémon. This project showcases full-stack development skills using **PHP**, **MySQL**, and **Tailwind CSS**.

---

## 📝 Table of Contents

* [About](#about)
* [Features](#features)
* [Tech Stack](#tech-stack)
* [Folder Structure](#folder-structure)
* [Getting Started](#getting-started)
* [Screenshots](#screenshots)
* [Contributing](#contributing)
* [Contact](#contact)

---

## 🧐 About <a name="about"></a>

Pokestellar is designed to simulate a modern e-commerce experience with a fun Pokémon theme. Users can view product details, manage a shopping cart, and proceed through a mock checkout process. The application focuses on clean UI/UX design and robust backend functionality.

---

## 🚀 Features <a name="features"></a>

* 🔍 **Catalog Browsing:** Filter and search through a wide variety of Pokémon
* 🛒 **Shopping Cart:** Add items, view cart summary, manage quantities
* 💳 **Mock Checkout:** Simulated purchase flow
* 📱 **Responsive Design:** Optimized for all screen sizes using Tailwind
* 🔐 **User Accounts:** (If applicable) Login & registration
* 🗂️ **Dynamic Backend:** Products served from a MySQL database

---

## 💻 Tech Stack <a name="tech-stack"></a>

| Area         | Technologies                    |
| ------------ | ------------------------------- |
| **Frontend** | HTML5, JavaScript, Tailwind CSS |
| **Backend**  | PHP (Vanilla)                   |
| **Database** | MySQL (via phpMyAdmin)          |
| **Tools**    | XAMPP, Git, NPM                 |

---

## 📂 Folder Structure <a name="folder-structure"></a>

```
Pokestellar-website/
├── config/           # Database configuration files
├── public/           # Public assets (images, icons)
├── src/              # PHP logic and views
├── node_modules/     # Tailwind dependencies
├── output.css        # Compiled Tailwind file
├── package.json      # NPM scripts and dependencies
└── README.md         # Project documentation
```

---

## 🏁 Getting Started <a name="getting-started"></a>

### Prerequisites

* XAMPP (or any PHP/MySQL server)
* Node.js & npm
* Web browser

---

### 1. Clone the Repository

```bash
git clone https://github.com/M1nkyLab/Pokestellar-website.git
cd Pokestellar-website
```

---

### 2. Install Node Dependencies

```bash
npm install
```

---

### 3. Database Setup

1. Open XAMPP → Start **Apache** & **MySQL**
2. Visit: `http://localhost/phpmyadmin`
3. Create a database (example: `pokestellar_db`)
4. Import the included `.sql` file
   *(If missing, create tables manually based on code.)*

---

### 4. Configure Database Connection

Edit `config/db.php` (or similar):

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokestellar_db";
```

---

### 5. Build Tailwind (Optional)

```bash
npx tailwindcss -i ./src/input.css -o ./output.css --watch
```

---

### 6. Launch the App

Move project folder to:

```
C:\xampp\htdocs\Pokestellar-website
```

Open in browser:

```
http://localhost/Pokestellar-website
```

---

## 📸 Screenshots <a name="screenshots"></a>

<img width="1919" height="1079" alt="image" src="https://github.com/user-attachments/assets/afbf29fe-f463-4f82-870c-7b2c51d18c73" />

---

## 🤝 Contributing <a name="contributing"></a>

1. Fork the project
2. Create a new branch

   ```bash
   git checkout -b feature/AmazingFeature
   ```
3. Commit changes
4. Push the branch
5. Open a Pull Request

---

## 📞 Contact <a name="contact"></a>

**M1nkyLab** — [GitHub Profile](https://www.google.com/search?q=https://github.com/M1nkyLab)

Project Link:
[https://github.com/M1nkyLab/Pokestellar-website](https://www.google.com/search?q=https://github.com/M1nkyLab/Pokestellar-website)


