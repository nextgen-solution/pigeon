<?php

namespace NextGenSolution\Pigeon;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Pigeon
{
    /**
     * Guzzle instance.
     *
     * @var Client
     */
    protected $guzzle;

    /**
     * Create a new service instance.
     *
     * @param Client $guzzle
     */
    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * Send an email to recipient via Pigeon's service.
     *
     * @param string $recipient
     * @param string $template
     * @param array $params
     * @return array
     */
    public function mail($recipient, $template, array $params = [])
    {
        $url = config('pigeon.host') . '/api/v1/me/send/mail';
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('pigeon.key'),
        ];
        $json = compact('recipient', 'template', 'params');

        $response = $this->guzzle->post($url, [
            'headers' => $headers,
            'json' => $json,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Send a text to recipient via Pigeon's service.
     *
     * @param string $recipient
     * @param string $template
     * @param array $params
     * @return array
     */
    public function text($recipient, $template, array $params = [])
    {
        $url = config('pigeon.host') . '/api/v1/me/send/text';
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('pigeon.key'),
        ];
        $json = compact('recipient', 'template', 'params');

        $response = $this->guzzle->post($url, [
            'headers' => $headers,
            'json' => $json,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Request Pigeon to generate an OTP and send it via mail.
     *
     * @param string $recipient
     * @param string $template
     * @return array
     */
    public function otpMail($recipient, $template)
    {
        $url = config('pigeon.host') . '/api/v1/me/otp/mail';
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('pigeon.key'),
        ];
        $json = compact('recipient', 'template');

        $response = $this->guzzle->post($url, [
            'headers' => $headers,
            'json' => $json,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Request Pigeon to generate an OTP and send it via text.
     *
     * @param string $recipient
     * @param string $template
     * @return array
     */
    public function otpText($recipient, $template)
    {
        $url = config('pigeon.host') . '/api/v1/me/otp/text';
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('pigeon.key'),
        ];
        $json = compact('recipient', 'template');

        $response = $this->guzzle->post($url, [
            'headers' => $headers,
            'json' => $json,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Verify user's OTP.
     *
     * @param string $recipient
     * @param string $otp
     * @param string $reference
     * @return array
     */
    public function otpVerify($recipient, $otp, $reference)
    {
        $url = config('pigeon.host') . '/api/v1/me/otp/verify';
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('pigeon.key'),
        ];
        $json = compact('recipient', 'otp', 'reference');

        try {
            $this->guzzle->post($url, [
                'headers' => $headers,
                'json' => $json,
            ]);

            return true;
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 400) {
                return false;
            }

            throw $e;
        }
    }
}
