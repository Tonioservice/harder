<?php
/**
* Plugin Name: Hard Universe Event Booking
* Description: Hard Universe Event Booking
* Version: 0.1
* Author: Tonio Service
**/





$plugin_url = plugin_dir_url( __FILE__ );

// enqueue
/*function hueb_styles() {
    wp_enqueue_style( 'style',  $plugin_url . "/style.css");
}
add_action( 'admin_print_styles', 'hueb_styles' );*/











global $wpdb;
// table prefix
$table_prefix = $wpdb->prefix;
// Table name
$table_name = $table_prefix . '_hueb_buses';

// Act on plugin activation
register_activation_hook( __FILE__, "activate_hueb" );

// Activate Plugin
function activate_hueb() {

	// Execute tasks on Plugin activation

	// Insert DB Tables
	init_db_hueb();
}

// Initialize DB Tables
function init_db_hueb() {

	// WP Globals
	global $wpdb, $table_name;

	// Create Table if not exist
	$sql = "CREATE TABLE IF NOT EXISTS `hueb_buses` (";
	$sql .= " `id` INT NOT NULL AUTO_INCREMENT , `bus_data` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

	// Include Upgrade Script
	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

	// Create Table
	dbDelta( $sql );

	$wpdb->last_error;

}






// admin menu
add_action('admin_menu', 'hard_universe_event_booking');
function hard_universe_event_booking() {
    add_menu_page( 'Hard Universe Event Booking', 'Hard Universe Event Booking', 'manage_options', 'hard_universe_event_booking', 'hard_universe_event_booking_content' );
    add_submenu_page("hard_universe_event_booking", "Events", "Events", 0, "hard_universe_events", "hard_universe_events");
    add_submenu_page("hard_universe_event_booking", "Add A Bus", "Add A Bus", 0, "hard_universe_add_a_bus", "hard_universe_add_a_bus");
}

// menu - Hard Universe Event Booking
function hard_universe_event_booking_content () {
	echo "<h1>Ajout d'un événement</h1><hr>";

	if ( isset( $_POST['add_event_submit'] ) ) {
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// uplaod image to media library
	    if($_FILES['event_image']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_image'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $image_attach_id = wp_insert_attachment( $attachment, $filename);
            }
        endif;
		// uplaod gallery to media library
		$gallery_ids = '';
		if($_FILES['event_gallery1']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery1'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery2']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery2'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery3']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery3'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery4']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery4'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery5']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery5'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery6']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery6'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery7']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery7'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery8']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery8'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery9']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery9'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id . ',';
            }
        endif;
		if($_FILES['event_gallery10']['size'] != 0):
            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $_FILES['event_gallery10'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile ) {
                $wp_filetype = $movefile['type'];
                $filename = $movefile['file'];
                $wp_upload_dir = wp_upload_dir();
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $wp_filetype,
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                echo $attach_id = wp_insert_attachment( $attachment, $filename);
                $gallery_ids .= $attach_id;
            }
        endif;
		// save all form fields in variables
		// checkboxes
		$is_visible = $_POST['is_visible'];
		$is_visible_homepage = $_POST['is_visible_homepage'];
		$is_locked = $_POST['is_locked'];
		$can_select_seat = $_POST['can_select_seat'];
		// small fields
		$event_category = $_POST['event_category'];
		$event_prix_achat = $_POST['event_prix_achat'];
		$event_nom = $_POST['event_nom'];
		$event_prix = $_POST['event_prix'];
		$event_location = $_POST['event_location'];
		$event_dtDebut = $_POST['event_dtDebut'];
		$event_hrDebut = $_POST['event_hrDebut'];
		$event_dtFin = $_POST['event_dtFin'];
		$event_hrFin = $_POST['event_hrFin'];
		$event_age = $_POST['event_age'];
		$event_dtDebutInscription = $_POST['event_dtDebutInscription'];
		// large fields
		$event_description = $_POST['event_description'];
		$event_lineup = $_POST['event_lineup'];
		$event_videos = $_POST['event_videos'];

		// create woocommerce product for event
		$product = new WC_Product_Simple();
		$product->set_name( $event_nom ); // product title
		$product->set_slug( $event_nom );
		$product->set_regular_price( (float)$event_prix ); // in current shop currency
		// $product->set_short_description( $event_description );
		$product->set_description( $event_description );
		$product->set_image_id( $image_attach_id );
		// let's suppose that our 'Accessories' category has ID = 19 
		$product->set_category_ids( array( (int)$event_category ) );
		// you can also use $product->set_tag_ids() for tags, brands etc
		// product meta data - checkboxes
		$product->update_meta_data('is_visible', $is_visible);
		$product->update_meta_data('is_visible_homepage', $is_visible_homepage);
		$product->update_meta_data('is_locked', $is_locked);
		$product->update_meta_data('can_select_seat', $can_select_seat);
		// product meta data - small fields
		$product->update_meta_data('event_prix_achat', $event_prix_achat);
		$product->update_meta_data('event_location', $event_location);
		$product->update_meta_data('event_dtDebut', $event_dtDebut);
		$product->update_meta_data('event_hrDebut', $event_hrDebut);
		$product->update_meta_data('event_dtFin', $event_dtFin);
		$product->update_meta_data('event_hrFin', $event_hrFin);
		$product->update_meta_data('event_age', $event_age);
		$product->update_meta_data('event_dtDebutInscription', $event_dtDebutInscription);
		// product meta data - large fields
		$product->update_meta_data('event_lineup', $event_lineup);
		$product->update_meta_data('event_videos', $event_videos);
		// product meta data - images
		$product->update_meta_data('_product_image_gallery', $gallery_ids);
		// save product
		$product->save();
	}
	?>
	<div>
		<form method="POST" enctype="multipart/form-data">
			<table class="form-table">
				<tbody>
					<tr>
						<td colspan="4"><input type="checkbox" name="is_visible"><label>Afficher</label></td>
					</tr>
					<tr>
						<td colspan="4"><input type="checkbox" name="is_visible_homepage"><label>Afficher sur l'accueil</label></td>
					</tr>
					<tr>
						<td colspan="4"><input type="checkbox" name="is_locked"><label>Inscriptions ouvertes</label></td>
					</tr>
					<tr>
						<td colspan="4"><input type="checkbox" name="can_select_seat"><label>Réservations des sièges</label></td>
					</tr>
					<tr>
						<td>Catégorie:</td>
						<td>
							<select name="event_category">
								<option value="16">Hard-Universe</option>
								<option value="17">House-Universe</option>
								<option value="18">Metal-Universe</option>
							</select>
						</td>
						<td>Prix d'achat billets:</td>
						<td><input type="text" name="event_prix_achat" value="0.00"></td>
					</tr>
					<tr>
						<td>Nom:</td>
						<td><input type="text" name="event_nom"></td>
						<td>Prix de vente:</td>
						<td><input type="text" name="event_prix" value="0.00">CHF</td>
					</tr>
					<tr>
						<td>Image:</td>
						<td><input type="file" name="event_image"></td>
						<td>Emplacement:</td>
						<td><input type="text" name="event_location"></td>
					</tr>
					<tr>
						<td>Début:</td>
						<td><input type="text" name="event_dtDebut" value="01.12.23"><input type="text" name="event_hrDebut" value="00:00" multiple="false"></td>
						<td>Fin:</td>
						<td><input type="text" name="event_dtFin" value="01.12.23"><input type="text" name="event_hrFin" value="00:00"></td>
					</tr>
					<tr>
						<td>Age:</td>
						<td><input type="text" name="event_age"></td>
						<td>Début inscription:</td>
						<td><input type="text" name="event_dtDebutInscription" value="01.12.23"></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><textarea rows="15" cols="60" name="event_description"></textarea></td>
						<td>Lineup:</td>
						<td><textarea rows="15" cols="60" name="event_lineup"></textarea></td>
					</tr>
					<tr>
						<td>Videos:</td>
						<td><textarea rows="15" cols="60" name="event_videos"></textarea></td>
						<td>Gallery:</td>
						<td><input type="file" name="event_gallery1">
						<input type="file" name="event_gallery2">
						<input type="file" name="event_gallery3">
						<input type="file" name="event_gallery4">
						<input type="file" name="event_gallery5">
						<input type="file" name="event_gallery6">
						<input type="file" name="event_gallery7">
						<input type="file" name="event_gallery8">
						<input type="file" name="event_gallery9">
						<input type="file" name="event_gallery10"></td>
					</tr>
				</tbody>
			</table>
			<hr>
			<input type="submit" name="add_event_submit" value="Ajouter" class="button-primary">
			<a href=""><input type="button" class="button" value="Retour à la liste"></a>
		</form>
	</div>
	<?php
}





