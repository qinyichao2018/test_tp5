<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $ary = session('user_info');
//        $quanbu = Db::name('userdata1')->where('uid', $ary['id'])->select();
//
////
////        var_dump($quanbu);
//
//        $this->assign('list', $quanbu);
////        return view('shuohsuolist');
        $list = Db::name('userdata1')->where('uid', '72')->paginate(5);
        $this->assign('list', $list);
        return $this->fetch();
//        return view();
    }

    public function huoqu()
    {
        $aa = input('id');
        var_dump($aa);

        return view();
    }

}
