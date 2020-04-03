<?php 
/*require_once( __DIR__ . '/Mysqldump/Mysqldump.php' );
/*use Ifsnop\Mysqldump as IMysqldump; 
/************************************************************************
* Change the path to the directory that contains demo data folders.
*************************************************************************/
if ( ! function_exists( 'pixi_shortcode' ) ) {
	/*
	 * @return [string]
	 */
	function pixi_shortcode( $arg1, $arg2 ) 
	{		
		return add_shortcode( $arg1, $arg2 );
	}
}
/************************************************************************
* Change the path to the directory that contains demo data folders.
*************************************************************************/
if ( ! function_exists( 'pixi_wbc_change_demo_directory_path' ) ) {
	/**
	 * Change the path to the directory that contains demo data folders.
	 *
	 * @param [string] $demo_directory_path
	 *
	 * @return [string]
	 */
	function pixi_wbc_change_demo_directory_path( $demo_directory_path ) 
	{
		if ( file_exists( get_template_directory().'/demo-data/' ) )
			$demo_directory_path = get_template_directory().'/demo-data/';

		return $demo_directory_path;
	}
	// Uncomment the below
	add_filter('wbc_importer_dir_path', 'pixi_wbc_change_demo_directory_path' );
}
/************************************************************************
* Extended:
* Way to set menu, import revolution slider, and set home page.
*************************************************************************/
if ( ! function_exists( 'pixi_wbc_extended_extra' ) ) {
	function pixi_wbc_extended_extra( $demo_active_import , $demo_directory_path ) 
	{
		WP_Filesystem();
		global $wp_filesystem;
		
		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/
		if ( class_exists( 'RevSlider' ) ) {			
			$revslider_dir = $demo_directory_path . '/revslider/';			
			if ( is_dir( $revslider_dir ) && $files = scandir( $revslider_dir ) ) {				
				$files = array_diff( $files, array( '.', '..' ) );				
				
				if( count( $files ) > 0 ) {
					foreach( $files as $file ) {
						$slider = new RevSlider();
						if( file_exists( $revslider_dir.$file ) )
							$slider->importSliderFromPost( true, true, $revslider_dir.$file, false, false, true );
					}
				}
			}
		}
		/************************************************************************
		* Setting menu & homepage
		*************************************************************************/
		if ( file_exists( $demo_directory_path . 'settings.json' ) ) {
			$ctpt_data = $wp_filesystem->get_contents( $demo_directory_path . 'settings.json' );
			$settings  = json_decode( $ctpt_data, true );

			/* Set menu */
			if( isset( $settings['menu'] ) ) {
				$menu_arr = array();
				foreach( $settings['menu'] as $key => $val ) {
					$menuitem = get_term_by( 'name', $val, 'nav_menu' );
					if ( isset( $menuitem->term_id ) ) $menu_arr[$key] = $menuitem->term_id;
				}

				if( count( $menu_arr ) > 0 ) set_theme_mod( 'nav_menu_locations', $menu_arr );
			}

			/* Set homepage */
			if( isset( $settings['homepage'] ) ) {
				$page = get_page_by_title( $settings['homepage'] );	
				if ( isset( $page->ID ) ) {
					update_option( 'page_on_front', $page->ID );
					update_option( 'show_on_front', 'page' );
				}
			}
		}
	}
	// Uncomment the below
	add_action( 'wbc_importer_after_content_import', 'pixi_wbc_extended_extra', 10, 2 );
}

/**
 * pixi_VerifyImportSampleData
 *
 * @param [array] $params;
 * @return Html
 */
if( ! function_exists( 'pixi_verifyImportSampleData' ) ) :
	function pixi_verifyImportSampleData( $params = array() )
	{
		$output = "";

		/* check  $params exist */
		if( count( $params ) <= 0 ) return;
		
		$output = "
		<div class='table-row item-header'>
			<label></label>
			<span class='val'>Requirements</span>
			<span class='val'>Your server</span>
		</div>";
		
		foreach( $params as $k => $data ) :
			$val_default = ini_get( $k );
			$class = ( $val_default >= $data['val'] ) ? 'color-green' : 'color-red';
			$icon = ( $val_default >= $data['val'] ) ? '&#x2714;' : '&#x2716;';
			
			$output .= "
			<div class='table-row {$class}'>
				<label>{$k}</label> 
				<span class='val requirements'>{$data['val']}{$data['type']}</span>
				<span class='val'>{$val_default}</span>
				<i class='html5-icon'>{$icon}</i>
			</div>";
		endforeach;
		
		return sprintf( '
			<div class="bt-verify-import-sample-data pixi-block-accordion">
				%s 
				<div class="table-ui pixi-block-accordion-body">%s</div>
			</div>', 
			__( '<h4 class="title"><i class="fa fa-briefcase"></i> Verify import Sample Data</h4>', 'pixicore' ), 
			$output );
	}
