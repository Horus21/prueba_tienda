<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use GuzzleHttp\Client;

class OrdersController extends Controller
{

     public function index(){

        return view('newOrder');
    }
     public function create(Request $request){
            $request->validate([
                'name' => 'required',
                'document' => 'required',
                'email' => 'required',
                'address' => 'required',
                'mobile' => 'required'
            ]);
        if ($request != ""){
            $newOrder=new App\Order;
            $newOrder->name=$request->name;
            $newOrder->document=$request->document;
            $newOrder->email=$request->email;
            $newOrder->address=$request->address;
            $newOrder->mobile=$request->mobile;
            $newOrder->status="CREATED";
            $newOrder->RequestID=1;
            $newOrder->save();
        }
        $show=$newOrder;
        return view('resumeOrder',compact('show'));
    }

    public function show($id){
        $show = App\Order::findOrFail($id);
        return view('resumeOrder',compact('show'));
    }

    public function list(){
        $list = App\Order::paginate(5);
        return view('listOrder',compact('list'));
    }

    public function edit($id){
        $list = App\Order::findOrFail($id);
        return view('update',compact('list'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'document' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required'
        ]);
        $listUpdate = App\Order::findOrFail($id);
        $listUpdate->name=$request->name;
        $listUpdate->document=$request->document;
        $listUpdate->email=$request->email;
        $listUpdate->address=$request->address;
        $listUpdate->mobile=$request->mobile;
        $listUpdate->save();
        return redirect('listOrder')->with('message', 'Datos Actualizados correctamente');
    }

    public function destroy($id){
        $listDestroy = App\Order::findOrFail($id);
        $listDestroy->delete();
        return back()->with('message','Datos Eliminados correctamente');

    }


}
