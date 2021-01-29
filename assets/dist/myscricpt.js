const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData) {
//     Swal.fire({
        
//         title: "Good job!",
//   text: "Permintaan Kamu "+ flashData +" Diproses",
//   icon: "success",
//     });
    Swal.fire(
        "Success!",
        "Permintaan Kamu "+ flashData +" Diproses",
        "success",
    );
}