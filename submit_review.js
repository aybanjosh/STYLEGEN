document.getElementById("reviewForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent page reload
    
    // Get review data
    var reviewText = document.getElementById("reviewText").value;
    var reviewRating = document.getElementById("reviewRating").value;
    var reviewImage = document.getElementById("reviewImage").files[0];
    var userId = document.getElementById("userId").value;  // Get user ID from hidden input
    var productId = document.getElementById("productId").value;  // Get product ID from hidden input

    // Prepare form data to send to the server
    var formData = new FormData();
    formData.append('reviewText', reviewText);
    formData.append('reviewRating', reviewRating);
    formData.append('userId', userId);
    formData.append('productId', productId);
    if (reviewImage) {
        formData.append('reviewImage', reviewImage);
    }

    // Send the data to the backend using fetch
    fetch('submit_review.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Clear the form fields
            document.getElementById("reviewForm").reset();

            // Close the modal
            var myModal = new bootstrap.Modal(document.getElementById("writeReviewModal"));
            myModal.hide();

            // Display the new review (optional)
            displayReview(data.reviewText, data.reviewRating, data.reviewImage);

            // Update the review count (optional)
            let reviewsCount = parseInt(document.getElementById("reviewsCount").textContent.match(/\d+/)[0]) + 1;
            document.getElementById("reviewsCount").textContent = `(${reviewsCount})`;
        } else {
            alert("Error submitting review.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
