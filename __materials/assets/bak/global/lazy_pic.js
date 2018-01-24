
/** jq.lazy.js 
****** 初始化originalSrc替代src 填入资源地址 ******
*******************配置参数如下********************
effect:
 载入使用何种效果  effect(特效),值有show(直接显示),fadeIn(淡入),slideDown(下拉)等,常用fadeIn 
threshold:
 提前开始加载 threshold,值为数字,代表页面高度.如设置为200,表示滚动条在离目标位置还有200的高度时
    就开始加载图片,可以做到不让用户察觉
failurelimit:
 图片排序混乱时 failurelimit,值为数字.lazyload默认在找到第一张不在可见区域里的图片时
 则不再继续加载,但当HTML容器混乱的时候可能出现可见区域内图片并没加载出来的情况,
 failurelimit意在加载N张可见区域外的图片,以避免出现这个问题.
*/

/*
;$(".lazy_pic").lazyload({
    effect: "fadeIn",  
    threshold: 200, 
    failurelimit : 10 
});
*/
;eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}(';(2($,e,S,g){9 w=$(e);$.1f.1h=2(f){9 n=d;9 c;9 1={b:0,N:0,i:"I",1a:"1g",7:e,K:"1p",16:W,l:Y,B:Y,V:"1o:17/1q;1k,1l+1m/1j"};2 y(){9 J=0;n.C(2(){9 t=$(d);3(1.16&&!t.D(":1n")){6}3($.T(d,1)||$.R(d,1)){}j 3(!$.q(d,1)&&!$.m(d,1)){t.G("l");J=0}j{3(++J>1.N){6 F}}})}3(f){3(g!==f.M){f.N=f.M;1c f.M}3(g!==f.L){f.X=f.L;1c f.L}$.1d(1,f)}c=(1.7===g||1.7===e)?w:$(1.7);3(0===1.i.12("I")){c.r(1.i,2(){6 y()})}d.C(2(){9 k=d;9 s=$(k);k.v=F;3(s.o("x")===g||s.o("x")===F){3(s.D("H")){s.o("x",1.V)}}s.1r("l",2(){3(!d.v){3(1.l){9 z=n.1b;1.l.10(k,z,1)}$("<H />").r("B",2(){9 E=s.o(1.K);s.1i();3(s.D("H")){s.o("x",E)}j{s.1s("1I-17","1G(\'"+E+"\')")}s[1.1a](1.X);k.v=W;9 13=$.1H(n,2(8){6!8.v});n=$(13);3(1.B){9 z=n.1b;1.B.10(k,z,1)}}).o("x",s.o(1.K))}});3(0!==1.i.12("I")){s.r(1.i,2(){3(!k.v){s.G("l")}})}});w.r("1F",2(){y()});3((/(?:1K|1M|1L).*1J 5/1E).1w(1v.1t)){w.r("1u",2(i){3(i.15&&i.15.1y){n.C(2(){$(d).G("l")})}})}$(S).1C(2(){y()});6 d};$.q=2(8,1){9 4;3(1.7===g||1.7===e){4=(e.18?e.18:w.O())+w.19()}j{4=$(1.7).h().u+$(1.7).O()}6 4<=$(8).h().u-1.b};$.m=2(8,1){9 4;3(1.7===g||1.7===e){4=w.Q()+w.1e()}j{4=$(1.7).h().p+$(1.7).Q()}6 4<=$(8).h().p-1.b};$.T=2(8,1){9 4;3(1.7===g||1.7===e){4=w.19()}j{4=$(1.7).h().u}6 4>=$(8).h().u+1.b+$(8).O()};$.R=2(8,1){9 4;3(1.7===g||1.7===e){4=w.1e()}j{4=$(1.7).h().p}6 4>=$(8).h().p+1.b+$(8).Q()};$.14=2(8,1){6!$.m(8,1)&&!$.R(8,1)&&!$.q(8,1)&&!$.T(8,1)};$.1d($.1D[":"],{"1B-P-4":2(a){6 $.q(a,{b:0})},"Z-P-u":2(a){6!$.q(a,{b:0})},"11-A-U":2(a){6 $.m(a,{b:0})},"p-A-U":2(a){6!$.m(a,{b:0})},"1z-1A":2(a){6 $.14(a,{b:0})},"Z-P-4":2(a){6!$.q(a,{b:0})},"11-A-4":2(a){6 $.m(a,{b:0})},"p-A-4":2(a){6!$.m(a,{b:0})}})})(1x,e,S);',62,111,'|settings|function|if|fold||return|container|element|var||threshold||this|window|options|undefined|offset|event|else|self|appear|rightoffold|elements|attr|left|belowthefold|bind|||top|loaded||src|update|elements_left|of|load|each|is|original|false|trigger|img|scroll|counter|data_attribute|effectspeed|failurelimit|failure_limit|height|the|width|leftofbegin|document|abovethetop|screen|placeholder|true|effect_speed|null|above|call|right|indexOf|temp|inviewport|originalEvent|skip_invisible|image|innerHeight|scrollTop|effect|length|delete|extend|scrollLeft|fn|show|lazyload|hide|AAffA0nNPuCLAAAAAElFTkSuQmCC|base64|iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8|PB|visible|data|originalSrc|png|one|css|appVersion|pageshow|navigator|test|jQuery|persisted|in|viewport|below|ready|expr|gi|resize|url|grep|background|os|iphone|ipad|ipod'.split('|'),0,{}));
