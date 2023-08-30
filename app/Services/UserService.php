<?php

namespace App\Services;
use App\Models\User;

class UserService
{

    public function store($data){

        $result = [
            'created' => 0,
            'updated' => 0
        ];

        if(isset($data['users'])){
            foreach($data['users'] as $us){
                $user = User::updateOrCreate(
                    [
                        'first_name' => $us['first_name'],
                        'last_name' => $us['last_name'],
                    ],
                    [
                        'first_name' => $us['first_name'],
                        'last_name' => $us['last_name'],
                        'email' => $us['email'],
                        'age' => $us['age'],
                    ]
                );

                $user->wasRecentlyCreated ? $result['created']++ : $result['updated']++;
            }
        }

        return $result;

    }

    public function getRand($count = 5000){
        return User::inRandomOrder()->limit($count)->get();
    }

    public function getCount($count = 10){
        return User::count();
    }

    public function get(){
        return User::get();
    }

    public function destroyById($id){
        return User::find($id)->delete();
    }

}

?>