// submenu
function hard_universe_events () {

	if ( isset( $_GET['edit_event'] ) && !isset( $_GET['edit_participants'] ) ) {
		// edit event
		echo "<h1>Edition d'un événement</h1><hr>";
		?>

		<a href="?page=hard_universe_events&edit_event=<?php echo $_GET['edit_event'] ?>&edit_participants=true">Editer les participants</a>

		<?php
		if ( isset( $_POST['edit_event_submit'] ) ) {
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			// echo "<pre>";
			// print_r($_FILES);
			// echo "</pre>";
			// uplaod image to media library
		    if($_FILES['event_image']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_image'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $image_attach_id = wp_insert_attachment( $attachment, $filename);
		        }
		    endif;
			// uplaod gallery to media library
			$gallery_ids = '';
			if($_FILES['event_gallery1']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery1'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery2']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery2'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery3']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery3'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery4']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery4'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery5']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery5'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery6']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery6'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery7']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery7'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery8']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery8'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery9']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery9'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id . ',';
		        }
		    endif;
			if($_FILES['event_gallery10']['size'] != 0):
		        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
		        $uploadedfile = $_FILES['event_gallery10'];
		        $upload_overrides = array( 'test_form' => false );
		        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		        if ( $movefile ) {
		            $wp_filetype = $movefile['type'];
		            $filename = $movefile['file'];
		            $wp_upload_dir = wp_upload_dir();
		            $attachment = array(
		                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
		                'post_mime_type' => $wp_filetype,
		                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		                'post_content' => '',
		                'post_status' => 'inherit'
		            );
		            echo $attach_id = wp_insert_attachment( $attachment, $filename);
		            $gallery_ids .= $attach_id;
		        }
		    endif;
			// save all form fields in variables
			// checkboxes
			$is_visible = $_POST['is_visible'];
			$is_visible_homepage = $_POST['is_visible_homepage'];
			$is_locked = $_POST['is_locked'];
			$can_select_seat = $_POST['can_select_seat'];
			// small fields
			$event_category = $_POST['event_category'];
			$event_prix_achat = $_POST['event_prix_achat'];
			$event_nom = $_POST['event_nom'];
			$event_prix = $_POST['event_prix'];
			$event_location = $_POST['event_location'];
			$event_dtDebut = $_POST['event_dtDebut'];
			$event_hrDebut = $_POST['event_hrDebut'];
			$event_dtFin = $_POST['event_dtFin'];
			$event_hrFin = $_POST['event_hrFin'];
			$event_age = $_POST['event_age'];
			$event_dtDebutInscription = $_POST['event_dtDebutInscription'];
			// large fields
			$event_description = $_POST['event_description'];
			$event_lineup = $_POST['event_lineup'];
			$event_videos = $_POST['event_videos'];

			// create woocommerce product for event
			$productId = $_GET['edit_event'];
			$product = wc_get_product( $productId );
			$product->set_name( $event_nom ); // product title
			$product->set_slug( $event_nom );
			$product->set_regular_price( (float)$event_prix ); // in current shop currency
			// $product->set_short_description( $event_description );
			$product->set_description( $event_description );
			$product->set_image_id( $image_attach_id );
			// let's suppose that our 'Accessories' category has ID = 19 
			$product->set_category_ids( array( (int)$event_category ) );
			// you can also use $product->set_tag_ids() for tags, brands etc
			// product meta data - checkboxes
			$product->update_meta_data('is_visible', $is_visible);
			$product->update_meta_data('is_visible_homepage', $is_visible_homepage);
			$product->update_meta_data('is_locked', $is_locked);
			$product->update_meta_data('can_select_seat', $can_select_seat);
			// product meta data - small fields
			$product->update_meta_data('event_prix_achat', $event_prix_achat);
			$product->update_meta_data('event_location', $event_location);
			$product->update_meta_data('event_dtDebut', $event_dtDebut);
			$product->update_meta_data('event_hrDebut', $event_hrDebut);
			$product->update_meta_data('event_dtFin', $event_dtFin);
			$product->update_meta_data('event_hrFin', $event_hrFin);
			$product->update_meta_data('event_age', $event_age);
			$product->update_meta_data('event_dtDebutInscription', $event_dtDebutInscription);
			// product meta data - large fields
			$product->update_meta_data('event_lineup', $event_lineup);
			$product->update_meta_data('event_videos', $event_videos);
			// product meta data - images
			$product->update_meta_data('_product_image_gallery', $gallery_ids);
			// save product
			$product->save();
		}

		// get product info
		$productId_edit = $_GET['edit_event'];
		$product_edit = wc_get_product( $productId_edit );
		// main product data
		$title_edit = $product_edit->get_title();
		$description_edit = $product_edit->get_description();
		$category_edit = $product_edit->get_category_ids();
		$category_edit = $category_edit[0];
		$price_edit = $product_edit->get_price();
		$image_edit = $product_edit->get_image(array('width'=>'125','height'=>'125'));
		// echo $image_edit = $product_edit->get_image('woocommerce_thumbnail', array('width'=>'125','height'=>'125'), true);
		// echo $image_edit = $product_edit->get_image_id();
		// echo $image_edit = wp_get_attachment_image( $image_edit, 'thumbnail' );
		// product meta data - checkboxes
		$is_visible_edit = $product_edit->get_meta('is_visible');
		$is_visible_homepage_edit = $product_edit->get_meta('is_visible_homepage');
		$is_locked_edit = $product_edit->get_meta('is_locked');
		$can_select_seat_edit = $product_edit->get_meta('can_select_seat');
		// product meta data - small fields
		$event_prix_achat_edit = $product_edit->get_meta('event_prix_achat');
		$event_location_edit = $product_edit->get_meta('event_location');
		$event_dtDebut_edit = $product_edit->get_meta('event_dtDebut');
		$event_hrDebut_edit = $product_edit->get_meta('event_hrDebut');
		$event_dtFin_edit = $product_edit->get_meta('event_dtFin');
		$event_hrFin_edit = $product_edit->get_meta('event_hrFin');
		$event_age_edit = $product_edit->get_meta('event_age');
		$event_dtDebutInscription_edit = $product_edit->get_meta('event_dtDebutInscription');
		// product meta data - large fields
		$event_lineup_edit = $product_edit->get_meta('event_lineup');
		$event_videos_edit = $product_edit->get_meta('event_videos');
		// product meta data - images
		// echo $gallery_ids_edit = $product_edit->get_meta('_product_image_gallery');
		$gallery_ids_edit = $product_edit->get_gallery_image_ids();
		?>

		<style type="text/css">
			img {
				width: 100px;
				height: 100px;
			}
		</style>
		<div>
			<form method="POST" enctype="multipart/form-data">
				<table class="form-table">
					<tbody>
						<tr>
							<td colspan="4"><input type="checkbox" name="is_visible" <?php echo ($is_visible_edit=="on") ? 'checked':''; ?>><label>Afficher</label></td>
						</tr>
						<tr>
							<td colspan="4"><input type="checkbox" name="is_visible_homepage" <?php echo ($is_visible_homepage_edit=="on") ? 'checked':''; ?>><label>Afficher sur l'accueil</label></td>
						</tr>
						<tr>
							<td colspan="4"><input type="checkbox" name="is_locked" <?php echo ($is_locked_edit=="on") ? 'checked':''; ?>><label>Inscriptions ouvertes</label></td>
						</tr>
						<tr>
							<td colspan="4"><input type="checkbox" name="can_select_seat" <?php echo ($can_select_seat_edit=="on") ? 'checked':''; ?>><label>Réservations des sièges</label></td>
						</tr>
						<tr>
							<td>Catégorie:</td>
							<td>
								<select name="event_category">
									<option value="16" <?php echo ($category_edit=="16") ? 'selected':''; ?>>Hard-Universe</option>
									<option value="17" <?php echo ($category_edit=="17") ? 'selected':''; ?>>House-Universe</option>
									<option value="18" <?php echo ($category_edit=="18") ? 'selected':''; ?>>Metal-Universe</option>
								</select>
							</td>
							<td>Prix d'achat billets:</td>
							<td><input type="text" name="event_prix_achat" value="<?php echo $event_prix_achat_edit; ?>"></td>
						</tr>
						<tr>
							<td>Nom:</td>
							<td><input type="text" name="event_nom" value="<?php echo $title_edit; ?>"></td>
							<td>Prix de vente:</td>
							<td><input type="text" name="event_prix" value="<?php echo $price_edit; ?>">CHF</td>
						</tr>
						<tr>
							<td>Image:</td>
							<td><?php echo $image_edit; ?><input type="file" name="event_image"></td>
							<td>Emplacement:</td>
							<td><input type="text" name="event_location" value="<?php echo $event_location_edit; ?>"></td>
						</tr>
						<tr>
							<td>Début:</td>
							<td><input type="text" name="event_dtDebut" value="<?php echo $event_dtDebut_edit; ?>"><input type="text" name="event_hrDebut" value="<?php echo $event_hrDebut_edit; ?>" multiple="false"></td>
							<td>Fin:</td>
							<td><input type="text" name="event_dtFin" value="<?php echo $event_dtFin_edit; ?>"><input type="text" name="event_hrFin" value="<?php echo $event_hrFin_edit; ?>"></td>
						</tr>
						<tr>
							<td>Age:</td>
							<td><input type="text" name="event_age" value="<?php echo $event_age_edit; ?>"></td>
							<td>Début inscription:</td>
							<td><input type="text" name="event_dtDebutInscription" value="<?php echo $event_dtDebutInscription_edit; ?>"></td>
						</tr>
						<tr>
							<td>Description:</td>
							<td><textarea rows="15" cols="60" name="event_description"><?php echo $description_edit; ?></textarea></td>
							<td>Lineup:</td>
							<td><textarea rows="15" cols="60" name="event_lineup"><?php echo $event_lineup_edit; ?></textarea></td>
						</tr>
						<tr>
							<td>Videos:</td>
							<td><textarea rows="15" cols="60" name="event_videos"><?php echo $event_videos_edit; ?></textarea></td>
							<td>Gallery:</td>
							<td>
								<?php
									foreach ($gallery_ids_edit as $value) {
										echo wp_get_attachment_image($value);
									}
								?>
								<br>
								<input type="file" name="event_gallery1">
								<input type="file" name="event_gallery2">
								<input type="file" name="event_gallery3">
								<input type="file" name="event_gallery4">
								<input type="file" name="event_gallery5">
								<input type="file" name="event_gallery6">
								<input type="file" name="event_gallery7">
								<input type="file" name="event_gallery8">
								<input type="file" name="event_gallery9">
								<input type="file" name="event_gallery10">
							</td>
						</tr>
					</tbody>
				</table>
				<hr>
				<input type="submit" name="edit_event_submit" value="Ajouter" class="button-primary">
				<a href=""><input type="button" class="button" value="Retour à la liste"></a>
			</form>
		</div>

	<?php
	} elseif ( isset( $_GET['edit_event'] ) && isset( $_GET['edit_participants'] ) ) {
		// css
		?>
		<style type="text/css">
			#bus_graphic_add_participant_to_seat {
			    position: fixed;
			    left: 0;
			    top: 0;
			    width: 100%;
			    height: 100%;
			    background-color: rgba(0, 0, 0, 0.5);
			    display: none;
			}
			#bus_graphic_add_participant_to_seat_content {
			    position: absolute;
			    top: 50%;
			    left: 50%;
			    transform: translate(-50%, -50%);
			    background-color: white;
			    padding: 1rem 1.5rem;
			    width: 24rem;
			    border-radius: 0.5rem;
			}
		</style>
		<?php
		// bus graphic add participant to seat
		if ( isset( $_POST['bus_graphic_add_participant_to_seat_submit'] ) ) {
			$bus_graphic_add_participant_to_seat_select = $_POST['bus_graphic_add_participant_to_seat_select'];
			$slot_name = $_POST['slot_name'];
			$bus_id_from_js = $_POST['bus_id'];
			// get event product object
			$bus_graphic_add_participant_to_seat_product_id = $_GET['edit_event'];
			$bus_graphic_add_participant_to_seat_product = wc_get_product( $bus_graphic_add_participant_to_seat_product_id );
			// get any existing participants
			$bus_graphic_add_participant_to_seat_product_meta = $bus_graphic_add_participant_to_seat_product->get_meta('participants_seats');
			$bus_graphic_add_participant_to_seat_product_meta = $bus_graphic_add_participant_to_seat_product_meta . ',' . $bus_graphic_add_participant_to_seat_select . '+' . $slot_name . '+' . $bus_id_from_js;
			// add new bus to meta field
			$bus_graphic_add_participant_to_seat_product->update_meta_data('participants_seats', $bus_graphic_add_participant_to_seat_product_meta);
			$bus_graphic_add_participant_to_seat_product->save();
		}
		// remove participant from place of bus of event
		if ( isset( $_POST['remove_participant_from_place_of_bus_of_event'] ) ) {
			$participant_id = $_POST['participant_id'];
			$place = $_POST['place'];
			// get event product object
			$remove_participant_from_place_of_bus_of_event_product_id = $_GET['edit_event'];
			$remove_participant_from_place_of_bus_of_event_product = wc_get_product( $remove_participant_from_place_of_bus_of_event_product_id );
			// get any existing participants
			$remove_participant_from_place_of_bus_of_event_product_meta = $remove_participant_from_place_of_bus_of_event_product->get_meta('participants');
			$remove_participant_from_place_of_bus_of_event_product_meta = explode(",", $remove_participant_from_place_of_bus_of_event_product_meta);
			foreach ($remove_participant_from_place_of_bus_of_event_product_meta as $key => $participant) {
				echo $participant;
				echo "<br>";
				$participant_array = explode("+", $participant);
				if ( $participant_array[0] == $participant_id && $participant_array[4] == $place ) {
        			unset($remove_participant_from_place_of_bus_of_event_product_meta[$key]);
				}
			}
			$remove_participant_from_place_of_bus_of_event_product_meta = implode(",", $remove_participant_from_place_of_bus_of_event_product_meta);
			// add new bus to meta field
			$remove_participant_from_place_of_bus_of_event_product->update_meta_data('participants', $remove_participant_from_place_of_bus_of_event_product_meta);
			$remove_participant_from_place_of_bus_of_event_product->save();
		}
		// delete place from bus of event
		if ( isset( $_POST['delete_place_from_bus_of_event'] ) ) {
			echo $bus_id = $_POST['bus_id'];
			echo $place = $_POST['place'];
			// get event product object
			$delete_place_from_bus_of_event_product_id = $_GET['edit_event'];
			$delete_place_from_bus_of_event_product = wc_get_product( $delete_place_from_bus_of_event_product_id );
			// get any existing buses
			$delete_place_from_bus_of_event_product_meta = $delete_place_from_bus_of_event_product->get_meta('bus_'.$bus_id.'_places_and_times');
			$delete_place_from_bus_of_event_product_meta = explode(",", $delete_place_from_bus_of_event_product_meta);
			foreach ($delete_place_from_bus_of_event_product_meta as $key => $value) {
				if ( $value == $place ) {
        			unset($delete_place_from_bus_of_event_product_meta[$key]);
				}
			}
			$delete_place_from_bus_of_event_product_meta = implode(",", $delete_place_from_bus_of_event_product_meta);
			// add new bus to meta field
			$delete_place_from_bus_of_event_product->update_meta_data('bus_'.$bus_id.'_places_and_times', $delete_place_from_bus_of_event_product_meta);
			$delete_place_from_bus_of_event_product->save();
		}
		// add bus to event
		if ( isset( $_POST['add_bus_to_event_submit'] ) ) {
			$add_bus_to_event_bus = $_POST['add_bus_to_event_bus'];
			$add_bus_to_event_cost = $_POST['add_bus_to_event_cost'];
			// get event object
			$product_id_add_bus = $_GET['edit_event'];
			$product_add_bus = wc_get_product( $product_id_add_bus );
			// get any existing buses
			$old_bus = $product_add_bus->get_meta('bus');
			$all_buses =  $old_bus.','.$add_bus_to_event_bus;
			$old_bus_cost = $product_add_bus->get_meta('bus_cost');
			$all_buses_cost =  $old_bus_cost.','.$add_bus_to_event_cost;
			// add new bus to meta field
			$product_add_bus->update_meta_data('bus', $all_buses);
			$product_add_bus->update_meta_data('bus_cost', $all_buses_cost);
			$product_add_bus->save();
		}
		?>
		<br><br>
		<button onclick="add_bus_to_event_button()">Ajouter un car</button>
		<button onclick="add_place_to_bus_of_event_button()">Ajouter un lieu</button>
		<button onclick="add_participant_to_place_of_bus_of_event_button()">Ajouter une personne</button>
		<div id="add_bus_to_event_div" style="display:none;border:1px solid black;">
		    <form action="" method="post">
		    	Car<br>
		    	<select name="add_bus_to_event_bus">
		    		<option></option>
		    		<?php
		    		global $wpdb;
		    		$sql = "SELECT * FROM hueb_buses";
					$result = $wpdb->get_results($sql);
					foreach( $result as $row ) {
				        $row_bus_data = $row->bus_data;
				        $row_bus_data = json_decode($row_bus_data);
				        $row_bus_name = $row_bus_data->bus_name;
				        $row_bus_id = $row->id;
				        ?>
				        <option value="<?php echo $row_bus_id; ?>"><?php echo $row_bus_name; ?></option>
				        <?php
				    }
		    		?>
		    	</select><br>
		    	Cout du car<br>
		    	<input type="number" name="add_bus_to_event_cost"><br>
		    	<input type="submit" name="add_bus_to_event_submit">
		    </form>
		</div>
		<?php
		// add place to bus of event
		if ( isset( $_POST['add_place_to_bus_of_event_submit'] ) ) {
			$add_place_to_bus_of_event_bus = $_POST['add_place_to_bus_of_event_bus'];
			$add_place_to_bus_of_event_place = $_POST['add_place_to_bus_of_event_place'];
			$add_place_to_bus_of_event_time = $_POST['add_place_to_bus_of_event_time'];
			// get event object
			$product_id_add_place_to_bus = $_GET['edit_event'];
			$product_add_place_to_bus = wc_get_product( $product_id_add_place_to_bus );
			// get any existing buses
			$old_places_and_times_of_bus = $product_add_place_to_bus->get_meta('bus_'.$add_place_to_bus_of_event_bus.'_places_and_times');
			$all_places_and_times_of_bus =  $old_places_and_times_of_bus.','.$add_place_to_bus_of_event_place.'+'.$add_place_to_bus_of_event_time;
			// add new bus to meta field
			$product_add_place_to_bus->update_meta_data('bus_'.$add_place_to_bus_of_event_bus.'_places_and_times', $all_places_and_times_of_bus);
			$product_add_place_to_bus->save();
		}
		?>
		<div id="add_place_to_bus_of_event_div" style="display:none;border:1px solid black;">
		    <form action="" method="post">
		    	Car<br>
		    	<select name="add_place_to_bus_of_event_bus">
		    		<option></option>
		    		<?php
		    		// display buses of this event
					$product_id_list_buses = $_GET['edit_event'];
					$product_list_buses = wc_get_product( $product_id_list_buses );
					$list_buses = $product_list_buses->get_meta('bus');
					$list_buses_array = explode(',', $list_buses);
					foreach (array_slice($list_buses_array,1) as $bus_id) {
						global $wpdb;
			    		$sql = "SELECT * FROM hueb_buses WHERE id=$bus_id";
						$result = $wpdb->get_results($sql);
						foreach( $result as $row ) {
					        $row_bus_data = $row->bus_data;
					        $row_bus_data = json_decode($row_bus_data);
							?>
							<option value="<?php echo $bus_id; ?>"><?php echo $row_bus_data->bus_name; ?></option>
							<?php
						}
					}
		    		?>
		    	</select><br>
		    	Lieu de départ<br>
		    	<select name="add_place_to_bus_of_event_place">
		    		<option></option>
		    		<option>Genève</option>
		    		<option>Martigny</option>
		    		<option>Lausanne</option>
		    		<option>Yverdon</option>
		    		<option>Neuchâtel</option>
		    		<option>Payerne</option>
		    		<option>Bern</option>
		    		<option>Vevey</option>
		    		<option>Sierre</option>
		    		<option>Bienne</option>
		    		<option>Curtilles</option>
		    		<option>Bâle</option>
		    		<option>null</option>
		    	</select><br>
		    	Heure de départ<br>
		    	<input type="text" name="add_place_to_bus_of_event_time" placeholder="00:00"><br>
		    	<input type="submit" name="add_place_to_bus_of_event_submit">
		    </form>
		</div>
		<?php
		// add participant to place of bus of event
		if ( isset( $_POST['add_participant_to_place_of_bus_of_event_submit'] ) ) {
			$add_participant_to_place_of_bus_of_event_participant = $_POST['add_participant_to_place_of_bus_of_event_participant'];
			$add_participant_to_place_of_bus_of_event_balance = $_POST['add_participant_to_place_of_bus_of_event_balance'];
			$add_participant_to_place_of_bus_of_event_total_amount = $_POST['add_participant_to_place_of_bus_of_event_total_amount'];
			$add_participant_to_place_of_bus_of_event_assurance = $_POST['add_participant_to_place_of_bus_of_event_assurance'];
			$add_participant_to_place_of_bus_of_event_place = $_POST['add_participant_to_place_of_bus_of_event_place'];
			$add_participant_to_place_of_bus_of_event_referrer = $_POST['add_participant_to_place_of_bus_of_event_referrer'];
			// get event object
			$product_id_add_participant_to_place_of_bus_of_event = $_GET['edit_event'];
			$product_add_participant_to_place_of_bus_of_event = wc_get_product( $product_id_add_participant_to_place_of_bus_of_event );
			// get any existing buses
			$old_product_add_participant_to_place_of_bus_of_event = $product_add_participant_to_place_of_bus_of_event->get_meta('participants');
			$all_product_add_participant_to_place_of_bus_of_event =  $old_product_add_participant_to_place_of_bus_of_event.','
			.$add_participant_to_place_of_bus_of_event_participant
			.'+'.$add_participant_to_place_of_bus_of_event_balance
			.'+'.$add_participant_to_place_of_bus_of_event_total_amount
			.'+'.$add_participant_to_place_of_bus_of_event_assurance
			.'+'.$add_participant_to_place_of_bus_of_event_place
			.'+'.$add_participant_to_place_of_bus_of_event_referrer;
			// add new bus to meta field
			$product_add_participant_to_place_of_bus_of_event->update_meta_data('participants', $all_product_add_participant_to_place_of_bus_of_event);
			$product_add_participant_to_place_of_bus_of_event->save();
		}
		?>
		<div id="add_participant_to_place_of_bus_of_event_div" style="display:none;border:1px solid black;">
		    <form action="" method="post">
		    	<select name="add_participant_to_place_of_bus_of_event_participant">
		    		<option></option>
		    		<?php
		    		// get all users of website
					$args = array(
					    'role'    => 'Subscriber',
					    'orderby' => 'user_nicename',
					    'order'   => 'ASC'
					);
					$users = get_users( $args );
					foreach ( $users as $user ) {
					    ?>
					    <option value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
					    <?php
					}
					?>
		    	</select><br>
		    	Solde<br>
		    	<input type="number" name="add_participant_to_place_of_bus_of_event_balance"><br>
		    	Montant total<br>
		    	<input type="number" name="add_participant_to_place_of_bus_of_event_total_amount"><br>
		    	Assurance<br>
		    	<input type="checkbox" name="add_participant_to_place_of_bus_of_event_assurance"><br>
		    	Lieu de départ<br>
		    	<select name="add_participant_to_place_of_bus_of_event_place">
		    		<option></option>
		    		<option>Genève</option>
		    		<option>Martigny</option>
		    		<option>Lausanne</option>
		    		<option>Yverdon</option>
		    		<option>Neuchâtel</option>
		    		<option>Payerne</option>
		    		<option>Bern</option>
		    		<option>Vevey</option>
		    		<option>Sierre</option>
		    		<option>Bienne</option>
		    		<option>Curtilles</option>
		    		<option>Bâle</option>
		    		<option>null</option>
		    	</select><br>
		    	Inscrit par:<br>
		    	<select name="add_participant_to_place_of_bus_of_event_referrer">
		    		<option></option>
		    		<?php
		    		// get all users of website
					$args = array(
					    'role'    => 'Subscriber',
					    'orderby' => 'user_nicename',
					    'order'   => 'ASC'
					);
					$users = get_users( $args );
					foreach ( $users as $user ) {
					    ?>
					    <option value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
					    <?php
					}
					?>
		    	</select><br>
		    	<input type="submit" name="add_participant_to_place_of_bus_of_event_submit">
		    </form>
		</div>
		<?php
		// display buses of this event
		$product_id_list_buses = $_GET['edit_event'];
		$product_list_buses = wc_get_product( $product_id_list_buses );
		$list_buses = $product_list_buses->get_meta('bus');
		$list_buses_array = explode(',', $list_buses);
		foreach (array_slice($list_buses_array,1) as $bus_id) {
			global $wpdb;
    		$sql = "SELECT * FROM hueb_buses WHERE id=$bus_id";
			$result = $wpdb->get_results($sql);
			foreach( $result as $row ) {
		        $row_bus_data = $row->bus_data;
		        $row_bus_data = json_decode($row_bus_data);
				?>
				<hr>
				<h1><?php echo $row_bus_data->bus_name; ?></h1>
				<div>
					<?php
					// create product object to get bus places from meta
					$meta_product_id_to_get_bus_places = $_GET['edit_event'];
					$meta_product_to_get_bus_places = wc_get_product( $meta_product_id_to_get_bus_places );
					// get bus places from meta
					$meta_all_places_and_times_of_bus = $meta_product_to_get_bus_places->get_meta('bus_'.$bus_id.'_places_and_times');
					$meta_all_places_and_times_of_bus = explode(",", $meta_all_places_and_times_of_bus);
					foreach(array_slice($meta_all_places_and_times_of_bus,1) as $key=>$value) {
						?>
						<div style="border:1px solid grey; padding:20px">
							<?php
						    echo "<h4>".strtok($value, '+')."</h4>";
						    ?>
						    <form action="" method="post">
						    	<input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
						    	<input type="hidden" name="place" value="<?php echo $value; ?>">
						    	<input type="submit" name="delete_place_from_bus_of_event" value="Delete place">
						    </form>
						    <hr>
						    <?php
						    $meta_all_places_and_times_of_bus = $meta_product_to_get_bus_places->get_meta('participants');
						    $all_participants_array = explode(',', $meta_all_places_and_times_of_bus);
						    foreach ($all_participants_array as $participant_details) {
						    	$participant_details_array = explode('+', $participant_details);
						    	if ( strtok($value, '+') == $participant_details_array[4] ) {
						    		echo get_user_meta( $participant_details_array[0], 'first_name', true );
						    		echo " ";
						    		echo get_user_meta( $participant_details_array[0], 'last_name', true );
						    		?>
								    <form action="" method="post">
								    	<input type="hidden" name="participant_id" value="<?php echo $participant_details_array[0]; ?>">
								    	<input type="hidden" name="place" value="<?php echo $participant_details_array[4]; ?>">
								    	<input type="submit" name="remove_participant_from_place_of_bus_of_event" value="Remove">
								    </form>
								    <?php
						    		echo "<br>";
							    }
						    }
						    ?>
					    </div>
					    <?php
					}
					?>
				</div>
				<div id="bus_graphic_add_participant_to_seat" style="display:none;border:1px solid black;">
					<div id="bus_graphic_add_participant_to_seat_content">
						<form action="" method="post" id="bus_graphic_add_participant_to_seat_form">
							Séléctionner le participant à ce siège<br>
					    	<select name="bus_graphic_add_participant_to_seat_select">
					    		<option></option>
					    		<?php
					    		// get all users of website
								$args = array(
								    'role'    => 'Subscriber',
								    'orderby' => 'user_nicename',
								    'order'   => 'ASC'
								);
								$users = get_users( $args );
								foreach ( $users as $user ) {
								    ?>
								    <option value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
								    <?php
								}
								?>
					    	</select><br>
					    	<input type="submit" name="bus_graphic_add_participant_to_seat_submit">
					    </form>
				    </div>
				</div>
				<!-- <div id="update_participant_information_modal_function_div" style="display:none;border:1px solid black;">
					<div id="update_participant_information_modal_function_div_content">
						test
				    </div>
				</div> -->
				<h2>Floor 1</h2>
				<div style="border:1px solid grey;display: inline-block;padding: 5px;">
					<div>
						<?php
						for ($i=1; $i < 21 ; $i++) { 
							$slot_name = 'slot_a'.$i;
							$slot_value = $row_bus_data->$slot_name;
						?>
							<span>							
								<?php
								if ( $slot_value == 'seat' ) {
									?>
									<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
									<?php
								} elseif ( $slot_value == 'empty' ) {
									?>
									
									<?php
								} elseif ( $slot_value == 'steps' ) {
									?>
									<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
									<?php
								} elseif ( $slot_value == 'table' ) {
									?>
									<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'w' ) {
									?>
									W
									<?php
								} elseif ( $slot_value == 'c' ) {
									?>
									C
									<?php
								} elseif ( $slot_value == 'avant_du_car' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'soute_a_bagages' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								}
								?>
							</span>
						<?php
						}
						?>
					</div>
					<div>
						<?php
						for ($i=1; $i < 21 ; $i++) { 
							$slot_name = 'slot_b'.$i;
							$slot_value = $row_bus_data->$slot_name;
						?>
							<span>							
								<?php
								if ( $slot_value == 'seat' ) {
									?>
									<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
									<?php
								} elseif ( $slot_value == 'empty' ) {
									?>
									
									<?php
								} elseif ( $slot_value == 'steps' ) {
									?>
									<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
									<?php
								} elseif ( $slot_value == 'table' ) {
									?>
									<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'w' ) {
									?>
									W
									<?php
								} elseif ( $slot_value == 'c' ) {
									?>
									C
									<?php
								} elseif ( $slot_value == 'avant_du_car' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'soute_a_bagages' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								}
								?>
							</span>
						<?php
						}
						?>
					</div>
					<div>
						<?php
						for ($i=1; $i < 21 ; $i++) { 
							$slot_name = 'slot_c'.$i;
							$slot_value = $row_bus_data->$slot_name;
						?>
							<span>							
								<?php
								if ( $slot_value == 'seat' ) {
									?>
									<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
									<?php
								} elseif ( $slot_value == 'empty' ) {
									?>
									
									<?php
								} elseif ( $slot_value == 'steps' ) {
									?>
									<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
									<?php
								} elseif ( $slot_value == 'table' ) {
									?>
									<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'w' ) {
									?>
									W
									<?php
								} elseif ( $slot_value == 'c' ) {
									?>
									C
									<?php
								} elseif ( $slot_value == 'avant_du_car' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'soute_a_bagages' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								}
								?>
							</span>
						<?php
						}
						?>
					</div>
					<div>
						<?php
						for ($i=1; $i < 21 ; $i++) { 
							$slot_name = 'slot_d'.$i;
							$slot_value = $row_bus_data->$slot_name;
						?>
							<span>							
								<?php
								if ( $slot_value == 'seat' ) {
									?>
									<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
									<?php
								} elseif ( $slot_value == 'empty' ) {
									?>
									
									<?php
								} elseif ( $slot_value == 'steps' ) {
									?>
									<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
									<?php
								} elseif ( $slot_value == 'table' ) {
									?>
									<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'w' ) {
									?>
									W
									<?php
								} elseif ( $slot_value == 'c' ) {
									?>
									C
									<?php
								} elseif ( $slot_value == 'avant_du_car' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'soute_a_bagages' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								}
								?>
							</span>
						<?php
						}
						?>
					</div>
					<div>
						<?php
						for ($i=1; $i < 21 ; $i++) { 
							$slot_name = 'slot_e'.$i;
							$slot_value = $row_bus_data->$slot_name;
						?>
							<span>							
								<?php
								if ( $slot_value == 'seat' ) {
									?>
									<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
									<?php
								} elseif ( $slot_value == 'empty' ) {
									?>
									
									<?php
								} elseif ( $slot_value == 'steps' ) {
									?>
									<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
									<?php
								} elseif ( $slot_value == 'table' ) {
									?>
									<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'w' ) {
									?>
									W
									<?php
								} elseif ( $slot_value == 'c' ) {
									?>
									C
									<?php
								} elseif ( $slot_value == 'avant_du_car' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								} elseif ( $slot_value == 'soute_a_bagages' ) {
									?>
									<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
									<?php
								}
								?>
							</span>
						<?php
						}
						?>
					</div>
				</div>
				<?php
				if ( $row_bus_data->add_bus_floor_2 == "on" ) {
					?>
					<h2>Floor 2</h2>
					<div style="border:1px solid grey;display: inline-block;padding: 5px;">
						<div>
							<?php
							for ($i=1; $i < 21 ; $i++) { 
								$slot_name = 'floor_2_slot_a'.$i;
								$slot_value = $row_bus_data->$slot_name;
							?>
								<span>							
									<?php
									if ( $slot_value == 'seat' ) {
										?>
										<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
										<?php
									} elseif ( $slot_value == 'empty' ) {
										?>
										
										<?php
									} elseif ( $slot_value == 'steps' ) {
										?>
										<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
										<?php
									} elseif ( $slot_value == 'table' ) {
										?>
										<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'w' ) {
										?>
										W
										<?php
									} elseif ( $slot_value == 'c' ) {
										?>
										C
										<?php
									} elseif ( $slot_value == 'avant_du_car' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'soute_a_bagages' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									}
									?>
								</span>
							<?php
							}
							?>
						</div>
						<div>
							<?php
							for ($i=1; $i < 21 ; $i++) { 
								$slot_name = 'floor_2_slot_b'.$i;
								$slot_value = $row_bus_data->$slot_name;
							?>
								<span>							
									<?php
									if ( $slot_value == 'seat' ) {
										?>
										<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
										<?php
									} elseif ( $slot_value == 'empty' ) {
										?>
										
										<?php
									} elseif ( $slot_value == 'steps' ) {
										?>
										<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
										<?php
									} elseif ( $slot_value == 'table' ) {
										?>
										<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'w' ) {
										?>
										W
										<?php
									} elseif ( $slot_value == 'c' ) {
										?>
										C
										<?php
									} elseif ( $slot_value == 'avant_du_car' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'soute_a_bagages' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									}
									?>
								</span>
							<?php
							}
							?>
						</div>
						<div>
							<?php
							for ($i=1; $i < 21 ; $i++) { 
								$slot_name = 'floor_2_slot_c'.$i;
								$slot_value = $row_bus_data->$slot_name;
							?>
								<span>							
									<?php
									if ( $slot_value == 'seat' ) {
										?>
										<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
										<?php
									} elseif ( $slot_value == 'empty' ) {
										?>
										
										<?php
									} elseif ( $slot_value == 'steps' ) {
										?>
										<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
										<?php
									} elseif ( $slot_value == 'table' ) {
										?>
										<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'w' ) {
										?>
										W
										<?php
									} elseif ( $slot_value == 'c' ) {
										?>
										C
										<?php
									} elseif ( $slot_value == 'avant_du_car' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'soute_a_bagages' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									}
									?>
								</span>
							<?php
							}
							?>
						</div>
						<div>
							<?php
							for ($i=1; $i < 21 ; $i++) { 
								$slot_name = 'floor_2_slot_d'.$i;
								$slot_value = $row_bus_data->$slot_name;
							?>
								<span>							
									<?php
									if ( $slot_value == 'seat' ) {
										?>
										<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
										<?php
									} elseif ( $slot_value == 'empty' ) {
										?>
										
										<?php
									} elseif ( $slot_value == 'steps' ) {
										?>
										<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
										<?php
									} elseif ( $slot_value == 'table' ) {
										?>
										<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'w' ) {
										?>
										W
										<?php
									} elseif ( $slot_value == 'c' ) {
										?>
										C
										<?php
									} elseif ( $slot_value == 'avant_du_car' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'soute_a_bagages' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									}
									?>
								</span>
							<?php
							}
							?>
						</div>
						<div>
							<?php
							for ($i=1; $i < 21 ; $i++) { 
								$slot_name = 'floor_2_slot_e'.$i;
								$slot_value = $row_bus_data->$slot_name;
							?>
								<span>							
									<?php
									if ( $slot_value == 'seat' ) {
										?>
										<div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;" onclick="bus_graphic_add_participant_to_seat('<?php echo $slot_name; ?>', '<?php echo $bus_id; ?>')"></div>
										<?php
									} elseif ( $slot_value == 'empty' ) {
										?>
										
										<?php
									} elseif ( $slot_value == 'steps' ) {
										?>
										<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15">
										<?php
									} elseif ( $slot_value == 'table' ) {
										?>
										<div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'w' ) {
										?>
										W
										<?php
									} elseif ( $slot_value == 'c' ) {
										?>
										C
										<?php
									} elseif ( $slot_value == 'avant_du_car' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									} elseif ( $slot_value == 'soute_a_bagages' ) {
										?>
										<div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div>
										<?php
									}
									?>
								</span>
							<?php
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
				<div>
					<?php
					// get info on current participants seats for this bus
					$productId_get_current_participant_seat_info = $_GET['edit_event'];
					$product_get_current_participant_seat_info = wc_get_product( $productId_get_current_participant_seat_info );
					$current_participants_seats = $product_get_current_participant_seat_info->get_meta('participants_seats');
					$current_participants_seats = explode(',', $current_participants_seats);
					foreach ($current_participants_seats as $value) {
						$value = explode('+', $value);
						if ( $value[2] == $bus_id ) {
							?>
							<span>
								<?php
								echo "Seat " . $value[1];
								echo " is for user ";
								echo get_user_meta( $value[0], 'first_name', true );
								echo " ";
								echo get_user_meta( $value[0], 'last_name', true );
								echo "<br>";
								?>
							<span>
							<?php
						}
					}
					?>
				</div>
				<?php
		    }
		}
		?>
		<script type="text/javascript">
			// custom functions
			function add_bus_to_event_button() {
			  var x = document.getElementById("add_bus_to_event_div");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";
			  }
			}
			function add_place_to_bus_of_event_button() {
			  var x = document.getElementById("add_place_to_bus_of_event_div");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";
			  }
			}
			function add_participant_to_place_of_bus_of_event_button() {
			  var x = document.getElementById("add_participant_to_place_of_bus_of_event_div");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";
			  }
			}
			function bus_graphic_add_participant_to_seat(slot_name, bus_id) {
				var input = document.createElement("input");
				input.setAttribute("type", "hidden");
				input.setAttribute("name", "slot_name");
				input.setAttribute("value", slot_name);
				//append to form element that you want .
				document.getElementById("bus_graphic_add_participant_to_seat_form").appendChild(input);
				var input2 = document.createElement("input");
				input2.setAttribute("type", "hidden");
				input2.setAttribute("name", "bus_id");
				input2.setAttribute("value", bus_id);
				//append to form element that you want .
				document.getElementById("bus_graphic_add_participant_to_seat_form").appendChild(input2);
				var x = document.getElementById("bus_graphic_add_participant_to_seat");
				if (x.style.display === "none") {
					x.style.display = "block";
				} else {
					x.style.display = "none";
				}
			}
			/*function update_participant_information_modal_function(user_id) {
				var x = document.getElementById("update_participant_information_modal_function_div");
				if (x.style.display === "none") {
					x.style.display = "block";
				} else {
					x.style.display = "none";
				}
			}*/
		</script>
		<?php
	} else {
		// event list
		echo "<h1>Events</h1><hr>";
	    $args = array(
	        'post_type'      => 'product'
	    );
	    $loop = new WP_Query( $args );
	    while ( $loop->have_posts() ) : $loop->the_post();
	        global $product;
	        echo '<br /><a href=?page=hard_universe_events&edit_event=' . get_the_ID() . '>' . get_the_title() . '</a>';
	    endwhile;
	    wp_reset_query();
	}
}






