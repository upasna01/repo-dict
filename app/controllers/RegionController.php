<?php
class RegionController extends BaseController
{
    /*
     * Display Region
     */
    public function index()
    {
        $regions=Region::paginate(10);
        return View::make('region.index',compact('regions'));
    }

    /*
     * Create Region
     */
    public function create()
    {
        return View::make('region.create');
    }
    /*
     * Store Region
     */
    public function store()
    {
        $input=Input::all();

        Region::create($input);
        return  Redirect::to('region');

    }
    /*
     * Edit Region
     */
    public function edit($id)
    {
        $region=Region::find($id);
        if(is_null($region))
        {
            return Redirect::route('region.index');
        }
        return View::make('region.edit')->withRegion($region);
    }

    /*
     * Update Region
     */
    public function update($id)
    {
        $input = Input::all();
        $validation = Validator::make($input,Region::$rules);
        if ($validation->passes())
        {
            $user = Region::find($id);
            $user->update($input);

            return Redirect::route('region.index', $id);
        }
        return Redirect::route('region.index', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }
    /*
     * Delete Region
     */
    public function destroy($id)
    {
        Region::find($id)->delete();
        return Redirect::route('region.index');
    }
}