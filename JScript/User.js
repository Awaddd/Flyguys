// $(function() {
//     swal("Hello world!");
//
//     $("button[name=addToBasket]").click(function(event){
//       event.preventDefault();
//       var id=$(this).attr('id');
//       console.log(id);
//       var target='flight'+id;
// var text=       $("#"+target).find("input[name=flightName]").val();
//
//       console.log(text);
//         $(this).text('poda');
//     });
// });


function addToBasket(flightID, flightType) {
  // $(this).text('POda Naaye');
  // $('.page__title').text('POda Naaye');

        $.ajax({
            type: 'POST',
            url: '../Controller/BasketController.php',
            data: {
                addToBasket: flightType,
                flightID: flightID
            },
            success: function(response) {
              console.log(response);
                    alert('Added flight to your basket');
                    $('#cart').text(response);
                    // document.getElementById("cart").value=response;

            }
        });

}

function deleteFromCart(index) {
  var index = index;
  var flightIndex = 'flight'+index;
  var remove = 'remove';
  // console.log(index);
  // console.log(flightIndex);
        $.ajax({
            type: 'POST',
            url: '../Controller/BasketController.php',
            data: {
              remove: remove,
              index: index
            },
            success: function(response) {
              console.log(response);
                    alert('Removed flight from your basket');
                    $('#cart').text(response);
                    // console.log(flightIndex);
                    $('#'+flightIndex).remove();

                    // document.getElementById("cart").value=response;

            }
        });

}
