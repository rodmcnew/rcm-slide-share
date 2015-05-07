<?php
/**
 * SlideShareApiController.php
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmSlideShare
 * @author    Rod Mcnew <rmcnew@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      https://github.com/reliv
 */

namespace Reliv\RcmSlideShare;

use Zend\Mvc\Controller\AbstractActionController;


/**
 * SlideShareApiController
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmSlideShare
 * @author    Rod Mcnew <rmcnew@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class ApiController extends AbstractActionController
{
    protected $api;

    /**
     * constructor
     *
     * @param SlideShareApi $api
     */
    public function __construct(SlideShareApi $api)
    {
        $this->api = $api;
    }

    public function index()
    {

    }
}