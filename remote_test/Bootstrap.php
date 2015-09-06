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
    public static $output="Totals:\n";
    public static $result=array();

	public static function main($argv)
	{
        try {
            print_r($argv);
            if(empty($argv[1])) throw new Exception('Error: no input file! Pass input file like: php ./Bootstrap.php statement.csv', 400);

            defined('PROGRAMM_ROOT_PATH') or define('PROGRAMM_ROOT_PATH', dirname(__FILE__));
            print Bootstrap::$output;
            exit(0);
        }
        catch(Exception $e){
            print $e->getMessage().PHP_EOL;
            exit($e->getCode());
        }
	}
}

Bootstrap::main($argv);