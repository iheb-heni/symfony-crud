Symfony CRUD Application
Overview
This is a simple Symfony application that demonstrates basic CRUD (Create, Read, Update, Delete) functionality. It includes features for managing posts, including creating, viewing, editing, and deleting them.

Features
Create: Add new posts with a title and content.
Read: View a list of all posts.
Update: Edit existing posts.
Delete: Remove posts from the list.
Prerequisites
To run this project, you need to have the following installed on your local machine:

PHP (>= 8.0)
Composer (Dependency Manager for PHP)
Symfony CLI (Optional, for easier Symfony management)
MySQL (or another compatible database)
Installation
Clone the Repository

bash
Copy code
git clone https://github.com/iheb-heni/symfony-crud.git
cd symfony-crud
Install Dependencies

Use Composer to install the necessary PHP packages:

bash
Copy code
composer install
Configure Environment

Copy the .env file to .env.local:

bash
Copy code
cp .env .env.local
Update the .env.local file with your database credentials and other environment-specific settings.

Create the Database

Run the following command to create and set up your database:

bash
Copy code
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
Run the Symfony Server

Start the Symfony built-in web server:

bash
Copy code
symfony server:start
Alternatively, use the PHP built-in server:

bash
Copy code
php -S localhost:8000 -t public
Usage
Access the Application: Open your browser and navigate to http://localhost:8000.
Create a Post: Go to /create-post to add new posts.
View Posts: Access the main page to see the list of posts.
Edit and Delete Posts: Use the buttons in the actions column to modify or remove posts.
Contributing
Contributions are welcome! If you have suggestions or improvements, please fork the repository and submit a pull request. For major changes, please open an issue first to discuss what you would like to change.

License
This project is licensed under the MIT License - see the LICENSE file for details.

Contact
For any questions or issues, please contact me at [ihebheni013@gmail.com].