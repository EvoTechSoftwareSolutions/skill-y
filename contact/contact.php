<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill-y</title>
    <link rel="icon" href="../resources/img/footer_logo.png" />
    <link rel="stylesheet" href="../contact/contact.css">
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>

<body>

    <!-- Header -->
    <?php include "../header/header.php"; ?>
    <!-- Header -->

    <div class="contact--bgimg">
        <img src="../resources/img/contact/Rectangle3.png" class="contact--bg1" />
    </div>

    <div class="contact--bgimg1">
        <img src="../resources/img/contact/Group3.png" class="contact--bg2" />
    </div>

    

    <section class="view contact--sec1" id="contact">
        <div class="block contact--sec1--div1">
            <span class="contact--sec1--span1" onclick="window.location='../home/home.php';">Skill-y /</span><span class="contact--sec1--span2"> Contact Us</span>
        </div>
    </section>

    <section class="view contact--sec2">
        <div class="block contact--sec2--div1">
            <span class="contact--sec2--span1">Contact Us</span>
            <span class="contact--sec2--span2">Get In<span class="contact--sec2--span3"> Touch</span></span>
        </div>
    </section>

    <section class="view contact--sec5">
        <div class="contact--sec5--div1">
            <div class="block contact--sec5--div2">
                <div class="contact--sec5--div3">
                    <div class="contact--sec5--div4">
                        <div class="contact--sec5--div5">
                            <div class="contact--sec5--div6">
                                <div class="contact--sec5--div7">
                                    <input type="text" class="contact--txtfield" id="fname" placeholder="First Name *">
                                </div>
                                <div class="contact--sec5--div7">
                                    <input type="text" class="contact--txtfield" id="lname" placeholder="Last Name *">
                                </div>
                            </div>
                            <div class="contact--sec5--div6">
                                <div class="contact--sec5--div7">
                                    <input type="text" class="contact--txtfield" id="phone" maxlength="16" placeholder="Phone Number *">
                                </div>
                                <div class="contact--sec5--div7">
                                    <input type="text" class="contact--txtfield" id="email" placeholder="Email *">
                                </div>
                            </div>
                            <div class="contact--sec5--div8">
                                <input type="text" class="contact--txtfield" id="subject" placeholder="Subject">
                            </div>
                            <div class="contact--sec5--div8">
                                <textarea class="contact--txtarea" id="message" placeholder="Message *"></textarea>
                            </div>
                            <div class="contact--sec5--divBtn">
                                <button class="contatct--button" id="sub_btn" onclick="send();">Send Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="contact--sec5--div9">
                        <div class="contact--sec5--div10">
                            <div class="contact--sec5--div11">
                                <span class="contatct--sec5--txt2">
                                    At Skilly.co.nz, we are dedicated to making your dream of studying in New Zealand a reality. As a trusted student immigration consulting company, we provide expert guidance to help you navigate every step of the journey—from choosing the right educational institution to securing your student visa.
                                    <br />
                                    We understand that moving to a new country for education is a big decision, and that’s why our experienced consultants offer personalized support tailored to your academic and career goals. Whether you need advice on selecting courses, visa requirements, scholarships, or post-study work opportunities, we are here to assist you.

                                    No question is too small, and no detail is overlooked. We are committed to making your transition smooth and stress-free so you can focus on your studies and future success.Contact us today via call, email, or message, and let’s start crafting your academic journey. With Skilly.co.nz, your education abroad isn’t just a dream—it’s a step toward a brighter future!
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="contatct--verticle--hr"></div> -->
                </div>
            </div>
            <div class="contact--sec5--div12">
                <div class="contact--sec5--div13">
                    <div class="contact--sec5--div17">
                        <div class="contact--sec5--div14" style="background-color: #4D6D1D;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td><img src="../resources/img/contact/icon1.png" class="table--img1" /></td>
                                        <td class="table--span1">Contact Number</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan">+64 27 329 6864</span>
                            </div>
                        </div>
                        <div class="contact--sec5--div14" style="background-color: #669127;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td class="table--img1"><img src="../resources/img/contact/icon2.png" class="table--img1" /></td>
                                        <td class="table--span1">Email Address</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan">info@skilly.co.nz</span>
                            </div>
                        </div>
                        <div class="contact--sec5--div14" style="background-color: #80B531;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td class="table--img1"><img src="../resources/img/contact/icon3.png" class="table--img1" /></td>
                                        <td class="table--span2">Location</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan11">+Rolleston, Christchurch, 7615,
                                    New Zealand</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact--sec5--div18">
                        <div class="contact--sec5--div14" style="background-color: #ECF4E0;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td class="table--img1"><img src="../resources/img/contact/icon4.png" class="table--img1" /></td>
                                        <td class="table--span2">WhatsApp</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan1">+64 27 329 6864</span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="contact--sec5--div21">
                    <div class="contact--sec5--div19">
                        <div class="block contact--sec5--div14" style="background-color: #4D6D1D;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td><img src="../resources/img/contact/icon1.png" class="table--img1" /></td>
                                        <td class="table--span1">Contact Number</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan">+64 27 329 6864</span>
                            </div>
                        </div>
                        <div class="block contact--sec5--div14" style="background-color: #669127;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td class="table--img1"><img src="../resources/img/contact/icon2.png" class="table--img1" /></td>
                                        <td class="table--span1">Email Address</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan">info@skilly.co.nz</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact--sec5--div20">
                        <div class="block contact--sec5--div14" style="background-color: #80B531;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td class="table--img1"><img src="../resources/img/contact/icon3.png" class="table--img1" /></td>
                                        <td class="table--span2">Location</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan11">Rolleston, Christchurch, 7615,
                                    New Zealand</span>
                            </div>
                        </div>
                        <div class="block contact--sec5--div14" style="background-color: #ECF4E0;">
                            <div class="contact--sec5--div15">
                                <table>
                                    <tr>
                                        <td class="table--img1"><img src="../resources/img/contact/icon4.png" class="table--img1" /></td>
                                        <td class="table--span2">WhatsApp</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="contact--sec5--div16">
                                <span class="sec5--iconspan1">+64 27 329 6864</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="view contact--sec5--div24">
        <div class="block contact--sec5--div25">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.183114188536!2d172.3599735!3d-43.6027288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d3203658b029491%3A0xfdbd3214a7bb4302!2s9%20Siltstone%20Street%2C%20Rolleston%207614%2C%20New%20Zealand!5e0!3m2!1sen!2slk!4v1742227152361!5m2!1sen!2slk" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="contact--map--img"></iframe>
        </div>
    </div>


    <!-- Footer -->
    <?php include "../footer/footer.php"; ?>
    <!-- Footer -->

    <script src="../header/header.js"></script>
    <script src="../slider/slider.js"></script>
    <script src="../contact/contact.js"></script>
    <script src="../contact_slider/contact_slider.js"></script>
    <script src="../resources/swiper/swiper-bundle.min.js"></script>
    <script src="../home/home.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

</body>

</html>