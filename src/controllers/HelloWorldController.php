<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\Controllers;

class HelloWorldController extends ActionController
{

   public function __invoke(Request $request, Response $response, $args = []) {
       return $response->write("Hello World");
   }
}
