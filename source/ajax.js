// $(function () {
//     function sendData($form) {
//       let data = $(this).serialize();
//       return $.ajax({
//         type: $form.attr('method'),
//         url: $form.attr('action'),
//         data: data,
//       });
//     }
    
//     $("form").validate();
    
//     $("form").submit(function (e) {
//         e.preventDefault();
    
//         sendData($(this)).done(function(){
//           $("#container_form").html("<div id='message' style='background-color:linear-gradient(rgb(26, 26, 26) 0%, rgb(0, 0, 0) 100%); text-align:center; color:#FFFFFF;'></div>");
//           $("#container_form").css({
//             'height': '85%',
//             'display': 'flex',
//             'justify-content': 'center',
//             'align-items': 'center'
//           });
//           $("#message")
//             .html("<h2>Form Submitted Succesfully</h2>")
//             .append("<p>We will be in touch soon.</p>")
//             .hide()
//             .fadeIn(1500);
//         });
//     });
//   });

  $(document).ready(()=> {

    $("#register").on('click', function(){
      let name = $("#name").val();
      let email = $("#email").val();
      let password = $("#password").val();

      $.ajax({
        type: "POST",

        url: "post-register.php",

        data: {
          myName: name,
          myEmail: email,
          myPassword: password,
        },

        success: function(data){
          let response = JSON.parse(data);
          
        },

        error: function(error){
          console.log(error);
        }

      })

    })
    
  })