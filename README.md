# Task Manager

A robust web-based task management application built with Yii2 Basic Template. The application allows users to manage their personal tasks securely with features like user authentication, CRUD operations for tasks, and a responsive interface.

## Features

- **User Authentication**
  - Secure registration and login system
  - Password hashing and validation
  - Session management
  - Protected routes

- **Task Management**
  - Create, view, update, and delete tasks
  - Task attributes include title, description, status, and due date
  - Filter tasks by status
  - User-specific task visibility

- **Responsive Design**
  - Clean and intuitive user interface
  - Consistent styling across devices

## Prerequisites

- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Git

## Installation

1. Clone the repository:
```bash
git clone https://github.com/Rahimfa/Project-C1.git
cd Project-C1
```

2. Install dependencies:
```bash
composer install
```

3. Create database and update configuration:
```bash
# Create a new MySQL database
mysql -u root -p
CREATE DATABASE task_manager;

# Copy configuration template
cp config/db.example.php config/db.php

# Update config/db.php with your database credentials
```

4. Apply database migrations:
```bash
./yii migrate
```

5. Set up development environment:
```bash
./yii serve
```

The application will be available at `http://localhost:8080`

## Configuration

### Database

Update `config/db.php` with your database credentials:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=task_manager',
    'username' => 'your_username',
    'password' => 'your_password',
    'charset' => 'utf8',
];
```



## Usage

1. Register a new account at `/site/signup`
2. Log in with your credentials at `/site/login`
3. Create new tasks using the "Create Task" button
4. View your tasks on the dashboard
5. Edit or delete tasks in detailed view


## Project Structure

```
task-manager/
├── config/             # Application configuration
├── controllers/        # Controller classes
├── models/             # Model classes
├── views/              # View files
├── web/                # Publicly accessible files
├── tests/              # Test classes
└── components/         # Custom components
```

## Testing

The project includes both unit and functional tests. To run the tests:

```bash
# Run all tests
./vendor/bin/codecept run

# Run specific suite
./vendor/bin/codecept run unit
./vendor/bin/codecept run functional
```

## Development Workflow

This project follows SCRUM methodology:

1. Sprint Planning: Tasks are organized in 2-week sprints
2. Daily Standups: Team updates through Git commits and comments
3. Sprint Review: Code review and testing before merging to main branch
4. Sprint Retrospective: Documentation updates and performance review

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Please ensure your PR:
- Follows the existing code style
- Includes appropriate tests
- Updates documentation as needed
- References any relevant issues

## Technologies Used

- **Backend**
  - Yii2 Framework 2.0
  - PHP 7.4+
  - MySQL 5.7+

- **Frontend**
  - Bootstrap 4
  - jQuery
  - HTML5/CSS3

- **Testing**
  - Codeception
  - PHPUnit

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Acknowledgments

- [Yii2 Documentation](https://www.yiiframework.com/doc/guide/2.0/en)
- [Bootstrap Documentation](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- All contributors who have helped with issues and pull requests

## Contact

Project Link: https://github.com/Rahimfa/Project-C1.git

## Contributors:
- Farid Rahimzada - 37858
- Utkirbek Inamjanov - 41843