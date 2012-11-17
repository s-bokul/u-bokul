<h1 class="pagetitle">Transaction History</h1>
<script type="text/javascript">
    $(document).ready(function() {
       $('#transaction_type').change(function(){
           $('#searchForm').submit();
       })
    });
</script>
<div style="width: 80%;margin: 0 auto;">
    <table cellpadding="0" cellspacing="0" width="0">
        <tr>
            <td>
                <?php echo form_open(site_url('/userpanel/transaction'),array('name'=>'searchForm','id'=>'searchForm', 'method'=>'get'));?>
                Transaction Type :
                <select name="transaction_type" id="transaction_type">
                    <option value="">--Select Transaction Type--</option>
                    <option value="I">Deposite</option>
                    <option value="R">Daily Return</option>
                    <option value="C">Level Commission</option>
                </select>
                <!--<input type="submit" value="Search" class="btn">-->
                <?php echo form_close();?>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php
        if($data['transaction_history'])
            foreach($data['transaction_history'] as $transaction_data) {
        ?>
        <tr>
            <td><?php echo $transaction_data['information']; ?></td>
            <td><?php echo number_format($transaction_data['amount'], 2); ?></td>
            <td><?php echo $transaction_data['create_date']; ?></td>
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
