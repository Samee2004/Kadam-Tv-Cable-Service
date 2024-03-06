
    $(document).ready(function() {
        $('#submit_chann').on('click', function() {
            // Reset error messages
            $('#chat_catError, #chat_queError, #chat_ansError').text('');

            // Validate category selection
            var category = $('#chat_cat').val();
            if (category == null || category == "") {
                $('#chat_catError').text('Please select a category.');
                return false;
            }

            // Validate question input
            var question = $('#chat_que').val();
            if (question == null || question.trim() == "") {
                $('#chat_queError').text('Please enter a question.');
                return false;
            }

            // Validate answer input
            var answer = $('#chat_ans').val();
            if (answer == null || answer.trim() == "") {
                $('#chat_ansError').text('Please enter an answer.');
                return false;
            }

            // If all fields are valid, submit the form
            // You can perform additional actions here, such as AJAX submission
            // Example: $('#yourFormId').submit();
            return true;
        });
    });

