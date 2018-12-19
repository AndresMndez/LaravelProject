<<<<<<< HEAD

select = document.querySelectorAll('#quantity');

precioTotal = document.querySelectorAll('#price2')

price = document.querySelectorAll('#price');

  // for (var i = 0; i < select.length; i++) {
  //     seleccionador = select[i];
  //     preciio = price[i];
  //     preciio = preciio.innerText;
  //     ptotal = precioTotal[i];
  //
  //     console.log('Este es el ciclo ' + i);;
  //     seleccionador.addEventListener('change', function(){
  //       select2 = seleccionador.selectedIndex+1;
  //       total = select2 * preciio;
  //       ptotal.innerText = total;
  //   });
  // }

  precioTotal.map(function(){
    for (var i = 0; i < select.length; i++) {
      preciio = price[i];
      preciio = preciio.innerText;
      seleccionador.addEventListener('change', function(){
        select2 = seleccionador.selectedIndex+1;
        total = select2 * preciio;
        precioTotal.innerText = total;
      });
    };
  });

// precioTotal.innerText =  total;
// price.forEach(function(valor, index2){
//   console.log("Este es index 2" + index)
//   select.forEach(function(value, index){
//
//
//   console.log("Este es index 1" + index)
//     if (index == index2) {
//       // console.log(price)
//
//     }

    // var price2 = valor.innerText;
    // select2 = value.selectedIndex+1;
    // var total = select2 * price;
    // console.log(value);
    // console.log(total);
    // console.log(select2);

    // value.addEventListener('change', function(){
    //   select2 = select.selectedIndex+1;
    //   total = select2 * price;
    //   precioTotal.innerText = total;
    // })
//   });
// })
=======
var select = document.getElementById("quantity");
var price = document.querySelector("#price");

time=setInterval(function(){
	if(document.readyState=='complete'){
		clearInterval(time);
		getPrices();
		console.log("hola")
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
>>>>>>> 3dc55be246ae8d85af6b3be6897811479c5b9dd4
