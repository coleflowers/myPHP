<?php
/**
 * @file:   vcode.class.php 验证码类 类名:Vcode
 * @author  马磊雷
 * @date    2013-10-26
 *          本程序参考了《细说PHP》P386的验证码类，功能方面有所扩展
 *          1、支持中文字符，且字符库以参数形式传递；
 *          2、图片背景色可以以参数形式自定义，适应不同的使用环境背景色；
 *          3、字的颜色由程序根据背景色取补色。
 */

/*
---------------------+++++++++++使用示例+++++++++++------------------------
session_start();                             // 在服务器端保存验证字符
require 'vcode.class.php';                   // 包含验证码所在的类
$str = '这是一坐标位置画上去在中'.           // 定义验证码字符库
	   '不仅支持比较多的字体库可'.
	   '以使用等函数使用内置的字';
echo new Vcode(120, 40, 4, "#ffffff", $str); // 实例化验证码类对象，并输出
----------------------------------------------------------------------------
*/

class Vcode {
	private $width;          // 验证码图片宽度
	private $height;         // 验证码图片高度
	private $chars;          // 验证码图片字符库
	private $charNum;        // 验证码字符个数
	private $char;           // 验证码字符
	private $colorOther;     // 干扰元素
	private $color;          // 验证码图片背景色 #ffffff
	private $img;            // 验证码图片资源
	private $key;            // 控制输出图片是否为透明背景
	private $fontColor;      // 验证码字符颜色，根据背景色取补色

	/**
	 * 构造方法
	 * @param $width     验证码图片宽度，默认120
	 * @param $height    验证码图片高度，默认40
	 * @param $charNum   验证码字符个数，默认4
	 * @param $chars     验证码字符库，默认为去除oOLlZz和数字012的英文字符
	 * @param $color     验证码图片背景色，默认白色
	 */
	function __construct( $width=120, $height=40, $charNum=4, $color="#002299", 
						  $chars='3456789abcdefghijkmnpqrstuvwxyABCDEFGHIJKMNPQRSTUVWXY') {
		$this->width     = $width;
		$this->height    = $height;
		$this->charNum   = $charNum;
		$this->color     = $color;
		$this->chars     = $chars;
		$this->char      = $this->creatChar();
		$this->key       = 1;
		$this->fontColor = $this->color(1);           // 背景色的补色
		$number          = floor($width*$height/15);  // 参考了细说PHP P387
		if( $number > 240-$charNum ) {
			$this->colorOther = 240-$charNum;
		} else {
			$this->colorOther = $number;
		}
	}

	// 魔术方法输出验证码图片，向服务器session保存验证码
	function __toString() {
		$_SESSION['vcode'] = $this->char;
		$this->outImg();
		return '';
	}

	// 输出图片
	private function outImg() {
		$this->creatImg();    // 创建图像画布
		$this->otherCircle(); // 干扰元素-弧
		$this->outputText();  // 写入文字
		$this->otherPoint();  // 干扰元素-点
		$this->outputImg();   // 输出图像资源
	}

	// 整理颜色数据，方便后续使用，参数$m控制输出原色还是补色，
	private function color($m) {
		$colors     = array();
		$_colors    = array();
		$colors[0]  = base_convert($this->color[1].$this->color[2], 16, 10);            // 红色 16进制转10进制
		$colors[1]  = base_convert($this->color[3].$this->color[4], 16, 10);            // 绿色 不转的话
		$colors[2]  = base_convert($this->color[5].$this->color[6], 16, 10);            // 蓝色 会认作字符串
		$_colors[0] = abs($colors[0]-255);
		$_colors[1] = abs($colors[1]-255);
		$_colors[2] = abs($colors[2]-255);
		if ($m == 0) { // 如果$m等于0输出原色，否则输出补色
			return $colors;
		} else {
			return $_colors;
		}

	}

	// 从头$this->chars中随机产生$charNum个字符
	private function creatChar() {
		$ascii = '';
		for($i=0; $i<$this->charNum; $i++) {
			/* 如果$this->chars，即字符库中全是英文的话，可以用$this->chars[随机数]来获取
			   iconv_strlen为字符串字数统计函数*/
			$charSingle = mb_substr($this->chars, 
									rand(0, iconv_strlen($this->chars, 'utf-8') - 1), 
									1, 'utf-8');
			$ascii .= $charSingle;
		}
		return $ascii;
	}

	// 创建画布并填充
	private function creatImg() {
		$this->img = imagecreatetruecolor($this->width, $this->height);            // 创建图像资源
		$bgC   = $this->color(0);                                                  // 背景颜色数组
		$back      = imagecolorallocate($this->img, $bgC[0], $bgC[1], $bgC[2]);    // 设置背景色
		
		@imagefill($this->img, 0, 0, $back);                                       // 填充图像
		$border = imagecolorallocate($this->img, $bgC[0], $bgC[0], $bgC[0]);       // 图片边框颜色
		imagerectangle($this->img, 0, 0, $this->width-1, $this->height-1, $border);// 画一个矩形
	}

	// 置入干扰元素
	private function otherCircle() { // 画弧
		// 画圆弧
		for($i=0; $i < 10; $i++) {
			$color = imagecolorallocate($this->img, rand(0,255), rand(0,255), rand(0,255));
			imagearc($this->img, 
				     rand(-10,$this->width), rand(-10,$this->height), 
				     rand(30,300),           rand(20,200),
				     55, 44, $color);
		}
	}
	private function otherPoint() { // 画点
		// 画点
		for($i=0; $i <= $this->colorOther; $i++){
			$color = imagecolorallocate($this->img, rand(0,255), rand(0,255), rand(0,255));
			imagesetpixel($this->img, rand(1,$this->width-2), rand(1,$this->height), $color);
		}		
	}

	// 写入文字
	private function outputText() {
		for ($i=0; $i < $this->charNum; $i++) { 
			$fontColor  = imagecolorallocate($this->img, $this->fontColor[0], $this->fontColor[1], $this->fontColor[2]);
			$fontSize   = rand(9, 18);
			$x          = floor($this->width / $this->charNum) * $i + 3;
			$xxxx       = $this->height - imagefontheight($fontSize);
			if($xxxx<0){
				$y      = 10;
			} else {
				$y      = rand(14, $xxxx);
			}
			$charSingle = mb_substr($this->char, $i, 1, 'utf-8');                 // 逐字输出
			// imagechar($this->img, $fontSize, $x, $y, $charSingle, $fontColor); // 不支持中文
			imagettftext($this->img, $fontSize, 0, $x, $y, $fontColor, 'msyhbd.ttf', $charSingle);
		}

	}

	// 输出图像资源到服务器
	private function outputImg() {
		if(imagetypes() & IMG_GIF) {
			header("Content-type: image/gif" );  // 指定输出图像类型
			imagegif($this->img);               // 直接输出元图像流
		} else {
			echo '请检查GD库是否支持创建GIF图像';
		}
	}

	// 析构方法，在对象结束之前自动销毁图像资源，释放内存；
	function __destruct() {
		imagedestroy($this->img);
	}
}
?>