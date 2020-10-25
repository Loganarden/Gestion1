var $dialogclient = document.getElementById('mydialogclient');
if(!('show' in $dialogclient)){
  document.getElementById('promptCompat').className = 'no_dialog';
}
$dialogclient.addEventListener('close', function() {
  console.log('Fermeture. ', this.returnValue);
});
