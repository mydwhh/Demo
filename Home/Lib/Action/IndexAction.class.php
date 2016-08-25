<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action
{

    public function index()
    {
        $m = M('User', 'tp_');
        // $m->username = '张小平';
        // echo $m->add();
        // $m->where("username='张小平'")->delete();

        // $da['id'] = 26;
        // $da['username'] = '刘大平';
        // $da['sex'] = 0;
        // $m->save($da);

        $arr = $m->select();
        // $arr = $m->find();
        // $arr = $m->getField('username');
        // $arr=$m->where('id=2')->getField('username');
        // var_dump($arr);
        $this->assign('data', $arr);
        $this->display();
    }
}