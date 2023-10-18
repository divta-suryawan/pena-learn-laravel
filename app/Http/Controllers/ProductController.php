<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getAllData()
    {
        $data = ProductModel::all();
        return view('admin.product')->with('data', $data);
    }

    public function createData(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'description' => 'required',
                'product_image' => 'required|mimes:png,jpeg,jpg',
            ],
            [
                'product_name.required' => 'Form product tidak boleh kosong',
                'description.required' => 'Form description tidak boleh kosong',
                'product_image.required' => 'Form image tidak boleh kosong',
                'product_image.mimes' => 'Ekstensi yang diizinkan hanya PNG, JPEG, JPG'
            ]
        );

        if ($validation->fails()) {
            $message = $validation->errors()->all();
            Alert::error('Gagal', $message);
            return redirect()->back();
        };

        $data = new ProductModel();
        $data->product_name = $request->input('product_name');
        $data->description = $request->input('description');
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/product/', $filename);
            $data->product_image = $filename;
        }

        $data->save();

        if ($data) {
            Alert::success('Create data product successfully');
            return back();
        } else {
            Alert::error('Failed to create data product');
            return back();
        }
    }
}
