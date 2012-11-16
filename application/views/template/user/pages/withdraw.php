<!-- #BeginEditable "body" -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#withdraw").validate({
            rules: {
                pin:{ required:true },
                withdraw_amount: {required:true, number: true, min: 20},
                account_no: { required:true }
            }
        });

    });


</script>
<ul class="tab settingpage">
    <li><a class="selected" href="/userpanel/withdraw">Withdraw</a></li>
    <li><a href="/userpanel/withdraw-history">Withdraw History</a></li>
</ul>

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

<?php echo form_open(site_url('/userpanel/withdraw-save'),array('name'=>'withdraw','id'=>'withdraw', 'class'=>''));?>

<table class="usersettingtable">
    <tr>
        <td>Pin<span class="req">*</span></td>
        <td class="leftalign">
            <input type="password" name="pin" id="pin" value="">
        </td>
    </tr>
    <tr>
        <td>Withdraw Amount<span class="req">*</span></td>
        <td class="leftalign">
            <input type="text" name="withdraw_amount" id="withdraw_amount" value="">
        </td>
    </tr>
    <tr>
        <td>Method<span class="req">*</span></td>
        <td class="leftalign">
            Liberty Reserve
            <input type="radio" name="withdraw_mathod" id="withdraw_mathod" value="Liberty" checked="checked">
        </td>
    </tr>
    <tr>
        <td>Liberty Account No<span class="req">*</span></td>
        <td class="leftalign">
            <input type="text" name="account_no" id="account_no">
        </td>
    </tr>
    <tr>
        <td></td>
        <td class="leftalign">
            <button class="tablebtn">Withdraw</button>
        </td>
    </tr>
    <tr>
        <td></td>
        <td class="leftalign"><span class="req">*</span> Required Field</td>
    </tr>
</table>
<?php echo form_close();?>



<!-- #EndEditable -->