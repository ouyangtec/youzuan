<?phpnamespace Home\Controller;use phpDocumentor\Reflection\Types\Null_;class UserController extends HomeController{	public function index()	{		if (!userid()) {			redirect('/login');		}//		echo date('md');		$is_birth=session('is_birthday');		if ($is_birth==1)        {            $bir=1;        }        else        {            $bir=0;        }//        echo $bir;        $this->birthday=$bir;		$user = M('User')->where(array('id' => userid()))->find();        $cny = M('UserCoin')->where(array('userid' => userid()))->getField('cny');        //print_r(M('UserCoin')->getLastSql());		$this->assign('user', $user);		$this->assign('cny', sprintf("%.2f", $cny));		$this->assign('prompt_text', D('Text')->get_content('user_index'));		$this->display();	}	public function birthday()    {        session('is_birthday',0);        $this->success('Yes');    }	public function nameauth()	{		if (!userid()) {			redirect('/login');		}        $is_have=M('smrz')->where(array('userid'=>userid(),'status'=>0))->find();        if ($is_have)        {            echo "<script>alert('认证已提交处理中');history.back();</script>";die();        }		$user = M('User')->where(array('id' => userid()))->find();		if ($user['idcard']) {		    $this->zt=1;			$user['idcard'] = substr_replace($user['idcard'], '********', 6, 8);		}		$this->assign('user', $user);		$this->assign('prompt_text', D('Text')->get_content('user_nameauth'));		$this->display();	}    public function truenameauth()    {        if (!userid()) {            redirect('/login');        }        $is_have=M('smrz')->where(array('userid'=>userid(),'status'=>0))->find();        if ($is_have)        {            echo "<script>alert('认证已提交处理中');history.back();</script>";die();        }        $this->assign('user', userid());        $this->assign('prompt_text', D('Text')->get_content('user_nameauth'));        $this->display();    }    public function nameauthhandle()    {        $img1=I('post.face');        if(!$img1){            $this->error('请上传身份证正面');        }        $imgdata = substr($img1,strpos($img1,",") + 1);        $decodedData = base64_decode($imgdata);        $savename=userid().'1'.time();        $re[]=file_put_contents("./Upload/idcard/$savename.png",$decodedData );        $img2=I('post.back');        if(!$img2){            $this->error('请上传身份证背面');        }        $imgdata2 = substr($img2,strpos($img2,",") + 1);        $decodedData2 = base64_decode($imgdata2);        $savename2=userid().'2'.time();        $re[]=file_put_contents("./Upload/idcard/$savename2.png",$decodedData2);        $name=I('post.truename');        if(!$img2){            $this->error('请填写真实姓名');        }        $idcard=I('post.idcard');        if(!$img2){            $this->error('请填写身份证号');        }				//$this->error($savename.'/'.$savename2);        $sex=I('post.sex');        $data['userid']=userid();        $data['truename']=$name;        $data['idcard']=$idcard;        $data['sex']=$sex;        $data['img']="/Upload/idcard/$savename.png";        $data['img2']="/Upload/idcard/$savename2.png";        $data['addtime']=time();        $data['status']=0;        $save=M('smrz')->add($data);        if ($save)        {            $this->success('提交成功');        }        else        {            $this->error('提交失败');        }    }    public function coinImage()    {        $is_have=M('user')->where(array('id'=>userid()))->find();        if ($is_have['truename'])        {            echo "<script>alert('认证已提交处理中');history.back();</script>";die();        }        $upload = new \Think\Upload();// 实例化上传类        $upload->maxSize   =     3145728 ;// 设置附件上传大小        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型        $upload->rootPath  =      './Upload/idcard/'; // 设置附件上传根目录        $upload->savePath  =      ''; // 设置附件上传（子）目录//        $upload->autoSub = false;//        $upload->saveName=userid().time();// 上传文件        $info   =   $upload->upload();        $pic=array();        if(!$info) {// 上传错误提示错误信息//            $this->error($upload->getError());            echo "<script>alert('图片上传错误');history.back();</script>";die();        }else{// 上传成功 获取上传文件信息            foreach($info as $file){                $pic[] = $file['savepath'].$file['savename'];            }        }        $name=I('post.name');        $idcard=I('post.idcard');        $sex=I("post.sex");        $data['userid']=userid();        $data['truename']=$name;        $data['idcard']=$idcard;        $data['sex']=$sex;        $data['img']='/Upload/idcard/'.$pic[0];        $data['img2']='/Upload/idcard/'.$pic[1];        $data['addtime']=time();        $data['status']=0;        $save=M('smrz')->add($data);        if ($save)        {            echo "<script>alert('提交成功');window.location.href='/User/index'</script>";die();        }        else        {            echo "<script>alert('提交失败');history.back();</script>";die();        }    }    /*public function coinImage()    {        $upload = new \Think\Upload();        $upload->maxSize = 3145728;        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');        $upload->rootPath = './Upload/idcard/';        $upload->autoSub = false;        $upload->saveName=userid().time();        $info = $upload->upload();        foreach ($info as $k => $v) {            $path = $v['savepath'] . $v['savename'];            echo $path;            exit();        }    }*/	public function password()	{		if (!userid()) {			redirect('/login');		}		$this->assign('prompt_text', D('Text')->get_content('user_password'));		$this->display();	}	public function uppassword($oldpassword, $newpassword, $repassword)	{		if (!userid()) {			$this->error('请先登录！');		}		if (!check($oldpassword, 'password')) {			$this->error('旧登录密码格式错误！');		}		if (!check($newpassword, 'password')) {			$this->error('新登录密码格式错误！');		}		if ($newpassword != $repassword) {			$this->error('确认新密码错误！');		}		$password = M('User')->where(array('id' => userid()))->getField('password');		if (md5($oldpassword) != $password) {			$this->error('旧登录密码错误！');		}		$rs = M('User')->where(array('id' => userid()))->save(array('password' => md5($newpassword)));		if ($rs) {			$this->success('修改成功');		}		else {			$this->error('修改失败');		}	}	public function paypassword()	{		if (!userid()) {			redirect('/login');		}		$this->assign('prompt_text', D('Text')->get_content('user_paypassword'));		$this->display();	}	public function uppaypassword($oldpaypassword, $newpaypassword, $repaypassword)	{		if (!userid()) {			$this->error('请先登录！');		}		if (!check($oldpaypassword, 'password')) {			$this->error('旧交易密码格式错误！');		}		if (!check($newpaypassword, 'password')) {			$this->error('新交易密码格式错误！');		}		if ($newpaypassword != $repaypassword) {			$this->error('确认新密码错误！');		}		$user = M('User')->where(array('id' => userid()))->find();		if (md5($oldpaypassword) != $user['paypassword']) {			$this->error('旧交易密码错误！');		}		if (md5($newpaypassword) == $user['password']) {			$this->error('交易密码不能和登录密码相同！');		}		$rs = M('User')->where(array('id' => userid()))->save(array('paypassword' => md5($newpaypassword)));		if ($rs) {			$this->success('修改成功');		}		else {			$this->error('修改失败');		}	}	public function ga()	{		if (empty($_POST)) {			if (!userid()) {				redirect('/login');			}			$this->assign('prompt_text', D('Text')->get_content('user_ga'));			$user = M('User')->where(array('id' => userid()))->find();			$is_ga = ($user['ga'] ? 1 : 0);			$this->assign('is_ga', $is_ga);			if (!$is_ga) {				$ga = new \Common\Ext\GoogleAuthenticator();				$secret = $ga->createSecret();				session('secret', $secret);				$this->assign('Asecret', $secret);				$qrCodeUrl = $ga->getQRCodeGoogleUrl($user['id'] . '%20-%20' . $_SERVER['HTTP_HOST'], $secret);				$this->assign('qrCodeUrl', $qrCodeUrl);				$this->display();			}			else {				$arr = explode('|', $user['ga']);				$this->assign('ga_login', $arr[1]);				$this->assign('ga_transfer', $arr[2]);				$this->display();			}		}		else {			if (!userid()) {				$this->error('登录已经失效,请重新登录!');			}			$delete = '';			$gacode = trim(I('ga'));			$type = trim(I('type'));			$ga_login = (I('ga_login') == false ? 0 : 1);			$ga_transfer = (I('ga_transfer') == false ? 0 : 1);			if (!$gacode) {				$this->error('请输入验证码!');			}			if ($type == 'add') {				$secret = session('secret');				if (!$secret) {					$this->error('验证码已经失效,请刷新网页!');				}			}			else if (($type == 'update') || ($type == 'delete')) {				$user = M('User')->where('id = ' . userid())->find();				if (!$user['ga']) {					$this->error('还未设置谷歌验证码!');				}				$arr = explode('|', $user['ga']);				$secret = $arr[0];				$delete = ($type == 'delete' ? 1 : 0);			}			else {				$this->error('操作未定义');			}			$ga = new \Common\Ext\GoogleAuthenticator();			if ($ga->verifyCode($secret, $gacode, 1)) {				$ga_val = ($delete == '' ? $secret . '|' . $ga_login . '|' . $ga_transfer : '');				M('User')->save(array('id' => userid(), 'ga' => $ga_val));				$this->success('操作成功');			}			else {				$this->error('验证失败');			}		}	}	public function moble()	{		if (!userid()) {			redirect('/login');		}		$user = M('User')->where(array('id' => userid()))->find();		if ($user['moble']) {			$user['moble'] = substr_replace($user['moble'], '****', 3, 4);		}		$this->assign('user', $user);		$this->assign('prompt_text', D('Text')->get_content('user_moble'));		$this->display();	}	public function upmoble($moble, $moble_verify)	{		if (!userid()) {			$this->error('您没有登录请先登录！');		}		if (!check($moble, 'moble')) {			$this->error('手机号码格式错误！');		}		if (!check($moble_verify, 'd')) {			$this->error('短信验证码格式错误！');		}		if ($moble_verify != session('real_verify')) {			$this->error('短信验证码错误！');		}		if (M('User')->where(array('moble' => $moble))->find()) {			$this->error('手机号码已存在！');		}		$rs = M('User')->where(array('id' => userid()))->save(array('moble' => $moble, 'mobletime' => time()));		if ($rs) {			$this->success('手机认证成功！');		}		else {			$this->error('手机认证失败！');		}	}	public function alipay()	{		if (!userid()) {			redirect('/login');		}		D('User')->check_update();		$this->assign('prompt_text', D('Text')->get_content('user_alipay'));		$user = M('UserBank')->where(array('userid' => userid(),"type"=>'alipay'))->find();		$this->assign('user', $user);		$this->display();	}    public function weixin()    {        if (!userid()) {            redirect('/login');        }        D('User')->check_update();        $this->assign('prompt_text', D('Text')->get_content('user_alipay'));        $user = M('UserBank')->where(array('userid' => userid(),type=>'weixin'))->find();        $this->assign('user', $user);        $this->display();    }	public function tpwdset()	{		if (!userid()) {			redirect('/login');		}		$user = M('User')->where(array('id' => userid()))->find();		$this->assign('prompt_text', D('Text')->get_content('user_tpwdset'));		$this->assign('user', $user);		$this->display();	}	public function tpwdsetting()	{		if (userid()) {			$tpwdsetting = M('User')->where(array('id' => userid()))->getField('tpwdsetting');			exit($tpwdsetting);		}	}	public function uptpwdsetting($paypassword, $tpwdsetting)	{		if (!userid()) {			$this->error('请先登录！');		}		if (!check($paypassword, 'password')) {			$this->error('交易密码格式错误！');		}		if (($tpwdsetting != 1) && ($tpwdsetting != 2) && ($tpwdsetting != 3)) {			$this->error('选项错误！' . $tpwdsetting);		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}		$user_passset = M('User')->where(array('id' => userid()))->getField('tpwdsetting');		if ($tpwdsetting==$user_passset)        {            $this->error('请选择不同的方式');        }		$rs = M('User')->where(array('id' => userid()))->save(array('tpwdsetting' => $tpwdsetting));		if ($rs) {			$this->success('成功！');		}		else {			$this->error('失败！');		}	}	public function bank()	{		if (!userid()) {			redirect('/login');		}		$UserBankType = M('UserBankType')->where(array('status' => 1))->order('id desc')->select();		$this->assign('UserBankType', $UserBankType);		$truename = M('User')->where(array('id' => userid()))->getField('truename');		if ($truename=="")        {            echo "<script>window.location.href='/User/nameauth';</script>";die();        }		$this->assign('truename', $truename);		$UserBank = M('UserBank')->where(array('userid' => userid(), 'type' => 'bank'))->order('id desc')->find();		//$UserBank = M('UserBank')->where(array('userid' => userid(), 'status' => 1))->order('id desc')->find();        $this->assign('user', $UserBank);		$this->assign('prompt_text', D('Text')->get_content('user_bank'));		$this->display();	}	public function upbank($id=Null,$type,$name, $bank, $bankprov="", $bankcity="", $bankaddr="", $bankcard, $paypassword)	{		if (!userid()) {			redirect('/login');		}        $banknum=M('UserBank')->where(array('userid' => userid(),'type'=>$type))->count();        if(!$id){            if (1 <= $banknum) {                $this->error('每个用户每种类型最多只能添加1个账户！');            }        }		$user=M('User')->where(array('userid' => userid()))->find();		if($name!==$user['truename']){			$this->error('填写姓名请与实名认证的真实姓名相同');		} 		if (!check($name, 'a')) {			$this->error('备注名称格式错误！');		}		if ($type=='bank')        {            if (!check($bank, 'a')) {                $this->error('银行名称格式错误！');            }          /*  if (!check($bankprov, 'c')) {                $this->error('开户省市格式错误！');            }            if (!check($bankcity, 'c')) {                $this->error('开户省市格式错误2！');            }*/            if (!check($bankaddr, 'a')) {                $this->error('开户行地址格式错误！');            }            if (!check($bankcard, 'd')) {                $this->error('银行账号格式错误！');            }          /*   if (!M('UserBankType')->where(array('title' => $bank))->find()) {                $this->error('开户银行错误！');            } */        }        else        {            if (!check($bankcard, 'moble')) {                if (!check($bankcard, 'email')) {                    $this->error('账号格式错误！');                }            }        }		if (!check($paypassword, 'password')) {			$this->error('交易密码格式错误！');		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}        if(!$id){            $re=M('UserBank')->add(array('userid' => userid(),'type'=>$type, 'name' => $name, 'bank' => $bank, 'bankprov' => $bankprov, 'bankcity' => $bankcity, 'bankaddr' => $bankaddr, 'bankcard' => $bankcard, 'addtime' => time(), 'status' => 1));        }else{            $re=M('UserBank')->save(array("id"=>$id,'userid' => userid(),'type'=>$type, 'name' => $name, 'bank' => $bank, 'bankprov' => $bankprov, 'bankcity' => $bankcity, 'bankaddr' => $bankaddr, 'bankcard' => $bankcard, 'addtime' => time(), 'status' => 1));        }		if ($re) {			$this->success('操作成功！');		}		else {			$this->error('操作失败！');		}	}	public function delbank($id, $paypassword)	{		$this->error('警告:非法操作！');		die();		if (!userid()) {			redirect('/login');		}		if (!check($paypassword, 'password')) {			$this->error('交易密码格式错误！');		}		if (!check($id, 'd')) {			$this->error('参数错误！');		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}		if (!M('UserBank')->where(array('userid' => userid(), 'id' => $id))->find()) {			$this->error('非法访问！');		}		else if (M('UserBank')->where(array('userid' => userid(), 'id' => $id))->delete()) {			$this->success('删除成功！');		}		else {			$this->error('删除失败！');		}	}	public function qianbao($coin = NULL)	{		if (!userid()) {			redirect('/login');		}		$Coin = M('Coin')->where(array(			'status' => 1,			'name'   => array('NOT IN', 'cny,usd'),			))->select();		if (!$coin) {			$coin = $Coin[0]['name'];		}		$this->assign('xnb', $coin);		foreach ($Coin as $k => $v) {			$coin_list[$v['name']] = $v;		}		$this->assign('coin_list', $coin_list);		$userQianbaoList = M('UserQianbao')->where(array('userid' => userid(), 'status' => 1, 'coinname' => $coin))->order('id desc')->select();		$this->assign('userQianbaoList', $userQianbaoList);		$this->assign('prompt_text', D('Text')->get_content('user_qianbao'));		$this->display();	}	public function upqianbao($coin, $name, $addr, $paypassword)	{		if (!userid()) {			redirect('/login');		}		if (!check($name, 'a')) {			$this->error('备注名称格式错误！');		}		if (!check($addr, 'dw')) {			$this->error('钱包地址格式错误！');		}		if (!check($paypassword, 'password')) {			$this->error('交易密码格式错误！');		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}		if (!M('Coin')->where(array('name' => $coin))->find()) {			$this->error('币种错误！');		}		$userQianbao = M('UserQianbao')->where(array('userid' => userid(), 'coinname' => $coin))->select();		foreach ($userQianbao as $k => $v) {			if ($v['name'] == $name) {				$this->error('请不要使用相同的钱包标识！');			}			if ($v['addr'] == $addr) {				$this->error('钱包地址已存在！');			}		}		if (10 <= count($userQianbao)) {			$this->error('每个人最多只能添加10个地址！');		}		if (M('UserQianbao')->add(array('userid' => userid(), 'name' => $name, 'addr' => $addr, 'coinname' => $coin, 'addtime' => time(), 'status' => 1))) {			$this->success('添加成功！');		}		else {			$this->error('添加失败！');		}	}	public function delqianbao($id, $paypassword)	{		if (!userid()) {			redirect('/login');		}		if (!check($paypassword, 'password')) {			$this->error('交易密码格式错误！');		}		if (!check($id, 'd')) {			$this->error('参数错误！');		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}		if (!M('UserQianbao')->where(array('userid' => userid(), 'id' => $id))->find()) {			$this->error('非法访问！');		}		else if (M('UserQianbao')->where(array('userid' => userid(), 'id' => $id))->delete()) {			$this->success('删除成功！');		}		else {			$this->error('删除失败！');		}	}	public function goods()	{		if (!userid()) {			redirect('/login');		}		$userGoodsList = M('UserGoods')->where(array('userid' => userid(), 'status' => 1))->order('id desc')->select();		foreach ($userGoodsList as $k => $v) {			$userGoodsList[$k]['moble'] = substr_replace($v['moble'], '****', 3, 4);			$userGoodsList[$k]['idcard'] = substr_replace($v['idcard'], '********', 6, 8);		}		$this->assign('userGoodsList', $userGoodsList);		$this->assign('prompt_text', D('Text')->get_content('user_goods'));		$this->display();	}	public function upgoods($name, $truename, $idcard, $moble, $addr, $paypassword)	{		if (!userid()) {			redirect('/login');		}		if (!check($name, 'a')) {			$this->error('备注名称格式错误！');		}		if (!check($truename, 'truename')) {			$this->error('联系姓名格式错误！');		}		if (!check($idcard, 'idcard')) {			$this->error('身份证号格式错误！');		}		if (!check($moble, 'moble')) {			$this->error('联系电话格式错误！');		}		if (!check($addr, 'a')) {			$this->error('联系地址格式错误！');		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}		$userGoods = M('UserGoods')->where(array('userid' => userid()))->select();		foreach ($userGoods as $k => $v) {			if ($v['name'] == $name) {				$this->error('请不要使用相同的地址标识！');			}		}		if (10 <= count($userGoods)) {			$this->error('每个人最多只能添加10个地址！');		}		if (M('UserGoods')->add(array('userid' => userid(), 'name' => $name, 'addr' => $addr, 'idcard' => $idcard, 'truename' => $truename, 'moble' => $moble, 'addtime' => time(), 'status' => 1))) {			$this->success('添加成功！');		}		else {			$this->error('添加失败！');		}	}	public function delgoods($id, $paypassword)	{		if (!userid()) {			redirect('/login');		}		if (!check($paypassword, 'password')) {			$this->error('交易密码格式错误！');		}		if (!check($id, 'd')) {			$this->error('参数错误！');		}		$user_paypassword = M('User')->where(array('id' => userid()))->getField('paypassword');		if (md5($paypassword) != $user_paypassword) {			$this->error('交易密码错误！');		}		if (!M('UserGoods')->where(array('userid' => userid(), 'id' => $id))->find()) {			$this->error('非法访问！');		}		else if (M('UserGoods')->where(array('userid' => userid(), 'id' => $id))->delete()) {			$this->success('删除成功！');		}		else {			$this->error('删除失败！');		}	}	public function log()	{		if (!userid()) {			redirect('/login');		}		$where['status'] = array('egt', 0);		$where['userid'] = userid();		$Model = M('UserLog');		$count = $Model->where($where)->count();		$Page = new \Think\Page($count, 10);		$show = $Page->show();		$list = $Model->where($where)->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();		$this->assign('list', $list);		$this->assign('page', $show);		$this->assign('prompt_text', D('Text')->get_content('user_log'));		$this->display();	}	public function install()	{	}    public function config()    {        $this->display();    }    public function traderecord()    {	$time=time()-15*24*60*60;        $list=M('trade')->where(array('userid'=>userid(),'status'=>0,'addtime'=>array('gt',$time)))->select();        $map['userid'] = userid();        $map['peerid'] = userid();        $map['_logic'] = 'OR';        $listlog=M('tradeLog')->where($map)->select();        $this->assign('list', $list);       $this->assign('listlog', $listlog);        $this->display();    }    public function seekrecord()    {        $map['userid'] = userid();        $map['peerid'] = userid();        $map['_logic'] = 'OR';        $list=M('SeekLog')->where($map)->select();        foreach ($list as $k => $v) {            $list[$k]['name'] = explode('_', $v['market'])[0];            if ($v['userid'] == userid()) {                $list[$k]['type'] = 0;            } else {                $list[$k]['type'] = 1;            }        }        $this->assign('list', $list);        $this->display();    }    public function seekimg()    {        $imgstr=$_POST['img'];        $imgdata = substr($imgstr,strpos($imgstr,",") + 1);        $decodedData = base64_decode($imgdata);        $savename=userid().time();        $re[]=file_put_contents("./Upload/seek/$savename.png",$decodedData );        $data['img']='/Upload/seek/'.$savename.'.png';        $data['status']=2;        $data['id']=$_POST['id'];        $re[]=M('SeekLog')->save($data);        if($re){            $this->success('上传成功！');        }        else {            $this->error('上传失败！');        }    }    public function show($rs = array())    {        if ($rs[0]) {            $this->success($rs[1]);        }        else {            $this->error($rs[1]);        }    }    public function seekchexiao($id)    {        if (!userid()) {            $this->error('请先登录！');        }        if (!check($id, 'd')) {            $this->error('请选择要撤销的委托！');        }        $seek = M('seekLog')->where(array('id' => $id))->find();        if (!$seek) {            $this->error('撤销委托参数错误！');        }        if ($seek['userid'] != userid()) {            $this->error('参数非法！');        }        $this->show(D('Trade')->seekchexiao($id));       //eturn array('status'=>$arr[0],'info'=>$arr[1]);    }    public function seekend($action=Null){        $seek=M('SeekLog')->where('id='.$_POST['id'])->find();        $market=$seek['market'];        $data=M('seekmarket')->where(array("market"=>$market))->find();        $user=M('UserCoin')->where(array("userid"=>userid()))->find();        if(!$data) {            $this->error('交易市场错误');        }else {            $xnb = explode('_', $market)[0];            $rmb = explode('_', $market)[1];        }        M()->startTrans();        if($action){            $_POST['status']=4;            $re[]=$finance_nameid=M('SeekLog')->save($_POST);            if($re){                M()->commit();                $this->success('提交成功,请联系客服');            }            else {                M()->rollback();                $this->error('提交失败！');            }        }        $finance = M('finance')->where(array('userid' => userid()))->order('id desc')->find();//最近一条资金记录        $finance_num_user_coin = M('UserCoin')->where(array('userid' => userid()))->find();//个人资产        $_POST['status']=3;        $_POST['fee_sell']= $seek['num']*$seek['price']*$data['fee_sell'] / 100;//卖家手续费	    $re[]=$finance_nameid=M('SeekLog')->save($_POST);	    $mum_sell=$seek['price']*$seek['num']/100*(100-$data['fee_sell']);        $re[]=M('UserCoin')->where(array("userid"=>$seek['userid']))->setDec('goldd',$seek['mum']);        $re[]=M('UserCoin')->where(array("userid"=>$seek['peerid']))->setInc('gold',$mum_sell);        $finance_mum_user_coin = M('UserCoin')->where(array('userid' => userid()))->find();        $finance_hash = md5(userid() . $finance_num_user_coin[$rmb ] . $finance_num_user_coin[$rmb.'d'] .            $seek['mum'] . $finance_mum_user_coin[$rmb] . $finance_mum_user_coin[$rmb . 'd'] . MSCODE . 'auth.btchanges.com');//			人民币总资产        $finance_num = $finance_num_user_coin[$rmb] + $finance_num_user_coin[$rmb . 'd'];        if ($finance['mum'] < $finance_num) {            $finance_status = (1 < ($finance_num - $finance['mum']) ? 0 : 1);//正常1 错误0        }else {            $finance_status = (1 < ($finance['mum'] - $finance_num) ? 0 : 1);        }        $rs[] =  M('finance')->add(array('userid' => userid(),            'coinname' => $rmb , 'num_a' => $finance_num_user_coin[$rmb], 'num_b' => $finance_num_user_coin[$rmb . 'd'],            'num' => $finance_num_user_coin[$rmb] + $finance_num_user_coin[$rmb . 'd'], 'fee' => $seek['mum'], 'type' => 2,            'name' => 'seek', 'nameid' => $finance_nameid, 'remark' => '推荐大厅-发布求购' . $market,            'mum_a' => $finance_mum_user_coin[$rmb], 'mum_b' => $finance_mum_user_coin[$rmb . 'd'],            'mum' => $finance_mum_user_coin[$rmb] + $finance_mum_user_coin[$rmb . 'd'], 'move' => $finance_hash,            'addtime' => time(), 'status' => $finance_status));        if($re){            M()->commit();            $this->success('交易成功！');        }        else {            M()->rollback();            $this->error('交易失败！');        }    }    public function redrocome(){		$where['type']='red';		$where['userid']=userid();		  $Model = M('Invit');		 $count = $Model->where($where)->count();        $Page = new \Think\Page($count,10);        page($Page);        $show = $Page->show();        $list = $Model->where($where)->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();	    $this->assign('page', $show);	    $this->assign('list',$list);	    $this->display();    }    public function payment(){        $this->display();    }    public function contact()    {        $this->data = M('Config')->where(array('id' => 1))->find();        $this->display();    }}?>