// submenu
function hard_universe_add_a_bus () {
	echo "<h1>Add A Bus</h1><hr>";

	if ( isset( $_POST['add_bus_submit'] ) ) {
		$bus_data = $_POST;
		$bus_data = json_encode($bus_data);
		global $wpdb;
		$wpdb->insert('hueb_buses', array(
		    'bus_data' => $bus_data
		));
	}
	?>

	<div>
		<form method="POST">
				<div>
					<label>Name</label>
					<input type="text" name="bus_name">
				</div>
				<div>
					<h4>
						Floor 1
					</h4>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot A<?php echo $i; ?></label>
							<select name="slot_a<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot B<?php echo $i; ?></label>
							<select name="slot_b<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot C<?php echo $i; ?></label>
							<select name="slot_c<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot D<?php echo $i; ?></label>
							<select name="slot_d<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot E<?php echo $i; ?></label>
							<select name="slot_e<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
				</div>
				<br><br>
				<div>
					<label><input type="checkbox" name="add_bus_floor_2" id="add_bus_floor_2" onclick="displayFloor2()">Floor 2</label>
				</div>
				<div id="add_bus_floor_2_container" style="display: none;">
					<h4>
						Floor 2
					</h4>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot A<?php echo $i; ?></label>
							<select name="floor_2_slot_a<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot B<?php echo $i; ?></label>
							<select name="floor_2_slot_b<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot C<?php echo $i; ?></label>
							<select name="floor_2_slot_c<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot D<?php echo $i; ?></label>
							<select name="floor_2_slot_d<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
					<div style="display: inline-block;" style="display: inline-block;">
						<?php
						for ($i=1; $i < 21 ; $i++) { 
						?>
							<label>Slot E<?php echo $i; ?></label>
							<select name="floor_2_slot_e<?php echo $i; ?>">
								<option value="seat">Seat</option>
								<option value="empty">Empty</option>
								<option value="steps">Steps</option>
								<option value="table">Table</option>
								<option value="w">W</option>
								<option value="c">C</option>
								<option value="avant_du_car">Avant du car</option>
								<option value="soute_a_bagages">Soute à bagages</option>
							</select>
							<br>
						<?php
						}
						?>
					</div>
				</div>
				<br><br>
			<input type="submit" name="add_bus_submit" value="Add Bus" class="button-primary">
		</form>
	</div>
	<hr>
	<div>
		<h4>How it will display</h4>
		<table>
			<tr>
				<td style="padding-right: 30px;">Seat = <div style="width: 15px;height: 15px;border-radius: 50%;background-color: grey;display: inline-block;"></div></td>
				<td style="padding-right: 30px;">Empty = </td>
				<td style="padding-right: 30px;">Steps = <img src="<?php echo plugin_dir_url( __FILE__ ); ?>/image/stairs.png" width="15" height="15"></td>
				<td style="padding-right: 30px;">Table = <div style="width: 15px;height: 15px;border:2px solid black;background-color: white;display: inline-block;"></div></td>
				<td style="padding-right: 30px;">W = W</td>
				<td style="padding-right: 30px;">C = C</td>
				<td style="padding-right: 30px;">Avant du car = <div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div></td>
				<td style="padding-right: 30px;">Soute à bagages = <div style="width: 15px;height: 15px;background-color: grey;display: inline-block;"></div></td>
			</tr>
		</table>
	</div>

	<script type="text/javascript">
		function displayFloor2() {
			// Get the checkbox
			var floorCheckbox = document.getElementById("add_bus_floor_2");
			console.log(floorCheckbox);
			// Get the output text
			var floor = document.getElementById("add_bus_floor_2_container");

			// If the checkbox is checked, display the floor 2 div
			if (floorCheckbox.checked == true){
				floor.style.display = "block";
			} else {
				floor.style.display = "none";
			}
		}
	</script>

	<?php
}