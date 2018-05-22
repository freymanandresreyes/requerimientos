<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Registration Routes...
 //rutas en caso de perdida del usuario administrador
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');
// Route::post('crear_usuario', 'UsuariosController@crear_usuario');//descomentar en caso de perdida de usuario

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  // Route::get('/', function () {
  //     return view('caja.registradora');
  // });

 Route::get('/', function () {
     return view('layout');
  });




//   Route::get('/', function () {
//     $consulta = App\configuraciones::find(1);
//     $json = $consulta->lista_tag;
//     dd(json_decode($json, true));
//  });


  Route::get('/home', 'HomeController@index');
  Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios')->middleware('permissionshinobi:listar_usuarios');
  Route::post('crear_usuario', 'UsuariosController@crear_usuario')->middleware('permissionshinobi:crear_usuario');
  Route::post('editar_usuario', 'UsuariosController@editar_usuario')->middleware('permissionshinobi:editar_usuario');
  Route::post('buscar_usuario', 'UsuariosController@buscar_usuario')->middleware('permissionshinobi:buscar_usuario');
  Route::post('borrar_usuario', 'UsuariosController@borrar_usuario')->middleware('permissionshinobi:borrar_usuario');
  Route::post('editar_acceso', 'UsuariosController@editar_acceso')->middleware('permissionshinobi:editar_acceso');


  Route::post('crear_rol', 'UsuariosController@crear_rol')->middleware('permissionshinobi:crear_rol');
  Route::post('crear_permiso', 'UsuariosController@crear_permiso')->middleware('permissionshinobi:crear_permiso');
  Route::post('asignar_permiso', 'UsuariosController@asignar_permiso')->middleware('permissionshinobi:asignar_permiso');
  Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso')->middleware('permissionshinobi:quitar_permiso');


  Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario')->middleware('permissionshinobi:form_nuevo_usuario');
  Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol')->middleware('permissionshinobi:form_nuevo_rol');
  Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso')->middleware('permissionshinobi:form_nuevo_permiso');
  Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario')->middleware('permissionshinobi:form_editar_usuario');
  Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario')->middleware('permissionshinobi:confirmacion_borrado_usuario');
  Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol')->middleware('permissionshinobi:asignar_rol');
  Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol')->middleware('permissionshinobi:quitar_rol');
  Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario')->middleware('permissionshinobi:form_borrado_usuario');
  Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol')->middleware('permissionshinobi:borrar_rol');

  // Registration Routes...
  $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('register', 'Auth\RegisterController@register');

  // Password Reset Routes...
  $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->middleware('roleshinobi:administrador');
  $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')->middleware('roleshinobi:administrador');
  $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')->middleware('roleshinobi:administrador');
  $this->post('password/reset', 'Auth\ResetPasswordController@reset')->middleware('roleshinobi:administrador');
  /* ======================================================================*/
  /* ======================= NUEVAS RUTAS =================================*/
  /* ======================================================================*/
     /*==================================================*/
    /* RUTAS PARA EL CONTROLADOR ClientesController
    /* =================================================*/
    Route::get('clienteConsultar', 'ClientesController@clienteConsultar');
    Route::get('crearcliente', 'ClientesController@crearcliente');

    /*==================================================*/
    /* RUTAS PARA EL CONTROLADOR CREAR ProductosController
    /* =================================================*/
    Route::get('consulta_producto',"ProductosController@consultarProducto");//usa la vista caja para buscar productos en la tabla
    //ruta para consultar categorias y sub categorias
    Route::get('buscar_categorias',"ProductosController@buscar_categorias");
    Route::get('consulta_categoria', 'ProductosController@consulta_categoria');



    
    Route::get('crear_productos',"ProductosController@crear_productos")->name('crear_productos');//solo lleva ala vista de crear productos
    Route::get('nuevo_producto',"ProductosController@nuevo_producto");
    Route::post('pepito', "ProductosController@pepito")->name('pepito');
    Route::get('ver_productos','ProductosController@visualizar')->name('ver_productos');
    Route::get('buscar_producto','ProductosController@buscar_producto');
    Route::get('actualizar_oferta','ProductosController@actualizar_oferta');


    /*==================================================*/
    /* RUTAS PARA EL CONTROLADOR CREAR FacturasController
    /* =================================================*/
    Route::get('caja_registradora', 'FacturasController@caja_registradora')->name('caja_registradora');
    Route::get('crear_facturas', 'FacturasController@crear_facturas');
    Route::get('generar_factura', 'FacturasController@generar_factura');
    Route::get('ver_facturas',["as" => "ver_facturas", "uses" => "FacturasController@ver_facturas"]);
    Route::get('factura_show', 'FacturasController@factura_show');
    Route::get('devoluciones', 'FacturasController@devoluciones_ver')->name('devoluciones_ver');
    Route::get('buscar_factura','FacturasController@buscar_factura');
    Route::get('anular_factura','FacturasController@anular_factura');



    /*==================================================*/
    /* RUTAS PARA EL CONTROLADOR CREAR TiendasController
    /* =================================================*/
    Route::get('crear_tienda', ['as'=>'crear_tienda', 'uses'=>'TiendasController@crear_tienda'] );
    Route::get('nueva_tienda', ['as'=>'nueva_tienda.crear', 'uses'=>'TiendasController@nueva_tienda'] );
    Route::get('tienda_editar','TiendasController@tienda_editar');
    Route::get('buscar_tienda','TiendasController@buscar_tienda');
    /*==================================================*/
    // RUTA PARA CAMBIAR DE Tienda
    /*==================================================*/
    Route::get('cambiar_tienda',['as'=>'cambiar_tienda', 'uses'=>'TiendasController@cambiar_tienda'] );
    Route::post('cambiotienda', ['as'=>'cambiotienda','uses'=>'TiendasController@cambiotienda']);


    /*==================================================*/
    /* RUTAS PARA EL CONTROLADOR CREAR CategoriasController
    /* =================================================*/
    Route::get('nueva_categoria','CategoriasController@nueva_categoria');
    /*==================================================*/
    /* RUTAS PARA EL CONTROLADOR CREAR SubcategoriasController
    /* =================================================*/
    Route::get('nueva_subcategoria','SubcategoriasController@nueva_subcategoria');

    /*==================================================*/
    // RUTAS PARA LA CAJA MENOR 
    /*==================================================*/
    Route::get('caja_menor',['as'=>'caja_menor', 'uses'=>'CajamenorController@caja_menor'])->middleware('permissionshinobi:caja_menor');
    Route::get('inser_caja_menor', ['as'=>'inser_caja_menor', 'uses'=>'CajamenorController@inser_caja_menor'])->middleware('permissionshinobi:inser_caja_menor');
    Route::get('ver_entradas',['as'=>'ver_entradas','uses'=>'CajamenorController@ver_entradas'])->middleware('permissionshinobi:ver_entradas');
    Route::get('ver_salidas',['as'=>'ver_salidas','uses'=>'CajamenorController@ver_salidas'])->middleware('permissionshinobi:ver_salidas');

     /*==================================================*/
    // RUTAS PARA DEVOLUCIONES
    /*==================================================*/
    Route::get('crear_devoluciones', 'DevolucionesController@crear_devoluciones')->name('crear_devoluciones');
    Route::get('guardar_devolucion', 'DevolucionesController@guardar_devolucion');
    Route::get('ver_devolucion', 'DevolucionesController@ver_devolucion')->name('ver_devolucion');
    Route::get('editar_devolucion', 'DevolucionesController@editar_devolucion');
    Route::get('editar_devolucion_guardar', 'DevolucionesController@editar_devolucion_guardar');

    /*==================================================*/
    // RUTAS PARA EL CONTROL DE CAJAS
    /*==================================================*/
    Route::get('control_cajas', ['as'=>'control_cajas', 'uses'=>'ControlcajasController@control_cajas']);
    Route::get('buscarcajas',['as'=>'buscarcajas', 'uses'=>'ControlcajasController@buscarcajas']);
    Route::get('buscarcajarelacionada',['as'=>'buscarcajarelacionada', 'uses'=>'ControlcajasController@buscarcajarelacionada']);
    Route::get('nuevacaja',['as'=>'nuevacaja', 'uses'=>'ControlcajasController@nuevacaja']);
    Route::get('asignar_caja_usuario',['as'=>'asignar_caja_usuario','uses'=>'ControlcajasController@asignar_caja_usuario']);
    Route::get('quitarcaja',['as'=>'quitarcaja', 'uses'=>'ControlcajasController@quitarcaja']);
    Route::get('eliminar_caja',['as'=>'eliminar_caja','uses'=>'ControlcajasController@eliminar_caja']);
    Route::get('buscar_tiendas_activar',['as'=>'buscar_tiendas_activar','uses'=>'ControlcajasController@buscar_tiendas_activar']);
    Route::get('activar_desactivar_caja',['as'=>'activar_desactivar_caja','uses'=>'ControlcajasController@activar_desactivar_caja']);

    /*==================================================*/
    // RUTAS PARA EL CONTROL DE TIENDAS
    /*==================================================*/
    Route::get('control_tiendas',['as'=>'control_tiendas','uses'=>'TiendasController@control_tiendas']);
    Route::get('asignar_tienda',['as'=>'asignar_tienda','uses'=>'TiendasController@asignar_tienda']);
    Route::get('cargar_tienda_id',['as'=>'cargar_tienda_id','uses'=>'TiendasController@cargar_tienda_id']);
    Route::get('quitar',['as'=>'quitar','uses'=>'TiendasController@quitar']);

    /*==================================================*/
    // RUTAS PARA LAS CONFIGURACIONES DEL POST
    /*==================================================*/
    Route::get('configuraciones',['as'=>'configuraciones','uses'=>'ConfiguracionesController@configuraciones']);//->middleware('permissionshinobi:configuraciones');
    Route::get('buscar_iva',['as'=>'buscar_iva','uses'=>'ConfiguracionesController@buscar_iva']);
    Route::get('crear_tag',['as'=>'crear_tag','uses'=>'ConfiguracionesController@crear_tag']);
    Route::get('mostrar_tag',['as'=>'mostrar_tag','uses'=>'ConfiguracionesController@mostrar_tag']);
    Route::get('editar_tag',['as'=>'editar_tag','uses'=>'ConfiguracionesController@editar_tag']);
    Route::get('traerconsecutivo',['as'=>'traerconsecutivo','uses'=>'ConfiguracionesController@traerconsecutivo']);
    Route::get('iniciarconsecutivo',['as'=>'iniciarconsecutivo','uses'=>'ConfiguracionesController@iniciarconsecutivo']);
    Route::get('editar_consecutivo',['as'=>'editar_consecutivo','uses'=>'ConfiguracionesController@editar_consecutivo']);

    /*==================================================*/
    // RUTAS PARA LOS INFORMES DEL POST
    /*==================================================*/
    Route::get('informes',['as'=>'informes','uses'=>'InformesController@informes']);
    Route::get('info_ventas','InformesController@info_ventas')->name('info_ventas');//->middleware('permissionshinobi:info_ventas');
    Route::get('info_diario','InformesController@info_diario')->name('info_diario');
    Route::get('generar_informe','InformesController@generar_informe');
    Route::get('generar_informe_diario','InformesController@generar_informe_diario');
    Route::get('informe_diario_imprimir','InformesController@informe_diario_imprimir');
    Route::get('info_compras','InformesController@info_compras')->name('info_compras');//->middleware('permissionshinobi:info_compras');
    Route::get('generar_informe_compras','InformesController@generar_informe_compras')->name('generar_informe_compras');
    Route::get('ver_factura_compra','InformesController@ver_factura_compra')->name('ver_factura_compra');


    /*==================================================*/
    // RUTAS PARA SABER EN QUE TIENDA ESTOY
    /*==================================================*/
    Route::get('enquetiendaestoy', 'TiendasController@enquetiendaestoy')->name('enquetiendaestoy');


    /*==================================================*/
    // RUTAS PARA LOS BONOS DEL POST
    /*==================================================*/
    Route::get('bonos',['as'=>'bonos','uses'=>'BonosController@bonos']);

    /*==================================================*/
    // RUTAS PARA REMISIONES
    /*==================================================*/
    Route::get('crear_remisiones', 'RemisionesController@crear_remisiones')->name('crear_remisiones');
    Route::get('consultarProducto_remision','RemisionesController@consultarProducto_remision');


    /*==================================================*/
    // RUTAS PARA LOS PRODUCTOS FASE FREYMAN
    /*==================================================*/
    Route::get('buscar_c_p',['as'=>'buscar_c_p','uses'=>'ProductosController@buscar_c_p']);
    Route::get('select_categorias',['as'=>'select_categorias','uses'=>'ProductosController@select_categorias']);

    /*==================================================*/
    // RUTAS PARA LAS COMPRAS
    /*==================================================*/
    Route::get('compras',['as'=>'compras','uses'=>'ComprasController@compras']);
    Route::get('crear_proveedor',['as'=>'crear_proveedor','uses'=>'ComprasController@crear_proveedor']);
    Route::get('crear_compra',['as'=>'crear_compra','uses'=>'ComprasController@crear_compra']);
    Route::get('buscar_producto_compra',['as'=>'buscar_producto_compra','uses'=>'ComprasController@buscar_producto_compra']);

    /*==================================================*/
    // RUTAS PARA ACEPTAR COMPRAS
    /*==================================================*/
    Route::get('listarcompras',['as'=>'listarcompras','uses'=>'ProductosController@listarcompras']);
    Route::get('aceptarcompra',['as'=>'aceptarcompra','uses'=>'ProductosController@aceptarcompra']);

});
