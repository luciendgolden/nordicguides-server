<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\MemberModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function findAll()
    {
        return response()->json(MemberModel::get(), 200);
    }

    public function findById($id){
        $members = DB::table('members')
            ->where('members.memberID', $id)
            ->get();

        return response()->json($members, 200);
    }

    /**
     * Show the list of guides in a city
     */
    public function showListOfGuidesInCity($id){
        /**
         SELECT members.memberID, members.firstname, members.lastname FROM members
        INNER JOIN membergroups ON members.memberID=membergroups.memberID
        INNER JOIN groups ON membergroups.groupID=groups.groupID
        INNER JOIN groupcities ON groups.groupID=groupcities.groupID WHERE groupcities.cityID=1
         */

        $members = DB::table('members')
            ->select('members.*')
            ->join('membergroups', 'members.memberID', '=', 'membergroups.memberID')
            ->join('groups', 'membergroups.groupID', '=', 'groups.groupID')
            ->join('groupcities', 'groups.groupID', '=', 'groupcities.groupID')
            ->where('groupcities.cityID', $id)
            ->get();

        return response()->json($members, 200);
    }
}
