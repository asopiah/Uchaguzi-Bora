<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Respondent;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController
{
    public function index()
    {
        $tenants = Answer::all()->count();
        $landlords = Respondent::all()->count();
        $properties = Media::all()->count();
        $houseUnits = User::all()->count();
        return view('home', compact('tenants', 'houseUnits', 'properties', 'landlords'));
    }
}
