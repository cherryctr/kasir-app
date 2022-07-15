<?php
namespace App\Http\Controllers\API;
use App\Models\Makanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Auth;
use Validator;


class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        //
        $makanan = Makanan::all();
        if($makanan){
            return response()->json($makanan);
        }else {
            return response()->json(['error' => 'data gagal'],401);
        
        }
    }

     public function getKategori()
    {
        //
        $makanan = Makanan::all();
        $makananQ  = $makanan->unique(['kategori_makanan']);
        if($makananQ){
            return response()->json($makananQ);
        }else {
            return response()->json(['error' => 'data gagal'],401);
        
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $makanan = new Makanan;
        $validator = Validator::make($request->all(),[
            'gambar_makanan' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'nama_makanan' => 'required|string|max:255',
            'kode_makanan' => 'required|int|max:10',
            'harga_makanan' => 'required|int|max:10',
            'kategori_makanan' => 'required|int|max:100',
            
        ]);

          
      

        // $filename="";
        // if($request->hasFile('image'))
        // {
        //     $filename = $request->file('image')->store('image','public');
        // }else {
        //     $filename = Null;
        // }

        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->kode_makanan = $request->kode_makanan;
        $makanan->harga_makanan = $request->harga_makanan;
        $makanan->kategori_makanan = $request->kategori_makanan;
        $makanan->gambar_makanan = $request->gambar_makanan;

        if ($request->hasFile('gambar_makanan')) {
            // $post->delete_image();
            $gambar_makanan = $request->file('gambar_makanan');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar_makanan->getClientOriginalName();
            $gambar_makanan->move('img', $name);
            $makanan->gambar_makanan = $name;
        }

        $result = $makanan->save();
        if($result){
            return response()->json(['success' => true ]);
        }else {
            return response()->json(['success' => false ]);
        
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function show(Makanan $makanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Makanan $makanan,$id)
    {
        //
        $makanan = Makanan::findOrFail($id);
        if($makanan){
            return response()->json($makanan);
        }else {
            return response()->json(['error' => 'data gagal'],401);
        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makanan $makanan,$id)
    {
        //
        $makanan = Makanan::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'gambar_makanan' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'nama_makanan' => 'required|string|max:255',
            'kode_makanan' => 'required|int|max:10',
            'harga_makanan' => 'required|int|max:10',
            'kategori_makanan' => 'required|int|max:100',
            
        ]);

          
      

        // $filename="";
        // if($request->hasFile('image'))
        // {
        //     $filename = $request->file('image')->store('image','public');
        // }else {
        //     $filename = Null;
        // }
       
       

        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->kode_makanan = $request->kode_makanan;
        $makanan->harga_makanan = $request->harga_makanan;
        $makanan->kategori_makanan = $request->kategori_makanan;
        $makanan->gambar_makanan = $request->gambar_makanan;
        if ($request->hasFile('gambar_makanan')) {
            // $post->delete_image();
            $gambar_makanan = $request->file('gambar_makanan');
            // echo $photo_profile;exit;
            $name = rand(1000, 9999) . $gambar_makanan->getClientOriginalName();
            $gambar_makanan->move('img', $name);
            $makanan->gambar_makanan = $name;
        }
       

        $result = $makanan->save();
        if($result){
            return response()->json(['success' => true ]);
        }else {
            return response()->json(['success' => false ]);
        
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Makanan $makanan,$id)
    {
        //
        $makanan = Makanan::findOrFail($id);
        $result = $makanan->delete();
        if($result){
            return response()->json(['success' => true ]);
        }else {
            return response()->json(['success' => false ]);
        
        }
    }
}
