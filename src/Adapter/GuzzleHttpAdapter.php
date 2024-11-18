<?php

namespace Imobia\Asaas\Adapter;

// Asaas
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

// GuzzleHttp
use GuzzleHttp\Exception\RequestException;
use Imobia\Asaas\Exception\ForbiddenException;
use Imobia\Asaas\Exception\HttpException;
use Imobia\Asaas\Exception\ValidationException;

/**
 * Guzzle Http Adapter
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class GuzzleHttpAdapter implements AdapterInterface
{
    /**
     * Client Instance
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * Command Response
     *
     * @var Response|GuzzleHttp\Message\ResponseInterface
     */
    protected $response;

    /**
     * Constructor
     *
     * @param  string                $token   Access Token
     * @param  ClientInterface|null  $client  Client Instance
     */
    public function __construct($token, ClientInterface $client = null)
    {
        $this->client = $client ?: new Client(['headers' => ['access_token' => $token]]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        try
        {
            $this->response = $this->client->get($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        try
        {
            $this->response = $this->client->delete($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, $content = '')
    {
        $options         = [];
        $options['json'] = $content;

        try
        {
            $this->response = $this->client->put($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, $content = '', $formType = 'json')
    {
        $options            = [];
        $options[$formType] = $content;

        try
        {
            $this->response = $this->client->post($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if (null === $this->response) {
            return;
        }

        return [
            'reset'     => (int) (string) $this->response->getHeader('RateLimit-Reset'),
            'remaining' => (int) (string) $this->response->getHeader('RateLimit-Remaining'),
            'limit'     => (int) (string) $this->response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @throws HttpException
     */
    protected function handleError()
    {
        $body = (string) $this->response->getBody();
        $code = (int) $this->response->getStatusCode();

        $content = json_decode($body);

        if ($code === 400) {
            throw new ValidationException(isset($content->message) ? $content->message : $code . ' Dados inválidos.', $code, $content->errors);
        } else if ($code === 403) {
            throw new ForbiddenException(isset($content->message) ? $content->message : $code . ' Operação não permitida.', $code, $content->errors);
        } else {
            throw new HttpException(isset($content->message) ? $content->message : $code . ' A Requisição não processada.' . $code, $code);
        }
    }
}
