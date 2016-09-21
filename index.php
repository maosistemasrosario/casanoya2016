<?php

        $system_folder = "sistema/system";
        $application_folder = "application";

        define('EXT', '.php');
        define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
        define('FCPATH', str_replace(SELF, '', __FILE__));
        define('BASEPATH', $system_folder.'/');

        if (is_dir($application_folder))
        {
	        define('APPPATH', $application_folder.'/');
        }
        else
        {
	        if ($application_folder == '')
	        {
		$application_folder = 'application';
	        }

	        define('APPPATH', BASEPATH.$application_folder.'/');
        }

        require_once BASEPATH.'codeigniter/CodeIgniter'.EXT;

?>
