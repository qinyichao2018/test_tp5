<?php
/**
 * Created by PhpStorm.
 * User: bc
 * Date: 2018/2/19
 * Time: 15:30
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Validate;

class User extends Controller
{
    public function index()
    {
//        $this->assign('error','');
        //$this->assign('post_data',['email'=>'','password'=>'']);
        return view('index/register');
    }

    public function user()
    {
        $post_data = input('post.');

        //有效性验证
        $validate = validate('User');
        if (!$validate->check($post_data)) {
            $error = $validate->getError();
            $this->assign('error',$error);
            $this->assign('post_data',$post_data);
            return view('index/register');
        }
        //数据库操作
        $post_data['created_at'] = time();
        $post_data['username'] = $post_data['email'];
        unset($post_data['email']);
        $id = Db::name('user')->insert($post_data);
        //跳转
        if ($id > 0) {
            $this->success('注册成功', 'login');
        } else {
            $this->error('注册失败');
        }
    }

    public function login()
    {

        return view('index/login');
    }

    public function login_o()
    {

//        $email = input('email/s','787575327@qq.com');
        $post_data = input('post.');
//        var_dump($post_data);
        //有效性验证
        $validate = validate('User');
        if (!$validate->check($post_data)){
            $error=$validate->getError();
            $this->assign('error',$error);
            $this->assign('post_data',$post_data);
            return view('index/login');
        }
        //数据库操作
//        Db::query('select * from user where username=$post_data['email']',[8]);
////        Db::execute('insert into user (username, password,created_at) values (?, ?, ?)',[$post_data['email'],$post_data['password'],time()]);
//        $post_data['created_at'] = time();
//        $post_data['username'] = $post_data['email'];
//        unset($post_data['email']);
        $user_data = Db::table('user')->where('username', $post_data['email'])->where('password', $post_data['password'])->find();
//        $id = Db::name('user')->insert($post_data);
        //跳转
        if ($user_data) {
            //保存用户信息到session
            session('user_info', $user_data);
            $this->success('登录成功', 'zhuye');
        } else {
            $this->error('登录失败');
        }
    }

    public function zhuye()
    {

        $user_info = session('user_info');
        $this->assign('email', $user_info['username']);
        return view('index/zhuye');
    }

    public function edit()
    {

        $user_info = session('user_info');
        $this->assign('email', $user_info['username']);
        return view('edit');
    }

    public function edit_do()
    {

        $email = input('post.email');
        $user_info = session('user_info');
        //更新数据库
        Db::name('user')->where('id', $user_info['id'])->update(array('username' => $email));
        //更新session中邮箱
        $user_info['username'] = $email;
        session('user_info', $user_info);
        $this->success('更新成功', 'zhuye');
    }

    public function shuoshuo()
    {

        return view('shuoshuo');
    }

    public function shuoshuo_do()
    {

        $post_data = input('post.');
        $ary = session('user_info');
        $post_data['uid'] = $ary['id'];
        $post_data['created_at'] = time();
        $var = Db::name('userdata1')->insert($post_data);

        if ($var > 0) {
            $this->success('发表成功', 'zhuye');
        } else {
            $this->error('发表失败');
        }
    }


    public function shuoshuolist()
    {

        $ary = session('user_info');
//        $quanbu = Db::name('userdata1')->where('uid', $ary['id'])->select();
//
////
////        var_dump($quanbu);
//
//        $this->assign('list', $quanbu);
//        return view('shuohsuolist');
        $list = Db::name('userdata1')->where('uid', $ary['id'])->paginate(2);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('shuohsuolist');
    }

    public function shuoshuo_edit()
    {
        $post_data = session('user_info');
        $id = input('id');

        $shuoshuo_id = Db::name('userdata1')->where('uid', $post_data['id'])->where('id', $id)->find();
        $this->assign('yuanwen', $shuoshuo_id['shuoshuo']);
        $this->assign('bianji', $id);

        return view('redit');
    }

    public function shuoshuo_edit_do()
    {
        $post_data = session('user_info');
        $id = input('id');
        $xiugai=input('text');

        $shuoshuo_id = Db::name('userdata1')->where('uid', $post_data['id'])->where('id', $id)->update(array('shuoshuo' => $xiugai));

        $this->success('更新成功', 'shuoshuolist');
    }

    public function shuoshuo_del()
    {
        $id = input('id');
        Db::name('userdata1')->where('id', $id)->delete();
        $this->success('删除成功', 'shuoshuolist');
    }

    public function fileup(){
        return view('fileup');
    }

    public function fileup_do(){
        $file = request()->file('file');
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
//                echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
               $fileroad='/uploads/'.$info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getFilename();
                $var = Db::name('road')->insert(['road'=>$fileroad]);

                if ($var > 0) {
                    $this->success('发表成功', 'zhuye');
                } else {
                    $this->error('发表失败');
                }


            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function file_xiazai(){
//下载代码
        $file='/uploads/20180221/177052537843b348a2e2b8f6af448232.png';
//输出文件
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="'.basename($file) .'"');
        header("Content-Length: ".filesize(ROOT_PATH.'public/'.$file));
//输出缓冲区
        readfile(ROOT_PATH.'public/'.$file);

    }

}


