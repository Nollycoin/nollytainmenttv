<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PublisherPagesController extends Controller
{
    public function index(){
        return view('publisher.dashboard', [

        ]);
    }

    public function partners()
    {
        return view('publisher.partners', [
           'users' => User::all()
        ]);
    }

    public function addPartner(){
        return view('publisher.add_partner');
    }
}
