# Zora Database Testing Framework

Zora is an open-source automated testing framework designed specifically for testing database functionalities. It supports multiple database management systems including MySQL, PostgreSQL, and MongoDB. The framework provides a comprehensive suite of tests to ensure data integrity, reliability, and performance across different database types.

## Features

- **Comprehensive Testing Suite**: Includes tests for database schema, data integrity, query performance, and data consistency.
- **Database Agnostic**: Supports MySQL, PostgreSQL, and MongoDB, making it versatile for various database environments.
- **Easy Integration**: Seamlessly integrates with CI/CD pipelines using popular tools like Jenkins, Travis CI, and CircleCI.
- **Customizable**: Developers can create custom tests and test suites tailored to specific database requirements.
- **Real-time Reporting**: Provides detailed, real-time reports on test results to quickly identify and resolve issues.
- **Collaboration**: Supports multi-user collaboration for teams working on database testing and development.

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/zora-database-testing.git
   cd zora-database-testing
   ```

2. **Configuration**:
   - Navigate to `config/database.php` and configure database credentials:
     ```php
     return [
         'mysql' => [
             'default' => [
                 'host' => '127.0.0.1',
                 'username' => 'root',
                 'password' => '',
                 'database' => 'test_db'
             ],
             'custom' => [
                 'host' => '',        // User-provided host
                 'username' => '',    // User-provided username
                 'password' => '',    // User-provided password
                 'database' => ''     // User-provided database name
             ]
         ],
         'pgsql' => [
             'default' => [
                 'host' => '127.0.0.1',
                 'username' => 'postgres',
                 'password' => '',
                 'database' => 'test_db'
             ],
             'custom' => [
                 'host' => '',        // User-provided host
                 'username' => '',    // User-provided username
                 'password' => '',    // User-provided password
                 'database' => ''     // User-provided database name
             ]
         ],
         'mongodb' => [
             'default' => [
                 'host' => '127.0.0.1',
                 'username' => '',
                 'password' => '',
                 'database' => 'test_db'
             ],
             'custom' => [
                 'host' => '',        // User-provided host
                 'username' => '',    // User-provided username
                 'password' => '',    // User-provided password
                 'database' => ''     // User-provided database name
             ]
         ]
     ];
     ```

3. **Usage**:
   - Access the framework via a web browser or integrate into your PHP application:
     ```php
     // Example usage in a PHP script or controller
     use Zora\Framework\Zora;
     
     $dbType = 'mysql'; // Change to desired database type ('mysql', 'pgsql', 'mongodb')
     $zora = new Zora($dbType);
     $result = $zora->runTests();
     
     echo json_encode([
         'message' => $result['message'],
         'report' => $result['report']
     ]);
     ```

4. **Contributing**:
   - Fork the repository, make your changes, and submit a pull request.

5. **Support**:
   - For issues or feature requests, please [open an issue](https://github.com/nia-cloud-official/zora_framework/issues).

6. **License**:
   - This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.


### The Roadmap

Welcome to the Zora Database Testing Framework Roadmap!

#### Version 1.0 (Current Release)

- **Core Functionality**
  - Implement basic functionality for MySQL, PostgreSQL, and MongoDB testing.
  - Include tests for connection, query execution, schema validation, data integrity, performance, and consistency.
  - Generate basic test reports in JSON format.
  
- **Integration**
  - Integrate with popular CI/CD tools like Jenkins, Travis CI, and CircleCI for automated testing.

#### Version 1.1 (Upcoming Release)

- **Enhanced Features**
  - Expand test coverage with additional database-specific tests.
  - Implement support for custom test configurations.
  - Improve error handling and reporting mechanisms.

- **User Interface**
  - Develop a basic web-based UI for viewing test results.
  - Include options for exporting reports in different formats (e.g., JSON, HTML).

#### Version 1.2 (Future Release)

- **Advanced Functionality**
  - Introduce support for more database types, such as SQLite, Oracle, and SQL Server.
  - Implement performance benchmarking tools for query optimization.

- **Collaboration**
  - Enable multi-user support with role-based access control.
  - Integrate with version control systems for tracking database schema changes.

#### Future Directions

- **API Integration**
  - Develop RESTful API endpoints for integrating test results into third-party applications.
  - Implement webhook support for real-time notifications on test completion.

- **Extensibility**
  - Create plugins and extensions for adding custom tests and integrating with new databases.
  - Foster a community-driven ecosystem for sharing plugins and enhancements.

#### Contribution Guidelines

- **Bug Fixes and Features**
  - Encourage community contributions through clear documentation and issue tracking.
  - Follow best practices for code review, testing, and documentation.

#### License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

- **Author**: [Milton Vafana](https://github.com/nia-cloud-official/)
- **Email**: [miltonhyndrex@gmail.com](mailto:miltonhyndrex@gmail.com)

#### Feedback and Support

Your feedback is valuable! Please open issues for bug reports, feature requests, or general feedback. For support inquiries, reach out to [your.email@example.com](mailto:your.email@example.com).