<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $papers = Paper::all();
        return view("paper.index", ['papers' => $papers]);
    }

    public function create(){
        return view("paper.create");
    }

    public function detail($papid){
        $papers = Paper::where('papid',$papid)->first();
        return view("paper.detail", ['papers' => $papers]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'papid' => 'unique:papers',
            'title' => 'required|min:5',
            'author' => 'required|min:3'
        ]);

        Paper::create($validateData);
        $request->session()->flash('message', "Paper {$validateData['title']} has been successfully added");
        return redirect()->route('papers.index');
    }

    public function edit($papid){
        $paper = Paper::where('papid',$papid)->first();
        //return view("paper.edit", ['paper' => $paper]);
        return view("paper.edit")->with('paper', $paper);
    }

    public function update(Request $request, $papid){
        $validateData = $request->validate([
            'papid' => '',
            'title' => 'required|min:5',
            'author' => 'required|min:3'
        ]);

        Paper::where('papid', $validateData['papid'])->update($validateData);
        $request->session()->flash('message', "Paper {$validateData['title']} has been successfully updated");
        return redirect()->route('papers.index');
    }

    public function destroy($papid){
        //dd($papid);
        $name = Paper::where('papid',$papid)->first();
        Paper::where('papid', $papid)->delete();
        return redirect()->route('papers.index')->with('message', "Paper {$name['title']} has been successfully deleted");
    }

}
