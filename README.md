# e-Commerce Shop Repository

Welcome to the e-Commerce Shop repository! This repository houses the code and resources for an e-commerce web application. The application aims to provide users with a seamless and enjoyable online shopping experience. Whether you're a developer, designer, or simply curious, this README will guide you through the repository and help you get started.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies](#technologies)
- [Contributing](#contributing)
- [License](#license)

## Overview

The e-Commerce Shop is a full-stack web application that allows users to browse a wide range of products, add them to their cart, and complete purchases. It provides both customers and administrators with distinct functionalities tailored to their needs.

## Features

- User Authentication: Register an account or log in to an existing account.
- Product Browsing: Explore a diverse selection of products.
- Product Details: View detailed information about each product.
- Shopping Cart: Add and remove products from the shopping cart.
- Checkout Process: Enter shipping details and complete purchases.
- User Profiles: Customers can manage their profiles and order history.
- Admin Panel: Administrators can add, edit, or remove products and manage orders.

## Installation

To set up the e-Commerce Shop locally, follow these steps:

1. Clone the repository:
   ```sh
   git clone https://github.com/nedimmujcinovic/e-Commerce_Shop.git
   ```

2. Navigate to the project directory:
   ```sh
   cd e-Commerce_Shop
   ```

3. Install backend dependencies:
   ```sh
   cd backend
   npm install
   ```

4. Configure the database:
   - Create a PostgreSQL database.
   - Update the `.env` file in the `backend` directory with your database credentials.

5. Run backend migrations and seeders:
   ```sh
   npx sequelize-cli db:migrate
   npx sequelize-cli db:seed:all
   ```

6. Install frontend dependencies:
   ```sh
   cd ../frontend
   npm install
   ```

## Usage

1. Start the backend server:
   ```sh
   cd ../backend
   npm start
   ```

2. Start the frontend application:
   ```sh
   cd ../frontend
   npm start
   ```

3. Access the application in your web browser at `http://localhost:3000`.

## Technologies

- Frontend: HTML, CSS(Tailwind)
- Backend: PHP, MySQL(MariaDB engine)
- Authentication: JWT (JSON Web Tokens)

## Contributing

Contributions to the e-Commerce Shop project are welcome! If you want to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them with descriptive commit messages.
4. Push your changes to your fork.
5. Submit a pull request detailing your changes.

## License

This project is licensed under the [MIT License](LICENSE).

---

We hope you find the e-Commerce Shop repository engaging and valuable. Feel free to explore, contribute, and adapt the code to your needs. If you have any questions or feedback, please don't hesitate to get in touch. Happy coding! 🛍️
