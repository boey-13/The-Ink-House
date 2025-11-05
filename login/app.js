
//The purpose of this part of js is to add interactive functions to the Sign In and Sign Up buttons. 
//When the user clicks the Sign Up button, a CSS class called sign-up-mode will be added to the container element of the page, 
//which will trigger an animation effect and display the registration form. When the user clicks the Sign In button, 
//this class will be removed and the page will return to displaying the login form. 
//This mechanism is usually used to implement animation effects for switching between different forms on a single page.


// Select the "Sign In" and "Sign Up" buttons
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

// Add an event listener to the "Sign Up" button
sign_up_btn.addEventListener('click', () => {
	
    // When the "Sign Up" button is clicked, add the "sign-up-mode" class to the container
    // This class will trigger the animation to show the Sign Up form
    container.classList.add("sign-up-mode");
});

// Add an event listener to the "Sign In" button
sign_in_btn.addEventListener('click', () => {
	
    // When the "Sign In" button is clicked, remove the "sign-up-mode" class from the container
    // This will revert the view back to the Sign In form
    container.classList.remove("sign-up-mode");
});
