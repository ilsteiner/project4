<?php

namespace CharDB\Http\Controllers;

use Illuminate\Http\Request;
use CharDB\Character;
use CharDB\Relationship;
use Session;
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
        return view('characters.index', 
            [
                'characters' => Character::count(),
                'relationships' => Relationship::count()
            ]);
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
        $messages = [
            "first_name.required" => "The First Name field is required.",
            "first_name.max" => "The First Name field should not be longer than "
                                . config('field_lengths.first_name')
                                . " characters.",
            "middle_name.max" => "The Middle Name field should not be longer than "
                                . config('field_lengths.middle_name')
                                . " characters.",
            "last_name.required" => "The Last Name field is required.",
            "last_name.max" => "The Last Name field should not be longer than "
                                . config('field_lengths.last_name')
                                . " characters.",
            "short_description.required" => "The Short Description field is required.",
            "short_description.max" => "The Short Description field should not be longer than "
                                . config('field_lengths.short_description')
                                . " characters.",
            "long_description.max" => "The Long Description field should not be longer than "
                                . config('field_lengths.long_description')
                                . " characters."

        ];

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
            ],
            $messages
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
    public function show($id,$random=false)
    {
        $returnArray = array();

        $returnArray['character'] = Character::find($id);

        if($random){
            $returnArray['random'] = true;
        }

        return view('characters.show', $returnArray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('characters.edit', 
            ['sexes' => DB::table('sexes')->get(), 
            'character' => Character::find($id)]);
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
        $messages = [
            "first_name.required" => "The First Name field is required.",
            "first_name.max" => "The First Name field should not be longer than "
                                . config('field_lengths.first_name')
                                . " characters.",
            "middle_name.max" => "The Middle Name field should not be longer than "
                                . config('field_lengths.middle_name')
                                . " characters.",
            "last_name.required" => "The Last Name field is required.",
            "last_name.max" => "The Last Name field should not be longer than "
                                . config('field_lengths.last_name')
                                . " characters.",
            "short_description.required" => "The Short Description field is required.",
            "short_description.max" => "The Short Description field should not be longer than "
                                . config('field_lengths.short_description')
                                . " characters.",
            "long_description.max" => "The Long Description field should not be longer than "
                                . config('field_lengths.long_description')
                                . " characters."

        ];
        
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
            ],
            $messages
            );

        $character = Character::find($id);

        $character->prefix = $request->prefix;
        $character->first_name = $request->first_name;
        $character->middle_name = $request->middle_name;
        $character->last_name = $request->last_name;
        $character->suffix = $request->suffix;
        $character->sex = $request->sex;
        $character->short_description = $request->short_description;
        $character->long_description = $request->long_description;

        $character->save();

        return view('characters.show', ['character' => $character, 'character_updated' => true]);
    }

    /**
     * Confirm deletion of the character
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $character = Character::find($id);

        return view('characters.delete')->with('character',$character);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::find($id);

        if(is_null($character)) {
            Session::flash('error','Character ' . $id . ' not found');
            return redirect('/characters');
        }

        // Get the number of relationships
        // this character is in
        $relationshipCount = $character->relationship_count;

        /**
         * Delete the character
         * This will also delete any
         * associated relationships
         * since they are set to
         * cascade on delete and it's
         * a one-to-one relationship
         */
        $character->delete();

        Session::flash('success', $character->full_name .       
            ($relationshipCount ?
            // There are relationships
                ($relationshipCount == 1 
                    // There's only one relationship
                    ? ' and one relationship were deleted.'
                    // There's more than one relationship
                    : ' and ' . $relationshipCount . ' relationships were deleted.') 
            // There are no relationships
            : ' was deleted.'
            ));

        return redirect('/characters');
    }

    /**
     * Show a random character
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $id = Character::inRandomOrder()->pluck('id')->first();
        return redirect()->route('characters.show',['id' => $id,'random' => true]);
    }
}
