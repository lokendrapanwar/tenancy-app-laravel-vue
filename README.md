
# Multi-tenancy

## Introduction

Welcome to multi tenancy! This Multi-tenancy is a software architecture model where a single instance of an application or system serves multiple tenants. A tenant refers to a group of users or organizations that share a common instance or multiple of the software while keeping their data and configuration separate and isolated from each other.
In a multi-tenant architecture, the application is designed to provide customized functionality and data segregation for each tenant. The tenants typically access the software through a shared infrastructure, such as a cloud-based platform, but their data and configuration are kept separate and secure. Each tenant may have its own set of users, data, configurations, permissions, and even branding.


## Requirements

[The software requirements.]

- Node.js (version 6)
- npm (version 16)
- PHP (version 8.2)
- Laravel (version 10)
- MySQL (version 8.0)


## Super Admin Setup

To set up a Super Admin for the master database, follow these steps:

1. Execute the following SQL query:

    ```sql
    INSERT INTO `users`(`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('Super Admin','super@admin.com',NULL,'$2y$12$8DMR1aZamm.CkkSLgAohlePSI6xQGmpqWdtZK9yyOSG./i8V6ybYa',NULL,'2024-01-06 17:11:06','2024-01-06 17:11:06');
    ```

## Installation

Follow these steps to install the project:

1. Run the following commands in your terminal:

    ```bash
    composer install
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    ```

## Login as Super Admin

Use the following credentials to log in as Super Admin:

- **Email:** super@admin.com
- **Password:** 12345

## Company User Management

### Login as Company Admin

1. Log in as Super Admin.
2. Navigate to the company section.
3. Create a new user.
4. View the created user.
5. Delete the user if necessary.

### Login as User

1. Log in with a company user account.
2. View company information.

## Additional Information

Include any additional information, tips, or troubleshooting steps here.

## Contributors

Mention contributors, if any, who have contributed to the project.

## License

Specify the license under which the project is distributed.
