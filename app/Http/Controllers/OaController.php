<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Oa;
use App\Taxonomy;
use App\Topic;
use App\Target;
use App\User;
use Auth;

class OaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('preview');
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
        $user = auth()->user();
        if( $user->user_slug === 'superadmin'){
            $oas = Oa::all();
            $myOas = Oa::where('oa_user_id', Auth::user()->user_id)->get();
            return view('admin.oa.index', compact('oas', 'myOas'));
        }

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
        $tops = [];

        foreach($taxonomies as $tax):
            $taxs[$tax->tax_id] = $tax->tax_name;
        endforeach;

        foreach($targets as $tar):
            $tars[$tar->tar_id] = $tar->tar_name . ' ' . $tar->tar_description;
        endforeach;

        return view('creator.oa.create', compact('taxs', 'tars', 'taxonomies', 'tops'));
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

        return redirect()->route('oas.edit', $oa)->with('info', 'Oa creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function show(Oa $oa)
    {
        $user = auth()->user();
        if( $user->user_slug === 'superadmin'){
            $oaAccess = json_decode($oa->oa_access);
            return view('admin.oa.show', compact('oa', 'oaAccess'));
        }
        return view('creator.oa.show', compact('oa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function edit(Oa $oa)
    {
        $taxonomies = Taxonomy::all();
        $topic_list = Topic::where('top_tax_id', $oa->oa_tax_id)->get();
        $topic_act = Topic::where('top_id', $oa->oa_top_id)->first();
        $targets = Target::all();
        $target_act = Target::where( 'tar_id', $oa->oa_tar_id )->first();

        $taxs = [];
        $tars = [];

        foreach($taxonomies as $tax):
            $taxs[$tax->tax_id] = $tax->tax_name;
        endforeach;

        foreach($targets as $tar):
            $tars[$tar->tar_id] = $tar->tar_name . ' ' . $tar->tar_description;
        endforeach;

        foreach($topic_list as $tl):
            $tops[$tl->top_id] = $tl->top_name . ' (' . $tl->top_grade . ')';
        endforeach;

        return view('creator.oa.edit', compact('taxs', 'tars', 'taxonomies', 'oa', 'target_act', 'tops', 'topic_act'));
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
        // return response()->json( $request->all() );
        $oa->update($request->all());
        if(request()->ajax()){
            return response()->json($oa);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oa  $oa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oa $oa)
    {
        $oa->delete();
        return redirect()->route('oas.index');
    }

    public function preview(Request $request, $prev){
        $oa = Oa::where('oa_id', $prev)->first();
        return view('creator.oa.prev', compact('oa'));
    }
}
