<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',
            'date'    => 'required',
            'hour'    => 'required',
            'minute'  => 'required',
            'type'    => 'required',
            'file'    => 'mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048'
        ]);


        $Model = new Contact;

        if($request->file()) {
            $fileName         = time().'_'.$request->file->getClientOriginalName();
            $filePath         = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $filePath         = '/storage/app/public/' . $filePath;
            $Model->document  = $filePath;
        }

        $date                 = $request->date;
        $hour                 = $request->hour;
        $minute               = $request->minute;
        $type                 = $request->type;
        $Model->name          = $request->name;
        $Model->email         = $request->email;
        $Model->subject       = $request->subject;
        $Model->message       = $request->message;
        $Model->date = date("Y-m-d H:i", strtotime($date.' '.$hour.':'.$minute.' '.$type));
        $Model->status        = '1';
        $responce             = $Model->save();
        if(!$responce){
            $request->session()->flash('message','Sorry! Something went wrong');
            $request->session()->flash('status','0');
        }else{
            $request->session()->flash('message','Your data is submitted successfully');
            $request->session()->flash('status','1');
            
        }
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
