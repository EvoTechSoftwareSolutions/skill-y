function send() {
    var f = new FormData();
    f.append("fname", document.getElementById("fname").value);
    f.append("lname", document.getElementById("lname").value);
    f.append("phone", document.getElementById("phone").value);
    f.append("email", document.getElementById("email").value);
    f.append("subject", document.getElementById("subject").value);
    f.append("message", document.getElementById("message").value);
  
    var btn = document.getElementById("sub_btn");
    btn.disabled = true; // Disable button
    btn.innerHTML = `<span class="loader"></span> Sending...`; // Show loading text & animation
  
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        if (r.responseText == "Message Sent successfully") {
          document.getElementById("fname").value = "";
          document.getElementById("lname").value = "";
          document.getElementById("phone").value = "";
          document.getElementById("email").value = "";
          document.getElementById("subject").value = "";
          document.getElementById("message").value = "";
  
          swal({
            title: "Message Sent",
            text: "We'll get back to you soon. Please check your email...",
            icon: "success"
          }).then(() => {
            btn.disabled = false; // Re-enable button after user clicks OK
            btn.innerHTML = "Send Message"; // Restore original text
          });
  
        } else {
          swal("Try Again", r.responseText, "error");
          btn.disabled = false; // Re-enable button on error
          btn.innerHTML = "Send Message"; // Restore original text
        }
      }
    };
  
    r.open("POST", "../mail/sendEmailProcess.php", true);
    r.send(f);
  }
  