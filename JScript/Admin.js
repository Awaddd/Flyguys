var destinationModal = $("#destinationModal");
var editDestination = $("#editDestination");
var editDestinationsExit = $("#editDestinationsExit");

editDestination.on('click', function(){
  destinationModal.show();
});

editDestinationsExit.on('click', function(){
  destinationModal.hide();
});
