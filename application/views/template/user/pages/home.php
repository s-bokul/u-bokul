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




<!-- #EndEditable -->