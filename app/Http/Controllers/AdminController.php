<?php
namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
class AdminController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth:admin');
    }*/
    public function create() {
        return view('admin.auth.registertemplate');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function store(Request $request) {

        // validate dữ liệu được gửi từ form đi
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        // Khởi tạo model để lưu admin mới
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();

        return redirect()->route('admin.auth.login');
    }
}
