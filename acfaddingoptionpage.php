<?php
// First we check to see if acf_add_options_page is a function.
// If it is not, then we probably do not have ACF Pro installed
if( function_exists('acf_add_options_page') ) {
     
acf_add_options_page(array(
    'page_title'    => 'Partners',
    'menu_title'    => 'Partners',
    'menu_slug'     => 'partners-page',
    'capability'    => 'edit_posts'
  ));
	
acf_add_options_page(array(
    'page_title'    => 'Certificates',
    'menu_title'    => 'Certificates',
    'menu_slug'     => 'certificates-page',
    'capability'    => 'edit_posts'
  ));
	
  // Let's add our Options Page
  acf_add_options_page(array(
    'page_title'    => 'Theme Options',
    'menu_title'    => 'Theme Options',
    'menu_slug'     => 'theme-options',
    'capability'    => 'edit_posts'
  ));
   
  // If we want to add multiple sections to our Options Page
  // we can do so with an Options Sub Page.
   
  acf_add_options_sub_page(array(
    'page_title'    => 'Global Options',
    'parent_slug'   => 'theme-options',
    'menu_title'    => 'Global Options',
    'menu_slug'     => 'global-options',
  ));
	

  acf_add_options_sub_page(array(
    'page_title'    => 'Components content',
    'parent_slug'   => 'theme-options',
    'menu_title'    => 'Components content',
    'menu_slug'     => 'components-content',
  ));
	
  acf_add_options_sub_page(array(
    'page_title'    => 'System Pages',
    'parent_slug'   => 'theme-options',
    'menu_title'    => 'System Pages',
    'menu_slug'     => 'system-pages',
  ));	
   
  acf_add_options_sub_page(array(
    'page_title'    => 'Footer menu texts',
    'parent_slug'   => 'theme-options',
    'menu_title'    => 'Footer menu texts',
    'menu_slug'     => 'footer-menu-texts',
  ));	
	

}

?>