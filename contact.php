 <?php
    include("menubar.php")
    ?>

 <link rel="stylesheet" type="text/css" href="contact.css">


 <div class="sectiune-contact">
     <h1>Contacteaza-ne pentru a plasa o comanda</h1>
     <div class=info-contact>
         <div class="address">
             <h2>Adresa</h2>
             <p>Strada Poienitei, nr 31, Breaza, Prahova
             <p>
         </div>
         <div class="telefon">
             <h2>Telefon</h2>
             <p>0727952166</p>
         </div>
         <div class="email">
             <h2>Email</h2>
             <p>bunatatidebreaza@gmail.com</p>
         </div>
     </div>
     <div class="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2812.961426374185!2d25.67133931539564!3d45.16763097909854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b30169cc1432df%3A0x2553b86e87a95ac2!2sStrada%20Poieni%C8%9Bei%2031%2C%20Breaza%20de%20Jos%20105400!5e0!3m2!1sen!2sro!4v1674309842928!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
     </div>
     <div class="contact-form">
         <h2>Send Us a Message</h2>
         <form action="contact.php" method="post">
             <label for="name">Name:</label>
             <input type="text" id="name" name="name" required>
             <label for="email">Email:</label>
             <input type="email" id="email" name="email" required>
             <label for="message">Message:</label>
             <textarea id="message" name="message" required></textarea>
             <input type="submit" value="Send" onclick="alert('Mesajul dumneavoastra a fost trimis!')">
         </form>
     </div>
 </div>