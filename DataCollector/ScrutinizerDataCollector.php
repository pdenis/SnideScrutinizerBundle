<?php


namespace Snide\Bundle\ScrutinizerBundle\DataCollector;

use Snide\Scrutinizer\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Guzzle\Http\Message\EntityEnclosingRequest;

/**
 * Class ScrutinizerDataCollector
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ScrutinizerDataCollector extends DataCollector
{
    /**
     * Constructor
     */
    public function __construct(Client $client)
    {
        $this->client = new Client();
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Exception $exception
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = $this->client->fetchRepository('pdenis/memetor');
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'snide_scrutinizer';
    }
}