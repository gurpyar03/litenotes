<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId=Auth::user()->id;
        // $notes=Note::where('user_id',$userId)->latest()->paginate(2);
        // $notes=Auth::user()->notes()->latest()->paginate(1);
         $notes=Note::whereBelongsTo(Auth::user())->latest()->paginate(1);
        

         return view('notes.index',['notes'=>$notes]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $formFields= $request->validate([
            'title'=>'required',
            'text'=>'required'
        ]);
        $formFields['user_id']= auth()->id();
        
        Note::create($formFields);

        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note=Note::where('id',$id)->where('user_id',auth::id())->firstorfail();
        
        
       return view('notes.show',['note'=>$note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {   
        if($note->user_id!=auth::id() ){
            abort(403);
        }
       $note=Note::where('id',$note->id)->where('user_id',auth::id())->firstorfail();
        return view('notes.edit',['note'=>$note]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        
        if($note->user_id!=auth::id() ){
            abort(403);
        }

       $formFields= $request->validate([
            'title'=>'required|max:120',
            'text'=>'required'
        ]);

        $note->update($formFields);

        return to_route('notes.show',$note)->with('message','Note updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        if($note->user_id!=auth::id() ){
            abort(403);
        }
         $note->delete();

         return redirect('/notes')->with('message','Note Deleted Successfully' );
    }
}