endif;

if( ! function_exists( 'pixi_backupDatabase' ) ) :
	function pixi_backupDatabase( $path = '', $uri = '' )
	{
		$output = "";

		/* check  $params exist */
		if( empty( $path ) ) return;
		
		$output .= "
		<div class='table-row item-header'>
			<label><a href='#' id='pixi-backupdatabase-handle' class='pixi-btn-create' data-path='{$path}' data-uri='{$uri}'>+ Create Backup</a></label>
			<span class='val'>Date</span>
			<span class='val'>Restore</span>
			<span>Delete</span>
		</div>";

		$files = array();
		if( is_dir( $path ) && $files = scandir( $path ) ) $files = array_diff( $files, array( '.', '..' ) );
		if( count( $files ) > 0 ) :
			foreach( $files as $fname ) :
				$output .= "
				<div class='table-row'>
					<label><a href='{$uri}/{$fname}' target='_blank'>{$fname}</a></label>
					<span class='val'>". date( 'Y/m/d', filemtime( "{$path}/{$fname}" ) ) ."</span>
					<span class='val'><a href='#' class='pixi-restore-database' data-file='{$path}/{$fname}' title='Restore'><i class='fa fa-refresh'></i></a></span>
					<span><a href='#' class='color-red pixi-delete-database' data-file='{$path}/{$fname}' title='Delete'><i class='fa fa-ban'></i></a></span>
				</div>";
			endforeach;
		endif;

		return sprintf( '
			<div class="bt-backup-database pixi-block-accordion">
				%s 
				<div class="table-ui pixi-block-accordion-body">%s</div>
			</div>', 
			__( '<h4 class="title"><i class="fa fa-database"></i> Backup Database</h4>', 'pixicore' ), 
			$output );
	}
endif;

/**
 * pixi_backupDatabase_handle
 */
