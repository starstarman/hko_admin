
//点击状态改变刷新公共大函数
 function status_change(url,data){
    $.post(url,data,function (res) {
        if (res.data==1){
            $('#alert').html(res.mes);
            $('#my-alert').modal('open');
            $('.am-modal-btn').click(function () {
                window.location.reload();
            })
        } else{
            $('#alert').html(res.mes);
            $('#my-alert').modal('open');
        }
    });
}
