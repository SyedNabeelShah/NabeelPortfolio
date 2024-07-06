// form element
const form = document.querySelector('form');
// input fields
const titleInput = document.querySelector('#title');
const textInput = document.querySelector('#text');
// post button
const postInput = document.querySelector('#post');
// clear button
const clearButton = document.querySelector('#clear');

// Add event listener to the clear button
clearButton.addEventListener('click', (e) => {
    // Display a confirmation message
    const confirmation = confirm("Are you sure you want to clear the inputs?");
    if (confirmation) {
        // Clear the input fields
        titleInput.value = '';
        textInput.value = '';
    } else {
        // Prevent the default behavior of the clear button
        e.preventDefault();
    }
});

// Add event listener to the form submit event
form.addEventListener('submit', (e) => {
    // Prevent form submission if title or post is blank
    if (titleInput.value.trim() === '' || textInput.value.trim() === '') {
        e.preventDefault();
        if (titleInput.value.trim() === '') {
            titleInput.classList.add('error');
        } else {
            titleInput.classList.remove('error');
        }
        if (textInput.value.trim() === '') {
            textInput.classList.add('error');
        } else {
            textInput.classList.remove('error');
        }
    }
});