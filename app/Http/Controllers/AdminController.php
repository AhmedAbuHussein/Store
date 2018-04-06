<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Datastore;
use Illuminate\Support\Facades\Hash;
use App\Store;
use App\Add;
use App\Employee;
use App\History;
use App\Notify;
use App\Covenant;


class AdminController extends Controller
{
    
    public function __construct()
    {
   
        $this->middleware('auth');
    }
    

    public function dashboard(){

        $store1 = Add::join('datastores','adds.datastore_id','=','datastores.id')->where('datastores.store_id','=',2)->get();
        $store2 = Add::join('datastores','adds.datastore_id','=','datastores.id')->where('datastores.store_id','=',3)->get();
        $store3 = Add::join('datastores','adds.datastore_id','=','datastores.id')->where('datastores.store_id','=',4)->get();
        $store4 = Add::join('datastores','adds.datastore_id','=','datastores.id')->where('datastores.store_id','=',5)->get();
        $stores = Array(count($store1),count($store2),count($store3),count($store4));

        $cov1 = Covenant::join('datastores','covenants.datastore_id','=','datastores.id')->where('datastores.store_id','=',2)->get();
        $cov2 = Covenant::join('datastores','covenants.datastore_id','=','datastores.id')->where('datastores.store_id','=',2)->get();
        $cov3 = Covenant::join('datastores','covenants.datastore_id','=','datastores.id')->where('datastores.store_id','=',2)->get();
        $cov4 = Covenant::join('datastores','covenants.datastore_id','=','datastores.id')->where('datastores.store_id','=',2)->get();
        $cov = Array(count($cov1),count($cov2),count($cov3),count($cov4));

        $covenetNum =count(Employee::all());
        $count = 5;
        $userNum = count(User::all());
        $storeNum = count(Store::all())-1;
        
        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();

        if(Auth::user()->jop_id > 2 ){
            return redirect('/');
        }
        $arr = Array(
            'title' =>'الرئيسيه',
            'stores'=>$stores,
            'cov'=> $cov,
            'covenetNum'=>$covenetNum,
            'count'=>$count,
            'userNum'=>$userNum,
            'storeNum'=> $storeNum,
            'notifies'=>$notifies,
        ) ;
        return view('admin.dashboard',$arr);

    }

    public function chart(){
        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        if(Auth::user()->jop_id > 2 ){
            return redirect('/');
        }
        $arr = Array(
            'title' =>'الاحصائيات',
            'notifies'=> $notifies,
        ) ;
        return view('admin.chart',$arr);
    }

    public function store(Request $req){

        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        $store_id = Auth::user()->jop_id != 0 ? Auth::user()->store_id:'';
        $data = Datastore::join('stores','datastores.store_id','=','stores.id')
                            ->join('adds','datastores.id','=','adds.datastore_id')
                            ->select('datastores.*','stores.name AS store_name','adds.source','adds.permision')
                            ->where('store_id','LIKE','%' . $store_id . '%')
                            ->get();
        $stores = Store::where('id','>','1')->get();

        if(Auth::user()->jop_id > 2 ){
            return redirect('/');
        }
        $arr = Array(
            'title' =>'المخازن',
            'stores'=>$stores,
            'data'=>$data,
            'notifies'=>$notifies,
        ) ;
        return view('admin.store',$arr);
    }

    public function users(){

        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();

        $users = User::join('stores','users.store_id','=','stores.id')
                        ->select('users.*','stores.name AS store_name')
                        ->where('users.jop_id',"<=","2")->get();
        $empty = "";
        if(count($users)==0){
            $empty = "عفوا هذه الصفحه لا توجد بها بيانات !";
        }

        if(Auth::user()->jop_id > 2 ){
            return redirect('/');
        }
        $arr = Array(
            'title' =>'الموظفين',
            'empty'=>$empty,
            'users'=>$users,
            'notifies'=>$notifies,
        ) ;
        return view('admin.users',$arr);
    }


