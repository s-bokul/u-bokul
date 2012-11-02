<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#invest").validate({
            rules: {
                amount: {required:true, number: true, min: 20}
            },
            messages:{
                email:{ required:"Please Enter Your Email", email:"Invalid Email Address", remote:"Email Already Taken"},
                parent_email:{ remote:"Parent Not Exists"}
            }
        });


        $('.successbox').hide();//Hide the div
        $('.warningbox').hide();
        $('.errormsgbox').hide();

        $(".successbox").fadeIn(2000); //Add a fade in effect that will last for 2000 millisecond
        $(".warningbox").fadeIn(2000);
        $(".errormsgbox").fadeIn(2000);

        $(".successbox").fadeOut(2000); //Add a fade in effect that will last for 2000 millisecond
        $(".warningbox").fadeOut(2000);
        $(".errormsgbox").fadeOut(2000);
    });


</script>
<!-- #BeginEditable "body" -->
<div id="purchasepage">

    <h1 class="pagetitle">New Investment</h1>
    <?php echo form_open(site_url('/register/save'),array('name'=>'invest','id'=>'invest'));?>
    <table class="purchase defaulttable">
        <tr>
            <td class="leftalign">Amount</td>
            <td><input type="text" name="amount" id="amount"></td>
        </tr>
        <tr>
            <td class="leftalign">Payment Method</td>
            <td>
                <select name="payment_method" id="payment_method">
                    <option value="account">From Account Balance</option>
                    <option value="liberty">Liberty Reserve</option>
                </select>
            </td>
        </tr>
    </table>

    <button class="tablebtn purchasenext">Next &raquo;</button>

    <?php echo form_close();?>

    <div id="paymenticon">
        <h3>We support :</h3>
        <img src="<?php echo base_url(); ?>assets/images/payment.png" alt="payment method">
    </div>

</div><!-- purchase page div ends -->
<!-- #EndEditable -->