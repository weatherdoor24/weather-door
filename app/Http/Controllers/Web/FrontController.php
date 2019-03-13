<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session, Validator;

class FrontController extends Controller
{
    public function index(){
        try{
    	    return view('welcome');
        }
        catch(Exception $e){
            $e->getMessage();
            Session::flash('message', 'Something went wrong. Please try again.'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
    }

    public function about(){
        try{
            return view('about');
        }
        catch(Exception $e){
            $e->getMessage();
            Session::flash('message', 'Something went wrong. Please try again.'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
    }

    public function contact(Request $request){
        try{
            
            $httpMethod = $request->method();
            $payload = $request->all();

            if($httpMethod === "GET"){

            	return view('contact');
            }
            elseif($httpMethod === "POST"){

            	$validator = Validator::make($payload, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'message' => 'required'
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                else{
                    Session::flash('message', 'We have received your message, will contact you shortly.'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return back();
                }
        	}
            else{
                Session::flash('message', 'Something went wrong. Please try again.'); 
                Session::flash('alert-class', 'alert-danger'); 
                return back();
            }
        }
        catch(Exception $e){
            $e->getMessage();
            Session::flash('message', 'Something went wrong. Please try again.'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
    }
}
