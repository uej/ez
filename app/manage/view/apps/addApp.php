<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>添加应用</title>
    <link href="/layui/css/layui.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="layui-form" style="margin-top: 20px;">
        <div class="layui-form-item">
            <label class="layui-form-label">应用标识</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" value="<?=$data['app']?>" class="layui-input" style="width: 200px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">应用标题</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" value="<?=$data['title']?>" name="title" class="layui-input" style="width: 200px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">前台路由</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" value="<?=$data['entryUrl']?>" lay-verify="pathinfo" name="entryUrl" class="layui-input" style="width: 200px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">后台路由</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" value="<?=$data['manageEntryUrl']?>" lay-verify="pathinfo" name="manageEntryUrl" class="layui-input" style="width: 200px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">logo图标</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" value="<?=$data['logo']?>" name="logo" lay-verify="logo" class="layui-input" style="width: 200px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" autocomplete="off" value="<?=$data['sort']?>" name="sort" lay-verify="number" class="layui-input" style="width: 200px;">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="开启" <?php if($data['status'] == 1) echo 'checked'; ?>>
                <input type="radio" name="status" value="0" title="关闭" <?php if($data['status'] == 0) echo 'checked'; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="dosubmit">立即提交</button>
            </div>
        </div>
    </div>
    <script src="/win10ui/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="/layui/layui.all.js" type="text/javascript"></script>
    <script>
        var form = layui.form;
        
        //表单验证
        form.verify({
            pathinfo: [
                /^[_a-zA-Z0-9\/]*$/
                ,'路由格式不正确'
            ],
            logo: [
                /^[_a-zA-Z\.\/\-\s\d]+$/
                ,'logo格式不正确'
            ]
        });  
        
        //监听提交
        form.on('submit(dosubmit)', function(data) {
            $.ajax({
                url: "<?= ez\core\Route::createUrl('addApp')?>",
                data: data.field,
                type: "post",
                dataType: "json",
                success: function(res) {
                    if(res.status == 1) {
                        layer.alert(res.info, {icon: 1}, function() {
                            var index = parent.layer.getFrameIndex(window.name); 
                            parent.layer.close(index);
                        });  
                    } else {
                        layer.alert(res.info, {icon: 2});
                    }
                },
                error: function() {
                    layer.alert('系统错误', {icon: 0});
                }
            });
            return false;
        });
    </script>
</body>
</html>