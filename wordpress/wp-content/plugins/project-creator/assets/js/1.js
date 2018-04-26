function delete123(index){
	$('#thing' + index).remove();
}
<!--

var $ = function (id) {

    return "string" == typeof id ? document.getElementById(id) : id;

}

var Bind = function(object, fun) {

    return function() {

        return fun.apply(object, arguments);

    }

}

function AutoComplete(obj,autoObj,arr){

    this.obj=$(obj);        //输入框

    this.autoObj=$(autoObj);//DIV的根节点

    this.value_arr=arr;        //不要包含重复值

    this.index=-1;          //当前选中的DIV的索引

    this.search_value="";   //保存当前搜索的字符

}

var lenFor = function(str){
　　var byteLen=0,len=str.length;
　　if(str){
　　　　for(var i=0; i<len; i++){
　　　　　　if(str.charCodeAt(i)>255){
　　　　　　　　byteLen += 2;
　　　　　　}
　　　　　　else{
　　　　　　　　byteLen++;
　　　　　　}
　　　　}
　　　　return byteLen;
　　}
　　else{
　　　　return 0;
　　}
}


function update(name,div_index,things,thinglist,name_){
	
	var div = document.createElement("div");
                    div.className="auto_onmouseout";
                    div.seq=name;

                    div.onclick=function(){
                    	$('#' + things).append('<tr id="thing' + div_index + '"><td>' + name + '</td><td><input type="hidden" name="' + name_ +'[]" value="' + div_index + '"></input><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123(' + div_index + ')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>');
						$('#' + thinglist).empty();
                    }

                    div.onmouseover=autoComplete.autoOnmouseover(autoComplete,div_index);
                    div.innerHTML=name;
					$('#' + thinglist).append(div);
					$('#' + thinglist).attr('class','auto_show');
}

AutoComplete.prototype={

    //初始化DIV的位置

    init: function(){

        this.autoObj.style.left = this.obj.offsetLeft + "px";

        this.autoObj.style.top  = this.obj.offsetTop + this.obj.offsetHeight + "px";

        this.autoObj.style.width= this.obj.offsetWidth - 2 + "px";//减去边框的长度2px

    },

    //删除自动完成需要的所有DIV

    deleteDIV: function(){

        while(this.autoObj.hasChildNodes()){

            this.autoObj.removeChild(this.autoObj.firstChild);

        }

        this.autoObj.className="";

    },

    //设置值

    setValue: function(_this){

        return function(){

            _this.obj.value=this.seq;

            _this.autoObj.className="";

        }

    },

    //模拟鼠标移动至DIV时，DIV高亮

    autoOnmouseover: function(_this,_div_index){

        return function(){

            _this.index=_div_index;

            var length = _this.autoObj.children.length;

            for(var j=0;j<length;j++){

                if(j!=_this.index ){

                    _this.autoObj.childNodes[j].className='auto_onmouseout';

                }else{

                    _this.autoObj.childNodes[j].className='auto_onmouseover';

                }

            }

        }

    },

    //更改classname

    changeClassname: function(length){

        for(var i=0;i<length;i++){

            if(i!=this.index ){

                this.autoObj.childNodes[i].className='auto_onmouseout';

            }else{

                this.autoObj.childNodes[i].className='auto_onmouseover';

                this.obj.value=this.autoObj.childNodes[i].seq;

            }

        }

    }

    ,

    //响应键盘

    pressKey: function(event){

        var length = this.autoObj.children.length;

        //光标键"↓"

        if(event.keyCode==40){

            ++this.index;

            if(this.index>length){

                this.index=0;

            }else if(this.index==length){

                this.obj.value=this.search_value;

            }

            this.changeClassname(length);

        }

        //光标键"↑"

        else if(event.keyCode==38){

            this.index--;

            if(this.index<-1){

                this.index=length - 1;

            }else if(this.index==-1){

                this.obj.value=this.search_value;

            }

            this.changeClassname(length);

        }

        //回车键

        else if(event.keyCode==13){

            this.autoObj.className="";

            this.index=-1;

        }else{

            this.index=-1;

        }

    },

    //程序入口

    start: function(event,type,thinglist,things,name_,url){

        if(event.keyCode!=13&&event.keyCode!=38&&event.keyCode!=40){
		//alert(url);

            this.init();

            this.deleteDIV();
            $('#' + thinglist).empty();

            this.search_value=this.obj.value;

            var valueArr=this.value_arr;

            valueArr.sort();

            if(this.obj.value.replace(/(^\s*)|(\s*$)/g,'')==""){ return; }//值为空，退出

            

var leng = lenFor(this.obj.value);
            $.getJSON(url,function(result){
            	
            	$.each(result, function(i, field){
								var name = field.name;
								if(name == undefined){
								}
								
								
								if ((name != undefined) && (leng > 2)){
         update(name,field.id,things,thinglist,name_);
								} else if((field.user_login != undefined) && (leng > 2)){
									update(field.user_login,field.ID,things,thinglist,name_);
								}
								
							});
            	});
        }

        this.pressKey(event);

        window.onresize=Bind(this,function(){this.init();});

    }

}

var autoComplete=new AutoComplete('software_input','auto',['b0','b12','b22','b3','b4','b5','b6','b7','b8','b2','abd','ab','acd','accd','b1','cd','ccd','cbcv','cxf']);
var autoComplete_hardware=new AutoComplete('hardware_input','auto_hardware',['b0','b12','b22','b3','b4','b5','b6','b7','b8','b2','abd','ab','acd','accd','b1','cd','ccd','cbcv','cxf']);

var autoComplete_team=new AutoComplete('team_input','auto_team',['b0','b12','b22','b3','b4','b5','b6','b7','b8','b2','abd','ab','acd','accd','b1','cd','ccd','cbcv','cxf']);





$('#difficulty123').selectpicker('val','intermediate');
$('#difficulty123').remove();