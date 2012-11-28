<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ufredis</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url(); ?>assets/template/css/main/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/css/main/ufredis.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/css/main/signup.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/keyboard.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/tip.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/jtip.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/keyboard.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/template/js/jquery00.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/template/js/jquery01.js"></script>
    <script type="text/javascript">
        jQuery.noConflict();
        (function($) {
            $(function() {
                $('#transaction_code').keypad();
            });
            $(function () {
                $('#retransaction_code').keypad();
            });
        })(jQuery);
    </script>


</head>

<body>

<?php echo $header; ?>

<div class="container main-container" style="top:-315px;position:relative;">
    <div class="login-box" >
        <form class="form-horizontal" id="registerHere" method='post' action='' style="float:right;margin:0;">
            <fieldset>

                <legend><span class="style2">User</span> Login</legend>

                <div class="control-group">
                    <label class="control-label" style="width:60px;text-align:right;">Username</label>
                    <div class="controls">
                        <input type="text" id="email" name="email">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" style="width:60px;text-align:right;">Password</label>
                    <div class="controls">
                        <input type="password" id="passwd" name="passwd">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="width:60px;text-align:right;">Pin</label>
                    <div class="controls">
                        <input type="password" id="transaction_code" name="transaction_code" alt="PIN Code" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn btn-success" >Submit</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

    <!--loginbox-->


    <div class="a5-content row">
        <div class="login-box-main">

            <form class="form-horizontal" id="register-venue" method='post' action='' style="float:right;margin:0; width:550px;">
                <fieldset>
                    <legend> <span class="style2">Register</span> Here </legend>

                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Email Address</label>
                        <div class="controls" >
                            <input type=text name="emailadss"  id="emailadss"  class="tips" tip="htm/email.htm" alt="Your email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Referel Email Address</label>
                        <div class="controls" >
                            <input type=text name="parent_email"  id="parent_email"  class="tips" tip="htm/parent_email.htm" alt="Your parent email">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Password</label>
                        <div class="controls" >
                            <input type=text name="passwd"  id="passwd" class="keyboardInput">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Confirm Password</label>
                        <div class="controls" >
                            <input type=text name="cnf_password"  id="cnf_password" class="keyboardInput">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">First Name</label>
                        <div class="controls" >
                            <input type=text name="fname"  id="fname"  class="tips" tip="htm/fname.htm" alt="Your first name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Last Name</label>
                        <div class="controls" >
                            <input type=text name="lname"  id="lname"  class="tips" tip="htm/lname.htm" alt="Your last name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Address</label>
                        <div class="controls" >
                            <input type=text name="address"  id="address"  class="tips" tip="htm/address.htm" alt="Your address">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">City</label>
                        <div class="controls" >
                            <input type=text name="city"  id="city"  class="tips" tip="htm/city.htm" alt="Your city">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Select Country</label>
                        <div class="controls" >
                            <select name="country" id="country">
                                <option value="">--Select Country--</option>
                                <option value=Afghanistan>Afghanistan</option><option value=Albania>Albania</option><option value=Algeria>Algeria</option><option value=Andorra>Andorra</option><option value=Angola>Angola</option><option value=Antarctica>Antarctica</option><option value=Argentina>Argentina</option><option value=Armenia>Armenia</option><option value=Aruba>Aruba</option><option value=Australia>Australia</option><option value=Austria>Austria</option><option value=Azerbaijan>Azerbaijan</option><option value=Bahrain>Bahrain</option><option value=Bangladesh>Bangladesh</option><option value=Belarus>Belarus</option><option value=Belgium>Belgium</option><option value=Belize>Belize</option><option value=Benin>Benin</option><option value=Bhutan>Bhutan</option><option value=Bolivia>Bolivia</option><option value=Bosnia and Herzegovina>Bosnia and Herzegovina</option><option value=Botswana>Botswana</option><option value=Brazil>Brazil</option><option value=Brunei>Brunei</option><option value=Bulgaria>Bulgaria</option><option value=Burkina Faso>Burkina Faso</option><option value=Burma (Myanmar)>Burma (Myanmar)</option><option value=Burundi>Burundi</option><option value=Cambodia>Cambodia</option><option value=Cameroon>Cameroon</option><option value=Canada>Canada</option><option value=Cape Verde>Cape Verde</option><option value=Central African Republic>Central African Republic</option><option value=Chad>Chad</option><option value=Chile>Chile</option><option value=China>China</option><option value=Christmas Island>Christmas Island</option><option value=Cocos (Keeling) Islands>Cocos (Keeling) Islands</option><option value=Colombia>Colombia</option><option value=Comoros>Comoros</option><option value=Cook Islands>Cook Islands</option><option value=Costa Rica>Costa Rica</option><option value=Croatia>Croatia</option><option value=Cuba>Cuba</option><option value=Cyprus>Cyprus</option><option value=Czech Republic>Czech Republic</option><option value=Congo>Congo</option><option value=Denmark>Denmark</option><option value=Djibouti>Djibouti</option><option value=Ecuador>Ecuador</option><option value=Egypt>Egypt</option><option value=El Salvador>El Salvador</option><option value=Equatorial Guinea>Equatorial Guinea</option><option value=Eritrea>Eritrea</option><option value=Estonia>Estonia</option><option value=Ethiopia>Ethiopia</option><option value=Falkland Islands>Falkland Islands</option><option value=Faroe Islands>Faroe Islands</option><option value=Fiji>Fiji</option><option value=Finland>Finland</option><option value=France>France</option><option value=French Polynesia>French Polynesia</option><option value=Gabon>Gabon</option><option value=Gambia>Gambia</option><option value=Gaza Strip>Gaza Strip</option><option value=Georgia>Georgia</option><option value=Germany>Germany</option><option value=Ghana>Ghana</option><option value=Gibraltar>Gibraltar</option><option value=Greece>Greece</option><option value=Greenland>Greenland</option><option value=Guatemala>Guatemala</option><option value=Guinea>Guinea</option><option value=Guinea-Bissau>Guinea-Bissau</option><option value=Guyana>Guyana</option><option value=Haiti>Haiti</option><option value=Holy See (Vatican City)>Holy See (Vatican City)</option><option value=Honduras>Honduras</option><option value=Hong Kong>Hong Kong</option><option value=Hungary>Hungary</option><option value=Iceland>Iceland</option><option value=India>India</option><option value=Indonesia>Indonesia</option><option value=Iran>Iran</option><option value=Iraq>Iraq</option><option value=Ireland>Ireland</option><option value=Isle of Man>Isle of Man</option><option value=Israel>Israel</option><option value=Italy>Italy</option><option value=Ivory Coast>Ivory Coast</option><option value=Japan>Japan</option><option value=Jordan>Jordan</option><option value=Kazakhstan>Kazakhstan</option><option value=Kenya>Kenya</option><option value=Kiribati>Kiribati</option><option value=Kosovo>Kosovo</option><option value=Kuwait>Kuwait</option><option value=Kyrgyzstan>Kyrgyzstan</option><option value=Laos>Laos</option><option value=Latvia>Latvia</option><option value=Lebanon>Lebanon</option><option value=Lesotho>Lesotho</option><option value=Liberia>Liberia</option><option value=Libya>Libya</option><option value=Liechtenstein>Liechtenstein</option><option value=Lithuania>Lithuania</option><option value=Luxembourg>Luxembourg</option><option value=Macau>Macau</option><option value=Macedonia>Macedonia</option><option value=Madagascar>Madagascar</option><option value=Malawi>Malawi</option><option value=Malaysia>Malaysia</option><option value=Maldives>Maldives</option><option value=Mali>Mali</option><option value=Malta>Malta</option><option value=Marshall Islands>Marshall Islands</option><option value=Mauritania>Mauritania</option><option value=Mauritius>Mauritius</option><option value=Mayotte>Mayotte</option><option value=Mexico>Mexico</option><option value=Micronesia>Micronesia</option><option value=Moldova>Moldova</option><option value=Monaco>Monaco</option><option value=Mongolia>Mongolia</option><option value=Montenegro>Montenegro</option><option value=Morocco>Morocco</option><option value=Mozambique>Mozambique</option><option value=Namibia>Namibia</option><option value=Nauru>Nauru</option><option value=Nepal>Nepal</option><option value=Netherlands>Netherlands</option><option value=Netherlands Antilles>Netherlands Antilles</option><option value=New Caledonia>New Caledonia</option><option value=New Zealand>New Zealand</option><option value=Nicaragua>Nicaragua</option><option value=Niger>Niger</option><option value=Nigeria>Nigeria</option><option value=Niue>Niue</option><option value=Norfolk Island>Norfolk Island</option><option value=North Korea>North Korea</option><option value=Norway>Norway</option><option value=Oman>Oman</option><option value=Pakistan>Pakistan</option><option value=Palau>Palau</option><option value=Panama>Panama</option><option value=Papua New Guinea>Papua New Guinea</option><option value=Paraguay>Paraguay</option><option value=Peru>Peru</option><option value=Philippines>Philippines</option><option value=Pitcairn Islands>Pitcairn Islands</option><option value=Poland>Poland</option><option value=Portugal>Portugal</option><option value=Puerto Rico>Puerto Rico</option><option value=Qatar>Qatar</option><option value=Republic of the Congo>Republic of the Congo</option><option value=Romania>Romania</option><option value=Russia>Russia</option><option value=Rwanda>Rwanda</option><option value=Saint Barthelemy>Saint Barthelemy</option><option value=Saint Helena>Saint Helena</option><option value=Saint Pierre and Miquelon>Saint Pierre and Miquelon</option><option value=Samoa>Samoa</option><option value=San Marino>San Marino</option><option value=Sao Tome and Principe>Sao Tome and Principe</option><option value=Saudi Arabia>Saudi Arabia</option><option value=Senegal>Senegal</option><option value=Serbia>Serbia</option><option value=Seychelles>Seychelles</option><option value=Sierra Leone>Sierra Leone</option><option value=Singapore>Singapore</option><option value=Slovakia>Slovakia</option><option value=Slovenia>Slovenia</option><option value=Solomon Islands>Solomon Islands</option><option value=Somalia>Somalia</option><option value=South Africa>South Africa</option><option value=South Korea>South Korea</option><option value=Spain>Spain</option><option value=Sri Lanka>Sri Lanka</option><option value=Sudan>Sudan</option><option value=Suriname>Suriname</option><option value=Swaziland>Swaziland</option><option value=Sweden>Sweden</option><option value=Switzerland>Switzerland</option><option value=Syria>Syria</option><option value=Taiwan>Taiwan</option><option value=Tajikistan>Tajikistan</option><option value=Tanzania>Tanzania</option><option value=Thailand>Thailand</option><option value=Timor-Leste>Timor-Leste</option><option value=Togo>Togo</option><option value=Tokelau>Tokelau</option><option value=Tonga>Tonga</option><option value=Tunisia>Tunisia</option><option value=Turkey>Turkey</option><option value=Turkmenistan>Turkmenistan</option><option value=Tuvalu>Tuvalu</option><option value=Uganda>Uganda</option><option value=Ukraine>Ukraine</option><option value=United Arab Emirates>United Arab Emirates</option><option value=United Kingdom>United Kingdom</option><option value=United States>United States</option><option value=Uruguay>Uruguay</option><option value=Uzbekistan>Uzbekistan</option><option value=Vanuatu>Vanuatu</option><option value=Venezuela>Venezuela</option><option value=Vietnam>Vietnam</option><option value=Wallis and Futuna>Wallis and Futuna</option><option value=West Bank>West Bank</option><option value=Yemen>Yemen</option><option value=Zambia>Zambia</option><option value=Zimbabwe>Zimbabwe</option>                </select>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="width:150px;text-align:left;">Mobile Number</label>
                        <div class="controls" >
                            <input type=text name="mobile"  id="mobile"  class="tips" tip="htm/mobile.htm" alt="Your mobile">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls" style="margin-left:110px;">
                            <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>


        </div><!--loginbox-->
        <div  style="padding-left:100px;">
            <img src="<?php echo base_url(); ?>assets/template/img/verysign.jpg" alt="">
            <img src="<?php echo base_url(); ?>assets/template/img/comodo.jpg" alt="">
            <img src="<?php echo base_url(); ?>assets/template/img/thawte.jpg" alt="">
            <img src="<?php echo base_url(); ?>assets/template/img/etrust.jpg" alt="">
            <img src="<?php echo base_url(); ?>assets/template/img/clickid.jpg" alt="">
            <img src="<?php echo base_url(); ?>assets/template/img/mcafee.jpg" alt="">
        </div>
        <footer style="background: #ebf4fd;">
            <p class="copyright">Copyright <a href="http://ufredis.com" target="_blank">ufredis.com</a> 2012.All Rights Reserved</p>
            <p class="bottom-nav"><a href="#">About</a> &middot; <a href="#">Contact</a>  &middot; <a href="#">Terms and Conditions </a></p>
        </footer>
    </div>
