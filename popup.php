<!-- 팝업 -->
<script type="text/javascript">

function setCookie( name, value, expiredays ){
 var todayDate = new Date();
 todayDate.setDate( todayDate.getDate() + expiredays );
 document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

function closePopup(){
 var todayCheck = document.getElementById('todayClose');
 var checkedFunc = function(){
  if(todayCheck.checked){
   setCookie( "popup", "done" , 1);
   self.close();
  }
 }
 if (document.addEventListener) {   // For all major browsers, except IE 8 and earlier
  todayCheck.addEventListener("click", checkedFunc);
 } else if (document.attachEvent) {   // For IE 8 and earlier versions
  todayCheck.attachEvent("onclick", checkedFunc);
 }
}

closePopup();  //init closePopup

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
    <label for="todayClose">오늘하루 그만보기<label><input type="checkbox" id="todayClose" onclick="closePopup();">
  </body>
</html>
