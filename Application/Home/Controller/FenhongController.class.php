<?phpnamespace Home\Controller;class FenhongController extends HomeController{	public function index()	{		if (!userid()) {			redirect('/login');		}		$this->assign('prompt_text', D('Text')->get_content('game_fenhong_log'));		$where['userid'] = userid();		$Model = M('FenhongLog');		$count = $Model->where($where)->count();		$Page = new \Think\Page($count, 15);		$show = $Page->show();		$list = $Model->where($where)->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();		$this->assign('list', $list);		$this->assign('page', $show);		$this->display();	}	public function uninstall()	{		M('Menu')->where(array('url' => 'Fenhong/index'))->delete();		M('Menu')->where(array('url' => 'Fenhong/log'))->delete();		return 1;		exit();	}    }?>