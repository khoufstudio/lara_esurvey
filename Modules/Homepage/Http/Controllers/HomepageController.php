<?php

namespace Modules\Homepage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
// use Modules\Berita\Entities\Berita;
// use Modules\Berita\Entities\Comment;
// use GuzzleHttp\Client;

use Illuminate\Support\Facades\DB;



class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // $client = new Client([
        //     'exceptions' => false, 
        //     'CURLOPT_SSL_VERIFYPEER' => false, 
        //     'CURLOPT_SSL_VERIFYHOST' => false
        //     'base_uri'  => 'http://localhost:8000'
        // ]);
        
        // $response = $client->request('GET', '/api/blogs');
        // echo $response->getStatusCode(); # 200
        // echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
        // echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

        return view('homepage::index');
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('homepage::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        // return view('homepage::baca')->with('berita', $berita)->with('comments', DB::table('comments')->where('id_berita', '=', $id)->get());
        return view('homepage::baca')->with('berita', $berita)->with('comments', Berita::findOrFail($id)->comments);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('homepage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
