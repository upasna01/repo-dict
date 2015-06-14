<?php

 class ZoneController extends BaseController
 {
     /*
    * Display Zone
    */
     public function index()
     {
         $zones=Zone::paginate(10);
         return View::make('zone.index',compact('zones'));
     }
     /*
      * Create Zone
      */
     public function create()
     {
         return View::make('zone.create');
     }
     /*
     * Zone edit
     */
     public function edit($id)
     {
         $zone=Zone::find($id);
         if(is_null($zone))
         {
             return Redirect::route('zone.index');
         }
         return View::make('zone.edit',compact('zone'));
     }
     /*
      * Store Zone
      */
     public function store()
     {
         $input=Input::all();

         Zone::create($input);
         return  Redirect::to('zone');

     }


     /*
      * Update Zone
      */
     public function update($id)
     {
         $input = Input::all();

             $user = Zone::find($id);
             $user->update($input);

             return Redirect::route('zone.index', $id);


     }
     /*
      * Delete Zone
      */
     public function destroy($id)
     {
         Zone::find($id)->delete();
         return Redirect::route('zone.index');
     }


 }
?>