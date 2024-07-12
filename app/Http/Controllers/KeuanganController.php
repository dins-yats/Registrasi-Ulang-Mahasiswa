<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category;
use Auth;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // $keyword = $request->keyword;
        // return view('dashboard.keuangan.index',[
        //     'posts' =>post::Where('nama', 'LIKE', '%'.$keyword.'%') 
        //     // 'posts' =>post::where('user_id', auth()->user()->id)->get()
        // ]);
        $keyword = $request->keyword;
            return view('dashboard.keuangan.index', [
                'posts' =>post::with('category')
                ->Where('nama', 'LIKE', '%'.$keyword.'%')
                ->orWhere('SEMESTER', 'LIKE', '%'.$keyword.'%')
                ->orWhere('NIM', 'LIKE', '%'.$keyword.'%')
                ->orWhere('status_pembayaran', 'LIKE', '%'.$keyword.'%')
                ->orWhere('status_registrasi', 'LIKE', '%'.$keyword.'%')
                ->orWhereHas('category',function($query) use($keyword) {
                    $query->where('name', 'LIKE', '%'.$keyword.'%');
                })
                ->paginate(20)
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('dashboard.keuangan.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        return view('dashboard.keuangan.edit',[
            'post' => $post,
            'categories' => category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $request->validate([
            'pembayaran'                => 'required|max:255',
            'status_pembayaran'         => 'required|max:255',
            // 'status_bayar'         => 'required|max:255',
            'jenis_bayar'         => 'required|max:255',
            'tanggal_pembayaran'         => 'required|max:255',
            'sisa'         => 'required|max:255',
            'bts_tgl'         => 'required|max:255',
            'image'         => 'image|file|max:2255',
            // 'image'         => 'mimes:jpg,jpeg,png',
            'status_registrasi'         => 'required|max:255',
        ]);


        // $image = $request->file('image');
        // $nama_images = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
        // $image->move('image/',$nama_images);

        // $file_name = $request->image->getClientOriginalName();
        // $image = $request->image->move('bukti/', $file_name);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('buktikan/', $file_name);



        // $image = $request->file('bukti');
        // $file_name = $request->image->getClientOriginalName();
        // $image = $request->image->move('bukti/', $file_name);


        $pembayaran          = $request->pembayaran;
        $status_pembayaran   = $request->status_pembayaran;
        $tanggal_pembayaran   = $request->tanggal_pembayaran;
        $jenis_bayar        = $request->jenis_bayar;
        $sisa               = $request->sisa;
        $bts_tgl            = $request->bts_tgl;
        $image              = $image;
        $status_registrasi   = $request->status_registrasi;
       

        $data = post::find($post->id);
        $data->pembayaran           = $pembayaran;
        $data->status_pembayaran    = $status_pembayaran;
        $data->tanggal_pembayaran    = $tanggal_pembayaran;
        $data->jenis_bayar    = $jenis_bayar;
        $data->sisa    = $sisa;
        $data->bts_tgl    = $bts_tgl;
        $data->image    = $image;
        $data->status_registrasi    = $status_registrasi;
        $data->save();

        return redirect('/dashboard/keuangan')->with('success', 'Data Mahasiswa Telah berhasil di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }

    
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->nama);
        return response()->json(['slug' =>$slug]);
    }
}