    public function covenant(Request $req){
        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        $items = Employee::all();
        $empty = "";
        if(count($items)==0){
            $empty = "عفوا هذه الصفحه لا توجد بها بيانات !";
        }
        $arr = Array(
            'title'=>'عهٌد',
            'empty' =>$empty,
            'items'=>$items,
            'notifies'=> $notifies,
        );
        return view('admin.employee',$arr);
    }
    
    public function register(){
        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        $stores = Store::where('id','!=','1')->get();

        $arr = Array(
            'title'=>'تسجيل',
            'stores'=> $stores,
            'notifies'=>$notifies,
        );
        return view('admin.registration',$arr);
    }

    public function registerUser(Request $req){

        $this->validate($req,[
            'firstname'=>'required|min:3',
            'lastname'=>'required|min:3',
            'username'=>'required|min:3',
            'email'=>'required|min:6',
            'jop_id'=>'required',
            'password'=>'required|min:6',
            'phone'=>'required|min:11|max:11'
        ]);
        

        if(!isset($req->store)){
            $store = "1";
        }else{
            $store = $req->store;
        }

        $fullname = $req->firstname . " " . $req->lastname;

        $newUser = new User();
        $newUser->name = $fullname;
        $newUser->email= $req->email;
        $newUser->password = Hash::make($req->password);
        $newUser->username =$req->username;
        $newUser->jop_id = $req->jop_id;
        $newUser->address = $req->address;
        $newUser->store_id = $store;
        $newUser->phone = $req->phone;


        if($req->hasFile('imgfile')){
            $imagename = time() . "." . $req->imgfile->getClientOriginalExtension();
            $req->imgfile->move(public_path('uploaded'),$imagename);
            $newUser->img = $imagename;
        }

        $newUser->save();
        
        return redirect('/user');
        
    }

    public function editDatastore(Request $req){

        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        $id = $req->get('id');
        $stores = Store::where('id','!=',1)->get();

        if(!empty(Datastore::find($id))){
            $item = Add::join('datastores','adds.datastore_id' ,'=','datastores.id')
                        ->join('stores','datastores.store_id','=','stores.id')
                        ->select('adds.*','datastores.name','datastores.price','stores.name AS store_name','stores.id As store_id')
                        ->where('datastores.id' ,'=',$id)->limit(1)
                        ->get();
        
            $arr = Array(
                'title'=>'Edit',
                'item'=>$item,
                'stores'=>$stores,
                'notifies'=> $notifies,
            );
            return view('admin.editstore',$arr);
        }
        return redirect('/');
    }

    public function saveDataChange(Request $req){


        $this->validate($req,[
            'name'=>'required|min:3',
            'source'=>'required|min:4',
            'quantity'=>'required',
            'permision'=>'required',
            'price'=>'required',
            'store'=>'required',
        ]);
        

        $user = User::find($req->user);
        $store = Store::find($req->store);

        // message for owner of store
        if($user->jop_id == 2){

            $hist = History::where('permision','=',$req->permision)->get();
            // check if item already exist in the history table
            if(count($hist) > 0){

                $hist = $hist[0];
                $hist->name = $req->name;
                $hist->quantity = $req->quantity;
                $hist->price = $req->price;
                $hist->source = $req->source;
                $hist->permision = $req->permision;
                $hist->store_id = $req->store;
                $hist->row_num = $req->itemid;
                $hist->total = ($req->price * $req->quantity);
                $hist->save();

            }else{

                $history = new History();
                $history->name = $req->name;
                $history->quantity = $req->quantity;
                $history->price = $req->price;
                $history->source = $req->source;
                $history->permision = $req->permision;
                $history->store_id = $req->store;
                $history->row_num = $req->itemid;
                $history->total = ($req->price * $req->quantity);
                $history->save();

                    
                $history_id = History::where('permision','=',$req->permision)->get();     

                $msg = "تم التعديل علي مخزن " . $store->name . " من قبل " . $user->name . "  لحفظ التعديل يرجي الموافقه  "; 
                $notify = new Notify();
                $notify->notify = $msg;
                $notify->user_id = $req->user;
                $notify->requerd_num = $req->itemid;
                $notify->store_id =  $req->store;
                $notify->history_id = $history_id[0]->id;

                $notify->save();


            }

           
        }else{           

            $add = Add::where('permision','=',$req->permision,'AND','datastore_id','=',$req->itemid)->limit(1)->get();
            $add = Add::find($add[0]->id);
            $item = Datastore::find($req->itemid);
            $currQuantity = $item->quantity;

            $item->name = $req->name;
            $item->price = $req->price;
            $item->quantity = ($currQuantity - $add->quantity)+ $req->quantity;
            $item->save();

            $item = Datastore::find($req->itemid);
            $currQuantity = $item->quantity;

            $item->total = $req->price * ($currQuantity);
            $item->save();

            $add->source = $req->source;
            $add->quantity = $req->quantity;
            $add->user_id   = $req->user;
            $add->save();       

        }
        return redirect('/store');

    }


