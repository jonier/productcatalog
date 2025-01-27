# PRODUCT CATALOG

// ...existing code...

## Installation Instructions

Description: This is an example project built with Laravel v11, Tailwind, and Livewire, featuring reactive pages for managing products and their categories.

Structure of Created and Modified Files:

├── app
│   ├── Livewire
│   │   ├── Categories.php       # Livewire controller to manage category logic.
│   │   ├── ProductList.php      # Livewire controller to manage product listing.
│   │   └── Products.php         # Livewire controller to manage products.
│   ├── Models
│   │   ├── Category.php         # Model representing a category in the database.
│   │   └── Product.php          # Model representing a product in the database.
├── resources
│   ├── category.blade.php       # Blade view to display a single category.
│   ├── dashboard.blade.php      # Blade view for the admin dashboard.
│   ├── product.blade.php        # Blade view to display a single product.
│   ├── view
│   │   └── livewire
│   │       ├── layout
│   │       │   └── navigation.blade.php  # Blade view for the site navigation layout.
│   │       ├── categories.blade.php      # Livewire view to display categories.
│   │       ├── product-list.blade.php    # Livewire view to display product list.
│   │       └── products.blade.php        # Livewire view to display products.


## Tailwind Components Used

### Popup: The popup was designed to create and update products and categories.
![App Screenshot](public/images/popup.png)


### tailwind-css-tables: The table is used to show the categories.
![App Screenshot](public/images/table1.png)


### invoice-table-1: The table is used to show the products.
![App Screenshot](public/images/table2.png)


1. Clone the repository:
   ```sh
   git clone https://github.com/jonier/productcatalog.git
   ```

2. Navigate to the project directory:
   ```sh
   cd productcatalog
   ```

3. Start the development server:
   ```sh
   composer install & npm install
   ```

4. Install SQLite3. The application runs with SQLite3.


5. Create the SQLite file.
   ```sh
   touch database/database.sqlite
   ```

6. Run the migrations and seed the database:
   ```sh
   php artisan migrate:fresh --seed
   ```

7. Start the development server:
   ```sh
   composer run dev
   ```

8. Open your browser and register a new user:
    [http://127.0.0.1:8000/register](http://127.0.0.1:8000/register)
    

9. Sign in to the app
    [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

// ...existing code...
