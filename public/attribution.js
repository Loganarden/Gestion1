var $dialogattribbution = document.getElementById('mydialogattribution');
if(!('show' in $dialogattribbution)){
  document.getElementById('promptCompat').className = 'no_dialog';
}
$dialogattribbution.addEventListener('close', function() {
  console.log('Fermeture. ', this.returnValue);
});
