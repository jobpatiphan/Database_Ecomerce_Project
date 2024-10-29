<x-app-layout>
    <x-slot name="header">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Foot Collection</title>
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            @vite('resources/css/app.css')
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>

        </head>
    </x-slot>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            .container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
            }

            .form-group {
                margin-bottom: 15px;
            }

            label {
                display: block;
                font-weight: bold;
            }

            input[type="text"],
            input[type="email"],
            textarea {
                width: 100%;
                padding: 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            button {
                width: 100%;
                padding: 10px;
                background-color: #28a745;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 16px;
            }

            button:hover {
                background-color: #218838;
                cursor: pointer;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <h2>Contact Us</h2>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $subject = htmlspecialchars($_POST['subject']);
                $message = htmlspecialchars($_POST['message']);
            
                $to = 'your-email@example.com'; // Replace with your email address
                $headers = "From: $email\r\n";
                $fullMessage = "Name: $name\nEmail: $email\n\nMessage:\n$message";
            
                if (mail($to, $subject, $fullMessage, $headers)) {
                    echo "<p style='color: green;'>Thank you for contacting us, $name. We will get back to you soon!</p>";
                } else {
                    echo "<p style='color: red;'>There was an error sending your message. Please try again later.</p>";
                }
            }
            ?>

            <form method="post" action="contact.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <!-- <button href="{{ route('contactUs.index') }}">Send Message</button>  -->


                <ul style="text-align: center;">
                    <style>
                        .green-background {
                            background-color: green;
                            /* กำหนดสีพื้นหลังเป็นสีเขียว */
                            width: 150px;
                            /* กำหนดความกว้างของ div ให้เล็กลง */
                            height: 50px;
                            /* กำหนดความสูงของ div ให้เล็กลง */
                            color: white;
                            /* กำหนดสีตัวอักษรเป็นสีขาว */
                            display: flex;
                            /* ใช้ flexbox เพื่อจัดแนวเนื้อหา */
                            align-items: center;
                            /* จัดแนวแนวตั้ง */
                            justify-content: center;
                            /* จัดแนวนอน */
                            border-radius: 10px;
                            /* ทำให้มุมของ div โค้ง */
                            text-decoration: none;
                            /* เอาเส้นใต้ลิงก์ออก */
                            margin: 0 auto;
                            /* จัดให้อยู่ตรงกลาง */
                        }
                    </style>
                    <li>
                        <a href="{{ route('senD') }}" class="green-background link-frame">Send Message</a>
                    </li>
                </ul>




            </form>
        </div>

    </body>

    </html>



</x-app-layout>
