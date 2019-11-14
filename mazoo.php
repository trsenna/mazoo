<?php
/**
 * Plugin Name: Mazoo
 * Plugin URI:  https://github.com/trsenna/mazoo
 * Author:      Thiago Senna
 * Author URI:  http://thremes.com.br
 * Description: The Mazoo WordPress plugin provides an opinionated bootstrap for functionality plugins.
 * Version:     0.1.0
 *
 * @package   Mazoo
 * @author    Thiago Senna <thiago@thremes.com.br>
 * @copyright Copyright (c) 2019, Thiago Senna
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

define( 'MAZOO_PLUGIN', true );
define( 'MAZOO_PLUGIN_FILE', __FILE__ );
define( 'MAZOO_PLUGIN_VERSION', get_file_data( __FILE__, [ 'Version' ] )[ 0 ] );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet.
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'mazoo/autoload/loader', function ( \Composer\Autoload\ClassLoader $loader ) {

    $loader->setPsr4( 'App\\Functionality\\', dirname( APP_FUNCTIONALITY_PLUGIN_FILE ) . '/includes/src' );

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet.
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'mazoo/autoload', function () {

    \Composer\Autoload\includeFile( __DIR__ . '/includes/functions-helpers.php' );

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet.
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'mazoo/autoload', function () {

    $loader = new \Composer\Autoload\ClassLoader();
    do_action( 'mazoo/autoload/loader', $loader );
    $loader->register();

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet.
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

add_action( 'mazoo/autoload', function () {

    $files = apply_filters( 'mazoo/autoload/files', [] );
    foreach ( $files as $file ) {
        \Composer\Autoload\includeFile( $file );
    }

} );

# ------------------------------------------------------------------------------
# Lorem ipsum dolor sit amet.
# ------------------------------------------------------------------------------
#
# Suspendisse sodales ipsum non justo imperdiet, ut lacinia erat
# cursus. Vestibulum dictum nisi ligula, in dictum justo pulvinar quis.
#

$run = function () {

    if ( !defined( 'APP_FUNCTIONALITY_PLUGIN' ) ) return;
    if ( !defined( 'APP_FUNCTIONALITY_PLUGIN_FILE' ) ) return;

    if ( defined( 'MAZOO_BOOTSTRAPPED' ) ) {
        return;
    }

    if ( defined( 'DALEN_PLUGIN' ) && DALEN_PLUGIN ) {

        do_action( 'mazoo/autoload' );
        do_action( 'mazoo/bootstrap', \Mazoo\plugin() );
        \Mazoo\plugin()->run();

        define( 'MAZOO_BOOTSTRAPPED', true );
    }

};

add_action( 'mazoo/run', $run, PHP_INT_MIN );
add_action( 'dalen/bootstrap/plugins', $run, PHP_INT_MIN );
