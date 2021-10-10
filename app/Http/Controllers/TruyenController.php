<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Theloai;
use Carbon\Carbon;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = Truyen::with('danhmuctruyen', 'theloai')->orderBy('id', 'ASC')->get();
        return view('admincp.truyen.index')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listdanhmuc = DanhmucTruyen::orderBy('id', 'ASC')->get();
        $listtheloai = Theloai::orderBy('id', 'ASC')->get();
        return view('admincp.truyen.create')->with(compact('listdanhmuc', 'listtheloai'));
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
                'tentruyen' => 'required|unique:truyen|max:255|',
                'slugtruyen' => 'required|unique:truyen|max:255|',
                'tacgia' => 'required|unique:truyen',
                'danhmuc_id' => 'required',
                'theloai_id' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'truyen_noibat' => 'required',
            ],
            [
                'tentruyen.required' => 'Vui lòng nhập tên truyện',
                'slugtruyen.required' => 'Vui lòng nhập slug truyện',
                'tomtat.required' => 'Vui lòng nhập tóm tắt',
                'hinhanh.required' => 'Vui lòng thêm hình ảnh truyện',
                'tendanhmuc.unique' => 'Tên truyện đã tồn tại, vui lòng nhập tên khác',
            ]
        );


        $tentruyen = new Truyen();
        $tentruyen->tentruyen = $data['tentruyen'];
        $tentruyen->tacgia = $data['tacgia'];
        $tentruyen->slugtruyen = $data['slugtruyen'];
        $tentruyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $tentruyen->danhmuc_id = $data['danhmuc_id'];
        $tentruyen->theloai_id = $data['theloai_id'];
        $tentruyen->truyen_noibat = $data['truyen_noibat'];
        $tentruyen->tomtat = $data['tomtat'];
        $tentruyen->kichhoat = $data['kichhoat'];
        //them anh vao folder
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $tentruyen->hinhanh = $new_image;
        $tentruyen->save();

        return redirect()->back()->with('status', 'Thêm truyện thành công !');
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
        $edittruyen = Truyen::find($id);
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $theloai = Theloai::orderBy('id', 'ASC')->get();
        return view('admincp.truyen.edit')->with(compact('edittruyen', 'danhmuc', 'theloai'));
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
                'tentruyen' => 'required|max:255|',
                'slugtruyen' => 'required|max:255|',
                'tacgia' => 'required|unique:truyen',
                'danhmuc_id' => 'required',
                'theloai_id' => 'required',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'truyen_noibat' => 'required',
            ],
            [
                'tentruyen.required' => 'Vui lòng nhập tên truyện',
                'slugtruyen.required' => 'Vui lòng nhập slug truyện',
                'tomtat.required' => 'Vui lòng nhập tóm tắt',
                'hinhanh.required' => 'Vui lòng thêm hình ảnh truyện',

            ]
        );


        $tentruyen = Truyen::find($id);
        $tentruyen->tentruyen = $data['tentruyen'];
        $tentruyen->slugtruyen = $data['slugtruyen'];
        $tentruyen->tacgia = $data['tacgia'];
        $tentruyen->danhmuc_id = $data['danhmuc_id'];
        $tentruyen->theloai_id = $data['theloai_id'];
        $tentruyen->truyen_noibat = $data['truyen_noibat'];
        $tentruyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $tentruyen->tomtat = $data['tomtat'];
        $tentruyen->kichhoat = $data['kichhoat'];
        //them anh vao folder
        $get_image = $request->hinhanh;
        if ($get_image) {
            $path = 'public/uploads/truyen/' . $tentruyen->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $tentruyen->hinhanh = $new_image;
        }
        $tentruyen->save();

        return redirect()->back()->with('status', 'Cập nhật truyện thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công !');
    }

    public function truyennoibat(Request $request){
        $data = $request->all();
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->save();
    }

    public function kichhoat(Request $request){
        $data = $request->all();
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->save();
    }
}
