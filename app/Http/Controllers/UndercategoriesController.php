<?php

namespace App\Http\Controllers;

use App\Undercategories;
use Illuminate\Http\Request;
use App\Helpers\ImageSaver;
use App\Http\Requests\CategoryCatalogRequest;
use Illuminate\Support\Facades\Storage;
class UndercategoriesController extends Controller
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
        $undercategories = undercategories::paginate(15);

       return view('admin.undercategory.index', compact('undercategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.undercategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, null, 'undercategory');
        $undercategory = undercategories::create($data);
        return redirect()
            ->route('undercategory.show', ['undercategory' => $undercategory->id])
            ->with('success', 'Новая категория успешно создана');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\undercategory  $undercategory
     * @return \Illuminate\Http\Response
     */
    public function show(undercategories $undercategory)
    {
         if ($undercategory->image) {
                    $url = url('storage/catalog/undercategory/image/' . $undercategory->image);
                    // $url = Storage::disk('public')->url('catalog/undercategory/image/' . $undercategory->image);
                } else {
                    // $url = url('storage/catalog/undercategory/image/default.jpg');
                    $url = Storage::disk('public')->url('catalog/undercategory/image/default.jpg');
                }
        return view('admin.undercategory.show', [
      'undercategory'   => $undercategory,
      'url' => $url,]
  );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\undercategory  $undercategory
     * @return \Illuminate\Http\Response
     */
    public function edit(undercategories $undercategory)
    {
        return view('admin.undercategory.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\undercategory  $undercategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, undercategories $undercategory)
    {
          
        $id = $undercategory->id;
        $this->validate($request, [
            'parent_id' => 'integer',
            'name' => 'required|max:100',
            /*
             * Проверка на уникальность slug, исключая эту категорию по идентифкатору:
             * 1. categories — таблица базы данных, где пороверяется уникальность
             * 2. slug — имя колонки, уникальность значения которой проверяется
             * 3. значение, по которому из проверки исключается запись таблицы БД
             * 4. поле, по которому из проверки исключается запись таблицы БД
             * Для проверки будет использован такой SQL-запрос к базе данныхЖ
             * SELECT COUNT(*) FROM `categories` WHERE `slug` = '...' AND `id` <> 17
             */
            'slug' => 'required|max:100|unique:categories,slug,'.$id.',id|regex:~^[-_a-z0-9]+$~i',
            'image' => 'mimes:jpeg,jpg,png|max:5000'
        ]);
        /*
         * Проверка пройдена, обновляем категорию
         */
        if ($request->remove) { // если надо удалить изображение
            $old = $undercategory->image;
            if ($old) {
                Storage::disk('public')->delete('catalog/undercategory/source/' . $old);
            }
        }
        $file = $request->file('image');
        if ($file) { // был загружен файл изображения
            $path = $file->store('catalog/undercategory/source', 'public');
            $base = basename($path);
            // удаляем старый файл изображения
            $old = $undercategory->image;
            if ($old) {
                Storage::disk('public')->delete('catalog/undercategory/source/' . $old);
            }
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        $undercategory->update($data);
        return redirect()
            ->route('admin.undercategory.show', ['undercategory' => $undercategory->id])
            ->with('success', 'Категория была успешно исправлена');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\undercategory  $undercategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(undercategories $undercategory)
    {
        
        
        $this->imageSaver->remove($undercategory, 'undercategory');
        $undercategory->Eats()->detach();
        $undercategory->delete();
      
        return redirect()
            ->route('undercategory');
    }
    
}
