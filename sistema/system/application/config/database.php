<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/



$active_group = "test_anibal";
$active_record = TRUE;

$db['prod']['hostname'] = "localhost";
$db['prod']['username'] = "migu011_producto";
$db['prod']['password'] = "producto2013";
$db['prod']['database'] = "migu011_productos";
$db['prod']['dbdriver'] = "mysql";
$db['prod']['dbprefix'] = "";
$db['prod']['pconnect'] = TRUE;
$db['prod']['db_debug'] = TRUE;
$db['prod']['cache_on'] = FALSE;
$db['prod']['cachedir'] = "";
$db['prod']['char_set'] = "utf8";
$db['prod']['dbcollat'] = "utf8_general_ci";

$db['prod2']['hostname'] = "localhost";
$db['prod2']['username'] = "migu011_migu11";
$db['prod2']['password'] = "migu112013";
$db['prod2']['database'] = "migu011_productos";
$db['prod2']['dbdriver'] = "mysql";
$db['prod2']['dbprefix'] = "";
$db['prod2']['pconnect'] = TRUE;
$db['prod2']['db_debug'] = TRUE;
$db['prod2']['cache_on'] = FALSE;
$db['prod2']['cachedir'] = "";
$db['prod2']['char_set'] = "utf8";
$db['prod2']['dbcollat'] = "utf8_general_ci";

$db['prod_reimagina']['hostname'] = "localhost";
$db['prod_reimagina']['username'] = "va000728_delos";
$db['prod_reimagina']['password'] = "Delos2012";
$db['prod_reimagina']['database'] = "va000728_delos_betas";
$db['prod_reimagina']['dbdriver'] = "mysql";
$db['prod_reimagina']['dbprefix'] = "";
//$db['prod_reimagina']['pconnect'] = TRUE;
$db['prod_reimagina']['pconnect'] = FALSE;
$db['prod_reimagina']['db_debug'] = TRUE;
$db['prod_reimagina']['cache_on'] = FALSE;
$db['prod_reimagina']['cachedir'] = "";
$db['prod_reimagina']['char_set'] = "ISO-8859-1";
$db['prod_reimagina']['dbcollat'] = "latin1_swedish_ci";

$db['test_anibal']['hostname'] = "localhost";
$db['test_anibal']['username'] = "leanlat_casanoya";
$db['test_anibal']['password'] = "leanlat_casanoya";
//$db['test_anibal']['database'] = "leanlat_casanoya";
$db['test_anibal']['database'] = "casanoya_prueba";
$db['test_anibal']['dbdriver'] = "mysql";
$db['test_anibal']['dbprefix'] = "";
//$db['test_anibal']['pconnect'] = TRUE;
$db['test_anibal']['pconnect'] = FALSE;
$db['test_anibal']['db_debug'] = TRUE;
$db['test_anibal']['cache_on'] = FALSE;
$db['test_anibal']['cachedir'] = "";
$db['test_anibal']['char_set'] = "ISO-8859-1";
$db['test_anibal']['dbcollat'] = "latin1_swedish_ci";

/*
$db['prod_reimagina']['hostname'] = "localhost";
$db['prod_reimagina']['username'] = "va000728_delos";
$db['prod_reimagina']['password'] = "Delos2012";
$db['prod_reimagina']['database'] = "va000728_delos";
$db['prod_reimagina']['dbdriver'] = "mysql";
$db['prod_reimagina']['dbprefix'] = "";
$db['prod_reimagina']['pconnect'] = TRUE;
$db['prod_reimagina']['db_debug'] = TRUE;
$db['prod_reimagina']['cache_on'] = FALSE;
$db['prod_reimagina']['cachedir'] = "";
$db['prod_reimagina']['char_set'] = "ISO-8859-1";
$db['prod_reimagina']['dbcollat'] = "latin1_swedish_ci";



$db['default']['hostname'] = "localhost";
$db['default']['username'] = "va000728_delos";
$db['default']['password'] = "Delos2012";
$db['default']['database'] = "va000728_delos";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "ISO-8859-1";
$db['default']['dbcollat'] = "latin1_swedish_ci";

$db['prod_netsol']['hostname'] = "localhost";
$db['prod_netsol']['username'] = "va000728_delos";
$db['prod_netsol']['password'] = "Delos2012";
$db['prod_netsol']['database'] = "va000728_delos";
$db['prod_netsol']['dbdriver'] = "mysql";
$db['prod_netsol']['dbprefix'] = "";
$db['prod_netsol']['pconnect'] = TRUE;
$db['prod_netsol']['db_debug'] = TRUE;
$db['prod_netsol']['cache_on'] = FALSE;
$db['prod_netsol']['cachedir'] = "";
$db['prod_netsol']['char_set'] = "ISO-8859-1";
$db['prod_netsol']['dbcollat'] = "latin1_swedish_ci";

$db['local']['hostname'] = "localhost";
$db['local']['username'] = "va000728_delos";
$db['local']['password'] = "Delos2012";
$db['local']['database'] = "va000728_delos";
$db['local']['dbdriver'] = "mysql";
$db['local']['dbprefix'] = "";
$db['local']['pconnect'] = TRUE;
$db['local']['db_debug'] = TRUE;
$db['local']['cache_on'] = FALSE;
$db['local']['cachedir'] = "";
$db['local']['char_set'] = "ISO-8859-1";
$db['local']['dbcollat'] = "latin1_swedish_ci";

$db['local_full']['hostname'] = "localhost";
$db['local_full']['username'] = "va000728_delos";
$db['local_full']['password'] = "Delos2012";
$db['local_full']['database'] = "va000728_delos";
$db['local_full']['dbdriver'] = "mysql";
$db['local_full']['dbprefix'] = "";
$db['local_full']['pconnect'] = TRUE;
$db['local_full']['db_debug'] = TRUE;
$db['local_full']['cache_on'] = FALSE;
$db['local_full']['cachedir'] = "";
$db['local_full']['char_set'] = "ISO-8859-1";
$db['local_full']['dbcollat'] = "latin1_swedish_ci";

*/
/* End of file database.php */
/* Location: ./system/application/config/database.php */
?>