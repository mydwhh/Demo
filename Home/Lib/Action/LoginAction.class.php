<?php

class LoginAction extends Action
{

    public function index()
    {
        $this->display();
    }

    public function do_login()
    {
        // dump($_SESSION);
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $code = $_POST['code'];

        if ($_SESSION['verify'] != md5($code)) {
            $this->error('验证码有误！');
        }

        $m = M('User', 'tp_');
        $where['username'] = $username;
        $where['pwd'] = $pwd;
        $i = $m->where($where)->count();
        if ($i > 0) {
            $this->redirect('User/index');
        } else {
            $this->error("该用户不存在！");
        }
    }
}
?>