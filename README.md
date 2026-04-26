# Website MUA (Make-Up Artist)

Welcome to the Website MUA repository! This is a Laravel-based project. Below you will find the requirements and instructions for collaborators to get started and edit this project.

## Requirements

To run this project locally, make sure your development environment meets the following requirements:
- **PHP**: >= 8.3 (or 8.4 if required by specific dependencies)
- **Composer**: Dependency manager for PHP
- **Node.js & npm**: For managing frontend assets
- **Database**: SQLite (default), MySQL, or PostgreSQL

## Getting Started (Setup)

Follow these steps to set up the project on your local machine:

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd PBW/website-mua
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install frontend dependencies:**
   ```bash
   npm install
   ```

4. **Set up environment variables:**
   Copy the example environment file and configure it if necessary (like database credentials).
   ```bash
   cp .env.example .env
   ```

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

7. **Start the development servers:**
   You will need to run both the PHP server and the Vite frontend server.
   
   In one terminal, run:
   ```bash
   php artisan serve
   ```
   
   In a second terminal, run:
   ```bash
   npm run dev
   ```

## How to Edit This Branch

If you are collaborating and need to edit the project, follow these steps to ensure you are up-to-date and your changes are safely pushed:

### Pushing Directly to This Branch (`main`)

1. **Pull the latest changes** before making any edits to avoid conflicts:
   ```bash
   git pull origin main
   ```
2. **Make your changes** in the codebase.
3. **Stage your changes:**
   ```bash
   git add .
   ```
4. **Commit your changes** with a descriptive message:
   ```bash
   git commit -m "Add a descriptive message about what you changed"
   ```
5. **Push the changes** to GitHub:
   ```bash
   git push origin main
   ```

### Recommended Workflow (Using Feature Branches)

For larger changes, it's highly recommended to use a separate branch:
1. Ensure you are up-to-date: `git pull origin main`
2. Create a new branch: `git checkout -b feature/your-feature-name`
3. Make your changes, commit them, and push the branch: `git push origin feature/your-feature-name`
4. Open a Pull Request on GitHub to merge into `main`.

---
Happy Coding!
