# Topshop

Topshop offers its customers a modern shopping experience by bringing computers, appliances, clothing and many other items at their fingertips. With just a few clicks, users can create an account, add products to their cart and place their order.

![](https://github.com/Abhijeet-Pitumbur/topshop/project/demo.gif)

### [View Live Demo](https://abhtopshop.000webhostapp.com)

##### [Download Website](https://drive.google.com/u/1/uc?id=1gBOF_MTC4chtthqVsDgC00sokZPknYR7&export=download&confirm=t) · Google Drive
##### [View PDF Report](https://drive.google.com/file/d/1pSBVrtWPZ9ggh0325FxFNBDCdk_yNJz0/view)  · Google Drive
##### [Download Repository](https://github.com/Abhijeet-Pitumbur/topshop/archive/refs/heads/main.zip)  · GitHub

## Features
- Clean and modern UI
- Responsive
- Sticky sidebar on product page
- Hover effect on product thumbnail
- Sliding footer reveal
- Products grid pagination
- Cart and wishlist
- Account system with email verification
- PayPal checkout
- Multiple currencies
- Contact form
- Coupon codes
- Password reset via email
- Search products by keywords
- Newsletter sign-up
- Administrator sign-in page
- Cron-job to delete inactive accounts

## Installation Instructions
- Download and install a web server stack, like [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/).
- Download [Topshop](https://drive.google.com/u/1/uc?id=1gBOF_MTC4chtthqVsDgC00sokZPknYR7&export=download&confirm=t) as a ZIP file.
- Extract the ZIP file and move the *topshop* folder to *XAMPP/htdocs* or *WAMP/www*.
- Go to your extracted *[topshop/functions/send-email.php](project/functions/send-email.php)* file.
- Modify lines 23, 24 and 25 with valid credentials of a Gmail account.
- Open XAMPP or WAMP Control Panel.
- Start Apache and MySQL.
- Open a web browser and go to PHPMyAdmin at [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
- Create a new database named *topshop*.
- Import your extracted *[topshop.sql](project/topshop.sql)* file to the new database.
- Open a web browser and browse Topshop at [http://localhost/topshop](http://localhost/topshop).

## Languages and Frameworks
- HTML
- CSS
- JavaScript
- PHP
- SQL
- jQuery
- Bootstrap

## Credits
- Abhijeet Pitumbur
