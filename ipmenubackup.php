<?php
  $menu_name = 'header-menu';
  if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $menu_list = '';
    $count = 0;
    $submenu = false;
    $cpi=get_the_id();
    $menu_parent_name = '';
    foreach( $menu_items as $current ) {
      if($cpi == $current->object_id ){if ( !$current->menu_item_parent ) {$cpi=$current->ID;}else{$cpi=$current->menu_item_parent;}$cpi=$current->ID;break;}
    }
    foreach( $menu_items as $menu_item ) {
      $link = $menu_item->url;
      $title = $menu_item->title;
      $menu_item->ID==$cpi ? $ac2=' current_menu' : $ac2='';
      if ( !$menu_item->menu_item_parent ) {
        $parent_id = $menu_item->ID;$parent_id==$cpi ? $ac=' current_item' : $ac='';
        if(!empty($menu_items[$count + 1]) && $menu_items[ $count + 1 ]->menu_item_parent == $parent_id ){//Checking has child
          $menu_list .= '<li class="menu-item has-dropdown'.$ac.'"><a href="'.$link.'" class="dropdown-toggle'.$ac2.'" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$title.'</a>';
          $menu_parent_name = $title;
        }else{
          $menu_list .= '<li class="menu-item'.$ac.'">' ."\n";$menu_list .= '<a href="'.$link.'" class="'.$ac2.'">'.$title.'</a>' ."\n";
        }

      }
      if ( $parent_id == $menu_item->menu_item_parent ) {
        if ( !$submenu ) {
          $submenu = true;
          $menu_list .= '<ul class="dropdown-menu">' ."\n";
        }
        $menu_list .= '<li class="dropdown-menu-item">' ."\n";
        $menu_list .= '<a href="'.$link.'" class="'.$ac2.'">'.$title.'</a>' ."\n";
        $menu_list .= '</li>' ."\n";
        if(empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu){
          $menu_list .= '</ul>' ."\n";
          $submenu = false;
        }
      }
      if (empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
        $menu_list .= '</li>' ."\n";      
        $submenu = false;
      }
      $count++;
    }

  } else {
    $menu_list = '<li>Menu "' . $menu_name . '" not defined.</li>';
  }
  echo '<ul class="menu-list">';
  echo $menu_list;
  echo '</ul>';
?>