<?php
/**
 * Progression Mega Framework
*/

function pro_mega_admin_scripts( ) {
	if( is_admin()) {
		wp_register_style('mega-menu', get_template_directory_uri() . '/inc/mega-menu/css/mega-menu.css');
		wp_enqueue_style('mega-menu');
		wp_enqueue_script( 'mega-menu', get_template_directory_uri() . '/inc/mega-menu/js/mega-menu.js', array( 'jquery' ), '20120206', true );

	}
}
add_action('admin_enqueue_scripts', 'pro_mega_admin_scripts');

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}


// Dont duplicate me!
if( ! class_exists( 'ProgressionFrontendWalker' ) ) {
	class ProgressionFrontendWalker extends Walker_Nav_Menu {

		/**
		 * @var string $menu_megamenu_status are we currently rendering a mega menu?
		 */
		private $menu_megamenu_status = "";

		/**
		 * @var int $num_of_columns how many columns should the mega menu have?
		 */
		private $num_of_columns = 0;

		/**
		 * @var int $total_num_of_columns total number of columns for a single megamenu?
		 */
		private $total_num_of_columns = 0;

		/**
		 * @var int $num_of_rows number of rows in the mega menu
		 */
		private $num_of_rows = 1;

		/**
		 * @var array $submenu_matrix holds number of columns per row
		 */
		private $submenu_matrix = array();

		/**
		 * @var string $menu_megamenu_title should a colum title be displayed?
		 */
		private $menu_megamenu_title = '';


		/**
		 * @var string $menu_megamenu_icon does the item have an icon?
		 */
		private $menu_megamenu_icon = '';

		private $menu_megamenu_notif = '';



		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$item_output = $class_columns = '';
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			/* set some vars */
			if( $depth === 0 ) {

				$this->menu_megamenu_status = get_post_meta( $item->ID, '_menu_item_progression_studios_megamenu_status', true );
			}

			$this->menu_megamenu_icon = get_post_meta( $item->ID, '_menu_item_progression_studios_megamenu_icon', true);
			$this->menu_megamenu_notif = get_post_meta( $item->ID, '_menu_item_progression_studios_megamenu_notif', true);
			$this->menu_megamenu_title = get_post_meta( $item->ID, '_menu_item_progression_studios_megamenu_title', true );

			/* we are inside a mega menu */
			if( $depth === 1 && $this->menu_megamenu_status == "enabled" ) {

				$this->num_of_columns++;
				$this->total_num_of_columns++;

				$this->submenu_matrix[$this->num_of_rows] = $this->num_of_columns;

				$title = apply_filters( 'the_title', $item->title, $item->ID );

				if( $this->menu_megamenu_title != 'disabled' && $title != "-" && $title != '"-"' ) {
					$heading = do_shortcode($title);
					$link = '';
					$link_closing = '';

					if( ! empty($item->url) && $item->url != "#" && $item->url != 'http://' ) {
						$link = '<a href="' . $item->url . '">';
						$link_closing = '</a>';
					}

					/* check if we need to set an image */
					$title_enhance = '';
					if( ! empty( $this->menu_megamenu_icon ) ) {
						$title_enhance = '<span class="progression-megamenu-icon"><i class="fa fa-' . $this->menu_megamenu_icon. '"></i></span>';
					}

					$title_minibanner = '';
					if( ! empty( $this->menu_megamenu_notif ) ) {
						$title_minibanner = '<span class="progression-mini-banner-icon">' . $this->menu_megamenu_notif. '</span>';
					}

					$heading = sprintf( '%s%s%s%s%s', $link, $title_minibanner, $title_enhance, $title, $link_closing );

					$item_output .= "<h2 class='mega-menu-heading'>" . $heading . "</h2>";
				}


				$class_columns  = ' {current_row_'.$this->num_of_rows.'}';


			} else {

				$atts = array();
				$atts['title']  = ! empty( $item->attr_title )	? 'title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$atts['target'] = ! empty( $item->target )	    ? 'target="' . esc_attr( $item->target     ) .'"' : '';
				$atts['rel']    = ! empty( $item->xfn )		    ? 'rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$atts['url']    = ! empty( $item->url )         ? 'href="'   . esc_attr( $item->url        ) .'"' : '';
				$attributes = implode( ' ', $atts );

				$item_output .= $args->before;
				/* check if ne need to set an image */
				if( ! empty( $this->menu_megamenu_icon )) {
					$item_output .= '<a ' . $attributes . '><span class="progression-studios-menu-title"><span class="progression-megamenu-icon text-menu-icon"><i class="fa fa-' . $this->menu_megamenu_icon . '"></i></span>';
				} else {
					$item_output .= '<a '. $attributes .'><span class="progression-studios-menu-title">';
				}

				if( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .=  '<span class="menu-text">';
				}

				if( ! empty( $this->menu_megamenu_notif )) {
					$item_output .= '<span class="progression-mini-banner-icon">' . $this->menu_megamenu_notif . '</span>';
				}

				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

				if( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .=  '</span>';
				}

				$item_output .= '</span>';

				if ($item->object == 'category') {
					$category = get_category($item->object_id);
					$item_output .= '<span class="progression-studios-nav-cat-count">';
					$item_output .= $category->count;
					$item_output .= '</span>';
				}else{
					$item_output .= '';
				}

				$item_output .= '</a>';

				$item_output .= $args->after;

			}

			/* check if we need to apply a divider */
			if ( $this->menu_megamenu_status != "enabled" && ( ( strcasecmp( $item->attr_title, 'divider' ) == 0) ||
				( strcasecmp( $item->title, 'divider' ) == 0 ) )
			) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} else {

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = $value = '';
				$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			  $class_names = $class_names ? ' class="' . $class_columns . ' ' . $class_names . '"' : '';

				/* $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : ''; */

				//$output .= $indent . '<li' . $id . $value . $class_names .'>';
				$output .= $indent . '<li' . $value . $class_names .'>';

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}

		/**
		 * @see Walker::end_el()
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Page data object. Not used.
		 * @param int $depth Depth of page. Not Used.
		 */
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}

		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element )
				return;

			$id_field = $this->db_fields['id'];

			// Display this element.
			if ( is_object( $args[0] ) )
			   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a manu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 *
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'manage_options' ) ) {

				extract( $args );

				$fb_output = null;
				$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';

				return $fb_output;
			}
		}
	}  // end ProgressionFrontendWalker() class
}

