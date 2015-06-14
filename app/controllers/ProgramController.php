<?php

class ProgramController extends BaseController{

    /**
     * Display a list of Programs in storage.
     *
     */
    public function index()
    {
        $programs=Program::paginate(20);
        return View::make('program.index',compact('programs'));
    }

    /*
     * Create Programs
     */
    public function create()
    {
        return View::make('program.create');
    }

    /*
     * Store programs
     */
    public function store()
    {
        $input=Input::all();
       // $validation=Validator::make($input,Program::$rules);
        //if ($validation->passes())
        //{
            Program::create($input);
           return  Redirect::to('program');
        /*}
        else
        {
            Redirect::route ('program.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message','could not create program');
        }*/
    }
    /**
     * Edit a created user in storage.
     *
     */
    public function edit($id)
    {
        $program=Program::find($id);
        if(is_null($program))
        {
            return Redirect::route('program');
        }
        return View::make('program.edit',compact('program'));
    }
    /**
     * Update a created user in storage.
     *
     */
    public function update($id)
    {
        $input = Input::all();
        //$validation = Validator::make($input,Program::$rules);
        //if ($validation->passes())
        //{
            $program = Program::find($id);
            $program->update($input);

            return Redirect::route('program.index', $id);
        /*}
        return Redirect::route('Program.edit', $id)
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
        Program::find($id)->delete();
        return Redirect::route('program.index');
    }



}