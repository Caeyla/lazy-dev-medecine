<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RankUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function initList(Request $request){
        $instance = new User();
        $query = $instance->newQuery();
        $perPage=1;

        $data=$this->buildFilter($query,$instance,$request)->paginate($perPage);

        $data->appends($request->all());

        return view('listUser',[ 'data'=>$data,'table'=>'User',
                                'instance'=>$instance,]);
    }
    function buildFilter($query,$instance,Request $request){
        $searchable=$instance->searchable;
        $select=$instance->select;
        $between=$instance->between;
        $data=[];
        $query->where("rank","=",RankUser::$POINT_DE_VENTE);
        foreach ($searchable as $search) {
            if($request[$search]==null || $request[$search]==''){
                continue;
            }
            if(in_array($search,$select)){
                $query->where($search,$request[$search]);
            }
            else if(in_array($search,$between)){
                $query->whereBetween($search,$request['min_'.$search],$request['max_'.$search]);
            }
            else{
                $query->where($search,'like','%'.$request[$search].'%');
            }
        }
        return $query;
    }
}
