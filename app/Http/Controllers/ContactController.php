<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        //$allCategory = Category::offset(0)->limit(5)->get(); // offset & limit
        $allContact = Contact::latest()->paginate(10); // 10 per page
        //$allContact = Contact::latest()->get();
        return view('contact.index', compact('allContact'));
    }


    public function create(){
        
        return view('contact.create');
    }


 public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:contacts',
            'email' => 'required|unique:contacts',
            'phone' => 'required|unique:contacts',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            
        ]);

        return redirect()->route('pages.message-confirmation')->with('success', 'Success! Your message was sent Successfully');
    }


    public function view($id){
        $viewContact = Contact::FindOrFail($id);

        return view('contact.view', compact('viewContact'));

    }

  

    public function delete($id){
        Contact::FindOrFail($id)->delete();
        return back()->with('success', 'Success! data delete Successfully');
    }
}
