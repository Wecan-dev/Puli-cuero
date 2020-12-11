<?php
 function azen_child_enqueue_styles() {
	wp_deregister_style( 'azen-style' );
	$parent_style = 'parent-style'; 
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array() ,  filemtime( get_template_directory() . '/style.css' ));
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( $parent_style ) ,'1.0.1');
	wp_deregister_style( 'azen-options' );
	if ( is_file( AZEN_UPLOADS_FOLDER . AZEN_FILE_NAME ) ) {
		wp_enqueue_style( 'azen-options-child', AZEN_UPLOADS_URL . AZEN_FILE_NAME, array(), filemtime( AZEN_UPLOADS_FOLDER . AZEN_FILE_NAME ) );
	}else{
		wp_enqueue_style( 'azen-options-child', get_template_directory_uri() . '/assets/css/azen-options.css', array(),  filemtime( get_template_directory() . '/assets/css/azen-options.css' ) );
	}
}

add_action( 'wp_enqueue_scripts', 'azen_child_enqueue_styles', 11 );

add_filter('gettext',  'translate_text');
add_filter('ngettext',  'translate_text');
function translate_text($translated) {
	$translated = str_ireplace('This field is required.',  'Este campo es requerido.',  $translated);
	$translated = str_ireplace('Email already exists.',  '
El Email ya existe.',  $translated);
	$translated = str_ireplace('User successfully registered.',  '
Usuario registrado exitosamente.',  $translated);
	$translated = str_ireplace('Username or email address',  'Nombre de usuario o dirección de correo electrónico',  $translated);
	$translated = str_ireplace('Login',  '
Iniciar sesión',  $translated);
	$translated = str_ireplace('Search Results for',  '
Resultados de búsqueda de',  $translated);
	$translated = str_ireplace('Nothing Found',  '
Nada Encontrado',  $translated);
	$translated = str_ireplace('Home',  'Inicio',  $translated);
	$translated = str_ireplace('Mins',  'Minutos',  $translated);
		$translated = str_ireplace('Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our',  'Sus datos personales se utilizarán para procesar su pedido, respaldar su experiencia en este sitio web y para otros fines descritos en nuestro',  $translated);
	$translated = str_ireplace('
Product	',  '
Producto',  $translated);
	$translated = str_ireplace('Your order',  '
Su pedido',  $translated);
	$translated = str_ireplace('sale',  'venta',  $translated);
	$translated = str_ireplace('close',  'cerrar',  $translated);
	$translated = str_ireplace('by',  '
por',  $translated);
	$translated = str_ireplace('No products in the cart.',  '
No hay productos en el carrito.',  $translated);
	$translated = str_ireplace('view cart',  '
ver carrito',  $translated);
		$translated = str_ireplace('There was a problem with your submission. Errors are marked below.',  'Hubo un problema con el envío. Los errores están marcados a continuación.',  $translated);
$translated = str_ireplace('This field cannot be blank.',  'Este campo no puede estar vacío.',  $translated);
	$translated = str_ireplace('Qty',  '
Cant',  $translated);
	$translated = str_ireplace('Sorry, but nothing matched your search terms. Please try again with some different keywords.',  'Lo siento, pero nada coincide con los términos de búsqueda. Vuelva a intentarlo con algunas palabras clave diferentes.',  $translated);
	$translated = str_ireplace('Oops ! Page you are looking for does not exist.',  '
¡Ups! La página que está buscando no existe.',  $translated);
		$translated = str_ireplace('back to',  'de regreso',  $translated);
	return $translated;

}
