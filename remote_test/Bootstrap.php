<?php
/**
 * Created by PhpStorm.
 * User: ershov-ilya
 * Website: ershov.pw
 * GitHub : https://github.com/ershov-ilya
 * GitHub project : https://github.com/ershov-ilya/CurrencySolutionsTestPack
 * Date: 06.09.2015
 * Time: 13:25
 */

class Bootstrap
{
    private static $output="Totals:\n";
    private static $result=array();

	public static function main($argv)
	{
        defined('DEBUG') or define('DEBUG', false);
        try {
            if(DEBUG) print_r($argv);
            if(empty($argv[1])) {
                // throw new Exception('Catched error: "no input file". Pass the input file as parameter like: "php ./Bootstrap.php statement.csv"', 400);
                print "Catched error: \"no input file\".\n";
                system('./example.sh');
                die;
            }

            // Read file
            defined('PROGRAMM_ROOT_PATH') or define('PROGRAMM_ROOT_PATH', dirname(__FILE__).'/');
            $file=$argv[1];
            $content=file(PROGRAMM_ROOT_PATH.$file);

            // Parse file
            foreach($content as $line=>$str){
                $arr=explode(',', $str);
                if(count($arr)<10) {
                    print "Catched error: Line #".($line+1)." is incorrectly formatted - skipped\n";
                    continue;
                }
                if(DEBUG) print count($arr).PHP_EOL;
//                if(DEBUG) print_r($arr);
                if(preg_match('/^pay[\d]{6}/i',$arr[1])){
                    $CUR=$arr[9];
                    $CUR=rtrim($CUR);
                    if(!isset(Bootstrap::$result[$CUR])) Bootstrap::$result[$CUR]=0;
                    Bootstrap::$result[$CUR]+=$arr[8];
                };
            }

            // Output formatting
            if(DEBUG) print_r(Bootstrap::$result);
            foreach(Bootstrap::$result as $CUR=>$v){
                Bootstrap::$output .= $CUR.' '.number_format($v, 2).PHP_EOL;
            }

            die(Bootstrap::$output); // Finish programm
        }
        catch(Exception $e){
            print $e->getMessage().PHP_EOL;
            exit($e->getCode());
        }
	}
}

Bootstrap::main($argv);
