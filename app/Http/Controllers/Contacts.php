<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts as ContactsModel;

class Contacts extends Controller
{
    function index (){

        $contacts = [];
        
        return view('contacts') -> with(['contacts', $contacts]);
    }
    
    function create (Request $request){
        $fName = $request['fname'];
        $lName = $request['lname'];
        $email = $request['email'];
        $tel = $request['tel'];

        $contacts = new ContactsModel;

        $contacts -> fname = $fName;
        $contacts -> lname = $lName;
        $contacts -> email = $email;
        $contacts -> tel = $tel;

        if($contacts -> save()){
            return redirect()->back()->with('success', 'Contact Added');
        }
        else{
            return redirect()->back()->with("error", "Contact could not be saved");
        }
    }
}
