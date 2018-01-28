//-------------------------Markdown 基础CSS-------------------------------------
var markdown_css = "#markdown_container{margin:0;padding:0;list-style:none;word-wrap:break-word;font-family:'Microsoft Yahei',Arial,Helvetica,sans-serif;font-weight:400;font-size:14px}#markdown_container img{max-width:100%;cursor:pointer}#markdown_container pre{overflow:auto;color:#000;width:100%;border-left:10px solid #b093e5;margin:5px 0 5px 0;background-color:#fff68f;word-break:break-all;word-wrap:break-word;padding:0;font-size:inherit;white-space:pre-wrap;border-radius:0}#markdown_container h1,#markdown_container h2,#markdown_container h3,#markdown_container h4,#markdown_container h5,#markdown_container h6{color:#000;font-family:'Microsoft Yahei',Arial,Helvetica,sans-serif;font-weight:700;padding:5px 5px 5px 5px}#markdown_container p{margin:15px 0 15px 40px;padding:5px 5px 5px 5px;line-height:30px;color:#5e5e5e;-webkit-box-shadow:2px 2px 2px 2px #ecece6;box-shadow:2px 2px 2px 2px #ecece6}#markdown_container h1{font-size:48px}#markdown_container h2{font-size:36px;margin:24px 0 6px;border-bottom:1px dotted rgba(163,101,245,.4)}#markdown_container h3{font-size:24px}#markdown_container h4{font-size:21px}#markdown_container h5{font-size:18px}#markdown_container a{text-decoration:none;cursor:pointer;margin:0;color:#0e6dae;padding:2px;font-family:Serif;font-weight:700}#markdown_container a:hover{color:#00f}#markdown_container aside{display:block;float:right;width:390px}#markdown_container blockquote{color:#6a737d;margin:0;padding-left:1em;border-left:.5em #eee solid;background:#fefefe}#markdown_container blockquote cite{font-size:14px;line-height:20px;color:#bfbfbf}#markdown_container blockquote cite:before{content:'014 A0'}#markdown_container blockquote p{max-width:100%;margin-left:0;margin-top:15px;line-height:30px;-webkit-box-shadow:none;box-shadow:none}#markdown_container hr{width:540px;text-align:left;margin:0 auto 0 0;color:#999}#markdown_container button,#markdown_container input,#markdown_container select,#markdown_container textarea{font-size:100%;margin:0;vertical-align:baseline}#markdown_container button,#markdown_container input{line-height:normal}#markdown_container button::-moz-focus-inner,#markdown_container input::-moz-focus-inner{border:0;padding:0}#markdown_container button,#markdown_container input[type=button],#markdown_container input[type=reset],#markdown_container input[type=submit]{cursor:pointer;-webkit-appearance:button}#markdown_container input[type=checkbox],#markdown_container input[type=radio]{cursor:pointer}#markdown_container input:not([type=image]),#markdown_container textarea{-webkit-box-sizing:content-box;box-sizing:content-box}#markdown_container input[type=search]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;box-sizing:content-box}#markdown_container input[type=search]::-webkit-search-decoration{-webkit-appearance:none}#markdown_container input,#markdown_container label,#markdown_container select,#markdown_container textarea{font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:13px;font-weight:400;line-height:normal;margin-bottom:18px}#markdown_container input[type=checkbox],#markdown_container input[type=radio]{cursor:pointer;margin-bottom:0}#markdown_container input[type=password],#markdown_container input[type=text],#markdown_container select,#markdown_container textarea{display:inline-block;width:210px;padding:4px;font-size:13px;font-weight:400;line-height:18px;height:18px;color:grey;border:1px solid #ccc;border-radius:3px}#markdown_container input[type=file],#markdown_container select{height:27px;line-height:27px}#markdown_container textarea{height:auto}#markdown_container ::-moz-placeholder{color:#bfbfbf}#markdown_container ::-webkit-input-placeholder{color:#bfbfbf}#markdown_container input[type=password],#markdown_container input[type=text],#markdown_container select,#markdown_container textarea{-webkit-transition:border linear .2s,box-shadow linear .2s;-webkit-transition:border linear .2s,-webkit-box-shadow linear .2s;transition:border linear .2s,-webkit-box-shadow linear .2s;transition:border linear .2s,box-shadow linear .2s;transition:border linear .2s,box-shadow linear .2s,-webkit-box-shadow linear .2s;-webkit-box-shadow:inset 0 1px 3px rgba(0,0,0,.1);box-shadow:inset 0 1px 3px rgba(0,0,0,.1)}#markdown_container input[type=password]:focus,#markdown_container input[type=text]:focus,#markdown_container textarea:focus{outline:0;border-color:rgba(82,168,236,.8);-webkit-box-shadow:inset 0 1px 3px rgba(0,0,0,.1),0 0 8px rgba(82,168,236,.6);box-shadow:inset 0 1px 3px rgba(0,0,0,.1),0 0 8px rgba(82,168,236,.6)}#markdown_container button{height:30px;background-color:#3bb3e0;padding-top:1px;padding-bottom:1px;position:relative;font-family:'Open Sans',sans-serif;font-size:12px;text-decoration:none;color:#fff;background-image:-webkit-gradient(linear,left top,left bottom,from(#2ca0ca),to(#3eb8e5));background-image:linear-gradient(to bottom,#2ca0ca 0,#3eb8e5 100%);background-image:-ms-linear-gradient(to bottom,#2ca0ca 0,#3eb8e5 100%);background-image:-webkit-gradient(linear,left bottom,left top,color-stop(0,#2ca0ca),color-stop(1,#3eb8e5));-webkit-box-shadow:inset 0 1px 0 #7fd2f1,0 6px 0 #156785;-o-box-shadow:inset 0 1px 0 #7fd2f1,0 6px 0 #156785;box-shadow:inset 0 1px 0 #7fd2f1,0 6px 0 #156785;border-radius:5px}#markdown_container button::before{background-color:#072239;content:'';display:block;position:absolute;width:100%;height:100%;padding-left:2px;padding-right:2px;padding-bottom:4px;left:-2px;top:5px;z-index:-1;border-radius:6px;-webkit-box-shadow:0 1px 0 #fff;-o-box-shadow:0 1px 0 #fff;box-shadow:0 1px 0 #fff}#markdown_container button:active{color:#156785;text-shadow:0 1px 1px rgba(255,255,255,.3);background:#2ca0ca;-webkit-box-shadow:inset 0 1px 0 #7fd2f1,inset 0 -1px 0 #156785;-o-box-shadow:inset 0 1px 0 #7fd2f1,inset 0 -1px 0 #156785;box-shadow:inset 0 1px 0 #7fd2f1,inset 0 -1px 0 #156785;top:7px}#markdown_container button:active::before{top:-2px}#markdown_container table{border-collapse:collapse;border-spacing:0;margin:10px}#markdown_container thead th{background-color:#5182bb;color:#fff;border-bottom-width:0}#markdown_container td{color:#000;vertical-align:top}#markdown_container td,#markdown_container th{padding:5px 10px;font-size:12px;font-family:Verdana;font-weight:700}#markdown_container th,#markdown_container tr{border-width:1px;border-style:solid;border-color:#5182bb}#markdown_container ol,#markdown_container ul{padding-left:2em}#markdown_container li{font-size:14px}#markdown_container ol ol,#markdown_container ol ul,#markdown_container ul ol,#markdown_container ul ul{margin:0}#markdown_container ul,#markdown_container ul ul{list-style-type:square;font-size:14px}#markdown_container ol ol,#markdown_container ul ol{list-style-type:lower-roman}#markdown_container ol ol ol,#markdown_container ol ul ol,#markdown_container ul ol ol,#markdown_container ul ul ol{list-style-type:lower-alpha}";

