var letter='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz '
var letters='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'
var numbers='1234567890'
var signs=',.:;@-\''
var mathsigns='+-=()*/'
var custom='<>#$%&?¿'
var cdate='-.'

function alpha(e,allow) {
var k;
k=document.all?parseInt(e.keyCode): parseInt(e.which);
return (allow.indexOf(String.fromCharCode(k))!= -1 || k== 8 || k== 37 || k== 9 || k== 39 || k== 127 || k== 13 || k== 16 || k== 20 || k== 35 || k== 36 || k== 45 || k== 46);
}
