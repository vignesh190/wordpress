<?php

/**
 * Template Name: signupform
 */

get_header();
?>


<div class="container">
  <form method='POST' id="my-form" onsubmit="return submitForm(this);" >

    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" id="user_name" name="names" required>
    </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" id="user_email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">password:</label>
      <input type="password" class="form-control" placeholder="Enter password" id="user_password" name="password" required>
    </div>
    <button  type="submit" name='insert' class="btn btn-primary">Submit</button>
  </form>

</div>


<script>

jQuery(document).ready(function($) {
    const URL_ENDPOINT = 'http://192.168.1.2:3000';

    $('#my-form').submit(function(event) {
        const apiEndpoint = URL_ENDPOINT + '/user/insertdata';

        const dataToSend = {
            name: $('#user_name').val(),
            email: $('#user_email').val(),
            password: $('#user_password').val(),
        };

        $.ajax({
            url: apiEndpoint,
            method: 'post',
            dataType: 'json',
            data: JSON.stringify(dataToSend),
            contentType: 'application/json',
            success: function(res) {
                if (res.error) {
                    // Display an error SweetAlert
                    Swal.fire({
                        title: 'Error!',
                        text: res.message,
                        icon: 'error',
                    });
                } else {
                    // Display a success SweetAlert
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data inserted successfully.',
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect the user after clicking "OK"
                            window.location.href = 'http://localhost:8888/wordpress/';
                        }
                    });
                }
            },
            error: function(xhr, status, err) {
                // Display an error SweetAlert for AJAX request error
                Swal.fire({
                    title: 'Error!',
                    text: 'AJAX request error: ' + err,
                    icon: 'error',
                });
            }
        });
        event.preventDefault(); // Prevent the form from submitting the traditional way
    });
});


document.getElementById("my-form").addEventListener("submit", function (event) {
            event.preventDefault();

            var name = document.getElementById("user_name").value;
            var email = document.getElementById("user_email").value;
            let contact = '9092189883'; // add your number ex(+9100000000)

            var encodedMessage = encodeURIComponent(
                "Name: " + name + "\n" +
                "Email: " + email + "\n" 
            );

            var link;

            // Check if user is on a mobile device
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                link = `whatsapp://send?phone=${contact}&text=${encodedMessage}`;
            } else { // Desktop device
                link = `https://web.whatsapp.com/send?phone=${contact}&text=${encodedMessage}`;
            }

            window.open(link, '_blank');
});




// $('#my-form').submit(function(event) {
//     var settings = {
//      "url": "https://{baseUrl}/whatsapp/1/message/text",
//      "method": "POST",
//      "timeout": 0,
//      "headers": {
//          "Authorization": "{authorization}",
//          "Content-Type": "application/json",
//          "Accept": "application/json"
//      },
//      "data": JSON.stringify({
//          "from": "9597524553",
//          "to": "9092189883",
//          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
//          "content": {
//              "text": "Some text"
//          },
//          "callbackData": "Callback data",
//          "notifyUrl": "https://www.example.com/whatsapp"
//      }),
//  };
//      console.log(response);
//  });
							


</script>

<?php
get_footer();
?>