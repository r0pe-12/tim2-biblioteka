<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view('settings.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('settings.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'nazivKategorije' => ['required', 'string', 'max:255'],
            'opisKategorije' => ['max:60000'],
            'photoPath' => []
        ]);

        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/categories', $name);
            $input['photoPath'] = $name;
        } else{
            $input['photoPath'] = null;
        }

        $category = new Category([

            'name' => $input['nazivKategorije'],
            'description' => $input['opisKategorije'],
            'iconPath' => $input['photoPath']

        ]);

        $category->save();
        return redirect()->route('category.index')->with('success', 'Nova kategorija "' . $category->name . '" je uspješno kreirana');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        //
        return view('settings.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        //
        $input = $request->validate([

            'nazivKategorijeEdit' => ['required', 'string', 'max:255'],
            'opisKategorijeEdit' => ['max:60000'],
            'photoPath' => []

        ]);

        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/categories', $name);
            $input['photoPath'] = $name;

            if (file_exists($iconPath = public_path() . $category->iconPath)){
                unlink($iconPath);
            }
            $category->iconPath = $input['photoPath'];
        }

        $category->name = $request->nazivKategorijeEdit;
        $category->description = $request->opisKategorijeEdit;

        if ($category->isClean()){
//            if category name is unchanged we throw form validation error
            throw ValidationException::withMessages([
                'nazivKategorije' => 'Polje je nepromijenjeno'
            ]);
        }

        $category->save();
        return redirect()->route('category.index')->with('success', 'Kategorija "' . $category->name . '" uspješno izmijenjena');



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        //
        $photo = $category->iconPath;

        try {
            $category->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje kategorije "' . $category->name . '" nije moguće');
        }

        if (file_exists($iconPath = public_path() . $photo)){
            unlink($iconPath);
        }
        return redirect()->route('category.index')->with('success', 'Kategorija "' . $category->name . '" je uspješno obrisana');
    }


    /**
     * Remove the specified resourceS from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDelete()
    {
//        $names = [];
        $ids = explode(',', request('ids'));
        $categories = Category::whereIn('id', $ids);

        $photos = [];
//        we will get all photopaths from categories
        foreach ($categories->get() as $category){
            $photos[] = $category->iconPath;
        }

//        we will try to delete categories
        try {
            $categories->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje kategorija nije moguće');
        }
//        if we delete them we will delete photos from storage
        foreach ($photos as $photo){
            if (file_exists($photoPath = public_path() . $photo)){
                unlink($photoPath);
            }
        }
        return redirect()->route('category.index')->with('success', 'Kategorije su uspješno izbrisane');
    }

}
