<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\CreateRequest;
use App\Http\Requests\categories\UpdateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(5);


        return view('admin.categories.index', [
            'categoriesList' => $categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        $data = $request->validated();

        $created = Category::create($data);

        if($created){
            $created->fill($request->input());
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успещно добавлена');
        }

        return back()->with('error', 'Не удалось добавить категорию')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return 'Отобразить категорию';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return Response
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit', [
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param  Category $category
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $data = $request->validated();

        $updated = $category->fill($data)->save();

        if($updated){
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.updated.success'));
        }
        return back()->with('error', __('messages.admin.categories.updated.error'))
            ->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return response()->json('ok');
        }catch (\Exception $e) {
            \Log::error('Catalog error destroy', [$e]);
            return response()->json('error', 400);
        }
    }
}
