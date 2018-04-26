//判断某值是否在指定数组内
function inArray(val,arr){
    //数组为空返回false
    if(arr.length == 0) return false;
    for(var i = 0;i<arr.length;i++){
        //在数组内返回true
        if(val == arr[i]) return true;
    }
    return false;       
}
//
function Myexplode(shotstr,longstr){
    var str = '';
    for(var i = longstr.length-1;i>=0;i--){
        if(longstr[i] == shotstr){
            return parseInt(str);
        }else{
            str = longstr[i]+str;
        }
    }
    return parseInt(str);
}
//删除数组指定的值
function remove(arr, val) {  
    for(var i=0; i<arr.length; i++) {  
        if(arr[i] == val) {  
            arr.splice(i, 1);  
            break;  
        }  
    }
}  