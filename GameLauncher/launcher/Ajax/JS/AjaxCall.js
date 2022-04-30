export function seeRankings(gameCode){
  let div=document.getElementById("divContent");
  var xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      div.innerHTML=this.responseText;
    };
  xhttp.open("GET", "../Ajax/PHP/AjaxShowRanks.php?gameCode="+gameCode, true);
  xhttp.send();
}
export function addScore(gameCode,score){
    var xhttp=new XMLHttpRequest();
    /**xhttp.onreadystatechange = function() {
        console.log(this.status);
        console.log(this.responseText);
      };*/
    xhttp.open("GET", "../../Ajax/PHP/AjaxAddScore.php?gameCode="+gameCode+"&score="+score, true);
    xhttp.send();
}