


<p id="para">ggggg</p>
<table id="apiDataTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
            <!-- Add more table headers here -->
        </tr>
    </thead>
    <tbody>
        <!-- Data from the API will be inserted here -->
    </tbody>
</table>

<script>

jQuery(document).ready(function($) {
    // URL of the API you want to fetch data from
    var apiUrl = 'http://192.168.1.2:3000/fetch_userlist';

    // Make an AJAX request to fetch the data
    $.ajax({
        url: apiUrl,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Assuming the API response is an array of objects
            var tableBody = $('#apiDataTable tbody');

            console.log(data);

            $.each(data.message, function(index, item) {
                var row = '<tr>' +
                    '<td>' + item.name + '</td>' +
                    '<td id="user_email">' + item.email + '</td>' +
                    '<td> <button type="button" class="btn btn-success"><i class="fas fa-edit"></i>update </button> </td>'+
                    '<td> <button id="deleteDataButton" type="submit" class="btn btn-success"><i class="fas fa-edit"></i>delete </button> </td>'

                    // Add more table cells for other data
                    '</tr>';
                tableBody.append(row);
            });
        },
        error: function() {
            console.log('Failed to fetch data from the API.');
        }
    });
});

jQuery(document).ready(function($) {
    const URL_ENDPOINT = 'http://192.168.1.2:3000';
      // Make an AJAX request to fetch data from the API
      $('#deleteDataButton').on('click', function() {
  
  
      const apiEndpoint = URL_ENDPOINT + '/delete_userdata';
  
  // Replace this with your data to send to the API
  const dataToSend = {
      email: $('#user_email').val()
  };


  
      $.ajax({
          url: apiEndpoint,
          method: 'DELETE',
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
              window.location.href = '<?php echo esc_url(home_url('/')); ?>'; 
          }
      },
      error: function(xhr, status, err) {
          console.error('Ajax request error:', err);
          alert('insert request error: ' + err);
      }
      });
    });
  
  });

</script>


<?php
get_footer();
?>