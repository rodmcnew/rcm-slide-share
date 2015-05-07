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
use Zend\View\Model\JsonModel;

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

    public function indexAction()
    {
        $this->response->setContent(json_encode($this->api->getSlideShowsByCurrentUser()));
        return $this->response;
    }
}