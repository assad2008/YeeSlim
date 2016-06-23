<?php
/**
* @file Secode.php
* @synopsis  ��֤����
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2013-01-20 15:58:58
*/

class Secode
 {
	//��֤��Ŀ��
	public $width=140;
	
	//��֤��ĸ�
	public $height=47;
	
	//��������ĵ�ַ
	private $font;
	
	//��������ɫ
	public $font_color;
	
	//���������������
	public $charset = 'abcdefghkmnprstuvwyABCDEFGHKLMNPRSTUVWYZ3456789';
	
	//���ñ���ɫ
	public $background = '#EDF7FF';
	
	//������֤���ַ���
	public $code_len = 5;
	
	//�����С
	public $font_size = 18;
	
	//��֤��
	private $code;
	
	//ͼƬ�ڴ�
	private $img;
	
	//����X�Ὺʼ�ĵط�
	private $x_start;

	public  $session_name = "securimage_code_value";

	public $correct_code;

	public $code_entered;

	function __construct() 
	{
		$font = $this->get_font_name();
		$this->font = ROOT . 'public/secode/font/'.$font.'.ttf';
		if (session_id() == '') 
		{
			session_start();
		}
	}

	protected function get_font_name()
	{
		$font = array('tintin','ledbdrev','elephant');
		$rand = rand(0,2);
		return $font[$rand];
	}
	
	/**
	 * ���������֤�롣
	 */
	protected function creat_code() {
		$code = '';
		$charset_len = strlen($this->charset)-1;
		for ($i=0; $i<$this->code_len; $i++) {
			$code .= $this->charset[rand(1, $charset_len)];
		}
		$this->code = $code;
		$this->save_code($this->code);
	}
	
	/**
	 * ��ȡ��֤��
	 */
	public function get_code() {
		if (isset($_SESSION["{$this->session_name}"]) && ! empty($_SESSION["{$this->session_name}"])) {
			return $_SESSION["{$this->session_name}"];
		} else {
			return '';
		}
	}

	public function save_code()
	{
		$_SESSION["{$this->session_name}"] = strtolower($this->code);
	}

	public function check ($code)
	{
		$this->code_entered = $code;
		$this->validate();
		return $this->correct_code;
	}

	public function checkCode ()
	{
		return $this->correct_code;
	}

	public function validate ()
	{
		if (isset($_SESSION["{$this->session_name}"]) && ! empty($_SESSION["{$this->session_name}"])) {
			if ($_SESSION["{$this->session_name}"] == strtolower(trim($this->code_entered))) {
				$this->correct_code = true;
				$_SESSION["{$this->session_name}"] = '';
			} else {
				$this->correct_code = false;
			}
		} else {
			$this->correct_code = false;
		}
	}
	/**
	 * ����ͼƬ
	 */
	public function doimage() {
		$this->creat_code();
		$this->img = imagecreatetruecolor($this->width, $this->height);
		if (!$this->font_color) {
			$this->font_color = imagecolorallocate($this->img, rand(0,156), rand(0,156), rand(0,156));
		} else {
			$this->font_color = imagecolorallocate($this->img, hexdec(substr($this->font_color, 1,2)), hexdec(substr($this->font_color, 3,2)), hexdec(substr($this->font_color, 5,2)));
		}
		//���ñ���ɫ
		$background = imagecolorallocate($this->img,hexdec(substr($this->background, 1,2)),hexdec(substr($this->background, 3,2)),hexdec(substr($this->background, 5,2)));
		//��һ�����Σ����ñ�����ɫ��
		imagefilledrectangle($this->img,0, $this->height, $this->width, 0, $background);
		$this->creat_font();
		$this->creat_line();
		$this->output();
	}
	
	/**
	 * ��������
	 */
	private function creat_font() {
		$x = $this->width/$this->code_len;
		for ($i=0; $i<$this->code_len; $i++) {
			imagettftext($this->img, $this->font_size, rand(-30,30), $x*$i+rand(0,5), $this->height/1.4, $this->font_color, $this->font, $this->code[$i]);
			if($i==0)$this->x_start=$x*$i+5;
		}
	}
	
	/**
	 * ����
	 */
	private function creat_line() {
		//�������
		for ($i=0; $i<2; $i++){
		  $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
		  imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
		}
	}
	
	/**
	 * ���ͼƬ
	 */
	private function output() {
		header("content-type:image/png\r\n");
		imagepng($this->img);
		imagedestroy($this->img);
	}
}
