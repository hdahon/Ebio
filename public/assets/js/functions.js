

 function test(){
 	var test=document.getElementById('prod');
 	var sel =test.options[test.selectedIndex].id.split("e");
 	var prix =sel[0];
 	var nbPanier=sel[1];
 	//alert("It s ok "+nbPanier); 
 	if(nbPanier == 1 || nbPanier==2){
 		nbPanier=2;
 	}else{
 		nbPanier=4;
 	}
 	document.getElementById('prix').value =prix;
 	document.getElementById('nbPanier').value = nbPanier;
 	document.getElementById('montant').value = nbPanier*prix;
}

function newPaiement() {
    console.log("in sendForm()");
    var url =url("/paiement/new");
    var myForm = document.querySelector("#myForm");
    
    var data = new FormData(myForm);

    sendFormDataWithXhr2(url, data);
    

    return false;
}   

function sendFormDataWithXhr2(url, data) {
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url); 
  

    xhr.onload = function () {
        console.log(' sending complete !');

    };

    xhr.onerror = function () {
        console.log("erreur lors de l'envoi "+url);
    }
    
    
    xhr.send(data);
}



