var select = document.getElementById("quantity");
var price = document.querySelector("#price");

time=setInterval(function(){
	if(document.readyState=='complete'){
		clearInterval(time);
		getPrices();
	}
},30);

function getPrices(){
	tr=document.getElementsByTagName('tr');
	var total = 0;

	for (var i = 1; i < (tr.length); i++) {
		if (i+1==tr.length){
			tr[i].cells['total'].innerText=total;
		} else {
			total+=tr[i].cells["cantidad"].innerText*tr[1].cells["price"].innerText;
		}

	}
}
