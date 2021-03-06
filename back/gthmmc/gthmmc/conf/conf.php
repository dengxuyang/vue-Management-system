<?php
/*********************************************************************************
 * InitPHP 3.2.2 国产PHP开发框架
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By initphp.com
 * 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
 *-------------------------------------------------------------------------------
 * $Author:zhuli
 * $Dtime:2012-11-27
***********************************************************************************/
error_reporting(E_ERROR | E_PARSE);
/* 框架全局配置变量 */
$InitPHP_conf = array();
/*********************************应用配置*************************************/
$InitPHP_conf['siteName'] = "site";  //站点目录
$InitPHP_conf['adminName'] = "gthmmc";  //管理目录名称
$InitPHP_conf['managerTemplateDir'] = "managerTemplate";  //管理模板目录名
$InitPHP_conf['siteTemplateDir'] = "siteTemplate";  //管理模板目录名
$InitPHP_conf['listFilePre'] = "list";      //站点模板列表页前缀
$InitPHP_conf['detailFilePre'] = "detail";  //站点模板详情页前缀
$InitPHP_conf['uploadPath'] = "../mediaLibrary";  //上传文件所在目录名,相对于admin目录
$InitPHP_conf['svnUserName'] = "wuyt";
$InitPHP_conf['svnPassword'] = "wuyt123456";
$InitPHP_conf['dbUrl'] = "bd.likezou.com:8080";
$InitPHP_conf['ssoUrl'] = "sso.likezou.com:8080";
$InitPHP_conf['cloudUrl'] = "db.likezou.com:8080";
/*********************************基础配置*****************************************/
/**
 * 站点URL配置
 * 必选参数
 */
$InitPHP_conf['url'] = 'http://wyb3.runca.cn';
/**
 * 是否开启调试
 */
$InitPHP_conf['is_debug'] = true; //开启-正式上线请关闭
/**
 * 路由访问方式
 * 1. 如果为true 则开启path访问方式，否则关闭
 * 2. default：index.php?m=user&c=index&a=run
 * 3. rewrite：/user/index/run/?id=100
 * 4. path: /user/index/run/id/100
 * 5. html: user-index-run.htm?uid=100
 * 6. 开启PATH需要开启APACHE的rewrite模块，详细使用会在文档中体现
 */
$InitPHP_conf['isuri'] = 'default';
/**
 * 是否开启输出自动过滤
 * 1. 对多人合作，安全性可控比较差的项目建议开启
 * 2. 对HTML进行转义，可以放置XSS攻击
 * 3. 如果不开启，则提供InitPHP::output()函数来过滤
 */
$InitPHP_conf['isviewfilter'] = false;

/*********************************DAO数据库配置*****************************************/
/**
 * Dao配置参数
 * 1. 你可以配置Dao的路径和文件（类名称）的后缀名
 * 2. 一般情况下您不需要改动此配置
 */
$InitPHP_conf['dao']['dao_postfix']  = 'Dao'; //后缀
$InitPHP_conf['dao']['path']  = 'dao/'; //后缀
/**
 * 数据库配置
 * 1. 根据项目的数据库情况配置
 * 2. 支持单数据库服务器，读写分离，随机分布的方式
 * 3. 可以根据$InitPHP_conf['db']['default']['db_type'] 选择mysql mysqli（暂时支持这两种）
 * 4. 支持多库配置 $InitPHP_conf['db']['default']
 * 5. 详细见文档
 */
$InitPHP_conf['db']['driver']   = 'mysql'; //选择不同的数据库DB 引擎，一般默认mysqli,或者mysqls
//default数据库配置 一般使用中 $this->init_db('default')-> 或者 $this->init_db()-> 为默认的模型
$InitPHP_conf['db']['default']['db_type']                   = 0; //0-单个服务器，1-读写分离，2-随机
$InitPHP_conf['db']['default'][0]['host']                   = "127.0.0.1"; //主机
$InitPHP_conf['db']['default'][0]['username']               = "root"; //数据库用户名
$InitPHP_conf['db']['default'][0]['password']               = "123456"; //数据库密码
$InitPHP_conf['db']['default'][0]['database']               = 'tomms_v3.0'; //数据库  tecmp tomms_v3.0 pfems idms ooas gthmmc
$InitPHP_conf['db']['default'][0]['charset']                = 'utf8'; //数据库编码
$InitPHP_conf['db']['default'][0]['pconnect']               = 0; //是否持久链接

//test数据库配置 使用：$this->init_db('test')->  支持读写分离，随机选择（有两个数据库）
$InitPHP_conf['db']['test']['db_type']                      = 2; //0-单个服务器，1-读写分离，2-随机
$InitPHP_conf['db']['test'][0]['host']                      = '127.0.0.1'; //主机
$InitPHP_conf['db']['test'][0]['username']                  = 'root'; //数据库用户名
$InitPHP_conf['db']['test'][0]['password']                  = ''; //数据库密码
$InitPHP_conf['db']['test'][0]['database']                  = 't1'; //数据库
$InitPHP_conf['db']['test'][0]['charset']                   = 'utf8'; //数据库编码
$InitPHP_conf['db']['test'][0]['pconnect']                  = 0; //是否持久链接

$InitPHP_conf['db']['test'][1]['host']                      = '127.0.0.1'; //主机
$InitPHP_conf['db']['test'][1]['username']                  = 'root'; //数据库用户名
$InitPHP_conf['db']['test'][1]['password']                  = ''; //数据库密码
$InitPHP_conf['db']['test'][1]['database']                  = 't1'; //数据库
$InitPHP_conf['db']['test'][1]['charset']                   = 'utf8'; //数据库编码
$InitPHP_conf['db']['test'][1]['pconnect']                  = 0; //是否持久链接

