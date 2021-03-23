# salonmanager
A salon management application created by team Atlas for SDEV 328

Current Version - 1.0

**Tech Stack**
- HTML
- CSS
- PHP
- MySQL
- JavaScript

**Salon Management Application**

The application offers salon management concepts allowing administration to have CRUD functionalty for their products, services they offer, and employees.

**Database Relations**

All pages can access (Admin || User Links)

Admin can access (Manage Products, Stylists, Services, Inventory, Employment Status, & Queries)

-	(In Admin) Manage Products Connects (dB) SM_products to products.html
-	(In Admin) Manage Stylists Connects (dB) SM_stylists to stylsts.html
-	(In Admin) Manage Services Connects (dB) SM_services to services.html
-	(In Admin) View Product Inventory allows management of (dB) SM_products **(related)**
-	(In Admin) View Employed Stylists allows management of (dB) SM_stylists **(related)**
-	(In Admin) View Customer Queries Connects (dB) SM_contacts to contact.html (through Contact class)
-	Admin Login/Logout – connected to SM_admin






