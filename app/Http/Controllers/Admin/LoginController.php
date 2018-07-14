<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin;

class LoginController extends Controller{

  public function get(){

    return view('admin.login');

  }

  public function post(Request $request){

    $admin= Admin::where('email', $request->get('email'))->first();

    if($admin == null){

      $request->session()->flash('error', 'Usuario inexistente');
      $request->session()->flash('email', $request->get('email'));
      $request->session()->flash('clave', $request->get('clave'));

      return redirect(route('admin.login.get'));

    }

    if(! password_verify($request->get('clave'), $admin->clave)){

      $request->session()->flash('error', 'Clave invalida');
      $request->session()->flash('email', $request->get('email'));

      return redirect(route('admin.login.get'));

    }

    $request->session()->put('admin', $admin);

    return redirect(route('admin.index'));

  }

}
