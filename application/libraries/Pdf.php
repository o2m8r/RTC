<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF in CodeIgniter applications.
 *
 * @package            CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author            CodexWorld
 * @license            https://www.codexworld.com/license/
 * @link            https://www.codexworld.com
 */

// reference the Dompdf namespace
use Dompdf\Dompdf;

class Pdf
{
    public function __construct(){
        
        // include autoloader
        require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
        // require_once 'dompdf/lib/html5lib/Parser.php';
		// require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
		// require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
		// require_once 'dompdf/src/Autoloader.php';
		// Dompdf\Autoloader::register();
        
        // instantiate and use the dompdf class
        $pdf = new DOMPDF();
        
        $CI =& get_instance();
        $CI->dompdf = $pdf;
        
    }
}
?>