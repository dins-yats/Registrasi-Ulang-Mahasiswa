<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Auth;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $keyword = $request->keyword;
        return view('dashboard.posts.index', [
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
        return view('dashboard.posts.create',[
            'categories' => category::all()
        ]);
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
            'nama'                   => 'required|max:255',
            'SEMESTER'               => 'required',
            'NIM'                    => 'required',
            'alamat'                    => 'required',
            'tahun_akademik'               => 'required',
            'no_hp'                  => 'required',
            // 'pembayaran'             => 'required',
            // 'status_pembayaran'      => 'required',
            // 'status_registrasi'      => 'required',
            'slug'                   => 'required',
            'category_id'            => 'required',
        ]);

        $nama                  = $request->nama;
        $SEMESTER              = $request->SEMESTER;
        $alamat              = $request->alamat;
        $NIM                   = $request->NIM;
        $tahun_akademik                   = $request->tahun_akademik;
        $no_hp                 = $request->no_hp;
        // $pembayaran            = $request->pembayaran;
        // $status_pembayaran     = $request->status_pembayaran;
        // $status_registrasi     = $request->status_registrasi;
        $slug                  = $request->slug;
        $category_id           = $request->category_id;


        $data = new post();
        $data->user_id                  = Auth::id();
        $data->nama                     = $nama;
        $data->SEMESTER                 = $SEMESTER;
        $data->alamat                 = $alamat;
        $data->NIM                      = $NIM;
        $data->tahun_akademik                      = $tahun_akademik;
        $data->no_hp                    = $no_hp;
        $data->pembayaran               =  '';
        $data->status_pembayaran        =  '';
        $data->status_registrasi        = '';
        $data->jenis_bayar              = '';
        $data->slug                     = $slug;
        $data->category_id              = $category_id;
        $data->tanggal_pembayaran              = '';
        $data->bts_tgl              = '';
        $data->sisa              = '';
        $data->save();

        return redirect('/dashboard/posts')->with('success', 'Data Mahasiswa telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show',[
             'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit',[
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
    public function update(Request $request, post $post)
    {

        $request->validate([
            'nama'         => 'required|max:255',
            'NIM'         => 'required|max:255',
            'SEMESTER'         => 'required|max:255',
        ]);


        $SEMESTER   = $request->SEMESTER;
        $nama   = $request->nama;
        $NIM   = $request->NIM;
       

        $data = post::find($post->id);
        $data->nama  = $nama;
        $data->SEMESTER  = $SEMESTER;
        $data->NIM  = $NIM;
        $data->save();

        return redirect('/dashboard/posts')->with('success', 'Data Mahasiswa Telah berhasil di Update');

    //     $rules = ([
    //         'title'         => 'required|max:255',
    //         // 'slug'          => 'required|unique:post',
    //         'category_id'   => 'required',
    //         'body'          => 'required',
    //     ]);

    //     if($request->slug != $post->slug) {
    //         $rules['slug'] = 'required|unique:post';
    //     }

    //    $validatedData =  $request->validate($rules);

    //    $validatedData['user_id'] = auth()->user()->id;
    //    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

    //    post::where('id', $post->id)
    //         ->update($validatedData);

            // return redirect('/dashboard/posts')->with('success', 'Post Telah berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }   
        post::destroy($post->id); 
        return redirect('/dashboard/posts')->with('success', 'Data Mahasiswa telah dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->nama);
        return response()->json(['slug' =>$slug]);
    }
}
