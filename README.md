# php-pure-boilerplate

## Description

**php-pure-boilerplate** is a minimalistic boilerplate for PHP projects, designed to provide a clean and efficient starting point for developing web applications or libraries. This repository focuses on simplicity and best practices, ensuring that your codebase remains maintainable and scalable from the outset.

### Features

- **Environment Configuration**: Easy configuration management with `.env` support.
- **Documentation**: Comprehensive documentation to guide you through setup and usage.

### Getting Started

1. **Clone the repository**:

   ```sh
   git clone https://github.com/ranggawisnus/spk-stress-siswa-ujian.git
   cd php-pure-boilerplate
   ```

2. **Set up environment variables**:

   - Copy `.env.example` to `.env` and customize as needed.
   - The `.env.example` file includes the following variables:
     ```dotenv
     DB_NAME=
     DB_USER=
     DB_PASS=
     ```
   - Provide values for these variables without quotes. For example:
     ```dotenv
     DB_NAME=your_database_name
     DB_USER=your_database_user
     DB_PASS=your_database_password
     ```

3. **Run the development server**:
   ```sh
   php -S localhost:8000 -t public
   ```

### Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your improvements. Ensure that your code adheres to the PSR standards and includes appropriate tests.

### License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

### Contact

For any questions or suggestions, feel free to open an issue or contact the repository maintainer at your-email@example.com.

---

Start your PHP project with confidence and minimal setup using **php-pure-boilerplate**!