if( ! function_exists( 'pixi_backupDatabase_handle' ) ) :
	
	/* Use PDO
	function pixi_backupDatabase_handle()
	{
		extract( $_POST );
		$file_name = 'backupdatabase_' . date( 'Y-m-d_H-i-s' ) . '.sql'; 
		$path_file = $path . '/' . $file_name;
		
		try {
		    $dump = new IMysqldump\Mysqldump('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASSWORD);
		    $dump->start( $path_file );
		    // echo $uri . '/' . $file_name;
		    $output = "
			<div class='table-row'>
				<label><a href='{$uri}/{$file_name}' target='_blank'>{$file_name}</a></label>
				<span class='val'>". date( 'Y/m/d', filemtime( "{$path}/{$file_name}" ) ) ."</span>
				<span class='val'><a href='#' class='pixi-restore-database' data-file='{$path}/{$file_name}' title='Restore'><i class='fa fa-refresh'></i></a></span>
				<span><a href='#' class='color-red pixi-delete-database' data-file='{$path}/{$file_name}' title='Delete'><i class='fa fa-ban'></i></a></span>
			</div>";
			echo $output;
		} catch (\Exception $e) {
		    echo 'mysqldump-php error: ' . $e->getMessage();
		}

		exit();
	}
	*/
	
	function pixi_backupDatabase_handle()
	{
		require_once( __DIR__ . '/dumper.php' );
		extract( $_POST );
		$file_name = 'backupdatabase_' . date( 'Y-m-d_H-i-s' ) . '.sql'; 
		$path_file = $path . '/' . $file_name;
		
		try {
			if ( extension_loaded( 'pdo' ) ) :
				$dump = new IMysqldump\Mysqldump('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASSWORD);
		    	$dump->start( $path_file );
			else :
				$dump = Shuttle_Dumper::create(array(
				    'host' 		=> DB_HOST,
				    'username' 	=> DB_USER,
				    'password' 	=> DB_PASSWORD,
				    'db_name' 	=> DB_NAME,
				));
				$dump->dump( $path_file );
			endif;
			
		    $output = "
			<div class='table-row'>
				<label><a href='{$uri}/{$file_name}' target='_blank'>{$file_name}</a></label>
				<span class='val'>". date( 'Y/m/d', filemtime( "{$path}/{$file_name}" ) ) ."</span>
				<span class='val'><a href='#' class='pixi-restore-database' data-file='{$path}/{$file_name}' title='Restore'><i class='fa fa-refresh'></i></a></span>
				<span><a href='#' class='color-red pixi-delete-database' data-file='{$path}/{$file_name}' title='Delete'><i class='fa fa-ban'></i></a></span>
			</div>";
			echo $output;
		} catch (\Exception $e) {
		    echo 'mysqldump-php error: ' . $e->getMessage();
		}

		exit();
	}
endif;
add_action( 'wp_ajax_pixi_backupDatabase_handle', 'pixi_backupDatabase_handle' );
add_action( 'wp_ajax_nopriv_pixi_backupDatabase_handle', 'pixi_backupDatabase_handle' );

/**
 * pixi_DeleteDatabase_handle
 */
if( ! function_exists( 'pixi_DeleteDatabase_handle' ) ) :
	function pixi_deleteDatabase_handle()
	{
		extract( $_POST );

		try {
			if( is_file( $file ) ) unlink( $file );
			echo __( 'Delete file success.', 'pixicore' );
		} catch (\Exception $e) {
			echo __('error: ', 'pixicore' ) . $e->getMessage();
		}

		exit();
	}
endif;
add_action( 'wp_ajax_pixi_deleteDatabase_handle', 'pixi_deleteDatabase_handle' );
add_action( 'wp_ajax_nopriv_pixi_deleteDatabase_handle', 'pixi_deleteDatabase_handle' );

/**
 * pixi_restoreDatabase_handle
 */
if( ! function_exists( 'pixi_restoreDatabase_handle' ) ) :
	function pixi_restoreDatabase_handle()
	{
		extract( $_POST );
		
		try {
			if( is_file( $file ) ) 
				pixi_importDatabase( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $file );
			else
				echo __( 'File not exist!', 'pixicore' );
		} catch (\Exception $e) {
			echo __('error: ', 'pixicore' ) . $e->getMessage();
		}

		exit();
	}
endif;
add_action( 'wp_ajax_pixi_restoreDatabase_handle', 'pixi_restoreDatabase_handle' );
add_action( 'wp_ajax_nopriv_pixi_restoreDatabase_handle', 'pixi_restoreDatabase_handle' );

/**
 * pixi_importDatabase
 *
 * @param [string] $host
 * @param [string] $user
 * @param [string] $pass
 * @param [string] $dbname
 * @param [string] $sql_file_OR_content
 * @param [array] $replacements (array('OLD_DOMAIN.com','NEW_DOMAIN.com'))
 */
if( ! function_exists( 'pixi_importDatabase' ) ) : 
	function pixi_importDatabase( $host, $user, $pass, $dbname, $sql_file_OR_content, $replacements = array('OLD_DOMAIN.com','NEW_DOMAIN.com') ){
		set_time_limit(3000); 
		$SQL_CONTENT = (strlen($sql_file_OR_content) > 200 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );        
		if (function_exists('DOMAIN_or_STRING_modifier_in_DB')) { $SQL_CONTENT = DOMAIN_or_STRING_modifier_in_DB($replacements[0], $replacements[1], $SQL_CONTENT); }
		$allLines = explode("\n",$SQL_CONTENT); 
		$mysqli = new mysqli($host, $user, $pass, $dbname); 
		if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();} 
		$zzzzzz = $mysqli->query('SET foreign_key_checks = 0');	        
		preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); foreach ($target_tables[2] as $table){$mysqli->query('DROP TABLE IF EXISTS '.$table);}         
		$zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    
		$mysqli->query("SET NAMES 'utf8'");	
		$templine = '';	// Temporary variable, used to store current query
		foreach ($allLines as $line)	{											// Loop through each line
			if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line; 	// (if it is not a comment..) Add this line to the current segment
				if (substr(trim($line), -1, 1) == ';') {		// If it has a semicolon at the end, it's the end of the query
					$mysqli->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  $templine = ''; // set variable to empty, to start picking up the lines after ";"
				}
			}
		}	
		echo __( 'Importing finished.', 'pixicore' );
	}
endif;


