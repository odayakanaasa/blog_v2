// 使用它在项目开发过程中自动执行常见任务
var gulp = require('gulp');
// 执行shell脚本
var browserify = require('browserify');
// 文件处理
var fs = require('fs');
// 用于循序执行任务
var sequence = require('run-sequence');
// 监听文件变化

var watchify = require('watchify');

// ------------------------------------------

// 这个 task 负责调用其他 task
gulp.task('default', function () {
  // 顺序执行指定任务
  sequence('mobile');
});


// 负责mobile模块化的构建
gulp.task('mobile', function () {
  // 监听的文件名称
  var _file_name = 'index.js';
  // 需要监听的js目录
  var _watch_dir_js = 'public/static/assets/mobile/';
  // 监听后，生成的js到的对应目录
  var _save_dir_js = 'public/static/js/mobile/';
  var b = browserify({
    entries: [ _watch_dir_js + _file_name ],
    cache:{},
    packageCache:{},
    plugins:[ watchify ],
  });
  // 对实现模块化后结果的存储
  function bundle() {
    b.bundle().pipe(fs.createWriteStream(_save_dir_js + _file_name));
  }
  bundle();
  b.on('update', bundle);
 


});
