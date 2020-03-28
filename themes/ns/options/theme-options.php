<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->set_page_file( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'crb' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'crb' ) ),
	) );
