var inputName = document.getElementById("name");
var inputEmail = document.getElementById("email");
var inputPass = document.getElementById("password");

$(document).ready(()=> {

  $("form").validate();
  $("#register-form").on('click', function(event){
    event.preventDefault();
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
       
        if (response.status == true){
          $("#response").text("Success to register.");
          inputName.value = "";
          inputEmail.value = "";
          inputPass.value = "";
        } else {
          $("#response").text("Failed to register.");
        }
        
      },

      error: function(error){
        console.log(error);
      }

    })

  })

  $("#post-dmb").on('click', function(event){
    event.preventDefault();
    let b_id = $("#b_id").val();
    let m_id = $("#movie").val();

    $.ajax({
      type: "POST",

      url: "handle-dmb.php",

      data: {
        myB_ID: b_id,
        myM_ID: m_id,
      },
      
      success: function(data){
        let response = JSON.parse(data);
       
        if (response.status == true){
          $("#response").text("Success to input movie.");
        } else {
          $("#response").text("Failed to input movie.");
        }
        
      },

      error: function(error){
        console.log(error);
      }

    })

  })
  
})