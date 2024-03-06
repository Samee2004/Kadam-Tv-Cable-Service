$(document).ready(function() {
        $('#update_submit_chat').on('click', function() {
            // Reset error messages
            $('#update_chatError, #update_queError, #update_ansError').text('');

            // Validate category selection
            var category = $('#update_chat').val();
            if (category == null || category == "") {
                $('#update_chatError').text('Please select a category.');
                return false;
            }

            // Validate question input
            var question = $('#update_que').val();
            if (question == null || question.trim() == "") {
                $('#update_queError').text('Please enter a question.');
                return false;
            }

            // Validate answer input
            var answer = $('#update_ans').val();
            if (answer == null || answer.trim() == "") {
                $('#update_ansError').text('Please enter an answer.');
                return false;
            }

            // If all fields are valid, submit the form
            // You can perform additional actions here, such as AJAX submission
            // Example: $('#yourFormId').submit();
            return true;
        });
    });


    function delete_chat(qts_id) {
        console.log(qts_id);
        
    }