// Don't duplicate me!
if( ! class_exists( 'ProCoreMegaMenus' ) ) {

    class ProCoreMegaMenus extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Ends the list of after the elements are added.
		 *
		 * @see Walker_Nav_Menu::end_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Start the element output.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 * @param int    $id     Not used.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth_pro_studios, $wp_registered_sidebars;
			$_wp_nav_menu_max_depth_pro_studios = $depth > $_wp_nav_menu_max_depth_pro_studios ? $depth : $_wp_nav_menu_max_depth_pro_studios;

			ob_start();
			$item_id = esc_attr( $item->ID );
			$removed_args = array(
				'action',
				'customlink-tab',
				'edit-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);

			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) )
					$original_title = false;
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title = get_the_title( $original_object->ID );
			}

			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
			);

			$title = $item->title;

			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( esc_html__( '%s (Invalid)', 'ratency-progression' ), $item->title );
			} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft status */
				$title = sprintf( esc_html__('%s (Pending)', 'ratency-progression'), $item->title );
			}

			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

			$submenu_text = '';
			if ( 0 == $depth )
				$submenu_text = 'style="display: none;"';

			?>
<li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
  <dl class="menu-item-bar">
    <dt class="menu-item-handle">
      <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span
          class="is-submenu"
          <?php echo esc_html( $submenu_text); ?>><?php esc_html_e( 'sub item', 'ratency-progression' ); ?></span></span>
      <span class="item-controls">
        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
        <span class="item-order hide-if-js">
          <a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-up-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-up"><abbr
              title="<?php esc_attr_e('Move up', 'ratency-progression'); ?>">&#8593;</abbr></a>
          |
          <a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-down-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-down"><abbr
              title="<?php esc_attr_e('Move down', 'ratency-progression'); ?>">&#8595;</abbr></a>
        </span>
        <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>"
          title="<?php esc_attr_e('Edit Menu Item', 'ratency-progression'); ?>" href="<?php
								echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
							?>"><?php esc_html_e( 'Edit Menu Item', 'ratency-progression' ); ?></a>
      </span>
    </dt>
  </dl>

  <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
    <?php if( 'custom' == $item->type ) : ?>
    <p class="field-url description description-wide">
      <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
        <?php esc_html_e( 'URL', 'ratency-progression' ); ?><br />
        <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>"
          class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]"
          value="<?php echo esc_attr( $item->url ); ?>" />
      </label>
    </p>
    <?php endif; ?>
    <p class="description description-thin">
      <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
        <?php esc_html_e( 'Navigation Label', 'ratency-progression' ); ?><br />
        <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>"
          class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]"
          value="<?php echo esc_attr( $item->title ); ?>" />
      </label>
    </p>
    <p class="description description-thin">
      <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
        <?php esc_html_e( 'Title Attribute', 'ratency-progression' ); ?><br />
        <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>"
          class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]"
          value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
      </label>
    </p>
    <p class="field-link-target description">
      <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
        <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank"
          name="menu-item-target[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->target, '_blank' ); ?> />
        <?php esc_html_e( 'Open link in a new window/tab', 'ratency-progression' ); ?>
      </label>
    </p>
    <p class="field-css-classes description description-thin">
      <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
        <?php esc_html_e( 'CSS Classes (optional)', 'ratency-progression' ); ?><br />
        <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>"
          class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]"
          value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
      </label>
    </p>
    <p class="field-xfn description description-thin">
      <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
        <?php esc_html_e( 'Link Relationship (XFN)', 'ratency-progression' ); ?><br />
        <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>"
          class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]"
          value="<?php echo esc_attr( $item->xfn ); ?>" />
      </label>
    </p>
    <p class="field-description description description-wide">
      <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
        <?php esc_html_e( 'Description', 'ratency-progression' ); ?><br />
        <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>"
          class="widefat edit-menu-item-description" rows="3" cols="20"
          name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
        <span
          class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'ratency-progression'); ?></span>
      </label>
    </p>
    <div class="clear"></div>
    <div class="progression-mega-menu-options">

      <!--p class="field-megamenu-notif description description-wide">
							<label for="edit-menu-item-megamenu-notif-<?php echo esc_attr($item_id); ?>">
								<?php esc_html_e( 'Menu Mini Banner Text', 'ratency-progression' ); ?>
								<input type="text" id="edit-menu-item-megamenu-notif-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-megamenu-notif" name="menu-item-progression-megamenu-notif[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item->progression_studios_megamenu_notif); ?>" />
							</label>
						</p-->


      <p class="field-megamenu-status description description-wide">
        <label for="edit-menu-item-megamenu-status-<?php echo esc_attr($item_id); ?>">
          <input type="checkbox" id="edit-menu-item-megamenu-status-<?php echo esc_attr($item_id); ?>"
            class="widefat code edit-menu-item-megamenu-status"
            name="menu-item-progression-megamenu-status[<?php echo esc_attr($item_id); ?>]" value="enabled"
            <?php checked( $item->progression_studios_megamenu_status, 'enabled' ); ?> />
          <strong><?php esc_html_e( 'Enable Mega Menu', 'ratency-progression' ); ?></strong>
        </label>
      </p>
      <p class="field-megamenu-columns description description-wide">
        <label for="edit-menu-item-megamenu-columns-<?php echo esc_attr($item_id); ?>">
          <?php esc_html_e( 'Mega Menu Number of Columns', 'ratency-progression' ); ?>
          <select id="edit-menu-item-megamenu-columns-<?php echo esc_attr($item_id); ?>"
            class="widefat code edit-menu-item-megamenu-columns"
            name="menu-item-progression-megamenu-columns[<?php echo esc_attr($item_id); ?>]">
            <option value="1" <?php selected( $item->progression_studios_megamenu_columns, '1' ); ?>>
              <?php esc_html_e( '1 Column', 'ratency-progression' ); ?></option>
            <option value="2" <?php selected( $item->progression_studios_megamenu_columns, '2' ); ?>>
              <?php esc_html_e( '2 Columns', 'ratency-progression' ); ?></option>
            <option value="3" <?php selected( $item->progression_studios_megamenu_columns, '3' ); ?>>
              <?php esc_html_e( '3 Columns', 'ratency-progression' ); ?></option>
            <option value="4" <?php selected( $item->progression_studios_megamenu_columns, '4' ); ?>>
              <?php esc_html_e( '4 Columns', 'ratency-progression' ); ?></option>
            <option value="5" <?php selected( $item->progression_studios_megamenu_columns, '5' ); ?>>
              <?php esc_html_e( '5 Columns', 'ratency-progression' ); ?></option>
            <option value="6" <?php selected( $item->progression_studios_megamenu_columns, '6' ); ?>>
              <?php esc_html_e( '6 Columns', 'ratency-progression' ); ?></option>
          </select>
        </label>
      </p>
      <p class="field-megamenu-title description description-wide">
        <label for="edit-menu-item-megamenu-title-<?php echo esc_attr($item_id); ?>">
          <input type="checkbox" id="edit-menu-item-megamenu-title-<?php echo esc_attr($item_id); ?>"
            class="widefat code edit-menu-item-megamenu-title"
            name="menu-item-progression-megamenu-title[<?php echo esc_attr($item_id); ?>]" value="disabled"
            <?php checked( $item->progression_studios_megamenu_title, 'disabled' ); ?> />
          <?php esc_html_e( 'Disable Mega Menu Column Title', 'ratency-progression' ); ?>
        </label>
      </p>

      <p class="field-megamenu-icon description description-wide">
        <label for="edit-menu-item-megamenu-icon-<?php echo esc_attr($item_id); ?>">
          <?php wp_kses( _e( 'Menu Icon (<a href="', 'ratency-progression' ) , true); ?>http://fortawesome.github.io/Font-Awesome/icons/"
          target="_blank">Font-Awesome Icon List</a>)
          <input type="text" id="edit-menu-item-megamenu-icon-<?php echo esc_attr($item_id); ?>"
            class="widefat code edit-menu-item-megamenu-icon"
            name="menu-item-progression-megamenu-icon[<?php echo esc_attr($item_id); ?>]"
            value="<?php echo esc_attr($item->progression_studios_megamenu_icon); ?>" />
        </label>
      </p>
      <p class="field-megamenu-widgetarea description description-wide">
        <label for="edit-menu-item-megamenu-widgetarea-<?php echo esc_attr($item_id); ?>">
          <?php esc_html_e( 'Mega Menu Widget Area', 'ratency-progression' ); ?>
          <select id="edit-menu-item-megamenu-widgetarea-<?php echo esc_attr($item_id); ?>"
            class="widefat code edit-menu-item-megamenu-widgetarea"
            name="menu-item-progression-megamenu-widgetarea[<?php echo esc_attr($item_id); ?>]">
            <option value="0"><?php esc_html_e( 'Select Widget Area', 'ratency-progression' ); ?></option>
            <?php
									if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ):
									foreach( $wp_registered_sidebars as $sidebar ):
									?>
            <option value="<?php echo esc_html($sidebar['id']); ?>"
              <?php selected( $item->progression_studios_megamenu_widgetarea, $sidebar['id'] ); ?>>
              <?php echo esc_html($sidebar['name']); ?></option>
            <?php endforeach; endif; ?>
          </select>
        </label>
      </p>
    </div><!-- .progression-mega-menu-options-->
    <p class="field-move hide-if-no-js description description-wide">
      <label>
        <span><?php esc_html_e( 'Move', 'ratency-progression' ); ?></span>
        <a href="#" class="menus-move-up"><?php esc_html_e( 'Up one', 'ratency-progression' ); ?></a>
        <a href="#" class="menus-move-down"><?php esc_html_e( 'Down one', 'ratency-progression' ); ?></a>
        <a href="#" class="menus-move-left"></a>
        <a href="#" class="menus-move-right"></a>
        <a href="#" class="menus-move-top"><?php esc_html_e( 'To the top', 'ratency-progression' ); ?></a>
      </label>
    </p>

    <div class="menu-item-actions description-wide submitbox">
      <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
      <p class="link-to-original">
        <?php printf( esc_html__('Original: %s', 'ratency-progression'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
      </p>
      <?php endif; ?>
      <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
						echo wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'delete-menu-item',
									'menu-item' => $item_id,
								),
								admin_url( 'nav-menus.php' )
							),
							'delete-menu_item_' . $item_id
						); ?>"><?php esc_html_e( 'Remove', 'ratency-progression' ); ?></a> <span class="meta-sep hide-if-no-js"> |
      </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>"
        href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
							?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Cancel', 'ratency-progression'); ?></a>
    </div>
    <div class="clear"></div>
    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]"
      value="<?php echo esc_attr($item_id); ?>" />
    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]"
      value="<?php echo esc_attr( $item->object_id ); ?>" />
    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]"
      value="<?php echo esc_attr( $item->object ); ?>" />
    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]"
      value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]"
      value="<?php echo esc_attr( $item->menu_order ); ?>" />
    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]"
      value="<?php echo esc_attr( $item->type ); ?>" />
  </div><!-- .menu-item-settings-->
  <ul class="menu-item-transport"></ul>
  <div class="clear"></div>
  <?php
			$output .= ob_get_clean();
		}

    } // end ProCoreMegaMenus() class

}


