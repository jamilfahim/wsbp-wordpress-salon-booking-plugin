<?php
/**
 *  Define Salon_Booking_Plugin class
 *
 */
class Salon_Booking_Plugin {
    
   public function __construct() {
       add_action('admin_menu', array($this, 'salon_booking_plugin_menu'));
   }
   
  // Add custom post types to plugin menu
function salon_booking_plugin_menu() {
    add_menu_page('Salon Booking Plugin', 'Salon Booking Plugin', 'manage_options', 'salon-booking-plugin', 'salon_booking_plugin_page', 'dashicons-calendar-alt', 50);
   
    add_submenu_page(
        'salon-booking-plugin',
        __('Services Categories', 'wsbp'),
        __('Services Categories', 'wsbp'),
        'manage_options',
        'edit-tags.php?taxonomy=wsbp-services-categories',
        '',
        2 // change this value to adjust the menu position
    );
    
   
}
 
}

// Instantiate Salon_Booking_Plugin class
$plugin = new Salon_Booking_Plugin();