//-------------------------Markdown CSS主题-------------------------------------
var markdown_theme = "#markdown_container .prettyprint{background:-webkit-gradient(linear,left top,left bottom,color-stop(12%,#7b3d3d),color-stop(26%,#25561a),color-stop(21%,#2f4c2f),color-stop(15%,#633333),to(#1f1f4c));background:linear-gradient(#7b3d3d 12%,#25561a 26%,#2f4c2f 21%,#633333 15%,#1f1f4c);font-family:Menlo,'Bitstream Vera Sans Mono','DejaVu Sans Mono',Monaco,Consolas,monospace;border:0!important}#markdown_container .pln{color:#ccc}#markdown_container ol.linenums{margin-top:0;margin-bottom:0;color:#999}#markdown_container li.L0,#markdown_container li.L1,#markdown_container li.L2,#markdown_container li.L3,#markdown_container li.L4,#markdown_container li.L5,#markdown_container li.L6,#markdown_container li.L7,#markdown_container li.L8,#markdown_container li.L9{padding-left:1em;background-color:#2d2d2d;list-style-type:decimal}@media screen{#markdown_container .str{color:#9c9}#markdown_container .kwd{color:#c9c}#markdown_container .com{color:#999}#markdown_container .typ{color:#69c}#markdown_container .lit{color:#f99157}#markdown_container .pun{color:#ccc}#markdown_container .opn{color:#ccc}#markdown_container .clo{color:#ccc}#markdown_container .tag{color:#f2777a}#markdown_container .atn{color:#f99157}#markdown_container .atv{color:#6cc}#markdown_container .dec{color:#f99157}#markdown_container .var{color:#f2777a}#markdown_container .fun{color:#69c}}";
//-------------------------核心运行-------------------------------------
(function(){
    var  markdown_theme_dom, add_where;
    markdown_theme_dom = document.createElement("style");
    markdown_theme_dom.innerHTML = markdown_css + markdown_theme;
    add_where = document.getElementsByTagName("head")[0];
    if(null !== document.getElementById("markdown_container")) {
      add_where.appendChild(markdown_theme_dom);
      var $, arr_addClass;
      $ = document.querySelectorAll.bind(document);
      arr_addClass = $("#markdown_container > pre");
      for(var i = 0; i < arr_addClass.length; i++) {
        arr_addClass[i].className += " prettyprint linenums ";
      }
    }
})();