/*********************************Service配置*****************************************/
/**
 * Service配置参数
 * 1. 你可以配置service的路径和文件（类名称）的后缀名
 * 2. 一般情况下您不需要改动此配置
 */
$InitPHP_conf['service']['service_postfix']  = 'Service'; //后缀
$InitPHP_conf['service']['path'] = 'service/'; //service路径

/*********************************Controller配置*****************************************/
/**
 * Controller控制器配置参数
 * 1. 你可以配置控制器默认的文件夹，默认的后缀，Action默认后缀，默认执行的Action和Controller
 * 2. 一般情况下，你可以不需要修改该配置参数
 * 3. $InitPHP_conf['ismodule']参数，当你的项目比较大的时候，可以选用module方式，
 * 开启module后，你的URL种需要带m的参数，原始：index.php?c=index&a=run, 加module：
 * index.php?m=user&c=index&a=run , module就是$InitPHP_conf['controller']['path']目录下的
 * 一个文件夹名称，请用小写文件夹名称
 */
$InitPHP_conf['ismodule'] = true; //开启module方式
$InitPHP_conf['controller']['path']                  = 'controller/';
$InitPHP_conf['controller']['controller_postfix']    = 'Controller'; //控制器文件后缀名
$InitPHP_conf['controller']['action_postfix']        = ''; //Action函数名称后缀
$InitPHP_conf['controller']['default_controller']    = 'index'; //默认执行的控制器名称
$InitPHP_conf['controller']['default_action']        = 'run'; //默认执行的Action函数
$InitPHP_conf['controller']['module_list']           = array('gthmmc','wyb', 'tomms', 'app' , 'appManager','amobiletour'
); //module白名单
$InitPHP_conf['controller']['default_module']        = 'gthmmc'; //默认执行module
$InitPHP_conf['controller']['default_before_action'] = 'before'; //默认前置的ACTION名称
$InitPHP_conf['controller']['default_after_action']  = 'after'; //默认后置ACTION名称

/*********************************View配置*****************************************/
/**
 * 模板配置
 * 1. 可以自定义模板的文件夹，编译模板路径，模板文件后缀名称，编译模板后缀名称
 * 是否编译，模板的驱动和模板的主题
 * 2. 一般情况下，默认配置是最优的配置方案，你可以不选择修改模板文件参数
 */
$InitPHP_conf['template']['template_path']      = 'template'; //模板路径
$InitPHP_conf['template']['template_c_path']    = 'template_c'; //模板编译路径
$InitPHP_conf['template']['template_type']      = 'html'; //模板文件类型
$InitPHP_conf['template']['template_c_type']    = 'tpl.php';//模板编译文件类型
$InitPHP_conf['template']['template_tag_left']  = '<!--[';//模板左标签
$InitPHP_conf['template']['template_tag_right'] = ']-->';//模板右标签
$InitPHP_conf['template']['is_compile']         = true;//模板每次编译-系统上线后可以关闭此功能
$InitPHP_conf['template']['driver']             = 'sdefault'; //不同的模板驱动编译
$InitPHP_conf['template']['theme']              = ''; //模板主题

/*********************************Hook配置*****************************************/
/**
 * 插件Hook配置
 * 1. 如果你需要使用InitPHP::hook() 钩子函数来实现插件功能
 * 2. 详细查看钩子的使用方法
 */
$InitPHP_conf['hook']['path']          = 'hook'; //插件文件夹目录， 不需要加'/'
$InitPHP_conf['hook']['class_postfix'] = 'Hook'; //默认插件类名后缀
$InitPHP_conf['hook']['file_postfix']  = '.hook.php'; //默认插件文件名称
$InitPHP_conf['hook']['config']        = 'hook.conf.php'; //配置文件

/*********************************单元测试*****************************************/
/**
 * 单元测试
 * 1. 使用工具库中的单元测试需要配置
 */
$InitPHP_conf['unittesting']['test_postfix'] = $InitPHP_conf['service']['service_postfix'] . 'Test';
$InitPHP_conf['unittesting']['path'] = 'library/test/';

/*********************************Error*****************************************/
/**
 * Error模板
 * 如果使用工具库中的error，需要配置
 */
$InitPHP_conf['error']['template'] = 'library/helper/error.tpl.php';

/*********************************缓存，Nosql配置*****************************************/
/**
 * 缓存配置参数
 * 1. 您如果使用缓存 需要配置memcache的服务器和文件缓存的缓存路径
 * 2. memcache可以配置分布式服务器，根据$InitPHP_conf['memcache'][0]的KEY值去进行添加
 * 3. 根据您的实际情况配置
 */
$InitPHP_conf['memcache'][0]   = array('127.0.0.1', '11211');
$InitPHP_conf['cache']['filepath'] = 'data/filecache';   //文件缓存目录
/**
 * MongoDB配置，如果您使用了mongo，则需要配置
 */
$InitPHP_conf['mongo']['default']['server']     = '127.0.0.1';
$InitPHP_conf['mongo']['default']['port']       = '27017';
$InitPHP_conf['mongo']['default']['option']     = array('connect' => true);
$InitPHP_conf['mongo']['default']['db_name']    = 'test';
$InitPHP_conf['mongo']['default']['username']   = '';
$InitPHP_conf['mongo']['default']['password']   = '';
/**
 * Redis配置，如果您使用了redis，则需要配置
 */
$InitPHP_conf['redis']['default']['server']     = '127.0.0.1';
$InitPHP_conf['redis']['default']['port']       = '6379';
