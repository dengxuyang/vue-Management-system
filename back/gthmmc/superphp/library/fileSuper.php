<?php
define('DS', DIRECTORY_SEPARATOR);
class fileSuper  {
	//返回数组
	private $DirArray  = array();
	private $FileArray = array();
	private $DirFileArray = array();

	private $Handle,$Dir,$File;

	//获取目录列表
	public function getDir( & $Dir ){
		if( is_dir($Dir) ){
			if( false != ($Handle = opendir($Dir)) ){
				while( false != ($File = readdir($Handle)) ){
					if( $File!='.' && $File!='..' && !strpos($File,'.') ){
						$DirArray[] = $File;
					}
				}
				closedir( $Handle );
			}
		}else{
			$DirArray[] = '[Path]:\''.$Dir.'\' is not a dir or not found!';
		}
		return $DirArray;
	}

	//获取文件列表
	public function getFile( & $Dir ){
		if( is_dir($Dir) ){
			if( false != ($Handle = opendir($Dir)) ) {
				while( false != ($File = readdir($Handle)) ){
					if( $File!='.' && $File!='..' && strpos($File,'.') ){
						$FileArray[] = $File;
					}
				}
				closedir( $Handle );
			}
		}else{
			$FileArray[] = '[Path]:\''.$Dir.'\' is not a dir or not found!';
		}
		return $FileArray;
	}

	//获取目录/文件列表
	public function getDirFile( & $Dir ){
		if( is_dir($Dir) ){
			$DirFileArray['DirList'] = $this->getDir( $Dir );
			if( $DirFileArray ){
				foreach( $DirFileArray['DirList'] as $Handle ){
					$File = $Dir.DS.$Handle;
					$DirFileArray['FileList'][$Handle] = $this->getFile( $File );
				}
			}
		}else{
			$DirFileArray[] = '[Path]:\''.$Dir.'\' is not a dir or not found!';
		}
		return $DirFileArray;
	}
}