<?php

namespace project3\Http\Controllers;

use Illuminate\Http\Request;

use project3\Http\Requests;

use Magyarjeti\Loripsum\Client;
use Magyarjeti\Loripsum\Http\CurlAdapter;

class DummyText extends Controller
{
    //
    public function index()
    {

      // Instantiate the "client" to generate text
      $client = new Client(new CurlAdapter);

      // Set normal variables.
      $x = 5;
      $text ='';

      for ($y = 0; $y < $x; $y++) {
        $text = $text . '<p>' .  $client->medium()->text(3) . '</p>';
      }

      return $text;
    }

}
