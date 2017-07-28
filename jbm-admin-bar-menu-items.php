<?php
/*
Plugin Name: _Admin Bar Menu Items
Description: Adds shortcuts to the admin menu bar
Version: 1.0
*/

add_action('admin_bar_menu', 'jbm_add_toolbar_items', 100);
function jbm_add_toolbar_items($admin_bar){
	$today = date('Ymd', strtotime(current_time('mysql')));
    $admin_bar->add_menu( array(
        'id'    => 'woo-orders',
        'title' => '<input type="search" name="admin_order_search" id="jbm_order_search" placeholder="Order Search" />',
        //'href'  => '/wp-admin/edit.php?post_type=shop_order',
        'meta'  => array(
            'html' => '<script>jQuery("#jbm_order_search").keyup(function(event){ if(event.keyCode == 13){ window.location = "/wp-admin/edit.php?post_type=shop_order&s="+this.value; } });</script>',
        ),
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-today',
        'parent' => 'woo-orders',
        'title' => 'Today\'s Orders',
        'href'  => '/wp-admin/edit.php?post_type=shop_order&all_posts=1&m='.$today,
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-on-hold',
        'parent' => 'woo-orders',
        'title' => 'On Hold Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-on-hold&post_type=shop_order',
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-pending',
        'parent' => 'woo-orders',
        'title' => 'Pending Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-pending&post_type=shop_order',
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-processing',
        'parent' => 'woo-orders',
        'title' => 'Processing Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-processing&post_type=shop_order',
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-completed',
        'parent' => 'woo-orders',
        'title' => 'Completed Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-completed&post_type=shop_order',
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-cancelled',
        'parent' => 'woo-orders',
        'title' => 'Cancelled Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-cancelled&post_type=shop_order',
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-refunded',
        'parent' => 'woo-orders',
        'title' => 'Refunded Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-refunded&post_type=shop_order',
    ));
	$admin_bar->add_menu( array(
        'id'    => 'woo-orders-failed',
        'parent' => 'woo-orders',
        'title' => 'Failed Orders',
        'href'  => '/wp-admin/edit.php?post_status=wc-failed&post_type=shop_order',
    ));
	
	//User Search
	
    $admin_bar->add_menu( array(
        'id'    => 'jbm-user-search',
        'title' => '<input type="search" name="jbm_user_search" id="jbm_user_search" placeholder="User Search" />',
        //'href'  => '/wp-admin/edit.php?post_type=shop_order',
        'meta'  => array(
            'html' => '<script>jQuery("#jbm_user_search").keyup(function(event){ if(event.keyCode == 13){ window.location = "/wp-admin/users.php?s="+this.value; } });</script>',
        ),
    ));
}
