// function confirmAction(id, action) {
//     Swal.fire({
//         title: 'Are you sure?',
//         text: action === 'delete' ? "You won't be able to revert this!" : '',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: `Yes, ${action} it!`
//     }).then((result) => {
//         if (result.isConfirmed) {
//             if (id) {
//                 document.querySelector(`#${action}-form-${id}`).submit();
//             } else {
//                 document.querySelector(`#${action}-form`).submit();
//             }

//         }
//     });
// }

function confirmAction(id, action) {
    let confirmationText = '';
    let confirmButtonText = `Yes, ${action} it!`;

    // Customize the message and button text based on the action
    if (action === 'delete') {
        confirmationText = "You won't be able to revert this!";
    } else if (action === 'send') {
        confirmationText = "Are you sure you want to send this?";
        confirmButtonText = `Yes, send it!`;
    } else if (action === 'OK') {
        confirmationText = "Are you sure you want to approve this PTW?";
        confirmButtonText = `Yes, approve it!`;
    } else if (action === 'Reject') {
        confirmationText = "Are you sure you want to reject this PTW?";
        confirmButtonText = `Yes, reject it!`;
    }

    Swal.fire({
        title: 'Are you sure?',
        text: confirmationText,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirmButtonText
    }).then((result) => {
        if (result.isConfirmed) {
            if (action == 'OK' || action == 'Reject') {
                document.querySelector(`#verification-form-${id}`).submit();
            } else if (id) {
                document.querySelector(`#${action}-form-${id}`).submit();
            } else {
                document.querySelector(`#${action}-form`).submit();
            }
        }
    });
}
