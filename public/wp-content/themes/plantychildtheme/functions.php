<?php 
add_filter( 'wp_nav_menu_items', 'afficher_menu_admin', 10, 2 );

function afficher_menu_admin( $items, $args ) {
    if ((is_user_logged_in()) && ($args->menu == 'menu-1'))
    {
        preg_match_all('/<li[^>]*>.*?<a[^>]*>.*?<\/a>.*?<\/li>/is', $items, $matches,PREG_PATTERN_ORDER);
        $lien_nousrencontrer= $matches[0][0];
        $lien_commander=$matches[0][1];
        $lien_admin = '<li id="planty-admin" class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a href="'. get_admin_url().'" class="hfe-menu-item">Admin</a></li>';
        $items=$lien_nousrencontrer. $lien_admin . $lien_commander;
         
    }
    return $items;
}