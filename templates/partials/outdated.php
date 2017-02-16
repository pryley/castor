<?php Development::storeTemplatePath( __FILE__ );

printf( '<!--[if lt IE 10]><div class="alert alert-warning">%s</div><![endif]-->',
	__( 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to view this page.', 'castor' )
);
