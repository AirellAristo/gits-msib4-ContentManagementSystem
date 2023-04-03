<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModels;
use App\Models\categoriesModel;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    // Digunakan untuk menampilkan data
    public function data(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        return view("admin.editHapus",compact("dataProduk"));
    }

    public function indexAdmin(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        return view("admin.productViewAdmin",compact("dataProduk"));
    }

    public function create(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        $categories = categoriesModel::all();
        return view("admin.tambah",compact("dataProduk","categories"));
    }

    public function gudang(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        return view("templating.product",compact("dataProduk"));
    }

    public function edit($id){
        $find = productModels::find($id);
        $categories = categoriesModel::all();
        return view('admin.edit',compact("find","categories"));
    }
    // END Digunakan untuk menampilkan data

    // Digunakan buat nambahin data
    public function store(Request $request){
        $validatedData = $request->validate([ //digunakan buat validasi
            'nama_produk' => 'required|string|max:30|unique:product_models,nama_produk',
            'harga_produk' => 'required|integer',
            'gambar_produk' => 'required|image',
            'ID_kategori' => 'required|integer'
        ]);
        if($request->file('gambar_produk')){
            $validatedData['gambar_produk'] = $request->file('gambar_produk')->storeAs('fotoProduk',$validatedData['nama_produk'].'.jpg');
        }
        productModels::create($validatedData);
        return redirect("/admin")->with("success");
    }
    // END Digunakan buat nambahin data

    // Digunakan buat update data
    public function update($id , Request $request){
        $dataProduk=DB::table('product_models')
                    ->select('nama_produk')
                    ->where('ID_produk',$id)
                    ->get();
        $fotoProduk=DB::table('product_models')
                    ->select('gambar_produk')
                    ->where('ID_produk',$id)
                    ->get();
        $rules = [ //aturan validasi
            'harga_produk' => 'required|integer',
            'ID_kategori' => 'required|integer',
            'gambar_produk' => 'nullable|image'
        ];

        //apakah terdapat nama produk yang sama?
        if (productModels::where('nama_produk', '=', $request->nama_produk)->count() > 0) {
            //Jika iya disini dibuat query dengan mengambil nama produk berdasarkan request id
            // DAN cek apakah nama produk sama dengan request
            if($dataProduk[0]->nama_produk == $request->nama_produk){
                $rules['nama_produk'] = 'required|string|max:30|';
            }else{
                $rules['nama_produk'] = 'required|string|max:30|unique:product_models,nama_produk';
            }
        }else{
            $rules['nama_produk'] = 'required|string|max:30|unique:product_models,nama_produk';
        }


        $validatedData = $request->validate($rules);

        //update khusus pengecekan jika gambar ada isinya
        $path = 'storage/'.$fotoProduk[0]->gambar_produk;
        if($request->hasFile('gambar_produk')){//jika terdapat file di gambar_produk, maka
            if (Storage::exists('fotoProduk/nama_file.jpg')){//di cek lagi untuk menghindari error, jika file ada maka
                unlink($path);//hapus file berdasarkan variable path diatas
            }
            //upload file ke folder fotoProduk dengan nama yang diambil dari inputan user
            $validatedData['gambar_produk'] = $request->file('gambar_produk')->storeAs('fotoProduk',$request->nama_produk.'.jpg');
        }else{
            rename($path,'storage/fotoProduk/'.$request->nama_produk.'.jpg');
            $validatedData['gambar_produk'] = 'fotoProduk/'.$request->nama_produk.'.jpg';
        }

        //END update khusus pengecekan jika gambar ada isinya

        productModels::where('ID_produk',$id)
                         ->update($validatedData);
        return redirect("/admin/editHapus");
    }
    // END Digunakan buat update data

    // Digunakan untuk menghapus data
    public function destroy($id){
        $find = productModels::find($id);
        unlink('storage/'.$find->gambar_produk);
        $find->delete();
        return redirect("/admin/editHapus");
    }
    // END Digunakan untuk menghapus data
}
