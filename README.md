# datecheck
Manage product expiry/best before dates

Written using Laravel Homestead with the following software:

* Ubuntu 18.04 LTS
* Virtual Box(5.2.18-dfsg-2~ubuntu18.04.1)
* Vagrant(2.2.1)
* Bootstrap(3.7)

# Purpose
This application allows user(s) to record expiry/best before dates for entered products and then generate reports based on this information.

# What is done
* Random products with sample expiry dates(past and future)
* Reports:
  * Expired
  * Expiring this week(Mon-Sun)
  * Expiring in the next 7 days
* Pagination
* Search(name and barcode)
* Add/delete items and dates

# What is not yet done
* Editing products
* Add/delete/edit categories
* Filter by category
* API (for a cellphone app or SPA)

# What may never be done
* Multiple users
* Multiple domains
* Cellphone app
* Alerts(SMS/Email) for expired products
* Automatic lookup of product information based on barcode
* Images for products
