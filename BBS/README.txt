﻿【Xiuno BBS 3.0 是什么？】
Xiuno BBS 是一款国产、小巧、稳定、支持在大数据量下仍然保持高负载能力的轻型论坛。它只有 20 多个表，源代码压缩后 720k 左右，运行速度非常快，处理单次请求在 0.01 秒级别，在有 APC、XCache 的环境下可以跑到 0.00x 秒，对第三方类库依赖极少，仅仅前端依赖 jquery.js/zepto.js，作者认为它就像一辆纯手工打造的法拉利，动力强劲，没有一丝赘肉，方便部署和维护，是一个非常好的二次开发的基石。

【功能方面】
抛弃了传统论坛的，评分，精华，高亮等内容筛选功能，引入了“赞”的机制，帖子的好坏，用户组的升级、主题颜色等都与与“赞”紧密关联起来。
全新编写的编辑器支持：表格、增删行列、HTML5 客户端图片缩略，降低服务端 CPU 运算压力、支持 QQ 截图直接粘贴。
支持游客发帖、回帖、点赞。
支持自定义 URL，有利于 SEO，网址可以像这样：http://bbs.xiuno.com/xiuno-bbs-3-official-upgrade
支持 SMTP 邮件发送
支持 IP 限制：限制每日 IP 发帖数，发邮件数，上传附件数

【性能方面】
这是 Xiuno 的强项，作者自 2002 年开始接触 web 开发，一直在一线笔耕不缀，对于 web 中可能影响性能的环节了如指掌（有点像吹牛，其实是个傻子十几年下来也都知道了）。
Xiuno BBS 到底有多强悍？很多人关注这个问题，以下数据可以作为参考：
帖子数：1200w+, 用户 122w+，平均日PV 100w+（峰值远远超出这个），运行速度 0.01s，loadavg < 0.3
示例站点：http://www.btbbt.cc/

【衍生产品】
为了造福我朝程序猿，作者将框架独立出来了，便于二次开发和整合到其他项目中，并且保留全部中文注释。

【XiunoPHP 3.0】
XiunoPHP 3.0，采用简单结构，有利于 HHVM 编译 / opcode 缓存，提前与 PHP7 契合做好准备，并且倡导以下原则：
	1. 不要 include 变量
	2. 不要采用 eval(), 正则表达式 e 修饰符
	3. 不要采用 autoload
	4. 不要采用 $$var 多重变量
	5. 不要使用 PHP 高级特性 __call __set __get 等魔术方法
	6. 尽量采用函数封装功能，通过前缀区分模块。

【XiunoUI】
独立的前端框架，最低标准支持 IE8，预览地址：http://bbs.xiuno.com/xiunoui/
作者曾经用过一段时间的 bootstrap，发现命名比较冗余，标签嵌套也比较深，所谓的响应式、流式布局坑也蛮多（主要是后期维护麻烦）
在设计的领域，对于画布的大小，宽高留白是非常有讲究的，想一套代码适应不同尺寸的设备只是程序猿的乌托邦梦想。老老实实开发独立的手机版吧，否则后期的维护是个灾难，跟设计人员沟通也会让人崩溃。所以作者砍掉了里面的流式布局，并且简化了 class 名称、降低了代码嵌套深度。

【XNEditor】
它基于 zepto.js，兼容 jquery.js，只有 82k，但是实现了标准浏览器下的编辑器常见功能：加粗、斜体、颜色、字体、字号、表格、图片上传、文件上传、客户端缩略、全屏，HTML 切换、上一步下一步等功能。
因为他不用考虑IE678，所以可以实现的非常优美，短小。写过编辑器的同学应该知道，编辑器最大的一个坑就是 IE 的 Range 跟 w3c 定义的 Range 的巨大鸿沟。如果不考虑 IE，代码可以精简很多。
在我所了解到的编辑器中，兼容性最好的是百度编辑器，它依赖 jquery，又对常见的 DOM 操作进行了封装，为了兼容 IE，对 Range 也做了封装。加上代码高亮插件、脏代码过滤、Office 过滤、多语言等等，导致代码非常的复杂，牵一发而动全身，阅读的工作量要远远大于重构。
另外绝大部分其他编辑器在无刷新的情况下，会导致内存疯长，应该 DOM 节点或者闭包导致的内存泄露。

好吧，天气太热了，不多写了，speak less, show your code，让我们以码会友吧。

【授权】
Xiuno BBS 3.0 采用 MIT 协议发布，您可以自由修改、派生版本、商用而不用担心任何法律风险（修改后应保留原来的版权信息）。


