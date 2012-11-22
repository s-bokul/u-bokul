<!-- #BeginEditable "body" -->

<ul class="tab">

</ul>

<div style="width:90%;margin:30px auto;">
    <div id="bootStarp">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#total" id="op">Total Information</a></li>
            <li><a href="#ref" id="Referral">Referral Link</a></li>
            <li><a href="#wal" id="wallet">Wallet</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="total">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Title</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td>Current Balance</td>
                            <td class="text-info">$ <?php echo $data['user_info']['balance']; ?></td>
                            <td>Total Withdrawals</td>
                            <td class="text-info">$ <?php echo $data['total_withdraw']; ?></td>
                        </tr>
                        <tr>
                            <td>Total Earning</td>
                            <td class="text-info">$ <?php echo $data['total_earning']; ?></td>
                            <td>Referral Commission</td>
                            <td class="text-info">$ <?php echo $data['referral_commission']; ?></td>
                        </tr>
                        <tr>
                            <td>Pending Withdrawals</td>
                            <td class="text-info">$ <?php echo $data['total_pending']; ?></td>
                            <td>Active Deposits</td>
                            <td class="text-info">$ <?php echo $data['active_deposits']; ?></td>
                        </tr>
                        <tr>
                            <td>Completed Withdrawals</td>
                            <td class="text-info">$ <?php echo $data['completed_withdraw']; ?></td>
                            <td>Total Deposits</td>
                            <td class="text-info">$ <?php echo $data['total_deposits']; ?></td>
                        </tr>
                    </table>
            </div>
            <div class="tab-pane" id="ref">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="left" valign="top">
                            Your referral link is : <span class="text-info"><?php echo base_url().'register/?ref='.$data['user_info']['email']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><img src="<?php echo base_url(); ?>assets/images/logo.png" border="0" /></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top">For Banner Copy the following text and paste it where you want </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><input name="textfield" type="text" value="&lt;a href=&quot;http://ufredis.com/register/?ref=<?php echo $data['user_info']['email']; ?>&quot;&gt;&lt;img src=&quot;http://ufredis.com/assets/images/logo.png&quot; border=&quot;0&quot;  /&gt;&lt;/a&gt;" style="width: 600px !important;font-size: 10px;" /></td>
                    </tr>
                </table>
            </div>

            <div class="tab-pane" id="wal">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>Liberty Reserve</td>
                        <td>
                            <?php
                                if(empty($data['user_info']['liberty_account']))
                                    echo '<a href="#liberty_account" role="button" class="text-info" data-toggle="modal">Add Liberty Reserve Account</a>';
                                else
                                    echo $data['user_info']['liberty_account'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Payza</td>
                        <td>
                            <?php
                            if(empty($data['user_info']['payza_account']))
                                echo '<a href="#payza_account" role="button" class="text-info" data-toggle="modal">Add Payza Account</a>';
                            else
                                echo $data['user_info']['payza_account'];
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })

    </script>
</div>
<!-- Modal -->
<div id="liberty_account" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Add Liberty Reserve Account</h3>
    </div>
    <div class="modal-body">
        <label>Enter Liberty Reserve Account:</label>
        <p><input type="text" name="liberty_account_number" id="liberty_account_number"></p>
        <span id="liberty_account_error" style="color: red;"></span>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" id="liberty_save">Save changes</button>
    </div>
</div>

<div id="payza_account" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Add Payza Account</h3>
    </div>
    <div class="modal-body">
        <label>Enter Payza Account:</label>
        <p><input type="text" name="payza_account_number" id="payza_account_number"></p>
        <span id="payza_account_error" style="color: red;"></span>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" id="payza_save">Save changes</button>
    </div>
</div>

<div id="alert_msg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Status</h3>
    </div>
    <div class="modal-body">
        <p id="alert_message"></p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#liberty_save').click(function () {
            if($('#liberty_account_number').val()!='')
            {
                $.get("/userpanel", {
                    liberty_account_number:$('#liberty_account_number').val()
                }, function (response) {
                    finish('liberty_account', (response));
                });
            }
            else
            {
                $('#liberty_account_error').text('Please Enter Account');
            }

            return false;
        });

        $('#payza_save').click(function () {
            if($('#payza_account_number').val()!='')
            {
                $.get("/userpanel", {
                    payza_account_number:$('#payza_account_number').val()
                }, function (response) {
                    finish('payza_account', (response));
                });
            }
            else
            {
                $('#payza_account_error').text('Please Enter Account');
            }

            return false;
        });
    });

    function finish(id, response) {
        $('#'+ id).modal('hide');
        if(response)
        {
            $('#alert_message').html('<span style="color:green;">Account Save Successfully.</span>');
        }
        else
            $('#alert_message').html('<span style="color:red;">Account Save Failed. Please Try again.</span>');

        $('#alert_msg').modal('show');
        setTimeout(function(){
           window.location = '/userpanel';
        }, 2000);
    }
</script>


<!-- #EndEditable -->