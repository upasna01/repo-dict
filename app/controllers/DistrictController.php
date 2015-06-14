<?php
class DistrictController extends BaseController
{
     /*
     * Add District
     */
    public function index()
    {
        $districts=DB::table('district')
            ->join('region','district.id','=','region.id')
            ->select('district','region','region.region as region_name')
            ->get();

        $districts=District::paginate(10);
        return View::make('district.index',compact('districts'));
    }


    /**
     * Create a user in storage.
     *
     */
    public function create()
    {
        return View::make('district.create');
    }

    /*
    * Store District
    */
    public function store()
    {
        $input=Input::all();

       // $validation = Validator::make($input,District::$rules);
        // if ($validation->passes())
        //{
            $regionlist=District::create($input);
            $region= new region;
            $region->district_id=$regionlist->id;
            $region->region=$regionlist->region_id;
            $region->save();
            return  Redirect::to('district');
        //}

    }

    /*
    * Edit District
    */
    public function edit($id)
    {   $district=District::find($id);

        if(is_null($district))
        {
            return Redirect::to('district.index');
        }
        return View::make('district.edit', compact('district'));

    }

    /*
    * Update District
    */
    public function update($id)
    {
        $input = Input::all();
        //$validation = Validator::make($input,District::$rules);
        //if ($validation->passes())
        //{
            $user = District::find($id);
            $user->update($input);
            return Redirect::route('district.index', $id);
        //}
        return Redirect::route('district.index', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /*
     * Delete the data
     */
    public function destroy($id)
    {
        District::find($id)->delete();
        return Redirect::route('district.index');
    }
}