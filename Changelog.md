# Change Log 

============================================
Members: Matthew, Dennis, Injo, Haram, Lydia

2016-10-09 16:21 - Lydia
-Edited readme image

2016-10-09 15:28 - Dennis
-Admin controller now handles modifying of any property of a model entry
-Edited README.md
-Removed default CI footer

2016-10-09 14:25 - Lydia
-Edited MY_Controller, made navigation works for subpages under receiving, production and sales

2016-10-09 14:06 - Dennis
-Bugfix dashboard controller: sum not displaying correct numbers

2016-10-09 13:47 - Lydia
-Moved navigation out from views to template, edited MY_Controller

2016-10-09 12:40 - Lydia
-Modified layout in admin, production, and sales controllers

2016-10-09 11:50 - Dennis
-Display additional details in Sales result view

2016-10-09 09:04 - Haram
-Changed the resulting page for receiving controller to tell the user that there was nothing received when forms were empty.
-Added a clear button to clear the form inputs for receiving view.

2016-10-09 08:45 - Haram
-Changed the form type to number in receiving controller so only number can used for input
-Changed the single item view title in receiving to show as the item's name.

2016-10-09 02:24 - Dennis
-Added admin results view. Refactored admin controller.
-Added global toDollars() and previous button template
-Misc refactoring

2016-10-09 01:06 - Matthew
-Updated readme.md
-Changed some values in materials model

2016-10-08 23:44 - Dennis
-Switched dashboard from using transaction data to using model data

2016-10-08 22:29 - Matthew
-Materials lacking for crafting will show up in red in production_single

2016-10-08 22:29 - Matthew
-Change production logging to use material id instead of material name

2016-10-08 21:33 - Matthew
-Added recipe_result View
-Results now display at recipe_result View instead of as a flash message
-Cleaned some code in Recipe controller
-Added error check to prevent users from going to recipe/craft directly

2016-10-08 20:56 - Lydia
-Modified table style in Production page

2016-10-08 20:50 - Lydia
-Solved conflicts

2016-10-08 20:40 - Lydia
-Modified dashboard page style.
-Renamed recipe, product, and material views and controller to production, sales, and receiving.
-Modified table layout and form style in views.

2016-10-08 20:21 - Matthew
-Change display of recipe_list to use tables
-Added recipe description to recipe_list view
-Change display of recipe_single to use tables

2016-10-08 16:31 - Matthew
-Added previous button on recipe_single view
-Save crafting results to session for logging purpose

2016-10-08 14:13 - Injo
-Fixed sale_single previous button

2016-10-08 12:04 - Injo
-Added previous button on sale_list and sale_confirmation page
-Modified controller sales() method

2016-10-07 23:44 - Dennis
-Admin page items display item properties when clicked

2016-22:46 - Injo
-Updated Product Controller
-Modified Product List view to Product Single view
-Modified name of view
-Added singleConfirmation view to display the result

2016-10-07 21:03 - Matthew
-Fixed bugs in Recipe Controller
-Displays craft results as flash message at recipe_single view

2016-10-07 18:46 - Haram
-Updated the post method on the Material controller to call a view that shows the result of the "Receiving".
-Updated the Material controller to make the name of item to be clickable and linked them to the single view.
-Created a result view for material to process the "receiving".
-Created a single view for material to see each item's in details.

2016-10-07 17:22 - Dennis
-Added dashboard controller; dashboard view displays costs

2016-10-07 17:01 - Injo
-Modified products entries
-Store datas into session

2016-10-07 16:51 - Dennis
-Renamed cost of materials to 'price' in materials model.

2016-10-07 16:30 - Haram
-Changed the material model to address the attribute more accurately.
-Changed the table view in material controller to fit the new model.
-Changed table of view of material to match the cases and creating a single view for each items.

2016-10-07 16:10 - Lydia
-Modified table layout for material.php and product.php. Edited navigation bar.

2016-10-07 15:11 - Injo
-Added two new columns: quantity input and order check box
-Added new submit button from product page


2016-10-07 14:16 - Haram
-Added table view for material
-Added ui for material view

2016-10-07 14:09 - Lydia
-Modified table layout for admin.php, added a js file in assets folder

2016-10-07 11:42 - Injo
- Modified product list page to table view

2016-10-07 09:16 - Dennis
-Bug fix: transaction getter for recipes and products

2016-10-06 23:40 - Lydia
-Modified page style for admin, recipe, product and material views

2016-10-06 23:24 - Dennis
-Transaction setter now adds to instead of replacing previous values
-Admin controller and view displays all three models
-Admin controller to allow renaming instead of changing quantity
-fixed Materials model bracket
-Added Transaction Model
-Readded Product MVC

2016-10-06 17:58 - Matthew
-Added Recipes Model
-Added Recipe List View
-Added Recipe Single View
-Added Recipe Controller

2016-10-06 17:40 - Haram
-Added Material model
-Added Material controller
-Added simple list view for material

2016-10-06 17:25 - Lydia
-Added dashboard view
-Added modify page style for stock 

2016-10-06 17:11 - Dennis
-Added admin controller 
-Added admin view 

2016-10-06 16:46 - Injo
-Added Product Controller
-Added Product Model 
-Added Product View 

2016-10-06 11:01 - Dennis
-Configured autoload.config to use session, form and our models

2016-10-05 19:25 - Lydia
-Added changelog


