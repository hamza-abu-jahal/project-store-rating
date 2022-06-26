<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Store::all();
        foreach ($data  as $datastore) {
            $img_link = Storage::url($datastore->path);
            $datastore->path = $img_link;
        }
        return response()->view('dashboard.store.index', ['stores' => $data]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return response()->view('dashboard.store.create', ['storeCategories' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name-store' => 'required',
            'address-store' => 'required',
            'phone-store' => 'required',
            'category-store' => 'required',
            'image-store' => 'required|image',
        ], [
            'name-store.required' => 'Enter Name Store Please ... !',
            'address-store.required' => 'Enter Address Store Please ... !',
            'phone-store.required' => 'Enter Phone Number Store Please ... !',
            'category-store.required' => 'Enter Category Store Please ... !',
            'image-store.required' => 'Enter Image Store Please ... !',
        ]);


        $image = $request->file('image-store');
        $path = 'store_images';
        $name =  time() + rand(1, 100000000) . '.' . $image->getClientOriginalExtension();
        Storage::disk('local')->put($path . $name, file_get_contents($image));


        $store = new Store();
        $store->name = $request->input('name-store');
        $store->title = $request->input('address-store');
        $store->mobile = $request->input('phone-store');
        $store->store_category_id = $request->input('category-store');
        $store->path = $path . $name;
        $isSaved = $store->save();
        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $img_link = Storage::url($store->path);
        $store->path = $img_link;
        $infoCatrgoris = Category::all();
        return response()->view('dashboard.store.edit', ['stores' => $store, 'infoCatrgory' => $infoCatrgoris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name-store' => 'required',
            'address-store' => 'required',
            'phone-store' => 'required',
            'category-store' => 'required',
            //'image-store' => 'required|image',
        ], [
            'name-store.required' => 'Enter Name Store Please ... !',
            'address-store.required' => 'Enter Address Store Please ... !',
            'phone-store.required' => 'Enter Phone Number Store Please ... !',
            'category-store.required' => 'Enter Category Store Please ... !',
            //'image-store.required' => 'Enter Image Store Please ... !',
        ]);

        if ($request->hasFile('image-store')) {
            $image = $request->file('image-store');
            $path = 'store_images';
            $oldName = $store->path;
            Storage::delete($oldName);
            $newName =  time() + rand(1, 100000000) . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put($path . $newName, file_get_contents($image));

            $store->path = $path . $newName;
        }


        $store->name = $request->input('name-store');
        $store->title = $request->input('address-store');
        $store->mobile = $request->input('phone-store');
        $store->store_category_id = $request->input('category-store');
        $isSaved = $store->save();
        session()->flash('message', $isSaved ? 'Store Updated' : 'Store Update Failed');
        session()->flash('status', $isSaved);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $isDeleted = $store->delete();
        return redirect()->back();
    }

    public function search_Store(Request $request)
    {
        $request->validate([
            'table_search' => 'required'
        ]);

        $paginat = 5;
        $value_search = $request->input('table_search');
        $store = Store::where('name', 'LIKE', '%' . $value_search . '%')->paginate($paginat);

        if ($store->total()) {
            return response()->view('dashboard.home.allDataTable', ['allData' => $store]);
        } else {
            session()->flash('messageSearch');
            return redirect()->back();
        }
    }


    public function indexAll(Request $request)
    {
        $paginat = 5;
        $data = Store::paginate($paginat);
        foreach ($data  as $datastore) {
            $img_link = Storage::url($datastore->path);
            $datastore->path = $img_link;
        }
        return response()->view('dashboard.home.allDataTable', ['allData' => $data]);
    }
}
