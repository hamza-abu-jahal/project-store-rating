<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;


class PublicController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return response()->view('public-page.public', ['category' => $data]);
    }

    // public function indexStores()
    // {
    //     $data = Store::where('store_category_id',  request('category'))->get();

    //     if (!empty($data->toArray())) {
    //         foreach ($data  as $datastore) {
    //             $img_link = Storage::url($datastore->path);
    //             $datastore->path = $img_link;
    //         }
    //         return response()->view('public-page.public-stores', ['item' => $data]);
    //     } else {
    //         session()->flash('found');
    //         return redirect()->back();
    //     }
    // }


    public function indexStores()
    {
        $paginat = 3;
        $data = Store::where('store_category_id',  request('category'))->paginate($paginat);
        $data2 = Category::all();
        if ($data->total()) {
            foreach ($data  as $datastore) {
                $img_link = Storage::url($datastore->path);
                $datastore->path = $img_link;
            }
            return response()->view('public-page.public-stores', ['item' => $data, 'item2' => $data2]);
        } else {
            session()->flash('found');
            return redirect()->back();
        }
    }

    public function infoStores(Store $store)
    {
        $id = $store->id;
        $data = Store::where('id', $id)->get()->first();
        $img_link = Storage::url($data->path);
        $data->path = $img_link;
        return response()->view('public-page.public-info-store', ['store' => $data]);
    }


    public function search_store_public(Request $request)
    {
        $request->validate([
            'table_search' => 'required'
        ]);

        $paginat = 5;
        $value_search = $request->input('table_search');
        $store = Store::where('name', 'LIKE', '%' . $value_search . '%')->paginate($paginat);
        foreach ($store  as $datastore) {
            $img_link = Storage::url($datastore->path);
            $datastore->path = $img_link;
        }
        if ($store->total()) {
            return response()->view('public-page.public-stores', ['item' => $store]);
        } else {
            session()->flash('messageSearchValue');
            return redirect()->back();
        }
    }
}
