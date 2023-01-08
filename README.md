# CMS (Content Management System)

This is a content management system built using PHP and MySQL. It allows users to create and manage their own websites by creating and publishing posts, managing comments, and managing categories.

### Features
* Login and registration system for multiple users with different roles (e.g. admin, subscriber).
* User authentication and authorization
* Responsive design for optimal viewing on different devices.
* Users can create, read, update, and delete (CRUD) blog posts
* Users can create and delete comments on blog posts
* Users can create, read, update, and delete (CRUD) categories for organizing blog posts
* Users can view all blog posts and categories on the homepage
* Users can view individual blog posts and their comments by clicking on the post title
* Users can search for blog posts by title or content
* Users can edit their own user profile, including their username, password, first and last name, and email
* Administrators can approve or unapprove comments
* Administrators can delete comments
* The application uses prepared statements to prevent SQL injection attacks
## Overview of the CMS project
The CMS project is a content management system built using PHP and MySQL. It has a frontend and a backend.

The frontend consists of a homepage, a blog page, and a single post page. The homepage displays the latest posts and the blog page displays all the posts in reverse chronological order. The single post page displays a single post along with its comments. Users can leave comments on the single post page.

The backend consists of a dashboard and various pages for managing the content of the website. The dashboard displays some basic statistics about the website and provides links to the other pages in the backend. There are pages for managing posts, categories, users, and comments.

The posts page allows the user to view, add, edit, and delete posts. The categories page allows the user to view, add, and delete categories. The users page allows the user to view, add, edit, and delete users. The comments page allows the user to view, approve, unapprove, and delete comments.

The project uses a MySQL database to store all the data. The database consists of tables for posts, categories, users, and comments. The posts table stores information about each post such as its title, content, author, and date. The categories table stores information about each category such as its name . The users table stores information about each user such as their username, password, first name, last name, email, and image. The comments table stores information about each comment such as its content, author, email, status, and date.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
To run this project, you will need:
* A local server environment such as XAMPP or WAMP
* PHP 7 or higher
* MySQL

### Installation
Follow these steps to install and run the CMS on your local machine:

1. Clone the repository to your local machine: `git clone https://github.com/190ibrahim/CMS.git`
2. Import the cms.sql file into your MySQL database
3. Update the database connection details in `includes/db.php` to match your MySQL setup
4. Start your local server and visit http://localhost/CMS/ to access the CMS

### Usage
To use the CMS, you will need to first create an account. You can do this by clicking the "register" button on the navigation of the page and filling out the form. Once you have created an account and logged in, you will be able to create, read, update, and delete posts and categories, as well as moderate comments.
To access the CMS, go to http://localhost/CMS/

### Built With
* **PHP** - Server-side scripting language
* **MySQL** - Database management system

### Authors
* **ME** - Initial work - **190ibrahim**

### Contributing
If you would like to contribute to this project, please fork the repository and create a pull request with your changes.

### License
This project is licensed under the MIT License - see the LICENSE file for details.`

### Acknowledgments
* **Start Bootstrap** for the admin dashboard template
* **Font Awesome** for the icon library


