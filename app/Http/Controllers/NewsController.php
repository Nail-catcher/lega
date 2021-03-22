<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Helpers\ImageSaver;
class NewsController extends Controller
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

        $news = News::paginate(15);
        return view('admin.news.index', compact('news'));
    }
    public function event()
    {
       $news = News::paginate(15);
        return view('event', compact('news'));
    }
    public function eventshow(News $news)
    {
        if ($news->image) {
                    $url = url('storage/catalog/news/image/' . $news->image);
                    // $url = Storage::disk('public')->url('catalog/new/image/' . $new->image);
                } else {
                    // $url = url('storage/catalog/new/image/default.jpg');
                    $url = Storage::disk('public')->url('catalog/news/image/default.jpg');
                }

        return view('eventshow', [
           
      'news'   => $news,
      'url' => $url]);
    }
    /**
     * Show the form for crnewing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly crnewed resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        
        $data['image'] = $this->imageSaver->upload($request, null, 'news');
        $news = News::create($data);
        
        return redirect()
            ->route('news.show', ['news' => $news->id])
            ->with('success', 'Новая категория успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\new  $new
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        
        if ($news->image) {
                    $url = url('storage/catalog/news/image/' . $news->image);
                    // $url = Storage::disk('public')->url('catalog/new/image/' . $new->image);
                } else {
                    // $url = url('storage/catalog/new/image/default.jpg');
                    $url = Storage::disk('public')->url('catalog/news/image/default.jpg');
                }

        return view('admin.news.show', [
           
      'news'   => $news,
      'url' => $url]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\new  $new
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit',[
            
      'news'   => $news
      ]);       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\new  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
       $data=$request->all();
       $data['image']=$this->imageSaver->upload($request,$news,'news');
       $news->update($data);
       return redirect()
            ->route('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\new  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {   
        
       $this->imageSaver->remove($news, 'news');
      
        $news->delete();
        return redirect()
            ->route('news');
               }
}
