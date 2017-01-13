<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - <?php echo $_web_title; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"><?php echo $_page_btn_name; ?></a>
    </span>
    <span class="action-span1"><a href="__GROUP__">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $_page_title; ?> </span>
    <div style="clear:both"></div>
</h1>



<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>分类名称</th>
                <th>操作</th>
            </tr>
            <?php foreach($data as $k=>$v): ?>
            <tr class="tron">
                <td align="left"><?php echo str_repeat("-", $v[level]*8).$v['cat_name']; ?></td>
                <td align="center">
                <a href="/index.php/Goods/?goods_id=<<?php echo ($val["goods_id"]); ?>>" target="_blank" title="查看"><img src="/Public/Admin/Images/icon_view.gif" width="16" height="16" border="0" /></a>
                <a href="<?php echo U('edit?id='.$v['id']); ?>" title="编辑"><img src="/Public/Admin/Images/icon_edit.gif" width="16" height="16" border="0" /></a>
                <a onclick="return confirm('确认删除吗？')"href="<?php echo U('delete?id='.$v['id']); ?>" onclick="" title="回收站"><img src="/Public/Admin/Images/icon_trash.gif" width="16" height="16" border="0" /></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</form>

<!--引入行高亮显示的js文件-->
<script type="text/javascript" src="/Public/Admin/Js/tron.js"></script>



<div id="footer">
共执行 9 个查询，用时 0.025162 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>