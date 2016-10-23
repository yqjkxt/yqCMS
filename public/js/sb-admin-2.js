
/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
    setHeight();

    $('#add-Modal .modal-footer .submit').bind('click',function(e){

        var form = $('#add-Modal form');
        var post_data = form.serializeArray();
        var url = form.attr('action');
        var method = form.attr('method');

        var rs = ajaxPost(url,method,post_data);
        if ( rs ){
            $('#add-Modal').modal('hide');
            window.location.reload();
        }
    });

    //编辑
    $('.edit-table').bind('click',function(e){
        var target = $(this).attr('data-target');

        var parent_node = $(this).parents('td').siblings();

        $.each(parent_node,function(index,value){
            var input_value = $(value).html();
            var key_type = $(value).attr('data-key');

            var key = key_type.split(':')[0];
            var type = key_type.split(':')[1];

            if( !type ){
                $(target + ' form input[name='+ key + ']' ).val(input_value);
            }else if( type == 'radio' ){
                $(target + ' form :radio[value='+ key + ']' ).attr('checked',true);
            }else if ( type == 'select' ){
                $(target + ' form select[name='+ key + ']' ).find('option[value='+$(value).attr('data-key-value') +']').attr('selected',true);
            }else {
                // console.log($(target + ' form input[name=_token]'));
                $(target + ' form').append('<input type="hidden" name="id" value="'+input_value+'" />');
            }

        });
        $(target).modal('show');
    });

    //删除
    $('.del-table').bind('click',function (e) {
        var del_url = $(this).attr('data-del-url');
        $.get(del_url,function( data ){
            if ( data.result ){
                layer.msg('删除成功');
                // alert('删除成功！');
            }else{
                alert('删除失败');
            }
        });
    });

});

$(function() {
    $(window).bind("load resize", function() {
        setHeight();
    });
});

function setHeight(){
    var topOffset = 50;
    var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
    if (width < 768) {
        $('div.navbar-collapse').addClass('collapse');
        topOffset = 100; // 2-row-menu
    } else {
        $('div.navbar-collapse').removeClass('collapse');
    }

    var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
    height = height - topOffset;
    if (height < 1) height = 1;
    if (height > topOffset) {
        $("#page-wrapper").css("min-height", (height) + "px");
    }
}

function ajaxPost( url,type, data ){
    var falg = false;
    $.ajax({
        url:url,
        type:type,
        data:data,
        async:false,
        success:function(rs_data){
            if ( rs_data.result ){
                falg = true;
            }else{
                $.each(rs_data.data.message,function(index,value){
                    $('input[name='+index+']').after('<span data-type="error-msg" class="text-danger">'+value+'</span>');
                });
            }
        }
    });
    return falg;
}
