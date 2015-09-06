<?php
/**
 * Created by PhpStorm.
 * User: ershov-ilya
 * Website: ershov.pw
 * GitHub : https://github.com/ershov-ilya
 * Date: 06.09.2015
 * Time: 13:25
 */

class Bootstrap
{
    public static $output="Programm result:\n";

	public static function main($argv)
	{
        print_r($argv);
        defined('PROGRAMM_ROOT_PATH') or define('PROGRAMM_ROOT_PATH', dirname(__FILE__));
        print Bootstrap::$output;
		exit(0);
	}
}

Bootstrap::main($argv);