<?php
/**
 * SlideShareApi.php
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

use GuzzleHttp\Client;


/**
 * SlideShareApi
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
class SlideShareApi
{
    protected $apiKey, $sharedSecret, $username, $client;

    public function __construct(
        Client $client,
        $apiKey,
        $sharedSecret,
        $username
    ) {
        $this->apiKey = $apiKey;
        $this->sharedSecret = $sharedSecret;
        $this->username = $username;
        $this->client = $client;
    }

    /**
     * Get all current user slideshows from the slideshare api
     *
     * @return \Guzzle\Http\EntityBodyInterface
     */
    public function getSlideShowsByCurrentUser()
    {
        return $this->callApi(
            'get_slideshows_by_user',
            ['username_for' => $this->username]
        );
    }

    /**
     * Call the slide share API
     *
     * @param $apiAction
     * @param $requestParams
     *
     * @return \Guzzle\Http\EntityBodyInterface
     */
    public function callApi($apiAction, $requestParams)
    {
        $requestParams = $this->signRequest($requestParams);
        $res = $this->client->get(
            'https://www.slideshare.net/api/2/' . $apiAction,
            [
                'query' =>
                    $requestParams
            ]
        );
        return $res->xml();
    }

    /**
     * Adds authentication params to the request params array and returns it
     *
     * @param $requestParams
     *
     * @return mixed
     */
    public function signRequest($requestParams)
    {
        $requestParams['api_key'] = $this->apiKey;
        $requestParams['ts'] = time();
        $requestParams['hash'] = sha1(
            $this->sharedSecret . $requestParams['ts']
        );
        return $requestParams;
    }
}