<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostcardRequest;
use App\Http\Requests\UpdatePostcardRequest;
use App\Models\Postcard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\abort;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */   
    public function index()
    {
        $isDraft = 0;
        return view('postcards.index', [
         'postcards' => Postcard::latest()->filter(request(['search']))
                    ->where('is_draft', '=', $isDraft)
                    ->where((Carbon::parse(date('Y-m-d H:s:i', strtotime('online_at')))
                    ->diffInSeconds(Carbon::parse(date('Y-m-d H:s:i', strtotime('offline_at'))), false)), '>=', '0')
                    ->paginate(5)
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postcards.create');
    }
    
    // Store Postcard Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',            
            'price' => 'required',           
            'is_draft' => 'required'            
        ]);    

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['team_id'] = auth()->id();

        Postcard::create($formFields);

        return redirect('/postcards/manage')->with('message', 'Postcard created successfully!');
    }

    // Show Edit Form
    public function edit(Postcard $postcard) {
        return view('postcards.edit', ['postcard' => $postcard]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Postcard $postcard)
    {
        //Check that resource is online
        $online = Postcard::where((Carbon::parse(date('Y-m-d H:s:i', strtotime('online_at')))
                    ->diffInSeconds(Carbon::parse(date('Y-m-d H:s:i', strtotime('offline_at'))), false)), '>=', '0');        
      
        if($online == "[]"){
            $online = "";
        }

        if($online == ""){
            abort_if(!$online, response(Redirect::to('/')
                ->with('message', '410, Resource is offline!'), 410));
        }

        //Confirm postcard deleted
        $deletedPost = Postcard::onlyTrashed()      
                    ->where('id', '=', $postcard->id)
                    ->get();
        if($deletedPost == "[]"){
            $deletedPost = "";
        }
        if($deletedPost != ""){
            abort_if($deletedPost, response(Redirect::to('/')
                ->with('message', '301, Postcard unavailable!'), 301));                     
        }

        //Get postcard schema
        $product = Postcard::findOrFail($postcard->id);
        $schema = $product->getSchema();               
       
        return view('postcards.show', compact('postcard', 'schema'));         
    }

    // Update Postcard Data
    public function update(Request $request, Postcard $postcard) {
               
        $formFields = $request->validate([
            'title' => 'required',            
            'price' => 'required',            
            'is_draft' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $postcard->update($formFields);

        return back()->with('message', 'Postcard updated successfully!');
    }

    /**
     * Remove the specified postcard from storage.
     */
    public function destroy(Postcard $postcard) {        
        
        if($postcard->photo && Storage::disk('public')->exists($postcard->photo)) {
            Storage::disk('public')->delete($postcard->photo);
        }
        $postcard->delete();
        return redirect('/postcards/manage')->with('message', 'Postcard deleted successfully');
    }

    // Manage Postcards
    public function manage() {       
        return view('postcards.manage', [
            'postcards' => Postcard::latest()->filter(request(['search']))
                        ->paginate(5)
            ]);
    }    

}
