<?php 
/*
 Plugin Name: Sayara Automotive Pro Posttype
 lugin URI: https://www.themeseye.com/
 Description: Creating new post type for Sayara Automotive Pro Theme.
 Author: Themeseye
 Version: 1.0
 Author URI: https://www.themeseye.com/
*/

define( 'SAYARA_AUTOMOTIVE_PRO_POSTTYPE_VERSION', '1.0' );

add_action( 'init', 'carscategory');
add_action( 'init', 'sayara_automotive_pro_posttype_create_post_type' );

function sayara_automotive_pro_posttype_create_post_type() {
  register_post_type( 'services',
    array(
        'labels' => array(
            'name' => __( 'Services','sayara-automotive-pro-posttype' ),
            'singular_name' => __( 'Services','sayara-automotive-pro-posttype' )
        ),
        'capability_type' =>  'post',
        'menu_icon'  => 'dashicons-tag',
        'public' => true,
        'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'page-attributes',
        'comments'
        )
    )
  );
  register_post_type( 'car',
    array(
      'labels' => array(
        'name' => __( 'Car','sayara-automotive-pro' ),
        'singular_name' => __( 'Car','sayara-automotive-pro' )
      ),
        'capability_type' => 'post',
        'menu_icon'  => 'dashicons-businessman',
        'public' => true,
        'supports' => array( 
          'title',
          'editor',
          'thumbnail'
      )
    )
  );
  register_post_type( 'testimonials',
    array(
  		'labels' => array(
  			'name' => __( 'Testimonials','sayara-automotive-pro-posttype' ),
  			'singular_name' => __( 'Testimonials','sayara-automotive-pro-posttype' )
  		),
  		'capability_type' => 'post',
  		'menu_icon'  => 'dashicons-businessman',
  		'public' => true,
  		'supports' => array(
  			'title',
  			'editor',
  			'thumbnail'
  		)
		)
	);
}

/*----------------Car Start----------------*/
/* ---------------- Car Start ----------------- */

function carscategory() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => __( 'Categories', 'sayara-automotive-pro' ),
    'singular_name'     => __( 'Categories', 'sayara-automotive-pro' ),
    'search_items'      => __( 'Search cats', 'sayara-automotive-pro' ),
    'all_items'         => __( 'All Categories', 'sayara-automotive-pro' ),
    'parent_item'       => __( 'Parent Categories', 'sayara-automotive-pro' ),
    'parent_item_colon' => __( 'Parent Categories:', 'sayara-automotive-pro' ),
    'edit_item'         => __( 'Edit Categories', 'sayara-automotive-pro' ),
    'update_item'       => __( 'Update Categories', 'sayara-automotive-pro' ),
    'add_new_item'      => __( 'Add New Categories', 'sayara-automotive-pro' ),
    'new_item_name'     => __( 'New Categories Name', 'sayara-automotive-pro' ),
    'menu_name'         => __( 'Categories', 'sayara-automotive-pro' ),
  );
  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'carscategory' ),
  );
  register_taxonomy( 'carscategory', array( 'car' ), $args );
}

// Car Meta
function sayara_automotive_pro_posttype_bn_custom_meta_car() {

    add_meta_box( 'bn_meta', __( 'Car Meta', 'sayara-automotive-pro-posttype-pro' ), 'sayara_automotive_pro_posttype_bn_meta_callback_car', 'car', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'sayara_automotive_pro_posttype_bn_custom_meta_car');
}

