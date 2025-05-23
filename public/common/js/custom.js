$(document).ready(function () {
    $(".select2m").select2({
        dropdownParent: $(".modal").closest("div"),
    });
});

function digitInput(event) {
    event.target.value = event.target.value.replace(/[^\d]/g, "");
}

function floatInput(event) {
    event.target.value = event.target.value.replace(/[^\d.]/g, "");
}
function phoneIn(event) {
    event.target.value = event.target.value.replace(/[^\d.+-]/g, "");
}

// For Active Inactive
$(function () {
    document.addEventListener("DOMContentLoaded", function () {
        document
            .getElementById("is_active_input")
            .addEventListener("click", function () {
                document.getElementById("is_active_label").innerHTML = this
                    .checked
                    ? "Active"
                    : "Inactive";
            });
    });
});

// function select2Ajax(id, placeholder, route, dropdown = 'body') {
//     $('#' + id).select2({
//         placeholder: placeholder,
//         minimumInputLength: 2,
//         dropdownParent: $(dropdown),
//         ajax: {
//             url: route,
//             dataType: 'json',
//             delay: 250,
//             cache: true,
//             data: function(params) {
//                 return {
//                     q: $.trim(params.term)
//                 };
//             },
//             processResults: function(data) {
//                 return {
//                     results: data
//                 };
//             }
//         }
//     });
// }

// $(function () {
//     // var date = new Date();
//     // var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
//     $(".bDP input").datepicker({
//         format: "dd/mm/yyyy",
//         autoclose: true,
//         clearBtn: true,
//         todayHighlight: true,
//         container: ".bDP",
//         defaultViewDate: "today",
//         orientation: "auto",
//     });
// });

// function toast(type, message) {
//     cuteToast({
//         type: type,
//         title: type.toUpperCase(),
//         message: message,
//         timer: 5000,
//     });
// }
