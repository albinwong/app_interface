<?php 

class Response
{
	/**
	 * 按json方式输出通信数据方法
	 * @param  integer $code    状态码
	 * @param  string $message  提示信息
	 * @param  array $data 数据
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
}