function sayara_automotive_pro_posttype_bn_meta_callback_car( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );

    $car_name = get_post_meta( $post->ID, 'meta-car-name', true );
    $car_fuel = get_post_meta( $post->ID, 'meta-car-fuel', true );
    $car_seats = get_post_meta( $post->ID, 'meta-car-hp', true );
    $car_speed = get_post_meta( $post->ID, 'meta-car-speed', true );
    $car_price = get_post_meta( $post->ID, 'meta-car-price', true );
    $car_luggage = get_post_meta( $post->ID, 'meta-car-luggage', true );
    $car_transmission = get_post_meta( $post->ID, 'meta-car-transmission', true );
    $car_doors = get_post_meta( $post->ID, 'meta-car-doors', true );
    ?>
  <div id="property_stuff">
    <table id="list-table">     
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-1">
          <td class="left">
              <?php _e( 'Car Name', 'vw-school-pro-posttype' )?>
          </td>
          <td class="left" >
              <input type="text" name="meta-car-name" id="meta-car-name" value="<?php echo esc_html($car_name); ?>" />
          </td>
        </tr>
        <tr id="meta-2">
          <td class="left">
              <?php _e( 'Fuel', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
              <input type="text" name="meta-car-fuel" id="meta-car-fuel" value="<?php echo esc_html($car_fuel); ?>" />
          </td>
        </tr>
        <tr id="meta-3">
          <td class="left">
              <?php _e( 'HP', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
              <input type="text" name="meta-car-hp" id="meta-car-hp" value="<?php echo esc_html($car_seats); ?>" />
          </td>
        </tr>
        <tr id="meta-4">
          <td class="left">
            <?php _e( 'Speed', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-car-speed" id="meta-car-speed" value="<?php echo esc_html($car_speed); ?>" />
          </td>
        </tr>
        <tr id="meta-5">
          <td class="left">
            <?php _e( 'Price', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-car-price" id="meta-car-price" value="<?php echo esc_html($car_price); ?>" />
          </td>
        </tr>
        <tr id="meta-6">
          <td class="left">
            <?php _e( 'Luggage', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-car-luggage" id="meta-car-luggage" value="<?php echo esc_html($car_luggage); ?>" />
          </td>
        </tr>
        <tr id="meta-7">
          <td class="left">
            <?php _e( 'Transmission', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-car-transmission" id="meta-car-transmission" value="<?php echo esc_html($car_transmission); ?>" />
          </td>
        </tr>
        <tr id="meta-7">
          <td class="left">
            <?php _e( 'Doors', 'sayara-automotive-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="meta-car-doors" id="meta-car-doors" value="<?php echo esc_html($car_doors); ?>" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}

function sayara_automotive_pro_posttype_bn_meta_save_car( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if( isset( $_POST[ 'meta-car-name' ] ) ) {
      update_post_meta( $post_id, 'meta-car-name', sanitize_text_field($_POST[ 'meta-car-name' ]) );
  } 

  if( isset( $_POST[ 'meta-car-fuel' ] ) ) {
      update_post_meta( $post_id, 'meta-car-fuel', sanitize_text_field($_POST[ 'meta-car-fuel' ]) );
  } 

  if( isset( $_POST[ 'meta-car-hp' ] ) ) {
      update_post_meta( $post_id, 'meta-car-hp', sanitize_text_field($_POST[ 'meta-car-hp' ]) );
  } 

  if( isset( $_POST[ 'meta-car-speed' ] ) ) {
      update_post_meta( $post_id, 'meta-car-speed', sanitize_text_field($_POST[ 'meta-car-speed' ]) );
  } 

  if( isset( $_POST[ 'meta-car-price' ] ) ) {
      update_post_meta( $post_id, 'meta-car-price', sanitize_text_field($_POST[ 'meta-car-price' ]) );
  } 

  if( isset( $_POST[ 'meta-car-luggage' ] ) ) {
      update_post_meta( $post_id, 'meta-car-luggage', sanitize_text_field($_POST[ 'meta-car-luggage' ]) );
  } 

  if( isset( $_POST[ 'meta-car-transmission' ] ) ) {
      update_post_meta( $post_id, 'meta-car-transmission', sanitize_text_field($_POST[ 'meta-car-transmission' ]) );
  } 

  if( isset( $_POST[ 'meta-car-doors' ] ) ) {
      update_post_meta( $post_id, 'meta-car-doors', sanitize_text_field($_POST[ 'meta-car-doors' ]) );
  }
 
}
add_action( 'save_post', 'sayara_automotive_pro_posttype_bn_meta_save_car' );
// --------------- Services ------------------
// Serives section
function sayara_automotive_pro_posttype_images_metabox_enqueue($hook) {
  if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
    wp_enqueue_script('sayara-automotive-pro-posttype-images-metabox', plugin_dir_url( __FILE__ ) . '/js/img-metabox.js', array('jquery', 'jquery-ui-sortable'));

    global $post;
    if ( $post ) {
      wp_enqueue_media( array(
          'post' => $post->ID,
        )
      );
    }

  }
}
add_action('admin_enqueue_scripts', 'sayara_automotive_pro_posttype_images_metabox_enqueue');

function sayara_automotive_pro_posttype_bn_meta_callback_services( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    
}


function sayara_automotive_pro_posttype_bn_meta_save_services( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
 
  
}
add_action( 'save_post', 'sayara_automotive_pro_posttype_bn_meta_save_services' );

// Service Meta
function our_services_posttype_bn_custom_meta_services() {

    add_meta_box( 'bn_meta', __( 'Service Meta', 'testimonial-posttype-pro' ), 'our_services_posttype_bn_meta_callback_services', 'services', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'our_services_posttype_bn_custom_meta_services');
}
function our_services_posttype_bn_meta_callback_services( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $meta_image = get_post_meta( $post->ID, 'meta-image', true );
    ?>
  <div id="property_stuff">
    <table id="list-table">     
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-1">
          <p>
            <label for="meta-image"><?php echo esc_html('Icon Image'); ?></label><br>
            <input type="text" name="meta-image" id="meta-image" class="meta-image regular-text" value="<?php echo esc_attr($meta_image); ?>">
            <input type="button" class="button image-upload" value="Browse">
          </p>
          <div class="image-preview"><img src="<?php echo $bn_stored_meta['meta-image'][0]; ?>" style="max-width: 250px;"></div>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}

function our_services_posttype_bn_meta_save_services( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Save Image
  if( isset( $_POST[ 'meta-image' ] ) ) {
      update_post_meta( $post_id, 'meta-image', esc_url_raw($_POST[ 'meta-image' ]) );
  }
 
}
add_action( 'save_post', 'our_services_posttype_bn_meta_save_services' );
//Services Shortcode

function sayara_automotive_pro_posttype_services_func( $atts ) {

    $services = ''; 
    $services = '<div id="services">
                    <div class="row">';
    $custom_url = '';
      $new = new WP_Query( array( 'post_type' => 'services' ) );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();

          $post_id = get_the_ID();
          $excerpt = wp_trim_words(get_the_excerpt(),25);
          if(has_post_thumbnail()) {
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large' );
            $thumb_url = $thumb['0'];
          }
          $ser_icon=get_post_meta(get_the_ID(), 'meta-image', true);
            $services .= '<div class="col-md-3 col-lg-3">
                        <div class="testi-data"> 
                          <div class="testimonial_box w-100 mb-3 box-testi" >
                          <div class="team_icon">
                            <img class="text-center" src="'.esc_url($ser_icon).'">
                          </div>
                            <div class="service-title">
                              <h4 class="service_name">
                                <a href="'.get_permalink().'">'.get_the_title().'</a>
                              </h4>
                            </div>
                            <div class="short_text_serv">
                              <div class="short_text pb-3">
                                <p>'.$excerpt.'</p>
                              </div>
                            </div>
                            <div class="textimonial-img">
                              <img src="'.$thumb_url.'" alt=""/>
                            </div>
                            
                          </div>
                        </div>';  
            $services .= '</div>';

            if($k%3 == 0){
                $services.= '<div class="clearfix"></div>'; 
            } 
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
        $services = '<h2 class="center">'.__('Not Found','sayara-automotive-pro-posttype').'</h2>';
      endif;
    $services.= '</div></div>';
  return $services;
  //
}
add_shortcode( 'list-services', 'sayara_automotive_pro_posttype_services_func' );

/*------------------ Testimonial section -------------------*/

/* Adds a meta box to the Testimonial editing screen */
function sayara_automotive_pro_posttype_bn_testimonial_meta_box() {
	add_meta_box( 'sayara-automotive-pro-posttype-testimonial-meta', __( 'Enter Details', 'sayara-automotive-pro-posttype' ), 'sayara_automotive_pro_posttype_bn_testimonial_meta_callback', 'testimonials', 'normal', 'high' );
}
// Hook things in for admin
if (is_admin()){
    add_action('admin_menu', 'sayara_automotive_pro_posttype_bn_testimonial_meta_box');
}

/* Adds a meta box for custom post */
function sayara_automotive_pro_posttype_bn_testimonial_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'sayara_automotive_pro_posttype_posttype_testimonial_meta_nonce' );
  $bn_stored_meta = get_post_meta( $post->ID );
	$desigstory = get_post_meta( $post->ID, 'sayara_automotive_pro_posttype_testimonial_desigstory', true );
	?>
	<div id="testimonials_custom_stuff">
		<table id="list">
			<tbody id="the-list" data-wp-lists="list:meta">
				<tr id="meta-1">
					<td class="left">
						<?php _e( 'Designation', 'sayara-automotive-pro-posttype' )?>
					</td>
					<td class="left" >
						<input type="text" name="sayara_automotive_pro_posttype_testimonial_desigstory" id="sayara_automotive_pro_posttype_testimonial_desigstory" value="<?php echo esc_attr( $desigstory ); ?>" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
}

/* Saves the custom meta input */
function sayara_automotive_pro_posttype_bn_metadesig_save( $post_id ) {
	if (!isset($_POST['sayara_automotive_pro_posttype_posttype_testimonial_meta_nonce']) || !wp_verify_nonce($_POST['sayara_automotive_pro_posttype_posttype_testimonial_meta_nonce'], basename(__FILE__))) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Save desig.
	if( isset( $_POST[ 'sayara_automotive_pro_posttype_testimonial_desigstory' ] ) ) {
		update_post_meta( $post_id, 'sayara_automotive_pro_posttype_testimonial_desigstory', sanitize_text_field($_POST[ 'sayara_automotive_pro_posttype_testimonial_desigstory']) );
	}

}

add_action( 'save_post', 'sayara_automotive_pro_posttype_bn_metadesig_save' );

/*---------------Testimonials shortcode -------------------*/
function sayara_automotive_pro_posttype_testimonial_func( $atts ) {

    $testimonial = ''; 
    $testimonial = '<div id="testimonials">
                    <div class="row">';
    $custom_url = '';
      $new = new WP_Query( array( 'post_type' => 'testimonials' ) );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();

          $post_id = get_the_ID();
          $excerpt = wp_trim_words(get_the_excerpt(),25);
          if(has_post_thumbnail()) {
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large' );
            $thumb_url = $thumb['0'];
          }
          $designation= get_post_meta($post_id,'sayara_automotive_pro_posttype_testimonial_desigstory',true);
            $testimonial .= '<div class="col-md-6">
                        <div class="testi-data "> 
                          <div class="testimonial_box w-100 mb-3 box-testi">
                            <div class="textimonials-img">
                              <img src="'.$thumb_url.'" alt=""/>
                            </div>
                            <div class="testimonial-box ">
                              <h4 class="testimonial_names">
                                <a href="'.get_permalink().'">'.get_the_title().'</a>
                              </h4>
                            </div>
                            <div class="">
                              <p class="dests_testimonial"><cite>'.esc_html($designation).'</cite></p></div>
                            <div class="content_box w-100">
                              <div class="short_text pb-3">
                                <p>'.$excerpt.'</p>
                              </div>
                            </div>
                            
                          </div>
                        </div>';  
            $testimonial .= '</div>';

            if($k%3 == 0){
                $testimonial.= '<div class="clearfix"></div>'; 
            } 
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
        $project = '<h2 class="center">'.__('Not Found','sayara-automotive-pro-posttype').'</h2>';
      endif;
    $testimonial.= '</div></div>';
  return $testimonial;
  //
}
add_shortcode( 'list-testimonials', 'sayara_automotive_pro_posttype_testimonial_func' );

/*--------------Car -----------------*/
/* Adds a meta box for Designation */
function sayara_automotive_pro_posttype_bn_car_meta() {
    add_meta_box( 'sayara_automotive_pro_posttype_bn_meta', __( 'Enter Details','sayara-automotive-pro-posttype' ), 'sayara_automotive_pro_posttype_ex_bn_meta_callback', 'team', 'normal', 'high' );
}
// Hook things in for admin
if (is_admin()){
    add_action('admin_menu', 'sayara_automotive_pro_posttype_bn_car_meta');
}
/* Adds a meta box for custom post */
function sayara_automotive_pro_posttype_ex_bn_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'sayara_automotive_pro_posttype_bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $metacar_price = get_post_meta( $post->ID, 'meta-car-luggage', true );
    //Email details
    if(!empty($bn_stored_meta['meta-desig'][0]))
      $bn_meta_desig = $bn_stored_meta['meta-desig'][0];
    else
      $bn_meta_desig = '';

    //Phone details
    if(!empty($bn_stored_meta['meta-call'][0]))
      $bn_meta_call = $bn_stored_meta['meta-call'][0];
    else
      $bn_meta_call = '';


    //facebook details
    if(!empty($bn_stored_meta['meta-facebookurl'][0]))
      $bn_meta_facebookurl = $bn_stored_meta['meta-facebookurl'][0];
    else
      $bn_meta_facebookurl = '';


    //linkdenurl details
    if(!empty($bn_stored_meta['meta-linkdenurl'][0]))
      $bn_meta_linkdenurl = $bn_stored_meta['meta-linkdenurl'][0];
    else
      $bn_meta_linkdenurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['meta-twitterurl'][0]))
      $bn_meta_twitterurl = $bn_stored_meta['meta-twitterurl'][0];
    else
      $bn_meta_twitterurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['meta-googleplusurl'][0]))
      $bn_meta_googleplusurl = $bn_stored_meta['meta-googleplusurl'][0];
    else
      $bn_meta_googleplusurl = '';

    //twitterurl details
    if(!empty($bn_stored_meta['meta-designation'][0]))
      $bn_meta_designation = $bn_stored_meta['meta-designation'][0];
    else
      $bn_meta_designation = '';

    ?>
    <div id="agent_custom_stuff">
        <table id="list-table">         
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-1">
                    <td class="left">
                        <?php _e( 'Email', 'sayara-automotive-pro-posttype' )?>
                    </td>
                    <td class="left" >
                        <input type="text" name="meta-desig" id="meta-desig" value="<?php echo esc_attr($bn_meta_desig); ?>" />
                    </td>
                </tr>
                <tr id="meta-2">
                    <td class="left">
                        <?php _e( 'Phone Number', 'sayara-automotive-pro-posttype' )?>
                    </td>
                    <td class="left" >
                        <input type="text" name="meta-call" id="meta-call" value="<?php echo esc_attr($bn_meta_call); ?>" />
                    </td>
                </tr>
                <tr id="meta-3">
                  <td class="left">
                    <?php _e( 'Facebook Url', 'sayara-automotive-pro-posttype' )?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-facebookurl" id="meta-facebookurl" value="<?php echo esc_url($bn_meta_facebookurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-4">
                  <td class="left">
                    <?php _e( 'Linkedin URL', 'sayara-automotive-pro-posttype' )?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-linkdenurl" id="meta-linkdenurl" value="<?php echo esc_url($bn_meta_linkdenurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-5">
                  <td class="left">
                    <?php _e( 'Twitter Url', 'sayara-automotive-pro-posttype' ); ?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-twitterurl" id="meta-twitterurl" value="<?php echo esc_url( $bn_meta_twitterurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-6">
                  <td class="left">
                    <?php _e( 'GooglePlus URL', 'sayara-automotive-pro-posttype' ); ?>
                  </td>
                  <td class="left" >
                    <input type="url" name="meta-googleplusurl" id="meta-googleplusurl" value="<?php echo esc_url($bn_meta_googleplusurl); ?>" />
                  </td>
                </tr>
                <tr id="meta-7">
                  <td class="left">
                    <?php _e( 'Designation', 'sayara-automotive-pro-posttype' ); ?>
                  </td>
                  <td class="left" >
                    <input type="text" name="meta-designation" id="meta-designation" value="<?php echo esc_attr($bn_meta_designation); ?>" />
                  </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}
/* Saves the custom Designation meta input */
function sayara_automotive_pro_posttype_ex_bn_metadesig_save( $post_id ) {
    if( isset( $_POST[ 'meta-desig' ] ) ) {
        update_post_meta( $post_id, 'meta-desig', esc_html($_POST[ 'meta-desig' ]) );
    }
    if( isset( $_POST[ 'meta-call' ] ) ) {
        update_post_meta( $post_id, 'meta-call', esc_html($_POST[ 'meta-call' ]) );
    }
    // Save facebookurl
    if( isset( $_POST[ 'meta-facebookurl' ] ) ) {
        update_post_meta( $post_id, 'meta-facebookurl', esc_url($_POST[ 'meta-facebookurl' ]) );
    }
    // Save linkdenurl
    if( isset( $_POST[ 'meta-linkdenurl' ] ) ) {
        update_post_meta( $post_id, 'meta-linkdenurl', esc_url($_POST[ 'meta-linkdenurl' ]) );
    }
    if( isset( $_POST[ 'meta-twitterurl' ] ) ) {
        update_post_meta( $post_id, 'meta-twitterurl', esc_url($_POST[ 'meta-twitterurl' ]) );
    }
    // Save googleplusurl
    if( isset( $_POST[ 'meta-googleplusurl' ] ) ) {
        update_post_meta( $post_id, 'meta-googleplusurl', esc_url($_POST[ 'meta-googleplusurl' ]) );
    }
    // Save designation
    if( isset( $_POST[ 'meta-designation' ] ) ) {
        update_post_meta( $post_id, 'meta-designation', esc_html($_POST[ 'meta-designation' ]) );
    }
}
add_action( 'save_post', 'sayara_automotive_pro_posttype_ex_bn_metadesig_save' );

add_action( 'save_post', 'bn_meta_save' );
/* Saves the custom meta input */
function bn_meta_save( $post_id ) {
  if( isset( $_POST[ 'sayara_automotive_pro_posttype_team_featured' ] )) {
      update_post_meta( $post_id, 'sayara_automotive_pro_posttype_team_featured', esc_attr(1));
  }else{
    update_post_meta( $post_id, 'sayara_automotive_pro_posttype_team_featured', esc_attr(0));
  }
}
/*------------ SHORTCODES ----------------*/


/* Car shortcode */
function sayara_automotive_pro_posttype_car_func( $atts ) {
  $car = '';
  $car = '<div class="row">';
  $query = new WP_Query( array( 'post_type' => 'car') );

    if ( $query->have_posts() ) :

  $k=1;
  $new = new WP_Query('post_type=car');

  while ($new->have_posts()) : $new->the_post();
        $custom_url ='';
        $post_id = get_the_ID();
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
        $url = $thumb['0'];
        $carrent = get_post_meta($post_id,'meta-car-name',true);
        $carduration = get_post_meta($post_id,'meta-car-fuel',true);
        $carseats = get_post_meta($post_id,'meta-car-hp',true);
        $carspeed = get_post_meta($post_id,'meta-car-speed',true);
        $cartra = get_post_meta($post_id,'meta-car-transmission',true);
        $carprice = get_post_meta($post_id,'meta-car-price',true);
        $excerpt = wp_trim_words(get_the_excerpt(),15);
        if(get_post_meta($post_id,'meta-services-url',true !='')){$custom_url =get_post_meta($post_id,'meta-services-url',true); } else{ $custom_url = get_permalink(); }
        $car .= '<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
                      <div class="car-box">
                        <img src="'.esc_url($url).'">
                        <ul class="car-meta-fields">
                           <li class="car_name">
                            '.$carrent.'</li>
                            <li class="car_name">'.$carduration.'</li>
                            </li>
                            <li>
                              '.$carseats.'
                            </li>
                            <li class="car_name">
                              '.$cartra.'
                            </li>   
                        </ul>
                        <h5><a href="'.esc_url($custom_url).'">'.esc_html(get_the_title()) .'</a></h5>
                        <div class="short_text_car">'.$excerpt.'</div>
                        <div class="car_price">
                            '.$carprice.'
                          </div>
                      </div>
                  </div>';


    if($k%2 == 0){
      $car.= '<div class="clearfix"></div>';
    }
      $k++;
  endwhile;
  else :
    $car = '<h2 class="center">'.esc_html__('Post Not Found','sayara-automotive-pro').'</h2>';
  endif;
  $car .= '</div>';
  return $car;
}

add_shortcode( 'sayara-automotive-pro-cars', 'sayara_automotive_pro_posttype_car_func' );
