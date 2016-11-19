<?php

namespace CharDB\Http\Controllers;

use Illuminate\Http\Request;
use CharDB\Character;
use DB;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('characters.index', ['characters' => Character::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('characters.create', ['sexes' => DB::table('sexes')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get all valid sexes as a comma-separted list
        $sexes = implode(",",DB::table('sexes')->pluck('id')->toArray());

        $this->validate($request,
            [
            'prefix' => "max:" . config('field_lengths.prefix'),
            'first_name' => "required|max:" . config('field_lengths.first_name'),
            'middle_name' => "max:" . config('field_lengths.middle_name'),
            'last_name' => "required|max:" . config('field_lengths.last_name'),
            'suffix' => "max:" . config('field_lengths.suffix'),
            'sex' => "required|in:" . $sexes,
            'short_description' => "required|max:" . config('field_lengths.short_description'),
            'long_description' => "max:" . config('field_lengths.long_description'),
            ]
            );

        $character = new Character;

        $character->prefix = $request->prefix;
        $character->first_name = $request->first_name;
        $character->middle_name = $request->middle_name;
        $character->last_name = $request->last_name;
        $character->suffix = $request->suffix;
        $character->sex = $request->sex;
        $character->short_description = $request->short_description;
        $character->long_description = $request->long_description;

        $character->save();

        return view('characters.show', ['character' => $character, 'character_created' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('characters.show', ['character' => Character::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
