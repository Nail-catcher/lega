<?php

namespace App\Http\Controllers;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Eat;
use App\Path_eat;
use App\Category;

use Illuminate\Http\Request;

class EatController extends Controller
{
    private $imageSaver;

    public function __construct(ImageSaver $imageSaver) {
        $this->imageSaver = $imageSaver;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $eats = Eat::paginate(15);
        return view('admin.eat.index', compact('eats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Category::all();
        $path_eats = Path_eat::all();
        return view('admin.eat.create', compact('items', 'path_eats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        
        $data['image'] = $this->imageSaver->upload($request, null, 'eat');
        $eat = Eat::create($data);
        if($request->path_eats){
        foreach ($request->path_eats as $path_eat){
        $eat->path_eats()->attach($path_eat);}}
        if($request->underitems){
        foreach ($request->underitems as $underitem){
        $eat->underitems()->attach($underitem);}}
        return redirect()
            ->route('eat.show', ['eat' => $eat->id])
            ->with('success', 'Новая категория успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eat  $eat
     * @return \Illuminate\Http\Response
     */
    public function show(Eat $eat)
    {
        $getcat=Category::where('id',$eat->cat_id)->first();
        if ($eat->image) {
                    $url = url('storage/catalog/eat/image/' . $eat->image);
                    // $url = Storage::disk('public')->url('catalog/eat/image/' . $eat->image);
                } else {
                    // $url = url('storage/catalog/eat/image/default.jpg');
                    $url = Storage::disk('public')->url('catalog/eat/image/default.jpg');
                }

        return view('admin.eat.show', [
            'getcat'=>$getcat,
      'eat'   => $eat,
      'url' => $url]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eat  $eat
     * @return \Illuminate\Http\Response
     */
    public function edit(Eat $eat)
    {
        return view('admin.eat.edit',[
            
      'eat'   => $eat
      ]);   
         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eat  $eat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eat $eat)
    {
        $data = $request->all();
        $eat->update($data);
        return redirect()
            ->route('eat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eat  $eat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eat $eat)
    {   
        
       $this->imageSaver->remove($eat, 'eat');
      $eat->path_eats()->detach();
       $eat->underitems()->detach();
       $eat->baskets()->detach();
        $eat->delete();

        return redirect()
            ->route('eat');
    }
   
}
