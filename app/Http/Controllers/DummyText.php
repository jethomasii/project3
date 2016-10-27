<?php

namespace project3\Http\Controllers;

use Illuminate\Http\Request;

use project3\Http\Requests;

use Magyarjeti\Loripsum\Client;
use Magyarjeti\Loripsum\Http\CurlAdapter;

class DummyText extends Controller
{
    //This will never be used it's here for testing.
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


    // For creating dummy text
    public function create(Request $request)
    {
      // Validate response, 1-25 numbers only please, not required.
      $this->validate($request, [
          'numberOfParagraphs' => 'min:1|max:25|numeric',
      ]);

      $numberOfParagraphs = $request->input('numberOfParagraphs');


      // Instantiate the "client" to generate text
      $client = new Client(new CurlAdapter);

      // Set normal variables.
      $text ='';

      for ($y = 0; $y < $numberOfParagraphs; $y++) {
        $text = $text . '<p>' .  $client->medium()->text(3) . '</p>';
      }

      // Set a default value for number of paragraphs
      if (!$numberOfParagraphs) {
        $numberOfParagraphs = 5;
      }

      return view('dummy.create')->with([
        'text' => $text,
        'prevParagraphs' => $numberOfParagraphs,
      ]);
    }

}
