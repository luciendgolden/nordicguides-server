<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\MemberModel;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function member(){
        return response()->json(MemberModel::get(), 200);
    }
}
