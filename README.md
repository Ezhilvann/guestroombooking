# guestroombooking
Simplify bookings and streamline schedules with our user-friendly application for seamless reservations and appointments.
![guestroom6](https://github.com/Ezhilvann/guestroombooking/assets/113577026/20fec61a-6cae-4150-a063-1ed4bf847980)

# Hotel Booking System

Welcome to the Hotel Booking System repository! This web application allows users to register, login, view available rooms, register their own property, and book rooms seamlessly.

## Features

### Registration
1. Users can register by providing valid information, including name, phone number, email, passport or Aadhaar photo, address, and an eight-character password.
2. Email uniqueness is enforced to avoid duplicate registrations.
3. Password validation ensures a minimum length of eight characters.

### Login
1. Registered users can log in using their email and password.
2. Authentication is performed against the database to ensure authorized access.

### Home
1. Upon successful login, the "Login" and "Register" buttons are replaced with a "Logout" button.
2. The user's name is displayed on the home page to indicate successful login.
3. Navigation bar includes Home, Rooms, Contact Us, and Your Property.
4. Clicking "Rooms" navigates to a page displaying available rooms.

### Your Property
1. Users can register their property to be displayed on the home page.
2. Property details include hotel name, room count, images, maximum days to stay, and location information.
3. Minimum count of days to stay is set as 1 by default.

### Book Now
1. Available rooms are displayed on the home page.
2. Clicking "Book Now" redirects users to a detailed page with hotel information.
3. Users provide details such as family member count, guest names, check-in, and check-out dates.
4. The system calculates the total amount based on the selected room's price and the specified duration.
5. Alerts prevent booking if the room is already reserved.

## Technologies Used
- HTML
- Bootstrap
- CSS
- JavaScript
- Ajax
- PHP
- SQL
