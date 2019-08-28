<?php

namespace Modules\FileUpload\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use Modules\FileUpload\Entities\FileUpload;
use Modules\FileCategory\Entities\FileCategory;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    use ValidatesRequests;
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(get_role(Auth::user()->id_user_group) != 'FALSE'){
            $role = get_role(Auth::user()->id_user_group);
            return view('fileupload::index')
                        ->with('file_uploads', FileUpload::with('file_categories')->get())
                        ->with('categories', FileCategory::all())
                        ->with('role', $role);
        
        }else{
            return redirect('forbidden');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('fileupload::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file_name' => 'required|max:100',
            'file' => 'required|max:5000|mimes:pdf',
            'id_kategori' => 'required|max:10',
        ]);

        $uploadedFile = $request->file('file');        
        $path = $uploadedFile->store('public/files');
        $file = FileUpload::create([
            'file_name' => $request->file_name ?? $uploadedFile->getClientOriginalName(),
            'path' => $path,
            'file_desc' => $request->file_desc,
            'id_kategori'   => $request->id_kategori,
            'create_author' => Auth::user()->name
        ]);
        
        Session::flash('success', 'File Berhasil di Upload');
        return redirect()->back();
            
            
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('fileupload::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $file = FileUpload::findOrFail($id);
        return response()->json($file);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $file = FileUpload::findOrFail($id);

        $this->validate($request, [
            'file_name' => 'required|max:100',
            'file' => 'required|max:5000|mimes:pdf',
            'id_kategori' => 'required|max:10',
        ]);


        if($request->hasFile('file')){
            if(file_exists($file->path)){
                Storage::delete($file->path);
            }
    
            $uploadedFile = $request->file('file');        
            $path = $uploadedFile->store('public/files');


        }

        $file->file_name = $request->file_name ?? $uploadedFile->getClientOriginalName();
        $file->path = $path;

        $file->file_desc = $request->file_desc;
        $file->id_kategori   = $request->id_kategori;
        $file->create_author = Auth::user()->name;
        $file->save();

        Session::flash('success', 'File Berhasil Di Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $file = FileUpload::findOrFail($id);

        Storage::delete($file->path);
        $file->delete();

        Session::flash('success', 'File Berhasil di Hapus');
        return redirect()->back();
    }
}
