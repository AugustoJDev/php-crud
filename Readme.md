# A Simple CRUD with PHP and HTML/CSS

Until this moment, i'm developing this code

## General Logs:

> ### [+] Addeds, [*] Fixeds, [>] Changeds, [-] Removeds:

<br>

- **06/28/2023** 
    - [+] `delete.php`, `edit.php`, `getAll.php`
    - [*] Messages returneds by `add.php`
    - [*] Fixeds redirects endpoints in `getUser.php` and `login.php`
    - [>] Name of `member.php` and `user.js` files changeds by `user.php` and `manager.js` sequentialy

- **06/30/2023**
    - [*] Fixed redirect endpoint in `findOnDb.php`
    - [>] Changes in `member.css` and `manager.js` to add new style in `dashboard/user.php` page
    - [>] Input field titles are Bold now

- **07/06/2023**
    - [+] New database connect method ( Edit `database/env.ini` to set your db configs )
    - [+] Source edited to be compatible with platforms like **[InfinityFree](https://www.infinityfree.com)** ( Used by me at the moment )
    - [+] Added: **Products Button** in member page, but the Model doesn't work yet
    - [>] Now the database gets the user directly by name from the "admin" table to check the login information

- **07/08/2023**
    - [+] New files were created: `configs/database/getAllUsers.php` and `configs/database/getAllProducts.php`, one for each situation
    - [+] Now the modal works and has functions, like select product/quantity and get final value ( Not yet has products list and the values will not set in the database )
    - [+] The file `dashboard/js/utilities.js` get the quantity and multiply with the product value in the modal and returns the final value to the label
    - [>] The CSS of buttons in modal were changeds, see in `css/member.css`
    - [-] The file `configs/database/getAll.php` is removed

- **07/13/2023**
    - [+] Added `dashboard/js/utilities/modalManager.js` to open the **see** and **add** modal
    - [+] **See Products** button has been added and **See Products** modal too | `user.php:41`
    - [*] Validator added to others fields ( contact, delivery and value ) in `dashboard/user.php` and `dashboard/js/manager.js`
    - [*] Functions who where in `dashboard/js/manager.js` were passed to the **window.onload** in `dashboard/js/products.js` and their names are changed