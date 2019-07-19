<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['control'] = 'dashboard';
$route['control/logout'] = 'dashboard/logout';
$route['migrate/(:num)'] = 'migrate/index/$';
$route['control/categoria_eventos/(:num)'] = 'control/categoria_eventos/index/$';
$route['control/usuarios/(:num)'] = 'control/usuarios/index/$';
$route['control/notas/(:num)'] = 'control/notas/index/$';
$route['control/categoria_notas/(:num)'] = 'control/categoria_notas/index/$';
$route['control/categoria_notas/destroy/(:num)'] = 'control/categoria_notas/destroy/$';
$route['control/lugares/(:num)'] = 'control/lugares/index/$';
$route['control/beneficios/(:num)'] = 'control/beneficios/index/$';
$route['control/roles/(:num)'] = 'control/roles/index/$';
$route['control/admins/(:num)'] = 'control/admins/index/$';
$route['control/permisos/(:num)'] = 'control/permisos/detail/$';
$route['control/citas/(:num)'] = 'control/citas/index/$';
//Citas dentro de evento
$route['control/eventos/citas/(:num)'] = 'control/citas/citas_evento/$';
$route['control/eventos/citas/(:num)/edit'] = 'control/citas/citas_evento_edit/$';
$route['control/eventos/citas/update'] = 'control/citas/citas_evento_update';


$route['control/registros/(:num)'] = 'control/registros/index/$';
$route['control/eventos/(:num)'] = 'control/eventos/index/$';
$route['control/categoria_eventos/(:num)'] = 'control/categoria_eventos/index/$';
$route['control/eventos_tipos/(:num)'] = 'control/eventos_tipos/index/$';

$route['control/eventos/solicitudes_recibidas/(:num)'] = 'control/eventos/solicitudes_recibidas/$';
$route['control/eventos/solicitudes_aprobadas/(:num)'] = 'control/eventos/solicitudes_aprobadas/$';
$route['control/eventos/solicitudes_pago_demorado/(:num)'] = 'control/eventos/solicitudes_pago_demorado/$';
$route['control/eventos/solicitudes_confirmadas/(:num)'] = 'control/eventos/solicitudes_confirmadas/$';

$route['control/eventos_manager/invitar_ajax/(:num)/(:num)'] = 'control/eventos_manager/invitar_ajax/$/$';


/* append */
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/* LOGIN */
$route['registro'] = 'users_front/registro';
$route['ingreso'] = 'users_front/ingreso';
$route['desconectar'] = 'users_front/desconectar';
$route['perfil'] = 'users_front/perfil';
$route['perfil-editar'] = 'users_front/perfil_modificar';
$route['experiencias-editar'] = 'users_front/experiencias_modificar';

$route['create_experiencia'] = 'users_front/create_experiencia';
$route['perfil-imagen'] = 'users_front/perfil_modificar_imagen';
$route['perfil-delete-image/(:num)'] = 'users_front/perfil_delete_image';
$route['perfil-cargar-imagen'] = 'users_front/add_imagen';
$route['actualizar_avatar'] = 'users_front/actualizar_avatar';
$route['perfil-modificar-acceso'] = 'users_front/perfil_modificar_password';
$route['update_tab_datos'] = 'users_front/update_tab_datos';
$route['update_tab_busco'] = 'users_front/update_tab_busco';
$route['update_tab_imagenes'] = 'users_front/update_tab_busco';
$route['update_tab_descripcion'] = 'users_front/update_tab_descripcion';
$route['reset_password'] = 'users_front/reset_password';
$route['solicitud_reset_password'] = 'users_front/solicitud_reset_password';
$route['callback_reset_validation/(:any)'] = 'users_front/callback_reset_password';
$route['create_new_pass'] = 'users_front/create_new_pass';
$route['mis-eventos'] = 'users_front/mis_eventos';
$route['eventos'] = 'users_front/eventos';
$route['mis-coincidencias'] = 'users_front/mis_coincidencias';
$route['detalle-coincidencias/(:num)'] = 'users_front/detalle_coincidencias';
$route['mis-contactos'] = 'users_front/mis_contactos';
$route['solicitar_asistencia_evento/(:num)'] = 'users_front/solicitar_asistencia_evento/$';

$route['contacto_quienes_somos'] = 'MailerController/process_quienes_somos';
$route['contacto_como_funciona'] = 'MailerController/process_como_funciona';
$route['contacto_preguntas_frecuentes'] = 'MailerController/process_preguntas_frecuentes';
$route['process_email'] = 'MailerController/process_mail';


$route['como-funciona'] = 'users_front/como_funciona';
$route['preguntas-frecuentes'] = 'users_front/preguntas_frecuentes';
$route['quienes-somos'] = 'users_front/quienes_somos';
// $route['registro'] 						= 'welcome/register';
// $route['login'] 						= 'welcome/login';
// $route['check_login'] 						= 'welcome/check_login';
// $route['logout'] 						= 'welcome/logout';

// $route['process_registration'] 		= 'welcome/process_registration';


// CREATE TABLE IF NOT EXISTS `ci_sessions` (
//     `id` varchar(40) NOT NULL,
//     `ip_address` varchar(45) NOT NULL,
//     `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
//     `data` blob NOT NULL,
//     KEY `ci_sessions_timestamp` (`timestamp`)
// );

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
