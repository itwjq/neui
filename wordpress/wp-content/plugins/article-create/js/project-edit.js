$(".old_pic").dblclick(function(){
	img2input($(this));
});

function img2input(this_tag){
    this_tag.css('display','none');
    var old_name = this_tag.prev("div").find("input[type='file']").attr('name');
    var begin = old_name.length;
    var new_name = old_name.substring(0,begin-4);
    this_tag.prev("div").find("input[type='file']").attr('name',new_name);
    this_tag.prev('div').css('display','block');
}