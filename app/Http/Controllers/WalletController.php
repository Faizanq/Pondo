<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use DB;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * DB::table('users')->select('name', 'email as user_email')->get()
     * DB::table('wallet')->select('user_id')->where('user_id',=,1)->get()
     * DB::table('wallet')->select('user_id')->where('user_id','=',auth()->user()->id)->get()
     * $balance = $query->row()->balance;
     * $results = DB::select('select * from users where id = :id', ['id' => 1]);
     * DB::table('users')->where('username', $username)->pluck('groupName');
     */
    public function index()
    {
        $a = value(auth()->user()->id);
        $b = DB::table('wallet')->select('user_id')->where('user_id','=',$a)->pluck('user_id');

        if($b->contains($a)) {
            //

        }else{
            DB::table('wallet')->insert([
                'balance' => value(0),
                'user_id' => value(auth()->user()->id),
            ]);
        }

        $bal = DB::table('wallet')->select('balance')->where('user_id','=',$a)->implode('balance');


        return view('wallet.index')->with('balance',$bal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}