***Photography WordPress Theme Development***

This theme was developed to help freelance photographers promote themselves by having a website to showcase their work. Two software which were used to create this theme were Local and Visual Studio Code. The below information is all about the functions, customisability options and template parts which were created to develop this theme.


***Customize.php***

All of the customisations are organised in different sections and the sections are organised in different panels. Each section of the customise options is listed with the term add_sections and every section has a title and a description. Also, each customizability option has a control (add_control) and a setting (add_setting). The controllers which were used in this theme were: WP_Customize_Color_Control and the Select option controller which were used as drop-down menus.

***NB: To add a control option to a section, one needs to write down the name of the section in the section parameter in the controller. Also, the title of the control and setting needs to be the same to work. Same goes with the panel. One has to write down the name of the panel in the parameter of the section.***


***Enqueue-assets.php***

This file imports all of the CSS and JS files and automatically injects them into all of the pages.


***Template-genre_sections.php***

This template file is seen in the gallery page of the theme and shows all of the genres which the user has inputted. The cards are all stylised by using internal css and the fields (get_field) is all being imported from the field group “genre”. If the developer decides to change any fields from the field group, one has to use the id of the field and write it in the code as a variable. An example can be found here ($genre_image = get_field(‘image_of_genre’) and the variable can be seen working here (<img src="<?php echo esc_url($genre_image['url']); >)


***Search.php***
This file is used to redirect the user once the search button is clicked. Afterwards, the user is redirected to the homepage and shows the search result. The results are stylised by the template part called, loop.php.


***Sidebar-footer-1.php***

This displays the selected footer. This is customised in the WordPress admin panel. One can find it in the Widgets in the Appearance panel.
The information mentioned above can be said for the files which are listed below:

	1. Sidebar-footer-2.php
	2. Sidebar-footer-3.php


***Single-genre.php***
This page displays all of the images which form part of a singular genre. The images are organised by rows of either 3, 4 or 5. Customisation options are available for this page, they can be found in the WordPress customiser. Also, a sort by menu was developed in order to sort the images. This feature works by selecting an option from the dropdown menu and the page refreshes with an added passing of some information which can be found in the link, which are order by and order. 
By having this information, the WordPress argument sorts out the images accordingly. The below points are all of the sort by options which are available to the user:

	1. Date (Descending)
	2. Date (Ascending)
	3. Title (Descending)
	4. Title (Ascending)


***Page-genre.php & template-genre_sections.php***

This page displays all of the genres which were uploaded by the user. The genres are sorted by the name of the genre in ascending order. Customisation options are available for this page, they can be found in the WordPress customiser.


***Page-shop.php***

This page focuses on the styling options which can be done to front-page of the store. All of the CSS can be found related to the store page. All of the customisation options will be stored in this page.


***Single.php***

This page focuses on the styling options which can be done to product and checkout pages of the store. All of the CSS can be found related to the store page. All of the customisation options will be stored in this page.


***Archive.php***

The archive.php is essentially the blog front page. This page has a sub-menu on top, where the blog categories are displayed. The loop which is below the categories section displays all of the blogs. In the blog front page, all of the posts are displayed, and when the user is on a specific category page, the posts according to the category are only displayed.


***Content.php***

The content.php is used to design each blog post card of the blog front page. Each post will have the same design and can be designed from here.

***Functions.php***

	1. The first function (output_footer_bg_color_css) finds the background colour of the websites and uses the dark or light percentage function which can be found in the customiser, and automatically darkens or lighten the navbar and footer accordingly. The css classes which can be found below the function clearly shows which classes are using this function. 
	2. The second function (enqueue_fancybox) uses the library, fancybox, to be used when clicking on the image when the user wants the image to be full-screen.
	3. The third function (custom_postorderasc) automatically changes the order of every blog post to ascending order.
	4. The fouth function (diwp_theme_customizer_options) is used to import a logo or image to the website. The imported image or logo is used in the navigation bar. A customisability option was made to select the placement of the logo (top, left or on the right).
	5. The fifth function (custom_excerptLength) automatically limits the excerpt length to be a certain length.


