<script src="https://smtpjs.com/v3/smtp.js"></script>

   <script>
        Email.send({
    SecureToken : "4e1d1045-9f75-45bd-9fef-297a69bc3e72",
    To : 'sameekshakadam23@gmail.com',
    From : "sameekshakadam23@gmail.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => console.log(message)
);
    </script>