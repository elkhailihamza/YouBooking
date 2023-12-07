document.querySelectorAll('.status-text').forEach(function(statusElement) {
    var status = statusElement.textContent.trim();
  
    if (status === 'Available') {
      statusElement.style.backgroundColor = 'green';
    } else if (status === 'Occupied') {
      statusElement.style.backgroundColor = 'yellow';
    } else if (status === 'Under Maintenance') {
      statusElement.style.backgroundColor = 'red';
    }
  });


// validation

//   document.querySelector('form').addEventListener('submit', function(e) {
//     e.preventDefault();

//     // Get the form champs
//     var number = document.getElementById('number');
//     var prix = document.getElementById('prix');
//     var status = document.getElementById('status');
//     var hotel = document.getElementById('hotel-select');

//     // Validate the champs
//     validInput(number);
//     validInput(prix);
//     validInput(status);
//     validInput(hotel);
// });

// function validInput(champ) {
//     if (champ.value.trim() === '') {
//         champ.style.borderColor = 'red';

//         // Display an error message
//         var error = document.createElement('div');
//         error.textContent = 'obligatoire';
//         error.style.color = 'red';
//         champ.parentNode.appendChild(error);
//     } else {
//         // Reset the border color and remove the error message
//         champ.style.borderColor = '';
//         if (champ.parentNode.lastChild.nodeName === 'DIV') {
//             champ.parentNode.removeChild(champ.parentNode.lastChild);
//         }
//     }
// }

  