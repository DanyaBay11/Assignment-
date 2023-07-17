let employees = document.querySelectorAll('.employees');
let inputFullName = document.querySelector('#fullName');
let inputPost = document.querySelector('#post');
let inputDate = document.querySelector('#date');
let action = document.querySelector("#id");

employees.forEach(function(employee) {
    employee.addEventListener('click', function() {
        let id = this.getAttribute('data-id');
        let fullName = this.querySelector('.fullName').innerHTML;
        let post = this.querySelector('.post').innerHTML
        let date = this.querySelector('.date').innerHTML

        inputFullName.value = fullName;
        inputPost.value = post;
        inputDate.value = date;
        action.value = id;
    });
});