// Don't duplicate me!
if( ! class_exists( 'ProgressionMegaMenu' ) ) {

    /**
     * Class to manipulate menus
     *
     * @since 3.4
     */
    class ProgressionMegaMenu extends ProgressionMegaMenuFramework {

    	function __construct() {

            add_action( 'wp_update_nav_menu_item', array( $this, 'save_custom_fields' ), 10, 3 );

            add_filter( 'wp_edit_nav_menu_walker', array( $this, 'add_custom_fields' ) );
            add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_data_to_menu' ) );

    	} // end __construct();


        /**
         * Function to replace normal edit nav walker for progression core mega menus
         *
         * @return string Class name of new navwalker
         */
        function add_custom_fields() {

            return 'ProCoreMegaMenus';


       }

        /**
         * Add the custom fields menu item data to fields in database
         *
         * @return void
         */
        function save_custom_fields( $menu_id, $menu_item_db_id, $args ) {

			$field_name_suffix = array( 'status', 'width', 'columns', 'title', 'widgetarea', 'icon', 'notif' );

			foreach ( $field_name_suffix as $key ) {
				if( !isset( $_REQUEST['menu-item-progression-megamenu-'.$key][$menu_item_db_id] ) ) {
					$_REQUEST['menu-item-progression-megamenu-'.$key][$menu_item_db_id] = '';
				}

				$value = $_REQUEST['menu-item-progression-megamenu-'.$key][$menu_item_db_id];

				update_post_meta( $menu_item_db_id, '_menu_item_progression_studios_megamenu_'.$key, $value );
			}
        }

        /**
         * Add custom fields data to the menu
         *
         * @return object Add custom fields data to the menu object
         */
        function add_data_to_menu( $menu_item ) {

            $menu_item->progression_studios_megamenu_status = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_status', true );

            $menu_item->progression_studios_megamenu_width = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_width', true );

            $menu_item->progression_studios_megamenu_columns = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_columns', true );

            $menu_item->progression_studios_megamenu_title = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_title', true );

            $menu_item->progression_studios_megamenu_widgetarea = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_widgetarea', true );

				$menu_item->progression_studios_megamenu_icon = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_icon', true );

				$menu_item->progression_studios_megamenu_notif = get_post_meta( $menu_item->ID, '_menu_item_progression_studios_megamenu_notif', true );

            return $menu_item;

        }

    } // end ProgressionMegaMenu() class

}