<?php

class UserAction extends Action
{

    public function index()
    {
        $m = M('User', 'tp_');

        $arr = $m->select();

        $this->assign('data', $arr);
        $this->display();
    }

    public function del()
    {
        $m = M('User', 'tp_');
        $id = $_GET['id'];
        $count = $m->delete($id);

        if ($count > 0)
            $this->success('数据删除成功！');
        else
            $this->error('数据删除失败！');
    }

    // public function update()
    // {
    // $flag = $_GET['flag'];
    // if ($flag == 1) {
    // $id = $_GET['id'];
    // $username = $_GET['username'];
    // $sex = $_GET["sex"];

    // $this->assign('id', $id);
    // $this->assign('username', $username);
    // $this->assign('sex', $sex);

    // $this->display();
    // } else {
    // $m = M('User', 'tp_');
    // $user['id'] = $_POST['id'];
    // $user["username"] = $_POST["username"];
    // $user["sex"] = $_POST["sex"];

    // // var_dump($user);

    // $rowNum = $m->save($user);

    // if ($rowNum > 0)
    // // echo '数据更新成功！';
    // $this->success('数据更新成功！', '/Demo/index.php/User/index/', 3);
    // else
    // // echo '数据更新失败！';
    // $this->error('数据更新失败！', '/Demo/index.php/User/index/', 5);
    // }
    // }
    public function modify()
    {
        $id = $_GET['id'];
        $m = M('User', 'tp_');
        $arr = $m->find($id);
        $this->assign('userData', $arr);
        $this->display();
    }

    public function update2()
    {
        $user['id'] = $_POST['id'];
        $user["username"] = $_POST["username"];
        $user["sex"] = $_POST["sex"];

        $m = M('User', 'tp_');
        $rowNum = $m->save($user);

        if ($rowNum > 0)
            // echo '数据更新成功！';
            $this->success('数据更新成功！', '/Demo/index.php/User/index/', 3);
        else
            // echo '数据更新失败！';
            $this->error('数据更新失败！', '/Demo/index.php/User/index/', 5);
    }

    public function show()
    {
        $m = M();
        $arr = $m->query("select * from tp_user ");

        // $m=M('User','tp_');

        // $arr=$m->max('id');
        // $data['username']=array(array('notlike','%王%'),array('like','%李%'),'or');

        // $data['id']=array('gt',6);

        // $data['sex']=0;
        // $data['username']="李地标";
        // $data['_logic']='or';
        // $arr=$m->where($data)->select();
        // $arr=$m->where("sex=1 and username='李地标'")->find();
        var_dump($arr);

        $this->display();
    }

    public function search()
    {
        if (isset($_POST['username']) and $_POST['username'] != null)
            $where['username'] = $_POST['username'];
        if (isset($_POST['sex']) and $_POST['sex'] != null)
            $where['sex'] = $_POST['sex'];

        $m = M('User', 'tp_');
        $arr = $m->where($where)->select();

        $this->assign('data', $arr);
        $this->display('index');
    }

    public function add() {
        //$user['id'] = $_POST['id'];
        $user["username"] = $_POST["username"];
        $user["sex"] = $_POST["sex"];

        $m = M('User', 'tp_');
        $rowNum = $m->add($user);

        if ($rowNum > 0)
            // echo '数据更新成功！';
            $this->success('数据添加成功！', '/Demo/index.php/User/index/', 3);
        else
            // echo '数据更新失败！';
            $this->error('数据添加失败！', '/Demo/index.php/User/index/', 5);;
    }

    public function ins(){
        $this->display();
    }
}