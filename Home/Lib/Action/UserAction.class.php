<?php

class UserAction extends Action
{

    public function index_V1()
    {
        $m = M('User', 'tp_');
        $count = $m->Count();
        $ys = $count % $_SESSION['pageDisplayNum'];

        echo $ys . "   ";

        $maxPage = (int) ($count / $_SESSION['pageDisplayNum']);
        echo $maxPage;

        if (true)
            $maxPage --;

        echo $count;
        echo "\r\n";
        echo $maxPage;
        echo "    ";
        echo $ys;
        if (! isset($_SESSION['pageDisplayNum'])) {
            $_SESSION['pageDisplayNum'] = 4;
        }

        if (! isset($_SESSION['currentPage'])) {
            $_SESSION['currentPage'] = 0;
        }

        $pageFlag = $_GET['pageFlag'];
        switch ($pageFlag) {
            case 'first':
                $_SESSION['currentPage'] = 0;
                break;
            case 'previous':
                $_SESSION['currentPage'] --;
                if ($_SESSION['currentPage'] < 0)
                    $_SESSION['currentPage'] = 0;
                break;
            case 'next':
                $_SESSION['currentPage'] ++;
                if ($_SESSION['currentPage'] > $maxPage)
                    $_SESSION['currentPage'] = $maxPage;
                break;
            case 'last':
                $_SESSION['currentPage'] = $maxPage;
                break;
            default:
                $_SESSION['currentPage'] = 0;
                break;
        }

        $m = M('User', 'tp_');
        $arr = $m->limit($_SESSION['currentPage'] * $_SESSION['pageDisplayNum'], $_SESSION['pageDisplayNum'])->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $maxPage);
        $this->display();
    }

    public function index()
    {
        $this->setPageInfo(4);

        var_dump($_SESSION);

        $m = M('User', 'tp_');
        $arr = $m->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $_SESSION['maxPage']);
        $this->display();
    }

    function setPageInfo($pageDisplayNum)
    {
        // pageDisplayNum --------------每页显示数
        // RecordCount------------------总显示记录数据
        // maxPage----------------------最大页数
        // currentPage------------------当前页数
        $_SESSION['pageDisplayNum'] = $pageDisplayNum;

        if (! isset($_SESSION['RecordCount'])) {

            $m = M('User', 'tp_');
            $RecordCount = $m->Count();
            $_SESSION['RecordCount'] = $RecordCount;

            $ys = $RecordCount % $pageDisplayNum;
            $maxPage = (int) ($RecordCount / $pageDisplayNum);
            // if ($ys == 0)
            // $maxPage --;

            $_SESSION['maxPage'] = $maxPage;
            $_SESSION['currentPage'] = 0;
        }
    }

    function setPageInfoNull()
    {
        // pageDisplayNum --------------每页显示数
        // RecordCount------------------总显示记录数据
        // maxPage----------------------最大页数
        // currentPage------------------当前页数
        $_SESSION['pageDisplayNum'] = null;
        $_SESSION['RecordCount'] = null;
        $_SESSION['maxPage'] = null;
        $_SESSION['currentPage'] = null;
    }

    public function first()
    {
        $this->setPageInfo(4);

        $_SESSION['currentPage'] = 0;

        $m = M('User', 'tp_');
        $arr = $m->limit($_SESSION['currentPage'] * $_SESSION['pageDisplayNum'], $_SESSION['pageDisplayNum'])->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $_SESSION['maxPage']);
        $this->display('index');
    }

    public function previous()
    {
        $this->setPageInfo(4);

        $_SESSION['currentPage'] --;
        if ($_SESSION['currentPage'] < 0) {
            $_SESSION['currentPage'] = 0;
            $this->error('亲，已经是第一页了，不能再往前翻了！');
        }

        $m = M('User', 'tp_');
        $arr = $m->limit($_SESSION['currentPage'] * $_SESSION['pageDisplayNum'], $_SESSION['pageDisplayNum'])->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $_SESSION['maxPage']);
        $this->display('index');
    }

    public function next()
    {
        $this->setPageInfo(4);

        $_SESSION['currentPage'] ++;
        if ($_SESSION['currentPage'] > $_SESSION['maxPage']) {
            $_SESSION['currentPage'] = $_SESSION['maxPage'];
            $this->error('亲，已经是最后一页了，不能再往后翻了！');
        }
        $m = M('User', 'tp_');
        $arr = $m->limit($_SESSION['currentPage'] * $_SESSION['pageDisplayNum'], $_SESSION['pageDisplayNum'])->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $_SESSION['maxPage']);
        $this->display('index');
    }

    public function last()
    {
        $this->setPageInfo(4);

        $_SESSION['currentPage'] = $_SESSION['maxPage'];

        $m = M('User', 'tp_');
        $arr = $m->limit($_SESSION['currentPage'] * $_SESSION['pageDisplayNum'], $_SESSION['pageDisplayNum'])->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $_SESSION['maxPage']);
        $this->display('index');
    }

    public function goPage()
    {
        $this->setPageInfo(4);

        $_SESSION['currentPage'] = $_GET['page']-1;

        $m = M('User', 'tp_');
        $arr = $m->limit($_SESSION['currentPage'] * $_SESSION['pageDisplayNum'], $_SESSION['pageDisplayNum'])->select();
        $this->assign('data', $arr);
        $this->assign('maxPage', $_SESSION['maxPage']);
        $this->display('index');
    }

    public function del()
    {
        $m = M('User', 'tp_');
        $id = $_GET['id'];
        $count = $m->delete($id);

        if ($count > 0) {
            $this->setPageInfoNull();
            $this->success('数据删除成功！');
        } else
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

    public function add()
    {
        // $user['id'] = $_POST['id'];
        $user["username"] = $_POST["username"];
        $user["sex"] = $_POST["sex"];

        $m = M('User', 'tp_');
        $rowNum = $m->add($user);

        if ($rowNum > 0) {

            $this->setPageInfoNull();
            $this->success('数据添加成功！', '/Demo/index.php/User/index/', 3);
        } else

            $this->error('数据添加失败！', '/Demo/index.php/User/index/', 5);
        ;
    }

    public function ins()
    {
        $this->display();
    }
}