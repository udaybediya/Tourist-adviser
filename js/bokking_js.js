
document.addEventListener('DOMContentLoaded', () => {
    const bookNowButton = document.getElementById('bookNow');
    
    if (bookNowButton) {
        bookNowButton.addEventListener('click', () => {
            // Create and download PDF after form submission
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Get form values
            const fullName = document.getElementById('fullName').value;
            const age = document.getElementById('age').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            const date = document.getElementById('date').value;
            const numPeople = document.getElementById('numPeople').value;
            const pickUp = document.getElementById('Pick-Up').value;
            const gender = document.getElementById('Gender').value;
            const destination = document.getElementById('destination').value;
            const totalAmount = document.getElementById('totalAmount').value;

            // Add content to PDF
            doc.text('Booking Details:', 10, 10);
            doc.text(`Full Name: ${fullName}`, 10, 20);
            doc.text(`Age: ${age}`, 10, 30);
            doc.text(`Phone: ${phone}`, 10, 40);
            doc.text(`Email: ${email}`, 10, 50);
            doc.text(`Date: ${date}`, 10, 60);
            doc.text(`Number Of People: ${numPeople}`, 10, 70);
            doc.text(`Pick-Up: ${pickUp}`, 10, 80);
            doc.text(`Gender: ${gender}`, 10, 90);
            doc.text(`Destination: ${destination}`, 10, 100);
            doc.text(`Total Amount: ${totalAmount}`, 10, 110);

            // Save the PDF
            doc.save('booking-details.pdf');
        });
    }
});
