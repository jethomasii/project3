<?php

namespace project3\Http\Controllers;

use Illuminate\Http\Request;

use project3\Http\Requests;

use Magyarjeti\Loripsum\Client;
use Magyarjeti\Loripsum\Http\CurlAdapter;

class CreateUserData extends Controller
{
    // this will never be used, it was just here for testing
    function index ()
    {
      $generator = \Nubs\RandomNameGenerator\All::create();


      return $generator->getName();
    }

    // Function for creating dummy users and passing inforatmion back to the create page.
    function create(Request $request)
    {
      // Validate request.
      $this->validate($request, [
          'numberOfUsers' => 'min:1|max:25|numeric',
      ]);

      // Create a random-name-generator that uses alliteration
      $generator = new \Nubs\RandomNameGenerator\All(
          [
            new \Nubs\RandomNameGenerator\Alliteration(),
          ]
      );

      // Get instance variables, placeholder for text
      $numberOfUsers = $request->input('numberOfUsers');
      $birthDate     = $request->input('birthDate');
      $bio           = $request->input('bio');
      $text = '';

      // Create the users, fill text
      for ($x = 0; $x < $numberOfUsers; $x++) {

        // Load names into an array to make sure we get first and last.
        $name = explode(' ', $generator->getName(), 3);
        $text = $text . '<p>' . $name[0] . ' ' . $name[1];

        // Handle additional options here:
        if ($birthDate) {

          $year = 2016 - rand( 0, 116 );
          $month = rand( 1, 12 );
          $day = rand( 1, 28 );
          $date = $month . '/' . $day . '/' . $year;

          $text = $text . '<br>' . $date;
        }

        if ($bio) {
          $client = new Client(new CurlAdapter);
          $bioText = $client->short()->text(1);
          $text = $text . '<br>' . $bioText;
        }

        // Finish the paragraph.
        $text = $text . '</p>';
      }

      // Set defaults if not set
      if (!$numberOfUsers) {
        $numberOfUsers = 5;
      }

      return view('users.create')->with([
        'text' => $text,
        'prevUsers' => $numberOfUsers,
        'prevBirth' => $birthDate,
        'prevBio'   => $bio,
      ]);
    }
}
