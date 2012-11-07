<ul class="tab settingpage">
    <li><a class="selected" href="/userpanel/withdraw">Withdraw</a></li>
    <li><a href="/userpanel/withdraw-history">Withdraw History</a></li>
</ul>
<h1 class="pagetitle">Withdraw History</h1>
<div style="width: 80%;margin: 0 auto;">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Account</th>
            <th>Withdraw Mathod</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        <?php foreach($data['withdraw_history'] as $withdraw_history) { ?>
        <tr>
            <td><?php echo $withdraw_history['account_no']; ?></td>
            <td><?php echo $withdraw_history['withdraw_mathod']; ?></td>
            <td><?php echo number_format($withdraw_history['withdraw_amount'], 2); ?></td>
            <td>
                <?php
                if($withdraw_history['paid_status'] == 1)
                    echo '<i class="icon-ok" style="color: #00ff00"></i>';
                else
                    echo '<i class="icon-remove" style="color: #ff0000"></i>';
                ?>
            </td>
            <td><?php echo $withdraw_history['create_date']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <div class="pagination">
        <ul><?php echo $this->pagination->create_links(); ?></ul>
    <!--<ul>
        <li class="page-prev"><a href="#">← Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li class="page-next"><a href="#">Next →</a></li>
    </ul>-->
    </div>
</div>
