<?php
/*
 * APIMATICCalculatorLib
 *
 * This file was automatically generated by APIMATIC v2.0 on 12/06/2016
 */

use APIMATICCalculatorLib\APIException;
use APIMATICCalculatorLib\Exceptions;
use APIMATICCalculatorLib\APIHelper; 
use APIMATICCalculatorLib\Models;

class OperationControllerTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @var \APIMATICCalculatorLib\Controllers\OperationController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        $client = new APIMATICCalculatorLib\APIMATICCalculatorClient();
        self::$controller = $client->getOperation();	
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Calculates the expression using the specified operation.
     */
    public function testCalculate1() {
        // Parameters for the API call
        $operation = APIHelper::deserialize('SUM', new Models\string());
        $x = 2.0;
        $y = 3.0;

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
        	$result = self::$controller->getCalculate($operation, $x, $y);
        } catch(APIException $e) {};

        // Test response code
        $this->assertEquals(200, $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200");

        // Test whether the captured response is as we expected
        $this->assertNotNull($result,
            "Result does not exist");

        $this->assertEquals('5.0', 
                $this->httpResponse->getResponse()->getRawBody(),
                "Response body does not match exactly");
    }

}
