Project: Admin Panel for Managing Companies and Employees (Mini-CRM)

Description:
This project is a web-based admin panel built with Laravel, designed to manage companies and their employees. It acts as a mini-CRM, allowing for efficient data management and administrative control over company and employee records.

Main Features Implemented:
- **Basic Authentication**: Utilizes Laravel’s built-in authentication for secure login access. Admin login is enabled, while registration functionality has been removed for security.
- **Database Seeding**: Created an initial administrator user with email `admin@admin.com` and password `password` via database seeding for secure admin access.
- **CRUD Operations**: Fully implemented Create, Read, Update, and Delete functionality for managing both companies and employees.
- **Database Design**:
  - **Companies**: Fields include Name (required), Email, Logo (minimum 100x100), and Website.
  - **Employees**: Fields include First Name (required), Last Name (required), Company (foreign key to Companies), Email, and Phone.
- **Storage and Accessibility**:
  - Company logos are stored in the `storage/app/public` folder and are accessible from the public directory, ensuring logos meet minimum size requirements.
- **Resource Controllers**: Used Laravel resource controllers for efficient and RESTful handling of CRUD operations on both Companies and Employees.
- **Data Validation**: Laravel’s validation functions are applied using Request classes to ensure data integrity and enforce field requirements.
- **Pagination**: Both Companies and Employees lists display 10 records per page using Laravel's pagination for manageable data viewing.

Accomplishments:
- Authentication and admin-only access are set up.
- Created initial database structure using migrations, ensuring well-defined schemas.
- Successfully implemented CRUD functionality for both Companies and Employees.
- Validation, file storage, and public accessibility for company logos are operational.
- Basic Laravel theme configured for a user-friendly admin interface.

The project is ready for further enhancements, such as more advanced role management or additional features for handling and displaying employee and company data.

How It Works:
1. Admins log in using their credentials.
2. Once logged in, admins can view, create, update, or delete records in both the Companies and Employees sections.
3. Logos are uploaded to a secure location and displayed in the UI.
4. Data lists are paginated to show 10 records per page for easy navigation.

This mini-CRM serves as a foundational admin tool, allowing administrators to manage companies and employees in an organized and secure environment.
