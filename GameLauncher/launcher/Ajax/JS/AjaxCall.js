export function seeRankings(gameCode){
  var xhttp=new XMLHttpRequest();
  /*xhttp.onreadystatechange = function() {
      document.append(this.responseText)
    };*/
  xhttp.open("GET", "../../Ajax/PHP/AjaxShowRanks.php?gameCode="+gameCode, true);
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
export function ciao(){
  
}