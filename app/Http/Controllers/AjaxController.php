<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use App\User;
use App\Store;
use App\Notify;
use App\Datastore;

class AjaxController extends Controller
{
    
    public function datastorenotify(Request $req){
        $item = isset($req->item)?$req->item:'';
        $mystore = intval($req->store);
        $data = "";
        if($mystore == 1){
            $data = Datastore::join('stores','datastores.store_id','=','stores.id')
            ->join('adds','datastores.id','=','adds.datastore_id')
            ->select('datastores.*','stores.name AS store_name','stores.id AS store_id','adds.source','adds.permision')
            ->where('datastores.name','LIKE','%'. $item .'%')
            ->get();
        }else{
            $data = Datastore::join('stores','datastores.store_id','=','stores.id')
            ->join('adds','datastores.id','=','adds.datastore_id')
            ->select('datastores.*','stores.name AS store_name','stores.id AS store_id','adds.source','adds.permision')
            ->where('datastores.name','LIKE','%'. $item .'%')
            ->where('datastores.store_id','=',$mystore)
            
            ->get();
        }


        $role = Auth::user()->store_id;
        $arr = Array(
            'role'=>$role,
            'data'=>$data);
        return $arr;

    }

    public function storetype(Request $req){
        
        $data = "";
        if(intval($req->text) > 1 && intval($req->text) <=5){

            $data = Datastore::join('stores','datastores.store_id','=','stores.id')
                                ->join('adds','datastores.id','=','adds.datastore_id')
                                ->select('datastores.*','stores.name AS store_name','stores.id AS store_id','adds.source','adds.permision')
                                ->where('datastores.store_id','=',$req->text)
                                ->where('datastores.name','LIKE','%' . $req->item . '%')
                                ->get();
        }elseif(intval($req->text) == 1){
            $data = Datastore::join('stores','datastores.store_id','=','stores.id')
                            ->join('adds','datastores.id','=','adds.datastore_id')
                            ->select('datastores.*','stores.name AS store_name','stores.id AS store_id','adds.source','adds.permision')
                            ->where('datastores.name','LIKE','%' . $req->item . '%')
                            ->get();
        }

        $role = Auth::user()->store_id;
        $arr = Array(
            'role'=>$role,
            'data'=>$data);
        return $arr;
 
    }

    public function notifyheader(Request $req){
        
        $notify = Notify::where('readed','=', 0 ,'AND','store_id','=',Auth::user()->store_id)->get();
        $count = count($notify);
        if($count != $req->count){
            return Array('notify'=>$notify,'count'=>$count);
        }
        return;  
    }


    public function user(Request $req){

        $users = User::join('stores','users.store_id','=','stores.id')
                        ->select('users.*','stores.name AS store_name')
                        ->where('users.name','LIKE','%' .$req->user . '%')->get();

        return $users;
    }

}
