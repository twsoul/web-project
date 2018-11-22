<!-- 팝업 -->
<script>

function setCookie(name, value, expiredays){

var todayDate = new Date();

todayDate.setDate(todayDate.getDate() + expiredays);

document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"

}



function closePop(){

setCookie("closepop","closepop",1);

window.close();

} 

</script>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>오늘의 보물</h2>
    <img src="img/상품권.jpg" alt="">
    <input type="checkbox" onClick="closePop();">오늘 하루 동안 열지 않음
  </body>
</html>
