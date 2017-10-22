<?php
namespace Mine;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 常量与静态信息的解释         Link: http://www.hlzblog.top/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/** 示例
echo \Mine\Consts::code_401; // 输出其中一个状态码解释
这是用于方便对照查找
*/

class Consts{

  /**
  * 业务逻辑错误码与对应描述信息配置
  */
  const code_200 = 'success';
  const code_401 = 'API调用速度太快，请稍候重试'; // 达到接口限制调用次数
  const code_403 = '您没有相关访问权限'; // 访问权限控制
  const code_500 = '服务器内部错误';

  /**
  * 数据表中状态码 解释
  */
  const article_status_freez = 0;   // 博文 -> 已冻结
  const article_status_general = 0; // 博文 -> 正常


}