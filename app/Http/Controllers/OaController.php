<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Oa;
use App\Taxonomy;
use App\Target;
use App\User;
use Auth;

class OaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $oas = new Oa();
        // $oas->all();
        $oas = Oa::where('oa_user_id', Auth::user()->user_id)->get();

        return view('creator.oa.index', compact('oas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxonomies = Taxonomy::all();
        $targets = Target::all();
        $taxs = [];
        $tars = [];

        foreach($taxonomies as $tax):
            $taxs[$tax->tax_id] = $tax->tax_name;
        endforeach;

        foreach($targets as $tar):
            $tars[$tar->tar_id] = $tar->tar_name . ' ' . $tar->tar_description;
        endforeach;
        
        return view('creator.oa.create', compact('taxs', 'tars', 'taxonomies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $oa = Oa::create($request->all());

        return redirect()->route('oas.edit', $oa->id)->with('info', 'Oa creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function show(Oa $oa)
    {
        //
        return 'Show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function edit(Oa $oa)
    {
        dd($oa);
        return 'Edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oa $oa)
    {
        //
        return 'Update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oa $oa)
    {
        //
        return 'Destroy';
    }
}
