<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     *アップロード画面
     */
    public function create()
    {
        return view("photos/create");
    }

    // アップロード処理
    public function store(Request $request)
    {
        $saveFilePath = $request -> file("image") -> store("photos", "public");
        Log::debug($saveFilePath);
        $fileName = pathinfo($saveFilePath, PATHINFO_BASENAME);
        Log::debug($fileName);
        return to_route("photos.show", ["photo" => $fileName]) -> with("success", "アップロードが完了しました");
    }


    public function show($fileName)
    {
        return view("photos.show", ["fileName" => $fileName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($fileName)
    {
        Storage::disk("public") -> delete("photos/".$fileName);
        return to_route("photos.create") -> with("success", "削除しました");
    }

    public function download($fileName)
    {
        return Storage::disk("public") -> download("photos/".$fileName, "アップロード.jpg");
    }
}
