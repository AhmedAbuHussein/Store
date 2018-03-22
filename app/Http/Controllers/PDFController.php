<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Datastore;
use App\Store;

class PDFController extends Controller
{
    public function index(){
        $data = Datastore::join('stores','datastores.store_id','=','stores.id')
                        ->join('adds','datastores.id','=','adds.datastore_id')
                        ->select('datastores.*','stores.name AS store_name','adds.source','adds.permision')
                        ->get();

        $stores = Store::all();
        $arr = Array('data'=>$data,'stores'=>$stores);
        $pdf = PDF::loadView('invoice', $arr)->setOptions([
                                                        'dpi' => 50,
                                                         'defaultFont' => 'Tahoma' , 
                                                         'isHtml5ParserEnabled'=>true
                                                         ]);
        
        return $pdf->download('store.pdf');
    }
}
