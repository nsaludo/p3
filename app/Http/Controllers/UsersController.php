<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;

class UsersController extends Controller
{

    public function index()
    {
        //return view('users.index');
        //$fakeUsers = $this->generateFakeUsers(1, 1, 1, 1, 1, 1, 1);

        return view('users.index');

    }

    private function getGender(){
        $gender_array= array("male","female");
        return $gender_array[rand(0,1)];
    }

    private function generateFakeUsers($numberOfUsers,
                                       $homeAddress,
                                       $emailAddress,
                                       $phoneNumber,
                                       $gender,
                                       $birthday,
                                       $photoUrl)


    {
        $faker = Faker::create();
        $fakeUsers = Array();
        $randomFemalePhotoUrl=$this->getPhotoUrlData('data/female.json');
        $randomMalePhotoUrl=$this->getPhotoUrlData('data/male.json');
        $randomNumAr=$this->getUniqNums(0,110,$numberOfUsers);
        for ($i=0; $i<=$numberOfUsers-1; $i++) {
            $userGender=$this->getGender();
            if ($userGender == "male") {
                $fakeUsers[$i] = Array('FirstName' => $faker->firstNameMale);
            } else {
                $fakeUsers[$i] = Array('FirstName' => $faker->firstNameFemale);
            }
            $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('LastName' => $faker->lastName));
            if ($homeAddress == 1) {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('Address' => $faker->streetAddress.', '.$faker->city.', '.$faker->stateAbbr.', '.$faker->country));
            } else {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('Address' => ''));
            }
            if ($emailAddress == 1) {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('EmailAddress' => $faker->email));
            } else {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('EmailAddress' => ''));
            }
            if ($phoneNumber == 1) {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('PhoneNumber' => $faker->phoneNumber));
            } else {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('PhoneNumber' => ''));
            }
            if ($gender == 1) {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('Gender' => $userGender));
            } else {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('Gender' => ''));
            }
            if ($birthday == 1) {
				$fakeUsers[$i] = array_merge($fakeUsers[$i], Array('Birthday' => $faker->dateTimeThisCentury->format("Y-m-d")));
		    } else {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('Birthday' => ''));
            }
            if ($photoUrl == 1) {
                if ($userGender == "male") {
                    $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('PhotoUrl' => $randomMalePhotoUrl[$randomNumAr[$i]]));
                } else {
                    $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('PhotoUrl' => $randomFemalePhotoUrl[$randomNumAr[$i]]));
                }
            } else {
                $fakeUsers[$i] = array_merge($fakeUsers[$i], Array('PhotoUrl' => ''));
            }
        }
        return($fakeUsers);
    }

    private function getPhotoUrlData($jsonFile) {
       $jsonPhotoUrlData = file_get_contents($jsonFile);
       $photoUrlArray = json_decode($jsonPhotoUrlData, true);
       return $photoUrlArray["photo"];
    }

    private function getUniqNums($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    public function post(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'numberOfUsers' => 'required|numeric|min:1|max:100',
            'homeAddress' => 'boolean',
            'emailAddress' => 'boolean',
            'phoneNumber' => 'boolean',
            'gender' => 'boolean',
            'photoUrl' => 'boolean',
            'birthday' => 'boolean'
        ]);

        $fakeUsers = $this->generateFakeUsers($request['numberOfUsers'],
                          $request['homeAddress'],
                          $request['emailAddress'],
                          $request['phoneNumber'],
                          $request['gender'],
                          $request['birthday'],
                          $request['photoUrl']);

        $jsonFile = json_encode($fakeUsers, JSON_PRETTY_PRINT);

        return view('users.index')
            ->with('fakeUsers', $fakeUsers)
            ->with('jsonFile', $jsonFile);
    }

    public function download(Request $request)
    {
        header('Content-disposition: attachment; filename=randomUsers.json');
        header('Content-type: text/plain');
        echo $request['jsonFile'];
    }

}