    public function magagenotify(Request $req){
        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        $itemid = intval($req->get('itemid'));

        $history = History::where('row_num','=',$itemid)->get();
        if(count($history) == 0){
            return redirect('/store');
        }
        $data = Datastore::join('stores','datastores.store_id','=','stores.id')
                        ->join('adds','datastores.id','=','adds.datastore_id')
                        ->select('datastores.*','stores.name AS store_name','adds.source','adds.permision','adds.quantity AS quant')
                        ->where('datastores.id','=',$itemid)
                        ->get();
       
        $arr = Array(
            'title'=> 'اشعارات',
            'original'=>$data[0],
            'history'=>$history[0],
            'notifies'=> $notifies,
            
        );
        return view('admin.manageNotify',$arr);
    }

    public function editaction(Request $req){
        if($req->input('action') == 'save'){

            $history = History::find($req->input('history_id'));
            $datastore = Datastore::find($history->row_num);
            $adds = Add::where('permision','=',$history->permision)->get();
            $adds = $adds[0];
            $oldquantity = $adds->quantity;


            $datastore->name = $history->name;
            $datastore->price = $history->price;
            $datastore->quantity = ((floatval($datastore->quantity) - floatval($oldquantity))+ floatval($history->quantity));
            $datastore->save();
            $datastore = Datastore::find($history->row_num);
            $datastore->total = (floatval($datastore->price) * floatval($datastore->quantity));
            $datastore->save(); 

            $adds->source = $history->source;
            $adds->quantity = $history->quantity;
            $adds->save();
        

        }


            $notify = Notify::where('history_id','=',$req->input('history_id'));
            $notify->delete();
            $history = History::find($req->input('history_id'));
            $history->delete();
            return redirect('/store');
        
    }

    public function modifyuser(Request $req){
		
		$id = $req->get('id');
		$chk = User::find($id);
		if(count($chk) == 0){
			return redirect('/dashboard');
		}
        if(Auth::user()->id == $id || Auth::user()->jop_id == 0){

			$notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
			
			$user = User::find($id);
			$stores = Store::where('id','!=',0)->get();

			$arr = Array(
				'title'=> 'تعديل',
				'notifies' => $notifies,
				'user' => $user,
				'stores'=>$stores,
			);

			return view('admin.edituser',$arr);
		}else{
			 return redirect('/dashboard');
        }
    }

    public function profile(Request $req)
    {
        $notifies = Notify::where('readed','=', 0 )->where('store_id','=',Auth::user()->store_id)->get();
        $id = intval($req->get('id'));
        $user = User::join('stores','stores.id','=','users.store_id')
                    ->select('users.*','stores.name AS store_name')
                    ->where('users.id','=',$id)
                     ->get();
        if(count($user) == 0){
            return redirect('/dashboard');
        }
        $arr = Array(
            'title'=>'مستخدم',
            'user'=> $user[0],
            'notifies'=>$notifies,
        );
        return view('admin.profile',$arr);
    }

}
