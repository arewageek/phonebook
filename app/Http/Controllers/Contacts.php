<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts as ContactsModel;

class Contacts extends Controller
{
    function index (){

        $contacts = \App\Models\Contacts::all();
        
        return view('contacts', ['contacts' => $contacts]);
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

    function delete($id){
        $contacts = ContactsModel::find($id);

        if($contacts -> delete()){
            return redirect()->back()->with('success', 'Contact Deleted');
        }
        else{
            return redirect()->back()->with("error", "Contact could not be deleted");
        }
    }

    function view($id){
        // view each contact by id
        $contact = ContactsModel::find($id);

        return view('edit', ['contact' => $contact]);
    }

    function edit($id, Request $request){
        // edit each contact by id

        $fName = $request['fname'];
        $lName = $request['lname'];
        $email = $request['email'];
        $tel = $request['tel'];

        $contacts = ContactsModel::find($id);
        $contacts -> fname = $fName;
        $contacts -> lname = $lName;
        $contacts -> email = $email;
        $contacts -> tel = $tel;

        if($contacts -> save()){
            return redirect()->back()->with('success', 'Contact Updated');
        }
        else{
            return redirect()->back()->with("error", "Contact could not be updated");
        }
    }
}
