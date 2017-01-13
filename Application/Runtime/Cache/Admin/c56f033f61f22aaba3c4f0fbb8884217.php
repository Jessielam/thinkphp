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



<!-- 列表 -->
<form action="/index.php/Admin/Goods/qty/id/21.html" method="post">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <?php  $count = count($gaData); foreach($gaData as $k=>$v): ?>
                    <th ><?php echo $k; ?></th>
                <?php endforeach; ?>
                <th width="150">库存量 </th>
                <th width="150">操作</th>
            </tr>
            <?php if(count($gnData)>0): ?>
                <?php foreach($gnData as $k2=>$v2): ?>
                <tr class="tron">
                    <?php foreach($gaData as $k=>$v): ?>
                        <td>
                            <select name="goods_attr_id[]">
                                <option vlaue="">请选择...</option>
                                <?php foreach($v as $k1=>$v1): $_attr = explode(',',$v2['goods_attr_id']); if(in_array($v1['id'], $_attr)){ $selected = 'selected="selected"'; }else{ $selected=""; } ?>
                                    <option <?php echo $selected; ?> value="<?php echo $v1['id']; ?>"><?php echo $v1['attr_value']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    <?php endforeach; ?>
                    <td><input type="text" name="goods_number[]" value="<?php echo $v2['goods_number']; ?>"/></td>
                    <td><input type="button" onclick="addNewTr(this)" value="<?php echo $k2==0?'+':'-'; ?>"/></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="tron">
                    <?php foreach($gaData as $k=>$v): ?>
                        <td>
                            <select name="goods_attr_id[]">
                                <option vlaue="">请选择...</option>
                                <?php foreach($v as $k1=>$v1): ?>
                                    <option value="<?php echo $v1['id']; ?>"><?php echo $v1['attr_value']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    <?php endforeach; ?>
                    <td><input type="text" name="goods_number[]" value="<?php echo $v2['goods_number']; ?>"/></td>
                    <td><input type="button" onclick="addNewTr(this)" value="+"/></td>
                </tr>
            <?php endif; ?>
            <tr id="submit">
                <td align="center" colspan="<?php echo $count+2; ?>"><input type="submit" value="提交" /></td>
            </tr>
        </table>
    </div>
</form>

<script src="/Public/Admin/Js/tron.js"></script>
<script type="text/javascript">
    function addNewTr(btn){
        //获取当前的tr
        var tr = $(btn).parent().parent();
        if($(btn).val()=="+"){
            var newTr = tr.clone();
            newTr.find(":button").val("-");
            newTr.find("input[name='goods_number[]']").val("");
            newTr.find("option:selected").removeAttr("selected");
            $("#submit").before(newTr);
        }else{
            if(confirm('你确定要删除吗？')){
                tr.remove();
            }
        }
    }
</script>

<div id="footer">
共执行 9 个查询，用时 0.025162 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>