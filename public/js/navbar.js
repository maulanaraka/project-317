document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById('toggle');
    const collapseMenu = document.getElementById('collapseMenu');
    const profileButton = document.querySelector('.profile-button');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    function handleClick() {
        collapseMenu.classList.toggle('hidden');
        profileButton.classList.toggle('active');
        // alert("hello");
    }

    toggleBtn.addEventListener('click', handleClick);

    // Add event listener to profile button
    profileButton.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent default behavior
        dropdownMenu.classList.toggle('hidden'); // Toggle hidden class
        profileButton.classList.toggle('active'); // Toggle active class
    });

    // Close dropdown menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownMenu.contains(event.target) && !profileButton.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            profileButton.classList.remove('active'); // Remove active class
        }
    });
});

const cek = document.getElementById("cek");

