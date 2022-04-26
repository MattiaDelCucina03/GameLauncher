export function addScore(gameCode,score){
    var xhttp=new XMLHttpRequest();
    /*xhttp.onreadystatechange = function() {
        console.log(this.status);
        console.log(this.responseText);
      };*/
    xhttp.open("GET", "../AjaxCall.php?gameCode="+gameCode+"&score="+score, true);
    xhttp.send();
}