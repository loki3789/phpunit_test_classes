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
class test_post extends PHPUnit_Framework_TestCase {
    //put your code here
    protected $client;

    protected function setUp() {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'https://reqres.in'
        ]);
    }
    
    
    
    public function testPost()
{
    $Id = uniqid();

    $response = $this->client->post('/api/users', [
        'json' => [
            "id"=> $Id,
            "first_name"=> "Abc",
            "last_name"=>"xyz",
            "avatar"=> "https://s3.amazonaws.com/uifaces/faces/twitter/marcoramires/127.jpg"
        ]
    ]);

    $this->assertSame(201, $response->getStatusCode());

    $data = json_decode($response->getBody(), true);

    $this->assertSame($Id, $data['id']);
    
}
}