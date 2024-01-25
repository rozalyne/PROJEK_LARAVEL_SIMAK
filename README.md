# Project README

## Overview

This Laravel project, developed by [Developer Cupu](https://www.youtube.com/watch?v=vCgsvdASoJA&list=PLhWDv4Vma6HsSDRgg9PCCJT2CksdydqH8), serves as a Student Information Management System (SIMAK). It provides features such as a dashboard, data management, and data editing.

## Bugs and Issues

1. **Unfixed Bug - Export PDF:**
   - There is an unresolved issue related to exporting data to PDF. Please investigate and fix this bug.

2. **Unfixed Bug - Import Excel:**
   - There is a bug in the Excel import functionality that needs attention. Make sure to address this issue.

## Project Setup

1. In the root folder, locate the `.env` file and update the following values:
   - `APP_NAME=`
   - `APP_URL=`
   - `DB_DATABASE=`
   - `DB_USERNAME=`
   - `DB_PASSWORD=`

2. Open the terminal or command prompt and execute the following commands:
   ```bash
   composer update
   php artisan migrate
   php artisan db:seed
   ```

## Project Structure

The project follows a standard Laravel structure. Key directories include:
- **app:** Contains the core application logic.
- **database/migrations:** Holds database migration files.
- **database/seeders:** Contains seeders for populating the database with initial data.

## Credits

Credit goes to [Developer Cupu](https://www.youtube.com/watch?v=vCgsvdASoJA&list=PLhWDv4Vma6HsSDRgg9PCCJT2CksdydqH8) for the development of this Laravel project.

## Screenshots

### Dashboard
![Dashboard](https://github.com/rozalyne/PROJEK_LARAVEL_SIMAK/assets/67235972/1dd1e5b2-6f1d-46a0-8bbb-f7adc1709cbc)

### Data View
![Data View](https://github.com/rozalyne/PROJEK_LARAVEL_SIMAK/assets/67235972/ffa30202-6cbd-4cb3-ab9d-5826304658ac)

### Edit Data
![Edit Data](https://github.com/rozalyne/PROJEK_LARAVEL_SIMAK/assets/67235972/54da5ad7-a864-47b9-a55e-f8747a4d269d)

## Remaining Work

Despite the current functionality, there are still many bugs and features that need implementation. Please refer to the project issues for more details.
