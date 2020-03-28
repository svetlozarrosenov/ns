<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'user_meta', 'Visits' )
	->add_fields( array(
		Field::make( 'textarea', 'crb_visits', '' )
	) );