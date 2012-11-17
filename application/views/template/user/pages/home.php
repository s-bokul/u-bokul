<!-- #BeginEditable "body" -->

<ul class="tab">

</ul>

<div style="width:90%;margin:30px auto;">
    <div id="bootStarp">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#total" id="op">Total Information</a></li>
            <!--<li><a href="#escalated" id="esc">Liberty Reserve</a></li>
            <li><a href="#recent" id="rec">Recent</a></li>-->
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
            <!--<div class="tab-pane" id="escalated">
                <div class="progress progress-striped active" style="width: 400px;">
                    <div class="bar" style="width: 100%;text-align: center;"></div>
                </div>
            </div>

            <div class="tab-pane" id="recent">
                <div class="progress progress-striped active" style="width: 400px;">
                    <div class="bar" style="width: 100%;text-align: center;"></div>
                </div>
            </div>-->
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