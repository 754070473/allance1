/**
 * Created by chenhao on 2016/6/15.
 */
function ck_page(p){
    $.ajax({
        type : 'POST',
        data : 'p='+p,
        success : function(msg){
            $('#list').html(msg)
        }
    })
}