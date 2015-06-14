<?php

class ProductController extends BaseController
{
    /**
     * Display a list of Product in storage.
     *
     */
    public function index()
    {
        $products= DB::table('product')
            ->join('program','product.program_id','=','program.id')
            ->join('unit','unit.id','=','product.unit_id')
            ->select('product.id','product.name','product.program_id','product.unit_id','program.name as prog_name','unit.name as unit_name','product.monthly_receive','product.monthly_outlet','product.monthly_expired','product.remarks')
            ->get();
        return View::make('product.index',compact('products'));


    }
    /*
    * Create Products
    */
    public function create()
    {
        return View::make('product.create');
    }

    /*
     * Store Product
     */
    public function store()
    {
        $input=Input::all();
        // $validation=Validator::make($input,Program::$rules);
        //if ($validation->passes())
        //{
        Product::create($input);
        return  Redirect::to('product');
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
        $product=Product::find($id);
        if(is_null($product))
        {
            return Redirect::route('product');
        }
        return View::make('product.edit',compact('product'));
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
        $product = Product::find($id);
        $product->update($input);

        return Redirect::route('product.index', $id);
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
        Product::find($id)->delete();
        return Redirect::route('product.index');
    }

}