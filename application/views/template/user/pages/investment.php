<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#invest").validate({
            rules: {
                pin:{ required:true },
                investment_amount: {required:true, number: true, min: 20}
            },
            errorPlacement: function(error, element) {
                if(element.attr("name") == "pin")
                    error.insertAfter("#pin_error");
                if(element.attr("name") == "investment_amount")
                    error.insertAfter("#amount_error");
            }
        });
    });


</script>
<!-- #BeginEditable "body" -->
<div id="purchasepage">

    <h1 class="pagetitle">New Investment</h1>
    <div style="width: 90%;margin: 0 auto;">
        <?php
        $message = json_decode($this->session->flashdata('msg'), 1);
        if(!empty($message))
        echo '<div class="'.$message['class'].'" >
            <button type="button" class="close" data-dismiss="alert">×</button>
            '.$message['msg'].' </div>';
        ?>
        <?php echo validation_errors('<div class="error">', '</div>'); ?>
        <!--<div class="successbox" > This is a success message Box </div>
        <div class="warningbox" > This is a warning message Box </div>
        <div class="errormsgbox" > This is a Error  message Box </div>-->
    </div>
    <?php echo validation_errors('<div class="error">', '</div>'); ?>
    <?php echo form_open(site_url('/userpanel/investment-save'),array('name'=>'invest','id'=>'invest'));?>
    <table class="purchase defaulttable">
        <tr>
            <td>Pin<span class="req">*</span></td>
            <td class="leftalign">
                <input type="password" name="pin" id="pin" value="">
                <br /><span id="pin_error"></span>
            </td>
        </tr>
        <tr>
            <td class="leftalign">Amount</td>
            <td>
                <input type="text" name="investment_amount" id="investment_amount">
                <br /><span id="amount_error"></span>
            </td>
        </tr>
        <tr>
            <td class="leftalign">Payment Method</td>
            <td>
                <select name="payment_method" id="payment_method">
                    <option value="From Account Balance">From Account Balance</option>
                </select>
            </td>
        </tr>
    </table>

    <button class="tablebtn purchasenext">Invest</button>

    <?php echo form_close();?>

    <!--<div id="paymenticon">
        <h3>We support :</h3>
        <img src="<?php /*echo base_url(); */?>assets/images/payment.png" alt="payment method">
    </div>-->

</div><!-- purchase page div ends -->
<!-- #EndEditable -->