//-------------------------核心运行 基于google的prettify.js -------------------------------------

!function(){(function(){function ba(g){function k(){try{M.doScroll("left")}catch(g){t.setTimeout(k,50);return}z("poll")}function z(k){if("readystatechange"!=k.type||"complete"==A.readyState)("load"==k.type?t:A)[B](p+k.type,z,!1),!q&&(q=!0)&&g.call(t,k.type||k)}var Y=A.addEventListener,q=!1,C=!0,x=Y?"addEventListener":"attachEvent",B=Y?"removeEventListener":"detachEvent",p=Y?"":"on";if("complete"==A.readyState)g.call(t,"lazy");else{if(A.createEventObject&&M.doScroll){try{C=!t.frameElement}catch(da){}C&&k()}A[x](p+"DOMContentLoaded",z,!1);A[x](p+"readystatechange",z,!1);t[x](p+"load",z,!1)}}function U(){V&&ba(function(){var g=N.length;ca(g?function(){for(var k=0;k<g;++k)(function(g){t.setTimeout(function(){t.exports[N[g]].apply(t,arguments)},0)})(k)}:void 0)})}for(var t=window,A=document,M=A.documentElement,O=A.head||A.getElementsByTagName("head")[0]||M,B="",F=A.getElementsByTagName("script"),q=F.length;0<=--q;){var P=F[q],Z=P.src.match(/^[^?#]*\/run_prettify\.js(\?[^#]*)?(?:#.*)?$/);if(Z){B=Z[1]||"";P.parentNode.removeChild(P);break}}var V=!0,H=[],Q=[],N=[];B.replace(/[?&]([^&=]+)=([^&]+)/g,function(g,k,z){z=decodeURIComponent(z);k=decodeURIComponent(k);"autorun"==k?V=!/^[0fn]/i.test(z):"lang"==k?H.push(z):"skin"==k?Q.push(z):"callback"==k&&N.push(z)});q=0;for(B=H.length;q<B;++q)(function(){var g=A.createElement("script");g.onload=g.onerror=g.onreadystatechange=function(){!g||g.readyState&&!/loaded|complete/.test(g.readyState)||(g.onerror=g.onload=g.onreadystatechange=null,--T,T||t.setTimeout(U,0),g.parentNode&&g.parentNode.removeChild(g),g=null)};g.type="text/javascript";g.src="https://cdn.rawgit.com/google/code-prettify/master/loader/lang-"+encodeURIComponent(H[q])+".js";O.insertBefore(g,O.firstChild)})(H[q]);for(var T=H.length,F=[],q=0,B=Q.length;q<B;++q)F.push("https://cdn.rawgit.com/google/code-prettify/master/loader/skins/"+encodeURIComponent(Q[q])+".css");F.push("");(function(g){function k(q){if(q!==z){var t=A.createElement("link");t.rel="stylesheet";t.type="text/css";q+1<z&&(t.error=t.onerror=function(){k(q+1)});t.href=g[q];O.appendChild(t)}}var z=g.length;k(0)})(F);var ca=function(){window.PR_SHOULD_USE_CONTINUATION=!0;var g;(function(){function k(a){function d(e){var b=e.charCodeAt(0);if(92!==b)return b;var a=e.charAt(1);return(b=W[a])?b:"0"<=a&&"7">=a?parseInt(e.substring(1),8):"u"===a||"x"===a?parseInt(e.substring(2),16):e.charCodeAt(1)}function f(e){if(32>e)return(16>e?"\\x0":"\\x")+e.toString(16);e=String.fromCharCode(e);return"\\"===e||"-"===e||"]"===e||"^"===e?"\\"+e:e}function b(e){var b=e.substring(1,e.length-1).match(/\\u[0-9A-Fa-f]{4}|\\x[0-9A-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\s\S]|-|[^-\\]/g);e=[];var a="^"===b[0],c=["["];a&&c.push("^");for(var a=a?1:0,h=b.length;a<h;++a){var l=b[a];if(/\\[bdsw]/i.test(l))c.push(l);else{var l=d(l),n;a+2<h&&"-"===b[a+1]?(n=d(b[a+2]),a+=2):n=l;e.push([l,n]);65>n||122<l||(65>n||90<l||e.push([Math.max(65,l)|32,Math.min(n,90)|32]),97>n||122<l||e.push([Math.max(97,l)&-33,Math.min(n,122)&-33]))}}e.sort(function(e,a){return e[0]-a[0]||a[1]-e[1]});b=[];h=[];for(a=0;a<e.length;++a)l=e[a],l[0]<=h[1]+1?h[1]=Math.max(h[1],l[1]):b.push(h=l);for(a=0;a<b.length;++a)l=b[a],c.push(f(l[0])),l[1]>l[0]&&(l[1]+1>l[0]&&c.push("-"),c.push(f(l[1])));c.push("]");return c.join("")}function g(e){for(var a=e.source.match(/(?:\[(?:[^\x5C\x5D]|\\[\s\S])*\]|\\u[A-Fa-f0-9]{4}|\\x[A-Fa-f0-9]{2}|\\[0-9]+|\\[^ux0-9]|\(\?[:!=]|[\(\)\^]|[^\x5B\x5C\(\)\^]+)/g),c=a.length,d=[],h=0,l=0;h<c;++h){var n=a[h];"("===n?++l:"\\"===n.charAt(0)&&(n=+n.substring(1))&&(n<=l?d[n]=-1:a[h]=f(n))}for(h=1;h<d.length;++h)-1===d[h]&&(d[h]=++k);for(l=h=0;h<c;++h)n=a[h],"("===n?(++l,d[l]||(a[h]="(?:")):"\\"===n.charAt(0)&&(n=+n.substring(1))&&n<=l&&(a[h]="\\"+d[n]);for(h=0;h<c;++h)"^"===a[h]&&"^"!==a[h+1]&&(a[h]="");if(e.ignoreCase&&I)for(h=0;h<c;++h)n=a[h],e=n.charAt(0),2<=n.length&&"["===e?a[h]=b(n):"\\"!==e&&(a[h]=n.replace(/[a-zA-Z]/g,function(a){a=a.charCodeAt(0);return"["+String.fromCharCode(a&-33,a|32)+"]"}));return a.join("")}for(var k=0,I=!1,m=!1,J=0,c=a.length;J<c;++J){var r=a[J];if(r.ignoreCase)m=!0;else if(/[a-z]/i.test(r.source.replace(/\\u[0-9a-f]{4}|\\x[0-9a-f]{2}|\\[^ux]/gi,""))){I=!0;m=!1;break}}for(var W={b:8,t:9,n:10,v:11,f:12,r:13},u=[],J=0,c=a.length;J<c;++J){r=a[J];if(r.global||r.multiline)throw Error(""+r);u.push("(?:"+g(r)+")")}return new RegExp(u.join("|"),m?"gi":"g")}function q(a,d){function f(a){var c=a.nodeType;if(1==c){if(!b.test(a.className)){for(c=a.firstChild;c;c=c.nextSibling)f(c);c=a.nodeName.toLowerCase();if("br"===c||"li"===c)g[m]="\n",I[m<<1]=k++,I[m++<<1|1]=a}}else if(3==c||4==c)c=a.nodeValue,c.length&&(c=d?c.replace(/\r\n?/g,"\n"):c.replace(/[ \t\r\n]+/g," "),g[m]=c,I[m<<1]=k,k+=c.length,I[m++<<1|1]=a)}var b=/(?:^|\s)nocode(?:\s|$)/,g=[],k=0,I=[],m=0;f(a);return{a:g.join("").replace(/\n$/,""),c:I}}function t(a,d,f,b,g){f&&(a={h:a,l:1,j:null,m:null,a:f,c:null,i:d,g:null},b(a),g.push.apply(g,a.g))}function A(a){for(var d=void 0,f=a.firstChild;f;f=f.nextSibling)var b=f.nodeType,d=1===b?d?a:f:3===b?T.test(f.nodeValue)?a:d:d;return d===a?void 0:d}function C(a,d){function f(a){for(var m=a.i,k=a.h,c=[m,"pln"],r=0,W=a.a.match(g)||[],u={},e=0,q=W.length;e<q;++e){var D=W[e],w=u[D],h=void 0,l;if("string"===typeof w)l=!1;else{var n=b[D.charAt(0)];if(n)h=D.match(n[1]),w=n[0];else{for(l=0;l<p;++l)if(n=d[l],h=D.match(n[1])){w=n[0];break}h||(w="pln")}!(l=5<=w.length&&"lang-"===w.substring(0,5))||h&&"string"===typeof h[1]||(l=!1,w="src");l||(u[D]=w)}n=r;r+=D.length;if(l){l=h[1];var E=D.indexOf(l),G=E+l.length;h[2]&&(G=D.length-h[2].length,E=G-l.length);w=w.substring(5);t(k,m+n,D.substring(0,E),f,c);t(k,m+n+E,l,F(w,l),c);t(k,m+n+G,D.substring(G),f,c)}else c.push(m+n,w)}a.g=c}var b={},g;(function(){for(var f=a.concat(d),m=[],p={},c=0,r=f.length;c<r;++c){var q=f[c],u=q[3];if(u)for(var e=u.length;0<=--e;)b[u.charAt(e)]=q;q=q[1];u=""+q;p.hasOwnProperty(u)||(m.push(q),p[u]=null)}m.push(/[\0-\uffff]/);g=k(m)})();var p=d.length;return f}function x(a){var d=[],f=[];a.tripleQuotedStrings?d.push(["str",/^(?:\'\'\'(?:[^\'\\]|\\[\s\S]|\'{1,2}(?=[^\']))*(?:\'\'\'|$)|\"\"\"(?:[^\"\\]|\\[\s\S]|\"{1,2}(?=[^\"]))*(?:\"\"\"|$)|\'(?:[^\\\']|\\[\s\S])*(?:\'|$)|\"(?:[^\\\"]|\\[\s\S])*(?:\"|$))/,null,"'\""]):a.multiLineStrings?d.push(["str",/^(?:\'(?:[^\\\']|\\[\s\S])*(?:\'|$)|\"(?:[^\\\"]|\\[\s\S])*(?:\"|$)|\`(?:[^\\\`]|\\[\s\S])*(?:\`|$))/,null,"'\"`"]):d.push(["str",/^(?:\'(?:[^\\\'\r\n]|\\.)*(?:\'|$)|\"(?:[^\\\"\r\n]|\\.)*(?:\"|$))/,null,"\"'"]);a.verbatimStrings&&f.push(["str",/^@\"(?:[^\"]|\"\")*(?:\"|$)/,null]);var b=a.hashComments;b&&(a.cStyleComments?(1<b?d.push(["com",/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,null,"#"]):d.push(["com",/^#(?:(?:define|e(?:l|nd)if|else|error|ifn?def|include|line|pragma|undef|warning)\b|[^\r\n]*)/,null,"#"]),f.push(["str",/^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h(?:h|pp|\+\+)?|[a-z]\w*)>/,null])):d.push(["com",/^#[^\r\n]*/,null,"#"]));a.cStyleComments&&(f.push(["com",/^\/\/[^\r\n]*/,null]),f.push(["com",/^\/\*[\s\S]*?(?:\*\/|$)/,null]));if(b=a.regexLiterals){var g=(b=1<b?"":"\n\r")?".":"[\\S\\s]";f.push(["lang-regex",RegExp("^(?:^^\\.?|[+-]|[!=]=?=?|\\#|%=?|&&?=?|\\(|\\*=?|[+\\-]=|->|\\/=?|::?|<<?=?|>>?>?=?|,|;|\\?|@|\\[|~|{|\\^\\^?=?|\\|\\|?=?|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\\s*("+("/(?=[^/*"+b+"])(?:[^/\\x5B\\x5C"+b+"]|\\x5C"+g+"|\\x5B(?:[^\\x5C\\x5D"+b+"]|\\x5C"+g+")*(?:\\x5D|$))+/")+")")])}(b=a.types)&&f.push(["typ",b]);b=(""+a.keywords).replace(/^ | $/g,"");b.length&&f.push(["kwd",new RegExp("^(?:"+b.replace(/[\s,]+/g,"|")+")\\b"),null]);d.push(["pln",/^\s+/,null," \r\n\t\u00a0"]);b="^.[^\\s\\w.$@'\"`/\\\\]*";a.regexLiterals&&(b+="(?!s*/)");f.push(["lit",/^@[a-z_$][a-z_$@0-9]*/i,null],["typ",/^(?:[@_]?[A-Z]+[a-z][A-Za-z_$@0-9]*|\w+_t\b)/,null],["pln",/^[a-z_$][a-z_$@0-9]*/i,null],["lit",/^(?:0x[a-f0-9]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+\-]?\d+)?)[a-z]*/i,null,"0123456789"],["pln",/^\\[\s\S]?/,null],["pun",new RegExp(b),null]);return C(d,f)}function B(a,d,f){function b(a){var c=a.nodeType;if(1==c&&!k.test(a.className))if("br"===a.nodeName)g(a),a.parentNode&&a.parentNode.removeChild(a);else for(a=a.firstChild;a;a=a.nextSibling)b(a);else if((3==c||4==c)&&f){var d=a.nodeValue,p=d.match(q);p&&(c=d.substring(0,p.index),a.nodeValue=c,(d=d.substring(p.index+p[0].length))&&a.parentNode.insertBefore(m.createTextNode(d),a.nextSibling),g(a),c||a.parentNode.removeChild(a))}}function g(a){function b(a,c){var d=c?a.cloneNode(!1):a,n=a.parentNode;if(n){var n=b(n,1),e=a.nextSibling;n.appendChild(d);for(var f=e;f;f=e)e=f.nextSibling,n.appendChild(f)}return d}for(;!a.nextSibling;)if(a=a.parentNode,!a)return;a=b(a.nextSibling,0);for(var d;(d=a.parentNode)&&1===d.nodeType;)a=d;c.push(a)}for(var k=/(?:^|\s)nocode(?:\s|$)/,q=/\r\n?|\n/,m=a.ownerDocument,p=m.createElement("li");a.firstChild;)p.appendChild(a.firstChild);for(var c=[p],r=0;r<c.length;++r)b(c[r]);d===(d|0)&&c[0].setAttribute("value",d);var t=m.createElement("ol");t.className="linenums";d=Math.max(0,d-1|0)||0;for(var r=0,u=c.length;r<u;++r)p=c[r],p.className="L"+(r+d)%10,p.firstChild||p.appendChild(m.createTextNode("\u00a0")),t.appendChild(p);a.appendChild(t)}function p(a,d){for(var f=d.length;0<=--f;){var b=d[f];X.hasOwnProperty(b)?R.console&&console.warn("cannot override language handler %s",b):X[b]=a}}function F(a,d){a&&X.hasOwnProperty(a)||(a=/^\s*</.test(d)?"default-markup":"default-code");return X[a]}function H(a){var d=a.j;try{var f=q(a.h,a.l),b=f.a;a.a=b;a.c=f.c;a.i=0;F(d,b)(a);var g=/\bMSIE\s(\d+)/.exec(navigator.userAgent),g=g&&8>=+g[1],d=/\n/g,p=a.a,k=p.length,f=0,m=a.c,t=m.length,b=0,c=a.g,r=c.length,x=0;c[r]=k;var u,e;for(e=u=0;e<r;)c[e]!==c[e+2]?(c[u++]=c[e++],c[u++]=c[e++]):e+=2;r=u;for(e=u=0;e<r;){for(var A=c[e],D=c[e+1],w=e+2;w+2<=r&&c[w+1]===D;)w+=2;c[u++]=A;c[u++]=D;e=w}c.length=u;var h=a.h;a="";h&&(a=h.style.display,h.style.display="none");try{for(;b<t;){var l=m[b+2]||k,n=c[x+2]||k,w=Math.min(l,n),E=m[b+1],G;if(1!==E.nodeType&&(G=p.substring(f,w))){g&&(G=G.replace(d,"\r"));E.nodeValue=G;var aa=E.ownerDocument,v=aa.createElement("span");v.className=c[x+1];var B=E.parentNode;B.replaceChild(v,E);v.appendChild(E);f<l&&(m[b+1]=E=aa.createTextNode(p.substring(w,l)),B.insertBefore(E,v.nextSibling))}f=w;f>=l&&(b+=2);f>=n&&(x+=2)}}finally{h&&(h.style.display=a)}}catch(y){R.console&&console.log(y&&y.stack||y)}}var R=window,K=["break,continue,do,else,for,if,return,while"],L=[[K,"auto,case,char,const,default,double,enum,extern,float,goto,inline,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"],"catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"],S=[L,"alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,delegate,dynamic_cast,explicit,export,friend,generic,late_check,mutable,namespace,nullptr,property,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],M=[L,"abstract,assert,boolean,byte,extends,finally,final,implements,import,instanceof,interface,null,native,package,strictfp,super,synchronized,throws,transient"],N=[L,"abstract,as,base,bool,by,byte,checked,decimal,delegate,descending,dynamic,event,finally,fixed,foreach,from,group,implicit,in,interface,internal,into,is,let,lock,null,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var,virtual,where"],L=[L,"debugger,eval,export,function,get,instanceof,null,set,undefined,var,with,Infinity,NaN"],O=[K,"and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],P=[K,"alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],K=[K,"case,done,elif,esac,eval,fi,function,in,local,set,then,until"],Q=/^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)\b/,T=/\S/,U=x({keywords:[S,N,M,L,"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",O,P,K],hashComments:!0,cStyleComments:!0,multiLineStrings:!0,regexLiterals:!0}),X={};p(U,["default-code"]);p(C([],[["pln",/^[^<?]+/],["dec",/^<!\w[^>]*(?:>|$)/],["com",/^<\!--[\s\S]*?(?:-\->|$)/],["lang-",/^<\?([\s\S]+?)(?:\?>|$)/],["lang-",/^<%([\s\S]+?)(?:%>|$)/],["pun",/^(?:<[%?]|[%?]>)/],["lang-",/^<xmp\b[^>]*>([\s\S]+?)<\/xmp\b[^>]*>/i],["lang-js",/^<script\b[^>]*>([\s\S]*?)(<\/script\b[^>]*>)/i],["lang-css",/^<style\b[^>]*>([\s\S]*?)(<\/style\b[^>]*>)/i],["lang-in.tag",/^(<\/?[a-z][^<>]*>)/i]]),"default-markup htm html mxml xhtml xml xsl".split(" "));p(C([["pln",/^[\s]+/,null," \t\r\n"],["atv",/^(?:\"[^\"]*\"?|\'[^\']*\'?)/,null,"\"'"]],[["tag",/^^<\/?[a-z](?:[\w.:-]*\w)?|\/?>$/i],["atn",/^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],["lang-uq.val",/^=\s*([^>\'\"\s]*(?:[^>\'\"\s\/]|\/(?=\s)))/],["pun",/^[=<>\/]+/],["lang-js",/^on\w+\s*=\s*\"([^\"]+)\"/i],["lang-js",/^on\w+\s*=\s*\'([^\']+)\'/i],["lang-js",/^on\w+\s*=\s*([^\"\'>\s]+)/i],["lang-css",/^style\s*=\s*\"([^\"]+)\"/i],["lang-css",/^style\s*=\s*\'([^\']+)\'/i],["lang-css",/^style\s*=\s*([^\"\'>\s]+)/i]]),["in.tag"]);p(C([],[["atv",/^[\s\S]+/]]),["uq.val"]);p(x({keywords:S,hashComments:!0,cStyleComments:!0,types:Q}),"c cc cpp cxx cyc m".split(" "));p(x({keywords:"null,true,false"}),["json"]);p(x({keywords:N,hashComments:!0,cStyleComments:!0,verbatimStrings:!0,types:Q}),["cs"]);p(x({keywords:M,cStyleComments:!0}),["java"]);p(x({keywords:K,hashComments:!0,multiLineStrings:!0}),["bash","bsh","csh","sh"]);p(x({keywords:O,hashComments:!0,multiLineStrings:!0,tripleQuotedStrings:!0}),["cv","py","python"]);p(x({keywords:"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",hashComments:!0,multiLineStrings:!0,regexLiterals:2}),["perl","pl","pm"]);p(x({keywords:P,hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["rb","ruby"]);p(x({keywords:L,cStyleComments:!0,regexLiterals:!0}),["javascript","js"]);p(x({keywords:"all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,throw,true,try,unless,until,when,while,yes",hashComments:3,cStyleComments:!0,multilineStrings:!0,tripleQuotedStrings:!0,regexLiterals:!0}),["coffee"]);p(C([],[["str",/^[\s\S]+/]]),["regex"]);var V=R.PR={createSimpleLexer:C,registerLangHandler:p,sourceDecorator:x,PR_ATTRIB_NAME:"atn",PR_ATTRIB_VALUE:"atv",PR_COMMENT:"com",PR_DECLARATION:"dec",PR_KEYWORD:"kwd",PR_LITERAL:"lit",PR_NOCODE:"nocode",PR_PLAIN:"pln",PR_PUNCTUATION:"pun",PR_SOURCE:"src",PR_STRING:"str",PR_TAG:"tag",PR_TYPE:"typ",prettyPrintOne:function(a,d,f){f=f||!1;d=d||null;var b=document.createElement("div");b.innerHTML="<pre>"+a+"</pre>";b=b.firstChild;f&&B(b,f,!0);H({j:d,m:f,h:b,l:1,a:null,i:null,c:null,g:null});return b.innerHTML},prettyPrint:g=g=function(a,d){function f(){for(var b=R.PR_SHOULD_USE_CONTINUATION?c.now()+250:Infinity;r<p.length&&c.now()<b;r++){for(var d=p[r],k=h,q=d;q=q.previousSibling;){var m=q.nodeType,v=(7===m||8===m)&&q.nodeValue;if(v?!/^\??prettify\b/.test(v):3!==m||/\S/.test(q.nodeValue))break;if(v){k={};v.replace(/\b(\w+)=([\w:.%+-]+)/g,function(a,b,c){k[b]=c});break}}q=d.className;if((k!==h||u.test(q))&&!e.test(q)){m=!1;for(v=d.parentNode;v;v=v.parentNode)if(w.test(v.tagName)&&v.className&&u.test(v.className)){m=!0;break}if(!m){d.className+=" prettyprinted";m=k.lang;if(!m){var m=q.match(t),C;!m&&(C=A(d))&&z.test(C.tagName)&&(m=C.className.match(t));m&&(m=m[1])}if(x.test(d.tagName))v=1;else var v=d.currentStyle,y=g.defaultView,v=(v=v?v.whiteSpace:y&&y.getComputedStyle?y.getComputedStyle(d,null).getPropertyValue("white-space"):0)&&"pre"===v.substring(0,3);y=k.linenums;(y="true"===y||+y)||(y=(y=q.match(/\blinenums\b(?::(\d+))?/))?y[1]&&y[1].length?+y[1]:!0:!1);y&&B(d,y,v);H({j:m,h:d,m:y,l:v,a:null,i:null,c:null,g:null})}}}r<p.length?R.setTimeout(f,250):"function"===typeof a&&a()}for(var b=d||document.body,g=b.ownerDocument||document,b=[b.getElementsByTagName("pre"),b.getElementsByTagName("code"),b.getElementsByTagName("xmp")],p=[],k=0;k<b.length;++k)for(var m=0,q=b[k].length;m<q;++m)p.push(b[k][m]);var b=null,c=Date;c.now||(c={now:function(){return+new Date}});var r=0,t=/\blang(?:uage)?-([\w.]+)(?!\S)/,u=/\bprettyprint\b/,e=/\bprettyprinted\b/,x=/pre|xmp/i,z=/^code$/i,w=/^(?:pre|code|xmp)$/i,h={};f()}},S=R.define;"function"===typeof S&&S.amd&&S("google-code-prettify",[],function(){return V})})();return g}();T||t.setTimeout(U,0)})()}();