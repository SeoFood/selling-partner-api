<?php
/**
 * SolicitationsApi
 * PHP version 5
 *
 * @category Class
 * @package  Evers\SellingPartnerApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Selling Partner API for Solicitations
 *
 * With the Solicitations API you can build applications that send non-critical solicitations to buyers. You can get a list of solicitation types that are available for an order that you specify, then call an operation that sends a solicitation to the buyer for that order. Buyers cannot respond to solicitations sent by this API, and these solicitations do not appear in the Messaging section of Seller Central or in the recipient's Message Center. The Solicitations API returns responses that are formed according to the <a href=https://tools.ietf.org/html/draft-kelly-json-hal-08>JSON Hypertext Application Language</a> (HAL) standard.
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.18
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Evers\SellingPartnerApi\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Evers\SellingPartnerApi\ApiException;
use Evers\SellingPartnerApi\Configuration;
use Evers\SellingPartnerApi\HeaderSelector;
use Evers\SellingPartnerApi\ObjectSerializer;

/**
 * SolicitationsApi Class Doc Comment
 *
 * @category Class
 * @package  Evers\SellingPartnerApi
 */
class SolicitationsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param Configuration   $config
     * @param ClientInterface $client
     * @param HeaderSelector  $selector
     */
    public function __construct(
        Configuration $config = null,
        ClientInterface $client = null,
        HeaderSelector $selector = null
    ) {
        $this->config = $config ?: new Configuration();
        $this->client = $client ?: new Client();
        $this->headerSelector = $selector ?: new HeaderSelector($this->config);
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createProductReviewAndSellerFeedbackSolicitation
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which a solicitation is sent. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \Evers\SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse
     */
    public function createProductReviewAndSellerFeedbackSolicitation($amazon_order_id, $marketplace_ids)
    {
        list($response) = $this->createProductReviewAndSellerFeedbackSolicitationWithHttpInfo($amazon_order_id, $marketplace_ids);
        return $response;
    }

    /**
     * Operation createProductReviewAndSellerFeedbackSolicitationWithHttpInfo
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which a solicitation is sent. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \Evers\SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createProductReviewAndSellerFeedbackSolicitationWithHttpInfo($amazon_order_id, $marketplace_ids)
    {
        $returnType = '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse';
        $request = $this->createProductReviewAndSellerFeedbackSolicitationRequest($amazon_order_id, $marketplace_ids);
        $signedRequest = $this->config->signRequest($request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($signedRequest, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $signedRequest->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createProductReviewAndSellerFeedbackSolicitationAsync
     *
     * 
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which a solicitation is sent. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createProductReviewAndSellerFeedbackSolicitationAsync($amazon_order_id, $marketplace_ids)
    {
        return $this->createProductReviewAndSellerFeedbackSolicitationAsyncWithHttpInfo($amazon_order_id, $marketplace_ids)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createProductReviewAndSellerFeedbackSolicitationAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which a solicitation is sent. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createProductReviewAndSellerFeedbackSolicitationAsyncWithHttpInfo($amazon_order_id, $marketplace_ids)
    {
        $returnType = '\Evers\SellingPartnerApi\Model\CreateProductReviewAndSellerFeedbackSolicitationResponse';
        $request = $this->createProductReviewAndSellerFeedbackSolicitationRequest($amazon_order_id, $marketplace_ids);
        $signedRequest = $this->config->signRequest($request);

        return $this->client
            ->sendAsync($signedRequest, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createProductReviewAndSellerFeedbackSolicitation'
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which a solicitation is sent. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createProductReviewAndSellerFeedbackSolicitationRequest($amazon_order_id, $marketplace_ids)
    {
        // verify the required parameter 'amazon_order_id' is set
        if ($amazon_order_id === null || (is_array($amazon_order_id) && count($amazon_order_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $amazon_order_id when calling createProductReviewAndSellerFeedbackSolicitation'
            );
        }
        // verify the required parameter 'marketplace_ids' is set
        if ($marketplace_ids === null || (is_array($marketplace_ids) && count($marketplace_ids) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $marketplace_ids when calling createProductReviewAndSellerFeedbackSolicitation'
            );
        }
        if (count($marketplace_ids) > 1) {
            throw new \InvalidArgumentException('invalid value for "$marketplace_ids" when calling SolicitationsApi.createProductReviewAndSellerFeedbackSolicitation, number of items must be less than or equal to 1.');
        }


        $resourcePath = '/solicitations/v1/orders/{amazonOrderId}/solicitations/productReviewAndSellerFeedback';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($marketplace_ids)) {
            $queryParams['marketplaceIds'] = $marketplace_ids;
        } else
        if ($marketplace_ids !== null) {
            $queryParams['marketplaceIds'] = ObjectSerializer::toQueryValue($marketplace_ids);
        }

        // path params
        if ($amazon_order_id !== null) {
            $resourcePath = str_replace(
                '{' . 'amazonOrderId' . '}',
                ObjectSerializer::toPathValue($amazon_order_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/hal+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/hal+json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getSolicitationActionsForOrder
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which you want a list of available solicitation types. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \Evers\SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse
     */
    public function getSolicitationActionsForOrder($amazon_order_id, $marketplace_ids)
    {
        list($response) = $this->getSolicitationActionsForOrderWithHttpInfo($amazon_order_id, $marketplace_ids);
        return $response;
    }

    /**
     * Operation getSolicitationActionsForOrderWithHttpInfo
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which you want a list of available solicitation types. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \Evers\SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSolicitationActionsForOrderWithHttpInfo($amazon_order_id, $marketplace_ids)
    {
        $returnType = '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse';
        $request = $this->getSolicitationActionsForOrderRequest($amazon_order_id, $marketplace_ids);
        $signedRequest = $this->config->signRequest($request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($signedRequest, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $signedRequest->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSolicitationActionsForOrderAsync
     *
     * 
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which you want a list of available solicitation types. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSolicitationActionsForOrderAsync($amazon_order_id, $marketplace_ids)
    {
        return $this->getSolicitationActionsForOrderAsyncWithHttpInfo($amazon_order_id, $marketplace_ids)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSolicitationActionsForOrderAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which you want a list of available solicitation types. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSolicitationActionsForOrderAsyncWithHttpInfo($amazon_order_id, $marketplace_ids)
    {
        $returnType = '\Evers\SellingPartnerApi\Model\GetSolicitationActionsForOrderResponse';
        $request = $this->getSolicitationActionsForOrderRequest($amazon_order_id, $marketplace_ids);
        $signedRequest = $this->config->signRequest($request);

        return $this->client
            ->sendAsync($signedRequest, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getSolicitationActionsForOrder'
     *
     * @param  string $amazon_order_id An Amazon order identifier. This specifies the order for which you want a list of available solicitation types. (required)
     * @param  string[] $marketplace_ids A marketplace identifier. This specifies the marketplace in which the order was placed. Only one marketplace can be specified. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSolicitationActionsForOrderRequest($amazon_order_id, $marketplace_ids)
    {
        // verify the required parameter 'amazon_order_id' is set
        if ($amazon_order_id === null || (is_array($amazon_order_id) && count($amazon_order_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $amazon_order_id when calling getSolicitationActionsForOrder'
            );
        }
        // verify the required parameter 'marketplace_ids' is set
        if ($marketplace_ids === null || (is_array($marketplace_ids) && count($marketplace_ids) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $marketplace_ids when calling getSolicitationActionsForOrder'
            );
        }
        if (count($marketplace_ids) > 1) {
            throw new \InvalidArgumentException('invalid value for "$marketplace_ids" when calling SolicitationsApi.getSolicitationActionsForOrder, number of items must be less than or equal to 1.');
        }


        $resourcePath = '/solicitations/v1/orders/{amazonOrderId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($marketplace_ids)) {
            $queryParams['marketplaceIds'] = $marketplace_ids;
        } else
        if ($marketplace_ids !== null) {
            $queryParams['marketplaceIds'] = ObjectSerializer::toQueryValue($marketplace_ids);
        }

        // path params
        if ($amazon_order_id !== null) {
            $resourcePath = str_replace(
                '{' . 'amazonOrderId' . '}',
                ObjectSerializer::toPathValue($amazon_order_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/hal+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/hal+json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
