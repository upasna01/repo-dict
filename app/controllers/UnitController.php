<?php

class UnitController extends BaseController{

    /**
     * Display a list of Unit in storage.
     *
     */
    public function index()
    {
        $units=Unit::paginate(20);
        return View::make('unit.index',compact('units'));
    }

    /*
     * Create Unit
     */
    public function create()
    {
        return View::make('unit.create');
    }

    /*
     * Store Unit
     */
    public function store()
    {
        $input=Input::all();
        // $validation=Validator::make($input,Program::$rules);
         //if ($validation->passes())
        //{
        Unit::create($input);
        return  Redirect::to('unit');
         /*}
        else
        {
            Redirect::route ('unit.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message','could not create program');
        }*/
    }
    /**
     * Edit a created unit in storage.
     *
     */
    public function edit($id)
    {
       // echo "hello".$id;
        $unit=Unit::find($id);
        if(is_null($unit))
        {
            return Redirect::route('unit.index');
        }
        return View::make('unit.edit',compact('unit'));
    }
    /**
     * Update a created units in storage.
     *
     */
    public function update($id)
    {
        $input = Input::all();
       // $validation = Validator::make($input,Unit::$rules);
        //if ($validation->passes())
        //{
        $unit = Unit::find($id);
        $unit->update($input);

            return Redirect::route('unit.index', $id);
       /* }
        return Redirect::route('unit.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        Unit::find($id)->delete();
        return Redirect::route('unit.index');
    }



}