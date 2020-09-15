jQuery(document).ready(function () {



    //弹出警示提示的登录框
    $.showWaring = function (str, func) {
        // 调用show方法
        BootstrapDialog.show({
            type: BootstrapDialog.TYPE_WARNING,
            title: '提醒 ',
            message: str,
            size: BootstrapDialog.SIZE_SMALL, //size为小，默认的对话框比较宽
            buttons: [{// 设置关闭按钮
                label: '关闭',
                cssClass: 'btn-primary',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }],
            onshown: function (dialogRef) {
                setTimeout(function () {
                    dialogRef.close();
                }, 5000);
            },
            // 对话框关闭时带入callback方法
            onhide: func
        });
    };



    //弹出错误提示的登录框
    $.showError = function (str, func) {
        // 调用show方法
        BootstrapDialog.show({
            type: BootstrapDialog.TYPE_DANGER,
            title: '错误 ',
            message: str,
            size: BootstrapDialog.SIZE_SMALL, //size为小，默认的对话框比较宽
            buttons: [{// 设置关闭按钮
                label: '关闭',
                cssClass: 'btn-primary',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }],
            // 对话框关闭时带入callback方法
            onhide: func
        });
    };


    $.showConfirm = function (str) {
          BootstrapDialog.confirm({
            title: '确认',
            message:str,
            type: BootstrapDialog.TYPE_WARNING, // < - 默认值为BootstrapDialog.TYPE_PRIMARY
            closable: true, // < - 默认值为false
            draggable: true, // < - 默认值为false
            btnOKLabel: '确认', // < - 默认值为'OK'，
            btnCancelLabel:'取消',
            btnOKClass: 'btn-warning', // < - 如果你没有指定它，将使用对话框类型，
            size: BootstrapDialog.SIZE_SMALL,
            onhide:function () {
        
            },
            callback: function (result) {
                //如果单击按钮，则结果为true;如果用户直接关闭对话框，则结果为false。
                if (result) {
                   //Func(mydata);

                   alert(22222);
                } 
            }
        });
    };



    //弹出错误提示的登录框
    $.showSuccess = function (str, func) {
        // 调用show方法
        BootstrapDialog.show({
            type: BootstrapDialog.TYPE_SUCCESS,
            title: '成功 ',
            message: str,
            size: BootstrapDialog.SIZE_SMALL, //size为小，默认的对话框比较宽
            buttons: [{// 设置关闭按钮
                label: '关闭',
                cssClass: 'btn-primary',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }],
            // 对话框关闭时带入callback方法
            onhide: func
        });
    };


    $.showSuccessTimeout = function (str, func) {
        BootstrapDialog.show({
            type: BootstrapDialog.TYPE_SUCCESS,
            title: '成功 ',
            message: str,
            size: BootstrapDialog.SIZE_SMALL,
            buttons: [{
                label: '确定',
                cssClass: 'btn-primary',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }],
            // 指定时间内可自动关闭
            onshown: function (dialogRef) {
                setTimeout(function () {
                    dialogRef.close();
                }, 5000);
            },
            onhide: func
        });
    };


    $.showremote = function (title,url, func) {
        BootstrapDialog.show({
            title: title,
            message: $('<div></div>').load(url),
            buttons: [{
                label: '确定',
                cssClass: 'btn-primary',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }],
        });
     };
});