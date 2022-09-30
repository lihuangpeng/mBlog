<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <title>{$_settings['admin_system_name']}</title>
    <meta name="keywords" content="{$_settings['web_keywords']}"/>
    <meta name="description" content="{$_settings['web_desc']}"/>
    @include('common.ins_plugin_css')
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    @include("common.left")
</body>
    @include("common.ins_plugin_js")
</html>