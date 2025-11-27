# 🐦‍🔥 Pokestellar – A Pokémon E-Commerce Platform

![Project Status](https://img.shields.io/badge/status-active-success.svg)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white)

> **Pokestellar** is a fan-made e-commerce website where users can browse, explore, and "adopt" their favorite Pokémon. This project showcases full-stack development skills using **PHP**, **MySQL**, and **Tailwind CSS**.

---

## 📝 Table of Contents
- [About](#-about)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Folder Structure](#-folder-structure)
- [Getting Started](#-getting-started)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)

---

## 🧐 About <a name = "about"></a>
Pokestellar is designed to simulate a modern e-commerce experience with a fun Pokémon theme. Users can view product details, manage a shopping cart, and proceed through a mock checkout process. The application focuses on clean UI/UX design and robust backend functionality.

---

## 🚀 Features <a name = "features"></a>
* 🔍 **Catalog Browsing:** Filter and search through a wide variety of Pokémon.
* 🛒 **Shopping Cart:** Add items, view cart summary, and manage quantities.
* 💳 **Mock Checkout:** A simulated purchase flow.
* 📱 **Responsive Design:** Fully optimized for mobile and desktop using Tailwind CSS.
* 🔐 **User Accounts:** (If applicable) User login and registration.
* 🗂️ **Dynamic Backend:** Product data served from a MySQL database.

---

## 💻 Tech Stack <a name = "tech_stack"></a>

| Area | Technologies |
|---|---|
| **Frontend** | HTML5, JavaScript, **Tailwind CSS** |
| **Backend** | **PHP** (Vanilla) |
| **Database** | **MySQL** (via phpMyAdmin) |
| **Tools** | XAMPP, Git, NPM |

---

## 📂 Folder Structure <a name = "folder_structure"></a>

```text
Pokestellar-website/
├── config/           # Database configuration files
├── public/           # Publicly accessible assets (images, icons)
├── src/              # Source code for PHP logic and views
├── node_modules/     # Node dependencies (Tailwind CSS)
├── output.css        # Compiled Tailwind CSS file
├── package.json      # NPM scripts and dependencies
└── README.md         # Project documentation
````

-----

## 🏁 Getting Started \<a name = "getting\_started"\>\</a\>

Follow these instructions to set up the project locally.

### Prerequisites

  * **XAMPP** (or any local PHP/MySQL server)
  * **Node.js** & **npm** (for Tailwind CSS updates)
  * A web browser

### Installation Steps

1.  **Clone the Repository**

    ```bash
    git clone [https://github.com/M1nkyLab/Pokestellar-website.git](https://github.com/M1nkyLab/Pokestellar-website.git)
    cd Pokestellar-website
    ```

2.  **Install Node Dependencies**
    This project uses Tailwind CSS. Install the necessary packages:

    ```bash
    npm install
    ```

3.  **Database Setup**

      * Open **XAMPP Control Panel** and start **Apache** and **MySQL**.
      * Go to `http://localhost/phpmyadmin`.
      * Create a new database (e.g., named `pokestellar_db`).
      * **Import** the SQL file provided in the project (check the root or `config` folder for a `.sql` file). *If no file is present, you may need to create the tables manually based on the code.*

4.  **Configure Connection**

      * Navigate to the `config/` folder.
      * Open the database connection file (e.g., `db.php` or `config.php`).
      * Update the credentials to match your local setup:
        ```php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pokestellar_db"; // Your database name
        ```

5.  **Run Tailwind (Optional)**
    If you make changes to the CSS, run the build command:

    ```bash
    npx tailwindcss -i ./src/input.css -o ./output.css --watch
    ```

    *(Note: Check `package.json` for the exact script name)*

6.  **Launch the App**

      * Move the project folder to your XAMPP `htdocs` directory (e.g., `C:\xampp\htdocs\Pokestellar-website`).
      * Open your browser and visit: `http://localhost/Pokestellar-website`

-----

## 📸 Screenshots \<a name = "screenshots"\>\</a\>

*Add screenshots of your website here to show off the UI.*

| Home Page | Product Page |
|:---:|:---:|
| \<img src="path/to/image1.png" width="400"\> | \<img src="path/to/image2.png" width="400"\> |

-----

## 🤝 Contributing \<a name = "contributing"\>\</a\>

Contributions are welcome\!

1.  Fork the project.
2.  Create your feature branch (`git checkout -b feature/AmazingFeature`).
3.  Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4.  Push to the branch (`git push origin feature/AmazingFeature`).
5.  Open a Pull Request.

-----

## 📞 Contact

**M1nkyLab** - [GitHub Profile](https://www.google.com/search?q=https://github.com/M1nkyLab)

Project Link: [https://github.com/M1nkyLab/Pokestellar-website](https://www.google.com/search?q=https://github.com/M1nkyLab/Pokestellar-website)

````

### 💡 Recommendation:
I noticed you have the `node_modules` folder inside your GitHub repository. It is generally **best practice to ignore this folder** because it contains thousands of dependency files that can be re-installed by anyone using `npm install`.

**To fix this:**
1.  Create a file named `.gitignore` in your root folder (if you don't have one).
2.  Add the following line to it:
    ```
    node_modules/
    ```
3.  Run these commands in your terminal to remove it from the repo (but keep it locally):
    ```bash
    git rm -r --cached node_modules
    git commit -m "Remove node_modules from repository"
    git push
    ```
````
