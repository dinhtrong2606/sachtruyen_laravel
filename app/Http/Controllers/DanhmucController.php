<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = DanhmucTruyen::orderBy('id', 'ASC')->get();
        return view('admincp.danhmuctruyen.index')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuctruyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tendanhmuc' => 'required|unique:danhmuc|max:255|',
                'slugdanhmuc' => 'required|unique:danhmuc|max:255|',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tendanhmuc.required' => 'Vui lòng nhập tên danh mục',
                'mota.required' => 'Vui lòng nhập mô tả',
                'tendanhmuc.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác',
            ]
        );


        $danhmuctruyen = new DanhmucTruyen();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slugdanhmuc = $data['slugdanhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();

        return redirect()->back()->with('status', 'Thêm danh mục truyện thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdanhmuc = DanhmucTruyen::find($id);
        return view('admincp.danhmuctruyen.edit', ['danhmuc' => $editdanhmuc]);
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
        $data = $request->validate(
            [
                'tendanhmuc' => 'required|max:255|min:6',
                'slugdanhmuc' => 'required|max:255|min:6',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tendanhmuc.required' => 'Vui lòng nhập tên danh mục',
                'mota.required' => 'Vui lòng nhập mô tả',
            ]
        );

        $updateDanhmuc = DanhmucTruyen::find($id);
        $updateDanhmuc->tendanhmuc = $data['tendanhmuc'];
        $updateDanhmuc->slugdanhmuc = $data['slugdanhmuc'];
        $updateDanhmuc->mota = $data['mota'];
        $updateDanhmuc->kichhoat = $data['kichhoat'];
        $updateDanhmuc->save();

        return redirect()->back()->with('status', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhmucTruyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục truyện thành công !');
    }
}