</div>
<!-- /container -->


<!-- modals -->



<!-- Javascript -->




<script>

    var sliderStatus = 0;

    var moveContainerDown = function (){
        $(".main-container").fadeIn()
            .css({top:-315,position:'relative'})
            .animate({top:-10}, 800, function() {
                sliderStatus = 1;
                //callback
            });
    }


    var moveContainerUp = function (){
        $(".main-container").fadeIn()
            .css({top:-10,position:'relative'})
            .animate({top:-315}, 800, function() {
                sliderStatus = 0;
            });
    }

    $('.login-slider').on('click', function(){
        if (sliderStatus == 0) {
            $('.login-box-main').fadeOut();
            moveContainerDown();
        }
        else if (sliderStatus == 1) {
            moveContainerUp();
            $('.login-box-main').fadeIn(800);
        }
    });
    $('.register-slider').on('click', function(){


        moveContainerUp();
        $('.login-box-main').fadeIn(800);

    });

    $('.a5-login').on('click', function(){
        $('#register-venue').hide();
        $('#register-member').fadeIn(500);
        $('.middle-divider').text('');
    });

    $('.a5-login-cancel').on('click', function(){
        $('#register-member').hide();
        $('#register-venue').fadeIn(500);
        $('.middle-divider').text('OR');
        return false;
    });

</script>

</body>
</html>