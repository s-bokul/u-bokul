<!-- #BeginEditable "body" -->
<table width="100%" align="center">
    <tr>
        <td height="200px" align="center">
            <img src="<?php echo base_url(); ?>/assets/images/lr_logo.jpg" alt="Liberty Reserve">
        </td>
    </tr>
    <tr>
        <td class="" align="center" valign="middle">
            <form method="post" action="https://sci.libertyreserve.com">
                <input type="hidden" name="lr_acc" value="U1015419">
                <input type="hidden" name="lr_amnt" value="<?php echo $data['data_parchase']['amount']; ?>">
                <input type="hidden" name="lr_currency" value="LRUSD">
                <!-- urls -->

                <input type="hidden" name="lr_success_url" value="<?php echo base_url(); ?>userpanel/status/<?php echo $data['data_parchase']['insert_id'].'/'.$data['data_parchase']['amount'].'/'.md5('success'); ?>">
                <input type="hidden" name="lr_fail_url" value="<?php echo base_url(); ?>userpanel/status/<?php echo $data['data_parchase']['insert_id'].'/'.$data['data_parchase']['amount'].'/'.md5('fail'); ?>">



                <!-- baggage fields -->
                <input type="hidden" name="item_name" value="Purchase Credit" />


                <input type="submit" value="Buy Now!" style="" class="btn btn-primary" />
            </form>
        </td>
    </tr>
</table>



<!-- #EndEditable -->