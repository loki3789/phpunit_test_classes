<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test_post
 *
 * @author lokesh
 */
require('../vendor/autoload.php');
class test_put extends PHPUnit_Framework_TestCase {
    //put your code here
    protected $client;

    protected function setUp() {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'https://reqres.in'
        ]);
    }
    
    
    
    public function testPut()
{
    $Id = uniqid();

    $response = $this->client->put('/api/users/2', [  //update user 2
        'json' => [
            "id"=> $Id,
            "first_name"=> "Abc",
            "last_name"=>"xyz",
            "avatar"=> "https://s3.amazonaws.com/uifaces/faces/twitter/marcoramires/127.jpg"
        ]
    ]);

    $this->assertSame(200, $response->getStatusCode());

    $data = json_decode($response->getBody(), true);

    $this->assertSame($Id, $data['id']);
    print_r($data);
    
}
}