<?php

	// 设置最大体积
	define('FILE_MAX_SIZE', 2147483648);  # max_filesize = 2GB 
	
	if ($_FILES['up_file']['name']) {
		# 设置脚本最大执行时间
		set_time_limit(300);
		# 为一个配置选项设置值  设置最大内存
		ini_set('memory_limit', '512M');
		$file_info = $_FILES['up_file'];
		// move_uploaded_file的第二个参数 实质是移动+重命名
		$file_info['route']='./a/'.$file_info['name'];
		// 大小是否合适
		if ($file_info['size'] <= FILE_MAX_SIZE && $file_info['size'] > 0) {
			$uf_rst = move_uploaded_file($file_info['tmp_name'], $file_info['route']);

			($uf_rst == true)? die('Uploaded') : die('Failed');
		} else {
			die('Upload file size is too large');
		}
	}
?>
