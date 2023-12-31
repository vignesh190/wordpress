jQuery(document).ready(function($) {
    const URL_ENDPOINT = 'http://192.168.1.3:3000';
      // Make an AJAX request to fetch data from the API
      $('#my-form').submit(function(event) {
  
  
      const apiEndpoint = URL_ENDPOINT + '/insert_userdata';
  
  // Replace this with your data to send to the API
  const dataToSend = {
      name: $('#user_name').val(),
      email: $('#user_email').val(),
      password: $('#user_password').val(),
  };
  
      $.ajax({
          url: 'http://192.168.1.3:3000/insert_userdata',
          method: 'post',
          dataType: 'json',
          data: dataToSend,
          success: function(res) {
          if (res.error) {
              // An error occurred
              console.error('Error:', res.message);
              alert(res.message);
          } else {
              // Success, handle the successful response here
            //   alert("inserted");
              alert(res.message);
          }
      },
      error: function(xhr, status, err) {
          console.error('Ajax request error:', err);
          alert('insert request error: ' + err);
      }
      });
    });
  
  });