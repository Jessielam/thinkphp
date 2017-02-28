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


<style>
    #ul_pic_list li{
        margin: 5px;
        list-style-type: none;
    }
    #old_pic_list li{
        float: left;
        width:  150px;
        margin: 5px;
        list-style-type: none;
    }
</style>
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
        <form enctype="multipart/form-data" action="/index.php/Admin/Goods/edit" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id'] ;?>" />
            <table width="90%" class="tab_table" align="center">
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value="<?php echo $data['goods_name']; ?>" size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                    <?php buildSelect('brand','brand_id','id','brand_name', $data['brand_id']); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">主分类：</td>
                    <td>
                    <select name="cat_id">
                        <option value="">选择分类</option>
                        <?php foreach($catData as $k=>$v): if($v['id']==$data['cat_id']){ $selected = 'selected="selected"'; }else{ $selected = ""; } ?>
                            <option <?php echo $selected; ?> value="<?php echo $v['id']; ?>"><?php echo str_repeat("-",8*$v[level]).$v['cat_name']; ?>
                            </option>
                        <?php endforeach; ?>
                        <span class="require-field">*</span></td>
                    </select>
                    </td>
                </tr>
                 <tr>
                    <!-- 扩展分类 -->
                    <td class="label">扩展分类：<input onclick="$('#cat_list').append($('#cat_list').find('li').eq(0).clone());" type="button" id="btn_add_cat" value="add one" /></td>
                    <td>
                        <ul id="cat_list">
                        <?php if($gcData): ?>
                            <?php foreach($gcData as $k1=>$v1): ?>
                            <li>
                                <select name="ext_cat_id[]">
                                    <option value="">选择分类</option>
                                    <?php foreach($catData as $k=>$v): if($v[id]==$v1['cat_id']){ $selected = 'selected="selected"'; }else{ $selected = ""; } ?>
                                        <option <?php echo $selected; ?> value="<?php echo $v['id']; ?>">
                                            <?php echo str_repeat("-",8*$v['level']).$v['cat_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                            <?php endforeach; ?>    
                        <?php else: ?>
                        <li>
                            <select name="ext_cat_id[]">
                                <option value="">选择分类</option>
                                <?php foreach($catData as $k=>$v): ?>
                                    <option  value="<?php echo $v['id']; ?>">
                                        <?php echo str_repeat("-",8*$v['level']).$v['cat_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <?php endif; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="label">LOGO：</td>
                    <td><?php echo showImage($data['mid_logo']); ?><br />
                    <input type="file" name="logo" size="60" /></td>
                </tr>
                <tr>
                    <td class="label">市场价格：</td>
                    <td>
                        <input type="text" name="market_price" value="<?php echo $data['market_price']; ?>" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店价格：</td>
                    <td>
                        <input type="text" name="shop_price" value="<?php echo $data['shop_price']; ?>" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">促销价格：</td>
                    <td>
                        ￥ <input type="text" name="promote_price" value="<?php echo $data['promote_price']; ?>" size="10"/> 元<br /> 
                    </td>
                </tr>
                <tr>
                    <td class="label">促销时间：</td>
                    <td>
                        From <input type="text" name="promote_start_time" id="promote_start_time" value="<?php echo $data['promote_start_time']; ?>"/>
                        To <input type="text" name="promote_end_time" id="promote_end_time" value="<?php echo $data['promote_end_time']; ?>"/> 
                    </td>
                </tr>
                <tr>
                    <td class="label">是否新品：</td>
                    <td>
                        <input type="radio" name="is_new" value="是" <?php if($data['is_new']=="是") echo 'checked="checked"'; ?>/> 是
                        <input type="radio" name="is_new" value="否" <?php if($data['is_new']=="否") echo 'checked="checked"'; ?>/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否热销：</td>
                    <td>
                        <input type="radio" name="is_hot" value="是" <?php if($data['is_hot']=="是") echo 'checked="checked"'; ?>/> 是
                        <input type="radio" name="is_hot" value="否" <?php if($data['is_hot']=="否") echo 'checked="checked"'; ?>/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否精品：</td>
                    <td>
                        <input type="radio" name="is_best" value="是" <?php if($data['is_best']=="是") echo 'checked="checked"'; ?>/> 是
                        <input type="radio" name="is_best" value="否" <?php if($data['is_best']=="否") echo 'checked="checked"'; ?>/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_on_sale" value="是" <?php if($data['is_on_sale']=="是") echo 'checked="checked"'; ?> /> 是
                        <input type="radio" name="is_on_sale" value="否" <?php if($data['is_on_sale']=="否") echo 'checked="checked"'; ?>/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">显示排序：</td>
                    <td>
                        <input type="text" name="order_num" value="<?php echo $data['order_num']; ?>" size="8"/>
                    </td>
                </tr>
            </table>
            <!--商品描述-->
            <table width="100%"  style="display: none;" class="tab_table" align="center">
                <tr>
                    <td>
                        <textarea id="goods_desc" name="goods_desc"><?php echo $data['goods_desc']; ?></textarea>
                    </td>
                </tr>
            </table>
            <!--会员价格设置-->
            <table width="90%" style="display: none;" class="tab_table" align="center">
                <tr>
                    <td class="label">会员价格：</td>
                    <td>
                    <?php foreach($mlData as $k1=>$v1): ?>
                        <p><?php echo $v1['level_name'];?>: ￥ <input type="text" name="member_price[<?php echo $v1['id']; ?>]" size="20" value="<?php echo $mpData[$v1['id']]; ?>" /> 元</p>
                    <?php endforeach; ?>
                       
                    </td>
                </tr>
            </table>
            <!--商品属性设置-->
            <table width="90%" style="display: none;" class="tab_table" align="center">
                <tr>
                    <td>商品类型：<?php buildSelect('Type','type_id','id','type_name',$data['type_id']); ?></td>
                </tr>
                <tr>
                    <td>
                        <ul id="attr_list">
                            <?php  $attrId = array(); foreach($gaData as $k=>$v): if(in_array($v['attr_id'],$attrId)){ $opt = '-'; }else{ $opt = '+'; $attrId[] = $v['attr_id']; } ?>
                                <li>
                                    <input type="hidden" name="goods_attr_id[]" value="<?php echo $v['id'];?>"/>
                                    <?php if($v['attr_type']=="可选"): ?>
                                            <a href="#" onclick="addNewAttr(this)">[<?php echo $opt; ?>]</a>
                                    <?php endif; ?>
                                        <?php echo $v['attr_name']; ?>
                                    <?php if($v['attr_option_values']): $_attr = explode(',', $v['attr_option_values']); ?>   
                                        <select name="attr_value[<?php echo $v['attr_id']; ?>][]">
                                            <option value="">请选择...</option>
                                            <?php foreach($_attr as $k1=>$v1): if($v['attr_value']==$v1){ $selected = 'selected="selected"'; }else{ $selected=""; } ?>
                                                <option <?php echo $selected; ?> value="<?php echo $v1;?>" ><?php echo $v1; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php else: ?>
                                        <input type="text" name="attr_value[<?php echo $v['attr_id']; ?>][]" value="<?php echo $v['attr_value']; ?>" />
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
            </table>
            <!--商品相册-->
            <table width="90%" style="display: none;" class="tab_table" align="center">
                <tr>
                    <td>
                        <input type="button" id="btn_add_pic" value="添加一张" />
                        <hr />
                        <ul id="ul_pic_list"></ul>
                        <hr />
                        <ul id="old_pic_list">
                            <?php foreach($gpData as $k=>$v): ?>
                            <li>
                                <input pic_id="<?php echo $v[id]; ?>" class="btn_del_pic" type="button" value="delete" /><br />
                                <?php showImage($v['mid_pic'], 150); ?>  
                            </li>
                             <?php endforeach; ?>
                        </ul>
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

<!--获取时间的插件需要引入的文件(基于JQuery的一个包)-->
<link href="/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>

<script type="text/javascript">
    $.timepicker.setDefaults($.timepicker.regional['zh-CN']);  //定义使用中文
    //2016-12-28 00:00
    $("#promote_start_time").datetimepicker();
    $("#promote_end_time").datetimepicker();

    //或者是：(没有时和分的显示) 2016-12-01
    //$("#fa").datepicker({ dateFormat: "yy-mm-dd" });
    //$("#ta").datepicker({ dateFormat: "yy-mm-dd" });
</script>

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
    $("#tabbar-div p span").click(function(){
        var i = $(this).index();
        $(".tab_table").hide();
        $(".tab_table").eq(i).show();
        $(".tab-front").removeClass("tab-front").addClass("tab-back");
        $(this).removeClass("tab-back").addClass("tab-front");
    });

    $("#btn_add_pic").click(function(){
        var file = "<li><input type='file' name='pic[]' /></li>";
        $("#ul_pic_list").append(file);
    });

    //删除图片
    $(".btn_del_pic").click(function(){
        if(confirm('Are you sure to delete?')){
            //先获取被选中的li
            var li = $(this).parent();
            //从这个按钮获取pic_id的属性(对应的id值)
            var pid = $(this).attr("pic_id");

            //利用ajax删除图片
            $.ajax({
                type: "GET",
                url: "<?php echo U('ajaxDelPic','',FALSE); ?>/picid/"+pid,
                success:function(data){
                    //如果成功，就把页面上的该li去掉
                    li.remove();
                }
            });
        }
    });

    $("select[name=type_id]").change(function(){
        //先获取当前选中的商品类型id
        var typeId = $(this).val();

        if(typeId>0){
            $.ajax({
                type: "GET",
                url: "<?php echo U('ajaxGetAttr','',FALSE); ?>/type_id/"+typeId,
                dataType: "json",
                success:function(data){
                    var li = "";
                    $(data).each(function(k,v){
                        li += "<li>";
                        if(v.attr_type=="可选"){
                            //如果该属性是可选的话就在前面输出[+]
                            li += '<a href="#" onclick="addNewAttr(this)">[+]</a>';
                        }
                        li += v.attr_name+':';
                        //如果该属性是有可选值的话就生成下拉框，没有就生成输入框
                        if(v.attr_option_values==""){
                            li += '<input type="text" name="" />';
                        }else{
                            li +='<select name=""><option value="">请选择...</option>';

                            //先把字符串转换成数组的形式
                            var _attr = v.attr_option_values.split(",");
                            for(var i=0; i<_attr.length; i++){
                                li += '<option value="'+_attr[i]+'">';
                                li += _attr[i];
                                li += '</option>'
                            }
                            li += '</select>'
                        }
                        li += '</li>';
                    });
                    $("#attr_list").html(li);
                }
            });
        }else{
            $("#attr_list").html("");
        }
    });

    function addNewAttr(a){
        var li = $(a).parent();
        if($(a).text()=="[+]"){
           var newLi = li.clone();
           //去掉选中状态
           newLi.find("option:selected").removeAttr("selected");
           //把clone出来的隐藏域的id清空
           newLi.find("input[name='goods_attr_id[]']").val("");
           //变+为-
           newLi.find('a').text("[-]");
           li.after(newLi);
        }else{
            //先获取这个这个属性值的id
            var gaId = li.find("input[name='goods_attr_id[]']").val();
            //如果这个属性没有Id,直接把页面上的Li删除就可以了
            if(gaId==''){
                li.remove();
            }else{
                if(confirm('如果删除了这个属性，对应的数据会被删除，你确定要删除吗？')){
                    //如果确认删除，则利用ajax进行删除
                    $.ajax({
                        type: "GET",
                        url: "<?php echo U('ajaxDelAttr?goods_id='.$data['id'],'',FALSE); ?>/gaid/"+gaId,
                        success:function(data){
                            //成功后在把页面上的li删除
                            li.remove();
                        }
                    });
                }
            }    
        }
    }
</script>


<div id="footer">
共执行 9 个查询，用时 0.025162 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>