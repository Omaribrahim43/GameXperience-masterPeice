document.getElementById("strtNow").addEventListener("click", () => {
  const { value: formValues } = Swal.fire({
    title: "Choose Your Play Time!",
    html:
      "<label>Username</label>" +
      '<input id="swal-input1" placeholder="Username" class="swal2-input">' +
      "<label>Time Owned</label>" +
      '<input id="swal-input2" value="10:28 Hours" class="swal2-input">' +
      '<select class="swal2-select">\
        <option value="0" selected>Choose Platform</option>\
        <option value="1">PC</option>\
        <option value="2">Playstation 4</option>\
        <option value="3">Playstation 5</option>\
        <option value="3">X-Box</option>\
       </select>',
    showCancelButton: true,
    confirmButtonText: "Book Now",
  }).then((result) => {
    if(result.isConfirmed) {
        location.href='payment.html';
    }
  });
});
