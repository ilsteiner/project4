<?php

namespace CharDB\Http\Controllers;

use Illuminate\Http\Request;
use CharDB\Relationship;
use CharDB\Character;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relationships.create', ['characters' => Character::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get all valid characters as a comma-separated list
        $characters = implode(",",Character::all()->pluck('id')->toArray());

        $this->validate($request,
            [
                "rel_1_character" => "required|different:rel_1_related_to|in:" . $characters,
                "rel_1_name" => "required|max:" . config('field_lengths.short_description'),
                "rel_1_related_to" => "required|different:rel_1_character|in:" . $characters,
                "rel_2_name" => "required_with:bidirectional|max:" . config('field_lengths.short_description')
            ]
            );

        $relationship1 = new Relationship;

        $relationship1->name = $request->rel_1_name;
        $relationship1->character = $request->rel_1_character;
        $relationship1->is_related_to = $request->rel_1_related_to;

        $relationship1->save();

        $request->session()->flash('success', 
            Relationship::find($relationship1->id)->to_string . " was created!");

        //If the relationship is bidirectional, create two relationships
        if($request->has('bidirectional')) {
            $relationship2 = new Relationship;

            $relationship2->name = $request->rel_2_name;
            $relationship2->character = $request->rel_1_related_to;
            $relationship2->is_related_to = $request->rel_1_character;

            $relationship2->save();

            $request->session()->flash('success', $relationship2->to_string);            
        }

        return redirect()->route('characters.show', 
            ['character' => Character::find($relationship1->character),
             'bidirectional' => ($request->bidirectional ? true : false)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('characters.show', 
            ['character' => Character::find(Relationship::find($id)->character)]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relationships = [];

        $relationships[0] = Relationship::find($id);

        //Get the reciprocal relationship if there is one
        $rel2 = Relationship::where('is_related_to', '=', $id)->where('character', '=', $relationships[0]->is_related_to)->get();

        if(count($rel2)){
            echo "Did it!";
            $relationships[1] = $rel2->first();
        }

        return view('relationships.edit', 
            [
                'relationships' => $relationships,
                'characters' => Character::all()
            ]);
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
        //Get all valid characters as a comma-separated list
        $characters = implode(",",Character::all()->pluck('id')->toArray());

        $this->validate($request,
            [
                "rel_1_character" => "required|different:rel_1_related_to|in:" . $characters,
                "rel_1_name" => "required|max:" . config('field_lengths.short_description'),
                "rel_1_related_to" => "required|different:rel_1_character|in:" . $characters,
                "rel_2_name" => "required_with:bidirectional|max:" . config('field_lengths.short_description')
            ]
            );

        $relationship = Relationship::find($id);

        $relationship->name = $request->rel_1_name;
        $relationship->character = $request->rel_1_character;
        $relationship->is_related_to = $request->rel_1_related_to;

        $relationship->save();

        $request->session()->flash('success', 
            Relationship::find($relationship->id)->to_string . " was updated!");

        return redirect()->route('characters.show', 
            ['character' => Character::find(Relationship::find($id)->character)]);
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
