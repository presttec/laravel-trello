<?php

namespace PrestTEC\Trello\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\Arr;
use InvalidArgumentException;

/**
 * Class GuzzleHttpAdapter.
 */
class GuzzleHttpAdapter implements ConnectorInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var array
     */
    protected $config;

    /**
     * @param array $config
     * @return mixed
     */
    public function connect(array $config)
    {
        $this->config = $this->getConfig($config);

        return $this->getAdapter();
    }

    /**
     * @param $config
     * @return array|null
     * @throws \InvalidArgumentException
     */
    private function getConfig($config)
    {

            if (! array_key_exists('identifier', $config) || empty($config['identifier'])) {
                throw new InvalidArgumentException('The guzzlehttp connector requires configuration.');
            }

            if (! array_key_exists('secret', $config) || empty($config['secret'])) {
                throw new InvalidArgumentException('The guzzlehttp connector requires configuration.');
            }

            return $config;

    }

    /**
     * @return Client
     */
    private function getAdapter()
    {
        return new Client([
            'timeout' => 30,
            'form_params' => array_merge(
                [
                    'responsetype' => Arr::get($this->config, 'responsetype', 'json'),
                ]
            ),
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'Laravel Trello API Interface',
                'key' => $this->config['identifier'],
                'token' => $this->config['secret'],
            ],
        ]);
    }
}
