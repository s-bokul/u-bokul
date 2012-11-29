<!-- #BeginEditable "body" -->
<table width="100%" align="center">
    <tr>
        <td height="200px" align="center">
            <br />
            <br />
            <img src="<?php echo base_url(); ?>/assets/images/payza.png" alt="Liberty Reserve" width="50%" height="50%">
        </td>
    </tr>
    <tr>
        <td class="" align="center" valign="middle">
            <form method="post" action="https://secure.payza.com/checkout" >
                <input type="hidden" name="ap_merchant" value="ufredis@gmail.com"/>
                <input type="hidden" name="ap_purchasetype" value="item-goods"/>
                <input type="hidden" name="ap_itemname" value="Purchase Credit"/>
                <input type="hidden" name="ap_amount" value="<?php echo $data['data_parchase']['amount']; ?>"/>
                <input type="hidden" name="ap_currency" value="USD"/>

                <input type="hidden" name="ap_quantity" value="1"/>
                <input type="hidden" name="ap_description" value="Purchase Credit"/>
                <input type="hidden" name="ap_returnurl" value="<?php echo base_url(); ?>userpanel/status-payza/<?php echo $data['data_parchase']['insert_id'].'/'.$data['data_parchase']['amount'].'/'.md5('success'); ?>"/>
                <input type="hidden" name="ap_cancelurl" value="<?php echo base_url(); ?>userpanel/status-payza/<?php echo $data['data_parchase']['insert_id'].'/'.$data['data_parchase']['amount'].'/'.md5('fail'); ?>"/>

                <input type="hidden" name="apc_1" value="Blue"/>

                <input type="image" src="https://www.payza.com/images/payza-buy-now.png"/>
            </form>
        </td>
    </tr>
</table>



<!-- #EndEditable -->