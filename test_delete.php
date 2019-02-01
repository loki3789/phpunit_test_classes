<?php


/**
 * Description of test_delete
 *
 * @author lokesh
 */
require('../vendor/autoload.php');
class test_delete extends PHPUnit_Framework_TestCase {
    //put your code here
    protected $client;

    protected function setUp() {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'https://reqres.in'
        ]);
    }
    
    public function testDelete_Error()
{
    $response = $this->client->delete('/api/users/2', [ //delete user 2
        'http_errors' => false
    ]);

    $this->assertSame(204, $response->getStatusCode());
}
}