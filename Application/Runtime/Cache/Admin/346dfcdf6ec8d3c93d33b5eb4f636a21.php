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



<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" >通用信息</span>
            <span class="tab-back" >商品描述</span>
            <span class="tab-back" >会员价格</span>
            <span class="tab-back" >商品属性</span>
            <span class="tab-back" >商品相册</span>
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/index.php/Admin/Goods/add.html" method="post">
            <table width="90%" class="tab_table" align="center">
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value=""size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                    <?php buildSelect('brand', 'brand_id', 'id', 'brand_name'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">选择分类：</td>
                    <td>
                        <select name="cat_id">
                            <?php foreach($catData as $k=>$v): ?>
                                <option value="<?php echo $v['id']; ?>">
                                    <?php echo str_repeat("-",8*$v['level']).$v['cat_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <span class="require-field">*</span></td>
                    </td>
                </tr>
                <tr>
                    <!-- 扩展分类 -->
                    <td class="label">扩展分类：<input onclick="$('#cat_list').append($('#cat_list').find('li').eq(0).clone());" type="button" id="btn_add_cat" value="add one" /></td>
                    <td>
                        <ul id="cat_list">
                            <li>
                                <select name="ext_cat_id[]">
                                    <option value="">选择分类</option>
                                    <?php foreach($catData as $k=>$v): ?>
                                        <option value="<?php echo $v['id']; ?>">
                                            <?php echo str_repeat("-",8*$v['level']).$v['cat_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="label">LOGO：</td>
                    <td><input type="file" name="logo" size="60" /></td>
                </tr>
                <tr>
                    <td class="label">市场价格：</td>
                    <td>
                        <input type="text" name="market_price" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店价格：</td>
                    <td>
                        <input type="text" name="shop_price" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_on_sale" value="是" checked="checked"/> 是
                        <input type="radio" name="is_on_sale" value="否"/> 否
                    </td>
                </tr>
            </table>
            <table width="100%" style="display:none;" class="tab_table" align="center">
                <tr>
                    <td>
                        <textarea id="goods_desc" name="goods_desc"></textarea>
                    </td>
                </tr>
            </table>
            <table width="90%" style="display:none;" class="tab_table" align="center">
                <tr>
                    <td class="label">会员价格：</td>
                    <td>
                    <?php foreach($memberData as $k=>$v): ?>
                    <p><?php echo $v['level_name'];?>: ￥ <input type="text" name="member_price[<?php echo $v['id']; ?>]" size="20"/> 元</p>
                    <?php endforeach; ?>
                    </td>
                </tr> 
            </table>
            <!--商品属性-->
            <table width="90%" style="display:none;" class="tab_table" align="center">
                <tr>
                    <td>
                        商品类型：<?php echo buildSelect('Type','type_id','id','type_name'); ?>
                    </td>            
                </tr>
                <tr>
                    <td>
                        <ul id="attr_list"></ul>
                    </td>
                </tr>
            </table>
            <!--商品相册 -->
            <table width="90%" style="display:none;" class="tab_table" align="center">
                <tr>
                    <td>
                        <input type="button" id="btn_add_pic" value="添加一张" />
                        <hr />
                        <ul id="ul_pic_list"></ul>
                    </td>            
                </tr>
            </table>
            <div class="button-div">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>

<!--在线编辑器引入的js文件以及css文件-->
<link href="/Public/umeditor1_2_2-utf8-php/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor1_2_2-utf8-php/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor1_2_2-utf8-php/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
UM.getEditor('goods_desc',{
    initialFrameWidth:"90%",
    initialFrameHeight:280
});
</script>
<script type="text/javascript">
    $('#tabbar-div p span').click(function(){
        //获取哪个按钮被点击
        var i = $(this).index();
        $(".tab_table").hide();
        $(".tab_table").eq(i).show();
        $('.tab-front').removeClass('tab-front').addClass('tab-back');
        $(this).removeClass('tab-back').addClass('tab-front');
    });

    $("#btn_add_pic").click(function(){
        var file = "<li><input type='file' name='pic[]' /></li>";
         $("#ul_pic_list").append(file);
    });

    $("select[name=type_id]").change(function(){
        var typeId = $(this).val();

        if(typeId>0){
            $.ajax({
                type: "GET",
                url: "<?php echo U('ajaxGetAttr','',FALSE); ?>/type_id/"+typeId,
                dataType: "json",
                success: function(data){
                    /****把服务器返回的属性循环拼成Li字符串,并在页面中显示****/
                    var li = "";
                    $(data).each(function(k,v)
                    {
                        li +="<li>";
                        //如果属性是可选的在前面有个+号
                        if(v.attr_type=="可选"){
                            //this 代表当前的a标签
                            li += '<a href="#" onclick="addNewAttr(this)">[+]</a>';
                        }
                        li += v.attr_name + ':';
                        //如果属性有可选值就做成下拉框，否则做成文本框
                        if(v.attr_option_values==""){
                            li += '<input type="text" name="attr_value['+v.id+'][]"/>';
                        }else{
                            li += '<select name="attr_value['+v.id+'][]"><option value="">请选择...</option>';
                            //把可选值，转化成数组的形式
                            var _attr = v.attr_option_values.split(',');
                            for(var i=0; i<_attr.length;i++){
                                li += '<option value="'+_attr[i]+'">';
                                li += _attr[i];
                                li += '</option>';
                            }
                            li += '</select>';
                        }
                        li += "</li>";
                    });

                    $("#attr_list").html(li);
                }
            });
        }else{
            $("#attr_list").html("");
        }
    });

    //点击属性的+号
    function addNewAttr(a){
        //$(a) -->  把a转换称query中的对象才能利用jquery中的方法
        var li = $(a).parent();
        if($(a).text()=="[+]"){
            var newLi = li.clone();
            //把[+]变成[-]
            newLi.find("a").text("[-]");
            //把行的newLi 放在li的后面
            li.after(newLi);
        }else{
            li.remove();
        }
    }
</script>

<div id="footer">
共执行 9 个查询，用时 0.025162 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>