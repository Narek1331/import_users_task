<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\ImportUsersRequest;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){

        $users = $this->userService->get();

        return response()->json([
            'status' => true,
            'datas' => $users
        ],200);
    }

    public function random(Request $request){

        $count = $request['c'] ?? 10;

        $users = $this->userService->getRand($count);

        return response()->json([
            'status' => true,
            'datas' => $users
        ],200);
    }

    public function count(){

        $users = $this->userService->getCount();

        return response()->json([
            'status' => true,
            'datas' => $users
        ],200);
    }

    public function store(ImportUsersRequest $data){

        $results = $this->userService->store($data);

        return response()->json([
            'status' => true,
            'created' => $results['created'],
            'updated' => $results['updated']
        ],200);
    }
}
