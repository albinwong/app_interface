<?php 

class Response
{
	const JSON = 'json';
	/**
	 * 综合方法输出通信数据方法
	 * @code   integer    状态码
	 * @message   string  提示信息
	 * @data   array 数据
	 * @type  string 数据类型
	 * @return
	 */
	static public function show($code,$message = '',$data=[],$type= self::JSON){
		if(!is_numeric($code)){
			return '';
		}

		$type = isset($_GET['format']) ? $_GET['format'] : self::JSON;
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data,		
		);

		if($type == 'json'){
			self::json($code,$message,$data);
			exit;
		}elseif($type == 'array'){
			// 调试使用
			var_dump($result);
			exit;
		}elseif($type == 'xml'){
			self::xmlEncode($code,$message,$data);
		}else{
			// To do list
		}
	}
	/**
	 * 按json方式输出通信数据方法
	 * @code   integer    状态码
	 * @message   string  提示信息
	 * @data   array 数据
	 * @return string
	 */
	static public function json($code,$message = '',$data = [])
	{
		if(!is_numeric($code)){
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);

		echo json_encode($result);
		exit;
	}


	/**
	 * 按xml方式输出通信数据方法
	 * @code   integer    状态码
	 * @message   string  提示信息
	 * @data   array 数据
	 * @return string
	 */	
	static public function xmlEncode($code,$message= '',$data = []){
		if(!is_numeric($code)){
			return '';
		}
		$result = [
			'code' => $code,
			'message' => $message,
			'data' => $data,
		];
		header("Content-Type:text/xml");//指定页面显示类型
		$xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml .= "<root>\n";
		$xml .= self::xmlToEncode($result);
		$xml .= "</root>"; 
		echo $xml;
	}

	static public function xmlToEncode($data){
		$xml = '';
		$attr = '';
		foreach ($data as $k => $v) {
			if(is_numeric($k)){
				$attr = " id='{$k}'";
				$k = "item";
			}
			$xml .= "<{$k}{$attr}>";
			$xml .= is_array($v) ? self::xmlToEncode($v) : $v;
			$xml .= "</{$k}>\n";
		}
		return $xml;
	}
}

// Response::xml();
/*$data = [
	'id' => 1,
	'name' => 'Naking',
	'type' => array(4,5,6),
];
Response::xmlEncode(200,'success',$data);*/

// <0>4</0> <item id ="0">4</item>