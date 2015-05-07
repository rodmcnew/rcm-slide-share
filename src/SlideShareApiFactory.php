<?php
/**
 * SlideShareApiFactory.php
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

use Guzzle\Http\Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


/**
 * SlideShareApiFactory
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
class SlideShareApiFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = $config['RcmSlideShare'];
        return new SlideShareApi(
            new Client(),
            $config['apiKey'],
            $config['sharedSecret'],
            $config['userName']);
    }
} 