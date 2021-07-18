<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Helpers\ImageSaver;
use App\Category;
use App\Http\Requests\CategoryCatalogRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::paginate(15);

       return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, null, 'category');
        $category = Category::create($data);
        return redirect()
            ->route('category.show', ['category' => $category->id])
            ->with('success', 'Новая категория успешно создана');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
         if ($category->image) {
                    $url = url('storage/catalog/category/image/' . $category->image);
                    // $url = Storage::disk('public')->url('catalog/category/image/' . $category->image);
                } else {
                    // $url = url('storage/catalog/category/image/default.jpg');
                    $url = Storage::disk('public')->url('catalog/category/image/default.jpg');
                }
        return view('admin.category.show', [
      'category'   => $category,
      'url' => $url,]
  );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
          
        $id = $category->id;
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
            $old = $category->image;
            if ($old) {
                Storage::disk('public')->delete('catalog/category/source/' . $old);
            }
        }
        $file = $request->file('image');
        if ($file) { // был загружен файл изображения
            $path = $file->store('catalog/category/source', 'public');
            $base = basename($path);
            // удаляем старый файл изображения
            $old = $category->image;
            if ($old) {
                Storage::disk('public')->delete('catalog/category/source/' . $old);
            }
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        $category->update($data);
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Категория была успешно исправлена');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
        
        $this->imageSaver->remove($category, 'category');
        $category->path_eats()->detach();
        
        $category->delete();
        return redirect()
            ->route('category');
    }
    
}
