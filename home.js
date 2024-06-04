/*Codice per tasto indietro*/

  function onClickBack(){
    console.log("Hai premuto indietro!");
    history.back();
  }


  const indietro = document.querySelector('button');
  indietro.addEventListener('click', onClickBack);