
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
